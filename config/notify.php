<?php

declare(strict_types=1);

use Mckenziearts\Notify\Enums\NotificationType;
use Mckenziearts\Notify\Enums\NotificationModel;

return [

    /*
    |--------------------------------------------------------------------------
    | Notify Theme
    |--------------------------------------------------------------------------
    |
    | You can change the theme of notifications by specifying the desired theme.
    | Default themes available: light, dark, colorful, minimal.
    |
    */

    'theme' => env('NOTIFY_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Notification timeout
    |--------------------------------------------------------------------------
    |
    | Defines the number of seconds during which the notification will be visible.
    | You can set a default timeout or customize for each message type.
    |
    */

    'timeout' => env('NOTIFY_TIMEOUT', 5000),

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    | Available model: connect, drake, emotify, smiley, toast
    |
    */

    'preset-messages' => [
        'success' => [
            'type' => NotificationType::Success,
            'model' => NotificationModel::Toast,
            'title' => 'Success',
            'message' => 'The action has been successfully.',
        ],
        'error' => [
            'type' => NotificationType::Error,
            'model' => NotificationModel::Toast,
            'title' => 'Error',
            'message' => 'An error occurred.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sound Notifications
    |--------------------------------------------------------------------------
    |
    | Define whether to enable sound notifications for alerts.
    | This can enhance user experience by providing audible alerts.
    |
    */

    'sound' => env('NOTIFY_SOUND', true),

];
