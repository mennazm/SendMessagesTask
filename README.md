# Bulk Email Sending System

A Laravel-based application to efficiently send messages to a large number of users (e.g., 10,000+) without impacting system performance.

## Key Features
- **Queued Email System**: Sends emails in the background using Laravel queues
- **Batch Processing**: Handles users in chunks to optimize memory usage
-  **Performance-Oriented**: Designed for high-volume sending (10k+ users)
-  **Template System**: Professional HTML email templates with styling
-  **Safe Testing**: Uses Mailpit to prevent accidental real email sending

## Technical Requirements
- PHP 8.1+
- Composer
- Laravel 10+
- MySQL/MariaDB
- Mailpit (included in development setup)

Installation Guide
`bash
git clone https://github.com/mennazm/SendMessagesTask
cd email-system
composer install
cp .env.example .env
php artisan key:generate


2. Database Configuration
php artisan migrate --seed

3. Email Testing Setup
install mailpit

System Configuration
QUEUE_CONNECTION=database
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025

Start Services
mailpit # Start email catcher
php artisan serve # Start Laravel
php artisan messages:send: #Dispatches jobs to the queue.
php artisan queue:work # Start queue worker