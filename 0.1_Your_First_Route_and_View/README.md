# Day 2 – Laravel Routing Basics 🚦

In this step of the course, I learned the foundational concept of **routing** in Laravel.

## ✅ What I Learned

- How to define routes in `routes/web.php` using `Route::get()`.
- Each route responds to an HTTP request (like a GET request).
- How to return:
  - Simple strings
  - Arrays (automatically converted to JSON)
  - Views using the `view()` helper
- Where to locate and edit views (`resources/views`)
- How to create new pages (e.g., `about`, `contact`) by:
  - Defining new routes
  - Creating corresponding Blade/PHP view files

## 📂 Project Structure Highlights

- `routes/web.php` – Route definitions
- `resources/views/` – Contains `welcome.blade.php` and other view templates

## 🧪 Example Routes

```php
// Home route
Route::get('/', function () {
    return view('welcome'); // or return 'hello, world';
});

// About route
Route::get('/about', function () {
    return view('about'); // or return 'about page';
});

// JSON response route
Route::get('/foo', function () {
    return ['foo' => 'bar'];
});
