# EventFlow – Real-Time Event Management System

EventFlow is a modern event management web application built using PHP and MySQL. It allows users to discover events, view event details, book tickets, manage bookings, and update their profiles. An admin panel is included for managing users, bookings, and events.

## Features

### User Features
- User Registration and Login
- Browse Events
- Search and Category Filtering
- Event Details
- Ticket Booking
- Booking Confirmation
- My Bookings
- User Profile
- Edit Profile
- Live Events Section
- Secure Session Authentication

### Admin Features
- Admin Login
- Admin Dashboard
- Total Users Overview
- Total Bookings Overview
- Event Management
- Protected Admin Pages

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap Icons
- XAMPP
- Git
- GitHub

## Project Structure

```text
eventflow/
│
├── admin/
│   ├── dashboard.php
│   └── events.php
│
├── user/
│   ├── events.php
│   ├── event-details.php
│   ├── live.php
│   ├── booking.php
│   ├── booking-confirmation.php
│   ├── my-bookings.php
│   ├── profile.php
│   └── edit-profile.php
│
├── config/
│   ├── auth.php
│   └── db.php
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── icons/
│
├── index.php
├── login.php
├── register.php
└── logout.php
Database

The application uses MySQL with the following main tables:

users
bookings

Database name:

eventflow_db
Demo Login
User

Email:

ananya@example.com

Password:

123456
Admin

Email:

admin@eventflow.com

Password:

password
How to Run
Install XAMPP.
Start Apache and MySQL.
Copy the project into:
C:\xampp\htdocs\
Place the project folder as:
C:\xampp\htdocs\eventflow
Create the MySQL database:
eventflow_db
Import/create the required database tables.
Open the application in a browser:
http://localhost/eventflow/
Project Highlights
Clean and modern UI
Responsive design
Dynamic event details
Database-driven bookings
Role-based admin access
Session-based authentication
Professional event discovery experience
Author

Aswini

B.Tech Artificial Intelligence and Data Science

Solamalai College of Engineering