<?php
require_once __DIR__ . '/../config/functions.php';
require_role('admin');
$flash = get_flash();
$page_title = $page_title ?? 'Admin Panel';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= sanitize($page_title) ?></title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
.admin-wrap{display:flex;min-height:100vh;}
.admin-sidebar{width:230px;background:#111827;color:#fff;padding:20px 0;flex-shrink:0;}
.admin-sidebar a{display:block;padding:12px 24px;color:#d1d5db;}
.admin-sidebar a:hover,.admin-sidebar a.active{background:#1f2937;color:#fff;}
.admin-sidebar h3{padding:0 24px 20px;color:#818cf8;}
.admin-content{flex:1;padding:30px;}
</style>
</head>
<body>
<div class="admin-wrap">
  <aside class="admin-sidebar">
    <h3>⚙ Admin Panel</h3>
    <a href="index.php">Dashboard</a>
    <a href="manage-users.php">Manage Users</a>
    <a href="manage-startups.php">Manage Startups</a>
    <a href="manage-investors.php">Manage Investors</a>
    <a href="../index.php">View Site</a>
    <a href="../logout.php">Logout</a>
  </aside>
  <main class="admin-content">
  <?php foreach ($flash as $type => $msg): ?>
    <div class="alert alert-<?= sanitize($type) ?>"><?= sanitize($msg) ?></div>
  <?php endforeach; ?>