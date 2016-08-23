<?php

namespace App\Providers;

use Acme\Wiki\Client;
use Acme\Wiki\SearchHistory;
use Acme\Wiki\SearchTermRepository;
use Acme\Wiki\WebClient;
use App\SearchTerm;
use App\StoredHistory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SearchHistory::class, StoredHistory::class);
        $this->app->bind(Client::class, WebClient::class);
    }
}
