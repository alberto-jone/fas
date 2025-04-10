<?php
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('category/{id}/{seoName}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/article/{id}/{seoTitle}', [ArticleController::class, 'show'])->name('article.show');

Route::middleware('guest:member')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('member.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('member.register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware('auth:member')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('member.logout');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('member.dashboard'); // Ajuste a rota do dashboard conforme necessário
});

// Mantenha a rota padrão /home se você ainda a estiver usando para outros propósitos
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
