# SIMPLE CRM - ACADEMIC PROJECT

A simple **Customer Relationship Management (CRM)** web application developed as an academic project using **Core PHP**, **MySQL**, **HTML**, and **CSS**. The system helps small businesses manage customers, leads, sales records, customer support, and communication history through a clean and user-friendly interface.

**Tech Stack:** HTML, CSS, PHP (mysqli - Procedural), MySQL 
---

## FOLDER CONTENTS

### Main Pages

1. `index.php` - User Login
2. `register.php` - Create New Account
3. `logout.php` - Logout User
4. `dashboard.php` - Dashboard with CRM Statistics
5. `customers.php` - View All Customers
6. `add_customer.php` - Add New Customer
7. `edit_customer.php` - Update Customer Details
8. `delete_customer.php` - Delete Customer
9. `view_customer.php` - View Customer Information
10. `leads.php` - Manage Leads
11. `add_lead.php` - Add New Lead
12. `sales.php` - Sales Management
13. `support.php` - Customer Support Records
14. `history.php` - Communication History

### Support Files

- `config.php` - Database Connection
- `auth_check.php` - Authentication & Session Protection
- `navbar.php` - Navigation Bar
- `style.css` - Project Styling
- `database.sql` - Database Schema & Sample Data
- `README.md` - Project Documentation

---

## HOW TO RUN (XAMPP / WAMP)

### 1. Install XAMPP/WAMP

Start:

- Apache
- MySQL

---

### 2. Copy Project Folder

Copy the project folder into your web server directory.

**XAMPP**

```
C:\xampp\htdocs\crm-project
```

**WAMP**

```
C:\wamp64\www\crm-project
```

---

### 3. Import Database

Open

```
http://localhost/phpmyadmin
```

Create a database named:

```
crm_project
```

Import

```
database.sql
```

---

### 4. Configure Database

Open `config.php` and update the database credentials if required.

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "crm_project";
```

---

### 5. Run the Project

Open your browser and visit

```
http://localhost/crm-project/
```

---

### 6. Register & Login

- Create a new account using the **Register** page.
- Login using your credentials.
- Start managing customers, leads, sales, and support information.

---

## PROJECT MODULES

### Authentication

- User Registration
- User Login
- Logout
- Session Management

### Dashboard

Displays important CRM statistics including:

- Total Customers
- Total Leads
- Total Sales

### Customer Management

- Add Customer
- View Customer Details
- Edit Customer
- Delete Customer

### Lead Management

- Add Lead
- View Leads

### Sales Management

- Record and View Sales Information

### Customer Support

- Manage Customer Support Requests

### Communication History

- Store customer interaction history

---

## HOW THE PROJECT WORKS

- User authentication is handled using PHP Sessions.
- `auth_check.php` protects all secured pages from unauthorized access.
- Database connectivity is managed through `config.php`.
- Customer and lead information is stored in a MySQL database.
- CRUD (Create, Read, Update, Delete) operations are implemented using PHP and MySQL.
- Passwords are securely stored using `password_hash()` and verified using `password_verify()`.
- User inputs are sanitized using `mysqli_real_escape_string()` and displayed safely using `htmlspecialchars()`.
- Customers and leads are connected through a foreign key relationship.

---

## FEATURES

- Secure Login System
- Customer Management
- Lead Management
- Sales Tracking
- Customer Support
- Communication History
- Dashboard Statistics
- Responsive Layout
- Session-Based Authentication

---

## FUTURE ENHANCEMENTS

- Customer Search & Filters
- Export Reports (PDF/Excel)
- Email Notifications
- Role-Based Authentication (Admin/Employee)
- Charts & Analytics Dashboard
- Task & Follow-up Management
- Pagination for Large Data

---

## AUTHOR

**Shruti Chandankar**

Final Year BCA Student

---

## LICENSE

This project is developed for educational and academic purposes only.
