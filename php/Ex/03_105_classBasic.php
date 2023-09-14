<?
    
    // 절차지향
    // 절차지향 프로그래밍은 프로그램을 순차적인 단계로 나누고 각 단계에서 함수 또는 프로시저를 호출하여 문제를 해결하는 방식입니다.
    // 코드는 기능별로 나뉘며 함수 호출을 통해 데이터를 처리합니다.
    // 전역 변수를 사용하여 데이터를 공유하고 수정할 수 있습니다.

    // 객체지향
    // 객체지향 프로그래밍은 객체를 중심으로 데이터와 해당 데이터를 처리하는 메서드를 묶어 프로그래밍하는 방식입니다.
    // 클래스와 객체를 사용하여 코드를 모듈화하고 재사용성을 높입니다.
    // 상속, 캡슐화, 다형성과 같은 개념을 활용하여 객체 간의 관계를 정의합니다.
    // 파일 하나 당 클래스로 취급

    // class는 동종의 객체들이 모여있는 집합을 정의한 것

    // class 지을 때 첫 글자를 대문자로
    // 객체지향은 카멜 기법
    // 클래스 변수 선언시 지시자를 지정해줘야함
    // 클래스 내에서는 변수만 설정 가능하고 그 외는 값 설정은 메소드에서 가능

    class ClassRoom
    {
        // {} 중괄호 안을 멤버 필드라고 지칭함
        // 멤버 변수 : class내에 있는 변수 
        // 접근제어 지시자 : public, private, protected
        public $computer; // public : 어디에서나 접근 가능
        private $book; // private : class 내에서만 접근 가능
        protected $bag; // protected : class와 나를 상속 받는 자식이 class 내에서만 접근 
        
        protected $now;
        
        // 메소드(method) : class내에 있는 함수 // 메소드의 멤버 필드에 새로운 클래스를 만들어 줘야함
        public function class_room_set_value() 
        {
            $this -> computer = "컴퓨터";
            $this -> book = "책";
            $this -> bag = "가방";
        }
        // 생성자 (constructor)
        // 클래스를 이용하여 객체를 생성할 때 사용
        // 생성자를 정의 하지 않을때는 디폴트 생성자가 선언됨
        // 생성시에 __가 필수적으로 들어가야함
        // construct는 항상 public여야함 왜냐하면 클래스 외부에서 instance를 생성하기 때문에
        // 클래스를 인스턴스 할 때 자동으로 실행되는 메소드
        // construcotor이 가장 먼저 실행 됨
        public function __construct()
        {
            echo "컨스트럭트 실행 \n";
            $this -> now = date("Y-m-d H:i:s");
        }

        //  메소드(method) : class내에 있는 함수
        // 점(.) 연결자 | 메소드를 public로 지정했기 때문에 상단의 private, protected도 출력이 됨
        public function class_room_set_value_all()
        {
            $str = $this -> computer."\n"
                    .$this -> book."\n"
                    .$this -> bag;
            echo $str;
        }

        // getter 메소드 : private 멤버 변수를 호출할 떄
        public function get_now()
        {
            // $this -> now = date("Y-m-d H:i:s");
            return $this -> now;
        }

        // setter 메소드 : 멤버 변수에 입력할 때
        public function set_now()
        {
            $this -> now = "9999-01-01 00:00:00";
            // return $this -> now;
        }

        // static : instance를 생성하지 않아도 호출할 수 있는 객체
        // staric : 자동으로 메모리에 올라가기 때문에 바로 사용 가능
        public static function static_test()
        {
            echo "스태틱 메소드";
        }
    }

    // // class instance 생성
    $obj_classroom = new ClassRoom();

    // // 변수에 클래스 안의 메소드를 저장
    // $obj_classroom -> class_room_set_value();

    // // 변수에 들어있는 computer 값을 출력
    // var_dump($obj_classroom -> computer);

    // 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
    // $obj_classroom -> class_room_set_value_all();

    // constructor 안 내용 출력시
    // echo $obj_classroom -> now;

    // private 메소드 호출할 시 | set_now 입력 받기 전
    echo $obj_classroom ->  get_now();

    // setter : 메소드에 값을 입력하기 때문에 호출하는 값 위에 있어야함
    $obj_classroom -> set_now();

    // private 메소드 호출할 시 | set_now 입력 받은 후
    echo $obj_classroom ->  get_now();


    // static객체 사용 방법
    // ClassRoom::static_test();
?>