    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AktaController,CutiController, DataKaryawanController,ApprovalController, PengajuanController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {


    Route::prefix('akta')->group(function () {
        Route::get('/', [AktaController::class,'index'])->name('akta.index');
        Route::get('/create', [AktaController::class,'create'])->name('akta.create');
        Route::get('/download/{id}', [AktaController::class,'download'])->name('akta.download');
        Route::post('/store', [AktaController::class,'store'])->name('akta.store');
        Route::get('/edit/{id}', [AktaController::class,'edit'])->name('akta.edit');
        Route::post('/update/{id}', [AktaController::class,'update'])->name('akta.update');
        Route::get('/delete/{id}', [AktaController::class,'destroy'])->name('akta.delete');
    });

    Route::prefix('datakaryawan')->group(function () {
        Route::get('/', [DataKaryawanController::class,'index'])->name('datakaryawan.index');
        Route::get('/create', [DataKaryawanController::class,'create'])->name('datakaryawan.create');
        Route::get('/download/{id}', [DataKaryawanController::class,'download'])->name('datakaryawan.download');
        Route::post('/store', [DataKaryawanController::class,'store'])->name('datakaryawan.store');
        Route::get('/edit/{id}', [DataKaryawanController::class,'edit'])->name('datakaryawan.edit');
        Route::post('/update/{id}', [DataKaryawanController::class,'update'])->name('datakaryawan.update');
        Route::get('/delete/{id}', [DataKaryawanController::class,'destroy'])->name('datakaryawan.delete');
    });

    Route::get('/cuti-pending', [CutiController::class,'pending'])->name('cuti.pending');
    Route::get('/cuti-approved', [CutiController::class,'approved'])->name('cuti.approved');


    Route::prefix('cuti')->group(function () {
        Route::get('/', [CutiController::class,'index'])->name('cuti.index');
        Route::get('/create', [CutiController::class,'create'])->name('cuti.create');
        Route::get('/download/{id}', [CutiController::class,'download'])->name('cuti.download');
        Route::post('/store', [CutiController::class,'store'])->name('cuti.store');
        Route::get('/edit/{id}', [CutiController::class,'edit'])->name('cuti.edit');
        Route::post('/update/{id}', [CutiController::class,'update'])->name('cuti.update');
        Route::get('/delete/{id}', [CutiController::class,'destroy'])->name('cuti.delete');
        Route::get('/approve/{id}', [CutiController::class,'approve'])->name('cuti.approve');
    });

    Route::prefix('approval')->group(function () {
        Route::get('/', [ApprovalController::class,'index'])->name('approval.index');
        Route::get('/create', [ApprovalController::class,'create'])->name('approval.create');
        Route::get('/download/{id}', [ApprovalController::class,'download'])->name('approval.download');
        Route::post('/store', [ApprovalController::class,'store'])->name('approval.store');
        Route::get('/edit/{id}', [ApprovalController::class,'edit'])->name('approval.edit');
        Route::post('/update/{id}', [ApprovalController::class,'update'])->name('approval.update');
        Route::get('/delete/{id}', [ApprovalController::class,'destroy'])->name('approval.delete');
    });


    Route::prefix('laporan')->group(function () {
        Route::get('/', [ApprovalController::class,'index'])->name('laporan.index');
        Route::get('/create', [ApprovalController::class,'create'])->name('laporan.create');
        Route::get('/download/{id}', [ApprovalController::class,'download'])->name('laporan.download');
        Route::post('/store', [ApprovalController::class,'store'])->name('laporan.store');
        Route::get('/edit/{id}', [ApprovalController::class,'edit'])->name('laporan.edit');
        Route::post('/update/{id}', [ApprovalController::class,'update'])->name('laporan.update');
        Route::get('/delete/{id}', [ApprovalController::class,'destroy'])->name('laporan.delete');
    });




});


Route::get('/pengajuan', [PengajuanController::class,'pengajuan'])->name('pengajuan');
Route::post('/pengajuan-store', [PengajuanController::class,'store'])->name('pengajuan-store');
