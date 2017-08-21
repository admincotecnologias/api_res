<?php

return [

    // These CSS rules will be applied after the regular template CSS

    /*
        'css' => [
            '.button-content .button { background: red }',
        ],
    */

    'colors' => [

        'highlight' => '#004ca3',
        'button'    => '#004cad',

    ],

    'view' => [
        'senderName'  => 'templateMail',
        'reminder'    => null,
        'unsubscribe' => null,
        'address'     => null,

        'logo'        => [
            'path'   => '%PUBLIC%/vendor/beautymail/assets/images/sunny/img-brand.png',
            'width'  => '',
            'height' => '',
        ],

        'twitter'  => 'https://twitter.com/cotecnologias',
        'facebook' => 'https://www.facebook.com/cotecnologias',
        'flickr'   => null,
    ],

];
