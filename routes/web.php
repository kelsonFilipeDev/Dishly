<?php

    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;
    use Illuminate\Foundation\Application;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\Admin\ReportController;
    use App\Http\Controllers\Admin\AdminUserController;
    use App\Http\Controllers\Admin\AdminLoginController;
    use App\Http\Controllers\Admin\AdminRegisterController;
    use App\Http\Controllers\Admin\VerifySystemPasswordController;

    // Página inicial personalizada
    Route::get('/', function () {
        return Inertia::render('Public/Home');
    });

    Route::get('/home', function () {
        return Inertia::render('Public/Home');
    });

    // Dashboard principal
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Perfil do utilizador
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Administração
    |--------------------------------------------------------------------------
    */

    // Verificação da senha do sistema
    Route::get('/admin', [VerifySystemPasswordController::class, 'showSystemPasswordPrompt']);
    Route::post('/admin/verify-password', [VerifySystemPasswordController::class, 'verifySystemPassword']);

    // Formulário para criar novo administrador
    Route::get('/admin/create', function () {
        return Inertia::render('Admin/RegisterAdminForm');
    });
    Route::post('/admin/create', [AdminRegisterController::class, 'registerAdmin']);

    // Login do administrador
    Route::get('/admin/login', function () {
        return Inertia::render('Admin/LoginAdmin');
    })->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login.store');

    // Dashboard do administrador
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/AdminDashboard');
    })->name('admin.dashboard');

    // Rotas protegidas do admin (autenticado e verificado)
    Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
        // Utilizadores
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
        Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

        // Relatórios
        Route::get('/Reports', [ReportController::class, 'index'])->name('admin.relatorios.index');
    });
    
    Route::prefix('admin/relatorios')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/receitas-cozinheiro', fn () => Inertia::render('Admin/Reports/ReceitasPorCozinheiro'));
        Route::get('/detalhes-receita', fn () => Inertia::render('Admin/Reports/DetalhesReceita'));
        Route::get('/testes-degustacao', fn () => Inertia::render('Admin/Reports/TestesDegustacao'));
        Route::get('/receitas-periodo', fn () => Inertia::render('Admin/Reports/ReceitasPorPeriodo'));
        Route::get('/historico-cozinheiro', fn () => Inertia::render('Admin/Reports/HistoricoCozinheiro'));
        Route::get('/relatorio-completo', fn () => Inertia::render('Admin/Reports/RelatorioCompleto'));
    });

    Route::get('/admin/relatorios/receitas-cozinheiro', [ReportController::class, 'receitasPorCozinheiro'])->name('admin.relatorios.receitas_cozinheiro');
    Route::get('/admin/relatorios/receitas-cozinheiro/pdf', [ReportController::class, 'exportReceitasCozinheiroPdf'])
    ->name('admin.relatorios.receitas_cozinheiro_pdf');

        
        require __DIR__.'/auth.php';
