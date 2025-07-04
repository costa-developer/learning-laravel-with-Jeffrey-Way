
````markdown
# Day 12: Pivot Tables and BelongsToMany Relationships – Laravel with Jeffrey Way

## 📅 Episode Summary
In this episode, I learned how to implement **many-to-many relationships** using Eloquent in Laravel by connecting **jobs** and **tags** via a **pivot table**.

---

## 📦 What I Did

### ✅ Created the `Tag` model, migration, and factory:
```bash
php artisan make:model Tag -mf
````

### 🛠️ Defined `tags` table:

* `id`
* `name`
* Timestamps

---

### 🔁 Created Pivot Table: `job_tag`

Named using singular forms of both models (`job` and `tag`) in **alphabetical order**.

**Migration schema:**

```php
$table->foreignId('job_listing_id')->constrained()->cascadeOnDelete();
$table->foreignId('tag_id')->constrained()->cascadeOnDelete();
$table->timestamps();
```

> Note: My `jobs` table was called `job_listings`, so I used `job_listing_id` as the foreign key.

---

## 🔗 Setting Up Relationships

### In `Job` model:

```php
public function tags()
{
    return $this->belongsToMany(Tag::class, 'job_tag', 'job_listing_id', 'tag_id');
}
```

### In `Tag` model:

```php
public function jobs()
{
    return $this->belongsToMany(Job::class, 'job_tag', 'tag_id', 'job_listing_id');
}
```

> I explicitly set pivot table name and foreign key columns since my table names didn't follow Laravel’s default conventions.

---

## 🧪 Working with the Relationship

### Get tags for a job:

```php
$job = Job::find(10);
$tags = $job->tags;
```

### Get jobs for a tag:

```php
$tag = Tag::find(1);
$jobs = $tag->jobs;
```

### Attach a job to a tag:

```php
$tag->jobs()->attach($jobId);
```

### Get fresh results:

```php
$tag->jobs()->get(); // Instead of $tag->jobs
```

---

## ⚠️ Foreign Key Note

If using **SQLite**, you may need to manually enable foreign key constraints:

```sql
PRAGMA foreign_keys = ON;
```

Laravel enables this by default in most configurations.

---

## 📝 Homework Practice

Replicate the same pattern using:

* `Post` and `Tag` models
* A pivot table called `post_tag`
* Implementing `belongsToMany` on both models
* Experimenting with attaching/detaching and retrieving related data

---

## 🚀 Up Next

Move on to **Day 13** after practicing!

```