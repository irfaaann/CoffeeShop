<?php

    define("DB_SERVER","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME","ytest");
    //define("DB_SERVER")


    // Create connection
    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if ($conn->connect_error) {
        die('echo <script>alert("Connection Failed")</script>'. $conn->connect_error);
    }
    else{
        $query="create table if not exists user(
            id int AUTO_INCREMENT PRIMARY KEY,
            name varchar(255),
            username varchar(255) UNIQUE,
            password varchar(255) NOT NULL,
            email varchar(255) NOT NULL UNIQUE,
            phone varchar(255),
            address varchar(255)
        );";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        //echo '<script>alert("Connection Successful")</script>';
    }

?>