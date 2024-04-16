<?php  
    session_start();
    /*berfungsi untuk check apakah sudah melakukan login atau belum, jika belum maka akan dikembalikan ke halaman login diawal. kondisi if hanya menggunakan
    syarat email dikarenakan ketika login harus memasukkan email dan password,jadi dalam check hanya perlu dicheck email nya saja apakah sudah terinput atau belum.*/
    if(empty($_SESSION['username'])){
        header('{{ url_for('login') }}?msg=belumlogin');
    }
?>