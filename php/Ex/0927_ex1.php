<?php
    // while
    // $base = 10;
    // $x = $base;

    // while($x >= 1)
    // {
    //     $gap = $x - 1;
    //     $line = $base;
    //     while($line >= 1)
    //     {
	// 		if($gap >= 1) {
	// 			echo " ";
	// 		} else {
	// 			echo "*";
	// 		}
    //         $line--;
	// 		$gap--;
    //     }

	// 	$x--;
    //     echo "\n";
    // }

$monthlySalary = 3000.00; // 예시 급여

// 한 달 일수 계산 (현재 월의 일수)
$daysInMonth = date('t'); 

// 일일 급여 계산
$dailySalary = $monthlySalary / $daysInMonth;

echo date('Y-m-d H:i:s'); 
echo "\n";
echo "한 달 급여: $monthlySalary";
echo "\n";
echo "일일 급여: $dailySalary";

?>