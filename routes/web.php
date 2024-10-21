<?php

use App\Models\Kerjasama;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
    
});
// Route::get('/test', function () {
//     return
//         Kerjasama::selectRaw('COUNT(id_kerjasama) as total,YEAR(created_at) as tahun')->groupBy(DB::raw('YEAR(created_at)'))->get();
// });
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/tambah-kerja-sama', [KerjasamaController::class, 'tambahDataKerjasama']);
    Route::post('/tambah-kerjasama', [KerjasamaController::class, 'store']);
    Route::get('/data-kerjasama', [KerjasamaController::class, 'index']);
    Route::get('/download/{mou}', [KerjasamaController::class, 'download']);
    Route::get('/tampildatachart', [HomeController::class, 'dataChart']);
    Route::get('/data-chart-prodi', [HomeController::class, 'dataChartProdi']);
    Route::get('/data-chart-kategori', [HomeController::class, 'dataChartKategori']);
    Route::get('/edit-kerjasama/{id}', [KerjasamaController::class, 'show'])->name('edit-kerjasama');
    Route::put('/edit-kerjasama/{id}', [KerjasamaController::class, 'update'])->name('update-kerjasama');
    Route::delete('/hapus-kerjasama/{id}', [KerjasamaController::class, 'destroy'])->name('hapus-kerjasama');
    Route::get('/detail-kerjasama/{id}', [KerjasamaController::class, 'detail'])->name('detail-kerjasama');
    Route::get('/data-kerjasama', [KerjasamaController::class, 'cari'])->name('cari-kerjasama');
    Route::get('/pengajuan-kerja-sama', [PengajuanController::class, 'pengajuanKerjasama']);
    Route::post('/pengajuan-kerjasama', [PengajuanController::class, 'store']);
    Route::get('/tambah-Aktivitas',[PostController::class,'index']);
    Route::get('/create',[PostController::class,'create']);
    Route::post('post',[PostController::class,'store']);
    Route::get('show/{id}',[PostController::class,'show']);
    Route::get('edit/{id}',[PostController::class,'edit']);
    Route::post('update/{id}',[PostController::class,'update']);
    Route::get('delete/{id}',[PostController::class,'destroy']);

    // routes/web.php

    Route::get('/export-pdf/{id}', [ExportController:: class, 'exportPDF'])->name('export-pdf');

});
Route::get('/test', [HomeController::class, 'dataChartProdi']);

Route::get('/second', function () 
{
    echo("integration testing");
});


