<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Product\Repositories\Eloquent\EloquentProductRepository;
use Modules\Product\Entities\Product;
use Modules\Product\Events\Handlers\RegisterProductSidebar;
use Modules\Product\Repositories\ProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterProductSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });
    }

    public function boot()
    {
        $this->publishConfig('product', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
// add bindings
        $this->app->bind(ProductRepository::class, function () {
            $repository = new EloquentProductRepository(new Product());

            if (! Config::get('app.cache')) {
                return $repository;
            }

            return new CachePageDecorator($repository);
        });
    }
}
