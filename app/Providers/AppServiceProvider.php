<?php

namespace App\Providers;

use App\Models\ArticleModel;
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
            $latestArticles = ArticleModel::orderBy('created_at', 'desc')->take(3)->get();
            $favoritePsychologists = PsikologModel::withCount('psikologFavorits')
                ->orderBy('psikolog_favorits_count', 'desc')
                ->take(3)
                ->get();

            $view->with([
                'allPsikolog' => $allPsikolog,
                'allMahasiswa' => $allMahasiswa,
                'siteIdentity' => $siteIdentity,
                'latestArticles' => $latestArticles,
                'favoritePsychologists' => $favoritePsychologists,
            ]);
        });
        Schema::defaultStringLength(191);
    }
}
