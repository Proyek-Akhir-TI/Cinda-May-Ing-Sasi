<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.main', function($view)
        {
            $view->with('transaksi', DB::table('transaksi')->where('status','menunggu')->orWhere('status','cancel')->get());
            });
            View::composer('layouts.main', function($view)
            {
                $view->with('myTransaksi', DB::table('transaksi')->where('pelanggan_id',Auth::guard(session()->get('role'))->user()->id)->get());
            });
    }
}
