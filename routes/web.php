<?php

use App\Http\Livewire\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Staff\StaffIndex;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\TokenIndex;
use App\Http\Livewire\Staff\CreateStaff;
use App\Http\Livewire\Course\CourseIndex;
use App\Http\Livewire\Office\OfficeIndex;
use App\Http\Livewire\Students\Registration;
use App\Http\Livewire\Students\StudentIndex;
use App\Http\Livewire\Position\PositionIndex;
use App\Http\Livewire\Department\DepartmentIndex;
use App\Http\Livewire\Students\ChangePassword;
use App\Http\Livewire\Tenureship\TenureshipIndex;

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

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', function(){
        return view('students.dashboard');
    })->name('dashboard');

    Route::get('/change-password', ChangePassword::class)->name('change.password');

    Route::middleware(['role:superadmin'])->group(function(){
        Route::get('/admin/dashboard', TokenIndex::class)->name('admin.dashboard');

        Route::get('/create_client', [AuthController::class, 'createClient']);
        Route::get('/edit_client/{clientId}', [AuthController::class, 'editClient']);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

    });

    Route::middleware(['role:superadmin|admin'])->group(function(){

        Route::get('/departments', DepartmentIndex::class)->name('departments');
        Route::get('/courses', CourseIndex::class)->name('courses');
        Route::get('/offices', OfficeIndex::class)->name('offices');
        Route::get('/position', PositionIndex::class)->name('position');
        Route::get('/tenureship', TenureshipIndex::class)->name('tenureship');

        Route::get('/registration-student', Registration::class)->name('student.registration');
        Route::get('/edit-student/{studentId}', Registration::class)->name('student.edit');
        Route::get('/list-students', StudentIndex::class)->name('students.lists');

        Route::get('/create-staff', CreateStaff::class)->name('staff.create');
        Route::get('/edit-staff/{staffId}', CreateStaff::class)->name('staff.edit');
        Route::get('/list-staffs', StaffIndex::class)->name('staffs.lists');

    });

    Route::get('/settings', Settings::class)->name('settings');

});

require __DIR__.'/auth.php';
