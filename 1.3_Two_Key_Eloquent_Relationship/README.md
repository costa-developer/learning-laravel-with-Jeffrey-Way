
---

# What I Learned – Eloquent Relationships in Laravel (Episode 11)

In Day 11 of the Laravel course, I explored two essential Eloquent relationship types: `belongsTo` and `hasMany`. These relationships are foundational for connecting models in Laravel and making database interactions more expressive.

---

## 🔑 Key Takeaways

### 1. **Defining Relationships Between Models**

* I learned that just having a foreign key in the database isn't enough—Laravel needs to understand the relationship in code.
* In the `Job` model, I defined a method to tell Laravel that a job **belongs to** an employer:

```php
public function employer()
{
    return $this->belongsTo(Employer::class);
}
```

---

### 2. **Understanding `belongsTo` and `hasMany`**

* `belongsTo`: A child model (like Job) points to a parent model (Employer).
* `hasMany`: A parent model (like Employer) can have many child models (Jobs).

Example in the `Employer` model:

```php
public function jobs()
{
    return $this->hasMany(Job::class);
}
```

---

### 3. **Accessing Relationships**

* I can access related models **as properties**, not as methods.

```php
$job = App\Models\Job::first();
$employer = $job->employer; // Lazy loads the employer
```

* Laravel uses **lazy loading** — it fetches related data only when I access it.

---

### 4. **Working with Collections**

* When using `hasMany`, the result is a Laravel Collection, which acts like an array but offers extra methods for filtering, sorting, etc.

```php
$employer = App\Models\Employer::first();
$jobs = $employer->jobs; // Returns a collection of Job models
```

---

## 💻 Practice & Homework

To strengthen my understanding, I will:

* Create my own relationships using examples like:

  * `User` hasMany `Posts`
  * `Post` belongsTo `User`
  * `Post` hasMany `Comments`
* Use `php artisan tinker` to experiment with accessing relationships in the console.

---

## 💡 Reflection

This lesson made it clear how Eloquent relationships mirror real-world logic in code. By properly defining `belongsTo` and `hasMany`, I can write cleaner, more readable queries and let Laravel handle the heavy lifting.

---

Looking forward to learning more advanced relationships in the upcoming lessons, like `belongsToMany` and polymorphic relations.

---
