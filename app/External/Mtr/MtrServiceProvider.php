<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use Illuminate\Support\ServiceProvider;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Console\Commands\MyTraceRoute;

class MtrServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MyTraceRoute::class,
            ]);
        }
    }

    public function register()
    {
        $this->app
            ->bind(Runner::class, function () {
                return new Runner($this->app->make(ReportHydrator::class), config('mtr')['executable']);
            })
        ;
    }
}
