<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\VerificationController;
use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AbonnementController;
use App\Http\Controllers\Api\V1\CommandeController;
use App\Http\Controllers\Api\V1\CommentaireController;
use App\Http\Controllers\Api\V1\LivraisonController;
use App\Http\Controllers\Api\V1\LivreurController;
use App\Http\Controllers\Api\V1\RepasController;
use App\Http\Controllers\Api\V1\ReservationController;
use App\Http\Controllers\Api\V1\RestaurantController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\ThinksController;


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

Route::get('/abonnements', [AbonnementController::class, 'index']);
Route::get('/abonnements/{id}', [AbonnementController::class, 'show']);
Route::post('/abonnements', [AbonnementController::class, 'store']);
Route::put('/abonnements/{id}', [AbonnementController::class, 'update']);
Route::delete('/abonnements/{id}', [AbonnementController::class, 'delete']);
Route::get('/commandes', [CommandeController::class, 'index']);
Route::get('/commandes/{id}', [CommandeController::class, 'show']);
Route::post('/commandes', [CommandeController::class, 'store']);
Route::put('/commandes/{id}', [CommandeController::class, 'update']);
Route::delete('/commandes/{id}', [CommandeController::class, 'delete']);
Route::get('/commentaires', [CommentaireController::class, 'index']);
Route::get('/commentaires/{id}', [CommentaireController::class, 'show']);
Route::post('/commentaires', [CommentaireController::class, 'store']);
Route::put('/commentaires/{id}', [CommentaireController::class, 'update']);
Route::delete('/commentaires/{id}', [CommentaireController::class, 'delete']);
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::post('/roles', [RoleController::class, 'store']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'delete']);
Route::get('/thinks', [ThinksController::class, 'index']);
Route::get('/thinks/{id}', [ThinksController::class, 'show']);
Route::post('/thinks', [ThinksController::class, 'store']);
Route::put('/thinks/{id}', [ThinksController::class, 'update']);
Route::delete('/thinks/{id}', [ThinksController::class, 'delete']);
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservations/{id}', [ReservationController::class, 'show']);
Route::post('/reservations', [ReservationController::class, 'store']);
Route::put('/reservations/{id}', [ReservationController::class, 'update']);
Route::delete('/reservations/{id}', [ReservationController::class, 'delete']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::get('/livraisons', [LivraisonController::class, 'index']);
Route::get('/livraisons/{id}', [LivraisonController::class, 'show']);
Route::post('/livraisons', [LivraisonController::class, 'store']);
Route::put('/livraisons/{id}', [LivraisonController::class, 'update']);
Route::delete('/livraisons/{id}', [LivraisonController::class, 'delete']);
Route::get('/repas', [RepasController::class, 'index']);
Route::get('/repas/{id}', [RepasController::class, 'show']);
Route::get('/livreurs', [LivreurController::class, 'index']);
Route::get('/livreurs/{id}', [LivreurController::class, 'show']);
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);


Route::middleware(['auth:sanctum', 'json-response'])->group(function () {
    Route::get("logout", [AuthController::class, 'logout']);

    Route::post('/livreurs', [LivreurController::class, 'store']);
    Route::put('/livreurs/{id}', [LivreurController::class, 'update']);
    Route::delete('/livreurs/{id}', [LivreurController::class, 'delete']);
    Route::post('/restaurants', [RestaurantController::class, 'store']);
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update']);
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'delete']);
    Route::post('/repas', [RepasController::class, 'store']);
    Route::put('/repas/{id}', [RepasController::class, 'update']);
    Route::delete('/repas/{id}', [RepasController::class, 'delete']);
});
