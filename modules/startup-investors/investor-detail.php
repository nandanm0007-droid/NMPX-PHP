<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_login();

$id = intval(isset($_GET['id']) ? $_GET['id'] : 0);
$investor = db_find('investors', $id);
if (!$investor) { die("Investor not found."); }

$page_title = sanitize(investor_display_name($investor)) . " - InvestConnect";
include 'includes/header.php';
?>
<div class="detail-box">
  <h1><?= sanitize(investor_display_name($investor)) ?></h1>
  <p class="meta"><?= sanitize($investor['investor_type']) ?> <?= $investor['location'] ? '• '.sanitize($investor['location']) : '' ?></p>

  <div class="detail-section">
    <h4>Investment Range</h4>
    <p style="font-size:1.2rem;font-weight:700;color:var(--primary);"><?= format_money($investor['investment_range_min']) ?> - <?= format_money($investor['investment_range_max']) ?></p>
  </div>
  <div class="detail-section">
    <h4>Preferred Sectors</h4>
    <p><?= sanitize($investor['preferred_sectors']) ?></p>
  </div>
  <div class="detail-section">
    <h4>About</h4>
    <p><?= nl2br(sanitize($investor['description'])) ?></p>
  </div>

  <?php if ($_SESSION['role'] === 'startup'): ?>
    <a href="approach-request.php?investor_id=<?= $investor['id'] ?>" class="btn btn-primary">📩 Send Approach Request</a>
  <?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>