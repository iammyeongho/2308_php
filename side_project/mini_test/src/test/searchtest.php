<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "root";
$password = "php504";
$dbname = "newjeans";

// GET 파라미터에서 검색어를 가져옴
if (isset($_GET["search_query"])) {
    $search_query = $_GET["search_query"];

    // 데이터베이스 연결 생성
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("연결 실패: " . $conn->connect_error);
    }

    // SQL 쿼리 작성 및 실행
    $sql = "SELECT * FROM boards WHERE title LIKE '%$search_query%' OR writet = '%$search_query%'";
    $result = $conn->query($sql);

    // 검색 결과 출력
    if ($result->num_rows > 0) {
        echo "<h2>검색 결과:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "필드1: " . $row["title"] . "<br>";
            echo "필드2: " . $row["writet"] . "<br>";
            // 필드 추가
        }
    } else {
        echo "검색 결과가 없습니다.";
    }

    // 연결 종료
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>검색 예제</title>
</head>
<body>
    <h1>검색 폼</h1>
    <form method="GET" action="searchtest.php">
        <label for="search_query">검색어:</label>
        <input type="text" id="search_query" name="search_query" required>
        <button type="submit">검색</button>
    </form>
</body>
</html>