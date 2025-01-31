# MMLY - Member Management System

A Laravel-based member management system with support for regions, provinces, and card reports.

## Author

**Youssef Moussaoui**

## Features

- Member Management (CRUD operations)
- Region and Province Management
- Card Reports with Automatic Calculations
- Dynamic Filtering and Statistics
- Arabic Language Support
- Responsive Design with Tailwind CSS

## Requirements

- PHP 8.2 or higher
- Composer
- Docker & Docker Compose (for Docker installation)
- Node.js & NPM (for local installation)

## Installation with Docker (Laravel Sail)

1. Clone the repository:
```bash
git clone https://github.com/yourusername/MMLY.git
cd MMLY
```

2. Copy the environment file:
```bash
cp .env.example .env
```

3. Install Composer dependencies locally:
```bash
composer install
```

4. Start Docker containers with Sail:
```bash
./vendor/bin/sail up -d
```

5. Install dependencies and build assets:
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

6. Generate application key:
```bash
./vendor/bin/sail artisan key:generate
```

7. Run database migrations and seeders:
```bash
./vendor/bin/sail artisan migrate --seed
```

## Manual Installation (Without Docker)

1. Clone the repository:
```bash
git clone https://github.com/yourusername/MMLY.git
cd MMLY
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node.js dependencies and build assets:
```bash
npm install
npm run build
```

4. Copy the environment file and configure your database:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run database migrations and seeders:
```bash
php artisan migrate --seed
```

7. Start the development server:
```bash
php artisan serve
```

## Database Configuration

For local development, update your `.env` file with:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mmly
DB_USERNAME=root
DB_PASSWORD=
```

For Docker (Sail), use these settings:
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=mmly
DB_USERNAME=sail
DB_PASSWORD=password
```

## Usage

1. Access the application:
   - Docker: `http://localhost`
   - Local: `http://localhost:8000`
2. Log in with the default admin credentials:
   - Email: admin@example.com
   - Password: password

## Available Commands

With Docker (Sail):
```bash
# Start containers
./vendor/bin/sail up -d

# Stop containers
./vendor/bin/sail down

# Run artisan commands
./vendor/bin/sail artisan [command]

# Run NPM commands
./vendor/bin/sail npm [command]

# Access container shell
./vendor/bin/sail shell

# Run tests
./vendor/bin/sail test
```

Common Artisan Commands:
```bash
# Generate new migration
sail artisan make:migration create_table_name

# Run migrations
sail artisan migrate

# Rollback migrations
sail artisan migrate:rollback

# Refresh migrations
sail artisan migrate:refresh

# Seed the database
sail artisan db:seed

# Create new controller
sail artisan make:controller ControllerName

# Create new model
sail artisan make:model ModelName

# Clear caches
sail artisan cache:clear
sail artisan config:clear
sail artisan view:clear
```

## Development Commands

```bash
# Watch for changes and rebuild assets
sail npm run dev

# Build assets for production
sail npm run build
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---
2025 Youssef Moussaoui. All rights reserved.
