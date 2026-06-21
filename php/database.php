<?php


function getConnection(): mysqli
{


    $db_server = "localhost";
    $db_user = "Tobias";
    $db_pass = "mysql!!";
    $db_name = "school1";




    try {
        $conn = mysqli_connect(
            $db_server,
            $db_user,
            $db_pass,
            $db_name
        );
        return $conn;
    } catch (mysqli_sql_exception) {
        die("Could not connect! <br>");
    }
}
