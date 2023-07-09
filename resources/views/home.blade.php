@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session())
                    <!-- Vérifie si une session existe -->
                    @if (session()->get('_previous') && str_contains(session()->get('_previous')['url'], 'login'))
                        <!-- Vérifie si la session précédente contient une clé "_previous" et si l'URL de la session précédente contient le mot "login" -->
                        <p class="w-75 mx-auto text-center alert alert-success">Vous êtes connecté</p>
                        <!-- Affiche un paragraphe avec une classe de style pour afficher le message de succès -->
                    @endif
                @endif

                </div>
            </div>
        </div>
    </div>
@endsection
