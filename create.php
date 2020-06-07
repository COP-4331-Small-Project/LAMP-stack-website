<?php
// Include config file
require_once "api/connect_to_db.php";

// Define variables and initialize with empty values
$firstname = $lastname = $email = $phone = $house ="";
$firstname_err = $lastname_err = $email_err = $phone_err = $house_err ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate First Name
    $input_name = trim($_POST["firstName"]);
    if(empty($input_name)){
        $firstname_err = "Please enter a first name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstname_err = "Please enter a valid name.";
    } else{
        $firstname = $input_name;
    }
    // Validate Last Name
    $input_surname = trim($_POST["lastName"]);
    if(empty($input_surname)){
        $lastname_err = "Please enter a last name.";
    } elseif(!filter_var($input_surname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastname_err = "Please enter a valid last name.";
    } else{
        $lastname = $input_surname;
    }

    $input_email = $_POST["email"];
    // Function to validate email using regular expression
    function email_validation($input_email) {
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $input_email))
            ? FALSE : TRUE;
    }
    // Function call
    if(!email_validation($input_email)) {
        $email_err = "Invalid email address.";
    }
    else {
        $email = $input_email;
    }

    // Validate House
    $input_house = trim($_POST["house"]);
    if(empty($input_house)){
        $house_err = "Please enter your Hogwarts house.";
    } else{
        $house = $input_house;
    }


    /* OLD Validate email
    $input_email = trim($_POST["email"]);
    if(strpos($input_email, "@" or ".com" or ".edu" or ".net") !== true){
        $email_err = "Please enter an valid email.";
    } elseif (empty($input_email)) {
        $email_err = "Please enter an valid email.";
    } else{
        $email_err = $input_email;
    }
    */


    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($phone_err) && empty($house_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO u725926379_contactdb.Contacts (firstName, lastName, email, phoneNumber, house) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_lastname, $param_phone, $param_email, $param_house);

            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_phone = $phone;
            $param_house = $house;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: /home.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
    <body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create Contact</h2>
                </div>
                <p>Please fill this form and submit to add contact record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["92.249.44.207"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                        <label>First Name</label>
                        <input type="text" name="firstName" class="form-control" value="<?php echo $firstname; ?>">
                        <span class="help-block"><?php echo $firstname_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                        <label>Last Name</label>
                        <input type="text" name="lastName" class="form-control"> value="<?php echo $lastname; ?>">
                        <span class="help-block"><?php echo $lastname_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $email_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                        <label>Phone</label>
                        <input type="text" name="phoneNumber" class="form-control" value="<?php echo $phone; ?>">
                        <span class="help-block"><?php echo $phone_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($house_err)) ? 'has-error' : ''; ?>">
                        <label>House</label>
                        <input type="text" name="house" class="form-control"> value="<?php echo $house; ?>">
                        <span class="help-block"><?php echo $house_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="home.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>