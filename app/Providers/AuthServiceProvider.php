<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		Gate::define('admin-only', function ($user) {
			if ($user->rol_id == 1) {
				return true;
			}
			return false;
		});

		Gate::define('operator-only', function ($user) {
			if ($user->rol_id == 2) {
				return true;
			}
			return false;
		});

		Gate::define('editor-only', function ($user) {
			if ($user->rol_id == 3) {
				return true;
			}
			return false;
		});
	}
}
