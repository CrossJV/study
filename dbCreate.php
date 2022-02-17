<?php
$conn = new mysqli('localhost', 'root', 'root', 'posts');



$conn->query('CREATE TABLE posts (
    id INT PRIMARY KEY,
    userId INT NOT NULL,
    title VARCHAR (255) NOT NULL,
    body TEXT (255) NOT NULL)');

$conn->query('CREATE TABLE comments (
    id INT PRIMARY KEY,
    postId INT NOT NULL,
    name VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    body TEXT (255) NOT NULL,
    FOREIGN KEY (postId) REFERENCES posts(id))');
