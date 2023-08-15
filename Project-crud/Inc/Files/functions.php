<?php 

define("DB_NAME" , "C:\\xampp\\htdocs\\Project-crud\\Inc\\Files\\db.txt");

function seed(){
    $data = array(
        array(
            'id'      => 1,
            'name'    => "Shakib Shown",
            'age'     => 21,
            'address' => "Jamalpur, Mymensing, Bangladesh"
        ),
        array(
            'id'      => 2,
            'name'    => "Asha",
            'age'     => 16,
            'address' => "Sarisabari, Mymensing, Bangladesh"
        ),
        array(
            'id'      => 3,
            'name'    => "Sonia",
            'age'     => 21,
            'address' => "Kustia, Rajshahi, Bangladesh"
        )
    );
    $serializedData = serialize($data);
    file_put_contents( DB_NAME , $serializedData,LOCK_EX); 
}

function geanrateReport(){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class=" p-4 text-center">Student Details</h3>
                <table class="table">
                    <tr>
                        <th width="35%">Name</th>
                        <th>Age</th>
                        <th width="35%" >Address</th>
                        <th width="15%" >Action</th>
                    </tr>
                  
    <?php 
    foreach ($students as $student){ ?>
        <tr>
        <td><?php printf("%s",$student['name'])  ?></td>
        <td><?php printf("%s",$student['age'])  ?></td>
        <td><?php printf("%s",$student['address'])  ?></td>
        <td><?php printf("<a href='?id=%s&action=edit'>Edit</a> | <a href='?id=%s&action=delete' class='delete'>Delete</a>", $student['id'], $student['id']) ?></td>
    </tr><?php
    }?>
     
    </table>
    </div>
    </div>
    </div> 
    <?php 
}

function checkName($name,$age,$address){
    $match = false ;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    foreach ($students as $student){
       if ($student["name"] == $name) {
        $match = true;
        break;
       }
    }
    if ($match) {
        $error = 1;
    } else {
        header('location:?nav=database');
        addNewStudent($name,$age,$address);
    }
    return $error;
}
function updateStudent($id,$name,$age,$address){
    $match = false ;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    foreach ($students as $student){
        if ($student["name"] == $name) {
            if ($student["id"] == $id){
                $match = 2;
                break;
            } else {
                $match = 1;
                break;
            }
            return $match;
            break;
        }
     }  
     if ($match == 1) {
        $error = 1;
    } else if ($match == 2) {
        $error = 2;
    } else {
        header('location:?nav=database');
        $students [$id - 1] ["name"] = $name;
        $students [$id - 1] ["age"] = $age;
        $students [$id - 1] ["address"] = $address;
        $serializedData = serialize($students);
        file_put_contents( DB_NAME , $serializedData,LOCK_EX); 
    }
    return $error;
}


function addNewStudent($name,$age,$address){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    $id = getNewID($students);
    $newStudent = array(
        'id'      => $id,
        'name'    => $name,
        'age'     => $age,
        'address' => $address
    );
    array_push($students,$newStudent);
    $serializedData = serialize($students);
    file_put_contents( DB_NAME , $serializedData,LOCK_EX); 
   
}

function getNewID($students){
    $newId = max(array_column($students, 'id'));
    return $newId+1;
}

function getStudentData($id){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    $studentID = $id;
    foreach( $students as $student){
        if($studentID == $student['id']){
            return $student;
        }

    } return false;
}

function deleteStudent($id){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    unset($students[$id - 1]);
    $serializedData = serialize($students);
    file_put_contents( DB_NAME , $serializedData,LOCK_EX); 
}
