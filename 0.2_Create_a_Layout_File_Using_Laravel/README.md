````markdown
# Day 3 – Laravel Layouts and Blade Components 🧩

Today’s lesson focused on building a reusable layout structure in Laravel using **Blade components**. The goal was to create a simple and maintainable three-page layout: Home, About, and Contact.

---

## ✅ What I Did

### 1. **Created Three Routes**
Defined in `routes/web.php`:

```php
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
````

---

### 2. **Renamed and Created Blade Views**

Renamed `welcome.blade.php` to `home.blade.php` for clarity and created `about.blade.php` and `contact.blade.php` inside `resources/views`.

Each view contained:

```blade
<x-layout>
  <h1>Hello from the [page name] page</h1>
</x-layout>
```

---

### 3. **Built a Layout Component**

Created a shared layout component at:

```
resources/views/components/layout.blade.php
```

With structure like:

```blade
<!DOCTYPE html>
<html>
<head>
    <title>My Laravel App</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>
```

✅ The `{{ $slot }}` directive tells Blade where to insert page-specific content.

---

## 💡 Why This Matters

* Promotes DRY (Don't Repeat Yourself) principles.
* Centralizes layout and navigation.
* Makes your views cleaner and easier to maintain.

---

## 📚 Homework

> Create a custom `<x-nav-link>` Blade component for each navigation link.

Steps:

1. Create a new file:
   `resources/views/components/nav-link.blade.php`
2. Move the anchor (`<a>`) tag into it.
3. Use Blade slot syntax to make the label dynamic:

   ```blade
   <a href="{{ $attributes['href'] }}">{{ $slot }}</a>
   ```
4. Use it in `layout.blade.php` like:

   ```blade
   <x-nav-link href="/">Home</x-nav-link>
   ```

---

## 🏁 Summary

* ✅ Built 3 working pages: Home, About, Contact
* ✅ Added navigation and centralized it
* ✅ Implemented a layout using Blade components
* ✅ Prepared to extract smaller components (like nav links)

This forms the foundation of scalable Laravel applications. On to Day 4! 🚀

```

---
