# Installation

## Step 1: Install via Composer

```bash
composer require anish/clearfield-action
```

## Step 2: Publish Configuration (Optional)

If you want to customize the default settings, publish the config file:

```bash
php artisan vendor:publish --tag=clearfield-action-config
```

## Step 3: Use in Your Resource Pages

Add the action to your Create or Edit page:

```php
use Anish\ClearFieldAction\Actions\ClearFieldAction;

protected function getHeaderActions(): array
{
    return [
        ClearFieldAction::make(),
    ];
}
```

That's it! The package is ready to use.
