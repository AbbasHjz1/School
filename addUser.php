<?php
        if (!empty($_POST["f_name"]) && !empty($_POST["l_name"]) && !empty($_POST["phone"]) && !empty($_POST["city"]) && !empty($_POST["email"]) && isset($_POST['userSubmit'])) {
            $fname =$_POST["f_name"];
            $lname =$_POST["l_name"];
            $phone =$_POST["phone"];
            $city =$_POST["city"];
            $email =$_POST["email"];
            
            require_once("connect_db.php");
            $sql = "INSERT INTO person (FN, LN, Phone, City, email)
            VALUES ('$fname', '$lname', '$phone', '$city', '$email')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
            
            
            
        }
        else
        {
             
        }
        ?>