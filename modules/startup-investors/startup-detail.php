<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_login();

$id = intval(isset($_GET['id']) ? $_GET['id'] : 0);
$startup = db_find('startups', $id);
if (!$startup) { die("Startup not found."); }
$founder = db_find('users', $startup['user_id']);

$isOwner = ($_SESSION['role'] === 'startup' && $_SESSION['user_id'] == $startup['user_id']);
$isInvestor = $_SESSION['role'] === 'investor';

$alreadyInterested = false;
$investor_id = null;
if ($isInvestor) {
    $inv = db_find_by('investors', 'user_id', $_SESSION['user_id']);
    $investor_id = $inv ? $inv['id'] : 0;
    $matchesInterest = db_where('interests', function ($i) use ($investor_id, $id) {
        return $i['investor_id'] == $investor_id && $i['startup_id'] == $id;
    });
    $alreadyInterested = !empty($matchesInterest);
}

$page_title = sanitize($startup['company_name']) . " - InvestConnect";
include 'includes/header.php';
?>
<div class="detail-box">
  <h1><?= sanitize($startup['company_name']) ?> <span class="badge badge-<?= $startup['status'] ?>"><?= $startup['status'] ?></span></h1>
  <p class="meta"><?= sanitize($startup['industry']) ?> <?= $startup['location'] ? '• '.sanitize($startup['location']) : '' ?></p>

  <div class="detail-section">
    <h4>Funding Required</h4>
    <p style="font-size:1.3rem;font-weight:700;color:var(--primary);"><?= format_money($startup['funding_amount']) ?></p>
  </div>
  <div class="detail-section"><h4>Problem Statement</h4><p><?= nl2br(sanitize($startup['problem_statement'])) ?></p></div>
  <div class="detail-section"><h4>Solution</h4><p><?= nl2br(sanitize($startup['solution'])) ?></p></div>
  <div class="detail-section"><h4>Market Potential</h4><p><?= nl2br(sanitize($startup['market_potential'])) ?></p></div>

  <?php if (!empty($startup['pitch_file'])): ?>
  <div class="detail-section"><h4>Pitch Deck</h4>
    <a href="uploads/pitch_decks/<?= sanitize($startup['pitch_file']) ?>" target="_blank" class="btn btn-outline btn-sm">📄 Download Pitch Deck</a>
  </div>
  <?php endif; ?>

  <?php if (!empty($startup['video_link'])): ?>
  <div class="detail-section"><h4>Video Pitch</h4>
    <a href="<?= sanitize($startup['video_link']) ?>" target="_blank" class="btn btn-outline btn-sm">▶️ Watch Video</a>
  </div>
  <?php endif; ?>

  <div class="detail-section">
    <h4>Founder Info</h4>
    <p><?= sanitize($founder ? $founder['name'] : '') ?><?php if ($isOwner || $alreadyInterested): ?> | <?= sanitize($founder ? $founder['email'] : '') ?> | <?= sanitize($founder ? $founder['phone'] : '') ?><?php endif; ?></p>
  </div>

  <?php if ($isInvestor): ?>
    <?php if ($alreadyInterested): ?>
      <p class="badge badge-interested">✔ You marked interest in this startup</p>
    <?php else: ?>
      <form method="POST" action="mark-interest.php">
        <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
        <input type="hidden" name="startup_id" value="<?= $startup['id'] ?>">
        <button type="submit" class="btn btn-success">👍 Mark Interested</button>
      </form>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($isOwner): ?><a href="dashboard.php" class="btn btn-outline">Back to Dashboard</a><?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>