# Website 2 - Dynamic PHP & MySQL Blog

## Purpose
This is a dynamic blog website for the Internet Computing project. It uses PHP and MySQL to store and manage blog posts.

## Technologies Used
- PHP
- MySQL
- HTML
- CSS
- InfinityFree Hosting
- AwardSpace Free Hosting

## Features
- View all posts
- Read a single post
- Create a new post
- Edit an existing post
- Delete a post
- MySQL database connection

## Local Setup Using XAMPP
1. Install and open XAMPP.
2. Start Apache and MySQL.
3. Copy this folder into:
   ```text
   C:\xampp\htdocs\website2-dynamic-php-blog
   ```
4. Open phpMyAdmin:
   ```text
   http://localhost/phpmyadmin
   ```
5. Import `database.sql`.
6. Open:
   ```text
   http://localhost/website2-dynamic-php-blog
   InfinityFree Live URL:
https://technomindblog.lovestoblog.com/

Second Free Hosting Live URL:
http://technomindblog.atwebpages.com/
   ```

## Important Database Config
The database connection is inside `config.php`.

For local XAMPP:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'internet_blog');
define('DB_USER', 'root');
define('DB_PASS', '');
```

For InfinityFree or AwardSpace, replace these values with the database details from the hosting control panel.

## InfinityFree Deployment
1. Create an InfinityFree account.
2. Create a free hosting account/subdomain.
3. Open the control panel.
4. Create a MySQL database.
5. Open phpMyAdmin and import `database.sql`.
6. Edit `config.php` using your hosting database host, name, username, and password.
7. Upload all website files to the hosting folder, usually `htdocs`.
8. Open your live URL and test the blog.

## AwardSpace Deployment
1. Create an AwardSpace free hosting account.
2. Create a free subdomain.
3. Create a MySQL database from the control panel.
4. Import `database.sql` using phpMyAdmin.
5. Edit `config.php` with the AwardSpace database credentials.
6. Upload the website files using File Manager or FTP.
7. Open your live URL and test the blog.

## Screenshots
Add screenshots of deployment steps inside the `screenshots` folder.
