<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Méthode utilisée pour enregistrer des services dans l'application. Ici, la méthode est vide, aucun service n'est enregistré.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);   // Méthode utilisée pour initialiser des services au démarrage de l'application. Ici, la méthode défini la longueur par défaut des chaînes de caractères utilisées dans les migrations de la base de données à 191 caractères.
    }
}
