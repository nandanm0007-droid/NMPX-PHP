<?php
require_once '../config/db.php';
require_once '../config/functions.php';
$page_title = "Admin Dashboard";
include 'header.php';

$users = db_all('users');
$startups = db_all('startups');
$investors = db_all('investors');

$pendingStartups = array_filter($startups, function ($s) {
    return $s['status'] === 'pending';
});

$stats = [
    'users' => count($users),
    'startups' => count($startups),
    'investors' => count($investors),
    'pending_startups' => count($pendingStartups),
    'requests' => db_count('approach_requests'),
    'interests' => db_count('interests'),
];
?>
<h1 style="margin-bottom:24px;">Platform Analytics</h1>
<div class="dashboard-grid">
  <div class="stat-box"><div class="stat-num"><?= $stats['users'] ?></div><p>Total Users</p></div>
  <div class="stat-box"><div class="stat-num"><?= $stats['startups'] ?></div><p>Total Startups</p></div>
  <div class="stat-box"><div class="stat-num"><?= $stats['investors'] ?></div><p>Total Investors</p></div>
  <div class="stat-box"><div class="stat-num"><?= $stats['pending_startups'] ?></div><p>Pending Approvals</p></div>
  <div class="stat-box"><div class="stat-num"><?= $stats['requests'] ?></div><p>Approach Requests</p></div>
  <div class="stat-box"><div class="stat-num"><?= $stats['interests'] ?></div><p>Total Interests</p></div>
</div>

<h2 style="margin:30px 0 16px;">Recent Sign-ups</h2>
<div class="table-wrapper">
<table>
<tr><th>Name</th><th>Email</th><th>Role</th><th>Joined</th></tr>
<?php
$recent = array_slice(db_sort($users, 'created_at'), 0, 10);
foreach ($recent as $u): ?>
<tr>
  <td><?= sanitize($u['name']) ?></td>
  <td><?= sanitize($u['email']) ?></td>
  <td><span class="badge badge-approved"><?= $u['role'] ?></span></td>
  <td><?= date('d M Y', strtotime($u['created_at'])) ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>
<?php include 'footer.php'; ?>