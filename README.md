# Clear Field Action for Filament

A Filament action that allows users to quickly reset all form fields with customizable confirmation dialogs and notifications.

![clearaction](https://github.com/user-attachments/assets/76d04117-c6b4-474a-87d6-b79e20f5e179)

## Features

- One-click form field clearing
- Customizable icons and colors
- Optional confirmation dialog
- Success notifications
- Works with Create and Edit pages
- Customizable callbacks (before/after reset)
- **Compatible with Filament v4**

## Requirements

- PHP 8.1+
- Filament 4.0+
- Laravel 10+

## Installation

You can install the package via Composer:

```bash
composer require anish/clearfield-action
```

## Usage

### Basic Usage

Add `ClearFieldAction` to your resource page's create record or edit record header actions:

```php
<?php

namespace App\Filament\Resources\Users\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Users\UserResource;
use Anish\ClearFieldAction\Actions\ClearFieldAction;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ClearFieldAction::make(),
        ];
    }
}
```

### With Confirmation

```php
ClearFieldAction::make()
    ->requiresConfirmation()
    ->confirmationTitle('Clear Form Fields?')
    ->confirmationDescription('Are you sure you want to clear all form fields?')
```

### Custom Notification

```php
ClearFieldAction::make()
    ->notificationTitle('Fields Cleared')
    ->notificationBody('All form fields have been reset successfully.')
```

### With Callbacks

```php
ClearFieldAction::make()
    ->beforeReset(function ($livewire) {
        // Execute before clearing fields
        Log::info('Clearing form fields');
    })
    ->afterReset(function ($livewire) {
        // Execute after clearing fields
        Log::info('Form fields cleared');
    })
```

### Hide Notification

```php
ClearFieldAction::make()
    ->showNotification(false)
```

### Custom Icon and Color

```php
ClearFieldAction::make()
    ->icon('heroicon-o-x-mark')
    ->color('danger')
    ->label('Clear All')
```

## Configuration

Publish the config file to customize default settings:

```bash
php artisan vendor:publish --tag=clearfield-action-config
```

Available configuration options:

- `icon` - Default icon for the action
- `color` - Default color scheme
- `label` - Default label text
- `tooltip` - Default tooltip text
- `requires_confirmation` - Whether to show confirmation by default
- `confirmation_title` - Default confirmation dialog title
- `confirmation_description` - Default confirmation dialog description
- `show_notification` - Whether to show notification by default
- `notification_title` - Default notification title
- `notification_body` - Default notification body

## Available Methods

- `requiresConfirmation(bool|Closure $condition)` - Enable/disable confirmation dialog
- `confirmationTitle(string|Closure|null $title)` - Set confirmation dialog title
- `confirmationDescription(string|Closure|null $description)` - Set confirmation dialog description
- `beforeReset(Closure $callback)` - Callback executed before clearing fields
- `afterReset(Closure $callback)` - Callback executed after clearing fields
- `showNotification(bool|Closure $show)` - Show/hide success notification
- `notificationTitle(string|Closure|null $title)` - Set notification title
- `notificationBody(string|Closure|null $body)` - Set notification body
- `icon(string $icon)` - Set action icon
- `color(string $color)` - Set action color
- `label(string|null $label)` - Set action label
- `tooltip(string $tooltip)` - Set action tooltip

## Compatibility

This package supports:

- Filament v4.0+

## License

MIT

## Author

anishregmi17
