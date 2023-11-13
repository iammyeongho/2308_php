{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 --}}
@section('main')
    <h2>자식1</h2>
    <p>여러 데이터를 표시합니다.</p>
    {{-- 조건문 --}}
    @if($gender === '0')
        <span>성별 : 남자</span>
    @elseif($gender === '1')
        <span>성별 : 여자</span>
    @else
        <span>성별 : 기타</span>
    @endif
    <hr>

    {{-- 반복문 --}}
    @for($i = 1; $i < 6; $i++)
        {{-- 화면에 변수를 출력하는 방법 --}}
        <span>{{$i}}</span>
    @endfor
    <hr>

    <h2>foreach문</h2>
    {{-- foreach와 forelse의 경우, $loop변수가 생성되고 사용할 수 있다. --}}
    {{-- {{$loop->count}} 갯수 파악 --}}
    {{-- {{$loop->count.' >> '.$loop->iteration}} 몇번 돌았는지--}}
    @foreach($data as $key => $val)
    {{$loop->count}}
    <br>
    {{$loop->count.' >> '.$loop->iteration}}
    <br>
        <span>{{$key.' : '.$val}}</span>
        <br>
    @endforeach
    <hr>

    {{-- forelse는 값이 없을 경우도 표시해줌 --}}
    <h3>forelse</h3>
    @forelse($data2 as $key => $val)
        <span>{{$key.' : '.$val}}</span>
        <br>
    @empty
        <span>빈배열입니다.</span>
    @endforelse
@endsection
{{-- 부모 show 테스트용 --}}
@section('show')
<h2>자식1 show입니다.</h2>
<p>자식1자식1자식1자식1</p>
<hr>
@endsection