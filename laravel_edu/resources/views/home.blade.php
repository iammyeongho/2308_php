<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>home !!!!</h1>
    <br>
    <form action="/home" method="POST">
        @csrf 
        {{-- 폼에 넣어줘야 CSRF 방지 --}}
        <button type="submit">POST</button>
    </form>
    <br>
    <form action="/home" method="POST">
        {{-- 라라벨을 사용하지 않으면 input hidden으로 벨류 값을 put으로 지정해야함 --}} 
        @csrf
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <br>
    <form action="/home" method="POST">
        {{-- 라라벨을 사용하지 않으면 input hidden으로 벨류 값을 put으로 지정해야함 --}} 
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
</body>
</html>