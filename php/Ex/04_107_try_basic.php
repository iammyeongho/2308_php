<?

	try
	{
		// 예외 상황이 발생할만한 소스코드 (우리가 처리하고 싶은 소스 코드) | 트라이 마지막에 커밋
		echo "try 실행\n";

		// throw 해당 try 중단하고 catch로 이동한다
		// throw문을 만났을 때 실행할 코드를 catch 블록에 작성합니다. catch 블록에서는 앞서 throw문에서 던진 Exception 객체를 받아다가 사용할 수 있습니다.
		throw new Exception ("강제 예외 발생");

		echo "try 종료\n";
	}
	//Exception객체(타입 힌트)를 $e 변수에 넣겠다라는 의미 | Exception 5~7버전은 해당 구문을 대신 에러를 못 잡읍
	// Throwable 7버전 이후로 모든 에러를 잡아줌
	catch( Exception $e ) 
	{
		// 예외상황 발생 시 실행 | 롤백
		echo "catch 실행\n";
		echo $e->getMessage(), "\n";
	}
	finally
	{
		// 정상이든, 예외발생이든 무조건 실행
		echo "finally 실행\n";
	}

?>