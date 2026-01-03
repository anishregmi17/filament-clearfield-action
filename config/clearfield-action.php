<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Icon
    |--------------------------------------------------------------------------
    |
    | The icon to display for the clear field action button.
    | You can use any Heroicon or custom icon.
    |
    */
    'icon' => 'heroicon-o-arrow-path',

    /*
    |--------------------------------------------------------------------------
    | Color
    |--------------------------------------------------------------------------
    |
    | The color scheme for the clear field action button.
    | Available options: primary, secondary, success, warning, danger, gray
    |
    */
    'color' => 'gray',

    /*
    |--------------------------------------------------------------------------
    | Label
    |--------------------------------------------------------------------------
    |
    | The label text for the action button. If null, the button will be
    | icon-only with a tooltip.
    |
    */
    'label' => null,

    /*
    |--------------------------------------------------------------------------
    | Tooltip
    |--------------------------------------------------------------------------
    |
    | The tooltip text shown when hovering over the action button.
    |
    */
    'tooltip' => 'Clear all form fields',

    /*
    |--------------------------------------------------------------------------
    | Requires Confirmation
    |--------------------------------------------------------------------------
    |
    | Whether to show a confirmation dialog before clearing the form fields.
    |
    */
    'requires_confirmation' => false,

    /*
    |--------------------------------------------------------------------------
    | Confirmation Title
    |--------------------------------------------------------------------------
    |
    | The title of the confirmation dialog.
    |
    */
    'confirmation_title' => 'Clear Form Fields?',

    /*
    |--------------------------------------------------------------------------
    | Confirmation Description
    |--------------------------------------------------------------------------
    |
    | The description text in the confirmation dialog.
    |
    */
    'confirmation_description' => 'Are you sure you want to clear all form fields? This action cannot be undone.',

    /*
    |--------------------------------------------------------------------------
    | Show Notification
    |--------------------------------------------------------------------------
    |
    | Whether to show a success notification after clearing the form fields.
    |
    */
    'show_notification' => true,

    /*
    |--------------------------------------------------------------------------
    | Notification Title
    |--------------------------------------------------------------------------
    |
    | The title of the success notification.
    |
    */
    'notification_title' => 'Form Cleared',

    /*
    |--------------------------------------------------------------------------
    | Notification Body
    |--------------------------------------------------------------------------
    |
    | The body text of the success notification.
    |
    */
    'notification_body' => 'All form fields have been cleared successfully.',
];
