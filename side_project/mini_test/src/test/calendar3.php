<?php
// 데이터베이스 연결 설정
$servername = "localhost"; // 데이터베이스 서버 주소
$username = "root"; // 데이터베이스 사용자명
$password = "php504"; // 데이터베이스 비밀번호
$dbname = "newjeans"; // 사용할 데이터베이스명

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// URL에서 date 매개변수를 확인해서 날짜를 가져옴
$date = empty($_GET['date']) ? date('Y-m-d') : $_GET['date'];

// 날짜로부터 연도와 월을 추출
$year = date('Y', strtotime($date));
$month = date('m', strtotime($date));
$week = array();

// 날짜로부터 해당 월의 첫 날과 마지막 날을 계산
$firstDate = date('Y-m-01', strtotime($date));
$lastDate = date('Y-m-t', strtotime($date));

// SQL 쿼리: 해당 월에 입력된 데이터를 선택
$sql = "SELECT * FROM boards WHERE created_date BETWEEN '$firstDate' AND '$lastDate'";

$result = $conn->query($sql);

// 데이터베이스 연결 해제
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>캘린더</title>
</head>
<body>
    <div class="action">
        <a href="?date=<?php echo date('Y-m-d', strtotime("-1 month", strtotime($firstDate))); ?>">이전달</a>
        <strong><?php echo $year.'년 '.$month.'월'; ?></strong>
        <a href="?date=<?php echo date('Y-m-d', strtotime("+1 month", strtotime($firstDate))); ?>">다음달</a>
    </div>
    <table>
        <tr>
            <th>일</th>
            <th>월</th>
            <th>화</th>
            <th>수</th>
            <th>목</th>
            <th>금</th>
            <th>토</th>
        </tr>
        <?php foreach ($week as $k => $v): ?>
            <tr>
                <?php foreach ($v as $sk => $sv): ?>
                    <td class="wcode_<?php echo $sv['wcode'] . ($sv['type'] != 'now' ? ' prevnext' : ''); ?>" title="<?php echo $sv['date']; ?>">
                        <a href=""><?php echo $sv['day']; ?></a>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<style>
	body{  width:450px; }
	a{ text-decoration:inherit;}
	.action{ text-align:center; margin:10px 0; }
	.action strong{ font-size:45px; }
	.action a{ text-decoration: none; color:#333; }
	h1{ text-align:center; }
	table{ width:100%;}
	table th,td{ width: 14%; text-align:center; }
	table th.wcode_0,table td.wcode_0{ color:red;  }
	table th.wcode_6,table td.wcode_6{ color:blue; }
	table td.prevnext{ color:#eee; }
</style>
