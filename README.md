# Product Management System

This is a Laravel-based Product Management System that allows users to create, view, update, and delete products. It includes sorting, searching, and pagination functionalities, as well as image upload and display features.

![Product List Screenshot](public/screenshots/product-list.png)

## Live Demo

[Watch the Live Demo Video](https://example.com/live-demo) _(Replace with the actual link)_

## Features

- **CRUD Operations**: Create, view, update, and delete products.
- **Search**: Search products by `product_id` or description.
- **Sorting**: Sort products by name and price in ascending or descending order.
- **Image Upload**: Upload images for products, which display immediately upon upload.
- **Pagination**: Paginated product listing.

## Getting Started

Follow these steps to set up the project on your local machine.

### Prerequisites

- [PHP 8.0+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/)

### Installation

1. **Clone the Repository**

    ```bash
    git clone https://github.com/your-username/product-management-system.git
    cd product-management-system
    ```

2. **Install Dependencies**

   Use Composer to install the Laravel dependencies:

    ```bash
    composer install
    ```

3. **Create Environment File**

   Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**

   Generate the Laravel application key:

    ```bash
    php artisan key:generate
    ```

5. **Configure Database**

   Open the `.env` file and update the following lines to match your MySQL configuration:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. **Create Database and Run Migrations**

   Make sure you've created a database in MySQL with the name specified in `.env`, then run the migrations to set up the required tables:

    ```bash
    php artisan migrate
    ```

7. **Run the Server**

   Start the Laravel development server:

    ```bash
    php artisan serve
    ```

   Your application should now be running on [http://localhost:8000](http://localhost:8000).

### Seed Data (Optional)

If you'd like to seed the database with sample products, you can create a seeder:

1. Run the seeder:

    ```bash
    php artisan db:seed --class=ProductSeeder
    ```

### Usage

- Access the product listing page at [http://localhost:8000/products](http://localhost:8000/products).
- Use the **Add New Product** button to create a product.
- Search, sort, and view product details, and edit or delete products as needed.

### Screenshots

#### Product List
![Product List]()

#### Add New Product
![Add New Product]()

> **Note**: Replace the paths in the screenshot links with the actual paths to the images in your project.

## Troubleshooting

If you encounter any issues, try the following:

- Ensure your `.env` file is configured correctly with your database credentials.
- Clear cache and config with:

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

## License

This project is open-source and available under the MIT License.
