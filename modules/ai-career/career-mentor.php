<?php
session_start();

$showReport = false;
$name = $age = $degree = $semester = $college = $cgpa = '';
$skills = $interests = $favSubjects = $careerGoal = $location = '';
$budget = $timePerWeek = $languages = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name        = htmlspecialchars(trim($_POST['name'] ?? ''));
    $age         = htmlspecialchars(trim($_POST['age'] ?? ''));
    $degree      = htmlspecialchars(trim($_POST['degree'] ?? ''));
    $semester    = htmlspecialchars(trim($_POST['semester'] ?? ''));
    $college     = htmlspecialchars(trim($_POST['college'] ?? ''));
    $cgpa        = htmlspecialchars(trim($_POST['cgpa'] ?? ''));
    $skills      = htmlspecialchars(trim($_POST['skills'] ?? ''));
    $interests   = htmlspecialchars(trim($_POST['interests'] ?? ''));
    $favSubjects = htmlspecialchars(trim($_POST['favSubjects'] ?? ''));
    $careerGoal  = htmlspecialchars(trim($_POST['careerGoal'] ?? ''));
    $location    = htmlspecialchars(trim($_POST['location'] ?? ''));
    $budget      = htmlspecialchars(trim($_POST['budget'] ?? ''));
    $timePerWeek = htmlspecialchars(trim($_POST['timePerWeek'] ?? ''));
    $languages   = htmlspecialchars(trim($_POST['languages'] ?? ''));

    if (!empty($name) && !empty($degree) && !empty($careerGoal) && !empty($budget) && !empty($timePerWeek)) {
        $showReport = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI Career Mentor</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --blue:#4f46e5;
  --blue2:#3730a3;
  --cyan:#06b6d4;
  --green:#10b981;
  --yellow:#f59e0b;
  --red:#ef4444;
  --purple:#8b5cf6;
  --pink:#ec4899;
  --orange:#f97316;
  --text:#0f172a;
  --text2:#334155;
  --muted:#64748b;
  --border:#e2e8f0;
  --bg:#f1f5f9;
  --white:#fff;
  --card:0 2px 8px rgba(0,0,0,.08),0 0 0 1px rgba(0,0,0,.04);
  --r:14px;
}
html{scroll-behavior:smooth;}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);line-height:1.6;}
a{color:var(--blue);text-decoration:none;}
a:hover{text-decoration:underline;}

/* HEADER */
.hdr{
  background:linear-gradient(135deg,#1e1b4b,#312e81,#1e40af);
  padding:52px 20px 44px;text-align:center;position:relative;overflow:hidden;
}
.hdr::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse at 20% 60%,rgba(99,102,241,.3),transparent 55%),
             radial-gradient(ellipse at 80% 30%,rgba(6,182,212,.2),transparent 55%);
}
.hdr-in{position:relative;z-index:1;}
.hbadge{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);
  color:#c7d2fe;padding:5px 16px;border-radius:50px;
  font-size:.73rem;font-weight:600;letter-spacing:.4px;margin-bottom:16px;
}
.hdot{
  width:7px;height:7px;background:#34d399;border-radius:50%;
  box-shadow:0 0 0 3px rgba(52,211,153,.3);animation:blink 2s infinite;
}
@keyframes blink{0%,100%{box-shadow:0 0 0 3px rgba(52,211,153,.3);}50%{box-shadow:0 0 0 7px rgba(52,211,153,.08);}}
.hdr h1{font-size:clamp(1.8rem,4vw,3rem);font-weight:900;letter-spacing:-1px;color:#fff;margin-bottom:10px;}
.gtext{background:linear-gradient(135deg,#a5f3fc,#818cf8,#f9a8d4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.hdr p{color:#a5b4fc;font-size:.95rem;max-width:520px;margin:0 auto;}

/* WRAP */
.wrap{max-width:800px;margin:0 auto;padding:36px 16px 64px;}

/* FORM CARD */
.fcard{background:var(--white);border-radius:20px;box-shadow:var(--card);overflow:hidden;margin-bottom:20px;}
.fcard-head{padding:20px 26px;background:linear-gradient(135deg,#4f46e5,#7c3aed);color:#fff;}
.fcard-head h2{font-size:1.05rem;font-weight:800;margin-bottom:2px;}
.fcard-head p{font-size:.8rem;color:#c7d2fe;}
.fcard-body{padding:26px;}

/* FORM SECTIONS */
.fsec{margin-bottom:24px;}
.fsec-title{
  display:flex;align-items:center;gap:8px;
  font-size:.72rem;font-weight:800;color:var(--blue);
  text-transform:uppercase;letter-spacing:.6px;
  border-bottom:2px solid #eef2ff;padding-bottom:8px;margin-bottom:14px;
}
.fsec-title span{
  width:24px;height:24px;background:#eef2ff;border-radius:6px;
  display:flex;align-items:center;justify-content:center;font-size:.8rem;
}
.frow{display:grid;grid-template-columns:1fr 1fr;gap:13px;}
.frow3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:13px;}
.full{grid-column:1/-1;}
.fg{display:flex;flex-direction:column;gap:5px;}
.fg label{font-size:.76rem;font-weight:700;color:var(--text2);}
.fg label .r{color:var(--red);}
.fg input,.fg select{
  padding:10px 12px;border:1.5px solid var(--border);border-radius:9px;
  font-size:.85rem;background:#f8fafc;color:var(--text);
  transition:border-color .2s,box-shadow .2s;width:100%;
  font-family:'Inter',sans-serif;
}
.fg input:focus,.fg select:focus{
  outline:none;border-color:var(--blue);background:var(--white);
  box-shadow:0 0 0 3px rgba(79,70,229,.12);
}
.fg .hint{font-size:.7rem;color:var(--muted);}

/* SUBMIT BTN */
.sub-btn{
  width:100%;padding:14px;margin-top:6px;
  background:linear-gradient(135deg,#4f46e5,#7c3aed);
  color:#fff;border:none;border-radius:11px;
  font-size:.95rem;font-weight:800;cursor:pointer;
  display:flex;align-items:center;justify-content:center;gap:8px;
  box-shadow:0 6px 18px rgba(79,70,229,.35);
  transition:transform .2s,box-shadow .2s;
}
.sub-btn:hover{transform:translateY(-2px);box-shadow:0 10px 26px rgba(79,70,229,.45);}

/* ── REPORT ── */
.report-top{
  background:linear-gradient(135deg,#1e1b4b,#312e81,#1e40af);
  border-radius:18px;padding:28px;color:#fff;margin-bottom:20px;
  position:relative;overflow:hidden;
}
.report-top::after{content:'🎓';position:absolute;right:20px;bottom:10px;font-size:5rem;opacity:.08;}
.report-top h2{font-size:1.45rem;font-weight:900;margin-bottom:5px;letter-spacing:-.3px;}
.report-top .sub{color:#a5b4fc;font-size:.84rem;margin-bottom:14px;}
.rmeta{display:flex;flex-wrap:wrap;gap:7px;}
.rtag{
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);
  color:#e0e7ff;padding:4px 12px;border-radius:50px;font-size:.72rem;font-weight:600;
}

/* ACTION BTNS */
.acts{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;}
.abtn{
  display:inline-flex;align-items:center;gap:6px;
  padding:9px 18px;border-radius:8px;font-size:.82rem;font-weight:700;
  cursor:pointer;transition:all .2s;border:1.5px solid var(--border);
  background:var(--white);color:var(--text2);font-family:'Inter',sans-serif;
}
.abtn:hover{border-color:var(--blue);color:var(--blue);background:#eef2ff;}
.abtn.red{background:#fef2f2;color:var(--red);border-color:#fecaca;}
.abtn.red:hover{background:var(--red);color:#fff;}

/* SECTION CARDS */
.sc{
  background:var(--white);border-radius:var(--r);
  box-shadow:var(--card);margin-bottom:12px;overflow:hidden;
}
.sc-hd{
  display:flex;align-items:center;gap:10px;padding:15px 18px;
  cursor:pointer;user-select:none;transition:background .15s;
}
.sc-hd:hover{background:#fafafa;}
.sc-num{
  width:30px;height:30px;border-radius:8px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:.78rem;color:#fff;
}
.sc-hd h3{font-size:.9rem;font-weight:700;color:var(--text);flex:1;}
.sc-ico{font-size:.95rem;}
.chev{font-size:.7rem;color:var(--muted);transition:transform .25s;}
.chev.open{transform:rotate(180deg);}
.sc-bd{display:none;padding:18px;border-top:1px solid var(--border);animation:fadeIn .2s;}
.sc-bd.open{display:block;}
@keyframes fadeIn{from{opacity:0;transform:translateY(-4px);}to{opacity:1;transform:translateY(0);}}

/* TABLE */
.tbl{width:100%;border-collapse:collapse;font-size:.82rem;}
.tbl th{background:#f8fafc;padding:9px 11px;text-align:left;font-size:.7rem;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.4px;border-bottom:2px solid var(--border);}
.tbl td{padding:11px 11px;border-bottom:1px solid #f1f5f9;color:var(--text2);vertical-align:top;}
.tbl tr:last-child td{border-bottom:none;}
.tbl tr:hover td{background:#fafbff;}
.sal{font-weight:700;color:var(--green);white-space:nowrap;}

/* PILLS */
.pill-block{margin-bottom:13px;}
.pill-lbl{font-size:.7rem;font-weight:800;color:var(--muted);text-transform:uppercase;letter-spacing:.5px;margin-bottom:7px;display:flex;align-items:center;gap:5px;}
.pill-lbl::after{content:'';flex:1;height:1px;background:var(--border);}
.pills{display:flex;flex-wrap:wrap;gap:6px;}
.pill{padding:4px 11px;border-radius:50px;font-size:.73rem;font-weight:600;display:inline-flex;align-items:center;}
.p-b{background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe;}
.p-g{background:#f0fdf4;color:#15803d;border:1px solid #bbf7d0;}
.p-v{background:#faf5ff;color:#7c3aed;border:1px solid #e9d5ff;}
.p-o{background:#fff7ed;color:#c2410c;border:1px solid #fed7aa;}
.p-c{background:#ecfeff;color:#0e7490;border:1px solid #a5f3fc;}

/* INFO BOXES */
.ib{padding:11px 14px;border-radius:9px;font-size:.81rem;margin-top:10px;line-height:1.55;}
.ib-b{background:#eff6ff;border:1px solid #bfdbfe;color:#1d4ed8;}
.ib-g{background:#f0fdf4;border:1px solid #bbf7d0;color:#15803d;}
.ib-a{background:#fffbeb;border:1px solid #fde68a;color:#92400e;}

/* STUDY CARDS */
.scard{display:flex;gap:12px;align-items:flex-start;padding:14px;border-radius:10px;border:1.5px solid var(--border);margin-bottom:9px;transition:all .2s;}
.scard:hover{border-color:var(--cyan);box-shadow:0 4px 12px rgba(6,182,212,.1);}
.scard-flag{font-size:1.7rem;flex-shrink:0;}
.scard-info h4{font-size:.87rem;font-weight:700;color:var(--text);margin-bottom:3px;}
.scard-info p{font-size:.79rem;color:var(--muted);margin-bottom:5px;}
.exam-tag{display:inline-flex;align-items:center;font-size:.7rem;font-weight:700;color:var(--cyan);background:#ecfeff;padding:2px 9px;border-radius:50px;border:1px solid #a5f3fc;}

/* PROJECT CARDS */
.pcard{border:1.5px solid var(--border);border-radius:10px;padding:14px;margin-bottom:11px;position:relative;overflow:hidden;transition:all .2s;}
.pcard:hover{border-color:var(--blue);box-shadow:0 4px 14px rgba(79,70,229,.1);}
.pcard::before{content:'';position:absolute;top:0;left:0;width:4px;height:100%;background:linear-gradient(180deg,var(--blue),var(--purple));}
.pcard-title{font-size:.88rem;font-weight:700;color:var(--text);margin-bottom:5px;padding-left:8px;}
.pcard-tags{display:flex;flex-wrap:wrap;gap:5px;padding-left:8px;margin-bottom:6px;}
.ptag{padding:2px 9px;border-radius:50px;font-size:.7rem;font-weight:600;background:#f1f5f9;color:var(--muted);border:1px solid var(--border);}
.pcard-desc{font-size:.79rem;color:var(--muted);padding-left:8px;line-height:1.5;}

/* RESOURCE GRID */
.rg{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:11px;}
.rc{background:#f8fafc;border:1.5px solid var(--border);border-radius:10px;padding:13px;transition:all .2s;}
.rc:hover{border-color:var(--blue);background:var(--white);box-shadow:0 4px 12px rgba(79,70,229,.1);transform:translateY(-2px);}
.rc-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:5px;gap:5px;}
.rc h4{font-size:.83rem;font-weight:700;color:var(--text);}
.badge{display:inline-block;padding:2px 7px;border-radius:50px;font-size:.63rem;font-weight:700;white-space:nowrap;background:#dcfce7;color:#15803d;border:1px solid #bbf7d0;}
.badge.paid{background:#fff3e0;color:#e65100;border-color:#fed7aa;}
.badge.trial{background:#faf5ff;color:#7c3aed;border-color:#e9d5ff;}
.rc p{font-size:.75rem;color:var(--muted);margin-bottom:8px;line-height:1.5;}
.rc-lnk{font-size:.73rem;font-weight:600;color:var(--blue);display:block;margin-bottom:3px;}
.rc-lnk:hover{text-decoration:underline;}

/* ROADMAP */
.rm{display:flex;flex-direction:column;}
.rm-item{display:flex;gap:13px;padding-bottom:22px;position:relative;}
.rm-item:not(:last-child)::after{content:'';position:absolute;left:16px;top:34px;bottom:0;width:2px;background:linear-gradient(180deg,#e2e8f0,transparent);}
.rm-dot{width:33px;height:33px;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:.68rem;font-weight:800;color:#fff;z-index:1;box-shadow:0 4px 10px rgba(0,0,0,.15);}
.rm-cnt{flex:1;padding-top:5px;}
.rm-phase{font-size:.68rem;font-weight:800;text-transform:uppercase;letter-spacing:.5px;color:var(--muted);margin-bottom:2px;}
.rm-text{font-size:.83rem;color:var(--text2);line-height:1.6;}

/* PLAN */
.plan-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:11px;margin-bottom:12px;}
.plan-item{background:#f8fafc;border:1.5px solid var(--border);border-radius:10px;padding:15px;text-align:center;}
.plan-pct{font-size:1.8rem;font-weight:900;background:linear-gradient(135deg,var(--blue),var(--purple));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;margin-bottom:4px;}
.plan-lbl{font-size:.78rem;font-weight:700;color:var(--text);margin-bottom:2px;}
.plan-sub{font-size:.68rem;color:var(--muted);}

/* TIPS */
.tip-list{display:flex;flex-direction:column;gap:8px;}
.tip{display:flex;gap:10px;align-items:flex-start;padding:11px;background:#f8fafc;border-radius:9px;border:1px solid var(--border);transition:all .2s;}
.tip:hover{border-color:var(--blue);background:var(--white);}
.tip-ico{font-size:1rem;flex-shrink:0;margin-top:1px;}
.tip-txt{font-size:.8rem;color:var(--text2);line-height:1.55;}

/* PLACEMENT */
.pg{display:grid;grid-template-columns:1fr 1fr;gap:9px;}
.pi{padding:12px;background:#f8fafc;border:1.5px solid var(--border);border-radius:9px;transition:all .2s;}
.pi:hover{border-color:var(--green);background:#f0fdf4;}
.pi h4{font-size:.78rem;font-weight:700;color:var(--text);margin-bottom:3px;display:flex;align-items:center;gap:5px;}
.pi p{font-size:.74rem;color:var(--muted);line-height:1.5;}

/* CERT */
.certs{display:flex;flex-direction:column;gap:8px;}
.cert{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;padding:11px 14px;background:#f8fafc;border:1.5px solid var(--border);border-radius:9px;transition:all .2s;}
.cert:hover{border-color:var(--yellow);background:#fffbeb;}
.cert-name{font-size:.83rem;font-weight:700;color:var(--text);}
.cert-name small{font-weight:400;color:var(--muted);font-size:.72rem;display:block;}
.cert-r{display:flex;align-items:center;gap:7px;flex-wrap:wrap;}
.clnk{font-size:.73rem;font-weight:700;color:var(--blue);padding:4px 11px;background:#eef2ff;border-radius:7px;transition:all .15s;}
.clnk:hover{background:var(--blue);color:#fff;text-decoration:none;}

/* MOTIVATION */
.mbox{background:linear-gradient(135deg,#1e1b4b,#312e81);border-radius:13px;padding:24px;color:#fff;text-align:center;}
.mbox h3{font-size:.97rem;font-weight:800;color:#c7d2fe;margin-bottom:9px;}
.mbox p{font-size:.83rem;color:#a5b4fc;line-height:1.75;margin-bottom:11px;}
.mquote{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);border-radius:8px;padding:11px 16px;font-style:italic;font-size:.82rem;color:#e0e7ff;}

/* RESPONSIVE */
@media(max-width:600px){
  .frow,.frow3{grid-template-columns:1fr;}
  .plan-grid{grid-template-columns:1fr;}
  .pg{grid-template-columns:1fr;}
  .rg{grid-template-columns:1fr 1fr;}
  .fcard-body,.sc-bd{padding:14px;}
  .wrap{padding:20px 10px 50px;}
}
@media(max-width:380px){.rg{grid-template-columns:1fr;}}
@media print{
  .hdr,.acts{display:none!important;}
  .sc-bd{display:block!important;}
  .sc{box-shadow:none;border:1px solid #ddd;}
  body{background:#fff;}
}
</style>
</head>
<body>

<div class="hdr">
  <div class="hdr-in">
    <div class="hbadge"><div class="hdot"></div> AI-Powered · Free · For UG Students</div>
    <h1>🎓 <span class="gtext">AI Career Mentor</span></h1>
    <p>Get your personalized career roadmap, skill guide &amp; resources instantly</p>
  </div>
</div>

<div class="wrap">

<?php if (!$showReport): ?>

<!-- ════════════ FORM ════════════ -->
<div class="fcard">
  <div class="fcard-head">
    <h2>📝 Tell Us About Yourself</h2>
    <p>Fill in the details below — all starred fields are required</p>
  </div>
  <div class="fcard-body">
  <form method="POST" action="" id="theForm">

    <div class="fsec">
      <div class="fsec-title"><span>👤</span> Personal Information</div>
      <div class="frow">
        <div class="fg">
          <label>Full Name <span class="r">*</span></label>
          <input type="text" name="name" placeholder="e.g. Priya Sharma" required>
        </div>
        <div class="fg">
          <label>Age <span class="r">*</span></label>
          <input type="number" name="age" min="16" max="35" placeholder="e.g. 20" required>
        </div>
        <div class="fg full">
          <label>College / University <span class="r">*</span></label>
          <input type="text" name="college" placeholder="e.g. Bangalore University" required>
        </div>
        <div class="fg">
          <label>CGPA / Percentage <span class="r">*</span></label>
          <input type="text" name="cgpa" placeholder="e.g. 8.5 CGPA or 78%" required>
        </div>
        <div class="fg">
          <label>Languages Known</label>
          <input type="text" name="languages" placeholder="e.g. English, Hindi">
        </div>
      </div>
    </div>

    <div class="fsec">
      <div class="fsec-title"><span>🎓</span> Education Details</div>
      <div class="frow">
        <div class="fg">
          <label>Degree <span class="r">*</span></label>
          <select name="degree" id="degSel" onchange="fillSem()" required>
            <option value="">— Select Degree —</option>
            <optgroup label="Technology">
              <option value="BCA">BCA</option>
              <option value="B.Sc CS">B.Sc (CS / IT)</option>
              <option value="B.Tech">B.Tech</option>
              <option value="BE">BE (Engineering)</option>
              <option value="B.Sc IT">B.Sc IT</option>
            </optgroup>
            <optgroup label="Business">
              <option value="B.Com">B.Com</option>
              <option value="BBA">BBA / BMS</option>
              <option value="BMS">BMS</option>
            </optgroup>
            <optgroup label="Arts &amp; Humanities">
              <option value="BA">BA</option>
              <option value="BFA">BFA (Fine Arts)</option>
              <option value="BJMC">BJMC (Journalism)</option>
            </optgroup>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="fg">
          <label>Current Semester <span class="r">*</span></label>
          <select name="semester" id="semSel" required>
            <option value="">— Select Degree First —</option>
          </select>
        </div>
        <div class="fg">
          <label>Favorite Subjects</label>
          <input type="text" name="favSubjects" placeholder="e.g. Database, Marketing">
        </div>
        <div class="fg">
          <label>Interests &amp; Hobbies</label>
          <input type="text" name="interests" placeholder="e.g. Coding, Photography">
        </div>
        <div class="fg full">
          <label>Current Skills</label>
          <input type="text" name="skills" placeholder="e.g. Python, Excel, Canva, Writing">
          <div class="hint">Leave blank if you're just starting — perfectly fine!</div>
        </div>
      </div>
    </div>

    <div class="fsec">
      <div class="fsec-title"><span>🎯</span> Career Goals &amp; Preferences</div>
      <div class="frow">
        <div class="fg">
          <label>Primary Career Goal <span class="r">*</span></label>
          <select name="careerGoal" required>
            <option value="">— Select Goal —</option>
            <option value="Private Job">💼 Private Job (MNC / Startup)</option>
            <option value="Government Job">🏛️ Government Job</option>
            <option value="Higher Studies India">🎓 Higher Studies in India</option>
            <option value="Higher Studies Abroad">🌍 Higher Studies Abroad</option>
            <option value="Entrepreneurship">🚀 Entrepreneurship</option>
            <option value="Freelancing">💻 Freelancing</option>
          </select>
        </div>
        <div class="fg">
          <label>Preferred Location</label>
          <input type="text" name="location" placeholder="e.g. Bangalore, Remote">
        </div>
        <div class="fg">
          <label>Learning Budget <span class="r">*</span></label>
          <select name="budget" required>
            <option value="">— Select Budget —</option>
            <option value="Free Only">🆓 Free Only</option>
            <option value="Under 2000">💰 Limited (Under ₹2000)</option>
            <option value="Flexible">✅ Flexible</option>
          </select>
        </div>
        <div class="fg">
          <label>Hours Available / Week <span class="r">*</span></label>
          <input type="number" name="timePerWeek" min="1" max="100" placeholder="e.g. 10" required>
        </div>
      </div>
    </div>

    <button type="submit" class="sub-btn">
      Generate My Career Roadmap 🚀
    </button>
  </form>
  </div>
</div>

<?php else: ?>

<!-- ════════════ REPORT ════════════ -->
<?php

/* ── DEGREE CATEGORY ── */
$techDeg = ['BCA','B.Sc CS','B.Tech','BE','B.Sc IT'];
$bizDeg  = ['B.Com','BBA','BMS'];
$isTech  = in_array($degree, $techDeg);
$isBiz   = in_array($degree, $bizDeg);

/* ── CAREER ANALYSIS ── */
if ($isTech) {
    $analysis = "Your <strong>$degree</strong> background positions you strongly in the tech sector. The industry rewards practical builders — start creating real projects as soon as possible. With your interest in <em>" . ($interests ?: 'technology') . "</em>, you have multiple exciting career paths ahead.";
    $careers = [
        ["💼","Private / MNC Jobs","Software Engineer, Data Analyst, Cloud Architect, DevOps, Web Developer","₹4L – ₹18L PA"],
        ["🖥️","Freelancing","Web Developer, UI/UX Designer, App Developer on Upwork / Fiverr","₹500 – ₹5000/hr"],
        ["🏛️","Government Jobs","NIC Scientist B, IBPS SO IT Officer, ISRO/DRDO Technical Assistant","₹4L – ₹10L PA"],
        ["🚀","Startups","Full Stack Developer in Fintech, Edtech or Healthtech startups","₹3L – ₹12L PA"],
    ];
    $studies = [
        ["🇮🇳","India","MCA (via NIMCET) · M.Tech (via GATE) · MBA in IT/Systems","GATE / NIMCET"],
        ["🌍","Abroad","MS in CS / Data Science — TU Munich, Arizona State Univ, NUS Singapore","GRE + IELTS/TOEFL"],
    ];
    $skillGroups = [
        ["p-b","⚙️ Programming","Python, Java, C++, JavaScript, TypeScript"],
        ["p-g","🌐 Web / App","React.js, Node.js, PHP, Django, Flutter"],
        ["p-v","🗄️ Database","SQL, MySQL, MongoDB, PostgreSQL, Redis"],
        ["p-o","☁️ Cloud & DevOps","AWS, Azure, Docker, Kubernetes, Git, Linux"],
        ["p-c","📊 Data Skills","Pandas, NumPy, Tableau, Power BI, ML Basics"],
    ];
    $projects = [
        ["Student Placement Portal","MERN Stack","Vercel","Full portal connecting students and companies — resume upload, admin dashboard, job listings."],
        ["Personal Finance Tracker","Python + Django + Chart.js","Heroku / Render","Track income, expenses, savings — auto monthly reports with beautiful charts."],
        ["AI Chatbot Assistant","Python + Flask + OpenAI API","Railway","Domain-specific chatbot for college FAQs, customer support or healthcare."],
    ];
} elseif ($isBiz) {
    $analysis = "Your <strong>$degree</strong> degree positions you at the intersection of analytics, strategy, and leadership. Focus on developing both technical business skills and strong communication. Your goal of <em>$careerGoal</em> is highly achievable with the right certifications.";
    $careers = [
        ["💼","Private / Corporate Jobs","Financial Analyst, Digital Marketing Executive, HR Manager, Business Analyst","₹3L – ₹10L PA"],
        ["🚀","Entrepreneurship","E-commerce Brand, Digital Marketing Agency, EdTech startup, Consulting","Unlimited Potential"],
        ["🏛️","Government Jobs","RBI Grade B, SSC CGL, Bank PO (IBPS/SBI), UPSC Civil Services","₹5L – ₹15L PA"],
        ["📊","Freelancing","Social Media Manager, Financial Consultant, Content Strategist, Bookkeeper","₹300 – ₹3000/hr"],
    ];
    $studies = [
        ["🇮🇳","India","MBA (via CAT/MAT/XAT) · M.Com · CA / CMA / CS · PGDM","CAT / MAT / GMAT"],
        ["🌍","Abroad","Masters in Management (MiM) or MBA — HEC Paris, LBS London, ISB Hyderabad","GMAT + IELTS"],
    ];
    $skillGroups = [
        ["p-b","📊 Analytics","Advanced Excel, Power BI, Tableau, Google Analytics, SQL Basics"],
        ["p-g","📣 Marketing","SEO/SEM, Meta Ads, Google Ads, Email Marketing, HubSpot CRM"],
        ["p-v","💰 Finance","Financial Modeling, Tally, QuickBooks, Investment Basics, GST"],
        ["p-o","🤝 Soft Skills","Leadership, Public Speaking, Negotiation, Design Thinking, Presentation"],
    ];
    $projects = [
        ["EV Market Research Report","Excel + Tableau + PowerPoint","Google Slides / PDF","Research EV adoption in India — consumer behavior, top brands, market sizing, recommendations."],
        ["Digital Marketing Campaign","Meta Business Suite + Canva + Analytics","Instagram / Website","Run a mock 30-day campaign for a real local business — measure reach, clicks, conversions."],
        ["Business Plan Pitch Deck","Notion + PowerPoint + Excel","LinkedIn / PDF","Complete startup business plan with market analysis, financial projections and investor pitch."],
    ];
} else {
    $analysis = "Your <strong>$degree</strong> background in Arts/Humanities sharpens your analytical, creative, and communication abilities — skills increasingly rare and valuable in today's digital world. With <em>$careerGoal</em> as your focus, you have rich and diverse career options.";
    $careers = [
        ["💼","Private / Corporate Jobs","Content Strategist, PR Executive, UX Writer, Corporate Trainer, HR","₹3L – ₹8L PA"],
        ["🏛️","Government Jobs","UPSC Civil Services, State PSC, SSC CGL, NET/SET (Teaching)","₹5L – ₹15L PA"],
        ["✍️","Freelancing","Copywriting, Translation, Blogging, Podcast Host, Script Writing","₹500 – ₹4000/hr"],
        ["🎨","Creative Industry","Graphic Design, Video Editing, Social Media Creator, Brand Consultant","₹2L – ₹8L PA"],
    ];
    $studies = [
        ["🇮🇳","India","MA · LLB (via CLAT-PG / DU LLB) · MBA · PG Diploma in Journalism / Mass Comm","CLAT / CAT / NET"],
        ["🌍","Abroad","MA in Public Policy, International Relations, or Media Studies","IELTS + Portfolio"],
    ];
    $skillGroups = [
        ["p-b","✍️ Content & Writing","Content Writing, Copywriting, SEO Writing, Scriptwriting, Proofreading"],
        ["p-g","💻 Digital Tools","WordPress, Canva, Adobe Premiere, CapCut, Social Media Management"],
        ["p-v","📊 Analytics","Google Analytics, Social Media Insights, Basic Excel/Sheets, Research Methods"],
        ["p-o","🤝 Soft Skills","Critical Thinking, Empathy, Public Speaking, Storytelling, Cross-cultural Comm"],
    ];
    $projects = [
        ["Niche Newsletter or Blog","WordPress + Substack + SEO Tools","Substack / Medium","Write weekly on a niche topic (education, culture, tech for non-techies) — build audience, monetize."],
        ["Documentary or Podcast Series","Audacity + DaVinci Resolve / CapCut","YouTube / Spotify","Create a 5-episode documentary or podcast on a local issue, history, or social topic."],
        ["Social Media Content Series","Canva + Instagram + Analytics","Instagram / YouTube","30-day educational or inspirational content series — track growth and engagement."],
    ];
}

/* ── BUDGET ADVICE ── */
$budgetMsg = '';
if ($budget === 'Free Only') {
    $budgetMsg = "Since your budget is <strong>Free Only</strong>, focus on: NPTEL, SWAYAM, freeCodeCamp, CS50, YouTube, Khan Academy, Microsoft Learn, Google Digital Garage — all 100% free with certificates.";
} elseif ($budget === 'Under 2000') {
    $budgetMsg = "With a <strong>limited budget (under ₹2000)</strong>, invest wisely: Udemy courses during sales (₹400–600), apply for Coursera Financial Aid (100% free), and use Microsoft Learn + Google certifications.";
} else {
    $budgetMsg = "With a <strong>flexible budget</strong>, invest in: Coursera Specializations, Udemy course bundles, LinkedIn Learning subscription, and targeted industry certifications like AWS or Google certificates.";
}

/* ── ROADMAP ── */
$roadmap = [
    ["30 Days","#10b981","Master one core skill daily. Update your Resume and LinkedIn profile. Join 3 online communities. Set a daily 1-hour learning habit."],
    ["90 Days","#3b82f6","Complete 2 small projects. Start daily LeetCode or Aptitude practice. Apply for internships. Earn 1 free certificate (Google, Microsoft, HubSpot)."],
    ["6 Months","#f59e0b","Finish 1 major project and host it live. Earn 1 paid certification. Attend at least 2 hackathons or industry events. Build GitHub portfolio."],
    ["1 Year","#ef4444","Contribute to Open Source on GitHub. Build personal brand on LinkedIn. Target PPO / Full-time Job offer / Higher Studies application submission."],
];
?>

<div class="report-top">
  <h2>📄 Career Report — <?= $name ?></h2>
  <p class="sub">Personalized roadmap for your <?= $degree ?> profile · Generated just for you</p>
  <div class="rmeta">
    <span class="rtag">🎓 <?= $degree ?> · <?= ($semester ?: 'N/A') ?> Sem</span>
    <span class="rtag">🏫 <?= $college ?></span>
    <span class="rtag">📊 <?= $cgpa ?></span>
    <span class="rtag">🎯 <?= $careerGoal ?></span>
    <?php if ($location): ?><span class="rtag">📍 <?= $location ?></span><?php endif; ?>
    <span class="rtag">💰 <?= $budget ?></span>
    <span class="rtag">⏰ <?= $timePerWeek ?> hrs/week</span>
    <?php if ($skills): ?><span class="rtag">🛠️ <?= $skills ?></span><?php endif; ?>
  </div>
</div>

<div class="acts">
  <button class="abtn" onclick="window.print()">🖨️ Print / Save PDF</button>
  <button class="abtn" onclick="expandAll()">📂 Expand All</button>
  <button class="abtn" onclick="collapseAll()">📁 Collapse All</button>
  <form method="POST" action="" style="margin:0;">
    <button type="submit" class="abtn red">🔄 Start Over</button>
  </form>
</div>

<?php
/* ── SECTION DATA ── */
$sections = [
  [1,"🧠","Career Analysis","#4f46e5"],
  [2,"🚀","Best Career Paths","#0ea5e9"],
  [3,"🎓","Higher Studies Options","#10b981"],
  [4,"🛠️","Skills to Learn","#f59e0b"],
  [5,"📚","Recommended Courses & Platforms","#8b5cf6"],
  [6,"▶️","YouTube Channels to Follow","#ef4444"],
  [7,"🌐","Practice & Learning Websites","#06b6d4"],
  [8,"📱","Mobile Apps for Learning","#ec4899"],
  [9,"🏆","Industry Certifications","#f97316"],
  [10,"💡","Project Ideas","#84cc16"],
  [11,"📄","Resume Tips","#6366f1"],
  [12,"🎯","Placement Preparation","#14b8a6"],
  [13,"🗺️","Your Learning Roadmap","#a855f7"],
  [14,"📅","Weekly Action Plan","#eab308"],
  [15,"❤️","Message for You","#e11d48"],
];
foreach ($sections as $s):
  $n    = $s[0];
  $ico  = $s[1];
  $ttl  = $s[2];
  $col  = $s[3];
  $open = ($n <= 3);
?>
<div class="sc" id="sc<?= $n ?>">
  <div class="sc-hd" onclick="tog(<?= $n ?>)">
    <div class="sc-num" style="background:<?= $col ?>;"><?= $n ?></div>
    <span class="sc-ico"><?= $ico ?></span>
    <h3><?= $ttl ?></h3>
    <span class="chev <?= $open?'open':'' ?>" id="ch<?= $n ?>">▼</span>
  </div>
  <div class="sc-bd <?= $open?'open':'' ?>" id="bd<?= $n ?>">

<?php if ($n===1): /* ── ANALYSIS ── */ ?>
  <p style="font-size:.87rem;line-height:1.8;color:var(--text2);"><?= $analysis ?></p>
  <?php if ($skills): ?>
  <div style="margin-top:13px;">
    <div class="pill-block">
      <div class="pill-lbl">Your Current Skills</div>
      <div class="pills">
        <?php foreach (explode(',',$skills) as $sk): if(trim($sk)): ?>
          <span class="pill p-b"><?= htmlspecialchars(trim($sk)) ?></span>
        <?php endif; endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if ($interests): ?>
  <div class="pill-block">
    <div class="pill-lbl">Your Interests</div>
    <div class="pills">
      <?php foreach (explode(',',$interests) as $it): if(trim($it)): ?>
        <span class="pill p-g"><?= htmlspecialchars(trim($it)) ?></span>
      <?php endif; endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

<?php elseif ($n===2): /* ── CAREERS ── */ ?>
  <div style="overflow-x:auto;">
  <table class="tbl">
    <thead><tr><th width="36"></th><th>Type</th><th>Roles</th><th>Salary Range</th></tr></thead>
    <tbody>
    <?php foreach ($careers as $c): ?>
    <tr>
      <td style="font-size:1.25rem;padding:11px 8px;"><?= $c[0] ?></td>
      <td style="font-weight:700;white-space:nowrap;"><?= $c[1] ?></td>
      <td style="color:var(--muted);font-size:.8rem;"><?= $c[2] ?></td>
      <td class="sal"><?= $c[3] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  </div>

<?php elseif ($n===3): /* ── HIGHER STUDIES ── */ ?>
  <?php foreach ($studies as $s2): ?>
  <div class="scard">
    <div class="scard-flag"><?= $s2[0] ?></div>
    <div class="scard-info">
      <h4><?= $s2[1] ?></h4>
      <p><?= $s2[2] ?></p>
      <span class="exam-tag">📝 Exam: <?= $s2[3] ?></span>
    </div>
  </div>
  <?php endforeach; ?>
  <div class="ib ib-a">💡 <strong>Start early:</strong> Begin entrance exam preparation at least 12 months in advance. Pick 1–2 target exams and go deep.</div>

<?php elseif ($n===4): /* ── SKILLS ── */ ?>
  <?php
  $pClasses = ['p-b','p-g','p-v','p-o','p-c'];
  foreach ($skillGroups as $gi => $sg):
    $pc = $pClasses[$gi % count($pClasses)];
  ?>
  <div class="pill-block">
    <div class="pill-lbl"><?= $sg[0] ?></div>
    <div class="pills">
      <?php foreach (explode(',',$sg[2]) as $sk): ?>
        <span class="pill <?= $pc ?>"><?= htmlspecialchars(trim($sk)) ?></span>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endforeach; ?>

<?php elseif ($n===5): /* ── COURSES ── */ ?>
  <div class="ib ib-b" style="margin-bottom:14px;"><?= $budgetMsg ?></div>
  <div class="rg">
  <?php
  $courses = [
    ["CS50 Harvard","Free","Best intro to CS & programming — Harvard quality, 100% free.","https://cs50.harvard.edu/x/","https://www.youtube.com/cs50"],
    ["NPTEL (IIT/IISc)","Free","Govt-recognized courses by IIT & IISc professors.","https://nptel.ac.in/",""],
    ["SWAYAM","Free","UGC/AICTE approved platform — free Indian university courses.","https://swayam.gov.in/",""],
    ["freeCodeCamp","Free","Web dev, Data Science, full certifications — all free.","https://www.freecodecamp.org/","https://youtube.com/@freecodecamp"],
    ["Google Digital Garage","Free","Digital Marketing & Data basics — official Google certificate.","https://learndigital.withgoogle.com/digitalgarage",""],
    ["Microsoft Learn","Free","Azure, AI, Power BI, M365 — all free with certificates.","https://learn.microsoft.com/",""],
    ["Khan Academy","Free","Math, Science, Economics, Computing — great fundamentals.","https://www.khanacademy.org/",""],
    ["Coursera","Paid","University-level courses — apply for 100% financial aid.","https://www.coursera.org/","https://www.coursera.org/about/financial-aid"],
    ["edX","Paid","MIT, Harvard, Berkeley courses — audit most for free.","https://www.edx.org/",""],
    ["Udemy","Paid","Wait for sales — never pay full price! Best at ₹400–600.","https://www.udemy.com/",""],
    ["LinkedIn Learning","Trial","1-month free trial — business and tech skills with certs.","https://www.linkedin.com/learning/",""],
    ["Simplilearn SkillUp","Free","Free courses with certificates in trending tech skills.","https://www.simplilearn.com/skillup-free-online-courses",""],
  ];
  foreach ($courses as $c):
    $bc = $c[1]==='Free' ? '' : ($c[1]==='Trial' ? 'trial' : 'paid');
  ?>
  <div class="rc">
    <div class="rc-top"><h4><?= $c[0] ?></h4><span class="badge <?= $bc ?>"><?= $c[1] ?></span></div>
    <p><?= $c[2] ?></p>
    <a href="<?= $c[3] ?>" target="_blank" rel="noopener" class="rc-lnk">🔗 Visit Platform →</a>
    <?php if ($c[4]): ?><a href="<?= $c[4] ?>" target="_blank" rel="noopener" class="rc-lnk">🎥 YouTube Channel →</a><?php endif; ?>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===6): /* ── YOUTUBE ── */ ?>
  <div class="rg">
  <?php
  $yt = [
    ["freeCodeCamp","Full tech courses — 12M+ subs. Best free learning on YouTube.","https://www.youtube.com/@freecodecamp"],
    ["CodeWithHarry","Best for Indian students — Hindi & English, all topics.","https://www.youtube.com/@CodeWithHarry"],
    ["Apna College","Top-rated DSA, Web Dev, and placement prep.","https://www.youtube.com/@ApnaCollegeOfficial"],
    ["Programming with Mosh","Clean, professional coding tutorials for all levels.","https://www.youtube.com/@programmingwithmosh"],
    ["Neso Academy","CS fundamentals, GATE preparation — very structured.","https://www.youtube.com/@nesoacademy"],
    ["Gate Smashers","GATE CS preparation — clear explanations.","https://www.youtube.com/@GateSmashers"],
    ["Traversy Media","Web dev crash courses — highly practical.","https://www.youtube.com/@TraversyMedia"],
    ["Fireship","10-minute focused tech concept videos — great for quick learning.","https://www.youtube.com/@Fireship"],
    ["Great Learning","Data Science, AI/ML, free tutorials with certificates.","https://www.youtube.com/@greatlearningofficial"],
    ["Google Developers","Official Google tech content — Android, Web, Cloud.","https://www.youtube.com/@GoogleDevelopers"],
    ["Microsoft Developer","Azure, .NET, AI tools — official Microsoft channel.","https://www.youtube.com/@MicrosoftDeveloper"],
    ["AWS","Official AWS cloud computing tutorials.","https://www.youtube.com/@amazonwebservices"],
  ];
  foreach ($yt as $c): ?>
  <div class="rc">
    <div class="rc-top"><h4><?= $c[0] ?></h4><span class="badge">Free</span></div>
    <p><?= $c[1] ?></p>
    <a href="<?= $c[2] ?>" target="_blank" rel="noopener" class="rc-lnk">▶️ Subscribe →</a>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===7): /* ── WEBSITES ── */ ?>
  <div class="rg">
  <?php
  $sites = [
    ["GeeksforGeeks","DSA, interview prep, CS theory & coding tutorials.","https://www.geeksforgeeks.org/"],
    ["LeetCode","The #1 platform for coding interview DSA problems.","https://leetcode.com/"],
    ["HackerRank","Practice coding challenges + earn skill certificates.","https://www.hackerrank.com/"],
    ["CodeChef","Competitive programming — beginner to advanced.","https://www.codechef.com/"],
    ["Codeforces","Advanced competitive coding contests worldwide.","https://codeforces.com/"],
    ["Kaggle","Data Science notebooks, datasets & competitions.","https://www.kaggle.com/"],
    ["W3Schools","Web development reference and interactive tutorials.","https://www.w3schools.com/"],
    ["MDN Web Docs","The ultimate web developer documentation reference.","https://developer.mozilla.org/"],
    ["GitHub","Host code, build portfolio, contribute to open source.","https://github.com/"],
    ["AWS Skill Builder","Free official AWS cloud training — 500+ courses.","https://skillbuilder.aws/"],
    ["IndiaBIX","Aptitude, verbal reasoning, interview prep for placements.","https://www.indiabix.com/"],
    ["Unstop (D2C)","Competitions, hackathons, internships, campus events.","https://unstop.com/"],
  ];
  foreach ($sites as $s2): ?>
  <div class="rc">
    <h4 style="margin-bottom:5px;"><?= $s2[0] ?></h4>
    <p><?= $s2[1] ?></p>
    <a href="<?= $s2[2] ?>" target="_blank" rel="noopener" class="rc-lnk">🌐 Visit →</a>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===8): /* ── APPS ── */ ?>
  <div class="rg">
  <?php
  $apps = [
    ["SoloLearn","Gamified coding on your phone — great for beginners.","https://www.sololearn.com/"],
    ["LinkedIn Learning","Business & soft skills with LinkedIn certificates.","https://www.linkedin.com/learning/"],
    ["LeetCode App","Practice DSA problems anywhere, anytime.","https://leetcode.com/"],
    ["HackerRank App","Daily coding challenges — track skill progress.","https://www.hackerrank.com/"],
    ["Coursera App","University courses — download for offline study.","https://www.coursera.org/mobile"],
    ["Udemy App","Download any course for offline access.","https://www.udemy.com/mobile/"],
    ["Khan Academy App","Math, Science, Economics — completely free.","https://www.khanacademy.org/"],
    ["Entri App","Government job exam prep for Indian students.","https://entri.app/"],
    ["Unacademy App","Competitive exam preparation — GATE, UPSC, CAT.","https://unacademy.com/"],
    ["GFG App","Interview prep & CS concepts on the go.","https://www.geeksforgeeks.org/"],
  ];
  foreach ($apps as $a): ?>
  <div class="rc">
    <h4 style="margin-bottom:5px;"><?= $a[0] ?></h4>
    <p><?= $a[1] ?></p>
    <a href="<?= $a[2] ?>" target="_blank" rel="noopener" class="rc-lnk">📱 Download →</a>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===9): /* ── CERTS ── */ ?>
  <div class="certs">
  <?php
  $certs = [
    ["🟠","AWS Cloud Practitioner","Entry-level cloud cert — most in-demand globally.","https://aws.amazon.com/certification/certified-cloud-practitioner/","₹7,500","paid"],
    ["🔵","Google Data Analytics","Beginner-friendly — apply for 100% financial aid.","https://www.coursera.org/professional-certificates/google-data-analytics","Aid Available","trial"],
    ["🔵","Meta Front-End Developer","Industry recognized, project-based learning path.","https://www.coursera.org/professional-certificates/meta-front-end-developer","Aid Available","trial"],
    ["🟢","HubSpot Digital Marketing","100% free — globally recognized marketing cert.","https://academy.hubspot.com/courses/digital-marketing","FREE",""],
    ["🔵","Microsoft Azure AZ-900","Cloud computing fundamentals — great for freshers.","https://learn.microsoft.com/en-us/certifications/azure-fundamentals/","₹2,500","paid"],
    ["🟢","Google IT Support","Best intro to IT careers — Coursera, apply for aid.","https://www.coursera.org/professional-certificates/google-it-support","Aid Available","trial"],
    ["🟠","Oracle Java Foundations","Industry standard Java programming credential.","https://education.oracle.com/java-certification","Paid","paid"],
    ["🟡","Cisco CCNA (Intro)","Top networking cert — free intro on Cisco SkillsForAll.","https://skillsforall.com/","Free Intro",""],
  ];
  foreach ($certs as $c): ?>
  <div class="cert">
    <div class="cert-name">
      <?= $c[0] ?> <?= $c[1] ?>
      <small><?= $c[2] ?></small>
    </div>
    <div class="cert-r">
      <span class="badge <?= $c[5] ?>"><?= $c[4] ?></span>
      <a href="<?= $c[3] ?>" target="_blank" rel="noopener" class="clnk">View →</a>
    </div>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===10): /* ── PROJECTS ── */ ?>
  <?php foreach ($projects as $p): ?>
  <div class="pcard">
    <div class="pcard-title">💡 <?= $p[0] ?></div>
    <div class="pcard-tags">
      <span class="ptag">🛠️ Tech: <?= $p[1] ?></span>
      <span class="ptag">🚀 Deploy: <?= $p[2] ?></span>
    </div>
    <div class="pcard-desc"><?= $p[3] ?></div>
  </div>
  <?php endforeach; ?>
  <div class="ib ib-g">
    🚀 <strong>Always deploy live:</strong>
    <a href="https://vercel.com" target="_blank">Vercel</a> ·
    <a href="https://www.netlify.com" target="_blank">Netlify</a> ·
    <a href="https://pages.github.com" target="_blank">GitHub Pages</a> ·
    <a href="https://render.com" target="_blank">Render</a> ·
    <a href="https://railway.app" target="_blank">Railway</a>
  </div>

<?php elseif ($n===11): /* ── RESUME ── */ ?>
  <div class="tip-list">
  <?php
  $tips = [
    ["📄","Use the <strong>Harvard Resume Template</strong> — ATS-friendly and recruiter approved. <a href='https://hwpi.harvard.edu/files/ocs/files/undergrad_resumes_and_cover_letters.pdf' target='_blank'>Download Free PDF →</a>"],
    ["✏️","Use the <strong>XYZ Formula</strong>: <em>'Accomplished [X] measured by [Y], by doing [Z].'</em> Quantify every single bullet point with numbers."],
    ["🔗","Always include clickable links to your <a href='https://github.com' target='_blank'>GitHub</a>, <a href='https://linkedin.com' target='_blank'>LinkedIn</a>, and all live deployed projects."],
    ["🎨","Use <a href='https://www.overleaf.com/latex/templates' target='_blank'>Overleaf LaTeX templates</a> for professional, perfectly formatted resumes that stand out."],
    ["📏","Keep it <strong>strictly 1 page</strong> as a fresher. Font: Calibri or Garamond, 10.5–11pt. Margins: 0.5 inch. No photos, no colors."],
    ["🤖","Test ATS compatibility at <a href='https://www.jobscan.co/' target='_blank'>Jobscan.co</a> — match keywords from the job description before applying."],
    ["💡","Customize your resume for each company. Swap keywords to match the job description. 5 targeted applications beat 50 generic ones."],
  ];
  foreach ($tips as $t): ?>
  <div class="tip">
    <div class="tip-ico"><?= $t[0] ?></div>
    <div class="tip-txt"><?= $t[1] ?></div>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===12): /* ── PLACEMENT ── */ ?>
  <div class="pg">
  <?php
  $prep = [
    ["📐","Aptitude Practice","Daily 30 mins on <a href='https://www.indiabix.com/' target='_blank'>IndiaBIX</a>. Cover Quantitative, Verbal, Logical Reasoning thoroughly."],
    ["💻","DSA & Coding","LeetCode: Easy first, then Medium. Complete GFG 'SDE Sheet'. Target 150+ problems before campus placements."],
    ["🤝","Mock Interviews","<a href='https://www.pramp.com/' target='_blank'>Pramp.com</a> — free peer-to-peer technical mock interviews. Practice weekly."],
    ["🗣️","HR Interview","Practice STAR method (Situation, Task, Action, Result). Watch <a href='https://www.youtube.com/results?search_query=hr+interview+questions+freshers' target='_blank'>HR mock interviews on YouTube</a>."],
    ["👥","Group Discussion","Stay updated on current affairs. Practice with friends on <a href='https://www.youtube.com/results?search_query=gd+topics+2024' target='_blank'>current GD topics</a> weekly."],
    ["🏆","Hackathons","Register on <a href='https://unstop.com/' target='_blank'>Unstop</a>, <a href='https://devfolio.co/' target='_blank'>Devfolio</a>, <a href='https://www.hackerearth.com/' target='_blank'>HackerEarth</a>. Aim for 3+ hackathons per year."],
    ["💼","LinkedIn Profile","Professional headline, detailed About, all skills listed. Connect with 10 new recruiters every week."],
    ["🎯","Company Research","Study culture, tech stack, recent news of target company 48 hrs before every interview."],
  ];
  foreach ($prep as $p): ?>
  <div class="pi">
    <h4><?= $p[0] ?> <?= $p[1] ?></h4>
    <p><?= $p[2] ?></p>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===13): /* ── ROADMAP ── */ ?>
  <div class="rm">
  <?php foreach ($roadmap as $rm): ?>
  <div class="rm-item">
    <div class="rm-dot" style="background:<?= $rm[1] ?>;"><?= $rm[0] ?></div>
    <div class="rm-cnt">
      <div class="rm-phase"><?= $rm[0] ?></div>
      <div class="rm-text"><?= $rm[2] ?></div>
    </div>
  </div>
  <?php endforeach; ?>
  </div>

<?php elseif ($n===14): /* ── WEEKLY PLAN ── */ ?>
  <p style="font-size:.83rem;color:var(--muted);margin-bottom:14px;">
    With <strong style="color:var(--text);"><?= $timePerWeek ?> hours per week</strong>, here's your optimal distribution for maximum progress:
  </p>
  <div class="plan-grid">
    <div class="plan-item">
      <div class="plan-pct">40%</div>
      <div class="plan-lbl">Core Learning</div>
      <div class="plan-sub">Courses, tutorials, documentation reading</div>
    </div>
    <div class="plan-item">
      <div class="plan-pct">40%</div>
      <div class="plan-lbl">Building Projects</div>
      <div class="plan-sub">Coding, designing, writing, creating</div>
    </div>
    <div class="plan-item">
      <div class="plan-pct">20%</div>
      <div class="plan-lbl">Networking</div>
      <div class="plan-sub">LinkedIn, communities, aptitude, events</div>
    </div>
  </div>
  <div class="ib ib-b">
    💡 <strong>Daily goal:</strong> 1 hour learning · 1 hour building · 30 minutes on <a href="https://linkedin.com" target="_blank">LinkedIn</a> — consistency over intensity always wins.
  </div>

<?php elseif ($n===15): /* ── MOTIVATION ── */ ?>
  <div class="mbox">
    <h3>✨ A Personal Message for You, <?= $name ?> ✨</h3>
    <p>
      The journey from college to career is not a straight line — and that's completely okay.
      <strong>Consistency beats intensity</strong> every single time. You don't need to know everything.
      You just need to start today, build something real, and keep going even when it's hard.
    </p>
    <p>
      Your <strong><?= $degree ?></strong> from <strong><?= $college ?></strong> is just the starting line.
      It's your <em>skills, projects, and mindset</em> that will define where you go.
      The fact that you're planning your career now puts you ahead of 80% of your peers.
    </p>
    <div class="mquote">
      "The expert in anything was once a beginner who simply refused to give up." ✊
    </div>
  </div>

<?php endif; ?>

  </div><!-- /.sc-bd -->
</div><!-- /.sc -->
<?php endforeach; ?>

<?php endif; /* end report */ ?>

</div><!-- /.wrap -->

<script>
/* ── SEMESTER FILLER ── */
function fillSem() {
    var deg = document.getElementById('degSel');
    var sem = document.getElementById('semSel');
    if (!deg || !sem) return;
    sem.innerHTML = '<option value="">— Select Semester —</option>';
    var v = deg.value;
    if (!v) return;
    var max = (v === 'B.Tech' || v === 'BE') ? 8 : 6;
    var sx = function(n) { return n===1?'1st':n===2?'2nd':n===3?'3rd':n+'th'; };
    for (var i = 1; i <= max; i++) {
        var o = document.createElement('option');
        o.value = sx(i) + ' Semester';
        o.textContent = sx(i) + ' Semester';
        sem.appendChild(o);
    }
}
window.addEventListener('DOMContentLoaded', function() { fillSem(); });

/* ── ACCORDION ── */
function tog(n) {
    var bd = document.getElementById('bd' + n);
    var ch = document.getElementById('ch' + n);
    if (!bd) return;
    var isOpen = bd.classList.contains('open');
    if (isOpen) {
        bd.classList.remove('open');
        if (ch) ch.classList.remove('open');
    } else {
        bd.classList.add('open');
        if (ch) ch.classList.add('open');
    }
}
function expandAll() {
    for (var i = 1; i <= 15; i++) {
        var bd = document.getElementById('bd' + i);
        var ch = document.getElementById('ch' + i);
        if (bd) bd.classList.add('open');
        if (ch) ch.classList.add('open');
    }
}
function collapseAll() {
    for (var i = 1; i <= 15; i++) {
        var bd = document.getElementById('bd' + i);
        var ch = document.getElementById('ch' + i);
        if (bd) bd.classList.remove('open');
        if (ch) ch.classList.remove('open');
    }
}
</script>
</body>
</html>