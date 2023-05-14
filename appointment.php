<?php
// Database configuration
$host = 'localhost';
$dbName = 'login';
$username = 'root';
$password = '';

// Establish a database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone'];
    $preferredDate = $_POST['date'];
    $preferredTime = $_POST['time'];
    $cardName = $_POST['cardName'];
    $cardNumber = $_POST['cardNumber'];
    $cardExpiry = $_POST['expiry'];
    $cardCVV = $_POST['cvv'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO appointments (name, email, phone, date , time , name_card, card_number, expire_date , card_cvv, message ) VALUES ($fullName, $email, $phoneNumber, $preferredDate, $preferredTime, $cardName, $cardNumber, $cardExpiry, $cardCVV, $message)");
    $stmt->execute([$fullName, $email, $phoneNumber, $preferredDate, $preferredTime, $cardName, $cardNumber, $cardExpiry, $cardCVV, $message]);

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        echo "Appointment booked successfully.";
    } else {
        echo "Error: Failed to book the appointment.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Booking</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #82c7a5;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    main {
      margin: 20px;
      display: flex;
      justify-content: center;
    }

    form {
      width: 500px;
      padding: 30px;
      background-color: #f4f4f4;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input,
    textarea {
      width: 100%;
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    textarea {
      resize: none;
    }

    button {
      padding: 10px 20px;
      background-color: #82c7a5;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    button:hover {
      background-color: #71b394;
    }

    footer {
      background-color: #82c7a5;
      color: #fff;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <h1> Appointment Booking</h1>
  </header>
  <main>
    <form action="" method="post">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="date">Preferred Date:</label>
      <input type="date" id="date" name="date" required>

      <label for="time">Preferred Time:</label>
      <input type="time" id="time" name="time" required>

      <h2>Secure Payment Details</h2>
      <label for="cardName">Name on Card:</label>
      <input type="text" id="cardName" name="cardName" required>

      <label for="cardNumber">Card Number:</label>
      <input type="text" id="cardNumber" name="cardNumber" required>

      <label for="expiry">Card Expiry Date:</label>
      <input type="text" id="expiry" name="expiry" required>

      <label for="cvv">Card CVV:</label>
      <input type="text" id="cvv" name="cvv" required>

      <label for="message"> message:</label>
      <textarea id="message" name="message" rows="4" placeholder="Add any special instructions or messages here..."></textarea>

      <button type="submit">Book Appointment</button>

    </form>
  </main>
  <footer>
    <p>&copy; 2023 Appointment Booking. All rights reserved.</p>
    <p>Privacy Policy | Terms of Service</p>
  </footer>
</body>
</html>
