<?php

namespace App\Http\Controllers;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Board;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // *del 231116 미들웨어로 이관 (라우터 부분 참조)
        // // 로그인 체크
        // if(!Auth::check()) {
        //     return redirect()->route('user.login.get');
        // }

        // 게시글 획득
        $result = Board::get();
        
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        // TODO: 상단에 파라미터 부분이 타입힌트임 해당 부분 찾아서 공부

        // 쿼리 빌더 모델
        // $b_title = $request->input('b_title');
        // $b_content = $request->input('b_content');
        // DB::beginTransaction();
        // Board::insert(['b_title' => $b_title, 'b_content' => $b_content, 'created_at' => NOW(), 'updated_at' => NOW()]);
        // DB::commit();

        // 엘리퀀트 모델 | 보드 모델에서 화이트 리스트 처리해줘야함
        // 작성처리
        // $result = Board::create($request->only('b_title', 'b_content'));

        // 바리데이션 체크를 위해 값을 담아줘야함
        $arrInpuDate = $request->only('b_title', 'b_content');
        $result = Board::create($arrInpuDate);
        // 해당 부분에서 sava 필요 x 다른 방식에서 사용 | 모델을 새로 만들 시에 $model = new Board($arrInpuDate)처럼 했을 시 save
        // $result->save();
        // var_dump($request);

        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $result = DB::table('board')->where('b_id', '=' ,$id)->get();
        // $result = Board::where('b_id', '=' ,$id)->get();
        $result = Board::find($id);

        // 조회수 올리기
        $result->b_hits++;
        $result->timestamps = false;
        // 업데이트 처리
        $result->save();

        return view('detail')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug("___________ 삭제처리 시작 ___________");
        try {
            DB::beginTransaction();
            Log::debug("트랙잭션 시작");
            Board::destroy($id);
            Log::debug("삭제 완료");
            DB::commit();
            Log::debug("커밋 완료");
        } catch(Exception $e) {
            DB::rollBack();
            Log::debug("예외 발생 : 롤백 완료");
            return redirect()->route('error')->withErrors($e->getMessage());
        } finally {
            Log::debug("___________ 삭제처리 종료 ___________");
        }
        return redirect()->route('board.index');
    }
}
