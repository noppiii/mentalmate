<?php

namespace App\Providers;

use App\Models\MahasiswaModel;
use App\Models\PsikologModel;
use App\Models\SiteIdentity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $allPsikolog = PsikologModel::all();
            $allMahasiswa = MahasiswaModel::all();
            $siteIdentity = SiteIdentity::first();

            $view->with([
                'allPsikolog' => $allPsikolog,
                'allMahasiswa' => $allMahasiswa,
                'siteIdentity' => $siteIdentity
            ]);
        });
        Schema::defaultStringLength(191);
    }
}
