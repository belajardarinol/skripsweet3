<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $link = mysqli_connect('localhost','root','12345678','sentimen');
    if(isset($_POST['update'])){
        $id=$_POST['id_admin'];
        $query = "UPDATE admin SET username = '$username', password = '$password' WHERE id_admin = '$id'";
        mysqli_query($link,$query);
        header("location:cart.php?update");
    }
    else if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($link,"DELETE FROM admin WHERE id_admin = '$id'");
        if (mysqli_affected_rows($link) < 1){
            $msg='error';
            $error=mysqli_error($link);
        }
        else{
            $msg='hapus';
            $error='sukses';
        }
        mysqli_query($link,"ALTER TABLE admin AUTO_INCREMENT = 1");
        header("location:cart.php?$msg=$error");
    }
    else{
        $query = "INSERT INTO admin (username,password) VALUES ('$username','$password')";
        mysqli_query($link,$query);
        header("location:cart.php?input");
    }
?>