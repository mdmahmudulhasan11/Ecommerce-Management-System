# **E-Commerce Management System** 

A web-based application for managing an online store. It provides customer-facing pages to browse products with basic authentication, and an admin panel to manage products, users, orders, and customer messages.

---

##  Project Overview

**E-Commerce Management System** E-Commerce Management System is a web based application for managing an online store. It provides customer-facing pages to browse products and basic authentication features, and an admin panel to manage products, users, orders, and customer messages.


---

## Key Features

### 👤 Customer Side
- User registration and login/logout  
- Product listing and product details page  
- Basic cart / wishlist flow  

### Admin Side
- Admin dashboard  
- Add / update / delete products  
- View and manage users  
- View orders and update payment status  
- View and delete customer messages  

---

##  Technology Stack
- **Frontend:** HTML, CSS, Bootstrap, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL / MariaDB  
- **Local Server:** XAMPP / WAMP / Laragon (Apache + PHP + MySQL)  

---

##  Folder Structure

```text
project-root/
  php/        - PHP pages and backend logic
  js/         - JavaScript files
  css/        - Stylesheets
  img/        - Images (product images, UI assets)
  database/   - SQL file(s) for database setup



## Key Features
### Customer Side:
•	User registration and login/logout
•	Product listing and product details page
•	Basic cart/wishlist flow 

### Admin Side:
•	Admin dashboard
•	Add / update / delete products
•	View and manage users
•	View orders and update payment status
•	View and delete customer messages

## Technology Stack
•	Frontend: HTML, CSS, Bootstrap, JavaScript
•	Backend: PHP
•	Database: MySQL / MariaDB
•	Local Server: XAMPP / WAMP / Laragon (Apache + PHP + MySQL)

## Folder Structure
### project-root/
  php/        - PHP pages and backend logic
  js/         - JavaScript files
  css/        - Stylesheets
  img/        - Images (product images, UI assets)
  database/   - SQL file(s) for database setup



## Installation & Setup
Move Project into Web Root
Example for XAMPP:
Copy the ecommerceshop folder into:
C:\xampp\htdocs\
Your project should be accessible like:
http://localhost/ecommerceshop/

## Admin Access
To access admin features, the user record in the users table must have user_type = 'admin'. Register a normal user first, then run the following SQL in phpMyAdmin:
UPDATE users SET user_type='admin' WHERE email='YOUR_EMAIL_HERE';

## Troubleshooting
•	Connection failed: Make sure MySQL is running, the database name is shop_db, and credentials in connection.php are correct.
•	CSS/JS not loading: Verify folder names (css/, js/) and relative paths used in your PHP pages.
•	Images not showing: Ensure images are stored in img/ and the PHP code points to the correct image path.


## License
Educational purpose. Add an MIT License (optional) if you plan to publish publicly.
