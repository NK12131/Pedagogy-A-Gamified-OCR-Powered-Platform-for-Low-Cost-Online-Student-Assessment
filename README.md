# 🎓 Pedagogy: A Gamified, OCR-Powered Platform for Online Student Assessment

> Scan it, quiz it, score it. A low-cost, all-in-one web platform that helps teachers build tests faster and assess students automatically.

![PHP](https://img.shields.io/badge/PHP-7%2B-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![Python](https://img.shields.io/badge/Python-Flask%20OCR-3776AB?logo=python&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-UI-7952B3?logo=bootstrap&logoColor=white)

---

## 📖 Overview

When COVID-19 moved classrooms online, paper tests stopped being practical. Existing game-based learning tools either lacked key features or cost too much. **Pedagogy** brings everything a school needs for assessment into one simple application:

- Teachers create tests **without typing questions**: they snap or upload a photo and OCR turns it into text.
- Students take **timed assessments and practice quizzes** from their own dashboard.
- Results are **scored automatically**, which cuts teacher workload.
- Four roles (**Super Admin, Admin, Teacher, Student**) keep access organized and secure.

---

## ✨ Features

| Area | What it does |
|---|---|
| 📷 **OCR question capture** | Upload an image (JPG/PNG) or capture one from a webcam. The text is extracted through the [OCR.space](https://ocr.space/) API and can be used as a question. |
| 📝 **Exam management** | Create, edit, activate or deactivate exams, subjects, categories and departments. |
| ❓ **Question bank** | Add, edit, view and delete questions for each exam. |
| 🧑‍🎓 **Student portal** | Take assessments, try practice quizzes, view results and manage a profile. |
| 📊 **Automated results** | Scores are recorded automatically and shown in result and summary pages. |
| 📢 **Notice board** | Admins and teachers post announcements for students. |
| 🔐 **OTP & email flows** | One-time-password verification and password recovery over email (PHPMailer + SMTP). |
| 👥 **Role-based access** | Separate dashboards for Super Admin, Admin, Teacher and Student. |

---

## 🏗️ Architecture

```
┌────────────────────────────┐        ┌──────────────────────────┐
│  PHP Web App (Apache)      │        │  OCR Service (Flask)     │
│  ─ superadmin/             │  OCR   │  OCR/app.py  :5000       │
│  ─ admin/                  │ ─────▶ │  upload image ─▶         │
│  ─ teacher/                │ button │  OCR.space API ─▶ text   │
│  ─ student/                │        └──────────────────────────┘
└─────────────┬──────────────┘
              │ mysqli
      ┌───────▼────────┐
      │ MySQL: oes_db  │
      └────────────────┘
```

---

## 🛠️ Tech Stack

- **Backend:** PHP (mysqli), MySQL / MariaDB
- **Frontend:** HTML, CSS, Bootstrap, jQuery, Chart.js, DataTables
- **OCR service:** Python, Flask, OpenCV, OCR.space API
- **Email / OTP:** PHPMailer over SMTP

---

## 📂 Project Structure

```
├── index.php              # Account-type landing page
├── login.php              # Login
├── signup-*.php           # Role-based signup (admin / teacher / student)
├── forgot_pw.php          # Password recovery
├── send_otp.php / check_otp.php   # OTP verification
├── superadmin/            # Manage admins, teachers, students, exams
├── admin/                 # Departments, subjects, exams, questions, results
├── teacher/               # Exams, questions (with OCR button), results
├── student/               # Assessments, practice quizzes, results, profile
├── OCR/
│   ├── app.py             # Flask web OCR (image upload)
│   ├── main.py            # Webcam capture → OCR → text file
│   └── templates/upload.html
├── DB/oes_db.sql          # Database schema + seed data
├── database/config.php    # DB connection settings
├── smtp/, mail/           # PHPMailer libraries
└── FINAL REPORT (2).pdf   # Full project report
```

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) or WAMP/LAMP (Apache + PHP + MySQL)
- Python 3.8+ (for the OCR service)

### 1. Clone the repo
```bash
git clone https://github.com/parthjain99/Pedagogy-System-for-Assessing-Students-Performance.git
```
Move the folder into your web root (for example `C:\xampp\htdocs\pedagogy`).

### 2. Set up the database
1. Start **Apache** and **MySQL** from the XAMPP control panel.
2. Open `http://localhost/phpmyadmin` and create a database named **`oes_db`**.
3. Import **`DB/oes_db.sql`**.
4. If your credentials differ, update `database/config.php`:
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "oes_db";
   ```

### 3. Configure email (OTP and password reset)
Edit `send_otp.php` (and `smtp/mailer.php`) with your own SMTP account. For Gmail, use an [App Password](https://support.google.com/accounts/answer/185833).

### 4. Run the OCR service
```bash
cd OCR
pip install flask requests opencv-python
python app.py          # runs at http://127.0.0.1:5000
```
Get a free API key at [ocr.space](https://ocr.space/ocrapi) and replace the demo key `"helloworld"` in `app.py`.

For webcam capture instead, run `python main.py`, press **S** to capture or **Q** to quit. The text is saved to `text_detected.txt`.

### 5. Launch the app
Open **`http://localhost/pedagogy/`**, pick an account type, sign up and log in.

---

## 🔄 How It Works

1. **Admin** sets up departments, subjects and categories.
2. **Teacher** creates an exam and adds questions by typing them or clicking **OCR** to scan them from an image.
3. **Student** logs in, takes the assessment or a practice quiz.
4. The system **scores the attempt automatically** and saves it in `tbl_assessment_records`.
5. Teachers and admins review **results and summaries** for each student.

---

## 🗄️ Database Tables

`tbl_users` · `tbl_departments` · `tbl_subjects` · `tbl_categories` · `tbl_examinations` · `tbl_questions` · `tbl_assessment_records` · `tbl_notice` · `tbl_alerts`

---

## ⚠️ Security Notes

This is an academic project. Before any real deployment:
- **Remove the hard-coded SMTP credentials** in `send_otp.php` and `smtp/mailer.php`, and rotate them. Load secrets from environment variables instead.
- Replace the demo OCR.space key.
- Use prepared statements throughout to prevent SQL injection.
- Set a MySQL password; don't run as `root` with an empty one.

---

## 🗺️ Roadmap

- [ ] 🎙️ Speech-to-text question entry (Web Speech API)
- [ ] 🏆 Leaderboards, points and badges for full gamification
- [ ] 📈 Per-student performance analytics dashboard
- [ ] Self-hosted OCR (Tesseract) to remove the external API dependency
- [ ] Docker setup for one-command install

---

## 📄 Documentation

The full design, methodology and results are in **[`FINAL REPORT (2).pdf`](./FINAL%20REPORT%20(2).pdf)**.

---

## 👤 Author

**Nithin Kumar** 

⭐ If you find this project useful, give it a star!