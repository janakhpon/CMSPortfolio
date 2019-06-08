<?php


/** ----------------------  = Helper functions = ---------------------- */

function clean($string)
{
    return htmlentities($string);
}


function redirect($location)
{
    return header("Location: {$location}");
}


function set_message($message)
{
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}


function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


function token_generator()
{
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}



function validation_errors($error_message)
{

    $error_message = <<<DELIMITER

        <div class="alert alert-success bg-danger text-white small alert-dismissible fade show" role="alert">
               $error_message
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>

DELIMITER;

    return $error_message;
}




function email_exists($email)
{

    $sql = "SELECT id from user WHERE email = '$email'";
    $result = query($sql);
    if (row_count($result) == 1) {

        return true;
    } else {

        return false;
    }
}



function username_exists($username)
{

    $sql = "SELECT id from user WHERE username = '$username'";
    $result = query($sql);
    if (row_count($result) == 1) {
        return true;
    } else {

        return false;
    }
}




function send_email($email, $subject, $msg, $headers)
{

    if (mail($email, $subject, $msg, $headers)) { }
}


/** ----------------------  = End Helper functions = ---------------------- */


/** ----------------------  = Validation functions = ---------------------- */

function validate_user_registration()
{

    $errors = [];
    $min = 3;
    $max = 30;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = clean($_POST['name']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);
        $confirm_password = clean($_POST['confirm_password']);


        if (strlen($name) < $min) {
            $errors[] = "username should not be less than {$min} characters";
        }

        if (username_exists($name)) {
            $errors[] = "username already exists!";
        }


        if (strlen($name) > $max) {
            $errors[] = "First name should not be more than {$max} characters";
        }


        if (strlen($email) > $max) {
            $errors[] = "Email should not be more than {$max} characters";
        }


        if (email_exists($email)) {
            $errors[] = "Email already exists!";
        }

        if ($password !== $confirm_password) {
            $errors[] = "Password fields do not match!";
        }





        if (!empty($errors)) {

            foreach ($errors as $error) {

                echo validation_errors($error);
            }
        } else {
            if (register_user($name, $email, $password)) {

                set_message("<div class='alert alert-success bg-success text-white small alert-dismissible fade show' role='alert'>
               Your account is registered now! Please login here
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                 </button>
         </div>");
                redirect("Page_login.php");
            } else {

                set_message("<div class='alert alert-success bg-success text-white small alert-dismissible fade show' role='alert'>
                Failed to register!
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
             </div>");
                redirect("Page_register.php");
            }
        }
    }
}





/** ----------------------  = End Validation functions = ---------------------- */


/** ----------------------  = Start Registration functions = ---------------------- */



function register_user($name, $email, $password)
{

    $name = escape($name);
    $email = escape($email);
    $password = escape($password);


    if (email_exists($email)) {

        return false;
    } else if (username_exists($name)) {

        return false;
    } else {

        $password = md5($password);

        $sql = "INSERT INTO `user` (`username`, `email`, `password`)";
        $sql .= " VALUES ( '$name', '$email', '$password');";
        $result = query($sql);

        return true;
    }
}








/** ----------------------  = End Registration functions = ---------------------- */






/** ----------------------  = Start Validate Login functions = ---------------------- */



function validate_user_login()
{

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = clean($_POST['name']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);


        if (empty($name)) {
            $name[] = "Name can't be blanked!";
        }

        if (empty($email)) {
            $errors[] = "Email can't be blanked!";
        }

        if (empty($password)) {
            $errors[] = "Password can't be emptied";
        }



        if (!empty($errors)) {

            foreach ($errors as $error) {

                echo validation_errors($error);
            }
        } else {

            if (login_user($name, $email, $password)) {

                redirect("Page_login.php");
            } else {


                echo validation_errors("You got fucking wrong creditionals");
            }
        }
    }
}





/** ----------------------  = End Validate login functions = ---------------------- */

/** ----------------------  = Start login function = ---------------------- */

function login_user($name, $email, $password)
{

    $sql = "SELECT password,id FROM user WHERE email = '" . escape($email) . "' AND username = '".escape($name)."'";
    $result = query($sql);

    if (row_count($result) == 1) {

        $row = fetch_array($result);
        $db_password = $row['password'];

        if (md5($password) == $db_password) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];

            return true;
        } else {

            return false;
        }

        return true;
    } else {

        return false;
    }
}

/** ----------------------  = End login function = ---------------------- */


/** ----------------------  = Project Validation functions = ---------------------- */

function validate_project_insertion()
{

    $errors = [];
    $min = 2;
    $max = 30;
    $Dmax = 40;
    $lmin = 10;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $image     = $_FILES["image"]["name"];
        $target    = "uploads/".basename($_FILES["image"]["name"]);
        $name = clean($_POST['name']);
        $language = clean($_POST['language']);
        $description = clean($_POST['description']);
        $hosted = clean($_POST['hosted']);
        $link = clean($_POST['link']);


        if (strlen($name) < $min) {
            $errors[] = "project name should not be less than {$min} characters";
        }

    

        if (strlen($name) > $max) {
            $errors[] = "project name should not be more than {$max} characters";
        }


        if (strlen($language) < $min) {
            $errors[] = "Programming language name should not be less than {$min} characters";
        }

    

        if (strlen($language) > $max) {
            $errors[] = "Programming language name should not be more than {$max} characters";
        }


        if (strlen($description) < $Dmax) {
            $errors[] = "Description should not be less than {$Dmax} characters";
        }

        if (strlen($link) < $lmin) {
            $errors[] = "Address link should not be less than {$lmin} characters";
        }

        if(empty($image)){
            $errors[] = " Image is not acceptable";
        }
      


        if (!empty($errors)) {

            foreach ($errors as $error) {

                echo validation_errors($error);
            }
        } else {
            if (insert_project($image,$target, $name, $language, $description, $hosted, $link )) {

                set_message("<div class='alert alert-success bg-success text-white small alert-dismissible fade show' role='alert'>
               Added to Project list !
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                 </button>
         </div>");
                redirect("Page_projects.php");
            } else {

                set_message("<div class='alert alert-success bg-success text-white small alert-dismissible fade show' role='alert'>
                Failed to register!
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
             </div>");
                redirect("Page_admin.php");
            }
        }
    }
}





/** ----------------------  = End Project Validation functions = ---------------------- */


/** ----------------------  = Start Project Insertion functions = ---------------------- */



function insert_project($image,$target, $name, $language, $description, $hosted, $link)
{

    $image;
    $target;
    $user_id = $_SESSION['id'];
    $name = escape($name);
    $date = time();
    $language = escape($language);
    $description = escape($description);
    $hosted = escape($hosted);
    $link = escape($link);


    

        $sql = "INSERT INTO project (`user_id`, `image`, `language`,`name`, `description`, `hosted`,`date`, `link`)";
        $sql .= " VALUES ($user_id, '$image', '$language', '$name', '$description', '$hosted', '$date', '$link')";
        move_uploaded_file($_FILES["image"]["tmp_name"],$target);
        $result = query($sql);

        return true;
    
}








/** ----------------------  = End Project Insertion functions = ---------------------- */

















































































































/** ----------------------  = Start logged session function = ---------------------- */


function logged_in()
{
    if (isset($_SESSION['email']) || isset($_COOKIE['email'])) {

        return true;
    } else {
        return false;
    }
}


/** ----------------------  = End logged session function = ---------------------- */






/** ----------------------  = Start Password Recovery function = ---------------------- */



function recover_password()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        if (isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

            $email = escape($_POST['email']);

            if (email_exists($email)) {

                $validation_code = md5($email);
                setcookie('temp_access_code', $validation_code, time() + 300);



                $sql = "UPDATE users SET validation_code ='" . escape($validation_code) . "' WHERE email = '" . escape($email) . "'";
                $result = query($sql);



                $subject = "Please reset your password";
                $message = "Here is your account reset code 
                {$validation_code}
                Click here to reset your password http://localhost/code.php?email=$email&code$validation_code
                ";
                $headers = "From: noreply@greentech.com";


                if (!send_email($email, $subject, $message, $headers)) {

                    echo validation_errors("could not send the provided email!");
                }

                set_message("<p class='bg-success text-center'>Check your inbox or in spam folder for reset code!</p>");
                redirect("index.php");
            }
        } else {
            redirect("index.php");
        }


        if(isset($_POST['cancel_submit'])){


            redirect("login.php");

        }


    }
}



/** ----------------------  = End Password Recovery function = ---------------------- */



/** ----------------------  = Start Reset Code Validation function = ---------------------- */



function validation_code()
{


    if (isset($_COOKIE['temp_access_code'])) {



        if (!isset($_GET['email']) && !isset($_GET['code'])) {


            redirect("index.php");
        } else if (empty($_GET['email']) || empty($_GET['code'])) {

            redirect("index.php");
        } else {

            if (isset($_POST['code'])) {
                $email = clean($_GET['email']);
                $validation_code = clean($_POST['code']);
                $sql = "SELECT id FROM users WHERE validation_code = '" . escape($validation_code) . "' AND email = '" . escape($email) . "'";

                $result = query($sql);

                if (row_count($result) == 1) {

                    redirect("reset.php?email=$email&code=$validation_code");
                } else {

                    echo validation_errors("Wrong credentials!");
                }
            }
        }
    } else {
        set_message("<p class='bg-danger text-center'>Sorry failed to perform!</p>");
        redirect("recover.php");
    }
}


/** ----------------------  = End Reset Code Validation function = ---------------------- */





/** ----------------------  = Start Password Reset function = ---------------------- */







function password_reset()
{


    if (isset($_COOKIE['temp_access_code'])) {

        if (isset($_GET['email']) && isset($_GET['code'])) {

            if (isset($_SESSION['token']) && isset($_POST['token'])) {


                if ($_POST['token'] === $_SESSION['token']) {


                    if($_POST['password'] === $_POST['confirm_password']){

                        $updated_password = md5($_POST['password']);
                        $sql = "UPDATE users SET password = '".escape($updated_password)."' validation_code = 0 WHERE email = '".escape($_GET['email'])."'";
                        query($sql);

                        set_message("<p class='bg-success text-center'>Password has changed!</p>");
                        redirect("login.php");


                    }

                   

                    
                 }
            }
        } else {


            echo set_message("<div class='alert alert-danger' role='alert'>Your Code session has expired!</div>");

            redirect("recover.php");
        }
    }
}








/** ----------------------  = End Password Reset function = ---------------------- */
