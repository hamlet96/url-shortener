# URL Shortener

This is a prototype for a URL shortener created with Laravel and Vue.js. The application allows users to input a URL, which is then shortened to a 6-character alphanumeric hash. If the URL has been previously shortened, the existing short URL will be returned. The URLs are validated using the Google Safe Browsing API or an equivalent API to ensure they are safe.

## Features

- Shortens URLs to a 6-character alphanumeric hash
- Detects duplicate URLs and returns the existing short URL
- Validates URLs using the Google Safe Browsing API
- Redirects users to the original URL when accessing the short URL
- Supports short URLs in the format `example.com/[hash]` and `example.com/something/[hash]`

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- Laravel 11 or higher
- Vue.js 3 or higher

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/hamlet96/url-shortener.git
    cd url-shortener
    ```

2. Install PHP dependencies:
    ```bash
    composer install
    ```

3. Install JavaScript dependencies:
    ```bash
    npm install
    ```

4. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Set up your database and update the `.env` file with your database credentials.

7. Run the migrations:
    ```bash
    php artisan migrate
    ```

8. Set up Google Safe Browsing API:
    - Obtain an API key from the [Google Safe Browsing API](https://developers.google.com/safe-browsing/v4/lookup-api).
    - Add the API key to your `.env` file:
        ```dotenv
        SAFE_BROWSING_API_KEY=your_api_key_here
        ```

## Running the Application

1. Start the development server:
    ```bash
    php artisan serve
    ```

2. Compile the front-end assets:
    ```bash
    npm run build
    ```

## Usage

- Enter a URL in the form to generate a shortened URL.
- The generated short URL will be displayed. If the URL has been previously shortened, the existing short URL will be shown.
- Access the short URL to be redirected to the original URL.

## License

This project is open-source and available under the MIT License.
