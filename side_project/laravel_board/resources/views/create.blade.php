@extends('layout.layout')

@section('title', 'insert')

@section('main')
<div class="justify-content-center align-items-center h-75">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{route('board.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
                </div>

                <div class="modal-body">
                    <textarea name="b_content" class="form-control" cols="30" rows="20" placeholder="내용을 입력하세요."></textarea>
                </div>
                <div class="modal-footer">
                    <a href="{{route('board.index')}}" class="btn btn-secondary">닫기</a>
                    <button type="submit" class="btn btn-primary">작성</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection