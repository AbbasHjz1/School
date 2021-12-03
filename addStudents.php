?>

<?php
if ( $_POST['subjectList'] != '' && (isset($_POST['StudentSubmit']))){
    require_once("connect_db.php");
    $studentsList = preg_replace('/[^0-9.]+/', '', $_POST["studentsList"]);
    $subjectList = $_POST['subjectList'];
    $sql = "INSERT INTO students (id_Person, specification)
    VALUES ('$studentsList', '$subjectList')";
    
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    $_POST["studentsList"] = '';
    $_POST['subjectList'] = '';
    exit();
}else
echo"sadas";


?>