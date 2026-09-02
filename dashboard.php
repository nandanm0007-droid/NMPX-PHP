<?php

require_once "nmpx_auth.php";

nmpx_require_login();

$user = nmpx_user();

$name = $user["name"] ?? "User";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>NMPX | Dashboard</title>

<style>

* {

    margin: 0;

    padding: 0;

    box-sizing: border-box;
}

body {

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    background: #f5f7fb;

    color: #111827;
}

/* HEADER */

header {

    height: 70px;

    background:
        linear-gradient(
            135deg,
            #111827,
            #1e1b4b
        );

    color: white;

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding: 0 5%;

    position: sticky;

    top: 0;

    z-index: 100;
}

.logo {

    font-size: 25px;

    font-weight: 900;

    letter-spacing: 2px;

    color: #60a5fa;
}

.logo span {

    color: #c4b5fd;
}

.nav {

    display: flex;

    align-items: center;

    gap: 20px;
}

.nav a {

    color: #cbd5e1;

    text-decoration: none;

    font-size: 14px;
}

.logout {

    background: #dc2626;

    color: white !important;

    padding: 8px 15px;

    border-radius: 8px;
}

/* HERO */

.hero {

    background:
        linear-gradient(
            135deg,
            #1e3a8a,
            #4f46e5,
            #7c3aed
        );

    color: white;

    padding: 60px 5%;

    position: relative;

    overflow: hidden;
}

.hero h1 {

    font-size: 40px;

    margin-bottom: 10px;
}

.hero p {

    color: #ddd6fe;

    font-size: 17px;
}

/* CONTAINER */

.container {

    max-width: 1250px;

    margin: auto;

    padding: 45px 5%;
}

.section-title {

    text-align: center;

    margin-bottom: 10px;

    font-size: 28px;
}

.section-sub {

    text-align: center;

    color: #6b7280;

    margin-bottom: 35px;
}

/* MODULES */

.modules {

    display: grid;

    grid-template-columns:
        repeat(
            3,
            1fr
        );

    gap: 25px;
}

.card {

    background: white;

    border-radius: 20px;

    padding: 30px;

    box-shadow:
        0 8px 30px
        rgba(0,0,0,.08);

    border:
        1px solid #e5e7eb;

    transition: .3s;

    position: relative;

    overflow: hidden;
}

.card::before {

    content: "";

    position: absolute;

    top: 0;

    left: 0;

    right: 0;

    height: 5px;

    background:
        linear-gradient(
            90deg,
            #2563eb,
            #7c3aed
        );
}

.card:hover {

    transform:
        translateY(-7px);

    box-shadow:
        0 18px 40px
        rgba(0,0,0,.13);
}

.icon {

    font-size: 50px;

    margin-bottom: 20px;
}

.card h2 {

    font-size: 21px;

    margin-bottom: 10px;

    color: #1e293b;
}

.card p {

    color: #64748b;

    line-height: 1.7;

    min-height: 80px;
}

.card ul {

    list-style: none;

    margin:
        20px 0;
}

.card li {

    padding: 7px 0;

    color: #475569;

    font-size: 14px;
}

.card li::before {

    content: "✓ ";

    color: #10b981;

    font-weight: bold;
}

.card-btn {

    display: block;

    text-align: center;

    padding: 12px;

    border-radius: 10px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #7c3aed
        );

    color: white;

    text-decoration: none;

    font-weight: bold;
}

/* STATS */

.stats {

    display: grid;

    grid-template-columns:
        repeat(4,1fr);

    gap: 15px;

    margin-bottom: 45px;
}

.stat {

    background: white;

    padding: 20px;

    border-radius: 14px;

    text-align: center;

    box-shadow:
        0 5px 20px
        rgba(0,0,0,.05);
}

.stat strong {

    display: block;

    font-size: 28px;

    color: #4f46e5;
}

.stat span {

    color: #64748b;

    font-size: 13px;
}

/* FOOTER */

footer {

    background: #111827;

    color: #94a3b8;

    text-align: center;

    padding: 30px;

    margin-top: 50px;
}

footer strong {

    color: #60a5fa;
}

@media(max-width:900px) {

    .modules {

        grid-template-columns: 1fr;
    }

    .stats {

        grid-template-columns:
            repeat(2,1fr);
    }
}

@media(max-width:600px) {

    .nav a:not(.logout) {

        display: none;
    }

    .hero h1 {

        font-size: 30px;
    }

}

</style>

</head>

<body>


<header>

    <div class="logo">

        NMP<span>X</span>

    </div>

    <div class="nav">

        <a href="dashboard.php">
            Dashboard
        </a>

        <a href="logout.php"
           class="logout">

            Logout

        </a>

    </div>

</header>


<section class="hero">

    <h1>
        Welcome, <?= htmlspecialchars($name) ?> 👋
    </h1>

    <p>
        Your next move starts here.
        Learn. Connect. Grow. Succeed.
    </p>

</section>


<div class="container">


    <div class="stats">

        <div class="stat">

            <strong>3</strong>

            <span>
                Career Platforms
            </span>

        </div>

        <div class="stat">

            <strong>40+</strong>

            <span>
                Job Opportunities
            </span>

        </div>

        <div class="stat">

            <strong>∞</strong>

            <span>
                Learning Opportunities
            </span>

        </div>

        <div class="stat">

            <strong>1</strong>

            <span>
                Unified Platform
            </span>

        </div>

    </div>


    <h2 class="section-title">

        Your Next Move Starts Here

    </h2>

    <p class="section-sub">

        Choose the platform that matches
        your current goal.

    </p>


    <div class="modules">


        <!-- AI CAREER -->

        <div class="card">

            <div class="icon">
                🤖
            </div>

            <h2>
                AI Career Mentor
            </h2>

            <p>

                Discover suitable career paths,
                identify skills to learn and
                generate your personalized
                career roadmap.

            </p>

            <ul>

                <li>
                    Career analysis
                </li>

                <li>
                    Skill recommendations
                </li>

                <li>
                    Learning roadmap
                </li>

                <li>
                    Courses & certifications
                </li>

            </ul>

            <a
                href="modules/ai-career/career-mentor.php"
                class="card-btn">

                Explore Career Mentor →

            </a>

        </div>


        <!-- CAREER CONNECT -->

        <div class="card">

            <div class="icon">
                💼
            </div>

            <h2>
                CareerConnect
            </h2>

            <p>

                Find suitable jobs,
                explore companies,
                apply for opportunities
                and track your applications.

            </p>

            <ul>

                <li>
                    Job search
                </li>

                <li>
                    Smart job matching
                </li>

                <li>
                    Job applications
                </li>

                <li>
                    Career dashboard
                </li>

            </ul>

            <a
                href="modules/career-connect/currier.php"
                class="card-btn">

                Explore CareerConnect →

            </a>

        </div>


        <!-- STARTUP -->

        <div class="card">

            <div class="icon">
                🚀
            </div>

            <h2>
                Startup Investors
            </h2>

            <p>

                Discover startups,
                explore investment opportunities
                and connect entrepreneurs
                with investors.

            </p>

            <ul>

                <li>
                    Browse startups
                </li>

                <li>
                    Browse investors
                </li>

                <li>
                    Submit startup idea
                </li>

                <li>
                    Investor connections
                </li>

            </ul>

            <a
                href="modules/startup-investors/index.php"
                class="card-btn">

                Explore Startups →

            </a>

        </div>


    </div>

</div>


<footer>

    <strong>NMPX</strong>

    — Next Move Platform eXperience

    <br><br>

    Learn. Connect. Grow. Succeed.

</footer>

</body>

</html>