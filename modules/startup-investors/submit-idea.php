<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_role('startup');

$user_id = $_SESSION['user_id'];
$errors = [];
$sectors = ['Technology','Healthcare','Education','Agriculture','Fintech','E-commerce','Manufacturing','Renewable Energy','Food & Beverage','Real Estate','Transportation','Other'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '')) {
        $errors[] = "Invalid request.";
    } else {
        $company_name = sanitize($_POST['company_name']);
        $industry = sanitize($_POST['industry']);
        $location = sanitize($_POST['location']);
        $problem_statement = sanitize($_POST['problem_statement']);
        $solution = sanitize($_POST['solution']);
        $market_potential = sanitize($_POST['market_potential']);
        $funding_amount = floatval($_POST['funding_amount']);
        $video_link = sanitize($_POST['video_link']);
        $pitch_file = null;

        if (!$company_name || !$industry || !$problem_statement || !$solution) {
            $errors[] = "Please fill all required fields.";
        }

        if (isset($_FILES['pitch_file']) && $_FILES['pitch_file']['error'] === UPLOAD_ERR_OK) {
            $allowed = ['pdf','ppt','pptx'];
            $ext = strtolower(pathinfo($_FILES['pitch_file']['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed)) {
                $errors[] = "Only PDF/PPT/PPTX files are allowed.";
            } elseif ($_FILES['pitch_file']['size'] > 10 * 1024 * 1024) {
                $errors[] = "File size must be under 10MB.";
            } else {
                $newName = 'pitch_' . uniqid() . '.' . $ext;
                $target = __DIR__ . '/uploads/pitch_decks/' . $newName;
                if (move_uploaded_file($_FILES['pitch_file']['tmp_name'], $target)) {
                    $pitch_file = $newName;
                } else {
                    $errors[] = "Failed to upload file.";
                }
            }
        }

        if (!$errors) {
            db_insert('startups', [
                'user_id' => $user_id, 'company_name' => $company_name, 'industry' => $industry,
                'location' => $location, 'problem_statement' => $problem_statement, 'solution' => $solution,
                'market_potential' => $market_potential, 'funding_amount' => $funding_amount,
                'pitch_file' => $pitch_file, 'video_link' => $video_link, 'status' => 'approved'
            ]);
            set_flash('success', 'Your proposal has been submitted and is now live for investors to view!');
            redirect('dashboard.php');
        }
    }
}

$page_title = "Submit Idea - InvestConnect";
include 'includes/header.php';
?>
<div class="form-wrapper wide">
  <h2 style="margin-bottom:20px;">Submit Your Business Proposal</h2>
  <?php foreach ($errors as $e): ?><div class="alert alert-error"><?= sanitize($e) ?></div><?php endforeach; ?>

  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">

    <div class="form-row">
      <div class="form-group">
        <label>Company / Business Name *</label>
        <input type="text" name="company_name" required>
      </div>
      <div class="form-group">
        <label>Industry Sector *</label>
        <select name="industry" required>
          <?php foreach ($sectors as $s): ?><option value="<?= $s ?>"><?= $s ?></option><?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" placeholder="City, State">
      </div>
      <div class="form-group">
        <label>Funding Amount Required (₹) *</label>
        <input type="number" name="funding_amount" required min="0">
      </div>
    </div>

    <div class="form-group">
      <label>Problem Statement *</label>
      <textarea name="problem_statement" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label>Your Solution *</label>
      <textarea name="solution" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label>Market Potential</label>
      <textarea name="market_potential" rows="3"></textarea>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>Pitch Deck (PDF/PPT, max 10MB)</label>
        <input type="file" name="pitch_file" class="file-input" id="pitchFile" accept=".pdf,.ppt,.pptx">
        <small data-file-label="pitchFile" style="color:var(--muted);"></small>
      </div>
      <div class="form-group">
        <label>Video Pitch Link (optional)</label>
        <input type="url" name="video_link" placeholder="https://youtube.com/...">
      </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit Proposal</button>
  </form>
</div>
<?php include 'includes/footer.php'; ?>