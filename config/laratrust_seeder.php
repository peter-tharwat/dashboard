<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,
    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => false,

    'roles_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'admin-analytics' => 'r',
            'announcements' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'error-reports'=>"c,r,u,d",
            'articles' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'contacts' => 'c,r,u,d',
            'faqs' => 'c,r,u,d',
            'menu-links' => 'c,r,u,d',
            'menus' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'redirections' => 'c,r,u,d',
            'hub-files' => 'c,r,u,d',
            'settings' => 'u',
            'traffics' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'user' => [
            'profile' => 'r,u',
            'articles'=>"r",
            'faqs'=>"r",
            'announcements'=>"r",
            'notifications'=>"r",
            'contacts'=>"c"
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
