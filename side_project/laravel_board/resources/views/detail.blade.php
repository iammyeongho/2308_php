@extends('layout.layout')

@section('title', 'Datail')

@section('main')
<main class="justify-content-center align-items-center h-75">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('board.destroy', ['board' => $data->b_id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <h5 class="card-title">게시물 아이디 : {{$data->b_id}}</h5>
                    <p class="card-title">제목 : {{$data->b_title}}</p>
                    <p class="card-text">내용 : {{$data->b_content}}</p>
                    <p class="card-text">조회수 : {{$data->b_hits}}</p>
                    <p class="card-text">작성일자 : {{$data->created_at}}</p>
                    {{-- <button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> --}}
                    <button class="btn btn-danger">삭제</button>
                    <a href="{{route('board.edit', ['board' => $data->b_id])}}"class="btn btn-dark">수정</a>
                    <a href="{{route('board.index')}}"class="btn btn-dark">이전</a>
                </form>
            </div>
        </div>
</main>
@endsection