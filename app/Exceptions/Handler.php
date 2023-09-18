<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $e)
    {
        if($e instanceof AuthorizationException){
            return to_route('admin.statistique');
        }
        return parent::render($request, $e);
    }

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });

        $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
            if(Auth::user()->hasAnyPermission([
                'Gestion des Rôles',
                'Gestion des Services',
                'Gestion des Fonctions',
                'Gestion des Divisions',
                'Gestion des Documents',
                'Gestion des Directions',
                'Gestion des Catégories',
                'Gestion des Classements',
                'Gestion des Utilisateurs',
                'Gestion des Boîtes Archives',
                'Gestion des Rayons Rangements',
                'Gestion des Chemises Dossiers',
                'Gestion des Demandes de Prêts',
                'Gestion des Natures de Documents',
                'Gestion des Demandes de Transferts',
                'Gestion des Demandes de Transferts du MISP'
            ])){
                return to_route('admin.statistique');
            }
            else{
                return to_route('home');
            }
        });
    }
}
