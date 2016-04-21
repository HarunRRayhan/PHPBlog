<?php 
session_start();   
if(isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pwrd = $_POST['password'];
        
        // Database connection
        
        require '../includes/db_connect.php';
        
        if(empty($user) || empty($pwrd)) {
            echo 'Missing Information';
        } else {
            $user = strip_tags($user);
            $user = $db->real_escape_string($user);
            $pwrd = strip_tags($pwrd);
            $pwrd = $db->real_escape_string($pwrd);
            $pwrd = md5($pwrd);
            
            $query= $db->query("SELECT user_id, username FROM user WHERE username = '{$user}' AND password = '{$pwrd}'");
            
            
            if($query->num_rows() === 1 ) {
                while($row = $query->fetch_object()) {
                    $_SERVER['user_id'] = $row->user_id;
                }
                
                header("Location: index.php");
                exit();
            } else {
                echo 'Missing Information';
            }
        }
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div id="container">
        <form action="login.php" method="POST">
            <p>
                <label for="username">Username: </label><input type="text" name="username" />                
            </p>
            <p>
                <label for="password">Password: </label><input type="password" name="password" />                
            </p>
            <input type="submit" value="LogIn" name="submit"/>
        </form>
    </div>
</body>
</html>