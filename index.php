        <?php
        
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        
        if (!empty($username) && !empty($pwd) && isset($_POST['submit'])) {
            require_once("connect_db.php");
            $stmt = $conn->prepare("SELECT roles
            FROM login_table 
            WHERE username = ? AND pass = ?");
            
            
            $stmt->bind_param("ss", $username, $pwd);
            $username = $_POST["username"];
            $pwd = $_POST["pwd"];
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION["user_name"] = trim($username);
                    $_SESSION["role"] = (string)$row['roles'];
                    
                    if ($row['roles'] == 0){
                        header("Location: admin.php");
                        exit();
                    }
                    elseif ($row['roles'] == 1){ 
                        header("Location: user/user.php");
                    }
                } else
                    echo "the user name doesn't exist";
                
                
            }
         else {
            echo 'please Enter Username & Passwrod';
            
        }
        ?>