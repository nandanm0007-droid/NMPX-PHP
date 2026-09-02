# NMPX — Next Move Platform eXperience

> **Learn. Connect. Grow. Succeed.**

NMPX is an all-in-one career and startup ecosystem built in pure **PHP** (no database server required — all data is stored in JSON flat files). It brings together three modules under a single login portal:

1. 🤖 **AI Career Mentor** — personalized career roadmaps for students
2. 💼 **CareerConnect** — job search, matching and application tracking
3. 🚀 **Startup Investors (InvestConnect)** — a startup ↔ investor networking platform

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Requirements](#-requirements)
- [Installation](#-installation)
- [Default Credentials](#-default-credentials)
- [Project Structure](#-project-structure)
- [How It Works](#-how-it-works)
- [Security Notes](#-security-notes)
- [Known Limitations](#-known-limitations)

---

## 🌐 Overview

NMPX (*Next Move Platform eXperience*) is a self-contained PHP web application. A visitor registers on the main portal (as a **Student**, **Job Seeker**, **Entrepreneur** or **Investor**), logs in, and lands on a dashboard that links to the three modules:

| Module | Entry Point | Purpose |
|---|---|---|
| AI Career Mentor | `modules/ai-career/career-mentor.php` | Generates a personalized career guidance report |
| CareerConnect | `modules/career-connect/currier.php` | Browse, filter and apply to curated job listings |
| Startup Investors | `modules/startup-investors/index.php` | Startups pitch ideas; investors discover and fund them |

Each module is independent and has its own session handling, so they can also be used standalone.

---

## ✨ Features

### 🔐 Main Portal

- **User registration** with role selection (Student / Job Seeker / Entrepreneur / Investor)
- **Login / logout** with PHP sessions
- **Password hashing** using `password_hash()` (bcrypt)
- **Dashboard** with module cards and feature highlights
- Data persisted to `data/users.json` (JSON flat file)
- Modern glassmorphism / gradient UI, responsive layout

### 🤖 AI Career Mentor

A single-page, form-driven career counselor. The student fills in their profile:

- Name, age, degree, semester, college, CGPA
- Skills, interests, favorite subjects
- Career goal, preferred location
- Monthly learning budget, hours available per week, preferred languages

The module then generates a **personalized multi-section career report** (stepped report cards), including:

- 📊 **Career analysis** — tailored to the degree stream (Tech/IT, Business/Commerce, Arts/Humanities)
- 💼 **Career path options** — private jobs, government jobs, freelancing, entrepreneurship, with realistic salary ranges (₹)
- 🎓 **Higher studies guidance** — India (MCA/M.Tech/MBA via GATE, NIMCET, CAT…) and abroad (MS/MBA), with entrance exam info
- 🛠️ **Skill recommendations** — grouped skill pills (programming, web, databases, cloud/DevOps, data, marketing, finance, soft skills…)
- 📚 **Course & certification directory** — curated free/paid platforms (CS50, NPTEL, SWAYAM, freeCodeCamp, Google Digital Garage, Microsoft Learn, Coursera, edX, Udemy…) with budget-aware suggestions
- ▶️ **YouTube channel recommendations** for self-learning
- 🗺️ **Learning roadmap** with practical project ideas and deployment suggestions


### 💼 CareerConnect

A job discovery and application module (single-file PHP app, `?page=` routing):

- **40 curated job listings** across categories:
  - IT & Software (Infosys, TCS, Wipro, Accenture, HCLTech…)
  - Web Development (Zoho, Freshworks, Mphasis, Tech Mahindra…)
  - Data & AI (IBM, Microsoft…)
  - Logistics & Supply Chain, Government & Public Sector (LIC, India Post), Accounting & Finance (KPMG, EY)
- Each listing includes company, role, category, location, salary (LPA), experience, education, skills, work timing, work mode (Office/Hybrid), working days and benefits
- **Registration & login** (session-based student profile with degree, skills, location, expected salary)
- **Job application** with duplicate-application protection
- **Application tracking** — a personal dashboard of applied jobs with dates and status
- **Smart matching** — highlights jobs relevant to the user's profile

### 🚀 Startup Investors (InvestConnect)

A complete startup ↔ investor networking platform:

- **Three user roles**
  - 🚀 **Startup** — submit business proposals (company, industry, location, problem statement, solution, market potential, funding amount, pitch deck file, video link), track interest received, send approach requests
  - 💰 **Investor** — set investor type (Govt scheme / Private / Angel / VC), organization, investment range and preferred sectors; browse startups, get sector-matched recommendations, mark interest, accept/reject approach requests
  - 🛡️ **Admin** — platform analytics dashboard, manage users (block/unblock), manage startups (approve/pending), manage investors
- **Public pages** — browse startups and investors with sector/budget filters, startup & investor detail pages, live platform stats (startups listed, active investors, requests, funded)
- **Pitch deck uploads** — PDF/PPT/PPTX only, max 10 MB, randomized file names, `.htaccess` blocks script execution in the upload folder
- **Full admin panel** (`modules/startup-investors/admin/`) — analytics, recent sign-ups, moderation
- **Custom JSON "database" layer** (`config/db.php`) — file locking (`flock`), auto-increment ID counters, CRUD helpers (`db_read`, `db_insert`, `db_update`, `db_delete`, `db_where`, `db_count`, `db_sort`…) and auto-seeding of a super-admin account

---

## 🧰 Tech Stack

- **PHP 7.4+** (works with PHP 8.x) — no framework, no Composer dependencies
- **HTML5 / CSS3 / vanilla JavaScript** — all styling is inline or in module CSS files
- **JSON flat files** as the data store (no MySQL needed)
- **PHP sessions** for authentication
- Google Fonts (Inter) for the Career Mentor UI

---

## ✅ Requirements

- PHP **7.4 or newer** (built-in functions used: `password_hash`, `flock`, `move_uploaded_file`, etc.)
- Any web server: **Apache (XAMPP/WAMP/Laragon)**, Nginx, or PHP's built-in server
- Write permission for the `data/` folders (JSON storage)
- `.htaccess` support (Apache) for upload-folder hardening — optional


---

## 🚀 Installation

### Option 1 — XAMPP (recommended)

1. Copy the project folder into your web root:
   ```
   C:\xampp\htdocs\NMPX
   ```
2. Start **Apache** from the XAMPP control panel.
3. Open your browser:
   ```
   http://localhost/NMPX/
   ```
4. Click **Create Account** to register, then log in and explore the modules.

### Option 2 — PHP built-in server

```bash
cd NMPX
php -S localhost:8000
```

Then open `http://localhost:8000/`.

> On first run, the InvestConnect module (`config/db.php`) auto-creates its JSON tables in `modules/startup-investors/data/` and seeds a default admin account.

---

## 🔑 Default Credentials

| Platform | Email | Password |
|---|---|---|
| InvestConnect admin (`modules/startup-investors/admin/`) | `admin@platform.com` | `Admin@123` |

> ⚠️ **Change the default admin password immediately in production.** The main NMPX portal has no default account — register your own via `register.php`.

---

## 📁 Project Structure

```
NMPX/
├── index.php                      # Login page (main portal)
├── register.php                   # Account registration (role selection)
├── dashboard.php                  # Post-login dashboard with module cards
├── logout.php                     # Session logout
├── nmpx_auth.php                  # Shared auth helpers (login, require_login, user)
├── data/
│   └── users.json                 # Main portal user store (bcrypt hashes)
│
├── modules/
│   ├── ai-career/
│   │   └── career-mentor.php      # AI Career Mentor (form + generated report)
│   │
│   ├── career-connect/
│   │   └── currier.php            # CareerConnect (40 jobs, auth, apply, track)
│   │
│   └── startup-investors/         # InvestConnect module
│       ├── index.php              # Landing page + platform stats
│       ├── login.php / register.php / logout.php
│       ├── dashboard.php          # Role-aware dashboards
│       ├── submit-idea.php        # Startup proposal + pitch deck upload
│       ├── delete-startup.php     # Remove own proposal
│       ├── browse-startups.php / browse-investors.php
│       ├── startup-detail.php / investor-detail.php
│       ├── mark-interest.php / update-interest.php
│       ├── approach-request.php / respond-approach.php
│       ├── config/
│       │   ├── db.php             # JSON DB layer (locking, CRUD, seeding)
│       │   └── functions.php      # CSRF, sessions, flash, helpers
│       ├── includes/              # Public header/footer
│       ├── admin/                 # Admin panel (analytics & moderation)
│       ├── assets/
│       │   ├── css/style.css
│       │   └── js/main.js         # Confirm dialogs, auto-filters, file labels
│       ├── data/                  # JSON tables: users, startups, investors,
│       │                          # approach_requests, interests, counters
│       └── upload/pitch_decks/
│           └── .htaccess          # Blocks script execution in uploads
```

---

## ⚙️ How It Works

- **Main portal auth** — `nmpx_auth.php` manages `$_SESSION['nmpx_logged_in']`; passwords are bcrypt-hashed in `data/users.json`.
- **InvestConnect auth** — separate session keys (`user_id`, `role`, `profile_id`) with role-based redirects; every state-changing form is protected by a **CSRF token** (`generate_csrf_token()` / `verify_csrf_token()`).
- **JSON database** — each "table" is a JSON file read/written under shared/exclusive file locks; auto-increment IDs live in `counters.json`.
- **Pitch uploads** — validated by extension (`.pdf/.ppt/.pptx`) and size (≤ 10 MB), renamed to `pitch_<uniqid>.<ext>`.

---

## 🔒 Security Notes

Implemented protections:

- ✅ Bcrypt password hashing (`password_hash` / `password_verify`)
- ✅ CSRF tokens on all InvestConnect forms
- ✅ Output escaping via `htmlspecialchars()` / `sanitize()`
- ✅ Upload extension & size validation + `.htaccess` script-blocking in the upload dir
- ✅ Session-based access control with role checks (`require_login`, `require_role`)
- ✅ File locking on all JSON reads/writes

---

## ⚠️ Known Limitations

- **JSON flat files** — fine for demos/small deployments, but not suited to high concurrency or large datasets. Migrating to MySQL is the natural next step.
- **CareerConnect accounts** are session-only (registered users are not persisted between server restarts), and its demo stores passwords in plaintext in the session.
- **Upload path mismatch** — `submit-idea.php` writes pitch decks to `modules/startup-investors/uploads/pitch_decks/`, while the prepared (`.htaccess`-protected) folder is `modules/startup-investors/upload/pitch_decks/`. Align these paths before using uploads in production.
- **`test-write.php`** is a development/test script in the InvestConnect module and should be removed from production.
- Career Mentor "AI" logic is **rule-based** (degree stream → curated content), not a real AI/ML model.
- `display_errors` is enabled in `config/db.php` — turn it off in production.

---

## 📄 License

This project is provided for educational purposes. Feel free to use and modify it for your own learning or portfolio projects.
