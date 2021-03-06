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

Route::get('/', function () {
    return view('welcome');
});


/* 新闻页面 */
Route::get('/news/{id}','NewsController@index');
/* 站点主页 */
Route::get('/','IndexController@index');
Route::get('/index','IndexController@index');
//Route::get('/test/{id}','IndexController@test');

/* 教师个人主页 */
Route::get('/teacher/{id}','TeacherController@homepage');
/* 教师/学生/访学切换 */
Route::get('/team', 'TeamController@team');


/* 论文/专利/项目的切换 */
Route::get('/achivement', 'AchievementController@achivement');


