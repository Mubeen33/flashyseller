<?php

return [
    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Order@gerVendorOrders',

            /*
             * The feed will be available on this url.
             */
            'url' => '/vendor/orders-feed',

            'title' => 'My Orders',
            'description' => 'The description of the feed.',
            'language' => 'en-US',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed.orders',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],
    ],
];
