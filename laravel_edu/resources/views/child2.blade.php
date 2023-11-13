{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
{{-- 해당 section이 없을 경우에 부모 타이틀을 활용함 --}}
@section('title', '자식2 타이틀')

@section('main')
    @for($i = 1; $i <= 9; $i++)
        <span>{{$i}}단</span>
        <br>
        @for($l = 1; $l <= 9; $l++)
            <span>{{$i}} X {{$l}} = {{$i * $l}}</span>
        <br>
        @endfor
    @endfor
@endsection