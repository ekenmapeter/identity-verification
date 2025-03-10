
To install the Identity Verification project from GitHub using Laravel, follow the steps below:

## Prerequisites:
Before you begin, make sure you have the following installed on your machine:

1. **PHP** (preferably version 7.4 or higher)
2. **Composer** (a dependency manager for PHP)
3. **MySQL** or any other relational database (for storing application data)
4. **Node.js** (for compiling frontend assets, if applicable)

---

## Steps to Install the Identity Verification Project

### 1. Clone the GitHub Repository
First, you need to clone the project repository to your local machine.

Open a terminal/command prompt and run the following command:

```bash
git clone https://github.com/ekenmapeter/identity-verification.git
```

Navigate into the project directory:

```bash
cd identity-verification
```

### 2. Install PHP Dependencies
Once inside the project directory, you need to install the PHP dependencies required by the Laravel application. You can do this using Composer:

```bash
composer install
```

This command will install all the required PHP libraries and dependencies specified in the `composer.json` file.

### 3. Set Up the Environment File
Laravel uses an `.env` file to store environment-specific configuration options (like database credentials, application key, etc.).

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

### 4. Generate Application Key
Laravel requires an application key for encryption. To generate this key, run the following command:

```bash
php artisan key:generate
```

This command will generate a new application key and automatically update your `.env` file.

### 5. Configure the Database
Open the `.env` file in a text editor and configure the database connection. Set the following values according to your database settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Ensure that you have created a database in MySQL for this project.

### 6. Run Migrations
Next, run the Laravel migrations to set up the database tables:

```bash
php artisan migrate
```

This command will create the necessary tables in your database based on the migration files in the `database/migrations` folder.

### 7. Install Frontend Dependencies
If the project uses any frontend assets (like JavaScript and CSS), install the necessary Node.js dependencies:

```bash
npm install
```

### 8. Compile Assets
If the project has any assets that need to be compiled (e.g., CSS, JavaScript), run:

```bash
npm run dev
```

This will compile the assets for local development. For production, you can run `npm run production`.

### 9. Serve the Application
Now that everything is set up, you can run the Laravel development server to test the application:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000` (or the URL shown in your terminal).

---

## Conclusion
Your Identity Verification Laravel project is now installed and running locally! You can start interacting with the application by navigating to the provided URL in your browser.

---

If you face any issues during installation, check the project documentation or raise an issue in the GitHub repository for assistance.