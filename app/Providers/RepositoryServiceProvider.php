<?php

namespace App\Providers;

use App\Repository\AgencyRepositoryInterface;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\Eloquent\AgencyRepository;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(AgencyRepositoryInterface::class, AgencyRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
