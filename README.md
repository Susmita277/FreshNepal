# FreshNepal

**FreshNepal** is a multi-vendor eCommerce system designed for farmers and users.
Farmers can create their accounts and list products, while users can browse and purchase items online. 
Payment options include **Cash on Delivery (COD)** and **eSewa**.
Delivery charges are automatically calculated based on the user's location.

## Requirements

- PHP >= 8.x
- Composer
- MySQL or other supported database
- Laravel 10.x 

## Installation

Follow these steps to set up the project locally:

```bash
# Clone the repository
git clone https://github.com/your-username/your-repo.git
cd your-repo

# Install dependencies
composer install

# Copy example environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Start the development server
php artisan serve


