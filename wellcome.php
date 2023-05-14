<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMate - Your Health Companion</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }
        
        header {
            background-color: #82c7a5;
            padding: 1.5rem;
            text-align: center;
        }
        
        header h1 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 1rem;
        }
        
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            margin-bottom: 1rem;
        }
        
        nav ul li {
            margin-right: 1rem;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 700;
        }
        
        nav ul li a:hover {
            color: #333;
            transition: 0.3s;
        }
        
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #82c7a5;
        }
        
        p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .cta-buttons button {
            background-color: #82c7a5;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1.1rem;
            padding: 0.5rem 1.5rem;
            margin-right: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cta-buttons button:hover {
            background-color: #5ea582;
        }
        
        
        footer {
            margin-top: 150px;
            background-color: #82c7a5;
            padding: 1rem;
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>HealthMate</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="appointment.php">Book Appointment</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#"> | Login</a></li>
            </ul>
        </nav>
    </header>
   
    <main>
        <h2>Welcome to HealthMate - Your Health Companion</h2>
        <p>At HealthMate, our mission is to help you live a healthier, happier life by providing personalized health and wellness advice, resources, and support. We offer a wide range of services, from fitness classes to nutrition counseling, to help you achieve your wellness goals.</p>
        <p>Explore our website to learn more about our services and how we can help you on your journey to better health.</p>
    </main>
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2023 HealthMate. All rights reserved. | Privacy Policy | Terms of Service</p>
        </div>
    </footer>
</body>
</html>
