# Deployment Guide for Laravel Project

## Prerequisites
- PHP
- MySQL
- Nginx
- Composer
- Git

## Steps

### 1. Clone the Repository
```sh
git clone <repository-url>
cd <repository-directory>
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Set Up Environment File
```sh
cp .env.example .env
php artisan key:generate
```
Edit the `.env` file to match your server configuration.

### 4. Set Up Database
```sh
mysql -u root -p
CREATE DATABASE <database_name>;
exit
```
Update the `.env` file with your database credentials.

### 5. Run Migrations
```sh
php artisan migrate
```

### 6. Create Storage Link
```sh
php artisan storage:link
```

### 7. Generate JWT Key
```sh
php artisan jwt:secret
```

### 8. Configure Nginx
Create a new Nginx configuration file for your site:
```sh
sudo nano /etc/nginx/sites-available/<your-site>
```
Add the following configuration:
```nginx
server {
    listen 80;
    server_name your_domain_or_IP;

    root /path_to_your_project/public;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
Enable the site and restart Nginx:
```sh
sudo ln -s /etc/nginx/sites-available/<your-site> /etc/nginx/sites-enabled/
sudo systemctl restart nginx
```

### 9. Set Up Firewall
Allow Nginx Full profile through the firewall:
```sh
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

### 10. Set Permissions
```sh
sudo chown -R www-data:www-data /path_to_your_project
sudo chmod -R 775 /path_to_your_project/storage
sudo chmod -R 775 /path_to_your_project/bootstrap/cache
```
