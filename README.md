# Laravel CRUD Application

A complete Product Management System built with Laravel 10 and MySQL featuring full CRUD operations, image uploads, and a responsive Bootstrap interface.

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-8.0+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1-purple)

## 📋 Features

- ✅ **Complete CRUD Operations** - Create, Read, Update, Delete products
- ✅ **Image Upload & Management** - Upload, display, and replace product images
- ✅ **Form Validation** - Server-side validation with error handling
- ✅ **Responsive Design** - Mobile-friendly Bootstrap 5 interface
- ✅ **Pagination** - Efficient data handling for large datasets
- ✅ **Stock Management** - Color-coded stock level indicators
- ✅ **Flash Messages** - Success and error notifications
- ✅ **Search Ready** - Structure prepared for search functionality

## 🚀 Quick Start

### Prerequisites

Make sure you have the following installed:
- PHP >= 8.0
- Composer
- MySQL >= 8.0
- Node.js & NPM (optional, for asset compilation)

### Installation

1. **Clone or download the project**
   ```bash
   # If using git
   git clone <your-repo-url>
   cd crud-app
   
   # Or create new Laravel project
   composer create-project laravel/laravel crud-app
   cd crud-app
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   
   Create a MySQL database:
   ```sql
   CREATE DATABASE crud_db;
   ```
   
   Update your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=crud_db
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Setup storage link** (for image uploads)
   ```bash
   php artisan storage:link
   ```

7. **Seed sample data** (optional)
   ```bash
   php artisan db:seed --class=ProductSeeder
   ```

8. **Start the application**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   
   Open your browser and visit: `http://localhost:8000`

## 📁 Project Structure

```
app/
├── Http/Controllers/
│   └── ProductController.php      # Main CRUD controller
├── Models/
│   └── Product.php               # Product model
database/
├── migrations/
│   └── create_products_table.php # Database schema
└── seeders/
    └── ProductSeeder.php         # Sample data
resources/views/
├── layouts/
│   └── app.blade.php            # Main layout
└── products/
    ├── index.blade.php          # Products list
    ├── create.blade.php         # Add new product
    ├── show.blade.php           # Product details
    └── edit.blade.php           # Edit product
routes/
└── web.php                      # Application routes
```

## 🗄️ Database Schema

### Products Table
| Column      | Type         | Description              |
|-------------|--------------|--------------------------|
| id          | bigint       | Primary key              |
| name        | varchar(255) | Product name             |
| description | text         | Product description      |
| price       | decimal(10,2)| Product price            |
| stock       | integer      | Available quantity       |
| category    | varchar(255) | Product category         |
| image       | varchar(255) | Image file path (nullable)|
| created_at  | timestamp    | Creation timestamp       |
| updated_at  | timestamp    | Last update timestamp    |

## 🎯 Usage

### Adding Products
1. Click **"Add New Product"** button
2. Fill in product details
3. Upload an image (optional)
4. Click **"Save Product"**

### Viewing Products
- **List View**: Browse all products with pagination
- **Detail View**: Click the eye icon to view full product details

### Editing Products
1. Click the edit icon (pencil)
2. Modify product information
3. Replace image if needed
4. Click **"Update Product"**

### Deleting Products
1. Click the delete icon (trash)
2. Confirm deletion in the popup
3. Product and associated image will be removed

## 🔧 Configuration

### File Upload Settings
- **Supported formats**: JPEG, PNG, JPG, GIF
- **Max file size**: 2MB
- **Storage location**: `storage/app/public/products/`

### Pagination
- **Items per page**: 10 (configurable in controller)

### Validation Rules
- **Name**: Required, max 255 characters
- **Description**: Required
- **Price**: Required, numeric, minimum 0
- **Stock**: Required, integer, minimum 0
- **Category**: Required, max 255 characters
- **Image**: Optional, must be image file, max 2MB

## 🚀 Deployment

### Production Setup

1. **Environment configuration**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Database optimization**
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

3. **Storage permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

4. **Web server setup**
   - Point document root to `/public` directory
   - Configure URL rewriting for Laravel routes

## 🔒 Security Features

- CSRF protection on all forms
- SQL injection prevention via Eloquent ORM
- File upload validation and sanitization
- XSS protection in Blade templates
- Secure file storage outside web root

## 🛠️ Extending the Application

### Adding Search Functionality
```php
// In ProductController@index
$products = Product::where('name', 'like', "%{$search}%")
                   ->orWhere('category', 'like', "%{$search}%")
                   ->latest()
                   ->paginate(10);
```

### Adding User Authentication
```bash
composer require laravel/ui
php artisan ui bootstrap --auth
php artisan migrate
```

### Adding API Endpoints
```bash
php artisan make:controller Api/ProductController --api
```

## 🐛 Troubleshooting

### Common Issues

**Storage link not working:**
```bash
php artisan storage:link
```

**Images not displaying:**
- Check storage permissions
- Verify `APP_URL` in `.env`
- Ensure storage link exists

**Database connection error:**
- Verify database credentials in `.env`
- Check MySQL service is running
- Confirm database exists

**Migration errors:**
```bash
php artisan migrate:fresh --seed
```

## 📝 API Documentation

### Routes
| Method | URI                    | Action  | Description        |
|--------|------------------------|---------|-------------------|
| GET    | /                      | index   | Redirect to products |
| GET    | /products              | index   | List all products   |
| GET    | /products/create       | create  | Show create form    |
| POST   | /products              | store   | Create new product  |
| GET    | /products/{id}         | show    | Show product details|
| GET    | /products/{id}/edit    | edit    | Show edit form      |
| PUT    | /products/{id}         | update  | Update product      |
| DELETE | /products/{id}         | destroy | Delete product      |

## 🤝 Contributing

1. Fork the project
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 📞 Support

If you encounter any issues or have questions:

1. Check the troubleshooting section
2. Review Laravel documentation: https://laravel.com/docs
3. Create an issue in the project repository
4. Contact the development team

---

**Built with ❤️ using Laravel Framework**
