<p align="center"><img src="https://laravel.cm/images/laravel-notify.svg"></p>

<p align="center">
    <a href="https://packagist.org/packages/mckenziearts/laravel-notify"><img src="https://poser.pugx.org/mckenziearts/laravel-notify/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/mckenziearts/laravel-notify"><img src="https://poser.pugx.org/mckenziearts/laravel-notify/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/mckenziearts/laravel-notify"><img src="https://poser.pugx.org/mckenziearts/laravel-notify/license.svg" alt="License"></a>
</p>

## Introduction

Laravel Notify is a package that lets you add custom notifications to your project.
A diverse range of notification design is available.

<p align="center">
    <img src="https://i.imgur.com/mZVVn3L.png">
</p>

## Android Version

If you need Android version please try this package [Aesthetic Dialogs](https://github.com/gabriel-TheCode/AestheticDialogs). Happy Coding 👨🏾‍💻

## :film_strip: Video Tutorial 

 [<img src="https://img.youtube.com/vi/Kq5VXLex7DU/0.jpg" width="250">](https://youtu.be/Kq5VXLex7DU)
 
## Installation

You can install the package using composer

```bash
composer require mckenziearts/laravel-notify
```

You can publish the configuration file and assets by running:

```bash
php artisan vendor:publish --tag=notify-assets
php artisan vendor:publish --tag=notify-config
```

## Option 1: With Tailwind CSS & Alpinejs

If your project already uses Tailwind CSS 4.x, follow these steps to integrate Laravel Notify directly into your build process.

### Step 1: Configure Tailwind to scan package files

In your `resources/css/app.css`, add the package's Blade files to Tailwind's content sources using the `@source` directive:
```css
@import "tailwindcss";

@source "../../vendor/mckenziearts/laravel-notify/resources/views/**/*.blade.php";
```

### Step 2: Import the JavaScript

In your `resources/js/app.js`, import Alpine.js if you haven't already:
```javascript
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
```

### Step 3: Add the notification component to your layout

In your main Blade layout file (e.g., `resources/views/layouts/app.blade.php`):
```html
<!-- Add notification component before closing body tag -->
<x-notify::notify />
```

### Step 4: Build your assets

 ```bash
npm run build
# or for development
npm run dev
```

**✅ Done!** Tailwind will automatically generate CSS for all the notification styles used in the package.

## Option 2: Without Tailwind CSS

If you don't use Tailwind CSS in your project, you can use the pre-compiled CSS and JavaScript files.

### Add directives to your layout

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Notify</title>

    <!-- Add Laravel Notify CSS -->
    @notifyCss
</head>
<body>

    <!-- Add notification component -->
    <x-notify::notify />

    <!-- Add Laravel Notify JavaScript -->
    @notifyJs
</body>
</html>
```

**✅ Done!** The pre-compiled assets will be loaded from your `public/vendor/mckenziearts/laravel-notify/dist/` directory.

### Usage

Within your controllers, before you perform a redirect call the `notify` method with a title.

```php
public function store()
{
    notify()
        ->success()
        ->title('⚡️ Laravel Notify is awesome!')
        ->send();

    return back();
}
```

### Type of notifications

Laravel Notify actually display 5 types of notifications

1. `toast` notification, (The default notification for Laravel Notify)
```php
notify()
    ->success()
    ->title('Welcome to Laravel Notify ⚡️')
    ->send();
```

2. `connectify` notification, example of basic usage
```php
notify()
    ->model(NotificationModel::Connect)
    ->success()
    ->title('Connection Found')
    ->message('Success Message Here')
    ->send();
```

3. `drakify` (😎) notification, displays an alert only
```php
// For success alert
notify()
    ->model(NotificationModel::Drake)
    ->success()
    ->send();
// or
notify()
    ->model(NotificationModel::Drake)
    ->error()
    ->send(); // for error alert
```

4. `smiley` notification, displays a simple custom toast notification using the smiley (😊) emoticon
```php
notify()
    ->model(NotificationModel::Smiley)
    ->success()
    ->title('You are successfully reconnected')
    ->send();
```

5. `emotify` notification, displays a simple custom toast notification using a vector emoticon
```php
notify()
    ->model(NotificationModel::Emotify)
    ->success()
    ->title('You are awesome, your data was successfully created')
    ->send();
```

#### Preset Notifications

If you have a specific notification that is used across multiple different places in your system, you can define it
as a preset notification in your config file. This makes it easier to maintain commonly used notifications in one place.
Read how to define preset messages in the [Config](#config) section below.

As an example, to use a preset notification you have defined called 'common-notification', use the following:

```php
notify()->preset('common-notification')->send();
```

You can override any of the values that are set in the config if you need to. For example, this could be useful if you
have a common notification across, but you want to change the icon in one particular place that it's used without having
to manually write out a new notification.

To do this, simply pass in an array that has the key of the attribute that you want to override and the value you want
to override it with.

As an example, we could override the 'title' of our 'common-notification' by using the following:

```php
notify()->preset('common-notification', ['title' => 'This is the overridden title'])->send();
```

## Config

Config file are located at `config/notify.php` after publishing provider element.
Some awesome stuff. To active `dark mode` update the `theme` config, or add global variable `NOTIFY_THEME` on your .env file

```php
'theme' => env('NOTIFY_THEME', 'dark'),
```

You can define preset notifications in the config file using the following structure:

```php
use Mckenziearts\Notify\Enums\NotificationType;
use Mckenziearts\Notify\Enums\NotificationModel;

'preset-messages' => [
    'user-updated' => [
        'type'    => NotificationType::Success,
        'model'   => NotificationModel::Toast,
        'title'   => 'User Updated',
        'message' => 'The user has been updated successfully.',
    ],
    'user-deleted' => [
        'type'    => NotificationType::Success,
        'model'   => NotificationModel::Toast,
        'title'   => 'User Deleted',
        'message' => 'The user has been deleted successfully.',
    ],
],
```

The example above shows the config for two preset notifications: 'user-updated' and 'user-deleted'.

## Credits

- [Arthur Monney][link-author]
- [All Contributors][link-contributors]

[ico-version]: https://img.shields.io/packagist/v/mckenziearts/laravel-notify.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mckenziearts/laravel-notify.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mckenziearts/laravel-notify
[link-downloads]: https://packagist.org/packages/mckenziearts/laravel-notify
[link-author]: https://twitter.com/MonneyArthur
[link-contributors]: ../../contributors
