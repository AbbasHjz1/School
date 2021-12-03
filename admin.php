

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <button onclick=addAdmin() type="button" id="buttonAdmin" class="btn btn-default bg-primary">Add Admin</button>
    <button onclick=addUser() type="button" id="buttonUser" class="btn btn-default bg-primary">Add User</button>
    <button onclick=addSubject() type="button" id="buttonSubject" class="btn btn-default bg-primary">Add Subject</button>
    <button onclick=addStudent() type="button" id="buttonStudents" class="btn btn-default bg-primary">Add Students</button>
    <div id="formUser" class="container p-5 mt-5 bg-warning" style="display: none;">
        <form action="addUser.php" method="POST" id="tempFrom">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="f_name" name="f_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="l_name" name="l_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="userSubmit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div id="formSubject" class="container p-5 mt-5 bg-danger" style="display: none;">
        <form action="admin.php" method="POST" id="tempFrom">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="S_name" name="S_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Semester</label>
                <input type="text" class="form-control" id="S_Semester" name="S_Semester" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="SubjectSubmit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div id="formStudent" class="container p-5 mt-5 bg-danger" style="display: none;">
        <form action="addStudents.php" method="POST" id="addStudentsFrom">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Student's List</label>
                <select class="form-select" name="studentsList" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php
                    require_once("connect_db.php"); 
                    $sql = "SELECT id,FN, LN from person";
                    $result = $conn->query($sql);  
                    while($row = $result->fetch_assoc()) {
                            echo "<option>".$row["id"]. " " .$row["FN"]. " ".$row["LN"]. "</option>";
                        }  
                        ?> 
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Semester</label>
                <select class="form-select" name="subjectList" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php 
                    $sql1 = "SELECT names from subjects";
                    $result1 = $conn->query($sql1);  
                    while($row1 = $result1->fetch_assoc()) {
                            echo "<option>" .$row1["names"]. "</option>";
                        }  
                        ?> 
                </select>
            </div>
            <button type="submit" name="StudentSubmit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script>
    const btnAdmin = document.getElementById("buttonAdmin");
    const btnUser = document.getElementById("buttonUser");
    const formUser = document.getElementById("formUser");
    const formSubject = document.getElementById("formSubject");
    const formStudent = document.getElementById("formStudent");

    function addUser() {
        formUser.style.display = "block";
        formSubject.style.display = "none";
        formStudent.style.display = "none";
    }

    function addSubject() {
        formSubject.style.display = "block";
        formUser.style.display = "none";
        formStudent.style.display = "none";
    }
    function addStudent(){
        formSubject.style.display = "none";
        formUser.style.display = "none";
        formStudent.style.display = "block";
    }
</script>
<?php
        if (!empty($_POST["S_name"]) && !empty($_POST["S_Semester"]) && isset($_POST['SubjectSubmit'])) {
            $S_name =$_POST["S_name"];
            $S_Semester =$_POST["S_Semester"];
            
            require_once("connect_db.php");
            $sql = "INSERT INTO subjects (names, semester)
            VALUES ('$S_name', '$S_Semester')";
            
            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
            
            
            
        }
        ?>
