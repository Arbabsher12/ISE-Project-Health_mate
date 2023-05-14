<?php
// Connect to the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "login";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$email_error = "";
$first_name = "";
$last_name = "";
$email = "";
$password = "";

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $first_name = $_POST["fname"];
// Process form data if it was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
     

    // Check if the email already exists in the database
    $query = "SELECT * FROM users_data WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email already exists, display error message
        $email_error = "Email already exists in the database";
        
    } else {
        
        // Email doesn't exist, validate the password and store the user data in the database
        $password_length = strlen($password);
        $has_alphabets = preg_match('/[a-zA-Z]/', $password);
        $has_numbers = preg_match('/\d/', $password);
        $has_uppercase = preg_match('/[A-Z]/', $password);

        if ($password_length >= 8 && $has_alphabets && $has_numbers && $has_uppercase) {
            // Password is valid, hash it and store the user data in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users_data (`first name`, `last name`, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Data added successfully, display success message
                echo ("Data added successfully");
            } else {
                // Data couldn't be added, display error message
                $error_message = "Data couldn't be added to the database";
            }
        } else {
            // Password is invalid, display error message
            $password_error = "Password must be at least 8 characters long and contain at least 1 uppercase letter, 1 lowercase letter, and 1 number";
        }
        if(empty($password_error) && empty($email_error))
        {
          header("Location :wellcome.php" );
          exit();
        }

    }
   
}   
 
// Close the database connection
mysqli_close($conn);



?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <title>Health Mate -Registration</title>
    <style>
      body {
        background-color: #0B2161; /* dark blue */
        font-family: Arial, sans-serif;
        color: #fff; /* white */
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      .left-panel {
        position: absolute;
        top: 0;
        left: 0;
        width: 50vw;
        height: 100vh;
        transform-origin: left bottom;
        transform: skew(-15deg);
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .logo-container {
       position: relative;
       width: 50vw;
       height: 100vh;
       display: flex;
       justify-content: center;
        align-items: center;
       }

      .logo {
       max-width: 80%;
       max-height: 80%;
      }
      .right-panel {
        position: absolute;
        top: 0;
        right: 0;
        width: 55%;
        height: 100vh;
        transform-origin: right bottom;
        transform: skew(-15deg);
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
      }


      .login-form {
        width: 70%;
        margin: 0 30px;
        background-color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        color: #0B2161; /* dark blue */
        transform: skew(15deg); 
      }
      h1 {
        text-align: center;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="email"],
      input[type="password"],
      input[type="text"]
      {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 2px solid:#0B2161; /* dark blue*/
        color: #0B2161; /* dark blue */
      }
      input[type="email"]::placeholder,
      input[type="password"]::placeholder {
        color: #0B2161; /* dark blue */
      }
      input[type="email"]::placeholder {
        content: "E-mail";
      }
      input[type="password"]::placeholder {
        content: "Password";
      }
      input[type="submit"] {
        background-color: #0B2161; /* dark blue */
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        float: left; /* added to align button to the left */
      }
      input[type="submit"]:hover {
        background-color: #fff;
        color: #0B2161; /* dark blue */
      }
      input[type="email"] {
        width: 50%;
      }
      input[type="password"], input[type="text"] {
        width: 50%;
      }
      .create-account {
        background-color: #0B2161; /* dark blue */
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        float: left; /* added to align button to the left */
        margin-left: 20px ;
        margin-right: auto;
      }
      .create-account:hover {
        background-color: #fff;
        color: #0B2161; /* dark blue */
      }
      label, input {
			display: block;
			margin-bottom: 2px;
		}
		.error-message {
			color: red;
			font-size: 14px;
			margin-top: 5px;
		}
	</style>
    </style>
  </head>
  <body>
    <div class="left-panel">
      <div class="logo-container">
        <img src="https://drive.google.com/uc?export=download&id=1ZN3qIbCcAD8f51FSpF2x79ePhi-1JkWT" alt="Health Mate Logo" class="logo">
      </div>
    </div>
    
    <div class="right-panel">
      <div class="login-form">
        <h1>Create an Account</h1>
        <form action="" method="POST" id="registration" autocomplete="off" action="">

         <input type="text" id="fname" name="fname" placeholder="First Name" required>

         <input type="text" id="lname" name="lname" placeholder="Last Name" required>

         <input type="email" id="email" name="email" placeholder="Email" required>
         <p style="color: red;"><?php echo  $email_error ; ?>
        </p>

         <input type="password" id="password" name="password" placeholder="Password" required>
         <span id="password-error" style="display: none; color: red;">Password must be at least 8 characters long, contain letters and numbers, and include at least one uppercase letter.</span>
         <br><br>

         <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>

         <label for="show-password">
         <input type="checkbox" id="show-password"> Show Password
         </label>

         <input type="submit" value="Create Account" name="createAccount" onclick="validate_password()" >
         </form>

          
      </div>
     </div>
     
    <script> 
      const password = document.getElementById("password");
      const confirm_password = document.getElementById("confirm_password");
      const showPasswordCheckbox = document.getElementById("show-password");
    
      showPasswordCheckbox.addEventListener("change", function() {
        if (showPasswordCheckbox.checked) {
          password.type = "text";
          confirm_password.type = "text";
        } else {
          password.type = "password";
          confirm_password.type= "password" ;
       }
      });
    </script>



     <script>
     function  validate_password()
      {
        var password = document.getElementById("password") ;
        var confirm_password = document.getElementById("confirm_password");
        
       
        if(confirm_password.value !== password.value)
        {
          alert("Password and Confirm password do not match! please try again");
          event.preventDefault();       
        }
        
      }
    </script>
    

     <script>
        const form = document.querySelector('form');
        const emailField = document.querySelector('#email');
        const emailError = document.querySelector('#email-error');
        const passwordField = document.querySelector('#password');
        const passwordError = document.querySelector('#password-error');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Check if email already exists
            const email = emailField.value;
            fetch(`check_email.php?email=${email}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        emailError.style.display = 'inline';
                    } else {
                        emailError.style.display = 'none';
                    }
                });

            // Check if password is valid
            const password = passwordField.value;
            const passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,}$/;
            if (!passwordRegex.test(password)) {
                passwordError.style.display = 'inline';
            } else {
                passwordError.style.display = 'none';
                form.submit();
            }
        });
    </script>



  </body>
</html>

