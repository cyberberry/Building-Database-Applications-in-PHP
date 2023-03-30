

<head>
    <title>Давидова Олександра Артемівна</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
        integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<?php
    session_start();
    require "pdo.php";
    if ( ! isset($_SESSION['name']) ) {
        die('Not logged in');
    } else {
        $name = $_SESSION['name'];
    }
?>

<body>
    <div class="container">
        <h1>Tracking Autos for <?php echo htmlentities($name); ?></h1>
        <h2>Automobiles</h2>
        <p>
            <a href="autos.php">Add New</a>
            |
            <a href="logout.php">Logout</a>

        </p>
        <?php
            if (isset($_SESSION['success'])) {
                echo "<p style='color: green'>".$_SESSION['success']."</p>";
                unset($_SESSION['success']);
            }
        ?>
        <ul>
            <?php

                $statement = $pdo->query("SELECT auto_id, make, year, mileage FROM autos");

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li> ";
                    echo $row['year']." ";
                    echo htmlentities($row['make'])." / ";
                    echo $row['mileage'];
                    echo "</li>";
                }
            ?>
        </ul>
    </div>
</body>

</html>