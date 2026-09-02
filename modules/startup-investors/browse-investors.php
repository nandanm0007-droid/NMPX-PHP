<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_login();

$type = isset($_GET['type']) ? $_GET['type'] : '';
$sector = isset($_GET['sector']) ? $_GET['sector'] : '';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$investors = db_where('investors', function ($inv) use ($type, $sector, $search) {
    if ($inv['status'] !== 'approved') return false;
    if ($type && $inv['investor_type'] !== $type) return false;
    if ($sector) {
        $list = array_map('trim', explode(',', isset($inv['preferred_sectors']) ? $inv['preferred_sectors'] : ''));
        if (!in_array($sector, $list)) return false;
    }
    if ($search) {
        $user = db_find('users', $inv['user_id']);
        $orgName = isset($inv['organization_name']) ? $inv['organization_name'] : '';
        $personName = $user ? $user['name'] : '';
        if (stripos($orgName, $search) === false && stripos($personName, $search) === false) {
            return false;
        }
    }
    return true;
});
$investors = db_sort($investors, 'created_at');

$sectors = ['Technology','Healthcare','Education','Agriculture','Fintech','E-commerce','Manufacturing','Renewable Energy','Food & Beverage','Real Estate','Transportation','Other'];

$page_title = "Browse Investors - InvestConnect";
include 'includes/header.php';
?>
<h1 style="margin-bottom:20px;">Browse Investors</h1>

<div class="filters">
  <form method="GET">
    <div class="form-group">
      <label>Search</label>
      <input type="text" name="search" value="<?= sanitize($search) ?>" placeholder="Name or organization...">
    </div>
    <div class="form-group">
      <label>Investor Type</label>
      <select name="type">
        <option value="">All Types</option>
        <?php foreach (['Central Govt','State Govt','Private','Angel','VC'] as $t): ?>
          <option value="<?= $t ?>" <?= $type===$t?'selected':'' ?>><?= $t ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Sector</label>
      <select name="sector">
        <option value="">All Sectors</option>
        <?php foreach ($sectors as $s): ?>
          <option value="<?= $s ?>" <?= $sector===$s?'selected':'' ?>><?= $s ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">🔍 Search</button>
    <a href="browse-investors.php" class="btn btn-outline">Reset</a>
  </form>
</div>

<p style="color:var(--muted);margin-bottom:16px;">
  Showing <?= count($investors) ?> investor<?= count($investors) === 1 ? '' : 's' ?>
</p>

<?php if (empty($investors)): ?>
  <div class="empty-state">No investors found matching your criteria.</div>
<?php else: ?>
<div class="grid-cards">
  <?php foreach ($investors as $inv): ?>
  <div class="card">
    <h3><?= sanitize(investor_display_name($inv)) ?></h3>
    <div class="meta"><?= sanitize($inv['investor_type']) ?> <?= $inv['location'] ? '• '.sanitize($inv['location']) : '' ?></div>
    <p><strong>Range:</strong> <?= format_money($inv['investment_range_min']) ?> - <?= format_money($inv['investment_range_max']) ?></p>
    <p><strong>Sectors:</strong> <?= sanitize($inv['preferred_sectors']) ?></p>
    <div class="card-footer">
      <a href="investor-detail.php?id=<?= $inv['id'] ?>" class="btn btn-sm btn-outline">View Profile</a>
      <?php if ($_SESSION['role'] === 'startup'): ?>
      <a href="approach-request.php?investor_id=<?= $inv['id'] ?>" class="btn btn-sm btn-primary">Approach</a>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>