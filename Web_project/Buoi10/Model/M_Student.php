<?php
    include_once("E_Sttudent.php");
    class Model_Student{
        public function __construct()
        {}
        public function getAllStudent(){

            return array(
                "1"=>new Entity_Student(1, "Nguyen Quang Thuan", 19, "VKU university of DN"),
                "2"=>new Entity_Student(1, "Nguyen Quang Thuan1", 19, "VKU university of DN"),
                "3"=>new Entity_Student(1, "Nguyen Quang Thuan2", 19, "VKU university of DN")
            );
        }
        public function getStudentDetail($stid){
            $allStudent=$this->getAllStudent();
            return $allStudent[$stid];
        }
    }    

?>