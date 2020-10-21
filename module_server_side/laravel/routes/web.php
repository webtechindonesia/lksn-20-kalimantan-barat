<?php

use Illuminate\Support\Facades\Route;

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

use App\User;

Route::get('/', function () {
    // return view('welcome');
    for ($i = 1; $i <= 5; $i++) {
        User::create([
            'username' => "payment_$i",
            'password' => bcrypt("payment_$i"),
            'role' => 'user',
        ]);
    }
    for ($i = 1; $i <= 3; $i++) {
        User::create([
            'username' => "procurement_$i",
            'password' => bcrypt("procurement_$i"),
            'role' => 'user',
        ]);
    }
    for ($i = 1; $i <= 7; $i++) {
        User::create([
            'username' => "it_$i",
            'password' => bcrypt("it_$i"),
            'role' => 'user',
        ]);
    }
    for ($i = 1; $i <= 3; $i++) {
        User::create([
            'username' => "finance_$i",
            'password' => bcrypt("finance_$i"),
            'role' => 'user',
        ]);
    }
    for ($i = 1; $i <= 3; $i++) {
        User::create([
            'username' => "hr_$i",
            'password' => bcrypt("hr_$i"),
            'role' => 'admin',
        ]);
    }
});
