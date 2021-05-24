<?php
$tableName = "Policies";
$dbName = "Insurance";
getOrCreateDB($dbName);
getOrCreateTable($tableName, $dbName);
if (!empty($_POST['Name'])) {
    //For Register Form
    insertToTable($tableName, $dbName);
    verifyCredentials($tableName, $dbName);
} else {
    //For login form
    verifyCredentials($tableName, $dbName);
}
function verifyCredentials($tableName, $dbName)
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $connection = new mysqli($serverName, $userName, $password, $dbName);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $email = $_POST['Email'];
    $sql = "SELECT * from $tableName WHERE email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<br>id: " . $row["id"] . " - Name: " . $row["fullname"] . "<br>";
        }
    } else {
        echo "0 results";
        header("Location: http://localhost/ELearning_Website_Bootstrap/Register.html");
    }
    $connection->close();
}


function insertToTable($tableName, $dbName)
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $connection = new mysqli($serverName, $userName, $password, $dbName);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $policy = $_POST['Policy'];
    $policyDescription = $_POST['PolicyDescription'];
    echo "<br> $name $email $policy $policyDescription";
    $sql = "INSERT INTO $tableName (fullname,email,policyNumber,policyDescription) VALUES('$name','$email','$policy','$policyDescription')";
    if ($connection->query($sql) === true) {
        echo "<br>Created User $name";
    }
}



function getOrCreateTable($tableName, $dbName)
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $connection = new mysqli($serverName, $userName, $password, $dbName);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        policyNumber int(6) UNIQUE,
        policyDescription VARCHAR(50) NOT NULL
        )";
    if ($connection->query($sql) === TRUE) {
        echo "<br>Table $tableName created successfully";
    }
    $connection->close();
}


function getOrCreateDB($dbName)
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $connection = new mysqli($serverName, $userName, $password);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($connection->query($sql) === true) {
        echo "Created $dbName";
    } else {
        echo "$connection->error";
    }
    $connection->close();
}
