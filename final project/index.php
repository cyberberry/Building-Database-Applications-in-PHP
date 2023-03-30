<?php
require_once "pdo.php";
session_start();

?>
<html>

<head>
    <title>Давидова Олександра Артемівна</title>
</head>

<body>
    <h1>Welcome to the Automobiles Database</h1>
    <?php

    
        if (!isset($_SESSION['name'])) {
            echo "<p><a href='login.php'>Please log in</a></p>";
        } else {
            if ( isset($_SESSION['error']) ) {
                echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
                unset($_SESSION['error']);
            }
            if ( isset($_SESSION['success']) ) {
                echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
                unset($_SESSION['success']);
            }
           
            $stmt = $pdo->query("SELECT * FROM autos");
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row == false) {
                echo "No rows found";
            }
            echo "<table border='1'>";
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                echo "<tr><td>";
                echo(htmlentities($row['make']));
                echo("</td><td>");
                echo(htmlentities($row['model']));
                echo("</td><td>");
                echo(htmlentities($row['year']));
                echo("</td><td>");
                echo(htmlentities($row['mileage']));
                echo("</td><td>");
                echo('<a href="edit.php?auto_id='.$row['auto_id'].'">Edit</a> / ');
                echo('<a href="delete.php?auto_id='.$row['auto_id'].'">Delete</a>');
                echo("</td></tr>");
         
            }
            echo "</table>";
        }
    ?>
    <p> <a href="add.php">Add New Entry</a></p>
    <p><a href="logout.php">Logout</a>