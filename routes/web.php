<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emailController;

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

Route::get('/', [emailController::class, 'index'])->name('index');

Route::get('/send_email', [emailController::class, 'send_email'])->name('send_email');
Route::get('/send_email_submit', [emailController::class, 'send_email_submit'])->name('send_email_submit');

Route::get('/campaigns', [emailController::class, 'campaigns'])->name('campaigns');
Route::get('/campaigns_create', [emailController::class, 'campaigns_create'])->name('campaigns_create');
Route::get('/campaigns_submit', [emailController::class, 'campaigns_submit'])->name('campaigns_submit');

Route::get('/audience', [emailController::class, 'audience'])->name('audience');
Route::get('/audience_add', [emailController::class, 'audience_add'])->name('audience_add');
Route::get('/audience_add_submit', [emailController::class, 'audience_add_submit'])->name('audience_add_submit');
Route::get('/audience_import', [emailController::class, 'audience_import'])->name('audience_import');
Route::get('/audience_import_submit', [emailController::class, 'audience_import_submit'])->name('audience_import_submit');
Route::get('/audience_delete/{id}/{first_name}', [emailController::class, 'audience_delete'])->name('audience_delete');
Route::get('/audience_delete_submit/{id}', [emailController::class, 'audience_delete_submit'])->name('audience_delete_submit');


Route::get('/designs', [emailController::class, 'designs'])->name('designs');
Route::get('/designs_create', [emailController::class, 'designs_create'])->name('designs_create');
Route::get('/designs_submit', [emailController::class, 'designs_submit'])->name('designs_submit');

Route::get('/email_report', [emailController::class, 'email_report'])->name('email_report');

//Route::get('/send', [emailController::class, 'send'])->name('send');

?>
