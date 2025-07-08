<?php
require_once('includes/auth_check.php');
require_once('includes/db.php');
$message = '';

if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $middle = $conn->real_escape_string($_POST['middle_name']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $age = (int)$_POST['age'];
    $email = $conn->real_escape_string($_POST['email']);
    $msg = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_form (name, middle_name, surname, age, email, message)
            VALUES ('$name', '$middle', '$surname', $age, '$email', '$msg')";

    if ($conn->query($sql)) {
        $message = "<span class='success'> Message Sent Successfully!</span>";
    } else {
        $message = "<span class='error'> Error: " . $conn->error . "</span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Colorful Contact Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 550px;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(30px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h2 {
            text-align: center;
            color: #333;
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 28px;
            margin-bottom: 25px;
        }

        input, textarea {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #ff7eb3;
            background-color: #f9f9f9;
            outline: none;
            box-shadow: 0 0 6px rgba(255, 126, 179, 0.4);
        }

        textarea {
            resize: none;
        }

        button {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            color: white;
            font-weight: bold;
            padding: 14px;
            border: none;
            border-radius: 10px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #ff7eb3, #ff758c);
        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
            margin-top: 15px;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;
            margin-top: 15px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            color: #ff758c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form method="post">
            <input type="text" name="name" placeholder="First Name" required>
            <input type="text" name="middle_name" placeholder="Middle Name">
            <input type="text" name="surname" placeholder="Surname">
            <input type="number" name="age" placeholder="Age" min="1" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5"></textarea>
            <button type="submit" name="submit">Send</button>
        </form>

        <p><?= $message ?></p>
        <a class="back-link" href="dashboard.php">⬅ Back to Dashboard</a>
    </div>
</body>
</html>
