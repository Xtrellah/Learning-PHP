<?php

// Connecting PHP to a database
// We need a tool to create a connection between PHP and MySQL

// PDO - PHP Data Object
// When your googling, ignore anything to do with the mysql() and the mysqli()

// PDO allows us to connection to a database and run SQL queries against it
// PDO is built in class
$db = new PDO('mysql:host=db;dbname=counter-site', 'root', 'password');
// This line tells PDO to give us results as associative arrays - we always want to have it
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Preparing to execute a query
// The query has not run yet
$query = $db->prepare('SELECT * FROM `cases`;');
// To actually run it:
$query->execute();
// To get the results:
$cases = $query->fetchAll();
// Now $children contains an array of arrays - we can use it like we would any other array

echo '<ul>';
foreach ($cases as $child) {
    echo "<li>{$child['name']} - {$child['class']}</li>";
}
echo '</ul>';