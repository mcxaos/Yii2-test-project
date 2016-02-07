<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'sign-up' => [
        'type' => 2,
    ],
    'index' => [
        'type' => 2,
    ],
    'view' => [
        'type' => 2,
    ],
    'guest' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'login',
            'logout',
            'index',
            'sign-up',
            'view',
        ],
    ],
    'USER' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'guest',
        ],
    ],
    'MODERATOR' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'USER',
        ],
    ],
    'ADMINISTRATOR' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'MODERATOR',
        ],
    ],
];
