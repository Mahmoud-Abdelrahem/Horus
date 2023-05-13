<?php 

function testMessage($condition, $message){
    if($condition){
        echo"<div class='alert alert-success m-auto col-md-6'>
         $message success
        </div>
        ";
    }
}

function path($go){
    echo "<script> window.location.replace('/Horus/$go')</script>";
}


function auth($rule2 = null , $rule3 = null){
    if($_SESSION['admins']){
        if(isset($_SESSION['admins'])){
            if($_SESSION['admins']['rule'] == 1 || $_SESSION['admins']['rule'] == $rule2 || $_SESSION['admins']['rule'] == $rule3 ){
            }else{

                path("403.php");
            }
        }else{
            header("location:/system/403.php");
        }
    }else{
        header("location:/system/admins/login.php");
    }
}


function filterValidation($input_value){
    $input_value = trim($input_value);
    $input_value = htmlspecialchars($input_value);
    return $input_value;
}


function stringValidation($input_value , $size){
    $name = empty($input_value);
    $size = strlen($input_value) < $size;
    if($name == true || $size == true){
        return true;
    }else{
        return false ;
    }
}

function numberValidation($input_value){
    $isNegative = $input_value < 0;
    $empty = empty($input_value);
    $notNumber = !filter_var($input_value , FILTER_VALIDATE_FLOAT);
    
    if($isNegative == true || $empty == true || $notNumber == true){
        return true;
    }else{
        return false;
    }
}
?>