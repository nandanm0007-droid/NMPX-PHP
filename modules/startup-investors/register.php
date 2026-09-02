<?php
require_once 'config/db.php';
require_once 'config/functions.php';

if (is_logged_in()) redirect('dashboard.php');

$role = $_GET['role'] ?? 'startup';
$errors = [];

$sectors = ['Technology','Healthcare','Education','Agriculture','Fintech','E-commerce','Manufacturing','Renewable Energy','Food & Beverage','Real Estate','Transportation','Other'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = "Invalid request, please try again.";
    } else {
        $name = sanitize($_POST['name']);
        $email = strtolower(sanitize($_POST['email']));
        $phone = sanitize($_POST['phone']);
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        $role = $_POST['role'] === 'investor' ? 'investor' : 'startup';

        if (strlen($name) < 2) $errors[] = "Name is required.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
        if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
        if ($password !== $confirm) $errors[] = "Passwords do not match.";

        if (!$errors && db_find_by('users', 'email', $email)) {
            $errors[] = "Email already registered.";
        }

        if ($role === 'startup') {
            $company_name = sanitize($_POST['company_name'] ?? '');
            $industry = sanitize($_POST['industry'] ?? '');
            if (!$company_name) $errors[] = "Company name is required.";
        } else {
            $investor_type = sanitize($_POST['investor_type'] ?? '');
            $organization_name = sanitize($_POST['organization_name'] ?? '');
            $min_range = floatval($_POST['investment_range_min'] ?? 0);
            $max_range = floatval($_POST['investment_range_max'] ?? 0);
            $pref_sectors = isset($_POST['preferred_sectors']) ? implode(',', array_map('sanitize', $_POST['preferred_sectors'])) : '';
            if (!$investor_type) $errors[] = "Investor type is required.";
        }

        if (!$errors) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $user_id = db_insert('users', [
                'name' => $name, 'email' => $email, 'password' => $hashed,
                'role' => $role, 'phone' => $phone, 'status' => 'active'
            ]);

            if ($role === 'startup') {
                db_insert('startups', [
                    'user_id' => $user_id, 'company_name' => $company_name, 'industry' => $industry,
                    'location' => '', 'problem_statement' => '', 'solution' => '', 'market_potential' => '',
                    'funding_amount' => 0, 'pitch_file' => null, 'video_link' => '', 'status' => 'pending'
                ]);
            } else {
                db_insert('investors', [
                    'user_id' => $user_id, 'investor_type' => $investor_type,
                    'organization_name' => $organization_name, 'investment_range_min' => $min_range,
                    'investment_range_max' => $max_range, 'preferred_sectors' => $pref_sectors,
                    'location' => '', 'description' => '', 'status' => 'approved'
                ]);
            }
            set_flash('success', 'Registration successful! Please login.');
            redirect('login.php');
        }
    }
}

$page_title = "Register - InvestConnect";
include 'includes/header.php';
?>
<div class="form-wrapper wide">
  <h2 style="margin-bottom:20px;">Create Your Account</h2>
  <?php foreach ($errors as $e): ?><div class="alert alert-error"><?= sanitize($e) ?></div><?php endforeach; ?>

  <form method="POST">
    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
    <div class="role-toggle">
      <label class="<?= $role === 'startup' ? 'active' : '' ?>">
        <input type="radio" name="role" value="startup" <?= $role === 'startup' ? 'checked' : '' ?>>
        <span>🚀 I'm a Startup</span>
      </label>
      <label class="<?= $role === 'investor' ? 'active' : '' ?>">
        <input type="radio" name="role" value="investor" <?= $role === 'investor' ? 'checked' : '' ?>>
        <span>💰 I'm an Investor</span>
      </label>
    </div>

    <div class="form-row">
      <div class="form-group"><label>Full Name</label><input type="text" name="name" required value="<?= sanitize($_POST['name'] ?? '') ?>"></div>
      <div class="form-group"><label>Phone</label><input type="text" name="phone" value="<?= sanitize($_POST['phone'] ?? '') ?>"></div>
    </div>
    <div class="form-group"><label>Email</label><input type="email" name="email" required value="<?= sanitize($_POST['email'] ?? '') ?>"></div>
    <div class="form-row">
      <div class="form-group"><label>Password</label><input type="password" name="password" required minlength="6"></div>
      <div class="form-group"><label>Confirm Password</label><input type="password" name="confirm_password" required minlength="6"></div>
    </div>

    <div id="startupFields" class="<?= $role === 'investor' ? 'hidden' : '' ?>">
      <div class="form-group"><label>Company Name</label><input type="text" name="company_name" value="<?= sanitize($_POST['company_name'] ?? '') ?>"></div>
      <div class="form-group"><label>Industry Sector</label>
        <select name="industry"><?php foreach ($sectors as $s): ?><option value="<?= $s ?>"><?= $s ?></option><?php endforeach; ?></select>
      </div>
    </div>

    <div id="investorFields" class="<?= $role === 'startup' ? 'hidden' : '' ?>">
      <div class="form-group"><label>Investor Type</label>
        <select name="investor_type">
          <option value="Central Govt">Central Govt Scheme</option>
          <option value="State Govt">State Govt Scheme</option>
          <option value="Private">Private Investor</option>
          <option value="Angel">Angel Investor</option>
          <option value="VC">Venture Capital</option>
        </select>
      </div>
      <div class="form-group"><label>Organization Name</label><input type="text" name="organization_name"></div>
      <div class="form-row">
        <div class="form-group"><label>Min Investment (₹)</label><input type="number" name="investment_range_min" min="0"></div>
        <div class="form-group"><label>Max Investment (₹)</label><input type="number" name="investment_range_max" min="0"></div>
      </div>
      <div class="form-group"><label>Preferred Sectors</label>
        <div class="checkbox-group">
          <?php foreach ($sectors as $s): ?><label><input type="checkbox" name="preferred_sectors[]" value="<?= $s ?>"> <?= $s ?></label><?php endforeach; ?>
        </div>
      </div>
    </div>

<div id="investorFields" class="<?= $role === 'startup' ? 'hidden' : '' ?>">
  <div class="form-group">
    <label>Investor Type</label>
    <select name="investor_type">
      <option value="Central Govt">Central Govt Scheme</option>
      <option value="State Govt">State Govt Scheme</option>
      <option value="Private">Private Investor</option>
      <option value="Angel">Angel Investor</option>
      <option value="VC">Venture Capital</option>
    </select>
  </div>
  <div class="form-group">
    <label>Organization Name <span style="color:var(--muted);font-weight:400;">(Optional — leave blank if investing personally)</span></label>
    <input type="text" name="organization_name" placeholder="e.g. Acme Ventures (optional)">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Min Investment (₹)</label><input type="number" name="investment_range_min" min="0"></div>
    <div class="form-group"><label>Max Investment (₹)</label><input type="number" name="investment_range_max" min="0"></div>
  </div>
  <div class="form-group">
    <label>Preferred Sectors</label>
    <div class="checkbox-group">
      <?php foreach ($sectors as $s): ?><label><input type="checkbox" name="preferred_sectors[]" value="<?= $s ?>"> <?= $s ?></label><?php endforeach; ?>
    </div>
  </div>
</div>

    <button type="submit" class="btn btn-primary btn-block">Register</button>
    <p style="text-align:center;margin-top:16px;">Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>
<?php include 'includes/footer.php'; ?>