<?php

// Connecting PHP to a database
// We need a tool to create a connection between PHP and MySQL

// PDO - PHP Data Object
// When your googling, ignore anything to do with the mysql() and the mysqli()

// PDO allows us to connection to a database and run SQL queries against it
// PDO is built in class
$db = new PDO('mysql:host=db;dbname=social', 'root', 'password');
// This line tells PDO to give us results as associative arrays - we always want to have it
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Preparing to execute a query
// The query has not run yet
$query = $db->prepare('SELECT `users`.`id` AS `user_id`, `users`.`username`, `posts`.`title`, `posts`.`image` 
                                FROM `users` 
                                LEFT JOIN `posts` 
                                ON `users`.`id` = `posts`.`user_id`;');
// To actually run it:
$query->execute();
$users = $query->fetchAll();


echo '<ul>';
foreach ($users as $user) {
    echo "<li>{$user['username']} - {$user['id']}</li>";
    echo "<li>{$user['title']} - {$user['user_id']}</li>";
    echo "<img alt='image' src='{$user['image']}'/>";
}
echo '</ul>';