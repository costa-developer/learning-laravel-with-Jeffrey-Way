---

# Day 7 – Refactoring with Models and MVC Concepts in Laravel

## Overview

In Day 7 of the Laravel journey, we focused on **eliminating duplicated job data**, introducing **MVC architecture**, and creating a **dedicated `Job` model** to manage and retrieve data cleanly. This day laid the foundation for structuring our application in a scalable and maintainable way using Laravel’s conventions.

---

## What I Learned

### ✅ 1. Eliminated Data Duplication in Routes

Previously, job data arrays were repeated across multiple routes. We refactored this by:

* Moving the array to a shared scope within the route file initially.
* Later encapsulating the job data in a **`Job` model** with a static `all()` method.

```php
class Job
{
    public static function all(): array
    {
        return [
            ['id' => 1, 'title' => 'Director', 'salary' => 50000],
            ['id' => 2, 'title' => 'Programmer', 'salary' => 10000],
            ['id' => 3, 'title' => 'Teacher', 'salary' => 40000],
        ];
    }
}
```

---

### ✅ 2. Followed MVC Architecture

**MVC (Model-View-Controller)** separates an application into:

* **Model**: Data & business logic (`Job` class)
* **View**: Blade templates that render HTML
* **Controller**: Logic to handle routes and requests (currently defined inline in `web.php`)

This structure improves scalability and organization.

---

### ✅ 3. Created and Organized the Model

* Created a `Job` model inside the `app/Models` directory.
* Applied **PSR-4 autoloading** and proper namespacing:

  ```php
  namespace App\Models;
  ```

---

### ✅ 4. Added Static `find()` Method to the Model

Used Laravel’s `Arr::first()` helper to add a reusable method to fetch a job by ID:

```php
use Illuminate\Support\Arr;

public static function find(int $id): ?array
{
    return Arr::first(self::all(), fn ($job) => $job['id'] === $id);
}
```

---

### ✅ 5. Gracefully Handled Missing Data

If a job wasn’t found by ID, we used Laravel’s `abort(404)` helper:

```php
$job = Job::find($id);

if (! $job) {
    abort(404);
}
```

This returns a proper 404 response and a friendly error page.

---

## Summary of Key Concepts

* 🧠 Centralized reusable data via a `Job` model.
* 📚 Learned and applied MVC architecture principles.
* 🗂️ Organized code with autoloaded models and proper namespaces.
* 🔍 Created helper methods like `find()` for model-level logic.
* 🛑 Gracefully handled invalid data with `abort(404)`.

---

## Next Steps

* Apply the same principles to other types of data (e.g., users, posts).
* Learn about Eloquent ORM for interacting with a real database.
* Explore Controllers to handle logic outside the routes file.

---