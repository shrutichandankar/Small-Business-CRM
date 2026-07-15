SIMPLE CRM - ACADEMIC PROJECT
================================
Tech stack: HTML, CSS, PHP (mysqli, procedural style), MySQL
No JavaScript is used anywhere in this project.

--------------------------------
FOLDER CONTENTS (10 pages + support files)
--------------------------------
1.  index.php          - Login page
2.  register.php        - Create new account
3.  logout.php           - Logout (destroys session)
4.  dashboard.php        - Home page after login, shows stats
5.  customers.php        - List all customers
6.  add_customer.php     - Add a new customer
7.  edit_customer.php    - Edit an existing customer
8.  delete_customer.php  - Confirm & delete a customer
9.  view_customer.php    - View one customer + their leads
10. leads.php            - List all leads
11. add_lead.php         - Add a new lead

Support files (not "pages", used by all pages above):
- config.php      - Database connection + session start
- auth_check.php  - Protects pages from being viewed without login
- navbar.php      - Shared top navigation bar
- style.css       - All styling
- database.sql    - Creates the database + tables + sample data

--------------------------------
HOW TO RUN (using XAMPP / WAMP / MAMP)
--------------------------------
1. Install XAMPP (or WAMP/MAMP) and start Apache + MySQL.

2. Copy the whole "crm-project" folder into your server's root:
   - XAMPP (Windows):  C:\xampp\htdocs\crm-project
   - XAMPP (Mac/Linux): /Applications/XAMPP/htdocs/crm-project

3. Create the database:
   - Open http://localhost/phpmyadmin
   - Click "Import" -> choose the file "database.sql" -> click Go
   OR run this in a terminal:
        mysql -u root -p < database.sql

4. If your MySQL username/password is different from the defaults,
   edit config.php and change:
        $db_user = "root";
        $db_pass = "";

5. Open your browser and go to:
        http://localhost/crm-project/

6. Click "Register here" to create your first login account,
   then log in and start using the CRM.
   (Two sample customers and leads are already pre-loaded by database.sql.)

--------------------------------
HOW THE PROJECT WORKS (for your viva/presentation)
--------------------------------
- Sessions (session_start in config.php) keep the user logged in across pages.
- auth_check.php is included at the top of every protected page - if there's
  no user_id in the session, it redirects back to the login page.
- All database queries use mysqli_real_escape_string() to prevent SQL
  injection, and htmlspecialchars() is used when printing data back to
  the browser to prevent XSS.
- Passwords are never stored as plain text - password_hash() and
  password_verify() are used.
- Deleting a customer does NOT use a JavaScript confirm() popup (since this
  project avoids JS). Instead, delete_customer.php shows a real confirmation
  page with a "Yes, Delete" button that submits a POST request.
- customers and leads are linked using a foreign key (leads.customer_id),
  so deleting a customer also deletes their leads (ON DELETE CASCADE).

--------------------------------
POSSIBLE EXTENSIONS (if you want to add more for extra marks)
--------------------------------
- Add a "Tasks" or "Follow-ups" module the same way leads was built.
- Add search/filter on customers.php using a GET form.
- Add pagination to long tables.
- Add an admin role that can manage other users.
