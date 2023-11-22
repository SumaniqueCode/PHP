<?php
if (isset($_POST['submit'])) {
    if(isset($_POST['email']) && $_POST['password']){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone = &$_POST['phone'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="test_db1234567890"; //database name
        
    }
}
?>