<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Sale;

class TeacherController extends Controller
{
    private $course;
    private $totalPage = 8;
    
    public function __construct(Course $course)
    {
        $this->course = $course;
    }
    
    public function createCourse(Category $category)
    {
        $categories = $category->pluck('name', 'id');
        
        $title = 'Cadastrar Novo Curso';
        
        return view('course.teacher.store-course', compact('categories', 'title'));
    }
    
    public function storeCourse(Request $request)
    {
        $insert = $this->course->newCourse($request);
        
        if( $insert )
            return redirect()->route('teacher.courses')->with('success', 'Novo Curso Cadastrado com Sucesso!');
        else
            return redirect()->back()->with('error', 'Falha ao cadastrar novo curso.');
    }
    
    public function courses()
    {
        $title = 'Instrutor: Meus Cursos';
        
        $courses = $this->course->userByAuth()->paginate($this->totalPage);
        
        return view('course.teacher.courses', compact('courses', 'title'));
    }
    
    public function courseSearch(Request $request)
    {
        $dataForm = $request->except('_token');
        $keySearch = $dataForm['key-search'];
        
        $title = "Instrutor: Meus Cursos - Resultados para: {$keySearch}";
        
        $courses = $this->course->search($keySearch);
        
        return view('course.teacher.courses', compact('courses', 'title', 'dataForm'));
    }
    
    
    public function editCourse(Category $category, $id)
    {
        $course = $this->course->find($id);
        
        // if( Gate::denies('owner-course', $course) )
        //     return redirect()->back();
        
        $title = "Instrutor: Editar Curso {$course->name}";
        
        $categories = $category->pluck('name', 'id');
        
        return view('course.teacher.edit-course', compact('categories', 'course', 'title'));
    }
    
    public function updateCourse(Request $request, $id)
    {
        $course = $this->course->find($id);
        
        $update = $course->updateCourse($request, $course);
        
        if( $update )
            return redirect()->route('teacher.courses')->with('success', 'Curso editado com sucesso!');
        else
            return redirect()->back()->with('error', 'Falha ao editar curso.');
    }
    
    
    public function destroyCourse($idCourse)
    {
        $course = $this->course->find($idCourse);
        
        $modules = $course->modules()->count();
        
        if( $modules == 0 ) {
            $course->delete();
            
            return redirect()
                        ->route('teacher.courses')
                        ->with('success', 'Curso deletado com sucesso!');
        }
        
        return redirect()
                    ->back()
                    ->with('error', 'Delete os módulos do curso primeiramente!');
        
    }
    
    
    public function mySales(Sale $sale)
    {
        $sales = $sale->mySales();
        
        $title = "Minhas Vendas - LaraSchool";
        
        return view('course.teacher.sales.sales', compact('sales', 'title'));
    }
    
    
    public function myStudents(Sale $sale)
    {
        $students = $sale->myStudents();
        
        $title = 'Meus Alunos - LaraSchool';
        
        return view('course.teacher.sales.students', compact('title', 'students'));
    }
}
