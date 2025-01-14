# URL Shortener

A simple URL shortening service built with Laravel.

## Running Locally
1. Clone the repository:
   ```bash
   git clone <repo_url>
   cd atarim-test

2. Install dependencies:
    ``` composer install

2. Start the development server:
    ``` php artisan serve

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

# Run the following command to execute the tests:
``` php artisan test


