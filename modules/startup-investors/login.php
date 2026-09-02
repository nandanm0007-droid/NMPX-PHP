<?php
require_once 'config/db.php';
require_once 'config/functions.php';

if (is_logged_in()) redirect('dashboard.php');
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = "Invalid request.";
    } else {
        $email = strtolower(sanitize($_POST['email']));
        $password = $_POST['password'];

        $user = db_find_by('users', 'email', $email);

        if ($user) {
            if ($user['status'] === 'blocked') {
                $errors[] = "Your account has been blocked. Contact support.";
            } elseif (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'startup') {
                    $uid = $user['id'];
                    $mine = db_where('startups', function ($s) use ($uid) {
                        return $s['user_id'] == $uid;
                    });
                    $mine = db_sort($mine, 'id');
                    $_SESSION['profile_id'] = isset($mine[0]['id']) ? $mine[0]['id'] : null;
                } elseif ($user['role'] === 'investor') {
                    $inv = db_find_by('investors', 'user_id', $user['id']);
                    $_SESSION['profile_id'] = $inv ? $inv['id'] : null;
                }

                set_flash('success', 'Welcome back, ' . $user['name'] . '!');
                redirect($user['role'] === 'admin' ? 'admin/index.php' : 'dashboard.php');
            } else {
                $errors[] = "Invalid email or password.";
            }
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}

$page_title = "Login - InvestConnect";
include 'includes/header.php';
?>
<div class="form-wrapper">
  <h2 style="margin-bottom:20px;">Login to Your Account</h2>
  <?php foreach ($errors as $e): ?><div class="alert alert-error"><?= sanitize($e) ?></div><?php endforeach; ?>
  <form method="POST">
    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
    <div class="form-group"><label>Email</label><input type="email" name="email" required></div>
    <div class="form-group"><label>Password</label><input type="password" name="password" required></div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <p style="text-align:center;margin-top:16px;">Don't have an account? <a href="register.php">Register</a></p>
  </form>
</div>
<p style="text-align:center;color:var(--muted);margin-top:20px;">Default admin: admin@platform.com / Admin@123</p>
<?php include 'includes/footer.php'; ?>