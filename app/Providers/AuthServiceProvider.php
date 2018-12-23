<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->define('isAdmin', function($user){
            return $user->role == 'admin';
        });

        $gate->define('isPenjual', function($user){
            return $user->role == 'penjual';
        });
        $gate->define('isPembeli', function($user){
            return $user->role == 'pembeli';
        });
        $gate->define('isDokter', function($user){
            return $user->role == 'Dokter';
        });
    }
}
