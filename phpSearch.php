<?php
$search = $_POST['search'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'posts';


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts JOIN comments ON comments.postId = posts.id WHERE comments.body LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc() ){
        echo "<b>Заголовок:</b>".$row["title"]." <b>Комментарий: </b>".$row["body"]."<br>";
    }
} else {
    echo "0 records";
}

$conn->close();

?>