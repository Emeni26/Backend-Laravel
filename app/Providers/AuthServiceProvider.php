<?php

namespace App\Providers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
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
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
         //pour rafraichir le token chaque 15 jours
       // Passport::tokenExpireIn(Carbon::now()->addDays(15));
        //pour rafraichir le token chaque 1min
        Passport::tokensExpireIn(Carbon::now()->addMinutes(10));

        Passport::refreshtokensExpireIn(Carbon::now()->addDays(30));

        
    }
}