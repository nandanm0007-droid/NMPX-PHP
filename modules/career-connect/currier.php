<?php
session_start();

/* =========================================================
   40 JOB RECORDS
   ========================================================= */

$jobs = [
    /* ---------- IT & SOFTWARE ---------- */
    [
        "id"=>1, "company"=>"Infosys", "role"=>"Software Engineer",
        "category"=>"IT & Software", "location"=>"Bengaluru",
        "salary"=>"₹5 - ₹8 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BSc / BE / BTech",
        "skills"=>"PHP, HTML, SQL, Programming",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Paid Leave"
    ],
    [
        "id"=>2, "company"=>"TCS", "role"=>"Software Developer",
        "category"=>"IT & Software", "location"=>"Bengaluru",
        "salary"=>"₹4 - ₹7 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / MCA / BE / BTech",
        "skills"=>"Java, SQL, HTML, Programming",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ],
    [
        "id"=>3, "company"=>"Wipro", "role"=>"PHP Developer",
        "category"=>"IT & Software", "location"=>"Hyderabad",
        "salary"=>"₹4.5 - ₹7 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / MCA / BSc",
        "skills"=>"PHP, MySQL, HTML, CSS",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"20 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Transport"
    ],
    [
        "id"=>4, "company"=>"Accenture",
        "role"=>"Associate Software Engineer",
        "category"=>"IT & Software", "location"=>"Pune",
        "salary"=>"₹5 - ₹9 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Programming, SQL, HTML, PHP",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, Bonus, PF"
    ],
    [
        "id"=>5, "company"=>"HCLTech", "role"=>"Software Tester",
        "category"=>"IT & Software", "location"=>"Chennai",
        "salary"=>"₹4 - ₹6 LPA", "experience"=>"Fresher - 1 Year",
        "education"=>"BCA / BSc / BE",
        "skills"=>"Testing, SQL, Programming",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Paid Leave"
    ],
    /* ---------- WEB DEVELOPMENT ---------- */
    [
        "id"=>6, "company"=>"Zoho", "role"=>"Web Developer",
        "category"=>"Web Development", "location"=>"Chennai",
        "salary"=>"₹5 - ₹9 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / MCA / BSc",
        "skills"=>"HTML, CSS, PHP, JavaScript",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF, Meals"
    ],
    [
        "id"=>7, "company"=>"Freshworks", "role"=>"Frontend Developer",
        "category"=>"Web Development", "location"=>"Chennai",
        "salary"=>"₹6 - ₹10 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BTech / MCA",
        "skills"=>"HTML, CSS, JavaScript",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF, Bonus"
    ],
    [
        "id"=>8, "company"=>"Mphasis", "role"=>"Backend Developer",
        "category"=>"Web Development", "location"=>"Bengaluru",
        "salary"=>"₹5 - ₹8 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / MCA / BE", "skills"=>"PHP, MySQL, SQL",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>9, "company"=>"Tech Mahindra",
        "role"=>"Full Stack Developer",
        "category"=>"Web Development", "location"=>"Pune",
        "salary"=>"₹5 - ₹9 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / MCA / BTech",
        "skills"=>"HTML, CSS, PHP, SQL",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ],
    /* ---------- DATA & AI ---------- */
    [
        "id"=>10, "company"=>"IBM", "role"=>"Data Analyst",
        "category"=>"Data & AI", "location"=>"Bengaluru",
        "salary"=>"₹6 - ₹10 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BSc / MCA",
        "skills"=>"Python, SQL, Excel, Data Analysis",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF, Bonus"
    ],
    [
        "id"=>11, "company"=>"Microsoft", "role"=>"Data Analyst",
        "category"=>"Data & AI", "location"=>"Hyderabad",
        "salary"=>"₹8 - ₹14 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BSc / BE",
        "skills"=>"Python, SQL, Excel, Power BI",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, Bonus, PF"
    ],
    [
        "id"=>12, "company"=>"Google",
        "role"=>"Junior Software Engineer",
        "category"=>"Data & AI", "location"=>"Bengaluru",
        "salary"=>"₹10 - ₹18 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BE / BTech / MCA",
        "skills"=>"Python, Java, Data Structures",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, Meals, Bonus"
    ],
    [
        "id"=>13, "company"=>"Amazon",
        "role"=>"Cloud Support Associate",
        "category"=>"Cloud & IT", "location"=>"Bengaluru",
        "salary"=>"₹5 - ₹9 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BSc / BE",
        "skills"=>"Cloud, Linux, Networking",
        "timing"=>"Flexible", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF, Bonus"
    ],
    /* ---------- CLOUD & CYBER SECURITY ---------- */
    [
        "id"=>14, "company"=>"Cognizant",
        "role"=>"Cloud Support Engineer",
        "category"=>"Cloud & IT", "location"=>"Chennai",
        "salary"=>"₹5 - ₹8 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BTech / MCA",
        "skills"=>"Cloud, Linux, Networking",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>15, "company"=>"Deloitte",
        "role"=>"Cyber Security Analyst",
        "category"=>"Cyber Security", "location"=>"Bengaluru",
        "salary"=>"₹6 - ₹11 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / MCA / BE",
        "skills"=>"Cyber Security, Networking, Linux",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF, Paid Leave"
    ],
    [
        "id"=>16, "company"=>"Cisco", "role"=>"Network Engineer",
        "category"=>"Networking", "location"=>"Bengaluru",
        "salary"=>"₹6 - ₹10 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCA / BTech / BE",
        "skills"=>"Networking, CCNA, Linux",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF, Bonus"
    ],
    /* ---------- BANKING ---------- */
    [
        "id"=>17, "company"=>"HDFC Bank",
        "role"=>"Banking Operations Executive",
        "category"=>"Banking & Finance", "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher - 1 Year",
        "education"=>"Any Degree",
        "skills"=>"Communication, MS Office, Finance",
        "timing"=>"9:30 AM - 5:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Saturday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>18, "company"=>"ICICI Bank",
        "role"=>"Relationship Manager",
        "category"=>"Banking & Finance", "location"=>"Mysuru",
        "salary"=>"₹3.5 - ₹6 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Communication, Sales, Finance",
        "timing"=>"9:30 AM - 5:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Saturday",
        "benefits"=>"PF, Insurance, Incentives"
    ],
    [
        "id"=>19, "company"=>"Axis Bank",
        "role"=>"Customer Service Executive",
        "category"=>"Banking & Finance", "location"=>"Shivamogga",
        "salary"=>"₹2.5 - ₹4.5 LPA", "experience"=>"Fresher - 1 Year",
        "education"=>"Any Degree",
        "skills"=>"Communication, Customer Service",
        "timing"=>"9:30 AM - 5:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Saturday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>20, "company"=>"Kotak Mahindra Bank",
        "role"=>"Finance Executive",
        "category"=>"Banking & Finance", "location"=>"Mumbai",
        "salary"=>"₹3.5 - ₹6 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCom / BBA / Any Degree",
        "skills"=>"Finance, Excel, Accounting",
        "timing"=>"9:30 AM - 5:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ],
    /* ---------- BPO ---------- */
    [
        "id"=>21, "company"=>"Concentrix",
        "role"=>"Customer Support Executive",
        "category"=>"BPO & Customer Support", "location"=>"Bengaluru",
        "salary"=>"₹2.5 - ₹4.5 LPA", "experience"=>"Fresher - 1 Year",
        "education"=>"Any Degree",
        "skills"=>"English, Communication, Customer Service",
        "timing"=>"Shift Based", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"5 Days", "benefits"=>"Transport, PF, Insurance"
    ],
    [
        "id"=>22, "company"=>"Teleperformance",
        "role"=>"Technical Support Executive",
        "category"=>"BPO & Customer Support", "location"=>"Hyderabad",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher - 1 Year",
        "education"=>"Any Degree",
        "skills"=>"Communication, Computer Knowledge",
        "timing"=>"Shift Based", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"5 Days", "benefits"=>"Transport, Insurance"
    ],
    /* ---------- DESIGN ---------- */
    [
        "id"=>23, "company"=>"Tata Elxsi", "role"=>"UI/UX Designer",
        "category"=>"Design & Creative", "location"=>"Bengaluru",
        "salary"=>"₹4 - ₹7 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Figma, UI Design, UX Research",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ],
    [
        "id"=>24, "company"=>"Myntra", "role"=>"Graphic Designer",
        "category"=>"Design & Creative", "location"=>"Bengaluru",
        "salary"=>"₹3.5 - ₹6 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Photoshop, Illustrator, Canva",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, PF"
    ],
    /* ---------- HR ---------- */
    [
        "id"=>25, "company"=>"Reliance Industries",
        "role"=>"HR Executive",
        "category"=>"Human Resources", "location"=>"Mumbai",
        "salary"=>"₹4 - ₹7 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree / MBA HR",
        "skills"=>"Communication, Recruitment, HR",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ],
    [
        "id"=>26, "company"=>"Aditya Birla Group",
        "role"=>"Management Trainee",
        "category"=>"Human Resources", "location"=>"Bengaluru",
        "salary"=>"₹4 - ₹7 LPA", "experience"=>"Fresher",
        "education"=>"Any Degree / MBA",
        "skills"=>"Communication, Management, Excel",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance"
    ],
    /* ---------- SALES ---------- */
    [
        "id"=>27, "company"=>"Flipkart", "role"=>"Sales Executive",
        "category"=>"Sales & Marketing", "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Communication, Sales, Marketing",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday",
        "benefits"=>"PF, Insurance, Incentives"
    ],
    [
        "id"=>28, "company"=>"Swiggy",
        "role"=>"Business Development Executive",
        "category"=>"Sales & Marketing", "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹6 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Sales, Communication, Marketing",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"Insurance, Incentives"
    ],
    /* ---------- HEALTHCARE ---------- */
    [
        "id"=>29, "company"=>"Apollo Hospitals",
        "role"=>"Hospital Administration Executive",
        "category"=>"Healthcare", "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Communication, Administration, MS Office",
        "timing"=>"Shift Based", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"6 Days", "benefits"=>"Insurance, PF"
    ],
    [
        "id"=>30, "company"=>"Manipal Hospitals",
        "role"=>"Healthcare Coordinator",
        "category"=>"Healthcare", "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹5.5 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Communication, Administration",
        "timing"=>"Shift Based", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"6 Days", "benefits"=>"Insurance, PF"
    ],
    /* ---------- EDUCATION ---------- */
    [
        "id"=>31, "company"=>"Unacademy",
        "role"=>"Content Associate",
        "category"=>"Education", "location"=>"Bengaluru",
        "salary"=>"₹3.5 - ₹6 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Content Writing, Communication",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>32, "company"=>"BYJU'S",
        "role"=>"Academic Counselor",
        "category"=>"Education", "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher",
        "education"=>"Any Degree",
        "skills"=>"Communication, Counseling",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Saturday",
        "benefits"=>"Insurance, Incentives"
    ],
    /* ---------- MEDIA ---------- */
    [
        "id"=>33, "company"=>"Times Group",
        "role"=>"Content Writer",
        "category"=>"Media & Communication", "location"=>"Mumbai",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Writing, English, Communication",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>34, "company"=>"Zee Entertainment",
        "role"=>"Digital Media Executive",
        "category"=>"Media & Communication", "location"=>"Mumbai",
        "salary"=>"₹3.5 - ₹6 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Social Media, Communication, Content",
        "timing"=>"10:00 AM - 7:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance"
    ],
    /* ---------- LOGISTICS ---------- */
    [
        "id"=>35, "company"=>"DHL",
        "role"=>"Logistics Executive",
        "category"=>"Logistics & Supply Chain",
        "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Logistics, Excel, Communication",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Saturday", "benefits"=>"PF, Insurance"
    ],
    [
        "id"=>36, "company"=>"Delhivery",
        "role"=>"Operations Executive",
        "category"=>"Logistics & Supply Chain",
        "location"=>"Hyderabad",
        "salary"=>"₹3 - ₹5.5 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"Any Degree",
        "skills"=>"Operations, Excel, Communication",
        "timing"=>"9:00 AM - 6:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Saturday", "benefits"=>"PF, Insurance"
    ],
    /* ---------- GOVERNMENT ---------- */
    [
        "id"=>37, "company"=>"LIC",
        "role"=>"Assistant / Administrative Executive",
        "category"=>"Government & Public Sector",
        "location"=>"Bengaluru",
        "salary"=>"₹3 - ₹6 LPA", "experience"=>"Fresher",
        "education"=>"Any Degree",
        "skills"=>"Communication, MS Office, Administration",
        "timing"=>"10:00 AM - 5:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday",
        "benefits"=>"PF, Insurance, Leave Benefits"
    ],
    [
        "id"=>38, "company"=>"India Post",
        "role"=>"Postal Assistant",
        "category"=>"Government & Public Sector",
        "location"=>"Karnataka",
        "salary"=>"₹3 - ₹5 LPA", "experience"=>"Fresher",
        "education"=>"Any Degree",
        "skills"=>"Computer Knowledge, Communication",
        "timing"=>"9:00 AM - 5:00 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Office",
        "days"=>"Monday - Friday",
        "benefits"=>"Government Benefits, Pension"
    ],
    /* ---------- ACCOUNTING ---------- */
    [
        "id"=>39, "company"=>"KPMG", "role"=>"Audit Associate",
        "category"=>"Accounting & Finance", "location"=>"Bengaluru",
        "salary"=>"₹4 - ₹7 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCom / BBA / CA Inter",
        "skills"=>"Accounting, Excel, Finance",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ],
    [
        "id"=>40, "company"=>"EY", "role"=>"Tax Associate",
        "category"=>"Accounting & Finance", "location"=>"Bengaluru",
        "salary"=>"₹4 - ₹7 LPA", "experience"=>"Fresher - 2 Years",
        "education"=>"BCom / BBA / CA Inter",
        "skills"=>"Taxation, Accounting, Excel",
        "timing"=>"9:30 AM - 6:30 PM", "lunch"=>"1 Hour",
        "tea"=>"15 Minutes", "work"=>"Hybrid",
        "days"=>"Monday - Friday", "benefits"=>"PF, Insurance, Bonus"
    ]
];

/* =========================================================
   REGISTRATION
   ========================================================= */
if (isset($_POST["register"])) {
    $name     = trim($_POST["name"]);
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION["reg_error"] = "Please fill all required fields.";
        header("Location: ?page=register");
        exit();
    }

    $_SESSION["registered"] = true;
    $_SESSION["student"] = [
        "name"     => $name,
        "email"    => $email,
        "password" => $password,
        "degree"   => $_POST["degree"],
        "skills"   => trim($_POST["skills"]),
        "role"     => $_POST["role"],
        "location" => trim($_POST["location"]),
        "salary"   => trim($_POST["salary"])
    ];
    $_SESSION["message"] = "✅ Registration successful! Please login.";
    header("Location: ?page=login");
    exit();
}

/* =========================================================
   LOGIN
   ========================================================= */
if (isset($_POST["login"])) {
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!isset($_SESSION["registered"])) {
        $_SESSION["login_error"] = "❌ No account found. Please register first.";
        header("Location: ?page=login");
        exit();
    }

    if (
        $email    === $_SESSION["student"]["email"] &&
        $password === $_SESSION["student"]["password"]
    ) {
        $_SESSION["loggedin"] = true;
        header("Location: ?page=dashboard");
        exit();
    } else {
        $_SESSION["login_error"] = "❌ Invalid email or password. Please try again.";
        header("Location: ?page=login");
        exit();
    }
}

/* =========================================================
   LOGOUT
   ========================================================= */
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: ?page=home");
    exit();
}

/* =========================================================
   APPLY FOR JOB
   ========================================================= */
if (isset($_POST["apply_job"])) {
    if (!isset($_SESSION["loggedin"])) {
        header("Location: ?page=login");
        exit();
    }

    $alreadyApplied = false;
    if (isset($_SESSION["applications"])) {
        foreach ($_SESSION["applications"] as $app) {
            if (
                $app["company"] === $_POST["company"] &&
                $app["role"]    === $_POST["role"]
            ) {
                $alreadyApplied = true;
                break;
            }
        }
    }

    if ($alreadyApplied) {
        $_SESSION["application_message"] = "⚠️ You have already applied for this job!";
        $_SESSION["msg_type"] = "info";
    } else {
        if (!isset($_SESSION["applications"])) {
            $_SESSION["applications"] = [];
        }
        $_SESSION["applications"][] = [
            "company" => $_POST["company"],
            "role"    => $_POST["role"],
            "salary"  => $_POST["salary"],
            "date"    => date("d-m-Y"),
            "status"  => "Applied"
        ];
        $_SESSION["application_message"] = "✅ Application submitted successfully!";
        $_SESSION["msg_type"] = "success";
    }
    header("Location: ?page=applications");
    exit();
}

/* =========================================================
   PAGE ROUTING
   ========================================================= */
$page = isset($_GET["page"]) ? $_GET["page"] : "home";

if (
    ($page === "dashboard" || $page === "applications") &&
    !isset($_SESSION["loggedin"])
) {
    header("Location: ?page=login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CareerConnect - Smart Career & Job Finder</title>
<style>
/* ================================================
   RESET & BASE
   ================================================ */
* { margin:0; padding:0; box-sizing:border-box; }

body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f0f4ff;
    color: #1f2937;
    min-height: 100vh;
}

a { text-decoration: none; }

/* ================================================
   HEADER
   ================================================ */
header {
    background: linear-gradient(135deg,#0f172a,#172554);
    color: white;
    padding: 0 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 65px;
    position: sticky;
    top: 0;
    z-index: 999;
    box-shadow: 0 3px 15px rgba(0,0,0,0.3);
}

.logo {
    font-size: 1.5rem;
    font-weight: 800;
    color: #60a5fa;
    letter-spacing: 1px;
}

.logo span { color: #f59e0b; }

nav a {
    color: #cbd5e1;
    margin-left: 20px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: color 0.2s;
    padding: 5px 10px;
    border-radius: 6px;
}

nav a:hover { color: #60a5fa; background: rgba(96,165,250,0.1); }

nav a.active {
    color: #60a5fa;
    background: rgba(96,165,250,0.15);
    border-bottom: 2px solid #60a5fa;
}

nav a.btn-logout {
    background: #dc2626;
    color: white;
    padding: 6px 14px;
    border-radius: 8px;
    font-weight: 600;
}

nav a.btn-logout:hover { background: #b91c1c; }

/* ================================================
   HERO SECTION
   ================================================ */
.hero {
    background: linear-gradient(135deg,#1e3a8a,#1e40af,#2563eb);
    color: white;
    text-align: center;
    padding: 80px 5% 60px;
}

.hero h1 {
    font-size: 2.8rem;
    font-weight: 800;
    margin-bottom: 15px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.hero h1 span { color: #fbbf24; }

.hero p {
    font-size: 1.15rem;
    color: #bfdbfe;
    margin-bottom: 30px;
}

.hero-btns { display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; }

.btn {
    display: inline-block;
    padding: 12px 28px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s;
    border: none;
}

.btn-primary {
    background: #f59e0b;
    color: #1f2937;
}

.btn-primary:hover {
    background: #d97706;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(245,158,11,0.4);
}

.btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid white;
}

.btn-secondary:hover {
    background: white;
    color: #1e3a8a;
    transform: translateY(-2px);
}

/* ================================================
   STATS BAR
   ================================================ */
.stats-bar {
    background: white;
    display: flex;
    justify-content: center;
    gap: 60px;
    padding: 25px 5%;
    box-shadow: 0 3px 15px rgba(0,0,0,0.08);
    flex-wrap: wrap;
}

.stat-item { text-align: center; }

.stat-item .num {
    font-size: 2rem;
    font-weight: 800;
    color: #2563eb;
}

.stat-item .lbl {
    font-size: 0.85rem;
    color: #6b7280;
    margin-top: 3px;
}

/* ================================================
   MAIN CONTAINER
   ================================================ */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 5%;
}

/* ================================================
   SECTION TITLE
   ================================================ */
.section-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 10px;
}

.section-sub {
    color: #6b7280;
    margin-bottom: 30px;
    font-size: 0.95rem;
}

/* ================================================
   SEARCH BAR
   ================================================ */
.search-bar {
    display: flex;
    gap: 12px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.search-bar input, .search-bar select {
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 0.95rem;
    font-family: inherit;
    background: white;
    transition: border-color 0.2s;
    flex: 1;
    min-width: 150px;
}

.search-bar input:focus, .search-bar select:focus {
    outline: none;
    border-color: #2563eb;
}

.search-bar button {
    padding: 12px 24px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
}

.search-bar button:hover { background: #1d4ed8; }

/* ================================================
   JOB CARDS GRID
   ================================================ */
.jobs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
    gap: 22px;
}

.job-card {
    background: white;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.07);
    border: 2px solid transparent;
    transition: all 0.25s;
    position: relative;
    overflow: hidden;
}

.job-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg,#2563eb,#7c3aed);
}

.job-card:hover {
    border-color: #2563eb;
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(37,99,235,0.15);
}

.job-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.company-logo {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg,#eff6ff,#dbeafe);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    color: #2563eb;
    font-size: 1.1rem;
    border: 2px solid #bfdbfe;
}

.job-badge {
    background: #dcfce7;
    color: #16a34a;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
}

.job-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 4px;
}

.job-company {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 12px;
}

.job-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 14px;
}

.tag {
    background: #eff6ff;
    color: #1d4ed8;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.tag.green { background: #f0fdf4; color: #15803d; }
.tag.purple { background: #faf5ff; color: #7c3aed; }
.tag.orange { background: #fff7ed; color: #c2410c; }

.job-salary {
    font-size: 1.1rem;
    font-weight: 800;
    color: #2563eb;
    margin-bottom: 14px;
}

.job-card-footer {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.btn-view {
    flex: 1;
    padding: 9px;
    background: #eff6ff;
    color: #2563eb;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    text-align: center;
    font-size: 0.85rem;
    transition: background 0.2s;
}

.btn-view:hover { background: #dbeafe; }

.btn-apply {
    flex: 1;
    padding: 9px;
    background: linear-gradient(135deg,#2563eb,#7c3aed);
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    font-size: 0.85rem;
    transition: opacity 0.2s;
}

.btn-apply:hover { opacity: 0.9; }

/* ================================================
   JOB DETAIL MODAL
   ================================================ */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.modal-overlay.active { display: flex; }

.modal {
    background: white;
    border-radius: 20px;
    padding: 35px;
    max-width: 650px;
    width: 100%;
    max-height: 85vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}

.modal-close {
    position: absolute;
    top: 15px; right: 20px;
    font-size: 1.8rem;
    cursor: pointer;
    color: #6b7280;
    background: none;
    border: none;
    line-height: 1;
}

.modal-close:hover { color: #dc2626; }

.modal-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 5px;
}

.modal-company {
    color: #6b7280;
    margin-bottom: 20px;
    font-size: 1rem;
}

.modal-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-bottom: 20px;
}

.modal-item {
    background: #f8fafc;
    border-radius: 10px;
    padding: 12px 15px;
}

.modal-item .label {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.modal-item .value {
    font-size: 0.95rem;
    font-weight: 700;
    color: #1f2937;
}

.modal-apply-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg,#2563eb,#7c3aed);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    margin-top: 15px;
    transition: opacity 0.2s;
}

.modal-apply-btn:hover { opacity: 0.9; }

/* ================================================
   FORMS (Login / Register)
   ================================================ */
.form-page {
    min-height: calc(100vh - 65px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 5%;
}

.form-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    max-width: 520px;
    width: 100%;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.form-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 8px;
    text-align: center;
}

.form-sub {
    color: #6b7280;
    text-align: center;
    margin-bottom: 30px;
    font-size: 0.9rem;
}

.form-group { margin-bottom: 18px; }

.form-group label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
    font-size: 0.9rem;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 0.95rem;
    font-family: inherit;
    transition: border-color 0.2s;
    background: #f9fafb;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2563eb;
    background: white;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.btn-form {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg,#2563eb,#7c3aed);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    margin-top: 8px;
    transition: opacity 0.2s;
}

.btn-form:hover { opacity: 0.9; }

.form-link {
    text-align: center;
    margin-top: 18px;
    color: #6b7280;
    font-size: 0.9rem;
}

.form-link a { color: #2563eb; font-weight: 600; }

.alert {
    padding: 12px 16px;
    border-radius: 10px;
    margin-bottom: 18px;
    font-weight: 600;
    font-size: 0.9rem;
}

.alert-error { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
.alert-success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
.alert-info { background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; }

/* ================================================
   DASHBOARD
   ================================================ */
.dashboard-hero {
    background: linear-gradient(135deg,#1e3a8a,#2563eb);
    color: white;
    padding: 40px 5%;
    margin-bottom: 0;
}

.dashboard-hero h1 {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 8px;
}

.dashboard-hero p { color: #bfdbfe; font-size: 1rem; }

.profile-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.07);
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.profile-avatar {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg,#2563eb,#7c3aed);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    font-weight: 800;
    color: white;
    flex-shrink: 0;
}

.profile-info h2 {
    font-size: 1.3rem;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 4px;
}

.profile-info p { color: #6b7280; font-size: 0.9rem; }

.profile-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 10px;
}

.dash-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 18px;
    margin-bottom: 30px;
}

.dash-card {
    background: white;
    border-radius: 14px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 3px 15px rgba(0,0,0,0.07);
}

.dash-card .icon {
    font-size: 2rem;
    margin-bottom: 8px;
}

.dash-card .num {
    font-size: 1.8rem;
    font-weight: 800;
    color: #2563eb;
}

.dash-card .lbl {
    font-size: 0.85rem;
    color: #6b7280;
    margin-top: 3px;
}

/* ================================================
   APPLICATIONS TABLE
   ================================================ */
.applications-section {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.07);
    margin-bottom: 30px;
}

.applications-section h2 {
    font-size: 1.3rem;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 20px;
}

.table-wrap { overflow-x: auto; }

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
}

th {
    background: #f1f5f9;
    padding: 12px 15px;
    text-align: left;
    font-weight: 700;
    color: #374151;
    border-bottom: 2px solid #e5e7eb;
}

td {
    padding: 12px 15px;
    border-bottom: 1px solid #f3f4f6;
    color: #4b5563;
}

tr:hover td { background: #f8fafc; }

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 700;
    background: #dcfce7;
    color: #16a34a;
}

/* ================================================
   SMART MATCH SECTION
   ================================================ */
.match-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.07);
    margin-bottom: 30px;
}

.match-card h2 {
    font-size: 1.3rem;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 6px;
}

.match-card p {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 20px;
}

.match-jobs {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 15px;
}

.match-job-card {
    background: linear-gradient(135deg,#eff6ff,#f5f3ff);
    border-radius: 12px;
    padding: 18px;
    border: 2px solid #dbeafe;
    transition: all 0.2s;
}

.match-job-card:hover {
    border-color: #2563eb;
    transform: translateY(-2px);
}

.match-job-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 4px;
}

.match-job-card p {
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 10px;
}

.match-pct {
    font-size: 0.85rem;
    font-weight: 700;
    color: #16a34a;
    background: #dcfce7;
    padding: 3px 10px;
    border-radius: 20px;
    display: inline-block;
}

/* ================================================
   CATEGORIES / FEATURES ON HOME
   ================================================ */
.categories {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
    gap: 15px;
    margin-bottom: 40px;
}

.cat-card {
    background: white;
    border-radius: 14px;
    padding: 20px 15px;
    text-align: center;
    box-shadow: 0 3px 12px rgba(0,0,0,0.06);
    cursor: pointer;
    transition: all 0.2s;
    border: 2px solid transparent;
}

.cat-card:hover {
    border-color: #2563eb;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(37,99,235,0.12);
}

.cat-icon { font-size: 2rem; margin-bottom: 8px; }

.cat-name {
    font-size: 0.85rem;
    font-weight: 700;
    color: #1e3a8a;
}

.cat-count {
    font-size: 0.75rem;
    color: #6b7280;
    margin-top: 3px;
}

/* ================================================
   FEATURES
   ================================================ */
.features {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.feature-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.06);
    border-left: 4px solid #2563eb;
}

.feature-card .icon {
    font-size: 2rem;
    margin-bottom: 12px;
}

.feature-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 8px;
}

.feature-card p {
    font-size: 0.85rem;
    color: #6b7280;
    line-height: 1.6;
}

/* ================================================
   FOOTER
   ================================================ */
footer {
    background: #0f172a;
    color: #94a3b8;
    text-align: center;
    padding: 30px 5%;
    margin-top: 50px;
    font-size: 0.9rem;
}

footer span { color: #60a5fa; font-weight: 700; }

/* ================================================
   EMPTY STATE
   ================================================ */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #6b7280;
}

.empty-state .icon { font-size: 4rem; margin-bottom: 15px; }
.empty-state h3 { font-size: 1.2rem; font-weight: 700; margin-bottom: 8px; color: #374151; }
.empty-state p { font-size: 0.9rem; }

/* ================================================
   RESPONSIVE
   ================================================ */
@media (max-width: 768px) {
    .hero h1 { font-size: 1.9rem; }
    .modal-grid { grid-template-columns: 1fr; }
    .form-row { grid-template-columns: 1fr; }
    .stats-bar { gap: 30px; }
    nav a { margin-left: 10px; font-size: 0.8rem; }
}

@media (max-width: 480px) {
    .logo { font-size: 1.2rem; }
    nav a { margin-left: 6px; font-size: 0.75rem; padding: 4px 6px; }
    .hero h1 { font-size: 1.5rem; }
}
</style>
</head>
<body>

<!-- ================================================
     HEADER
     ================================================ -->
<header>
    <div class="logo">Career<span>Connect</span></div>
    <nav>
        <a href="?page=home" <?= $page==='home' ? 'class="active"' : '' ?>>🏠 Home</a>
        <a href="?page=jobs" <?= $page==='jobs' ? 'class="active"' : '' ?>>💼 Jobs</a>
        <?php if (isset($_SESSION["loggedin"])): ?>
            <a href="?page=dashboard" <?= $page==='dashboard' ? 'class="active"' : '' ?>>📊 Dashboard</a>
            <a href="?page=applications" <?= $page==='applications' ? 'class="active"' : '' ?>>📋 Applications</a>
            <a href="?logout=1" class="btn-logout">🚪 Logout</a>
        <?php else: ?>
            <a href="?page=login" <?= $page==='login' ? 'class="active"' : '' ?>>🔑 Login</a>
            <a href="?page=register" <?= $page==='register' ? 'class="active"' : '' ?>>✨ Register</a>
        <?php endif; ?>
    </nav>
</header>

<?php
/* =========================================================
   HOME PAGE
   ========================================================= */
if ($page === "home"):
?>

<!-- HERO -->
<div class="hero">
    <h1>Find Your <span>Dream Career</span> 🚀</h1>
    <p>Smart job matching for freshers & early professionals across India</p>
    <div class="hero-btns">
        <a href="?page=jobs" class="btn btn-primary">🔍 Browse Jobs</a>
        <?php if (!isset($_SESSION["loggedin"])): ?>
            <a href="?page=register" class="btn btn-secondary">✨ Get Started Free</a>
        <?php else: ?>
            <a href="?page=dashboard" class="btn btn-secondary">📊 My Dashboard</a>
        <?php endif; ?>
    </div>
</div>

<!-- STATS -->
<div class="stats-bar">
    <div class="stat-item">
        <div class="num">40+</div>
        <div class="lbl">Active Jobs</div>
    </div>
    <div class="stat-item">
        <div class="num">35+</div>
        <div class="lbl">Top Companies</div>
    </div>
    <div class="stat-item">
        <div class="num">15+</div>
        <div class="lbl">Categories</div>
    </div>
    <div class="stat-item">
        <div class="num">10+</div>
        <div class="lbl">Cities</div>
    </div>
</div>

<div class="container">

    <!-- CATEGORIES -->
    <div class="section-title">🗂️ Explore Categories</div>
    <p class="section-sub">Browse jobs by industry & domain</p>

    <div class="categories">
        <?php
        $cats = [
            ["IT & Software","💻","5"],
            ["Web Development","🌐","4"],
            ["Data & AI","📊","3"],
            ["Cloud & IT","☁️","2"],
            ["Cyber Security","🔒","1"],
            ["Banking & Finance","🏦","4"],
            ["BPO & Customer Support","📞","2"],
            ["Design & Creative","🎨","2"],
            ["Human Resources","👥","2"],
            ["Sales & Marketing","📢","2"],
            ["Healthcare","🏥","2"],
            ["Education","📚","2"],
            ["Accounting & Finance","💰","2"],
            ["Logistics & Supply Chain","🚚","2"],
            ["Government & Public Sector","🏛️","2"],
        ];
        foreach ($cats as $c): ?>
            <a href="?page=jobs&cat=<?= urlencode($c[0]) ?>" style="text-decoration:none;">
                <div class="cat-card">
                    <div class="cat-icon"><?= $c[1] ?></div>
                    <div class="cat-name"><?= $c[0] ?></div>
                    <div class="cat-count"><?= $c[2] ?> Jobs</div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- FEATURES -->
    <div class="section-title">⭐ Why CareerConnect?</div>
    <p class="section-sub">Everything you need to launch your career</p>

    <div class="features">
        <div class="feature-card">
            <div class="icon">🤖</div>
            <h3>Smart Job Matching</h3>
            <p>Our AI analyzes your skills, degree, and preferences to recommend the best matching jobs for you.</p>
        </div>
        <div class="feature-card">
            <div class="icon">⚡</div>
            <h3>One-Click Apply</h3>
            <p>Apply to multiple jobs instantly with your saved profile. No repeated form filling required.</p>
        </div>
        <div class="feature-card">
            <div class="icon">📊</div>
            <h3>Application Tracking</h3>
            <p>Track all your applications in one dashboard. Know exactly where you stand with each company.</p>
        </div>
        <div class="feature-card">
            <div class="icon">🏢</div>
            <h3>Top Companies</h3>
            <p>Curated jobs from India's top companies including Google, TCS, Infosys, HDFC Bank, and more.</p>
        </div>
        <div class="feature-card">
            <div class="icon">🎯</div>
            <h3>Fresher Friendly</h3>
            <p>Specially curated jobs for freshers and candidates with 0-2 years of experience.</p>
        </div>
        <div class="feature-card">
            <div class="icon">🔒</div>
            <h3>Secure & Private</h3>
            <p>Your data is safe with us. We never share your information with third parties without consent.</p>
        </div>
    </div>

    <!-- FEATURED JOBS PREVIEW -->
    <div class="section-title">🔥 Featured Jobs</div>
    <p class="section-sub">Hot opportunities available right now</p>

    <div class="jobs-grid">
        <?php foreach (array_slice($jobs, 0, 6) as $j): ?>
            <div class="job-card">
                <div class="job-card-header">
                    <div class="company-logo"><?= strtoupper(substr($j["company"],0,2)) ?></div>
                    <span class="job-badge">Open</span>
                </div>
                <div class="job-title"><?= htmlspecialchars($j["role"]) ?></div>
                <div class="job-company">🏢 <?= htmlspecialchars($j["company"]) ?></div>
                <div class="job-tags">
                    <span class="tag">📍 <?= htmlspecialchars($j["location"]) ?></span>
                    <span class="tag green">🎓 <?= htmlspecialchars($j["experience"]) ?></span>
                    <span class="tag purple">🏠 <?= htmlspecialchars($j["work"]) ?></span>
                </div>
                <div class="job-salary">💰 <?= htmlspecialchars($j["salary"]) ?></div>
                <div class="job-card-footer">
                    <a href="?page=jobs" class="btn-view">View Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div style="text-align:center;margin-top:30px;">
        <a href="?page=jobs" class="btn btn-primary" style="display:inline-block;">🔍 View All 40 Jobs →</a>
    </div>

</div>

<?php
/* =========================================================
   JOBS PAGE
   ========================================================= */
elseif ($page === "jobs"):

    $search   = isset($_GET["search"])   ? strtolower(trim($_GET["search"]))   : "";
    $catFilter= isset($_GET["cat"])      ? strtolower(trim($_GET["cat"]))      : "";
    $locFilter= isset($_GET["loc"])      ? strtolower(trim($_GET["loc"]))      : "";
    $workFilter=isset($_GET["work"])     ? strtolower(trim($_GET["work"]))     : "";

    $filtered = array_filter($jobs, function($j) use ($search,$catFilter,$locFilter,$workFilter) {
        $match = true;
        if ($search) {
            $hay = strtolower($j["role"].$j["company"].$j["skills"].$j["category"]);
            if (strpos($hay,$search) === false) $match = false;
        }
        if ($catFilter && strpos(strtolower($j["category"]),$catFilter)===false) $match=false;
        if ($locFilter && strpos(strtolower($j["location"]),$locFilter)===false) $match=false;
        if ($workFilter && strtolower($j["work"]) !== $workFilter)               $match=false;
        return $match;
    });

    $categories = array_unique(array_column($jobs,"category"));
    $locations  = array_unique(array_column($jobs,"location"));
    sort($categories);
    sort($locations);
?>

<div style="background:linear-gradient(135deg,#1e3a8a,#2563eb);color:white;padding:40px 5%;">
    <h1 style="font-size:2rem;font-weight:800;margin-bottom:8px;">💼 Browse All Jobs</h1>
    <p style="color:#bfdbfe;">Find the perfect opportunity from <?= count($jobs) ?> available positions</p>
</div>

<div class="container">

    <!-- SEARCH & FILTER -->
    <form method="GET" action="">
        <input type="hidden" name="page" value="jobs">
        <div class="search-bar">
            <input type="text" name="search" placeholder="🔍 Search role, company, skills..."
                   value="<?= htmlspecialchars($search) ?>">
            <select name="cat">
                <option value="">All Categories</option>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>"
                        <?= strtolower($c)===$catFilter ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="loc">
                <option value="">All Locations</option>
                <?php foreach ($locations as $l): ?>
                    <option value="<?= htmlspecialchars($l) ?>"
                        <?= strtolower($l)===$locFilter ? 'selected' : '' ?>>
                        <?= htmlspecialchars($l) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="work">
                <option value="">All Work Types</option>
                <option value="office"  <?= $workFilter==='office'  ? 'selected':'' ?>>Office</option>
                <option value="hybrid"  <?= $workFilter==='hybrid'  ? 'selected':'' ?>>Hybrid</option>
                <option value="remote"  <?= $workFilter==='remote'  ? 'selected':'' ?>>Remote</option>
            </select>
            <button type="submit">🔍 Search</button>
            <a href="?page=jobs" style="padding:12px 18px;background:#f3f4f6;color:#374151;border-radius:10px;font-weight:700;font-size:0.9rem;display:flex;align-items:center;">✕ Clear</a>
        </div>
    </form>

    <p style="color:#6b7280;margin-bottom:20px;font-size:0.9rem;">
        Showing <strong><?= count($filtered) ?></strong> of <?= count($jobs) ?> jobs
    </p>

    <?php if (count($filtered) === 0): ?>
        <div class="empty-state">
            <div class="icon">🔍</div>
            <h3>No Jobs Found</h3>
            <p>Try adjusting your search or filters</p>
        </div>
    <?php else: ?>
        <div class="jobs-grid">
            <?php foreach ($filtered as $j): ?>
                <div class="job-card">
                    <div class="job-card-header">
                        <div class="company-logo"><?= strtoupper(substr($j["company"],0,2)) ?></div>
                        <span class="job-badge">Open</span>
                    </div>
                    <div class="job-title"><?= htmlspecialchars($j["role"]) ?></div>
                    <div class="job-company">🏢 <?= htmlspecialchars($j["company"]) ?> &nbsp;|&nbsp; 📂 <?= htmlspecialchars($j["category"]) ?></div>
                    <div class="job-tags">
                        <span class="tag">📍 <?= htmlspecialchars($j["location"]) ?></span>
                        <span class="tag green">🎓 <?= htmlspecialchars($j["experience"]) ?></span>
                        <span class="tag purple">🏠 <?= htmlspecialchars($j["work"]) ?></span>
                        <span class="tag orange">⏰ <?= htmlspecialchars($j["timing"]) ?></span>
                    </div>
                    <div class="job-salary">💰 <?= htmlspecialchars($j["salary"]) ?></div>
                    <div class="job-card-footer">
                        <button class="btn-view" onclick="openModal(<?= $j['id'] ?>)">📋 View Details</button>
                        <?php if (isset($_SESSION["loggedin"])): ?>
                            <form method="POST" style="flex:1;">
                                <input type="hidden" name="apply_job" value="1">
                                <input type="hidden" name="company" value="<?= htmlspecialchars($j['company']) ?>">
                                <input type="hidden" name="role"    value="<?= htmlspecialchars($j['role']) ?>">
                                <input type="hidden" name="salary"  value="<?= htmlspecialchars($j['salary']) ?>">
                                <button type="submit" class="btn-apply" style="width:100%;">✅ Apply Now</button>
                            </form>
                        <?php else: ?>
                            <a href="?page=login" class="btn-apply" style="display:block;text-align:center;padding:9px;">🔑 Login to Apply</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- MODAL -->
                <div class="modal-overlay" id="modal-<?= $j['id'] ?>">
                    <div class="modal">
                        <button class="modal-close" onclick="closeModal(<?= $j['id'] ?>)">×</button>
                        <div style="display:flex;align-items:center;gap:15px;margin-bottom:15px;">
                            <div class="company-logo" style="width:60px;height:60px;font-size:1.3rem;">
                                <?= strtoupper(substr($j["company"],0,2)) ?>
                            </div>
                            <div>
                                <div class="modal-title"><?= htmlspecialchars($j["role"]) ?></div>
                                <div class="modal-company">🏢 <?= htmlspecialchars($j["company"]) ?> &nbsp;•&nbsp; 📂 <?= htmlspecialchars($j["category"]) ?></div>
                            </div>
                        </div>

                        <div class="modal-grid">
                            <div class="modal-item">
                                <div class="label">📍 Location</div>
                                <div class="value"><?= htmlspecialchars($j["location"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">💰 Salary</div>
                                <div class="value"><?= htmlspecialchars($j["salary"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">🎓 Experience</div>
                                <div class="value"><?= htmlspecialchars($j["experience"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">📚 Education</div>
                                <div class="value"><?= htmlspecialchars($j["education"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">⏰ Timing</div>
                                <div class="value"><?= htmlspecialchars($j["timing"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">🏠 Work Type</div>
                                <div class="value"><?= htmlspecialchars($j["work"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">🍽️ Lunch Break</div>
                                <div class="value"><?= htmlspecialchars($j["lunch"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">☕ Tea Break</div>
                                <div class="value"><?= htmlspecialchars($j["tea"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">📅 Working Days</div>
                                <div class="value"><?= htmlspecialchars($j["days"]) ?></div>
                            </div>
                            <div class="modal-item">
                                <div class="label">🎁 Benefits</div>
                                <div class="value"><?= htmlspecialchars($j["benefits"]) ?></div>
                            </div>
                        </div>

                        <div class="modal-item" style="margin-bottom:15px;">
                            <div class="label">🛠️ Required Skills</div>
                            <div class="value" style="margin-top:8px;">
                                <?php foreach (explode(",",$j["skills"]) as $sk): ?>
                                    <span class="tag" style="display:inline-block;margin:3px;">
                                        <?= htmlspecialchars(trim($sk)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <?php if (isset($_SESSION["loggedin"])): ?>
                            <form method="POST">
                                <input type="hidden" name="apply_job" value="1">
                                <input type="hidden" name="company" value="<?= htmlspecialchars($j['company']) ?>">
                                <input type="hidden" name="role"    value="<?= htmlspecialchars($j['role']) ?>">
                                <input type="hidden" name="salary"  value="<?= htmlspecialchars($j['salary']) ?>">
                                <button type="submit" class="modal-apply-btn">✅ Apply for This Job</button>
                            </form>
                        <?php else: ?>
                            <a href="?page=login" class="modal-apply-btn" style="display:block;text-align:center;">🔑 Login to Apply</a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
function openModal(id) {
    document.getElementById('modal-' + id).classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeModal(id) {
    document.getElementById('modal-' + id).classList.remove('active');
    document.body.style.overflow = '';
}
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal-overlay')) {
        e.target.classList.remove('active');
        document.body.style.overflow = '';
    }
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal-overlay.active').forEach(function(m) {
            m.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
});
</script>

<?php
/* =========================================================
   REGISTER PAGE
   ========================================================= */
elseif ($page === "register"):
?>
<div class="form-page">
    <div class="form-card">
        <div class="form-title">✨ Create Account</div>
        <p class="form-sub">Join CareerConnect and find your dream job today</p>

        <?php if (isset($_SESSION["reg_error"])): ?>
            <div class="alert alert-error"><?= $_SESSION["reg_error"] ?></div>
            <?php unset($_SESSION["reg_error"]); ?>
        <?php endif; ?>

        <form method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label>👤 Full Name *</label>
                    <input type="text" name="name" placeholder="Your full name" required>
                </div>
                <div class="form-group">
                    <label>📧 Email *</label>
                    <input type="email" name="email" placeholder="your@email.com" required>
                </div>
            </div>

            <div class="form-group">
                <label>🔒 Password *</label>
                <input type="password" name="password" placeholder="Create a password" required>
            </div>

            <div class="form-group">
                <label>🎓 Highest Degree</label>
                <select name="degree">
                    <option value="">Select Degree</option>
                    <option>10th Pass</option>
                    <option>12th Pass</option>
                    <option>ITI / Diploma</option>
                    <option>BCA</option>
                    <option>BSc</option>
                    <option>BCom</option>
                    <option>BBA</option>
                    <option>BE / BTech</option>
                    <option>Any Degree</option>
                    <option>MCA</option>
                    <option>MBA</option>
                    <option>MSc</option>
                    <option>CA Inter</option>
                    <option>CA Final</option>
                </select>
            </div>

            <div class="form-group">
                <label>🛠️ Your Skills</label>
                <input type="text" name="skills" placeholder="e.g. PHP, HTML, Excel, Communication">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>💼 Preferred Role</label>
                    <select name="role">
                        <option value="">Select Role</option>
                        <option>Software Engineer</option>
                        <option>Web Developer</option>
                        <option>Data Analyst</option>
                        <option>UI/UX Designer</option>
                        <option>HR Executive</option>
                        <option>Sales Executive</option>
                        <option>Banking Executive</option>
                        <option>Customer Support</option>
                        <option>Content Writer</option>
                        <option>Any Role</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>📍 Preferred Location</label>
                    <input type="text" name="location" placeholder="e.g. Bengaluru">
                </div>
            </div>

            <div class="form-group">
                <label>💰 Expected Salary (LPA)</label>
                <input type="text" name="salary" placeholder="e.g. ₹3 - ₹6 LPA">
            </div>

            <button type="submit" name="register" class="btn-form">✨ Create My Account</button>
        </form>

        <div class="form-link">
            Already have an account? <a href="?page=login">Login here →</a>
        </div>
    </div>
</div>

<?php
/* =========================================================
   LOGIN PAGE
   ========================================================= */
elseif ($page === "login"):
?>
<div class="form-page">
    <div class="form-card">
        <div class="form-title">🔑 Welcome Back</div>
        <p class="form-sub">Login to your CareerConnect account</p>

        <?php if (isset($_SESSION["message"])): ?>
            <div class="alert alert-success"><?= $_SESSION["message"] ?></div>
            <?php unset($_SESSION["message"]); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION["login_error"])): ?>
            <div class="alert alert-error"><?= $_SESSION["login_error"] ?></div>
            <?php unset($_SESSION["login_error"]); ?>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>📧 Email Address</label>
                <input type="email" name="email" placeholder="your@email.com" required>
            </div>
            <div class="form-group">
                <label>🔒 Password</label>
                <input type="password" name="password" placeholder="Your password" required>
            </div>
            <button type="submit" name="login" class="btn-form">🔑 Login to My Account</button>
        </form>

        <div class="form-link">
            Don't have an account? <a href="?page=register">Register here →</a>
        </div>
    </div>
</div>

<?php
/* =========================================================
   DASHBOARD PAGE
   ========================================================= */
elseif ($page === "dashboard"):
    $student = $_SESSION["student"];
    $appCount = isset($_SESSION["applications"]) ? count($_SESSION["applications"]) : 0;

    /* Smart Matching */
    $userSkills = array_map('trim', explode(",", strtolower($student["skills"] ?? "")));
    $userDegree = strtolower($student["degree"] ?? "");
    $userLocation = strtolower($student["location"] ?? "");

    $matchedJobs = [];
    foreach ($jobs as $j) {
        $score = 0;
        $jobSkills = array_map('trim', explode(",", strtolower($j["skills"])));
        foreach ($userSkills as $us) {
            foreach ($jobSkills as $js) {
                if ($us && strpos($js, $us) !== false) { $score += 30; break; }
            }
        }
        if ($userDegree && strpos(strtolower($j["education"]), $userDegree) !== false) $score += 25;
        if ($userLocation && strpos(strtolower($j["location"]), $userLocation) !== false) $score += 20;
        if ($score > 0) $matchedJobs[] = ["job" => $j, "score" => min($score, 95)];
    }
    usort($matchedJobs, fn($a,$b) => $b["score"] - $a["score"]);
    $topMatches = array_slice($matchedJobs, 0, 6);
?>

<div class="dashboard-hero">
    <h1>👋 Welcome back, <?= htmlspecialchars(explode(" ", $student["name"])[0]) ?>!</h1>
    <p>Here's your career overview and personalized job recommendations</p>
</div>

<div class="container">

    <!-- PROFILE CARD -->
    <div class="profile-card">
        <div class="profile-avatar"><?= strtoupper(substr($student["name"],0,1)) ?></div>
        <div class="profile-info">
            <h2><?= htmlspecialchars($student["name"]) ?></h2>
            <p>📧 <?= htmlspecialchars($student["email"]) ?></p>
            <div class="profile-tags">
                <?php if ($student["degree"]): ?>
                    <span class="tag">🎓 <?= htmlspecialchars($student["degree"]) ?></span>
                <?php endif; ?>
                <?php if ($student["role"]): ?>
                    <span class="tag purple">💼 <?= htmlspecialchars($student["role"]) ?></span>
                <?php endif; ?>
                <?php if ($student["location"]): ?>
                    <span class="tag green">📍 <?= htmlspecialchars($student["location"]) ?></span>
                <?php endif; ?>
                <?php if ($student["salary"]): ?>
                    <span class="tag orange">💰 <?= htmlspecialchars($student["salary"]) ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="dash-cards">
        <div class="dash-card">
            <div class="icon">💼</div>
            <div class="num">40</div>
            <div class="lbl">Available Jobs</div>
        </div>
        <div class="dash-card">
            <div class="icon">📋</div>
            <div class="num"><?= $appCount ?></div>
            <div class="lbl">Applications Sent</div>
        </div>
        <div class="dash-card">
            <div class="icon">🎯</div>
            <div class="num"><?= count($topMatches) ?></div>
            <div class="lbl">Job Matches</div>
        </div>
        <div class="dash-card">
            <div class="icon">⭐</div>
            <div class="num"><?= $topMatches ? $topMatches[0]["score"] : 0 ?>%</div>
            <div class="lbl">Top Match Score</div>
        </div>
    </div>

    <!-- SMART MATCHES -->
    <div class="match-card">
        <h2>🤖 Smart Job Matches</h2>
        <p>Jobs matched based on your skills, degree, and location preference</p>

        <?php if (count($topMatches) === 0): ?>
            <div class="empty-state">
                <div class="icon">🔍</div>
                <h3>No Matches Yet</h3>
                <p>Update your profile with skills and preferences to get personalized matches</p>
            </div>
        <?php else: ?>
            <div class="match-jobs">
                <?php foreach ($topMatches as $m): $j = $m["job"]; ?>
                    <div class="match-job-card">
                        <h3><?= htmlspecialchars($j["role"]) ?></h3>
                        <p>🏢 <?= htmlspecialchars($j["company"]) ?> &nbsp;|&nbsp; 📍 <?= htmlspecialchars($j["location"]) ?></p>
                        <p style="color:#2563eb;font-weight:700;">💰 <?= htmlspecialchars($j["salary"]) ?></p>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:10px;flex-wrap:wrap;gap:8px;">
                            <span class="match-pct">✅ <?= $m["score"] ?>% Match</span>
                            <a href="?page=jobs" style="font-size:0.8rem;color:#2563eb;font-weight:700;">View Job →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- RECENT APPLICATIONS -->
    <?php if ($appCount > 0): ?>
        <div class="applications-section">
            <h2>📋 Recent Applications</h2>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Role</th>
                            <th>Salary</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice(array_reverse($_SESSION["applications"]),0,5) as $i=>$app): ?>
                            <tr>
                                <td><?= $i+1 ?></td>
                                <td><strong><?= htmlspecialchars($app["company"]) ?></strong></td>
                                <td><?= htmlspecialchars($app["role"]) ?></td>
                                <td><?= htmlspecialchars($app["salary"]) ?></td>
                                <td><?= htmlspecialchars($app["date"]) ?></td>
                                <td><span class="status-badge"><?= htmlspecialchars($app["status"]) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($appCount > 5): ?>
                <div style="text-align:center;margin-top:15px;">
                    <a href="?page=applications" style="color:#2563eb;font-weight:700;font-size:0.9rem;">View All <?= $appCount ?> Applications →</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div style="text-align:center;margin-top:10px;">
        <a href="?page=jobs" class="btn btn-primary" style="display:inline-block;">🔍 Browse All Jobs</a>
    </div>

</div>

<?php
/* =========================================================
   APPLICATIONS PAGE
   ========================================================= */
elseif ($page === "applications"):
    $apps = isset($_SESSION["applications"]) ? $_SESSION["applications"] : [];
?>

<div style="background:linear-gradient(135deg,#1e3a8a,#2563eb);color:white;padding:40px 5%;">
    <h1 style="font-size:2rem;font-weight:800;margin-bottom:8px;">📋 My Applications</h1>
    <p style="color:#bfdbfe;">Track all your job applications in one place</p>
</div>

<div class="container">

    <?php if (isset($_SESSION["application_message"])): ?>
        <div class="alert alert-<?= $_SESSION["msg_type"] === "success" ? "success" : "info" ?>">
            <?= $_SESSION["application_message"] ?>
        </div>
        <?php unset($_SESSION["application_message"],$_SESSION["msg_type"]); ?>
    <?php endif; ?>

    <!-- SUMMARY CARDS -->
    <div class="dash-cards" style="margin-bottom:25px;">
        <div class="dash-card">
            <div class="icon">📋</div>
            <div class="num"><?= count($apps) ?></div>
            <div class="lbl">Total Applications</div>
        </div>
        <div class="dash-card">
            <div class="icon">✅</div>
            <div class="num"><?= count(array_filter($apps, fn($a) => $a["status"]==="Applied")) ?></div>
            <div class="lbl">Applied</div>
        </div>
        <div class="dash-card">
            <div class="icon">🏢</div>
            <div class="num"><?= count(array_unique(array_column($apps,"company"))) ?></div>
            <div class="lbl">Companies</div>
        </div>
    </div>

    <?php if (count($apps) === 0): ?>
        <div class="empty-state">
            <div class="icon">📭</div>
            <h3>No Applications Yet</h3>
            <p>Start applying to jobs and track your applications here</p>
            <br>
            <a href="?page=jobs" class="btn btn-primary" style="display:inline-block;margin-top:15px;">💼 Browse Jobs</a>
        </div>
    <?php else: ?>
        <div class="applications-section">
            <h2>📋 All Applications (<?= count($apps) ?>)</h2>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Role</th>
                            <th>Salary</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($apps) as $i => $app): ?>
                            <tr>
                                <td><?= $i+1 ?></td>
                                <td><strong><?= htmlspecialchars($app["company"]) ?></strong></td>
                                <td><?= htmlspecialchars($app["role"]) ?></td>
                                <td><?= htmlspecialchars($app["salary"]) ?></td>
                                <td><?= htmlspecialchars($app["date"]) ?></td>
                                <td><span class="status-badge"><?= htmlspecialchars($app["status"]) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="text-align:center;margin-top:20px;">
            <a href="?page=jobs" class="btn btn-primary" style="display:inline-block;">➕ Apply to More Jobs</a>
        </div>
    <?php endif; ?>
</div>

<?php endif; ?>

<!-- ================================================
     FOOTER
     ================================================ -->
<footer>
    <p>© 2025 <span>CareerConnect</span> — Smart Career & Job Finder | Built for Freshers & Early Professionals</p>
    <p style="margin-top:8px;font-size:0.8rem;">🇮🇳 Made in India | Helping students find their dream careers</p>
</footer>

</body>
</html>