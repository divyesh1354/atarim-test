# URL Shortener

A simple URL shortening service built with Laravel.

## Running Locally
1. Clone the repository:
   ```bash
   git clone https://github.com/divyesh1354/atarim-test.git

2. Install dependencies:
    ```bash
    composer install

2. Start the development server:
    ```bash
    php artisan serve

## Endpoints

### Encode URL
- **URL:** `/api/encode`
- **Method:** POST
- **Request Body:** `{ "url": "https://example.com" }`
- **Response:** `{ "short_url": "http://short.est/abc123" }`

### Decode URL
- **URL:** `/api/decode`
- **Method:** POST
- **Request Body:** `{ "short_url": "http://short.est/abc123" }`
- **Response:** `{ "original_url": "https://example.com" }`


## Run Tests

### Run the following command to execute the tests:
    ```php artisan test


