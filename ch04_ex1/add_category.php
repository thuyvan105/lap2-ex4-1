<?php
// Add category

$category_name = filter_input(INPUT_POST, 'category_name');
if($category_name == null) {
    $error = "Please fill in the text field!";
    include('error.php');
} else {
require_once('database.php');
$query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';
$statement = $db->prepare($query);
$statement->bindValue(':category_name', $category_name);
$statement->execute();
$statement->closeCursor();
include('category_list.php');
}


?>