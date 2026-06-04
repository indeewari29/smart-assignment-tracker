# Smart Assignment & Deadline Tracking System with AI Reminders

## Introduction

A web-based application that helps students track assignments, break down tasks into subtasks, monitor stress levels, and receive AI-powered gentle suggestions.

## Features

- User Authentication - Login, Signup, Logout (Student/Admin roles)
- Assignment Management – Add, Edit, Delete assignments with color-coded priority (High/Medium/Low)
- Subtask Breakdown – Break assignments into smaller tasks with progress bar
- Mood Tracker – 3 questions about body, energy, and mind to calculate stress level
- AI Suggestions – Prolog rule-based expert system (12 IF-THEN rules) providing personalized gentle suggestions
- Browser Notifications – Pop-up reminders for deadlines within 3 days
- Admin Panel – View all users and assignments, delete users
- Crisis Support – Links to NHS mental wellbeing resources and local crisis helpline

## Tech Stack

- Frontend - HTML, CSS, JavaScript
- Backend - PHP
- Database - MySQL
- AI Engine - Prolog (SWI-Prolog)

## Visuals of Interfaces

User Authentication
<img width="1907" height="1011" alt="Screenshot 2026-05-21 191122" src="https://github.com/user-attachments/assets/5478b887-75e6-4ca1-994f-1597bb81a47a" />
<img width="1912" height="1017" alt="Screenshot 2026-05-21 192001" src="https://github.com/user-attachments/assets/e4fba9a3-26dc-4630-8e18-54be8e055c64" />

Dashboard
<img width="1917" height="1017" alt="Screenshot 2026-05-21 192246" src="https://github.com/user-attachments/assets/b60e9d7d-7db1-4752-91eb-daa22f90c0ca" />

Assignment Management
<img width="1910" height="1020" alt="Screenshot 2026-05-21 193052" src="https://github.com/user-attachments/assets/38dedd73-be1f-4bd5-93ad-11cd57fc384a" />
<img width="1913" height="1017" alt="Screenshot 2026-05-21 193103" src="https://github.com/user-attachments/assets/504f39af-5bdc-4f8f-a8d6-0cff8293f5bf" />
<img width="1918" height="1013" alt="Screenshot 2026-05-21 193208" src="https://github.com/user-attachments/assets/009973c0-dcd5-4b69-9b43-7587fc1c4d7a" />
<img width="1916" height="1018" alt="Screenshot 2026-05-21 193230" src="https://github.com/user-attachments/assets/1260db70-4009-40c8-8b13-ce393269c7fc" />
<img width="1918" height="1020" alt="Screenshot 2026-05-21 193243" src="https://github.com/user-attachments/assets/d8a7844b-ecce-4d2c-b5c0-4fe8756c40e1" />
<img width="1917" height="1016" alt="Screenshot 2026-05-21 193251" src="https://github.com/user-attachments/assets/87970ada-4141-40bd-bff8-5eaa78675677" />
  
Subtask Breakdown
<img width="1915" height="1017" alt="Screenshot 2026-05-21 194941" src="https://github.com/user-attachments/assets/564fe4b7-5a20-459b-9043-9417ac0df84d" />
  
Mood Tracker
<img width="1915" height="1021" alt="Screenshot 2026-05-21 193312" src="https://github.com/user-attachments/assets/3599ab87-908c-49d3-ba53-61a9008ae63b" />
<img width="1917" height="1010" alt="Screenshot 2026-05-21 193334" src="https://github.com/user-attachments/assets/fcbbb0e8-e10e-4e2c-a353-b6df6677d11e" />

AI suggestions & Crisis Support
<img width="1912" height="1012" alt="Screenshot 2026-05-21 193357" src="https://github.com/user-attachments/assets/bd3b06f8-888b-40c0-9e74-9fb79ebb4e32" />
<img width="1918" height="1013" alt="Screenshot 2026-05-21 193411" src="https://github.com/user-attachments/assets/2198e2b5-154d-415d-8746-a8585b8334c6" />

Browser Notifications
<img width="606" height="790" alt="Screenshot 2026-05-21 193446" src="https://github.com/user-attachments/assets/0d07d1dd-50d7-4fc3-b0f4-3df609e6a734" />

Admin Panel
<img width="1913" height="1012" alt="Screenshot 2026-05-21 193617" src="https://github.com/user-attachments/assets/7ce55ab6-9d55-4147-bfc2-a77847751bea" />
<img width="1917" height="1012" alt="Screenshot 2026-05-21 193603" src="https://github.com/user-attachments/assets/eb24b912-e2bd-4e80-a766-7bdc0141ed72" />

## Installation

### Prerequisites

- XAMPP (or Laragon) with PHP and MySQL
- SWI-Prolog installed

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/indeewari29/smart-assignment-tracker.git
   
2. **Move to Xampp Htdocs**
   Move the folder to: C:\xampp\htdocs\smart-assignment-tracker

3. **Import database**
   Open phpMyAdmin
   Create database: smart_assignment_tracker
   Import smart_assignment_tracker.sql

4. **Install SWI-Prolog**
   Download from: https://www.swi-prolog.org/download/stable
   Install with default settings

5. **Run the application**
   Start Apache and MySQL in XAMPP
   Open browser: http://localhost/smart-assignment-tracker/login.php

## Test Accounts (Role,	Email, Password)

- Student,	dilmini@student.edu,	pass_dilmini123
- Admin,	kamal@admin.edu, admin_pass123

## Team

- H. A. T. Dilmini – DCSAI-252-F-013
- P. Leinojhan – DCSAI-252-F-017
- W. P. M. H. I. Wijesooriya – DCSAI-252-F-028
- P. A. S. S. Wijerathna – DCSAI-252F-030
- Supervisor: Mrs. A. M. S. K. Wijewardhana

## License

This project is for academic purposes as part of the Diploma in Computer Science with Artificial Intelligence at NIBM City University.

## Acknowledgements

- NHS "5 Steps to Mental Wellbeing" for AI framework
- HTML5 UP for the UI template
- SWI-Prolog community

