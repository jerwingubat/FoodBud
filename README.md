# FoodBud 🍏🚫
### A Web-Based Food Scanner for Dietary Restrictions

![FoodBud Banner](https://via.placeholder.com/800x300?text=FoodBud+Banner) <!-- Replace with actual image -->

**FoodBud** is a web application that helps users identify prohibited foods based on their dietary needs (allergies, religious restrictions, health goals) using image classification and personalized rules.

## Features ✨
- 📸 **Image Upload & Classification** - Scan food images via camera or file upload
- ⚠️ **Dietary Alerts** - Flags unsafe foods based on user profiles
- 👤 **User Accounts** - Secure signup/login system
- 📊 **Dashboard** - View scan history and saved restrictions
- 📱 **Responsive Design** - Works on both desktop and mobile devices

## Technologies Used 💻
| Category       | Technology       |
|----------------|------------------|
| **Frontend**   | HTML5, CSS3, JavaScript |
| **Backend**    | PHP              |
| **Database**   | MySQL            |
| **ML Model**   | Teachable Machine (CNN exported to TensorFlow.js) |
| **Security**   | Password hashing, Prepared statements |

## System Architecture 🏗️
```plaintext
User Browser (Client) 
  → [HTML/CSS/JS] 
  → PHP Server (Apache) 
  → MySQL Database
  → TensorFlow.js Model
```
## Installation ⚙️
### Prerequisites
  * Web server (XAMPP/WAMP/MAMP)
  * PHP 7.4+
  * MySQL 5.7+
  * Modern web browser
### Setup Instructions
1. Clone the repository:
```bash
git clone https://github.com/jerwingubat/FoodBud.git
cd FoodBud
```
2. Import the database:
```bash
mysql -u username -p database_name < database/foodbud.sql
```
3. Configure database connection:
```bash
includes/config.php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'foodbud_db');
```
4. Deploy to your web server:
  * Copy files to htdocs or www directory
  * Ensure uploads/ directory is writable|
## File Structure 📂
```text
FoodBud/
├── assets/
│   ├── css/        # Stylesheets
│   ├── js/         # JavaScript files
│   └── images/     # Static images
├── includes/
│   ├── auth.php    # Authentication logic
│   ├── config.php  # Database configuration
│   └── classify.php # Image processing
├── database/
│   └── foodbud.sql # Database schema
├── uploads/        # User-uploaded images
├── index.php       # Landing page
├── login.php       # Login page
├── register.php    # Registration page
├── dashboard.php   # User dashboard
└── scan.php        # Food scanning interface
```
