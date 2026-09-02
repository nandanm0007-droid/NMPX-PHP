<?php

require_once "nmpx_auth.php";

if (nmpx_logged_in()) {

    header("Location: dashboard.php");

    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm = $_POST["confirm_password"] ?? "";
    $role = $_POST["role"] ?? "student";


    if ($name === "") {
        $errors[] = "Please enter your name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (strlen($password) < 6) {
        $errors[] =
            "Password must contain at least 6 characters.";
    }

    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }


    $dataFolder = __DIR__ . "/data";

    $usersFile = $dataFolder . "/users.json";


    if (!is_dir($dataFolder)) {

        mkdir(
            $dataFolder,
            0777,
            true
        );
    }


    if (!file_exists($usersFile)) {

        file_put_contents(
            $usersFile,
            json_encode(
                [],
                JSON_PRETTY_PRINT
            )
        );
    }


    $users = json_decode(
        file_get_contents($usersFile),
        true
    );


    if (!is_array($users)) {
        $users = [];
    }


    foreach ($users as $user) {

        if (
            isset($user["email"]) &&
            strtolower($user["email"]) ===
            strtolower($email)
        ) {

            $errors[] =
                "An account with this email already exists.";

            break;
        }
    }


    if (empty($errors)) {

        $newUser = [

            "id" =>
                count($users) + 1,

            "name" =>
                $name,

            "email" =>
                $email,

            "password" =>
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                ),

            "role" =>
                $role,

            "created_at" =>
                date("Y-m-d H:i:s")
        ];


        $users[] = $newUser;


        file_put_contents(

            $usersFile,

            json_encode(
                $users,
                JSON_PRETTY_PRINT
            ),

            LOCK_EX
        );


        $_SESSION["registration_success"] =
            "Account created successfully. Please login.";

        header("Location: index.php");

        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>NMPX | Create Account</title>

<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {

    min-height: 100vh;

    font-family: Arial, sans-serif;

    background:
        linear-gradient(
            135deg,
            #07111f,
            #111c35,
            #24134a
        );

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 25px;

    color: white;
}

.card {

    width: 100%;

    max-width: 500px;

    background:
        rgba(255,255,255,.08);

    border:
        1px solid
        rgba(255,255,255,.15);

    backdrop-filter: blur(20px);

    border-radius: 24px;

    padding: 40px;

    box-shadow:
        0 30px 80px
        rgba(0,0,0,.4);
}

.logo {

    text-align: center;

    font-size: 42px;

    font-weight: 900;

    letter-spacing: 4px;

    background:
        linear-gradient(
            90deg,
            #60a5fa,
            #8b5cf6,
            #ec4899
        );

    -webkit-background-clip: text;

    -webkit-text-fill-color: transparent;
}

.subtitle {

    text-align: center;

    color: #94a3b8;

    margin:
        5px 0 30px;
}

.form-group {

    margin-bottom: 18px;
}

label {

    display: block;

    margin-bottom: 7px;

    color: #cbd5e1;

    font-size: 14px;
}

input,
select {

    width: 100%;

    padding: 13px;

    border-radius: 10px;

    border:
        1px solid
        rgba(255,255,255,.15);

    background:
        rgba(0,0,0,.25);

    color: white;

    outline: none;

    font-size: 15px;
}

select option {

    color: black;

}

input:focus,
select:focus {

    border-color: #60a5fa;
}

.error {

    background:
        rgba(239,68,68,.12);

    border:
        1px solid
        rgba(239,68,68,.3);

    color: #fca5a5;

    padding: 12px;

    border-radius: 9px;

    margin-bottom: 15px;

    font-size: 14px;
}

.error p {

    margin-bottom: 4px;
}

.btn {

    width: 100%;

    padding: 14px;

    border: none;

    border-radius: 11px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #7c3aed
        );

    color: white;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    margin-top: 8px;
}

.login {

    text-align: center;

    margin-top: 20px;

    color: #94a3b8;

    font-size: 14px;
}

.login a {

    color: #60a5fa;

    text-decoration: none;

    font-weight: bold;
}

</style>

</head>

<body>

<div class="card">

    <div class="logo">
        NMPX
    </div>

    <p class="subtitle">
        Create your account
    </p>


    <?php if (!empty($errors)): ?>

        <div class="error">

            <?php foreach ($errors as $error): ?>

                <p>
                    • <?= htmlspecialchars($error) ?>
                </p>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <form method="POST">

        <div class="form-group">

            <label>
                Full Name
            </label>

            <input
                type="text"
                name="name"
                placeholder="Enter your full name"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="you@example.com"
                required
            >

        </div>


        <div class="form-group">

            <label>
                I am
            </label>

            <select name="role">

                <option value="student">
                    🎓 Student
                </option>

                <option value="jobseeker">
                    💼 Job Seeker
                </option>

                <option value="entrepreneur">
                    🚀 Entrepreneur
                </option>

                <option value="investor">
                    💰 Investor
                </option>

            </select>

        </div>


        <div class="form-group">

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Minimum 6 characters"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Confirm Password
            </label>

            <input
                type="password"
                name="confirm_password"
                placeholder="Re-enter password"
                required
            >

        </div>


        <button
            type="submit"
            class="btn">

            Create NMPX Account →

        </button>

    </form>


    <div class="login">

        Already have an account?

        <a href="index.php">
            Login
        </a>

    </div>

</div>

</body>

</html>