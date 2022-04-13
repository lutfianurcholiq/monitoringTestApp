<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Group;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // errorList::class => ErrorListPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function (User $user){
            return $user->level == 'Admin';
        });

        Gate::define('isQa', function (User $user){
            return $user->level == 'Quality Assurance' || $user->level == 'Admin' || $user->level == 'System Analyst' || $user->level == 'Technical Writing';
        });

        Gate::define('isSa', function (User $user){
            return $user->level == 'System Analyst' || $user->level == 'Admin';
        });
    }
}
