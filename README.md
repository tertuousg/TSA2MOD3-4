# TSA2 — Tasks for Today Management System

Student: Paul Terence Guadalupe  
Section: TC23

## Features

- Public Welcome, Task List, Profile, and About pages
- Login/logout with `password_hash()`, `password_verify()`, and secure session regeneration
- Authentication filter protecting task-management actions only
- Validated New Task and Edit Task forms
- Soft deletion through `is_archived`; archived tasks remain stored but disappear from public lists
- CSRF-protected management forms and escaped output
- Database migration, seeder, and SQL export

## Setup

1. Run `composer install`.
2. Use the included `.env`, or configure it for your MySQL credentials and the `tasks_for_today` database.
3. Create the database using either:
   - Import `tasks_for_today.sql` through phpMyAdmin; or
   - Run `php spark migrate` and `php spark db:seed TasksSeeder`.
4. Run `php spark serve`.
5. Open `http://localhost:8080`.

Demo login: `student01` / `password123`

## Required access-control test

1. While logged out, verify `/`, `/tasks`, `/profile`, and `/about` open normally.
2. While logged out, visit `/tasks/new`; it must redirect to `/login`.
3. Log in and create a task with a title and date.
4. Edit that task and confirm its existing information is pre-filled.
5. Archive the task and confirm it disappears from Today and Task List.
6. Log out and confirm task-management routes are protected again.

For hosting, point the document root to `public`, enter production database credentials, enable HTTPS, and change the demo password.
