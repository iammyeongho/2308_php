<?

    // namespace : 클래스를 구분해주기 위해 설정 (주소값 반환), 보통은 해당파일의 패스(./***/*** 형식)로 작성
    // namespace를 지정한 아래에 있는 class가 지정됨

    //  up calss
    namespace up;


    class Class1
    {

        public function __construct()
        {
            echo "up calss";
        }

    }

    // down calss
    namespace down;
    
    class Class1
    {

        public function __construct()
        {
            echo "down calss";
        }

    }


    // class instance 생성시 namespace를 \**\ 안에 넣어줘서 지정해주면 됨
    // $obj_class1 = new \up\class1();

    // use 사용 시에도 상단에 namespace를 지정해줘야함

    namespace test;

    use \up\Class1 as up;
    use \down\Class1 as down;

    $obj_class1 = new up();
    $obj_class1 = new down();

?>