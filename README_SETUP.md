# Laravel Product CRUD Application

A clean, modern, and user-friendly Laravel CRUD (Create, Read, Update, Delete) application for managing products with an attractive interface built with Bootstrap 5.

## Features ✨

- **Full CRUD Operations**: Create, Read, Update, and Delete products
- **Beautiful UI**: Modern gradient design with responsive Bootstrap 5 interface
- **Database Management**: SQLite database with structured schema
- **Validation**: Server-side form validation for data integrity
- **Sample Data**: Pre-populated with sample products using seeders
- **Stock Management**: Track product inventory and availability
- **Price Management**: Decimal precision for accurate pricing
- **Mobile Responsive**: Fully responsive design for all devices

## Project Structure

```
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ProductController.php      # Main CRUD controller
│   └── Models/
│       └── Product.php                     # Product model with fillable fields
├── database/
│   ├── migrations/
│   │   └── 2026_05_07_212602_create_products_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── ProductSeeder.php               # Sample product data
├── resources/
│   └── views/
│       ├── layout.blade.php                # Main layout template
│       └── products/
│           ├── index.blade.php             # List all products
│           ├── create.blade.php            # Create product form
│           ├── edit.blade.php              # Edit product form
│           └── show.blade.php              # Product detail view
├── routes/
│   └── web.php                             # Application routes
├── .env                                    # Environment configuration
└── database.sqlite                         # SQLite database file
```

## Database Schema

### Products Table
| Column | Type | Details |
|--------|------|---------|
| id | Integer | Primary key (auto-increment) |
| name | String | Product name (required) |
| description | Text | Product description (optional) |
| price | Decimal(10,2) | Product price (required, min: 0) |
| quantity | Integer | Stock quantity (required, min: 0) |
| created_at | Timestamp | Created date |
| updated_at | Timestamp | Updated date |

## Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- SQLite (usually comes with PHP)

### Step 1: Navigate to Project Directory
```bash
cd "d:\narak.documents\NaraKOuk A6 and E6(RUPP Year3 2025-2026)\E6 semester 2\Back end Lesson\Laravel ass"
```

### Step 2: Install Dependencies (Already Done)
```bash
composer install
```

### Step 3: Set Environment
The `.env` file is already configured with SQLite database.

### Step 4: Run Development Server
```bash
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

## Usage Guide

### 🏠 Home Page
- Displays all products in a formatted table
- Shows product ID, name, description, price, and quantity
- Displays stock status (In Stock / Out of Stock)

### ➕ Add New Product
1. Click **"Add New Product"** button in navigation
2. Fill in the product details:
   - **Product Name** (required)
   - **Description** (optional)
   - **Price** (required, decimal allowed)
   - **Quantity** (required, whole number)
3. Click **"Create Product"** to save

### 👁️ View Product Details
1. Click the **eye icon** on any product row
2. View complete product information with calculated total value
3. See stock status indicators
4. Last updated timestamp

### ✏️ Edit Product
1. Click the **pencil icon** on any product row
2. Modify any product details
3. Click **"Update Product"** to save changes

### 🗑️ Delete Product
1. Click the **trash icon** on any product row
2. Confirm deletion in the dialog box
3. Product will be permanently removed

## Sample Data

The application comes with 8 pre-loaded sample products:

1. **Wireless Headphones** - $99.99 (45 units)
2. **USB-C Cable** - $12.99 (150 units)
3. **Mechanical Keyboard** - $149.99 (28 units)
4. **4K Monitor** - $499.99 (12 units)
5. **Webcam 1080p** - $59.99 (67 units)
6. **Portable SSD 1TB** - $129.99 (34 units)
7. **Phone Stand** - $19.99 (Out of Stock)
8. **Desk Lamp LED** - $44.99 (55 units)

## API Routes

The application uses RESTful resource routing:

| Method | Route | Action |
|--------|-------|--------|
| GET | `/products` | List all products |
| GET | `/products/create` | Show create form |
| POST | `/products` | Store new product |
| GET | `/products/{id}` | Show product details |
| GET | `/products/{id}/edit` | Show edit form |
| PUT | `/products/{id}` | Update product |
| DELETE | `/products/{id}` | Delete product |

## Validation Rules

### Create/Update Product
- **name**: Required, string, max 255 characters
- **description**: Optional, string
- **price**: Required, numeric, minimum 0
- **quantity**: Required, integer, minimum 0

## Features Highlight

### 🎨 Modern UI
- Gradient backgrounds and smooth animations
- Bootstrap 5 components with custom styling
- Responsive design for mobile and desktop
- Interactive hover effects

### 🛡️ Data Validation
- Server-side validation for all inputs
- Clear error messages displayed to users
- Minimum/maximum value constraints

### 📊 Inventory Management
- Real-time stock status display
- Visual indicators for out-of-stock items
- Total inventory value calculations

### 🔄 User Feedback
- Success/error message notifications
- Confirmation dialogs for destructive actions
- Visual confirmation of operations

## Common Commands

### Start Development Server
```bash
php artisan serve
```

### Run Migrations
```bash
php artisan migrate
```

### Seed Database with Sample Data
```bash
php artisan db:seed
```

### Reset Database (Caution!)
```bash
php artisan migrate:refresh
```

### Reset and Reseed (Caution!)
```bash
php artisan migrate:refresh --seed
```

## Troubleshooting

### Database not found error
- The SQLite database will be created automatically on first migration
- Respond "yes" when prompted

### Port already in use
- Change the port: `php artisan serve --port=8001`

### Validation errors
- Ensure all required fields are filled
- Price must be a valid number (e.g., 99.99)
- Quantity must be a whole number

### Empty product list
- Run the seeder: `php artisan db:seed`
- Or create new products manually

## Technologies Used

- **Laravel 12**: Modern PHP framework
- **Bootstrap 5**: Responsive CSS framework
- **SQLite**: Lightweight database
- **Blade**: Laravel templating engine
- **Eloquent ORM**: Object-relational mapping

## File Descriptions

### Controller: ProductController.php
Handles all CRUD operations:
- `index()`: List all products
- `create()`: Show create form
- `store()`: Save new product
- `show()`: Display product details
- `edit()`: Show edit form
- `update()`: Save product changes
- `destroy()`: Delete product

### Model: Product.php
- Defines fillable attributes
- Manages database interactions
- Handles data validation at model level

### Views
- **layout.blade.php**: Main layout with navigation and styling
- **index.blade.php**: Product listing page
- **create.blade.php**: New product form
- **edit.blade.php**: Product editing form
- **show.blade.php**: Product details page

### Routes: web.php
- Redirects home page to products index
- Registers all RESTful routes for ProductController

## Tips & Best Practices

1. **Always confirm before deleting** - Use the confirmation dialog
2. **Check inventory levels** - Use the stock status indicator
3. **Input validation** - System validates all inputs server-side
4. **Backup important data** - Use database export regularly
5. **Monitor stock** - Products with 0 quantity show as "Out of Stock"

## Future Enhancement Ideas

- [ ] User authentication
- [ ] Product categories
- [ ] Search and filter functionality
- [ ] Export to Excel/CSV
- [ ] Image upload for products
- [ ] Product ratings and reviews
- [ ] Inventory alerts
- [ ] Sales history tracking
- [ ] API documentation
- [ ] Unit tests

## License

This project is open source and available for educational purposes.

## Support

For issues or questions, refer to the Laravel documentation at https://laravel.com/docs

---

**Happy coding! 🚀**

*Last Updated: May 2026*
*Laravel CRUD Application v1.0*
