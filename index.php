<?php

require_once "nmpx_auth.php";

if (nmpx_logged_in()) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {

        $error = "Please enter your email and password.";

    } elseif (nmpx_login($email, $password)) {

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Invalid email or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>NMPX | Login</title>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {

    min-height: 100vh;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    background:
        radial-gradient(
            circle at 10% 20%,
            rgba(59,130,246,.25),
            transparent 35%
        ),

        radial-gradient(
            circle at 90% 80%,
            rgba(139,92,246,.25),
            transparent 35%
        ),

        #07111f;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 30px;
}

.container {

    width: 100%;

    max-width: 1100px;

    display: grid;

    grid-template-columns: 1fr 420px;

    gap: 70px;

    align-items: center;
}

/* BRAND */

.brand h1 {

    font-size: 78px;

    letter-spacing: 6px;

    font-weight: 900;

    background:
        linear-gradient(
            90deg,
            #60a5fa,
            #8b5cf6,
            #ec4899
        );

    -webkit-background-clip: text;

    -webkit-text-fill-color: transparent;

    margin-bottom: 5px;
}

.brand h2 {

    font-size: 22px;

    color: #cbd5e1;

    font-weight: 400;

    margin-bottom: 22px;
}

.slogan {

    font-size: 24px;

    font-weight: 800;

    margin-bottom: 22px;
}

.description {

    max-width: 600px;

    color: #94a3b8;

    font-size: 17px;

    line-height: 1.8;
}

.features {

    display: flex;

    flex-wrap: wrap;

    gap: 10px;

    margin-top: 30px;
}

.feature {

    padding: 10px 15px;

    border-radius: 30px;

    background:
        rgba(255,255,255,.07);

    border:
        1px solid
        rgba(255,255,255,.1);

    color: #cbd5e1;

    font-size: 13px;
}

/* LOGIN */

.login-card {

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
        rgba(0,0,0,.45);
}

.login-card h2 {

    font-size: 28px;

    margin-bottom: 7px;
}

.subtitle {

    color: #94a3b8;

    margin-bottom: 28px;
}

.form-group {

    margin-bottom: 20px;
}

label {

    display: block;

    color: #cbd5e1;

    font-size: 14px;

    margin-bottom: 8px;
}

input {

    width: 100%;

    padding: 14px 15px;

    border-radius: 11px;

    border:
        1px solid
        rgba(255,255,255,.15);

    background:
        rgba(0,0,0,.25);

    color: white;

    outline: none;

    font-size: 15px;
}

input:focus {

    border-color: #60a5fa;

    box-shadow:
        0 0 0 3px
        rgba(96,165,250,.15);
}

.login-btn {

    width: 100%;

    padding: 15px;

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

    font-weight: 800;

    cursor: pointer;

    transition: .3s;
}

.login-btn:hover {

    transform: translateY(-2px);

    box-shadow:
        0 12px 30px
        rgba(99,102,241,.4);
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

    margin-bottom: 20px;

    font-size: 14px;
}

.register {

    text-align: center;

    margin-top: 22px;

    color: #94a3b8;

    font-size: 14px;
}

.register a {

    color: #60a5fa;

    font-weight: bold;

    text-decoration: none;
}

@media(max-width:800px) {

    .container {

        grid-template-columns: 1fr;

        gap: 35px;
    }

    .brand {

        text-align: center;
    }

    .brand h1 {

        font-size: 55px;
    }

}

</style>

</head>

<body>

<div class="container">

    <!-- LEFT -->

    <div class="brand">

        <h1>NMPX</h1>

        <h2>
            Next Move Platform eXperience
        </h2>

        <div class="slogan">

            Learn. Connect. Grow. Succeed.

        </div>

        <p class="description">

            Your all-in-one platform for
            career discovery, skill development,
            job opportunities and startup
            connections.

        </p>

        <div class="features">

            <div class="feature">
                🤖 AI Career Mentor
            </div>

            <div class="feature">
                💼 Career Connect
            </div>

            <div class="feature">
                🚀 Startup Investors
            </div>

        </div>

    </div>


    <!-- LOGIN -->

    <div class="login-card">

        <h2>Welcome Back 👋</h2>

        <p class="subtitle">
            Continue your next move.
        </p>

        <?php if ($error): ?>

            <div class="error">

                <?= htmlspecialchars($error) ?>

            </div>

        <?php endif; ?>


        <form method="POST">

            <div class="form-group">

                <label>
                    Email Address
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
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-btn">

                Login to NMPX →

            </button>

        </form>


        <div class="register">

            Don't have an account?

            <a href="register.php">
                Create Account
            </a>

        </div>

    </div>

</div>

</body>

</html>