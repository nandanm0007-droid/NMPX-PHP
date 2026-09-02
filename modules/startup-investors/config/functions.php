<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token !== null ? $token : '');
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        redirect(base_url() . 'login.php');
    }
}

function require_role($role) {
    require_login();
    if ($_SESSION['role'] !== $role) {
        redirect(base_url() . 'dashboard.php');
    }
}

function sanitize($str) {
    return htmlspecialchars(trim($str !== null ? $str : ''), ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function set_flash($type, $message) {
    $_SESSION['flash'][$type] = $message;
}

function get_flash() {
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return [];
}

function format_money($num) {
    if ($num === null || $num === '') return 'N/A';
    return '₹' . number_format((float)$num, 0);
}

function base_url() {
    $script = $_SERVER['SCRIPT_NAME'];
    $path = str_replace('\\', '/', dirname($script));

    if (basename($path) === 'admin') {
        $path = dirname($path);
    }

    if ($path === '/' || $path === '\\' || $path === '.') {
        return '/';
    }
    return rtrim($path, '/') . '/';
}

/**
 * Returns organization name if set, otherwise falls back to the investor's
 * personal name (since an investor can just be an individual person).
 */
function investor_display_name($investor) {
    if (!empty($investor['organization_name'])) {
        return $investor['organization_name'];
    }
    $user = db_find('users', $investor['user_id']);
    return $user ? $user['name'] : 'Individual Investor';
}