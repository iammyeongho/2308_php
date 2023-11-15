@extends('layout.layout')

@section('title', 'List')

@section('main')
<main class="justify-content-center align-items-center h-75">
    @forelse($data as $item)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$item->b_title}}</h5>
                <p class="card-text">{{$item->b_content}}</p>
                {{-- <button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> --}}
                <a href="{{route('board.show', ['board' => $item->b_id])}}"class="btn btn-dark">상세</a>
            </div>
        </div>
    @empty
        <div>게시글 없음</div>
    @endforelse
</main>
@endsection