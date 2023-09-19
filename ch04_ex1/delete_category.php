<?php
require_once('database.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

if ($category_id !== false) {
    $query1 = 'DELETE FROM categories
              WHERE categoryID = ?';
    $query2 = 'DELETE FROM products
                WHERE categoryID = ?';
    $statement = $db->prepare($query1);
    $statement->bindValue(1, $category_id);
    $success = $statement->execute();
    $statement = $db->prepare($query2);
    $statement->bindValue(1, $category_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

include('category_list.php');