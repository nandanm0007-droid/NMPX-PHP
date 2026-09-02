<?php
// includes/header.php
require_once __DIR__ . '/../config/functions.php';
$flash = get_flash();
$page_title = $page_title ?? 'Startup-Investor Connect';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= sanitize($page_title) ?></title>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>
<body>
<nav class="navbar">
  <div class="container">
    <a href="<?= base_url() ?>index.php" class="logo">🚀 InvestConnect</a>
    <button class="nav-toggle">☰</button>
    <div class="nav-links">
      <a href="<?= base_url() ?>browse-startups.php">Browse Startups</a>
      <a href="<?= base_url() ?>browse-investors.php">Browse Investors</a>
      <?php if (is_logged_in()): ?>
        <?php if ($_SESSION['role'] === 'admin'): ?>
          <a href="<?= base_url() ?>admin/index.php">Admin Panel</a>
        <?php else: ?>
          <a href="<?= base_url() ?>dashboard.php">Dashboard</a>
        <?php endif; ?>
        <a href="<?= base_url() ?>logout.php" class="btn btn-outline btn-sm">Logout</a>
      <?php else: ?>
        <a href="<?= base_url() ?>login.php">Login</a>
        <a href="<?= base_url() ?>register.php" class="btn btn-primary btn-sm">Register</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container" style="padding-top:20px;">
<?php foreach ($flash as $type => $msg): ?>
  <div class="alert alert-<?= sanitize($type) ?>"><?= sanitize($msg) ?></div>
<?php endforeach; ?>
</div>