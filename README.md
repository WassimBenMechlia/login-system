# login-system
This document contains instructions for running a GitHub project that uses PHPMailer to send emails. Before running the project, you need to install PHPMailer and set up a .env file.
# Installation
To install PHPMailer, run the following command in your terminal:
composer require phpmailer/phpmailer
This will install PHPMailer and its dependencies in your project.

# Configuration
To configure the project, you need to create a .env file in the root directory of your project. This file should contain the following information:
SMTP_USER   = 'user@example.com';                     
SMTP_PASS   = 'secret';  
SMTP_HOST       = 'smtp.example.com'; 
SMTP_PORT       = 465;
Replace the values with your own email account details. These values will be used by PHPMailer to send emails.

