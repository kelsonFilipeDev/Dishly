<?php

    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;
    use Illuminate\Foundation\Application;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\Admin\AdminRegisterController;
    use App\Http\Controllers\Admin\AdminLoginController;
    use App\Http\Controllers\Admin\VerifySystemPasswordController;


    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    */

    // Página inicial personalizada
    Route::get('/', function () {
        return view('home');
    });

    // Alternativa para acesso via /home
    Route::get('/home', function () {
        return view('home');
    });

    // Dashboard da Inertia (protegido por autenticação e verificação de email)
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Rotas para perfil do utilizador autenticado
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Rotas de Administração
    |--------------------------------------------------------------------------
    */

    // Formulário de verificação da senha do sistema
    Route::get('/admin', [VerifySystemPasswordController::class, 'showSystemPasswordPrompt']);


    // Processamento da verificação da senha do sistema
    Route::post('/admin/verify-password', [VerifySystemPasswordController::class, 'verifySystemPassword']);

    // Rotas protegidas por CheckSystemPassword
    // Está a dar erro, corrigir assim que poder.
    // Route::middleware(['CheckSystemPassword'])->group(function () {
        // Formulário para criar novo administrador
        Route::get('/admin/create', function () {
            return Inertia::render('Admin/RegisterAdminForm');
        });

        Route::post('/admin/create', [AdminRegisterController::class, 'registerAdmin']);    

        // Página de login do admin
        Route::get('/admin/login', function () {
            return Inertia::render('Admin/LoginAdmin');
        })->name('admin.login');
        
        // Processamento do login do admin
        Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login.store');

        // Pagina de dashboard do admin
        Route::get('/admin/dashboard', function () {
            return Inertia::render('Admin/AdminDashboard');
        })->name('admin.dashboard');
    // });

    // Rotas de autenticação (breeze ou fortify)
    require __DIR__.'/auth.php';
