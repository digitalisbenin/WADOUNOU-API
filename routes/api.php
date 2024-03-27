<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\VerificationController;
use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AbonnementController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ClientController;
use App\Http\Controllers\Api\V1\CommandeController;
use App\Http\Controllers\Api\V1\CommentaireController;
use App\Http\Controllers\Api\V1\LigneCommandeController;
use App\Http\Controllers\Api\V1\LivraisonController;
use App\Http\Controllers\Api\V1\LivreurController;
use App\Http\Controllers\Api\V1\RepasController;
use App\Http\Controllers\Api\V1\ReservationController;
use App\Http\Controllers\Api\V1\RestaurantController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\ThinksController;
use App\Http\Controllers\Api\V1\MediaController;
use App\Http\Controllers\Api\V1\MenuController;
use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\Api\V1\TemoinageController;
use App\Http\Resources\Client\ClientCollection;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('json-response')->prefix('auth')->group(function () {
    // route to register new user for the platform
    Route::post("/register", [AuthController::class, 'register'])->name('api.register');
    // route to log the user if he has already sign up
    Route::post("/login", [AuthController::class, 'login'])->name('api.login');
    // route to send reset link to email for password forgotten
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    // route to send reset password for password forgotten
    Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('passwords.reset');
    // route to resend the email verification when the link has expired
    Route::post('resend/', [VerificationController::class, 'resend'])->name('verification.resend');
    // route to verify email after clicking on the link on email
    Route::get('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify')
        ->middleware('signed');
});


Route::get('/temoinanges', [TemoinageController::class, 'index']);
Route::get('/temoinanges/{id}', [TemoinageController::class, 'show']);
Route::post('/temoinanges', [TemoinageController::class, 'store']);
Route::put('/temoinanges/{id}', [TemoinageController::class, 'update']);
Route::delete('/temoinanges/{id}', [TemoinageController::class, 'destroy']);
Route::get('/abonnements', [AbonnementController::class, 'index']);
Route::get('/abonnements/{id}', [AbonnementController::class, 'show']);
Route::post('/abonnements', [AbonnementController::class, 'store']);
Route::put('/abonnements/{id}', [AbonnementController::class, 'update']);
Route::delete('/abonnements/{id}', [AbonnementController::class, 'destroy']);
Route::get('/commandes', [CommandeController::class, 'index']);
Route::get('/commandes/{id}', [CommandeController::class, 'show']);
Route::post('/commandes', [CommandeController::class, 'store']);
Route::post('/commandes/{id}', [CommandeController::class, 'update']);
Route::delete('/commandes/{id}', [CommandeController::class, 'destroy']);
Route::get('/commentaires', [CommentaireController::class, 'index']);
Route::get('/commentaires/{id}', [CommentaireController::class, 'show']);
Route::post('/commentaires', [CommentaireController::class, 'store']);
Route::put('/commentaires/{id}', [CommentaireController::class, 'update']);
Route::delete('/commentaires/{id}', [CommentaireController::class, 'destroy']);
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::post('/roles', [RoleController::class, 'store']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
Route::get('/thinks', [ThinksController::class, 'index']);
Route::get('/thinks/{id}', [ThinksController::class, 'show']);
Route::post('/thinks', [ThinksController::class, 'store']);
Route::put('/thinks/{id}', [ThinksController::class, 'update']);
Route::delete('/thinks/{id}', [ThinksController::class, 'destroy']);
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservations/{id}', [ReservationController::class, 'show']);
Route::post('/reservations', [ReservationController::class, 'store']);
Route::put('/reservations/{id}', [ReservationController::class, 'update']);
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/livraisons', [LivraisonController::class, 'index']);
Route::get('/livraisons/{id}', [LivraisonController::class, 'show']);
Route::post('/livraisons', [LivraisonController::class, 'store']);
Route::put('/livraisons/{id}', [LivraisonController::class, 'update']);
Route::delete('/livraisons/{id}', [LivraisonController::class, 'destroy']);
Route::get('/repas', [RepasController::class, 'index']);
Route::get('/repas/{id}', [RepasController::class, 'show']);
Route::get('/livreurs', [LivreurController::class, 'index']);
Route::get('/livreurs/{id}', [LivreurController::class, 'show']);
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
Route::post('/medias', [MediaController::class, 'store']);
Route::get('/payments', [PaymentMethodController::class, 'index']);
Route::get('/payments/{id}', [PaymentMethodController::class, 'show']);
Route::delete('/payments/{id}', [PaymentMethodController::class, 'destroy']);
Route::post('/payments', [PaymentMethodController::class, 'store']);
Route::get('/clients',[ClientController::class, 'index']);
Route::get('/clients/{id}',[ClientController::class, 'show']);
Route::post('/clients',[ClientController::class, 'store']);
Route::put('/clients/{id}',[ClientController::class, 'update']);
Route::delete('/clients/{id}',[ClientController::class, 'destroy']);
Route::get('/menus',[MenuController::class, 'index']);
Route::get('/menus/{id}',[MenuController::class, 'show']);
Route::get('/categorys',[CategoryController::class, 'index']);
Route::get('/categorys/{id}', [CategoryController::class, 'show']);
Route::get('/lignecommandes',[LigneCommandeController::class, 'index']);
Route::post('/lignecommandes',[LigneCommandeController::class, 'store']);
Route::delete('/lignecommandes/{id}', [LigneCommandeController::class, 'destroy']);




Route::middleware(['auth:sanctum', 'json-response'])->group(function () {
    Route::get("logout", [AuthController::class, 'logout']);

    Route::post('/livreurs', [LivreurController::class, 'store']);
    Route::put('/livreurs/{id}', [LivreurController::class, 'update']);
    Route::delete('/livreurs/{id}', [LivreurController::class, 'destroy']);
    Route::post('/restaurants', [RestaurantController::class, 'store']);
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update']);
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);
    Route::post('/repas', [RepasController::class, 'store']);
    Route::put('/repas/{id}', [RepasController::class, 'update']);
    Route::delete('/repas/{id}', [RepasController::class, 'destroy']);
    Route::post('/menus', [MenuController::class, 'store']);
    Route::put('/menus/{id}', [MenuController::class, 'update']);
    Route::delete('/menus/{id}', [MenuController::class, 'destroy']);
    Route::post('/categorys',[CategoryController::class, 'store']);
    Route::put('/categorys/{id}',[CategoryController::class, 'update']);
    Route::delete('/categorys/{id}', [CategoryController::class,'destroy']);
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
   
});
