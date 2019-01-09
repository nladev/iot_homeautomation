<?php
    include 'config/config.php';
    
    session_start();
    
    $user = $_POST['username'];
    $passwd = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE user='$user' AND passwd='$passwd'";
    $result = $connection->query($sql);
    if(mysqli_num_rows($result)>0){
        while ($data = $result->fetch_array()){
            $name = $data['name'];
        }
        $_SESSION['name'] = $name;
        $_SESSION['access'] = "true";
        
        echo 'login_ok';
    }else{
        unset($_SESSION['name']);
        unset($_SESSION['access']);
        echo 'login_error';
    }
?>

