<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    // 전체 게시글 조회
    public function index() {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::orderBy('created_at', 'DESC')->get();

        if($result->count() < 1) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            $responseData['data'] = $result;
        }
    
        return $responseData;
    } 
    
    // 게시글 작성
    public function store(Request $request) {
        // TODO : 라라벨의 API 방식에 대해서 공부
        // $request->data->content;
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::create($request->data);

        $responseData['data'] = $result;

        return $responseData;
    } 

    // 게시글 수정 (수행 완료 여부)
    public function update(Request $request, $id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::find($id);

        if(!$result) {
            // 예외처리 : 데이터 0건
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            // 데이터 정상 처리
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            $responseData['data'] = $result;
        }

        return $responseData;
    }
    
    // 게시글 삭제
    public function destroy($id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
        ];

        $result = Item::find($id);

        if(!$result) {
            // 예외처리 : 데이터 0건
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            // 데이터 정상 처리
            $result->delete();
        }

        return $responseData;
    }
}
