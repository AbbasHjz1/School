<?php
        if (!empty($_POST["S_name"]) && !empty($_POST["S_Semester"]) && isset($_POST['SubjectSubmit'])) {
            $S_name =$_POST["S_name"];
            $S_Semester =$_POST["S_Semester"];
            
            require_once("connect_db.php");
            $sql = "INSERT INTO subjects (names, semester)
            VALUES ('$S_name', '$S_Semester')";
            
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