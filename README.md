# Final Project Backend

This is the backend repository for the final project.

## Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL
- Git

### Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/bagasw980/final-project-be.git
    cd final-project-be
    ```

2. **Install dependencies:**
    ```bash
    composer install
    ```

3. **Copy the example environment file and set the environment variables:**
    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**
    - Create a new MySQL database.
    - Update the `.env` file with your database credentials.

6. **Run the database migrations:**
    ```bash
    php artisan migrate
    ```

7. **Run the database seeders:**
    ```bash
    php artisan db:seed
    ```

8. **Generate a JWT key:**
    ```bash
    php artisan jwt:secret
    ```

9. **Create a symbolic link from `public/storage` to `storage/app/public`:**
    ```bash
    php artisan storage:link
    ```

10. **Start the development server:**
    ```bash
    php artisan serve
    ```

Your application should now be running at `http://localhost:8000`.

### Additional Commands

- **Run tests:**
    ```bash
    php artisan test
    ```

- **Clear application cache:**
    ```bash
    php artisan cache:clear
    ```

## Available Routes
Here is a list of available routes in this project:

- **Admin Blog:**
    - /api/admin/blog - GET|HEAD
    - /api/admin/blog - POST
    - /api/admin/blog/{id} - GET|HEAD
    - /api/admin/blog/{id} - DELETE

- **Admin FAQ:**
    - /api/admin/faq - GET|HEAD
    - /api/admin/faq - POST
    - /api/admin/faq/{id} - DELETE

- **Authentication:**
    - /api/auth/login - POST
    - /api/auth/logout - POST
    - /api/auth/me - GET|HEAD
    - /api/auth/register - POST

- **Public Blog:**
    - /api/blog - GET|HEAD
    - /api/blog/{id} - GET|HEAD

- **Public FAQ:**
    - /api/faq - GET|HEAD

## Deployment

For deployment instructions, please refer to the [DEPLOY.md](DEPLOY.md) file.

