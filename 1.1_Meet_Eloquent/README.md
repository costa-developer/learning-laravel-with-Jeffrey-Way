
---

# 📘 Meet Eloquent – Laravel Learning Notes
**Episode:** 09
**Instructor:** Jeffrey Way
**Run Time:** 18m 16s
**Topic:** Laravel Eloquent ORM

## 📌 Overview

This episode introduced **Eloquent**, Laravel's built-in **Object Relational Mapper (ORM)**. Eloquent simplifies database interaction by allowing you to work with your data using PHP objects, rather than raw SQL queries or arrays.

---

## 🧠 Key Concepts Learned

### 1. **What is Eloquent?**

* Eloquent is Laravel’s ORM.
* It maps database **table rows** to **PHP objects**, enabling object-oriented data access.

---

### 2. **Creating an Eloquent Model**

To convert a regular class into an Eloquent model:

```php
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Model logic
}
```

If your table name doesn’t match Laravel's default naming (plural snake\_case), specify it:

```php
protected $table = 'job_listings';
```

---

### 3. **Working with Routes and Eloquent**

In your routes/web.php:

```php
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();
    dd($jobs); // Dump to inspect
});
```

Access model attributes:

```php
$jobs[0]->title;
```

---

### 4. **Retrieving Records**

```php
$jobs = Job::all();           // Get all records
$job = Job::find(1);          // Find record by ID
```

---

### 5. **Creating Records with Mass Assignment**

```php
Job::create([
    'title' => 'Acme Director',
    'salary' => '1000000',
]);
```

**Important:** Define fillable attributes to protect against mass assignment:

```php
protected $fillable = ['title', 'salary'];
```

---

### 6. **Using Laravel Tinker**

Tinker is a REPL for running code interactively:

```bash
php artisan tinker
```

You can run Eloquent queries, create/update records, and experiment in real time.

---

### 7. **Generating Models and Migrations**

```bash
php artisan make:model Post -m
```

This creates:

* A `Post` model
* A migration file for defining the database schema

---

## 🧪 Homework / Practice

* Generate models and migrations.
* Run migrations and interact with records using Tinker.
* Get hands-on with creating, updating, and retrieving records via Eloquent.

---

## ✅ Summary

Eloquent allows you to write clean, expressive PHP code to interact with databases. It's an essential tool in Laravel for managing data in a modern, object-oriented way.

---

*Ready for Day 10!* 🚀

