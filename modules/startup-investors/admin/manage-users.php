<?php
require_once '../config/db.php';
require_once '../config/functions.php';
require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token($_POST['csrf_token'] ?? '')) {
    $uid = intval($_POST['user_id']);
    if ($_POST['action'] === 'block') {
        db_update('users', $uid, ['status' => 'blocked']);
        set_flash('success', 'User blocked.');
    } elseif ($_POST['action'] === 'unblock') {
        db_update('users', $uid, ['status' => 'active']);
        set_flash('success', 'User unblocked.');
    } elseif ($_POST['action'] === 'delete') {
        $startupIds = array_column(db_where('startups', function ($s) use ($uid) {
            return $s['user_id'] == $uid;
        }), 'id');

        foreach ($startupIds as $sid) {
            $relatedReq = db_where('approach_requests', function ($r) use ($sid) {
                return $r['startup_id'] == $sid;
            });
            foreach ($relatedReq as $r) db_delete('approach_requests', $r['id']);

            $relatedInt = db_where('interests', function ($i) use ($sid) {
                return $i['startup_id'] == $sid;
            });
            foreach ($relatedInt as $i) db_delete('interests', $i['id']);

            db_delete('startups', $sid);
        }

        $inv = db_find_by('investors', 'user_id', $uid);
        if ($inv) {
            $invId = $inv['id'];
            $relatedReq = db_where('approach_requests', function ($r) use ($invId) {
                return $r['investor_id'] == $invId;
            });
            foreach ($relatedReq as $r) db_delete('approach_requests', $r['id']);

            $relatedInt = db_where('interests', function ($i) use ($invId) {
                return $i['investor_id'] == $invId;
            });
            foreach ($relatedInt as $i) db_delete('interests', $i['id']);

            db_delete('investors', $invId);
        }
        db_delete('users', $uid);
        set_flash('success', 'User deleted.');
    }
    redirect('manage-users.php');
}

$page_title = "Manage Users";
include 'header.php';

$role_filter = isset($_GET['role']) ? $_GET['role'] : '';
$users = db_where('users', function ($u) use ($role_filter) {
    if ($u['role'] === 'admin') return false;
    if ($role_filter && $u['role'] !== $role_filter) return false;
    return true;
});
$users = db_sort($users, 'created_at');
?>
<h1 style="margin-bottom:20px;">Manage Users</h1>
<div class="filters">
  <form method="GET">
    <div class="form-group">
      <label>Filter by Role</label>
      <select name="role" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="startup" <?= $role_filter==='startup'?'selected':'' ?>>Startups</option>
        <option value="investor" <?= $role_filter==='investor'?'selected':'' ?>>Investors</option>
      </select>
    </div>
  </form>
</div>
<div class="table-wrapper">
<table>
<tr><th>Name</th><th>Email</th><th>Role</th><th>Phone</th><th>Status</th><th>Actions</th></tr>
<?php foreach ($users as $u): ?>
<tr>
  <td><?= sanitize($u['name']) ?></td>
  <td><?= sanitize($u['email']) ?></td>
  <td><?= $u['role'] ?></td>
  <td><?= sanitize($u['phone']) ?></td>
  <td><span class="badge badge-<?= $u['status'] ?>"><?= $u['status'] ?></span></td>
  <td>
    <form method="POST" style="display:inline;">
      <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
      <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
      <?php if ($u['status'] === 'active'): ?>
        <button name="action" value="block" class="btn btn-sm btn-danger">Block</button>
      <?php else: ?>
        <button name="action" value="unblock" class="btn btn-sm btn-success">Unblock</button>
      <?php endif; ?>
      <button name="action" value="delete" class="btn btn-sm btn-outline confirm-action" data-confirm="Delete this user permanently?">Delete</button>
    </form>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>
<?php include 'footer.php'; ?>