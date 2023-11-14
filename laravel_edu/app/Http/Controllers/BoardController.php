<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {
        // 라라벨 쿼리 사용 방법 3가지
        // 1. 빌더(Builder)를 사용한 Fluent Query Builder (쿼리빌더와 체이닝으로 두 가지) | 2. Eloquent ORM을 사용한 방법 | 3. Raw SQL을 사용한 방법
        // ORM : 오브젝트 릴레이티브 맵핑
        // =======================
        // 쿼리빌더
        // =======================
        // $result = DB::select('select * from boards limit 10');

        // $result = DB::select('select * from boards limit :no offset :no2', ['no' => 2, 'no2' => 10]);

        // $result = DB::select('select * from boards limit ? offset ?', [2, 10]);
        
        // 카테고리가 4,7,8인 게시글의 수를 출력
        $result = DB::select('select count(id) from boards where categories_no in (4,7,8)');

        // 배열과 in
        $arr = [4, 7, 8];
        $result = DB::select('select count(id) from boards where categories_no in(?, ?, ?)', $arr);

        // or을 사용
        $result = DB::select('select count(id) from boards where categories_no = ? or categories_no = ? or categories_no = ?', $arr);

        // 카테고리별 게시글 갯수를 출력해 주세요.
        $result = DB::select('SELECT count(categories_no) cat_cnt FROM boards GROUP BY categories_no');

        // 카테고리별 게시글 갯수 + 카테고리명도 같이 출력
        // 첫번째 방법 : c.no와 c.name은 같은 값을 대응하기 떄문에 해당 값으로 그룹을 잡아줌, 해당 방식이 그룹바이의 표준 문법임, 그룹바이에 묶여있는 컬럼들만 select에 사용 가능
        $result = DB::select('SELECT c.no, c.name, count(c.no) FROM boards b JOIN categories c ON b.categories_no = c.no GROUP BY c.no, c.name');

        // 직접 사용한 방식
        // $result = DB::select('SELECT c.name, count(b.categories_no) cnt FROM boards b JOIN categories c ON b.categories_no = c.no GROUP BY c.name');
        // $result = DB::select('SELECT c.name, count(c.no) FROM boards b JOIN categories c ON b.categories_no = c.no GROUP BY c.name');

        // ------------------- INSERT -------------------
        // 트랜잭션
        // DB:beginTramsaction();
        // $sql = 
        //     'INSERT INTO boards(
        //         title 
        //         ,content 
        //         ,created_at 
        //         ,updated_at 
        //         ,categories_no
        //     )
        //     VALUES(
        //         ? 
        //         ,? 
        //         ,?
        //         ,?
        //         ,?
        //         )';

        //     $arr = [
        //         '제목1'
        //         ,'내용1'
        //         ,now()
        //         ,now()
        //         ,'0'
        //     ];

        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();
        // 해당 구문이 자동으로 실행되기 때문에 한번 실행 후 주석

        // $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');
        
        // ------------------- UPDATE -------------------
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title = ?, content = ? WHERE id = ?', ['업데이트1', '업업업업업업', $result[0]->id]);
        // DB::commit();

        // ------------------- DELETE -------------------
        // DB::beginTransaction();
        // DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // DB::commit();

        // =======================
        // 쿼리빌더 체이닝 (Raw SQL)
        // =======================
        // select * from boards where id = 300
        // $result = 
        //     DB::table('boards')
        //     ->select('id')
        //     ->where('id', '=', 3000)
        //     ->get();

        // select 기본 값이 *
        $result = 
            DB::table('boards')
            ->where('id', '=', 3000)
            ->get();

        // select * from boards where id = 300 or id = 400;
        // or의 경우 orWhere 사용 | and의 경우 그냥 where
        $result = 
            DB::table('boards')
            ->where('id', '=', 3000)
            ->orWhere('id', '=', 4000)
            ->orderBy('id', 'desc')
            ->get();

        // select * from categories where no in (1, 2, 3);
        $result = 
            DB::table('categories')
            ->whereIn('no', [1, 2, 3])
            ->get();

        // select * from categories where no not in (1, 2, 3);
        $result = 
            DB::table('categories')
            ->whereNotIn('no', [1, 2, 3])
            ->get();

        // flrst() : limit 1하고 비슷하게 동작
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count() : 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();
        
        // max() : 해당 컬럼의 최대값
        $result = DB::table('boards')->max('id');

        
        // 게시글 정보 + 카테고리명 까지 출력 100개 출력
        $result = 
            DB::table('boards')
            ->select('boards.title', 'boards.content', 'categories.name')
            ->join('categories', 'categories.no','boards.categories_no')
            ->limit(10)
            ->get();

        // 카테기로별 게시글 갯수와 카테고리명을 출력해 주세요
        // 체이닝 메소드의 내부적인 문제 때문에 문자열(count)을 추가할 떄 DB::raw를 넣어줘야함
        // 모든 부분에서 = 부분은 생략 가능
        $result =
            DB::table('boards')
            ->select('categories.no', 'categories.name', DB::raw('count(categories.no) as count'))
            ->join('categories', 'categories.no','boards.categories_no')
            ->groupBy('categories.no', 'categories.name')
            ->get();

        return var_dump($result);
        // return var_dump($result[0]->title);
        // 오브젝트 값임 따라서 클래스 접근하는 것 처럼 -> 사용
    }
}
