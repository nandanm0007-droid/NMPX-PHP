<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_login();

$errors = [];

if (isset($_GET['investor_id']) && $_SESSION['role'] === 'startup') {
    $investor_id = intval($_GET['investor_id']);
    $uid = $_SESSION['user_id'];
    $myStartups = db_where('startups', function ($s) use ($uid) {
        return $s['user_id'] == $uid;
    });
    $investor = db_find('investors', $investor_id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verify_csrf_token(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '')) {
            $errors[] = "Invalid request.";
        } else {
            $startup_id = intval($_POST['startup_id']);
            $message = sanitize($_POST['message']);

            $owned = array_filter($myStartups, function ($s) use ($startup_id) {
                return $s['id'] == $startup_id;
            });
            if (!$owned) {
                $errors[] = "Invalid startup selected.";
            } else {
                db_insert('approach_requests', [
                    'startup_id' => $startup_id, 'investor_id' => $investor_id,
                    'message' => $message, 'status' => 'pending'
                ]);
                set_flash('success', 'Approach request sent successfully!');
                redirect('approach-request.php');
            }
        }
    }

    $page_title = "Send Approach Request";
    include 'includes/header.php';
    ?>
    <div class="form-wrapper">
      <h2>Send Approach Request to <?= sanitize($investor ? investor_display_name($investor) : '') ?></h2>
      <?php foreach ($errors as $e): ?><div class="alert alert-error"><?= sanitize($e) ?></div><?php endforeach; ?>
      <?php if (empty($myStartups)): ?>
        <div class="alert alert-info">You need to <a href="submit-idea.php">submit a proposal</a> first.</div>
      <?php else: ?>
      <form method="POST">
        <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
        <div class="form-group">
          <label>Select Your Startup</label>
          <select name="startup_id" required>
            <?php foreach ($myStartups as $s): ?><option value="<?= $s['id'] ?>"><?= sanitize($s['company_name']) ?></option><?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea name="message" rows="5" required placeholder="Introduce your startup and why you'd like their investment..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send Request</button>
      </form>
      <?php endif; ?>
    </div>
    <?php include 'includes/footer.php'; ?>
<?php
    exit;
}

$page_title = "Approach Requests";
include 'includes/header.php';

if ($_SESSION['role'] === 'startup'):
    $uid = $_SESSION['user_id'];
    $myStartupsList = db_where('startups', function ($s) use ($uid) {
        return $s['user_id'] == $uid;
    });
    $myIds = array_column($myStartupsList, 'id');
    $requests = db_where('approach_requests', function ($r) use ($myIds) {
        return in_array($r['startup_id'], $myIds);
    });
    $requests = db_sort($requests, 'created_at');
?>
<h1 style="margin-bottom:20px;">My Approach Requests</h1>
<div class="table-wrapper">
<?php if (empty($requests)): ?>
  <div class="empty-state">No approach requests sent. <a href="browse-investors.php">Browse investors</a> to send one.</div>
<?php else: ?>
<table>
  <tr><th>Investor</th><th>Type</th><th>Message</th><th>Status</th><th>Date</th></tr>
  <?php foreach ($requests as $r): $inv = db_find('investors', $r['investor_id']); ?>
  <tr>
    <td><?= sanitize($inv ? investor_display_name($inv) : '') ?></td>
    <td><?= sanitize($inv ? $inv['investor_type'] : '') ?></td>
    <td><?= sanitize(substr($r['message'],0,60)) ?></td>
    <td><span class="badge badge-<?= $r['status'] ?>"><?= $r['status'] ?></span></td>
    <td><?= date('d M Y', strtotime($r['created_at'])) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
</div>
<?php else:
    $inv = db_find_by('investors', 'user_id', $_SESSION['user_id']);
    $investor_id = $inv ? $inv['id'] : 0;
    $requests = db_where('approach_requests', function ($r) use ($investor_id) {
        return $r['investor_id'] == $investor_id;
    });
    $requests = db_sort($requests, 'created_at');
?>
<h1 style="margin-bottom:20px;">Approach Requests Received</h1>
<div class="table-wrapper">
<?php if (empty($requests)): ?>
  <div class="empty-state">No requests received yet.</div>
<?php else: ?>
<table>
  <tr><th>Startup</th><th>Message</th><th>Status</th><th>Date</th><th>Action</th></tr>
  <?php foreach ($requests as $r): $stp = db_find('startups', $r['startup_id']); ?>
  <tr>
    <td><a href="startup-detail.php?id=<?= $r['startup_id'] ?>"><?= sanitize($stp ? $stp['company_name'] : '') ?></a></td>
    <td><?= sanitize(substr($r['message'],0,60)) ?></td>
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
      <?php endif; ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
</div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>