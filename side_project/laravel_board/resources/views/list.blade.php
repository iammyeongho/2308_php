@extends('layout.layout')

@section('title', 'List')

@section('main')
<div class="text-center mt-4">
    <h1>자유 게시판</h1>
    <a class="btn" href="{{route('board.create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
        </svg>
    </a>
</div>
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