
### **README.md**  

```md
# Venue Management System API

This is a **Laravel 12** API for managing venues, featuring **user authentication, CRUD operations, validation, and API authentication using Laravel Sanctum**.

## 🚀 Features
- **Laravel 12** with the latest features.
- **User Authentication** (Register & Login with Laravel Sanctum).
- **CRUD Operations for Venues**.
- **Validation & Error Handling** (unique venue names, positive capacity values).
- **MySQL Database**.
- **Factories for Generating Fake Data via Tinker**.
- **Best Practices (MVC, Eloquent, API Structure)**.

---

## 📌 **Installation Guide**
### **1. Clone the Repository**
```sh
git clone https://github.com/habibaesam13/Venue-Management-System-API.git
cd Venue-Management-System-API
```

### **2. Install Dependencies**
```sh
composer install
npm install
```

### **3. Set Up Environment Variables**
```sh
cp .env.example .env
php artisan key:generate
```
Then, configure your `.env` file with **MySQL credentials**:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

### **4. Run Migrations**
```sh
php artisan migrate
```
This will create the necessary database tables.

---

## 📌 **Generating Fake Data with Tinker**
Since you are using **Laravel Tinker** instead of seeders, you can manually generate venues using **factories**.

### **Open Tinker**
```sh
php artisan tinker
```

### **Run the Following Command to Create Fake Venues**
```php
\App\Models\Venues::factory()->count(20)->create();
```
This will insert **20 random venues** into the database.

---

## 📌 **Run the Development Server**
```sh
php artisan serve
```
API will be available at **http://127.0.0.1:8000**

---

## 📌 **API Endpoints**
### **Authentication**
| Method | Endpoint | Description |
|--------|---------|------------|
| `POST` | `/api/register` | Register a new user |
| `POST` | `/api/login` | Login & receive a token |

### **Venues (Requires Authentication)**
| Method | Endpoint | Description |
|--------|---------|------------|
| `GET`  | `/api/venues` | List all venues |
| `POST` | `/api/venues` | Create a new venue |
| `PUT`  | `/api/venues/{id}` | Update a venue |
| `DELETE` | `/api/venues/{id}` | Delete a venue |

🔒 **Note:** Include the token in the `Authorization` header for protected routes:
```
Authorization: Bearer YOUR_ACCESS_TOKEN
```

---

## 📌 **Factories**
The project includes **factories to generate fake venues**, used with **Tinker**.

The `VenuesFactory.php` file generates:
```php
public function definition()
{
    return [
        'name' => $this->faker->unique()->company,
        'location' => $this->faker->address,
        'capacity' => $this->faker->numberBetween(50, 5000),
    ];
}
```

---

Let me know if you need any modifications! 🚀
