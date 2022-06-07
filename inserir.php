<?php 

include "com.php";

$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image'];

// echo "$title <br> $description";

move_uploaded_file($image['tmp_name'], 'uploads/' .$image['name']);

$up_image = 'uploads/' .$image['name'];

// preparar  
$stmt = $connect->prepare("INSERT INTO posts
(title, description, image) VALUES (:title, :description,: image");

// trocar 
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':image', $up_image);

// executar
$stmt->execute();

header("location: index.php");

 ?>