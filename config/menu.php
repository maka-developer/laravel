<?php

return [
    'home'=>[
        'name'=>'首页',
        'url'=>'admin',
        'fa'=>'fa fa-home',
        'list'=>[]
    ],
    'user'=>[
        'name'=>'用户管理',
        'url'=>'',
        'fa'=>'fa fa-users',
        'list'=>[
            'user_list'=>[
                'name'=>'用户列表',
                'url'=>'',
            ],
            'user_add'=>[
                'name'=>'添加用户',
                'url'=>''
            ],
            'user_power'=>[
                'name'=>'用户权限',
                'url'=>''
            ]
        ]
    ],
    'redis'=>[
        'name'=>'Redis',
        'url'=>'/admin/redis',
        'fa'=>'fa fa-briefcase',
        'list'=>[]
    ]
];