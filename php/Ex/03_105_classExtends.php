<?

    // 상속 : 부모 클래스의 property를 자식 클래스가 상속 받는 것
    class Parents
    {
        public function print_p()
        {
            echo "Parents class-p\n";
        }

        public function print_c()
        {
            echo "Parents class-c\n";
        }
    }

    // extend : 클래스가 상속받을 자를 정함 아래의 경우 Parents가 부모 클래스가 되는 것
    class Child extends Parents
    {
        // 오버라이딩 : 부모 클래스에서 정의한 property를 자식클래스에서 재정의 하는 것
        public function print_c()
        {
            // 부모 클래스의 메소드를 그대로 출력하고 싶을 때
            // 상속받은 부모 클래스의 property를 사용하고 싶을 때
            // parent를 $this로 변경 시 child의 print_c를 지정하는 것 
            parent::print_c();

            // 자식 클래스에서 메소드를 재정의
            echo "Child_class";
        }

    }

    // class instance 생성
    $obj_child = new Child();

    $obj_child -> print_p();
    $obj_child -> print_c();
?>