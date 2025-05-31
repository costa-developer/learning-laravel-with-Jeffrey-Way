---

# Day 6: Passing Data from Routes to Views & Dynamic Blade Components

Today’s lesson focused on improving our Blade component flexibility and understanding how to pass data from Laravel routes into views. Here's a breakdown of what I learned and implemented:

---

## ✅ What I Learned

### 🔹 Blade Component Flexibility

* **Updated NavLink Component** to accept a `type` prop.
* Rendered either an `<a>` or `<button>` element based on the `type` prop using `@if` Blade directives.
* Set a default value for the prop (`type="a"`) to avoid errors when no type is passed.

**Example:**

```blade
@props(['type' => 'a'])

@if ($type === 'a')
    <a {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
```

---

### 🔹 Passing Data to Views

* Learned to pass variables from `web.php` route definitions into Blade views using the `view()` helper.

**Example:**

```php
Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Larry Robot',
    ]);
});
```

* Accessed these variables in the view using `{{ $variableName }}`.

---

### 🔹 Working with Arrays and Loops

* Passed arrays (like a list of jobs) into views.
* Used `@foreach` in Blade to loop through and display the data.

**Example:**

```blade
<ul>
@foreach ($jobs as $job)
    <li>
        {{ $job['title'] }}: <strong>${{ $job['salary'] }}</strong> per year
    </li>
@endforeach
</ul>
```

---

### 🔹 Dynamic Routing with Parameters

* Created dynamic routes using route parameters like `/jobs/{id}`.
* Captured the parameter and used Laravel’s `collect()` helper with `first()` and closures to find the correct data item.

**Example:**

```php
Route::get('/jobs/{id}', function ($id) {
    $job = collect($jobs)->first(fn ($job) => $job['id'] == $id);

    if (!$job) {
        abort(404);
    }

    return view('job', ['job' => $job]);
});
```

* Built a detail view for each job and linked each job title to its respective detail page.

---

## 🔧 Skills Applied

* Component refactoring with Blade
* Default props and conditional rendering
* View data injection from routes
* Blade directives like `@if`, `@foreach`
* Working with collections and closures
* Creating dynamic pages based on URL parameters

---

## 🧠 No Homework Today!

Looking forward to Day 7!

---

