<?php



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

use App\Http\Controllers\InputController;
use App\Http\Controllers\InputDetailController;
use App\Http\Controllers\InputDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;





Route::get('/', [LoginController::class, 'login']);
Route::post('/dang-nhap', [LoginController::class, 'loginUser'])->name('dang-nhap');
Route::get('/dang-ki', [LoginController::class, 'register'])->middleware('alreadyLoggedIn');
// Route::get('/dang-ki', [LoginController::class, 'register']);
Route::post('/register-user', [LoginController::class, 'registerUser'])->name('register-user');

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();

    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
Route::middleware(['isLoggedIn'])->group(function () {

    Route::get('/homepage', function () { // Trang chu
        return view('index');
    });
    // Danh sach san pham
    Route::resource('/products', ProductController::class);
    Route::get('/productsExport', [ProductController::class, 'export'])->name('productsExport');
    //Danh sach nha cung cap
    Route::resource('/suppliers', SupplierController::class);
    Route::get('/suppliersExport', [SupplierController::class, 'export'])->name('suppliersExport');
    //Danh sach phieu nhap hang
    Route::resource('/phieu-nhap-hang', InputController::class);
    Route::any('/phieu-nhap-hang/search', [InputController::class, 'search'])->name('search');
    //Chi tiet phieu nhap hang
    Route::post('/phieu-nhap-hang/{ip_id}/create', [InputController::class, 'storeInputDetail']);
    Route::delete('/phieu-nhap-hang/{ip_id}/{dt_id}/delete', [InputController::class, 'destroyInputDetail']);

    //Xuat excel
    Route::get('/salereport', [ReportController::class, 'showrpsales']);
    Route::get('/rp_inventory', [ReportController::class, 'showrpinventory']);
    Route::get('/saleReportExport', [ReportController::class, 'export'])->name('saleReportExport');
});
