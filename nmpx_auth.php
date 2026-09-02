<?php
// ============================================================
// NMPX - SHARED AUTHENTICATION
// Next Move Platform eXperience
// Learn. Connect. Grow. Succeed.
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
|--------------------------------------------------------------------------
| Check if user is logged in
|--------------------------------------------------------------------------
*/
function nmpx_logged_in()
{
    return isset($_SESSION['nmpx_logged_in']) &&
           $_SESSION['nmpx_logged_in'] === true;
}

/*
|--------------------------------------------------------------------------
| Protect a page
|--------------------------------------------------------------------------
*/
function nmpx_require_login()
{
    if (!nmpx_logged_in()) {
        header("Location: index.php");
        exit();
    }
}

/*
|--------------------------------------------------------------------------
| Login user
|--------------------------------------------------------------------------
*/
function nmpx_login($email, $password)
{
    $usersFile = __DIR__ . "/data/users.json";

    if (!file_exists($usersFile)) {
        return false;
    }

    $users = json_decode(
        file_get_contents($usersFile),
        true
    );

    if (!is_array($users)) {
        return false;
    }

    foreach ($users as $user) {

        if (
            isset($user['email']) &&
            strtolower($user['email']) === strtolower($email) &&
            isset($user['password']) &&
            password_verify($password, $user['password'])
        ) {

            $_SESSION['nmpx_logged_in'] = true;
            $_SESSION['nmpx_user'] = [
                'id'       => $user['id'] ?? '',
                'name'     => $user['name'] ?? 'NMPX User',
                'email'    => $user['email'],
                'role'     => $user['role'] ?? 'student'
            ];

            return true;
        }
    }

    return false;
}

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/
function nmpx_logout()
{
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {

        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();
}

/*
|--------------------------------------------------------------------------
| Get current user
|--------------------------------------------------------------------------
*/
function nmpx_user()
{
    return $_SESSION['nmpx_user'] ?? null;
}
?>