<?php
global $info;
//global $error;
$nav = $_GET['nav'] ?? 'database';
$action = $_GET['action'] ?? '';
$name = $_POST['fullname'] ?? '';
$age = $_POST['age'] ?? '';
$address = $_POST['address'] ?? '';
$info = '';
$error = '';
if('seeds' == $nav){
    seed(DB_NAME);
    $info = 'Sedding is Completed';
}
if('databse' == $nav){
    $info = $_GET['info'] ?? '';
}

if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST, "fullname", FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
    if($id){
        // Update a Student 
        if( '' != $name && '' != $age &&  '' != $address ){
            $updateStudent = updateStudent($id,$name,$age,$address);
            }

    } else {
        // Create a new Student
        if( '' != $name && '' != $age &&  '' != $address ){
            $nameExits = checkName($name,$age,$address);
            if($nameExits){
             $error = 1;
            }
     
         }
    }
  
}

if($action == 'edit' ){
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    $student = getStudentData($id);
    if ($student) {
       $updateForm = "visible";
    } else{
        $updateForm = "invisible";
    }

}

if($action == 'delete' ){
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    deleteStudent($id);
}
