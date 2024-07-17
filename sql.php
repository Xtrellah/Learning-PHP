<?php

// Connecting PHP to a database
// We need a tool to create a connection between PHP and MySQL

// PDO - PHP Data Object
// When your googling, ignore anything to do with the mysql() and the mysqli()

// PDO allows us to connection to a database and run SQL queries against it
// PDO is built in class
$db = new PDO('mysql:host=db;dbname=exercise', 'root', 'password');
// This line tells PDO to give us results as associative arrays - we always want to have it
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


//// add another color:
/// //// NEVER EVER PASS A VARIABLE INTO A QUERY THIS IS HOW YOU GET HACKED
//$inputtedColour = 'Magenta';
//
//$query = $db->prepare("INSERT INTO `colors` (`color`) VALUES ('$inputtedColour')");
//
//if ($query->execute()) {
//    echo 'added';
//} else {
//    echo 'didnt work';
//}


// Check to make sure the form was submitted before we add the colour to the DB
if (isset($_POST['colour'])) {
    $inputtedColour = $_POST['colour'];

    // Anytime you need to get a variable into a query, whether it's a insert or not makes no difference
    // you must use a placeholder like :color
    $query = $db->prepare("INSERT INTO `colors` (`color`) VALUES (:colour)");

    // You must then pass an assoc array into execute where the keys are the placeholders
    // and the values are the variables you need to use
    if ($query->execute(['colour' => $inputtedColour])) {
        echo 'New colour added to the DB';
    } else {
        echo 'Oh no';
    }
}

// ANOTHER WAY USING BIND PARAMAS:
//if (isset($_POST['colour'])) {
//    $inputtedColour = $_POST['colour'];
//
//    // Anytime you need to get a variable into a query, whether it's a insert or not makes no difference
//    // you must use a placeholder like :color
//    $query = $db->prepare("INSERT INTO `colors` (`color`) VALUES (:colour)");
//
//    // using bindParam does the same as passing the array into execute
//    $query->bindParam('colour', $inputtedColour);
//
//    // You must then pass an assoc array into execute where the keys are the placeholders
//    // and the values are the variables you need to use
//    if ($query->execute()) {
//        echo 'New colour added to the DB';
//    } else {
//        echo 'Oh no';
//    }
//}
?>

<form method="post">
    <label for="colour">Colour</label>
    <input type="text" id="colour" name="colour" />
    <input type="submit" value="Add a new colour" />
</form>

<?php
// Preparing to execute a query
// The query has not run yet
$query = $db->prepare('SELECT * FROM `children`;');
// To actually run it:
$query->execute();
// To get the results:
$children = $query->fetchAll();
// Now $children contains an array of arrays - we can use it like we would any other array

echo '<ul>';
foreach ($children as $child) {
    echo "<li>{$child['name']} - {$child['DOB']}</li>";
}
echo '</ul>';



