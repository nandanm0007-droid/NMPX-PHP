<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_login();

$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

if ($role === 'admin') redirect('admin/index.php');

$page_title = "Dashboard - InvestConnect";
include 'includes/header.php';

if ($role === 'startup'):
    $myStartups = db_where('startups', function ($s) use ($user_id) {
        return $s['user_id'] == $user_id;
    });
    $myStartups = db_sort($myStartups, 'created_at');
    $myIds = array_column($myStartups, 'id');

    $totalInterests = db_count('interests', function ($i) use ($myIds) {
        return in_array($i['startup_id'], $myIds);
    });
    $totalRequests = db_count('approach_requests', function ($r) use ($myIds) {
        return in_array($r['startup_id'], $myIds);
    });
?>
<div class="dashboard-header">
  <h1>My Startup Dashboard</h1>
  <a href="submit-idea.php" class="btn btn-primary">+ Submit New Idea</a>
</div>

<div class="dashboard-grid">
  <div class="stat-box"><div class="stat-num"><?= count($myStartups) ?></div><p>Proposals Submitted</p></div>
  <div class="stat-box"><div class="stat-num"><?= $totalInterests ?></div><p>Investors Interested</p></div>
  <div class="stat-box"><div class="stat-num"><?= $totalRequests ?></div><p>Approach Requests</p></div>
  <div class="stat-box"><a href="browse-investors.php" class="btn btn-outline">Browse Investors</a></div>
</div>

<h2 style="margin-bottom:16px;">My Proposals <span style="font-size:0.9rem;color:var(--muted);font-weight:400;">(Listing Status)</span></h2>
<?php if (empty($myStartups)): ?>
  <div class="empty-state">You haven't submitted any proposals yet. <a href="submit-idea.php">Submit one now</a>.</div>
<?php else: ?>
<div class="table-wrapper">
<table>
  <tr><th>Company</th><th>Industry</th><th>Funding Needed</th><th>Status</th><th>Submitted</th><th>Actions</th></tr>
  <?php foreach ($myStartups as $s): ?>
  <tr>
    <td><?= sanitize($s['company_name']) ?></td>
    <td><?= sanitize($s['industry']) ?></td>
    <td><?= format_money($s['funding_amount']) ?></td>
    <td><span class="badge badge-<?= $s['status'] ?>"><?= $s['status'] ?></span></td>
    <td><?= date('d M Y', strtotime($s['created_at'])) ?></td>
    <td>
      <a href="startup-detail.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-outline">View</a>
      <form method="POST" action="delete-startup.php" style="display:inline;" class="confirm-action" data-confirm="Are you sure you want to permanently delete this proposal? This cannot be undone.">
        <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
        <input type="hidden" name="startup_id" value="<?= $s['id'] ?>">
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
<?php endif; ?>

<h2 style="margin:30px 0 16px;">Approach Requests I Sent <span style="font-size:0.9rem;color:var(--muted);font-weight:400;">(Investor's Response)</span></h2>
<div class="table-wrapper">
<?php
$myRequests = db_where('approach_requests', function ($r) use ($myIds) {
    return in_array($r['startup_id'], $myIds);
});
$myRequests = db_sort($myRequests, 'created_at');
if (empty($myRequests)): ?>
  <div class="empty-state">No approach requests sent yet.</div>
<?php else: ?>
<table>
  <tr><th>Startup</th><th>Investor</th><th>Type</th><th>Status</th><th>Date</th></tr>
  <?php foreach ($myRequests as $r):
      $inv = db_find('investors', $r['investor_id']);
      $stp = db_find('startups', $r['startup_id']);
  ?>
  <tr>
    <td><?= sanitize($stp ? $stp['company_name'] : '') ?></td>
    <td><?= sanitize($inv ? investor_display_name($inv) : '') ?></td>
    <td><?= sanitize($inv ? $inv['investor_type'] : '') ?></td>
    <td><span class="badge badge-<?= $r['status'] ?>"><?= $r['status'] ?></span></td>
    <td><?= date('d M Y', strtotime($r['created_at'])) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
</div>

<?php elseif ($role === 'investor'):
    $investor = db_find_by('investors', 'user_id', $user_id);
    $investor_id = $investor['id'];
    $prefSectors = array_filter(array_map('trim', explode(',', isset($investor['preferred_sectors']) ? $investor['preferred_sectors'] : '')));

    $allApproved = db_where('startups', function ($s) {
        return $s['status'] === 'approved';
    });
    $matched = array_filter($allApproved, function ($s) use ($prefSectors) {
        return in_array($s['industry'], $prefSectors);
    });
    $matched = db_sort($matched, 'created_at');
    $matches = array_slice($matched, 0, 6);

    $interestCount = db_count('interests', function ($i) use ($investor_id) {
        return $i['investor_id'] == $investor_id;
    });
    $requestCount = db_count('approach_requests', function ($r) use ($investor_id) {
        return $r['investor_id'] == $investor_id;
    });
    $totalStartups = count($allApproved);
?>
<div class="dashboard-header">
  <h1>Investor Dashboard</h1>
  <a href="browse-startups.php" class="btn btn-primary">Browse All Startups</a>
</div>

<div class="dashboard-grid">
  <div class="stat-box"><div class="stat-num"><?= $totalStartups ?></div><p>Total Startups</p></div>
  <div class="stat-box"><div class="stat-num"><?= $interestCount ?></div><p>Marked Interested</p></div>
  <div class="stat-box"><div class="stat-num"><?= $requestCount ?></div><p>Approach Requests Received</p></div>
  <div class="stat-box"><a href="investor-detail.php?id=<?= $investor_id ?>" class="btn btn-outline">My Profile</a></div>
</div>

<h2 style="margin-bottom:16px;">Startups Matching Your Sectors</h2>
<?php if (empty($matches)): ?>
  <div class="empty-state">No matching startups found yet. Update your preferred sectors or browse all startups.</div>
<?php else: ?>
<div class="grid-cards">
  <?php foreach ($matches as $s): ?>
  <div class="card">
    <h3><?= sanitize($s['company_name']) ?></h3>
    <div class="meta"><?= sanitize($s['industry']) ?> • <?= format_money($s['funding_amount']) ?></div>
    <p><?= sanitize(substr($s['problem_statement'], 0, 100)) ?>...</p>
    <div class="card-footer"><a href="startup-detail.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-outline">View Details</a></div>
  </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<h2 style="margin:30px 0 16px;">Approach Requests Received <span style="font-size:0.9rem;color:var(--muted);font-weight:400;">(Your Response)</span></h2>
<div class="table-wrapper">
<?php
$received = db_where('approach_requests', function ($r) use ($investor_id) {
    return $r['investor_id'] == $investor_id;
});
$received = db_sort($received, 'created_at');
if (empty($received)): ?>
  <div class="empty-state">No approach requests received yet.</div>
<?php else: ?>
<table>
  <tr><th>Startup</th><th>Message</th><th>Status</th><th>Date</th><th>Action</th></tr>
  <?php foreach ($received as $r): $stp = db_find('startups', $r['startup_id']); ?>
  <tr>
    <td><a href="startup-detail.php?id=<?= $r['startup_id'] ?>"><?= sanitize($stp ? $stp['company_name'] : '') ?></a></td>
    <td><?= sanitize(substr($r['message'],0,50)) ?></td>
    <td><span class="badge badge-<?= $r['status'] ?>"><?= $r['status'] ?></span></td>
    <td><?= date('d M Y', strtotime($r['created_at'])) ?></td>
    <td>
      <?php if ($r['status'] === 'pending'): ?>
      <form method="POST" action="respond-approach.php" style="display:inline;">
        <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
        <input type="hidden" name="request_id" value="<?= $r['id'] ?>">
        <button name="action" value="accepted" class="btn btn-sm btn-success">Accept</button>
        <button name="action" value="rejected" class="btn btn-sm btn-danger">Reject</button>
      </form>
      <?php else: ?><span class="meta">—</span><?php endif; ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
</div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>