<?php
    /*session_start();

    $err=0;
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        //header("Location: homepage.php");
        echo "Logged";
        exit;
    }*/

    require_once "config.php";
    /*$email=$password="";
    $email_err = $password_err = $login_err = "";*/
   
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT nome, email, password FROM UTENTE WHERE nome ='$nome' AND email ='$email' AND password ='$password'	";

	echo $sql;

    $result = $link -> query($sql);
    $row = $result -> fetch_assoc();

    if(empty($row['nome']) || empty($row['email']) || empty($row['password']))
    {
        echo "Credenziali errate.";
        header("Location: ../login.html");
    }
    else
    {
        echo "Credenziali corrette.";
        header("Location: ../homepage.html");
    }

    //mysqli_close($link);

//echo ": ".$row['c'];


    /*

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        if(empty(trim($_POST["email"]))) {
            $email_err="Please enter username";
            $err=-1;
            //echo json_encode(array("statusCode"=>201));
        }
        else {
            $email=trim($_POST["email"]);
            $_SESSION["email"]=$email;
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
            $err=-1;
            //echo json_encode(array("statusCode"=>201));
        } else{
            $password = trim($_POST["password"]);
        }

        if(empty($email_err)&&empty($password_err)) {
            $sql = "SELECT id, email, password FROM UTENTE WHERE email = ?";

            if($stmt=mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                $param_email=$email;

                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt)==1){
                        mysqli_stmt_bind_result($stmt, $id, $email, $hased_password);
                        if(mysqli_stmt_fetch($stmt)) {
                            if(password_verify($password, $hased_password)) {
                                session_start();

                                $_SESSION["loggedin"]=true;
                                $_SESSION["id"]=$id;
                                $_SESSION["email"]=$email;
                                
                                //echo json_encode(array("statusCode"=>200));
                                //echo('Login');
                                $err=1;

                                //header("location: ../index.html");
                            } else {
                                $login_err="Username o password incorretti";
                                //echo json_encode(array("statusCode"=>201));
                            }
                        }
                    } else {
                        $login_err="Username o password errati";
                        $err=-1;
                        //echo json_encode(array("statusCode"=>201));
                    }
                } else {
                    //echo "Oops! Qualcosa é andato storto.";
                    $err=-1;
                    //echo json_encode(array("statusCode"=>201));
                }

                mysqli_stmt_close($stmt);
            }
        }

        if($err==1){
            echo "Login";
        }
        else echo "Error";

        mysqli_close($link);
    }*/

?>