---

# 📘 What I Learned – Day 5: Active Link Styling in Laravel with Blade Components

Today’s lesson was all about making navigation links smarter by dynamically styling them based on the current route. Here's a breakdown of what I learned:

---

## ✅ Active Navigation Styling

* I learned how to **conditionally apply styles** to navigation links depending on whether the link matches the current page URL.
* Previously, the active class was hardcoded. Now, I can use Laravel's `request()->is()` helper to check which page the user is on and apply the correct styling.

Example:

```blade
<a href="/" class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
    Home
</a>
```

---

## 🎨 Tailwind Layout Enhancements

* I updated the `<html>` and `<body>` tags to take up full height and added a subtle background color using Tailwind CSS:

```html
<html class="h-full bg-gray-100">
<body class="h-full">
```

This ensures my layout looks modern and stretches to fill the full viewport.

---

## 🧩 Creating a Reusable Blade Component

* To clean up the Blade templates, I created a custom Blade component called `<x-navlink>`.
* I learned how to pass props like `active` and use `@props` in the component to apply conditional styling.

Component code:

```blade
@props(['active' => false])

<a {{ $attributes->merge([
    'class' => $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'
]) }}>
    {{ $slot }}
</a>
```

---

## ⚙️ How I Used the Component

Now I can use the `<x-navlink>` component like this:

```blade
<x-navlink href="/" :active="request()->is('/')">Home</x-navlink>
<x-navlink href="/about" :active="request()->is('about')">About</x-navlink>
<x-navlink href="/contact" :active="request()->is('contact')">Contact</x-navlink>
```

I also learned the importance of prefixing the `active` prop with `:` to evaluate it as a **boolean** expression in Blade.

---

## 💡 Bonus Lesson: Extending the Component

For homework, I extended the NavLink component by adding a `type` prop that lets me switch between rendering an `<a>` tag or a `<button>`:

```blade
@props(['active' => false, 'type' => 'a'])

@if ($type === 'button')
    <button {{ $attributes->merge([
        'class' => $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'
    ]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge([
        'class' => $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'
    ]) }}>
        {{ $slot }}
    </a>
@endif
```

Now I can use either tag like this:

```blade
<x-navlink href="/" :active="true" type="a">Home</x-navlink>
<x-navlink type="button">Click Me</x-navlink>
```

---

## 🔚 Summary

* I now understand how to style links based on the active route using Laravel's `request()` helper.
* I improved my Blade templating skills by creating a dynamic, reusable `NavLink` component.
* I practiced merging HTML attributes and using conditional rendering in Blade components.

I'm excited to build even cleaner UIs in Laravel going forward!

---
