<?php

// The "require_once 'resource/database.php';" statement below is pulling the database.php for
// use in this page. Open database.php and take a look. Notice that database.php establishes a
// connection to your database and stores that connection into a variable called $db. By including
// database.php on this page we have access to the $db connection. We pass $db into a function
// to make the connection and query the database.

require_once 'resource/database.php';

// Here is an example of a function for retrieving all of something from database from a specific
// table.The returned $results can be captured on the frontend and looped over to display in html.
// Replace "database_name_here" with the name of your database and replace "database_table_here" with
// the name of the table you are wishing to retrieve data from.

function get_all_of_something($db)
{
    $sql = "SELECT * FROM database_name_here.database_table_here";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


// This function is used for displaying an array on the frontend in a nice, easy to read format
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
