<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Loan;
use App\Bank;
use App\Offer;
use App\Classification;
use App\Purpose;
use App\Branch;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('loan', function($value){
            return Loan::where('slug', $value)->orWhere(function($query) use ($value){
                if(is_numeric($value)){
                    $query->where('id',$value);
                }
            })->firstOrFail();
        });

        Route::bind('bank', function($value){
            return Bank::where('slug', $value)->orWhere(function($query) use ($value){
                if(is_numeric($value)){
                    $query->where('id',$value);
                }
            })->firstOrFail();
        });

        Route::bind('offer', function($value){
            return Offer::where('slug', $value)->orWhere(function($query) use ($value){
                if(is_numeric($value)){
                    $query->where('id',$value);
                }
            })->firstOrFail();
        });

        Route::bind('classification', function($value){
            return Classification::where('slug', $value)->orWhere(function($query) use ($value){
                if(is_numeric($value)){
                    $query->where('id',$value);
                }
            })->firstOrFail();
        });

        Route::bind('purpose', function($value){
            return Purpose::where('slug', $value)->orWhere(function($query) use ($value){
                if(is_numeric($value)){
                    $query->where('id',$value);
                }
            })->firstOrFail();
        });

        Route::bind('branch', function($value){
            return Branch::where('slug', $value)->orWhere(function($query) use ($value){
                if(is_numeric($value)){
                    $query->where('id',$value);
                }
            })->firstOrFail();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
