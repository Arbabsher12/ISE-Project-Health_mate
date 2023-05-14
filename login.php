<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'login';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify the password
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $query = "SELECT * FROM users_data WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['Password'];

        // Verify the password
        if (verifyPassword($password, $hashedPassword)) {
            // Password is correct, perform further actions (e.g., redirect to another page)
            echo "Login successful!";
           // Redirect to another page
             header("Location: wellcome.php");
             exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Health Mate - Login</title>
    <script>
      function createNewAccount() {
        window.location.href = "register.php";
      }
    </script>
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
        <h1>Health Mate - Login</h1>
        <form method="POST"  id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <label for="username"> <b> E-mail </b>  </E-mail>:</label>
          <input type="email" id="username" name="email" placeholder="E-mail" required>
          <br>
          <label for="password"> <b> Password: </b> </label>
          <input type="password" id="password" name="password" placeholder="Password" required> <br>        
          <label for="show-password"><input type="checkbox" id="show-password"> Show password</label>

          <br><br>
          <input type="submit" value="Login">
          <input class="create-account" type="button" name="create_account" onclick="createNewAccount()" value="Create New Account"></input>
        </form>
        <script>
        function createNewAccount() {
        window.location.href = "register.php";
             }
    </script>
      </div>
    </div>
    <script>
      const passwordInput = document.getElementById("password");
      const showPasswordCheckbox = document.getElementById("show-password");
    
      showPasswordCheckbox.addEventListener("change", function() {
        if (showPasswordCheckbox.checked) {
          passwordInput.type = "text";
        } else {
          passwordInput.type = "password";
        }
      });
    </script>
    
  </body>
</html>