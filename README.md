
# Drupal Umami Search & Facets Setup

This project demonstrates how to set up and configure Drupal with S
## 🚀 Local Setup Instructions

##  install with composer command
composer create-project drupal/recommended-project my_site_name -->


### Configure Local Settings

- Copy `default.settings.php` to `settings.local.php`:
```bash
cp web/sites/default/default.settings.php web/sites/default/settings.local.php
```

- Edit `settings.local.php` to include local database credentials and enable error reporting.

- Ensure `settings.local.php` is included at the end of `settings.php`:
```php
if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
```

---

## 📦 Module Installation

Install necessary modules using Composer:

```bash
composer require drupal/search_api drupal/facets drupal/admin_toolbar 
vendor/bin/drush en search_api facets -y


## 🔍 Configure Search API

1. Navigate to `/admin/config/search/search-api`.
2. Create a new server using **Database** as the backend.
3. Create a new index using Content type: **Recipe**.
4. Add fields to index:
   - Title
   - Ingredients
   - Media Image
   - Recipe category
   - Tags
5. Save and index the data.

---

## 📊 Create Advanced Search View

1. Create a Page View using Search API index.
2. Format: Table
3. Add same fields: Title, Ingredients, Media Image, Recipe category, Tags
4. Add exposed filters:
   - Ingredients (Text)
   - Recipe category (Autocomplete, multiple allowed)
   - Tags (Autocomplete, multiple allowed)
5. Apply Bootstrap classes (col-12 col-md-2 col-lg-3) to form using:

   - Views template suggestions
   views-exposed-form--advanced-search.html.twig


## 🧩 Create Faceted Search View

1. Clone the previous view or create a new one using the same index.
2. Add Recipe category and Tags as facets:
   - Recipe category => Checkboxes
   - Tags => Dropdown
3. Add a Facet Summary block to display selected filters.
4. Place the facet blocks in the Sidebar via Block Layout (only for Faceted Search page).

---

## 🌐 Bootstrap Integration


In `your_theme.libraries.yml`:
  css:
    theme:
      https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css: {}
  js:
    https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js: {}
```


## 💾 Export and Commit Config

```bash
vendor/bin/drush cex -y
```

Commit all files to Git, including:
- `composer.json`, `composer.lock`
- `config/`
- `custom modules/themes` if any

---

## 🗃️ Export Database

```bash
vendor/bin/drush sql:dump --result-file=../db.sql
on project root
```


## ✅ To check both  view path is 

   /advanced-search
   /faceted-search


