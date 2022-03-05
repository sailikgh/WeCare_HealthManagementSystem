<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $secans = $_POST['secans'];
    $secques = $_POST['secques'];
    $usertype = 'V';
    $email=$_POST['email'];

    if($password1==$password2)
    {
        $stmt = $con->prepare("select * from wc_user where user_name=?;");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) == 0)
        {
            $pass_encrypted = password_hash($password1, PASSWORD_DEFAULT);
            $stmt = $con->prepare("insert into wc_user (user_name, user_email, user_password, user_type, sec_q, sec_ans) values (?,?,?,?,?,?);");
            $stmt->bind_param("ssssss", $username, $email, $pass_encrypted, $usertype, $secques, $secans); 
            $stmt->execute();

            $stmt = $con->prepare("select LAST_INSERT_ID() as lastid;");
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $emp_id = $row['lastid'];
                }
            }


            $stmt = $con->prepare("insert into wc_userinfo (uid) values (?);");
            $stmt->bind_param("i", $emp_id); 
            $stmt->execute();
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Registered Successfully");'; 
            echo 'window.location.href = "visitor_login.php";';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("The username is already taken. Please try again.");'; 
            echo 'window.location.href = "visitor_login.php";';
            echo '</script>';
        }
        
    }
    else
    {
        echo '<script type="text/javascript">'; 
            echo 'alert("The passwords do not match. Please try again.");'; 
            echo 'window.location.href = "visitor_login.php";';
            echo '</script>';
    }
    

?>