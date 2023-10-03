<?php 
	// $date에 url의 날짜 정보를 가져옴
	// @변수 = date('',strtotime())에서 date()는 날짜와 시간을 다양한 형식으로 포맷
	// strtotime()는 $date에 있는 날짜를 유닉스 타임스탬프로 반환
	// $first_date = date('Y-m-01',strtotime($date)); 해당 구문은 따라서 해당 변수에 연월을 유지하면서 일자를 1로 설정
	// date('w')는 날짜에서 요일을 나타내는 숫자를 반환 고로 시작 날짜의 일자를 숫자로 반환
	// date('t')는 함수는 주어진 월의 마지막 날짜를 반환합니다.


	//url에서 date의 매개변수를 확인해서 날짜를 가지고옴
	$date = empty($_GET['date']) ? date('Y-m-d') : $_GET['date'];

	// date의 첫째 날 값을 지정 | ex) $date가 '2023-09-13'인 경우, $first_date는 '2023-09-01'이 됩니다.
	$first_date = date('Y-m-01',strtotime($date));
	// first_date = 요일을 계산, 그 결과를 0=일요일 1=월요일 등으로 숫자로 저장
	$first_date_wcode = date('w',strtotime($first_date));
	// 해당 부분은 마지막 날짜를 지정 date(t)는 주어진 월의 마지막 날짜를 반환
	$last_date_day = date('t', strtotime($date));
	// $date 변수에 저장된 월의 마지막 날의 요일(숫자)이 계산되서 저장
	$last_date_wcode = date('w',strtotime( date('Y-m-'.$last_date_day,strtotime($date)) ));
	// 주어진 date 값에서 한달의 뺀 값을 계산
	$prev_date = date('Y-m-d',strtotime("-1 month",strtotime($first_date)));
	// 주어진 date 값에서 한달의 더한 값을 계산
	$next_date = date('Y-m-d',strtotime("+1 month",strtotime($first_date)));
	// $prev_date 변수에 해당하는 이전 달의 마지막 날짜(일)가 저장
	$prev_last_date_day = date('t', strtotime($prev_date));

	$week = array(); // 주를 저장하는 배열 변수 지정
	$day = 1; // 일을 표현하는 값 1부터 시작
	while(1){
		$sub_week = array(); // 각 주(한 주)에 해당하는 일을 저장하는 변수
		for($i=0;$i<7;$i++){ //한 주 안에 7일을 생성하는 루프
			// 현재 날짜가 현재 월의 마지막 날을 초과하면 다음 달로 이동
			if( $day > $last_date_day){ 
				// 마지막 날의 날짜코드가 6이 아니라면, 다음달을 미리 넣어준다.
				if($last_date_wcode != 6){ // 마지막 날의 요일 코드가 토요일(6)이 아니라면 다음 달의 시작 일수 처리
					for($si=0;$si < 6-$last_date_wcode; $si++){ //현재 월의 마지막 날의 요일부터 토요일까지(6-$last_date_wcode)의 일자를 미리 다음 달로 추가
						$this_date = date('Y-m-'.($si+1),strtotime("+1 month",strtotime($first_date))); //date 함수를 사용하여 다음 달로 넘어가서 날짜를 설정
						$sub_week[] = array('type'=>'next', 'day'=>$si+1,'date'=>$this_date,'wcode'=>date('w',strtotime($this_date))); //$sub_week 배열에 다음 달의 일자를 추가, type은 'next'로, 이전과 구분하기 위한 표시, day에는 해당 일자를, date에는 날짜를, wcode에는 요일 코드를 저장
					}               
				}
				break; 
			}
			if( $day == 1 && $first_date_wcode != 0){ //현재 처리 중인 날짜 $day가 현재 월의 시작일(1일)인지를 확인, 현재 월의 시작일이 일요일(요일 코드 0)이 아닌 경우에만 실행
				for($si=($prev_last_date_day-$first_date_wcode);$si < $prev_last_date_day; $si++){ //이전 달의 마지막 날($prev_last_date_day)로부터, 현재 월의 시작일 직전까지($first_date_wcode)의 일자를 추가
					$this_date = date('Y-m-'.($si+1),strtotime("-1 month",strtotime($first_date))); //date 함수를 사용하여 이전 달로 넘어가서 날짜를 설정, Y-m-d 형식으로, 현재 월의 이전 달의 마지막 날부터 시작
					$sub_week[] = array('type'=>'prev', 'day'=>$si+1,'date'=>$this_date,'wcode'=>date('w',strtotime($this_date))); //$sub_week 배열에 이전 달의 일자를 추가, type은 'prev'로, 이전과 구분하기 위한 표시, day에는 해당 일자를, date에는 날짜를, wcode에는 요일 코드를 저장
				}
				$i += $first_date_wcode; //요일 코드에 따라 현재 주의 나머지 요일을 스킵, ex) 현재 월의 시작일이 화요일(요일 코드 2)인 경우, 월요일까지의 날짜를 이전 달로 추가하고 나면, $i를 요일 코드에 맞게 조정하여 현재 월로 넘어감
			}

			$this_date = date('Y-m-'.$day,strtotime($first_date)); //date 함수를 사용하여 현재 월의 날짜를 설정, $day는 현재 월의 몇 번째 날인지를 나타냄
			$sub_week[] = array('type'=>'now', 'day'=>$day,'date'=>$this_date,'wcode'=>date('w',strtotime($this_date))); //$sub_week 배열에 현재 월의 날짜를 추가, type은 'now'로, 현재 월의 날짜임을 표시, day에는 현재 월의 날짜를, date에는 날짜를, wcode에는 해당 날짜의 요일 코드를 저장 
			$day++;
		}
		$week[] = $sub_week; //현재 주(한 주의 날짜들)가 완성되면, $week 배열에 현재 주의 데이터를 추가
		if( $day > $last_date_day){ break; } // 만약 현재 월의 날짜가 마지막 날짜를 초과하면, 루프를 종료, 이 조건을 통해 현재 월의 마지막 날짜까지만 날짜를 처리하고, 다음 달로 넘어가거나 필요한 경우 이전 달로 되돌아감
	}
?>

