# Smart Assignment & Deadline Tracking System with AI Reminders

## Introduction

A web-based application that helps students track assignments, break down tasks into subtasks, monitor stress levels, and receive AI-powered gentle suggestions.

## Features

- User Authentication - Login, Signup, Logout (Student/Admin roles)
- Assignment Management – Add, Edit, Delete assignments with color-coded priority (High/Medium/Low)
- Subtask Breakdown – Break assignments into smaller tasks with progress bar
- Mod Tracker – 3 questions about body, energy, and mind to calculate stress level
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

- Login
<img width="1907" height="1011" alt="Screenshot 2026-05-21 191122" src="https://github.com/user-attachments/assets/5478b887-75e6-4ca1-994f-1597bb81a47a" />


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
