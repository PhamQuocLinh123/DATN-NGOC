<?php
 
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NganhController;
use App\Http\Controllers\KhoaHocController;
use App\Http\Controllers\HocVienController;
use App\Http\Controllers\LopChungChiController;
use App\Http\Controllers\DangKyController;
// Route::get('/', function () {
//     return view('welcome');
// });
 
Auth::routes();
   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
   
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:usser'])->group(function () {
   
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
//     Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerPost'])->name('register');
//     Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
//     Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');
// });
 
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//     Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// });

//Route của bảng học viên 
    // Thêm học viên
// Route::get('/them-hoc-vien', [App\Http\Controllers\HocVienController::class, 'createForm']);
// Route::post('/them-hoc-vien', [App\Http\Controllers\HocVienController::class, 'store']);
// hiển thị tất cả học viên
// Route::get('/hoc-vien', [HocVienController::class, 'show'])->name('hocvien.show');
// //Hiển thị chi tiết học viên 
// Route::get('/hoc-vien/{id}', [HocVienController::class, 'viewDetails'])->name('hocvien.details');
// // Xuất PDF thông tin chi tiết 
// Route::get('/hocvien/{id}/export-pdf', [HocVienController::class, 'exportPDF'])->name('hocvien.exportPDF');
// //Xuất excel 
// Route::get('/hocvien/export-excel', [HocVienController::class, 'exportExcel'])->name('hocvien.exportExcel');

// // Hiển thị học viên cơ bản 
// Route::get('/hoc-vien-co-ban', [HocVienController::class, 'index'])->name('hoc-vien-co-ban.index');
// // Lọc ra những học viên cơ bản thi 
// Route::post('/hoc-vien-thi-co-ban', [HocVienCoBanThiController::class, 'store'])->name('hoc-vien-thi-co-ban.store');

//Nghành 
Route::get('nganh', [NganhController::class, 'index'])->name('nganh.index');
Route::get('nganh/create', [NganhController::class, 'create'])->name('nganh.create');
Route::post('nganh', [NganhController::class, 'store'])->name('nganh.store');
Route::get('nganh/{nganh}', [NganhController::class, 'show'])->name('nganh.show');
Route::get('nganh/{nganh}/edit', [NganhController::class, 'edit'])->name('nganh.edit');
Route::put('nganh/{nganh}', [NganhController::class, 'update'])->name('nganh.update');
Route::delete('nganh/{nganh}', [NganhController::class, 'destroy'])->name('nganh.destroy');
//Khóa
Route::get('/khoa_hoc', [KhoaHocController::class, 'index'])->name('khoa_hoc.index');
Route::get('/khoa_hoc/create', [KhoaHocController::class, 'create'])->name('khoa_hoc.create');
Route::post('/khoa_hoc', [KhoaHocController::class, 'store'])->name('khoa_hoc.store');
Route::get('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'show'])->name('khoa_hoc.show');
Route::get('/khoa_hoc/{khoa_hoc}/edit', [KhoaHocController::class, 'edit'])->name('khoa_hoc.edit');
Route::put('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'update'])->name('khoa_hoc.update');
Route::delete('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'destroy'])->name('khoa_hoc.destroy');
//Học viênz
Route::get('/hoc-vien', [HocVienController::class, 'index'])->name('hoc_vien.index');
Route::get('/hoc-vien/create', [HocVienController::class, 'create'])->name('hoc_vien.create');
Route::post('/hoc-vien', [HocVienController::class, 'store'])->name('hoc_vien.store');
Route::get('/hoc-vien/{hocVien}', [HocVienController::class, 'show'])->name('hoc_vien.show');
Route::get('/hoc-vien/{hocVien}/edit', [HocVienController::class, 'edit'])->name('hoc_vien.edit');
Route::put('/hoc-vien/{hocVien}', [HocVienController::class, 'update'])->name('hoc_vien.update');
Route::delete('/hoc-vien/{hocVien}', [HocVienController::class, 'destroy'])->name('hoc_vien.destroy');
Route::get('/hoc_vien/nang-cao', [HocVienController::class, 'indexNangCao'])->name('hoc_vien.index_nang_cao');
Route::get('/hoc_vien/co-ban', [HocVienController::class, 'indexCoBan'])->name('hoc_vien.index_co_ban');
Route::get('/hoc_vien/import', [HocVienController::class, 'showImportForm'])->name('hoc_vien.show_import_form');
Route::post('/hoc_vien/import', [HocVienController::class, 'import'])->name('hoc_vien.import');

// Lớp
Route::get('/lops', [LopChungChiController::class, 'index'])->name('lops.index');
Route::get('/lops/create', [LopChungChiController::class, 'create'])->name('lops.create');
Route::post('/lops', [LopChungChiController::class, 'store'])->name('lops.store');
Route::get('/lops/{id}', [LopChungChiController::class, 'show'])->name('lops.show');
Route::get('/lops/{id}/edit', [LopChungChiController::class, 'edit'])->name('lops.edit');
Route::put('/lops/{id}', [LopChungChiController::class, 'update'])->name('lops.update');
Route::delete('/lops/{id}', [LopChungChiController::class, 'destroy'])->name('lops.destroy');

// Học viên đăng kí học 1 lớp chứng chỉ 
Route::get('/dang-ky-co-ban', [DangKyController::class, 'createCoBan'])->name('dang_ky.co_ban');
Route::post('/dang-ky-co-ban', [DangKyController::class, 'store'])->name('dang_ky.co_ban.submit');

Route::get('/dang-ky-nang-cao', [DangKyController::class, 'createNangCao'])->name('dang_ky.nang_cao');
Route::post('/dang-ky-nang-cao', [DangKyController::class, 'store'])->name('dang_ky.nang_cao.submit');
//Hiển thị danh sách lớp trong hệ thống và thông tin học viên trong đó 
Route::get('dangky', [DangKyController::class, 'index'])->name('dangky.index');
Route::get('dangky/lop/{id_lop}', [DangKyController::class, 'showByLop'])->name('dangky.lop');



