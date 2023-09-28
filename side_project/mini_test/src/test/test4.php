<?php
// 데이터베이스 연결 설정
$host = "localhost";
$username = "root";
$password = "php504";
$database = "test";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 검색어 확인
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

// 게시물 검색
if (!empty($searchTerm)) {
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>검색 결과</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['title']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>검색 결과가 없습니다.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>게시물 검색</title>
</head>
<body>
    <h1>게시물 검색</h1>
    <form action="search.php" method="get">
        <label for="q">검색어:</label>
        <input type="text" name="q" id="q" value="<?php echo $searchTerm; ?>">
        <input type="submit" value="검색">
    </form>
</body>
</html>