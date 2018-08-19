<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use Illuminate\Support\ServiceProvider;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Console\Commands\Log;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Console\Commands\Run;

class MtrServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Log::class,
                Run::class,
            ]);
        }

        $this->loadMigrationsFrom(database_path('migrations/mtr'));
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
