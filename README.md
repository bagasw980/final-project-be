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

## Deployment

For deployment instructions, please refer to the [DEPLOY.md](deploy) file.

## API Documentation
The API documentation is available in the Postman collection. You can import it using the following link:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://documenter.getpostman.com/view/16747721/2sAY52dKn9)
