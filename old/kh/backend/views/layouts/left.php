<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../web/assets/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Meiki Eru Putra</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'MANAGEMENT', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/']],
                    ['label' => 'News Update', 'icon' => 'pencil', 'url' => ['/post'],
                        'items' => [
                            ['label' => 'All News', 'icon' => 'list', 'url' => ['/post'],],
                            ['label' => 'Add News', 'icon' => 'plus', 'url' => ['/post/create'],],
                            ['label' => 'News Categories', 'icon' => 'tags', 'url' => ['/post-category'],],
                        ],
                    ],
                    ['label' => 'Pages', 'icon' => 'files-o', 'url' => ['/pages'],
                        'items' => [
                            ['label' => 'All Pages', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Pages', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Pages Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Sharing Knowledges', 'icon' => 'share-alt-square', 'url' => ['/knowledges'],
                        'items' => [
                            ['label' => 'All Knowledges', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Knowledges', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Knowledges Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Projects', 'icon' => 'industry', 'url' => '#',
                        'items' => [
                            ['label' => 'All Projects', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Project', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Project Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                            ['label' => 'Manage Tim', 'icon' => 'users', 'url' => ['/menus'],
                                'items' => [
                                    ['label' => 'All Tim', 'icon' => 'list', 'url' => ['/menus'],],
                                    ['label' => 'Add Tim', 'icon' => 'plus', 'url' => ['/menus'],],
                                ],
                            ],
                            ['label' => 'TimeLine', 'icon' => 'hourglass-2', 'url' => ['/menus'],
                                'items' => [
                                    ['label' => 'All Timeline', 'icon' => 'list', 'url' => ['/menus'],],
                                    ['label' => 'Add Timeline', 'icon' => 'plus', 'url' => ['/menus'],],
                                ],
                            ],
                            ['label' => 'Schedules', 'icon' => 'calendar', 'url' => ['/menus'],
                                'items' => [
                                    ['label' => 'All Schedules', 'icon' => 'list', 'url' => ['/menus'],],
                                    ['label' => 'Add Schedule', 'icon' => 'plus', 'url' => ['/menus'],],
                                ],
                            ],
                            ['label' => 'Reports', 'icon' => 'file-word-o', 'url' => ['/menus'],
                                'items' => [
                                    ['label' => 'All Reports', 'icon' => 'list', 'url' => ['/menus'],],
                                    ['label' => 'Add Reports', 'icon' => 'plus', 'url' => ['/menus'],],
                                    ['label' => 'Report Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                                ],
                            ],
                            ['label' => 'Documents', 'icon' => 'folder-open', 'url' => ['/menus'],
                                'items' => [
                                    ['label' => 'All Documents', 'icon' => 'list', 'url' => ['/menus'],],
                                    ['label' => 'Add Documents', 'icon' => 'plus', 'url' => ['/menus'],],
                                    ['label' => 'Documents Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                                ],
                            ],
                        ],
                    ],
                    ['label' => 'Donation', 'icon' => 'money', 'url' => ['/users'],
                        'items' => [
                            ['label' => 'All Donations', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Donation', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Donation Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                            ['label' => 'Report', 'icon' => 'file-text', 'url' => ['/menus'],
                                'items' => [
                                    ['label' => 'All Reports', 'icon' => 'list', 'url' => ['/menus'],],
                                    ['label' => 'Create Report', 'icon' => 'plus', 'url' => ['/menus'],],
                                    ['label' => 'Reports Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                                ],
                            ],
                        ],
                    ],
                    ['label' => 'Donor', 'icon' => 'heart', 'url' => ['/users'],
                        'items' => [
                            ['label' => 'All Donor', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Donor', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Donor Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Documents', 'icon' => 'book', 'url' => ['/knowledges'],
                        'items' => [
                            ['label' => 'All Documents', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Documents', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Documents Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Inventory', 'icon' => 'archive', 'url' => ['/knowledges'],
                        'items' => [
                            ['label' => 'All Inventory', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Inventory', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Inventory Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Database', 'icon' => 'database', 'url' => ['/knowledges'],
                        'items' => [
                            ['label' => 'All Database', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Database', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Database Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Organization', 'icon' => 'institution', 'url' => ['/organizations'],
                        'items' => [
                            ['label' => 'All Organizations', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add Organization', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'Organization Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                            ['label' => 'Organization Profiles', 'icon' => 'users', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'Users', 'icon' => 'user', 'url' => ['/users'],
                        'items' => [
                            ['label' => 'All Users', 'icon' => 'list', 'url' => ['/menus'],],
                            ['label' => 'Add User', 'icon' => 'plus', 'url' => ['/menus'],],
                            ['label' => 'User Categories', 'icon' => 'tags', 'url' => ['/menus'],],
                            ['label' => 'User Profiles', 'icon' => 'users', 'url' => ['/menus'],],
                        ],
                    ],
                    ['label' => 'MailBox', 'icon' => 'comments', 'url' => ['/mailbox'],
                        'items' => [
                            ['label' => 'All Mail', 'icon' => 'list', 'url' => ['/mailbox'],],
                            ['label' => 'Compose', 'icon' => 'plus', 'url' => ['mailbox/compose'],],
                        ],
                    ],
                    ['label' => 'Timeline', 'icon' => 'hourglass-half', 'url' => ['/dashboard']],
                    ['label' => 'Analytics', 'icon' => 'line-chart', 'url' => ['/dashboard']],
                    ['label' => 'Settings', 'icon' => 'gears', 'url' => '#',
                        'items' => [
                            ['label' => 'Web Profiles', 'icon' => 'gear', 'url' => ['/web_settings'],],
                            ['label' => 'Menu Settings', 'icon' => 'tasks', 'url' => '#',
                                'items' => [
                                    ['label' => 'All Menu','icon' => 'list','url' => ['/menus/all-menus'],],
                                    ['label' => 'Create Menu','icon' => 'plus','url' => ['/menus/create_menu'],],
                                ],
                            ],
                            ['label' => 'Settings Wilayah', 'icon' => 'wrench', 'url' => '#',
                                'items' => [
                                    ['label' => 'Provinsi','icon' => 'wrench','url' => ['/provinsi'],],
                                    ['label' => 'Kabupaten','icon' => 'wrench','url' => ['/kabupaten'],],
                                    ['label' => 'Kecamatan','icon' => 'wrench','url' => ['/kecamatan'],],
                                ],
                            ],

                        ],
                    ],

                    ['label' => 'Personal Account', 'options' => ['class' => 'header']],
                    ['label' => 'My Profile Settings', 'icon' => 'user', 'url' => ['/menus'],],
                    ['label' => 'ADMIN SYSTEMS', 'options' => ['class' => 'header']],
                    ['label' => 'RBAC-Yii2-Admin', 'icon' => 'wrench', 'url' => ['/admin'],
                        'items' => [
                            ['label' => 'Assignment', 'icon' => 'check-square', 'url' => ['/admin/assignment'],],
                            ['label' => 'Roles', 'icon' => 'plus', 'url' => ['/admin/role'],],
                            ['label' => 'Permissions', 'icon' => 'plus', 'url' => ['/admin/permission'],],
                            ['label' => 'Routes', 'icon' => 'plus', 'url' => ['/admin/route'],],
                            ['label' => 'Rules', 'icon' => 'plus', 'url' => ['/admin/rule'],],
                            ['label' => 'Menus', 'icon' => 'plus', 'url' => ['/admin/menu'],],
                        ],
                    ],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'Enable' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
