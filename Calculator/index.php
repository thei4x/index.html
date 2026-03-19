<?php
session_start();

$valid_user = "admin";
$valid_pass = "1234";

if (isset($_POST['login'])) {
    if ($_POST['username'] === $valid_user && $_POST['password'] === $valid_pass) {
        $_SESSION['user'] = $valid_user;
    } else {
        $error = "Invalid login!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$result = "";
if (isset($_POST['calculate'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            $result = ($num2 != 0) ? $num1 / $num2 : "Cannot divide by zero";
            break;
        default:
            $result = "Select operation";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
    <style>
        /* Body */
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container box */
        .box {
            background: white;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }

        /* Heading */
        h2 {
            margin: 0 0 20px 0;
            font-weight: 700;
            font-size: 22px;
        }

        /* Inputs and select */
        input[type="text"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #1a73e8;
        }

        /* Button */
        button {
            width: 100%;
            padding: 12px 0;
            margin-top: 15px;
            background-color: #1a73e8;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #155bb5;
        }

        /* Result */
        h3 {
            margin-top: 20px;
            font-weight: 700;
            font-size: 18px;
        }

        /* Error */
        .error {
            color: #d93025;
            margin-top: 10px;
            font-weight: 600;
        }

        /* Logout link */
        a.logout-link {
            display: inline-block;
            margin-top: 18px;
            font-weight: 600;
            color: #1a73e8;
            text-decoration: none;
            cursor: pointer;
        }
        a.logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="box">

<?php if (!isset($_SESSION['user'])): ?>

    <h2>LOGIN</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required autocomplete="off">
        <input type="password" name="password" placeholder="Password" required autocomplete="off">
        <button type="submit" name="login">Login</button>
    </form>

    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

<?php else: ?>

    <h2>SIMPLE CALCULATOR</h2>

    <form method="POST">
        <input type="number" name="num1" placeholder="Enter first number" step="any" required>
        <input type="number" name="num2" placeholder="Enter second number" step="any" required>

        <select name="operation" required>
            <option value="">Select Operation</option>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>

        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php if ($result !== ""): ?>
        <h3>Result: <?php echo htmlspecialchars($result); ?></h3>
    <?php endif; ?>

    <a class="logout-link" href="?logout=true">Logout</a>

<?php endif; ?>

</div>

</body>
</html>
