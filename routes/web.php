<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\StructurePositionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\CardReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Lookup tables management
        Route::resources([
            'professions' => ProfessionController::class,
            'specializations' => SpecializationController::class,
            'structure-positions' => StructurePositionController::class,
            'regions' => RegionController::class,
            'provinces' => ProvinceController::class,
            'education-levels' => EducationLevelController::class,
        ]);

        // Main features
        Route::resources([
            'members' => MemberController::class,
            'expenses' => ExpenseController::class,
            'incomes' => IncomeController::class,
            'card-reports' => CardReportController::class,
        ]);

        // API endpoints
        Route::get('/api/regions/{region}/provinces', [ProvinceController::class, 'getByRegion'])
            ->name('api.regions.provinces');
    });

    // Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/financial', [CardReportController::class, 'financialReport'])->name('financial');
        Route::get('/members', [MemberController::class, 'membersReport'])->name('members');
        
        // Export routes
        Route::get('/members/export', [MemberController::class, 'export'])->name('members.export');
        Route::get('/financial/export', [CardReportController::class, 'export'])->name('financial.export');
    });

    // API routes for dependent dropdowns
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/provinces/{region}', function (App\Models\Region $region) {
            return response()->json($region->provinces);
        })->name('provinces.by.region');
        Route::get('/provinces/{regionId}', [MemberController::class, 'getProvinces']);
    });
});

require __DIR__.'/auth.php';
