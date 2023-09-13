<?

    // 폴더 (디렉토리) 만들기
    // if (mkdir("../tng/testdir",777))
    // {
    //     echo "정상";
    // }
    // else
    // {
    //     echo "실패";
    // }

    // 폴더 삭제
    // rmdir("./testdir");

    // ////////////////
    // 파일
    // ////////////////

    // 파일 생성 | "a" 값에 따라 파일 생성 수정 삭제가 가능 | "a"는 쓰기 권한 | "r" 쓰기 권한
    // $file = fopen("zz.txt", "r");

    // 파일 오류 확인
    // if($file)
    // {
    //     echo "참";
    // }
    // else
    // {
    //     echo "거짓";
    // }

    // 파일 쓰기
    // $f_write = fwrite($file, "탕수육\n");

    // 파일 읽기
    // $file 값 뒤에는 몇 바이트를 들고올 것인지를 적어야함
    // $line = fnead($file, "9"); 

    // fgets는 file.txt 내용을 한줄씩 들고옴
    // $line = fgets($file);
    // echo $line;

    // while( $line = fgets($file) )
    // {
    //     echo $line;
    // }
    // echo fgets($file);


    // 파일 닫기
    // fclose($file);

    // 파일 삭제
    // unlink("zz.txt");

?>