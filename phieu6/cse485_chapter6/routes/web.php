<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// TODO 12: Xóa Route Route::get('/', ...); mặc định. Thay vào đó, thêm 2
// Route mới:
// o Một Route cho URL / (trang chủ).
// o Một Route cho URL /about.
// o Cả hai đều trỏ đến PageController@showHomepage (chúng ta sẽ dùng
// chung 1 hàm cho PHT này).

// TODO 12: Thêm 2 route này
Route::get('/', [PageController::class, 'showHomepage']);
Route::get('/about', [PageController::class, 'showHomepage']);
