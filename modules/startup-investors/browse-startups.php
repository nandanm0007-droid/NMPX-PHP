<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_login();

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$industry = isset($_GET['industry']) ? $_GET['industry'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$minFund = isset($_GET['min_fund']) ? $_GET['min_fund'] : '';
$maxFund = isset($_GET['max_fund']) ? $_GET['max_fund'] : '';

$startups = db_where('startups', function ($s) use ($search, $industry, $location, $minFund, $maxFund) {
    if ($s['status'] !== 'approved') return false;
    if ($search && stripos($s['company_name'], $search) === false) return false;
    if ($industry && $s['industry'] !== $industry) return false;
    if ($location && stripos($s['location'], $location) === false) return false;
    if ($minFund !== '' && $s['funding_amount'] < floatval($minFund)) return false;
    if ($maxFund !== '' && $s['funding_amount'] > floatval($maxFund)) return false;
    return true;
});
$startups = db_sort($startups, 'created_at');

$sectors = ['Technology','Healthcare','Education','Agriculture','Fintech','E-commerce','Manufacturing','Renewable Energy','Food & Beverage','Real Estate','Transportation','Other'];

$page_title = "Browse Startups - InvestConnect";
include 'includes/header.php';
?>
<h1 style="margin-bottom:20px;">Browse Startups</h1>

<div class="filters">
  <form method="GET">
    <div class="form-group">
      <label>Search by Name</label>
      <input type="text" name="search" value="<?= sanitize($search) ?>" placeholder="Company name...">
    </div>
    <div class="form-group">
      <label>Industry</label>
      <select name="industry">
        <option value="">All Industries</option>
        <?php foreach ($sectors as $s): ?><option value="<?= $s ?>" <?= $industry===$s?'selected':'' ?>><?= $s ?></option><?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Location</label>
      <input type="text" name="location" value="<?= sanitize($location) ?>" placeholder="City/State">
    </div>
    <div class="form-group">
      <label>Min Funding (₹)</label>
      <input type="number" name="min_fund" value="<?= sanitize($minFund) ?>">
    </div>
    <div class="form-group">
      <label>Max Funding (₹)</label>
      <input type="number" name="max_fund" value="<?= sanitize($maxFund) ?>">
    </div>
    <button type="submit" class="btn btn-primary">🔍 Search</button>
    <a href="browse-startups.php" class="btn btn-outline">Reset</a>
  </form>
</div>

<p style="color:var(--muted);margin-bottom:16px;">
  Showing <?= count($startups) ?> available startup<?= count($startups) === 1 ? '' : 's' ?>
</p>

<?php if (empty($startups)): ?>
  <div class="empty-state">
    No startups found matching your criteria.<br>
    <?php if (!$search && !$industry && !$location && $minFund === '' && $maxFund === ''): ?>
      <small>There are currently no approved startup listings. Check back soon!</small>
    <?php endif; ?>
  </div>
<?php else: ?>
<div class="grid-cards">
  <?php foreach ($startups as $s): ?>
  <div class="card">
    <h3><?= sanitize($s['company_name']) ?></h3>
    <div class="meta"><?= sanitize($s['industry']) ?> <?= $s['location'] ? '• '.sanitize($s['location']) : '' ?></div>
    <p><?= sanitize(substr($s['problem_statement'],0,110)) ?>...</p>
    <p><strong>Funding Needed:</strong> <?= format_money($s['funding_amount']) ?></p>
    <div class="card-footer">
      <a href="startup-detail.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-outline">View Details</a>
      <?php if ($_SESSION['role'] === 'investor'): ?>
      <form method="POST" action="mark-interest.php" style="display:inline;">
        <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
        <input type="hidden" name="startup_id" value="<?= $s['id'] ?>">
        <button type="submit" class="btn btn-sm btn-success">👍 Interested</button>
      </form>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>