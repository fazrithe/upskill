<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu',
                ],
                    'title' => 'Dashboard'
            ],
            'file-manager' => [
                'icon' => 'hard-drive',
                'route_name' => 'files',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'File Manager'
            ],
            'tryout-manager' => [
                'icon' => 'file-text',
                'route_name' => 'tryouts',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Tryout Manager'
            ],
            'tryout' => [
                'icon' => 'file-text',
                'route_name' => 'tryouts.lists',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Tryout'
            ],
            'devider',
            'data-master' => [
                'icon' => 'file-text',
                'title' => 'Master Data',
                'sub_menu' => [
                    'users-layout-1' => [
                        'icon' => '',
                        'route_name' => 'users',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Users'
                    ],
                    'users-layout-2' => [
                        'icon' => '',
                        'route_name' => 'roles',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Roles'
                    ],
                ]
            ],
            'profile' => [
                'icon' => 'trello',
                'title' => 'Profile',
                'sub_menu' => [
                    'profile-overview-1' => [
                        'icon' => '',
                        'route_name' => 'profile-overview-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Overview 1'
                    ],
                    'profile-overview-2' => [
                        'icon' => '',
                        'route_name' => 'profile-overview-2',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Overview 2'
                    ],
                    'profile-overview-3' => [
                        'icon' => '',
                        'route_name' => 'profile-overview-3',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Overview 3'
                    ]
                ]
            ],
            'devider',

        ];
    }
}
