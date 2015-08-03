<?php

namespace NhaThieuNhi\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $sharedVars = [
            'ps' => config('params')
        ];

        view()->share($sharedVars);

        if (env('APP_DEBUG')) {
            \DB::listen(function ($sql, $bindings, $time) {
                $output = new ConsoleOutput();
                $output->writeln('');
                $output->writeln('');
                $output->writeln('=====>>>>>>>>>>');
                $output->writeln("<info>Query:</info> $sql");
                $output->writeln('<info>Bindings:</info> ' . print_r($bindings, TRUE));
                $output->writeln("<info>Time:</info> $time");
                $output->writeln('');
                $output->writeln('');
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
