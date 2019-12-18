<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Sale;

class SiteController extends Controller
{
	private $totalPage = 12;
    
    public function index(Course $course)
    {
        $courses = $course->where('published', true)
                            ->orderBy('id', 'DESC')
                            ->paginate($this->totalPage);
        
        $categories = Category::pluck('name', 'id');
        
        $title = 'LaraSchool - A sua plataforma ead!';
        
        return view('course.home.index', compact('courses', 'title', 'categories'));
    }
    
    public function search(Request $request, Course $course)
    {
        $dataForm = $request->except('_token');
        
        $courses = $course->where('published', true)
                            ->where('name', 'LIKE', "%{$dataForm['key-search']}%")
                            ->where('category_id', $dataForm['category'])
                            ->orderBy('id', 'DESC')
                            ->paginate($this->totalPage);
                            
        $categories = Category::pluck('name', 'id');
        
        $title = "LaraSchool - Resultados para: {$dataForm['key-search']}";
        
        return view('course.home.index', compact('courses', 'title', 'categories', 'dataForm'));
    }
    
    public function course(Course $course, $url)
    {
        $course = $course->where('url', $url)->with('user', 'users')->get()->first();
        
        $title = "Curso {$course->name} - LaraSchool";
        
        $modules = $course->modules()->with('lessons')->get();
        
        return view('course.site.course', compact('course', 'title', 'modules'));
    }
    
    
    public function lesson(Lesson $lesson, $url)
    {
    // Recupera a aula + os detalhes
    $lesson = $lesson->where('url', $url)
                        ->with('module.course', 'user', 'users')
                        ->first();
    
    // Se não encontrar a aula redireciona de volta
    if (!$lesson) {
        return redirect()->back();
    }

    // Pegando o módulo
    $module = $lesson->module;

    // Pegando o curso + detalhes
    $course = $module->course;

    $titulo = "Aula {$lesson->name}";

    return view('course.site.lesson', compact('lesson', 'title', 'module', 'course'));
    
    }
    
    
    public function myCourses(Sale $sale)
    {
        $sales = $sale->myCourses($this->totalPage);
        
        $title = "Meus Cursos - LaraSchool";
        
        return view('course.site.my-courses', compact('title', 'sales'));
    }
    
    
    public function user($url)
    {
        $user = User::with('courses')->where('url', $url)->get()->first();
        
        $courses = $user->courses;

        $title = "Perfil Usuário {$user->name} - LaraSchool";
        
        return view('course.site.user-profile', compact('user', 'title', 'courses'));
    }
    
    
    public function success()
    {
        $title = 'Parabéns, pedido realizado com sucesso!';
        
        return view('course.site.success', compact('title'));
    }

    public function test(Course $course)
    {

         $courses = $course->where('published', true)
                            ->orderBy('id', 'DESC')
                            ->paginate($this->totalPage);
        
        $categories = Category::pluck('name', 'id');
        
        $title = 'LaraSchool - A sua plataforma ead!';

        return view('course.home.test', compact('courses', 'categories', 'title'));
    }
    
}
