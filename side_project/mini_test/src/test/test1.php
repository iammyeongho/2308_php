<?php
// 선택한 년, 월, 일
$selectedYear = isset($_GET['year']) ? $_GET['year'] : date('Y');
$selectedMonth = isset($_GET['month']) ? $_GET['month'] : date('m');
$selectedDay = isset($_GET['day']) ? $_GET['day'] : date('d');

// 이전 월과 다음 월 계산
$prevMonth = date('Y-m-d', strtotime("$selectedYear-$selectedMonth-01 -1 month"));
$nextMonth = date('Y-m-d', strtotime("$selectedYear-$selectedMonth-01 +1 month"));

// 달력 표시 함수
function drawCalendar($year, $month, $selectedDay) {
    $numDays = date('t', strtotime("$year-$month-01")); // 월의 총 일수
    $firstDay = date('w', strtotime("$year-$month-01")); // 첫 날의 요일 (0: 일요일, 6: 토요일)

    echo "<table border='1'>";
    echo "<tr><th>일</th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th><th>토</th></tr>";
    echo "<tr>";

    // 첫 번째 날 이전의 빈 셀 채우기
    for ($i = 0; $i < $firstDay; $i++) {
        echo "<td></td>";
    }

    // 달력 날짜 채우기
    for ($day = 1; $day <= $numDays; $day++) {
        if ($day == $selectedDay) {
            echo "<td><a href='calendar.php?year=$year&month=$month&day=$day' style='font-weight: bold;'>$day</a></td>";
        } else {
            echo "<td><a href='calendar.php?year=$year&month=$month&day=$day'>$day</a></td>";
        }

        $firstDay++;
        if ($firstDay % 7 == 0) {
            echo "</tr>";
            if ($day < $numDays) {
                echo "<tr>";
            }
        }
    }

    // 나머지 빈 셀 채우기
    while ($firstDay % 7 != 0) {
        echo "<td></td>";
        $firstDay++;
    }

    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>달력</title>
</head>
<body>
    <h1>날짜 선택 달력</h1>
    <h2><?php echo date('Y년 m월', strtotime("$selectedYear-$selectedMonth-01")); ?></h2>
    <a href='calendar.php?year=<?php echo date('Y', strtotime($prevMonth)); ?>&month=<?php echo date('m', strtotime($prevMonth)); ?>&day=1'>이전 달</a>
    <a href='calendar.php?year=<?php echo date('Y', strtotime($nextMonth)); ?>&month=<?php echo date('m', strtotime($nextMonth)); ?>&day=1'>다음 달</a>

    <?php
    drawCalendar($selectedYear, $selectedMonth, $selectedDay);
    ?>

    <h2>선택한 날짜: <?php echo date('Y년 m월 d일', strtotime("$selectedYear-$selectedMonth-$selectedDay")); ?></h2>
</body>
</html>