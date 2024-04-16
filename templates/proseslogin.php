<?php

    session_start();
    $host="localhost";
    $user="root";
    $password="";
    $database="sentimen";
    $query = mysqli_connect($host, $user, $password, $database);
    if(isset($_POST['submit']))
    {
        $username  = $_POST['username'];
        $password     = $_POST['password'];
        $pass = md5('$password');
        $data   = mysqli_query($query, "select * from admin WHERE username='$username' AND password='$password'");
        $check  = mysqli_num_rows($data);
        $row    = mysqli_fetch_assoc($data);
        
        if ($check>0) 
            {
                /*dikirimkan nilai sesuai dengan yang kita input yang nantinya akan dibawa $_SESSION dan di check di bagiea sessioncheck.php*/
                $_SESSION['username']=$username;
                $_SESSION['password']=$pass;
                header("\index2");
            }
        else
            {
                echo $username . " " . $password;
                header("{{ url_for('proseslogin') }}?msg=gagal");
            }
    }
?>

