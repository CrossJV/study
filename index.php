<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'posts';


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$urlCom = 'https://jsonplaceholder.typicode.com/comments';
$urlPost = 'https://jsonplaceholder.typicode.com/posts';
$dataPost = file_get_contents($urlPost);
$dataCom = file_get_contents($urlCom);
$posts = json_decode($dataPost, true);
$comments = json_decode($dataCom, true);

$countPost = 0;
$countComment = 0;

foreach ($posts as $key => $arr)
{

    $sql = "INSERT INTO posts (id, userId, title, body)
            VALUES ('$arr[id]', '$arr[userId]', '$arr[title]', '$arr[body]')";

    $countPost++;
    $conn->query($sql);

}

foreach ($comments as $key => $arr)
{
    $sql = "INSERT INTO comments (id, postId, name, email, body)
            VALUES ('$arr[id]', '$arr[postId]', '$arr[name]', '$arr[email]', '$arr[body]')";

    $countComment++;
    $conn->query($sql);
}

$message = 'Загружено '. $countPost .' записей и '. $countComment .' комментариев';

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log(' " . $output . "' );</script>";
}

debug_to_console($message);

?>

<html>
<body>

<form action="phpSearch.php" method="post">
    Search <input type="text" name="search"><br>
    <input type ="submit">
</form>

</body>
</html>

