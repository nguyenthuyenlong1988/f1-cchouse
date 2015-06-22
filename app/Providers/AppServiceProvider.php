<?php

namespace NhaThieuNhi\Providers;

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
    $view = view();
    $view->share([
        'user_dateformat' => 'Y-m-d H:i:s',
        'user_timezone'   => 'Asia/Ho_Chi_Minh',
    ]);
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
