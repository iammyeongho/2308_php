@extends('layout.layout')

@section('title', 'edit')

@section('main')
<div class="justify-content-center align-items-center h-75">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('board.update', ['board' => $data->b_id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요." value="{{$data->b_title}}">
                </div>

                <div class="modal-body">
                    <textarea name="b_content" class="form-control" cols="30" rows="20" placeholder="내용을 입력하세요.">{{$data->b_content}}</textarea>
                </div>
                <div class="modal-footer">
                    <a href="{{route('board.show', ['board' => $data->b_id])}}" class="btn btn-secondary">닫기</a>
                    <button type="submit" class="btn btn-primary">수정</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection