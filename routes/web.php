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

use App\User;
use App\Role;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',function(){
   $user=User::findOrFail(1);
   $role=new Role(['name'=>'subscriber']);
   $user->roles()->save($role);
});
Route::get('/read',function(){
   $user=User::findOrFail(1);
   foreach ($user->roles as $role){
       echo $role->name;
   }
});
Route::get('/update',function(){
    $user=User::findOrFail(1);
    //dd($user);
    $role=$user->roles;
    echo "<br>";
    dd($role);
    foreach ($user->roles as $role){
        dd($role);
        $role->name='sandesh';
        $role->save();
    }
});
Route::get('/attach',function(){
   $user=User::findOrFail(1);
   $user->roles()->attach(1);
});