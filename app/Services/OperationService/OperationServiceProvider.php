<?php

namespace App\Services\OperationService;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class OperationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Binds the OperationService to the Laravel service container.
     */
    public function register(): void
    {
        $this->app->bind(OperationServiceInterface::class, function (Application $app) {
            return new OperationService();
        });
    }

    /**
     * Get the services provided by the OperationServiceProvider.
     */
    public function provides(): array
    {
        return [OperationServiceInterface::class];
    }
}
