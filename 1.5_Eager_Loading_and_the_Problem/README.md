Here’s a professional and concise `README.md` for what you learned in Episode 13: **Eager Loading and
---

# 📘 Laravel: Eager Loading & The N+1 Problem (Day 13)

This session focused on understanding and solving the **N+1 query problem** in Laravel using **Eloquent relationships** and **eager loading** techniques.

## 🧠 What I Learned

### 🔹 Improving Job Listings UI

* Updated job listings view to use clickable cards styled with **Tailwind CSS**.
* Displayed each job’s **employer name** using the Eloquent relationship:

  ```php
  $job->employer->name
  ```

---

### 🔹 Understanding the N+1 Problem

* **N+1 Problem**: Occurs when Laravel makes one query to fetch the main records (e.g., jobs), and **one query per record** for related models (e.g., employers).
* Example: Fetching 8 jobs triggers **9 queries** — 1 for jobs, 8 for employers.

---

### 🔹 Detecting the Problem

* Use **Laravel Debugbar** to view all queries executed in a request:

  ```bash
  composer require barryvdh/laravel-debugbar --dev
  ```

  * Ensure `.env` has `APP_DEBUG=true`.

---

### 🔹 Fixing with Eager Loading

* Use `with()` to eager load relationships efficiently:

  ```php
  $jobs = Job::with('employer')->get();
  ```

  * This reduces the queries to **2**: one for jobs and one for all related employers.

---

### 🔹 Bonus: Preventing Lazy Loading

* Prevent accidental lazy loading during development:

  ```php
  use Illuminate\Database\Eloquent\Model;

  public function boot()
  {
      Model::preventLazyLoading(!app()->isProduction());
  }
  ```

  * This throws an exception on lazy-loaded relationships, helping catch performance issues early.

---

## ✅ Summary

* N+1 issues hurt performance; always check query counts in loops.
* Fix them using **eager loading** (`with()`).
* Use Laravel Debugbar to monitor and debug.
* Optionally enforce eager loading in development.

---

**Next:** Move on to Day 14 and continue mastering Laravel Eloquent.

---
