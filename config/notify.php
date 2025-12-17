<?php

declare(strict_types=1);

use Mckenziearts\Notify\Enums\NotificationModel;
use Mckenziearts\Notify\Enums\NotificationType;

return [

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
            'duration' => 3000,
        ],
        'error' => [
            'type' => NotificationType::Error,
            'model' => NotificationModel::Toast,
            'title' => 'Error',
            'message' => 'An error occurred.',
            'duration' => 5000,
        ],
    ],

];
