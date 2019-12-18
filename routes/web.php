<?php


/*********************************************************************************************
 * Instrutor
 *********************************************************************************************/
$this->group(['middleware' => 'auth'], function(){
    $this->get('cadastrar-curso', 'Admin\TeacherController@createCourse')->name('create.course');
    $this->post('cadastrar-curso', 'Admin\TeacherController@storeCourse')->name('store.course');
    $this->get('meus-cursos', 'Admin\TeacherController@courses')->name('teacher.courses');
    $this->any('meus-cursos-search', 'Admin\TeacherController@courseSearch')->name('teacher.courses.search');
    $this->get('curso-editar/{id}', 'Admin\TeacherController@editCourse')->name('teacher.course.edit');
    $this->put('atualizar-curso/{id}', 'Admin\TeacherController@updateCourse')->name('update.course');
    $this->delete('curso/deletar/{id}', 'Admin\TeacherController@destroyCourse')->name('course.destroy');
    
    $this->get('curso/{id}/modulos', 'Admin\ModuleController@byCourseId')->name('course.modules');
    $this->resource('modulos', 'Admin\ModuleController', ['except' => 'index']);

    $this->get('modulo/{id}/aulas', 'Admin\LessonController@byModuleId')->name('module.lessons');
    $this->resource('aulas', 'Admin\LessonController', ['except' => 'index']);
    
    
    $this->get('minhas-compras', 'Site\SiteController@myCourses')->name('sales');
    
    $this->get('minhas-vendas', 'Admin\TeacherController@mySales')->name('my.sales');
    
    $this->get('meus-alunos', 'Admin\TeacherController@myStudents')->name('my.students');


    $this->get('categorias', 'Admin\CategoryController@index')->name('categorias');

    $this->get('categorias-create', 'Admin\CategoryController@create')->name('categorias.create');

    $this->post('categorias-store', 'Admin\CategoryController@store')->name('categorias.store');

    $this->get('categorias-editar/{id}', 'Admin\CategoryController@edit')->name('category.edit');

    $this->put('categorias-atualizar/{id}', 'Admin\CategoryController@update')->name('categorias.update');

    $this->delete('categorias/deletar/{id}', 'Admin\CategoryController@destroy')->name('categorias.destroy');
});




Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Site\SiteController@index')->name('home');
Route::get('sobre', 'Site\SobreController@index')->name('sobre');
Route::get('blog', 'Site\BlogController@index')->name('blog');
Route::get('aovivo', 'Site\AovivoController@index')->name('aovivo');
Route::get('contato', 'Site\ContatoController@index')->name('contato');


/*********************************************************************************************
 * Gestão de Usuários
 *********************************************************************************************/

Route::get('pedido-realizado', 'Site\SiteController@success')->name('success');
Route::get('usuario/{url}', 'Site\SiteController@user')->name('user');
Route::get('aula/{url}', 'Site\SiteController@lesson')->name('lesson');
Route::post('curso-pesquisar', 'Site\SiteController@search')->name('courses.search');
Route::get('curso/{url}', 'Site\SiteController@course')->name('course');


$this->get('cadastrar', 'Admin\UserController@register');
$this->post('new-user', 'Admin\UserController@registring');
$this->get('logout', 'Admin\UserController@logout');
$this->get('perfil', 'Admin\UserController@profile')->name('profile');
$this->post('profile-update', 'Admin\UserController@profileUpdate')->name('profile.update');
Route::post('atualizar-senha', 'Admin\UserController@passwordUpdate')->name('update.password');
