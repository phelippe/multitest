<?php

namespace Multitest\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Multitest\Repositories\ClienteRepository',
            'Multitest\Repositories\ClienteRepositoryEloquent'
        );
        $this->app->bind(
            'Multitest\Repositories\MotoristaRepository',
            'Multitest\Repositories\MotoristaRepositoryEloquent'
        );
    }
}
