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
        
        // 메소드(method) : class내에 있는 함수 // 메소드의 멤버 필드에 새로운 클래스를 만들어 줘야함
        public function class_room_set_value() 
        {
            $this -> computer = "컴퓨터";
            $this -> book = "책";
            $this -> bag = "가방";
        }

        // 점(.) 연결자 | 메소드를 public로 지정했기 때문에 상단의 private, protected도 출력이 됨
        public function class_room_set_value_all()
        {
            $str = $this -> computer."\n"
                    .$this -> book."\n"
                    .$this -> bag;
            echo $str;
        }
    }

    // // class instance 생성
    $obj_classroom = new ClassRoom();

    // // 변수에 클래스 안의 메소드를 저장
    $obj_classroom -> class_room_set_value();

    // // 변수에 들어있는 computer 값을 출력
    // var_dump($obj_classroom -> computer);

    // 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
    $obj_classroom -> class_room_set_value_all();
?>