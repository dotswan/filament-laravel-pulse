<?php

declare(strict_types=1);

return [
    'components' => [
        'cache' => [
            'columnSpan' => [
                'md' => 5,
                'xl' => 5,
            ],
            'rows' => 2,
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'exceptions' => [
            'columnSpan' => [
                'md' => 7,
                'xl' => 7,
            ],
            'rows' => 2,
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'queues' => [
            'columnSpan' => [
                'md' => 7,
                'xl' => 7,
            ],
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'servers' => [
            'columnSpan' => [
                'md' => 12,
                'xl' => 12,
            ],
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'slow-out-going' => [
            'columnSpan' => 'full',
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'slow-queries' => [
            'columnSpan' => [
                'md' => 12,
                'xl' => 12,
            ],
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'slow-requests' => [
            'columnSpan' => [
                'md' => 7,
                'xl' => 7,
            ],
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'usage' => [
            'columnSpan' => [
                'md' => 5,
                'xl' => 5,
            ],
            'rows' => 2,
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],

        'slow-jobs' => [
            'columnSpan' => [
                'md' => 5,
                'xl' => 5,
            ],
            'cols' => 'full',
            'ignoreAfter' => '1 day',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],
    ],
];
