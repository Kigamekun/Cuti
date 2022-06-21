    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AktaController,CutiController, DataKaryawanController,ApprovalController, PengajuanController,LaporanController};
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

Route::prefix('admin')->middleware(['auth','checkrole'])->name('admin.')->group(function () {

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
        Route::get('/cetak-pdf/{id}', [CutiController::class,'cetakPdf'])->name('cuti.cetak-pdf');
        Route::post('/store', [CutiController::class,'store'])->name('cuti.store');
        Route::get('/edit/{id}', [CutiController::class,'edit'])->name('cuti.edit');
        Route::post('/update/{id}', [CutiController::class,'update'])->name('cuti.update');
        Route::get('/delete/{id}', [CutiController::class,'destroy'])->name('cuti.delete');
        Route::get('/approve/{id}', [CutiController::class,'approve'])->name('cuti.approve');
        Route::post('/decline/{id}', [CutiController::class,'decline'])->name('cuti.decline');
        Route::get('/laporan', [CutiController::class,'laporan'])->name('cuti.laporan');
    });


    Route::prefix('laporan')->group(function () {
        Route::match(['POST','GET'],'/', [LaporanController::class,'index'])->name('laporan.index');
        Route::get('/cetak-pdf/{tgl_mulai}/{tgl_akhir}', [LaporanController::class,'cetakPdf'])->name('laporan.cetak-pdf');
    });




});


Route::middleware(['auth'])->group(function () {

    Route::get('/pengajuan', [PengajuanController::class,'pengajuan'])->name('pengajuan');
    Route::get('/data-cuti', [PengajuanController::class,'dataCuti'])->name('data-cuti');
    Route::post('/pengajuan-store', [PengajuanController::class,'store'])->name('pengajuan-store');

});
