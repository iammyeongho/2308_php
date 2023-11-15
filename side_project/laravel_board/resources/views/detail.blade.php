@extends('layout.layout')

@section('title', 'List')

@section('main')
<main class="justify-content-center align-items-center h-75">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$data->b_id}}</h5>
                <p class="card-title">{{$data->b_title}}</p>
                <p class="card-text">{{$data->b_content}}</p>
                <p class="card-text">{{$data->b_hits}}</p>
                <p class="card-text">{{$data->created_at}}</p>
                {{-- <button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> --}}
                {{-- <a href="{{route('board.show', ['board' => 1])}}"class="btn btn-dark">상세</a> --}}
            </div>
        </div>
</main>
@endsection