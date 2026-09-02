<?php
require_once '../config/db.php';
require_once '../config/functions.php';
require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token($_POST['csrf_token'] ?? '')) {
    $id = intval($_POST['startup_id']);
    $status = $_POST['status'];
    if (in_array($status, ['pending','approved','rejected','funded'])) {
        db_update('startups', $id, ['status' => $status]);
        set_flash('success', 'Startup status updated.');
    }
    redirect('manage-startups.php');
}

$page_title = "Manage Startups";
include 'header.php';

$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$startups = db_where('startups', function ($s) use ($status_filter) {
    return !$status_filter || $s['status'] === $status_filter;
});
$startups = db_sort($startups, 'created_at');
?>
<h1 style="margin-bottom:20px;">Manage Startups</h1>
<div class="filters">
  <form method="GET">
    <div class="form-group">
      <label>Status</label>
      <select name="status" onchange="this.form.submit()">
        <option value="">All</option>
        <?php foreach (['pending','approved','rejected','funded'] as $st): ?>
          <option value="<?= $st ?>" <?= $status_filter===$st?'selected':'' ?>><?= ucfirst($st) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </form>
</div>
<div class="table-wrapper">
<table>
<tr><th>Company</th><th>Founder</th><th>Industry</th><th>Funding</th><th>Status</th><th>Actions</th></tr>
<?php foreach ($startups as $s): $founder = db_find('users', $s['user_id']); ?>
<tr>
  <td><a href="../startup-detail.php?id=<?= $s['id'] ?>" target="_blank"><?= sanitize($s['company_name']) ?></a></td>
  <td><?= sanitize($founder ? $founder['name'] : '') ?><br><small><?= sanitize($founder ? $founder['email'] : '') ?></small></td>
  <td><?= sanitize($s['industry']) ?></td>
  <td><?= format_money($s['funding_amount']) ?></td>
  <td><span class="badge badge-<?= $s['status'] ?>"><?= $s['status'] ?></span></td>
  <td>
    <form method="POST" style="display:flex;gap:6px;">
      <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
      <input type="hidden" name="startup_id" value="<?= $s['id'] ?>">
      <select name="status">
        <?php foreach (['pending','approved','rejected','funded'] as $st): ?>
          <option value="<?= $st ?>" <?= $s['status']===$st?'selected':'' ?>><?= ucfirst($st) ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </form>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>
<?php include 'footer.php'; ?>