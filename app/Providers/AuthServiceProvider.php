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
        //配置passport路由
Passport::routes();
//指定token的有效期是2个小时
Passport::tokensExpireIn(Carbon::now()->addHour(2));
//指定refreshtoken的有效期是30天
Passport::refreshTokensExpireIn(Carbon::now()->addDay(30));

        //
    }
}
