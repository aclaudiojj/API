<?php

namespace Api\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Api\Services\CsvFileReaderService;
use Api\Contracts\FileReaderServiceContract;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileReaderServiceContract::class, CsvFileReaderService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        
    }
}
