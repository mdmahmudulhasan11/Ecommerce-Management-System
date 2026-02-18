

**1\. Project Overview**

E-Commerce Management System is a web based application for managing an online store. It provides customer-facing pages to browse products and basic authentication features, and an admin panel to manage products, users, orders, and customer messages.

**2\. Key Features**

**Customer Side:**

·        User registration and login/logout

·        Product listing and product details page

·        Basic cart/wishlist flow

**Admin Side:**

·        Admin dashboard

·        Add / update / delete products

·        View and manage users

·        View orders and update payment status

·        View and delete customer messages

**3\. Technology Stack**

·        Frontend: HTML, CSS, Bootstrap, JavaScript

·        Backend: PHP

·        Database: MySQL / MariaDB

·        Local Server: XAMPP / WAMP / Laragon (Apache + PHP + MySQL)

**4\. Folder Structure**

project-root/  
  php/        - PHP pages and backend logic  
  js/         - JavaScript files  
  css/        - Stylesheets  
  img/        - Images (product images, UI assets)  
  database/   - SQL file(s) for database setup

**5\. Installation & Run (Local Setup)**

1.      Install XAMPP / WAMP / Laragon (required for Apache + PHP + MySQL).

2.      Copy the project folder into your server root directory (XAMPP example: C:\\xampp\\htdocs\\your-project\\).

3.      Open XAMPP Control Panel and start Apache and MySQL.

4.      Open phpMyAdmin: http://localhost/phpmyadmin

5.      Create a database named: shop\_db

6.      Import the SQL file from the database/ folder (example: database/shop\_db.sql).

7.      Verify your DB credentials in php/connection.php (or your connection file).

**Database Connection Example:**

mysqli\_connect('localhost', 'root', '', 'shop\_db');

**6\. Installation & Setup**

**Move Project into Web Root**

**Example for XAMPP:**

**Copy the ecommerceshop folder into:**

**C:\\xampp\\htdocs\\**

**Your project should be accessible like:**

**http://localhost/ecommerceshop/**

**7\. Admin Access**

To access admin features, the user record in the users table must have user\_type = 'admin'. Register a normal user first, then run the following SQL in phpMyAdmin:

UPDATE users SET user\_type='admin' WHERE email='YOUR\_EMAIL\_HERE';

**8\. Troubleshooting**

·        Connection failed: Make sure MySQL is running, the database name is shop\_db, and credentials in connection.php are correct.

·        CSS/JS not loading: Verify folder names (css/, js/) and relative paths used in your PHP pages.

·        Images not showing: Ensure images are stored in img/ and the PHP code points to the correct image path.


