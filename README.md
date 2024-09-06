# Laravel 11 Auto-Suggestion Feature

**Built by Opia Austin Developia**

## Overview

This project demonstrates how to build a page with an Auto-Suggestion/Search feature using Laravel 11. The project includes a dashboard/login area for managing settings, leveraging Laravel Breeze for quick setup.

## Features

- **Auto-Suggestion/Search**: As you type in the search box, it automatically makes a request to the API endpoint in your Laravel app, which searches your database and returns the appropriate results.
- **Dashboard/Login Area**: Manage settings and view reports.
- **Settings**: Turn on/off the display of each block in the Suggestion result.
- **Reporting**: View a paginated log of search terms used, sorted by date descending, with additional metrics.

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-repo/laravel-auto-suggestion.git
    cd laravel-auto-suggestion
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Set up environment variables**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Run migrations and seeders**:
    ```bash
    php artisan migrate --seed
    ```

5. **Start the development server**:
    ```bash
    php artisan serve
    npm run dev
    ```

## Database

Choose an appropriate database (SQL or NoSQL) based on your needs. For this project, we use SQL (MySQL) due to its robustness and scalability for handling millions of products.

### Database Structure

- **Suggestion Term**: `terms` table with columns `term`, `url`.
- **Collection**: `collections` table with columns `id`, `title`, `url`.
- **Product**: `products` table with columns `id`, `title`, `url`, `brand`, `price`, `image`.

### Migrations and Seeders

Appropriate migrations and seeders are included to recreate the database structure and populate it with sample data.

## Front-End

The front-end uses a simple framework to ensure functionality. Feel free to enhance the design as needed.

## API Endpoint

Create an API endpoint that accepts a search term and returns the data needed to populate the Auto-Suggestion results.

## Dashboard

### Settings

- **Display Settings**: Turn on/off the display of each block in the Suggestion result.
- **Validation**: Ensure settings have sensible limits (e.g., a setting to select how many products/results are shown shouldn't allow 0 products).

### Reporting

- **Search Log**: Paginated log of search terms used, sorted by date descending.
- **Metrics**: Add at least one metric of your choice (e.g., most searched terms). This helps in understanding user behavior and improving the search functionality.

## License

All rights reserved by Opia Austin Developia.

---

Feel free to customize this README further to suit your project's specific needs!

Source: Conversation with Copilot, 06/09/2024
(1) Laravel 11 Autocomplete Search from Database Example. https://www.itsolutionstuff.com/post/laravel-11-autocomplete-search-from-database-exampleexample.html.
(2) tutsmake/Laravel-11-Ajax-Autocomplete-Search-Example-Tutorial. https://github.com/tutsmake/Laravel-11-Ajax-Autocomplete-Search-Example-Tutorial.
(3) positronx.io. https://www.positronx.io/laravel-autocomplete-search-with-select2-example/.
(4) Laravel Autocomplete Search With Jquery UI & Ajax Example. https://www.tutsmake.com/laravel-8-autocomplete-search-from-database-tutorial/.





<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

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
# auto-suggestion
