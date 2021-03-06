<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest;

use Illuminate\Support\ServiceProvider;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Console\Commands\Log;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Console\Commands\Run;

class SpeedtestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Log::class,
                Run::class,
            ]);
        }

        $this->loadMigrationsFrom(database_path('migrations/speedtest'));
    }

    public function register()
    {
        $this->app
            ->bind(Runner::class, function () {
                return new Runner(
                    $this->app->make(ReportHydrator::class),
                    config('speedtest')['executable'],
                    config('speedtest')['timeout']
                );
            })
        ;
    }
}
