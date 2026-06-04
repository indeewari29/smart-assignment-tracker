# Smart Assignment & Deadline Tracking System with AI Reminders

A web-based application that helps students track assignments, break down tasks into subtasks, monitor stress levels, and receive AI-powered gentle suggestions.

## 1. Features

- User Authentication – Login, Signup, Logout (Student/Admin roles)
- Assignment Management – Add, Edit, Delete assignments with color-coded priority (High/Medium/Low)
- Subtask Breakdown – Break assignments into smaller tasks with progress bar
- Mood Tracker – 3 questions about body, energy, and mind to calculate stress level
- AI Suggestions – Prolog rule-based expert system (12 IF-THEN rules) providing personalized gentle suggestions
- Browser Notifications – Pop-up reminders for deadlines within 3 days
- Admin Panel – View all users and assignments, delete users
- Crisis Support – Links to NHS mental wellbeing resources and local crisis helpline

## 2. Tech Stack

- Frontend - HTML, CSS, JavaScript
- Backend - PHP
- Database - MySQL
- AI Engine - Prolog (SWI-Prolog)

## 3. Project Structure

smart-assignment-tracker/
- assets/ (CSS, JS, images)
- classes/ # PHP classes (User, Assignment, Subtask, Repositories)
- templates/ # HTML templates (login, dashboard, mood tracker, etc.)
- login.php # Login logic
- signup.php # Signup logic
- dashboard.php # Dashboard logic
- mood_tracker.php # Mood tracker logic
- ai_suggestion.php # AI suggestion page
- admin.php # Admin panel
- subtasks.php # Subtask management
- ai_rule.pl # Prolog AI rules
- smart_assignment_tracker.sql # Database export


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

## Test Accounts (Role,	Email,	Password)

Student,	dilmini@student.edu,	pass_dilmini123
Admin,	kamal@admin.edu, admin_pass123
