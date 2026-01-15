# The Barn Coworking Platform

A B2B event space rental platform built with PHP following strict MVC architecture. 
The Barn rents out space by the hour to **clubs, associations, coaches, and trainers** who host workshops, trainings, meetings, and events.

## Business Model

**B2B Focus**: The platform serves organizations, not individual consumers:
- **Clubs & Associations**: Host meetings, gatherings, and club events
- **Coaches & Trainers**: Book space for training sessions and workshops
- **Flexible Booking**: Rent by the hour with no long-term commitments
- **Event Hosting**: Organizations can request organizer access to host events

## Features

- **User Management**: Create accounts, login/logout, edit profiles, select interests
- **Event Management**: Browse hosted events, register for events, filter by interests
- **Organizer Features**: Request organizer role (for clubs/associations/coaches/trainers), create and manage events
- **Admin Dashboard**: Approve organizers, approve/reject events, manage partners
- **Email Notifications**: Receive notifications for event approvals, new events matching interests
- **Partner Management**: Manage consulting firms, clubs, and associations

## Requirements

- PHP 8.0 or higher
- MySQL 5.7 or higher
- Composer (for PHPMailer)
- Web server (Apache with mod_rewrite or Nginx)

## Installation

1. **Clone or download the project**

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure database**
   - Edit `app/config/database.php` with your database credentials
   - Import the schema: `mysql -u root -p thebarn_db < database/schema.sql`
   - Or run the SQL file manually in your MySQL client

4. **Configure email** (optional)
   - Edit `app/config/email.php` with your SMTP credentials
   - For Gmail, you'll need an App Password

5. **Configure web server**

   **Apache**: Ensure mod_rewrite is enabled and `.htaccess` is allowed
   
   **Nginx**: Add this to your server block:
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

6. **Set document root**
   - Point your web server's document root to the `public/` directory
   - Or configure a virtual host pointing to `public/`

## Default Admin Account

- Email: `admin@thebarn.com`
- Password: `admin123`

**⚠️ IMPORTANT: Change this password immediately after first login!**

## Project Structure

```
TheBarnp/
├── app/
│   ├── config/          # Configuration files
│   ├── controllers/     # Controllers (MVC)
│   ├── core/           # Core framework classes
│   ├── models/         # Models (MVC)
│   └── views/          # Views (MVC)
│       ├── layouts/    # Layout templates
│       └── partials/   # Reusable partials
├── database/           # Database schema
├── public/            # Public directory (web root)
│   ├── index.php      # Front controller
│   └── .htaccess      # URL rewriting
└── composer.json      # Dependencies
```

## Usage

1. **Users** can:
   - Register and create accounts
   - Browse and register for events
   - Select interests to receive relevant notifications
   - Request organizer role

2. **Organizers** can:
   - Create events (pending admin approval)
   - View their events and registration status
   - Manage event details

3. **Admins** can:
   - Approve/reject organizer requests
   - Approve/reject events
   - Manage partners
   - View all events and users

## Security Features

- Password hashing with `password_hash()`
- CSRF protection on forms
- PDO prepared statements (SQL injection prevention)
- Input validation and sanitization
- Session-based authentication
- Role-based access control

## Notes

- All pages are `.php` files (no `.html` files)
- Strict MVC architecture separation
- Clean URLs via router
- Responsive design
- Email notifications via PHPMailer

## License

This project is built for The Barn Coworking platform.

