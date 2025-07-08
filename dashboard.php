<?php
require_once('includes/auth_check.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #c9ffbf, #ffafbd);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            background: #ffffffdd;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .dashboard-container h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .dashboard-container p {
            font-size: 18px;
            color: #34495e;
            margin-bottom: 30px;
        }

        .dashboard-container a {
            display: inline-block;
            text-decoration: none;
            background-color: #e74c3c;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .dashboard-container a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
    <p>This is a protected dashboard page.</p>
    <a href="contact.php">move to next step</a>
</div>

</body>
</html>
