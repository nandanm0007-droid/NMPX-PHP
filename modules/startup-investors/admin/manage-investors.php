<?php
require_once '../config/db.php';
require_once '../config/functions.php';
require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '')) {
    $id = intval($_POST['investor_id']);
    $status = $_POST['status'];
    if (in_array($status, ['pending','approved','rejected'])) {
        db_update('investors', $id, ['status' => $status]);
        set_flash('success', 'Investor status updated.');
    }
    redirect('manage-investors.php');
}

$page_title = "Manage Investors";
include 'header.php';

$investors = db_sort(db_all('investors'), 'created_at');
?>
<h1 style="margin-bottom:20px;">Manage Investors</h1>
<div class="table-wrapper">
<table>
<tr><th>Name / Organization</th><th>Contact</th><th>Type</th><th>Range</th><th>Status</th><th>Actions</th></tr>
<?php foreach ($investors as $i): $contact = db_find('users', $i['user_id']); ?>
<tr>
  <td><a href="../investor-detail.php?id=<?= $i['id'] ?>" target="_blank"><?= sanitize(investor_display_name($i)) ?></a></td>
  <td><?= sanitize($contact ? $contact['name'] : '') ?><br><small><?= sanitize($contact ? $contact['email'] : '') ?></small></td>
  <td><?= sanitize($i['investor_type']) ?></td>
  <td><?= format_money($i['investment_range_min']) ?> - <?= format_money($i['investment_range_max']) ?></td>
  <td><span class="badge badge-<?= $i['status'] ?>"><?= $i['status'] ?></span></td>
  <td>
    <form method="POST" style="display:flex;gap:6px;">
      <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
      <input type="hidden" name="investor_id" value="<?= $i['id'] ?>">
      <select name="status">
        <?php foreach (['pending','approved','rejected'] as $st): ?>
          <option value="<?= $st ?>" <?= $i['status']===$st?'selected':'' ?>><?= ucfirst($st) ?></option>
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