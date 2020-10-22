<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

	'title' => 'Psicología Chile',
	'title_prefix' => '',
	'title_postfix' => '',

	/*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

	'use_ico_only' => false,
	'use_full_favicon' => false,

	/*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

	'logo' => '<b>Psicología</b> Chile',
	'logo_img' => 'img/isologo.png',
	'logo_img_class' => 'brand-image img-circle elevation-3',
	'logo_img_xl' => null,
	'logo_img_xl_class' => 'brand-image-xs',
	'logo_img_alt' => 'Psicología Chile',

	/*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

	'usermenu_enabled' => true,
	'usermenu_header' => false,
	'usermenu_header_class' => 'bg-primary',
	'usermenu_image' => false,
	'usermenu_desc' => false,
	'usermenu_profile_url' => false,

	/*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

	'layout_topnav' => null,
	'layout_boxed' => null,
	'layout_fixed_sidebar' => null,
	'layout_fixed_navbar' => null,
	'layout_fixed_footer' => null,

	/*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

	'classes_auth_card' => 'card-outline card-primary',
	'classes_auth_header' => '',
	'classes_auth_body' => '',
	'classes_auth_footer' => '',
	'classes_auth_icon' => '',
	'classes_auth_btn' => 'btn-flat btn-primary',

	/*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

	'classes_body' => '',
	'classes_brand' => '',
	'classes_brand_text' => '',
	'classes_content_wrapper' => '',
	'classes_content_header' => '',
	'classes_content' => '',
	'classes_sidebar' => 'sidebar-dark-primary elevation-4',
	'classes_sidebar_nav' => '',
	'classes_topnav' => 'navbar-white navbar-light',
	'classes_topnav_nav' => 'navbar-expand',
	'classes_topnav_container' => 'container',

	/*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

	'sidebar_mini' => true,
	'sidebar_collapse' => false,
	'sidebar_collapse_auto_size' => false,
	'sidebar_collapse_remember' => false,
	'sidebar_collapse_remember_no_transition' => true,
	'sidebar_scrollbar_theme' => 'os-theme-light',
	'sidebar_scrollbar_auto_hide' => 'l',
	'sidebar_nav_accordion' => true,
	'sidebar_nav_animation_speed' => 300,

	/*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

	'right_sidebar' => false,
	'right_sidebar_icon' => 'fas fa-cogs',
	'right_sidebar_theme' => 'dark',
	'right_sidebar_slide' => true,
	'right_sidebar_push' => true,
	'right_sidebar_scrollbar_theme' => 'os-theme-light',
	'right_sidebar_scrollbar_auto_hide' => 'l',

	/*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

	'use_route_url' => false,

	'dashboard_url' => 'admin',

	'logout_url' => 'admin/salir',

	'login_url' => 'admin/inicio',

	'register_url' => 'admin/registro',

	'password_reset_url' => 'password/reset',

	'password_email_url' => 'password/email',

	'profile_url' => false,

	/*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

	'enabled_laravel_mix' => false,
	'laravel_mix_css_path' => 'css/app.css',
	'laravel_mix_js_path' => 'js/app.js',

	/*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

	'menu' => [
		// [
		// 	'text' => 'search',
		// 	'search' => true,
		// 	'topnav' => true,
		// ],
		// [
		// 	'text' => 'blog',
		// 	'url'  => 'admin/blog',
		// 	'can'  => 'manage-blog',
		// ],
		// [
		// 	'text'        => 'pages',
		// 	'url'         => 'admin/pages',
		// 	'icon'        => 'far fa-fw fa-file',
		// 	'label'       => 4,
		// 	'label_color' => 'success',
		// ],
		['header' => 'Administración'],
		[
			'text' => 'Usuarios',
			'url'  => 'admin/usuarios',
			'icon' => 'fas fa-fw fa-user',
			'can' => 'admin-only'
		],
		[
			'text' => 'Convenios',
			'url'  => 'admin/convenios',
			'icon' => 'fas fa-fw fa-handshake',
			'can' => ['admin-only', 'operator-only']
		],
		[
			'text' => 'Noticias',
			'icon' => 'far fa-fw fa-newspaper',
			'submenu' => [
				[
					'text' => 'Subir noticia',
					'url'  => 'admin/noticias/subir',
				],
				[
					'text' => 'Noticias públicadas',
					'url'  => 'admin/noticias/publicadas',
				],
				[
					'text' => 'Noticias sin publicar',
					'url'  => 'admin/noticias/sin-publicar',
				],
			],
			'can' => ['admin-only', 'operator-only', 'editor-only']
		],
		[
			'text' => 'Consultas frecuentes',
			'url'  => 'admin/consultas-frecuentes',
			'icon' => 'fas fa-fw fa-question',
			'can' => ['admin-only', 'operator-only', 'editor-only']
		],
		[
			'text'    => 'Generalidades',
			'icon'    => 'fas fa-fw fa-globe',
			'can' => ['admin-only', 'operator-only'],
			'submenu' => [
				[
					'text' => 'Logo',
					'url'  => 'admin/logo',
					'can' => ['admin-only'],
				],
				[
					'text' => 'Redes sociales',
					'url'  => 'admin/redes-sociales',
					'can' => ['admin-only', 'operator-only'],
				],
				[
					'text' => 'Métodos de pago',
					'url'  => 'admin/metodos-pago',
					'can' => ['admin-only', 'operator-only'],
				],
				[
					'text' => 'Vídeo Principal',
					'url'  => 'admin/video',
					'can' => ['admin-only', 'operator-only'],
				],
				[
					'text' => 'Banner Principal',
					'url'  => 'admin/banner',
					'can' => ['admin-only'],
				],
				[
					'text' => 'Popup Informativo',
					'url'  => 'admin/popup',
					'can' => ['admin-only', 'operator-only'],
				],
				[
					'text' => 'Nuestra empresa',
					'url'  => 'admin/nuestra-empresa',
					'can' => ['admin-only', 'operator-only'],
				],
			],
		],
		[
			'text'    => 'Documentación',
			'icon'    => 'far fa-fw fa-file-alt',
			'submenu' => [
				[
					'text' => 'Políticas de Privacidad',
					'url'  => 'admin/politicas-privacidad',
					'can' => ['admin-only'],
				],
				[
					'text' => 'Gestión de documentos',
					'url'  => 'admin/documentos',
					'can' => ['admin-only', 'operator-only'],
				],
			],
			'can' => ['admin-only', 'operator-only']
		],
		[
			'text'    => 'Formularios',
			'icon'    => 'fab fa-fw fa-wpforms',
			'submenu' => [
				[
					'text' => 'Trabaja con nosotros',
					'url'  => 'admin/trabaja-con-nosotros',
					'can' => ['admin-only', 'operator-only'],
				],
				[
					'text' => 'Voluntarios',
					'url'  => 'admin/voluntarios',
					'can' => ['admin-only', 'operator-only'],
				],
				[
					'text' => 'Newsletter',
					'url'  => 'admin/newsletter',
					'can' => ['admin-only', 'operator-only'],
				],
			],
			'can' => ['admin-only', 'operator-only']
		],
	],

	/*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

	'filters' => [
		JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
	],

	/*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

	'plugins' => [
		'Datatables' => [
			'active' => true,
			'files' => [
				[
					'type' => 'js',
					'asset' => true,
					'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
				],
				[
					'type' => 'js',
					'asset' => true,
					'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
				],
				[
					'type' => 'css',
					'asset' => true,
					'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
				],
			],
		],
		'Select2' => [
			'active' => false,
			'files' => [
				[
					'type' => 'js',
					'asset' => false,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
				],
				[
					'type' => 'css',
					'asset' => false,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
				],
			],
		],
		'Chartjs' => [
			'active' => false,
			'files' => [
				[
					'type' => 'js',
					'asset' => false,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
				],
			],
		],
		'Sweetalert2' => [
			'active' => true,
			'files' => [
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
				],
			],
		],
		'Pace' => [
			'active' => false,
			'files' => [
				[
					'type' => 'css',
					'asset' => false,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
				],
				[
					'type' => 'js',
					'asset' => false,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
				],
			],
		],
	],
];
