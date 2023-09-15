<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\VerificationController;
use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AbonnementController;
use App\Http\Controllers\Api\V1\CategorieController;
use App\Http\Controllers\Api\V1\ClientController;
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
    Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.reset');
    // route to resend the email verification when the link has expired
    Route::post('resend/', [VerificationController::class, 'resend'])->name('verification.resend');
    // route to verify email after clicking on the link on email
    Route::get('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify')
        ->middleware('signed');
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResources([
    'users' => UserController::class,
    'abonnements' => AbonnementController::class,
    'categories' => CategorieController::class,
    'clients' => ClientController::class,
    'commandes' => CommandeController::class,
    'commentaires' => CommentaireController::class,
    'livreurs' => LivreurController::class,
    'livraisons' => LivraisonController::class,
    'repas' => RepasController::class,
    'reservations' => ReservationController::class,
    'restaurants' => RestaurantController::class,
    'roles' => RoleController::class,
    'thinks' => ThinksController::class,
   
]);