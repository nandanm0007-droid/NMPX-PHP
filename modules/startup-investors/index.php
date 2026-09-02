<?php
require_once 'config/db.php';
require_once 'config/functions.php';

$startupCount  = db_count('startups');
$investorCount = db_count('investors');

$fundedCount = db_count('startups', function ($s) {
    return $s['status'] === 'funded';
});

$requestCount = db_count('approach_requests');

$page_title = "InvestConnect - Where Startups Meet Investors";
include 'includes/header.php';
?>
<section class="hero">
  <div class="container">
    <h1>Bridging Startups & Investors</h1>
    <p>Connect with government schemes, angel investors, and venture capitalists. Submit your pitch, get discovered, and grow your business.</p>
    <div class="cta-group">
      <a href="register.php?role=startup" class="btn btn-primary">I'm a Startup</a>
      <a href="register.php?role=investor" class="btn btn-outline" style="border-color:#fff;color:#fff;">I'm an Investor</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="section-title">How It Works</h2>
    <div class="how-it-works">
      <div class="step-card">
        <div class="num">1</div>
        <h3>Register</h3>
        <p>Sign up as a startup seeking funds or an investor looking for opportunities.</p>
      </div>
      <div class="step-card">
        <div class="num">2</div>
        <h3>Submit / Browse</h3>
        <p>Startups submit pitches. Investors browse matching proposals by sector & budget.</p>
      </div>
      <div class="step-card">
        <div class="num">3</div>
        <h3>Connect & Fund</h3>
        <p>Express interest, send approach requests, and close the deal.</p>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:#fff;">
  <div class="container">
    <h2 class="section-title">Platform Stats</h2>
    <div class="stats-grid">
      <div class="stat-box"><div class="stat-num"><?= $startupCount ?></div><p>Startups Listed</p></div>
      <div class="stat-box"><div class="stat-num"><?= $investorCount ?></div><p>Active Investors</p></div>
      <div class="stat-box"><div class="stat-num"><?= $requestCount ?></div><p>Approach Requests</p></div>
      <div class="stat-box"><div class="stat-num"><?= $fundedCount ?></div><p>Startups Funded</p></div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>