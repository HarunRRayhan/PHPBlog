<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Loaction: login.php");
    exit();
}

require '../includes/db_connect.php';
/* 
 * This is testing Project for PHP Blog
 * So please push your improvisation  * 
 */

// Post Record Count
$post_count = $db->query("SELECT * FROM posts");
$comment_count = $db->query("SELECT * FROM comments");

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <div id="container">
        <div id="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Create New Post</a></li>
                <li><a href="#">Delete</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="#">Blog Homepage</a></li>
            </ul>
        </div>
        
        <div id="mainContent">
            <table>
                <tr>
                    <td>Total Blog Post</td>
                    <td><?php echo $post_count->num_rows;  ?></td>
                </tr>
                <tr>
                    <td>Total Comments</td>
                    <td><?php echo $comment_count->num_rows;  ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>