<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Acerca de Laravel

Laravel es un marco de aplicación web con una sintaxis elegante y expresiva. Creemos que el desarrollo debe ser una experiencia divertida y creativa para ser verdaderamente satisfactorio. Laravel elimina la molestia del desarrollo al facilitar las tareas comunes que se usan en muchos proyectos web, como:

- [Motor de enrutamiento simple y rápido] (https://laravel.com/docs/routing).
- [Potente contenedor de inyección de dependencias] (https://laravel.com/docs/container).
- Múltiples back-end para el almacenamiento de [sesión] (https://laravel.com/docs/session) y [caché] (https://laravel.com/docs/cache).
- Expresivo, intuitivo [base de datos ORM] (https://laravel.com/docs/eloquent).
- Agnóstico de base de datos [migraciones de esquemas] (https://laravel.com/docs/migrations).
- [Procesamiento robusto de trabajos en segundo plano] (https://laravel.com/docs/queues).
- [Transmisión de eventos en tiempo real](https://laravel.com/docs/broadcasting).

Laravel es accesible, potente y proporciona las herramientas necesarias para aplicaciones grandes y robustas.

## Requisitos técnicos

- PHP >= 7.2.5
- Apache o Nginx
- Composer
- Node Js
- Npm
- MySQL >= 5.6
- Extensión PHP BCMath
- Extensión PHP Ctype
- Extensión PHP Fileinfo
- Extensión PHP JSON
- Extensión PHP Mbstring
- Extensión PHP OpenSSL
- Extensión PHP PDO
- Extensión PHP Tokenizer
- Extensión PHP XML

## Clonar proyecto

Se debe solicitar acceso para ingresar al repositorio. <strong>Favor enviar credenciales de Github para otorgar acceso</strong>.

- git clone https://github.com/KhenoxDev/psicologia-chile.git

En caso de error al clonar el respositorio, es probable que no tengas configurado Git dentro de la máquina. Para solucionar, correr los siguientes comandos.

- git config --global user.name "Su nombre"
- git config --global user.email Su correo

## Configuración básica

Para iniciar un proyecto con Laravel + Vue, se debe considerar lo siguiente:

- Copiar el archivo .env.example y pegarlo en la raíz del proyecto.
- Renombrar el archivo previamente pegado, y colocar .env
- Dentro de este archivo, se debe configurar la base de datos.

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=basededatos
	DB_USERNAME=usuario
	DB_PASSWORD=password

- También se debe dejar APP_DEBUG en <strong>False</strong>

Una vez hecho esto, correr los siguientes comandos.

- php artisan key:generate 	=> Se generará automaticamente una key en el archivo .env, especificamente en APP_KEY.
- composer install 			=> Se instalarán todas las dependencias declaradas en <strong>composer.json</strong>
- npm install 				=> Se instalarán todas las dependencias declaradas en <strong>package.json</strong>
- npm run dev				=> Se compilará todo lo desarrollado en Vue y los declarado en webpack.mix.js
- composer dump-autoload	=> Se encargará der mapear las migraciones
- php artisan migrate		=> Se encargará de conectarse a la base de datos y crear las tablas.
- php artisan db:seed		=> Se encargará de ejecutar los Seeder con información dentro de las tablas correspondientes.

## Despliegue

En caso de utilizar Nginx, Laravel propone la siguiente configuración como punto de partida para configurar su servidor web. Lo más probable es que este archivo deba personalizarse según la configuración de su servidor. 

	server {
		listen 80;
		server_name example.com;
		root /srv/example.com/public;

		add_header X-Frame-Options "SAMEORIGIN";
		add_header X-XSS-Protection "1; mode=block";
		add_header X-Content-Type-Options "nosniff";

		index index.php;

		charset utf-8;

		location / {
			try_files $uri $uri/ /index.php?$query_string;
		}

		location = /favicon.ico { access_log off; log_not_found off; }
		location = /robots.txt  { access_log off; log_not_found off; }

		error_page 404 /index.php;

		location ~ \.php$ {
			fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
			fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
			include fastcgi_params;
		}

		location ~ /\.(?!well-known).* {
			deny all;
		}
	}

Para que Laravel detecte que la aplicación pasará a producción, se debe cambiar en el archivo .env el siguiente elemento.

- APP_ENV=local a APP_ENV=production

Una vez modificado el archivo, correr el siguiente comando para que las configuraciones se apliquen correctamente.

- php artisan config:clear

Luego de ello, procedemos con estos comandos para levantar la aplicación.

- composer install --optimize-autoloader --no-dev
- php artisan config:cache
- php artisan route:cache
- php artisan view:cache

Una vez todo se haya ejecutado correctamente, <strong>solo debe levantar su servidor de aplicaciones y estaría todo listo.</strong>

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
