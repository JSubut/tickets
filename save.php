<?php
include 'database.php';
session_start();
if($_POST['type']==21){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $password=$_POST['password'];

    $duplicate=mysqli_query($conn,"select * from users where email='$email'");
    if (mysqli_num_rows($duplicate)>0)
    {
        echo json_encode(array("statusCode"=>201));
    }
    else{
        $sql = "INSERT INTO `users`( `name`, `email`, `phone`, `city`, `password`) 
			VALUES ('$name','$email','$phone','$city', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }
        else {
            echo json_encode(array("statusCode"=>201));
        }
    }
    mysqli_close($conn);
}
if($_POST['type']==22){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $check=mysqli_query($conn,"select * from users where email='$email' and password='$password'");
    if (mysqli_num_rows($check)>0)
    {
        $_SESSION['email']=$email;
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
}
if(count($_POST)>0){
    if($_POST['type']==1){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $sql = "INSERT INTO `crud`( `name`, `email`,`phone`,`city`) 
		VALUES ('$name','$email','$phone','$city')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
if(count($_POST)>0){
    if($_POST['type']==2){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $sql = "UPDATE `crud` SET `name`='$name',`email`='$email',`phone`='$phone',`city`='$city' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
if(count($_POST)>0){
    if($_POST['type']==3){
        $id=$_POST['id'];
        $sql = "DELETE FROM `crud` WHERE id=$id ";
        if (mysqli_query($conn, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
if(count($_POST)>0){
    if($_POST['type']==4){
        $id=$_POST['id'];
        $sql = "DELETE FROM crud WHERE id in ($id)";
        if (mysqli_query($conn, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
