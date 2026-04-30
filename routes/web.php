<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\PageContentController as AdminPageContentController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/team/{team}', [TeamController::class, 'show'])->name('team.show');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Articles
        Route::resource('articles', AdminArticleController::class);
        
        // Services
        Route::resource('services', AdminServiceController::class);
        
        // Teams
        Route::resource('teams', AdminTeamController::class);
        
        // Testimonials
        Route::resource('testimonials', AdminTestimonialController::class);
        
        // Contacts
        Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
        Route::post('contacts/{contact}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contacts.markRead');
        Route::get('contacts/unread', [AdminContactController::class, 'unread'])->name('contacts.unread');
        
        // Page Contents
        Route::get('page-contents', [AdminPageContentController::class, 'index'])->name('page-contents.index');
        Route::get('page-contents/create', [AdminPageContentController::class, 'create'])->name('page-contents.create');
        Route::post('page-contents', [AdminPageContentController::class, 'store'])->name('page-contents.store');
        // update-multiple MUST be before {pageContent} wildcard routes
        Route::post('page-contents/update-multiple', [AdminPageContentController::class, 'updateMultiple'])->name('page-contents.updateMultiple');
        Route::get('page-contents/{pageContent}/edit', [AdminPageContentController::class, 'edit'])->name('page-contents.edit');
        Route::put('page-contents/{pageContent}', [AdminPageContentController::class, 'update'])->name('page-contents.update');
        Route::delete('page-contents/{pageContent}', [AdminPageContentController::class, 'destroy'])->name('page-contents.destroy');
    });
});
