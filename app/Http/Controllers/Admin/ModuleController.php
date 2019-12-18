<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Module;
use Gate;

class ModuleController extends Controller
{
    private $module;
    private $totalPage = 30;
    
    public function __construct(Module $module)
    {
        $this->module = $module;
    }
    
    public function byCourseId($id)
    {
        $course = Course::find($id);
        
        //$this->authorize('owner-course', $course);
        // if( Gate::denies('owner-course', $course) )
        //         return redirect()->back();
        
        $modules = $course->modules()->paginate($this->totalPage);
        
        $title = "Módulos do Curso: {$course->name}";
        
        return view('course.teacher.courses.modules', compact('course', 'modules', 'title'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::userByAuth()->pluck('name', 'id');
        
        $title = "Cadastrar Novo Módulo";
        
        return view('course.teacher.courses.module-create', compact('title', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        
        $insert = $this->module->create($dataForm);
        
        if( $insert )
            return redirect()->route('course.modules', $insert->course_id);
        else
            return redirect()->back()->with('error', 'Falha ao cadastrar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::userByAuth()->pluck('name', 'id');
        
        $module = $this->module->find($id);
        
        $title = "Editar Módulo: {$module->name}";
        
        return view('course.teacher.courses.module-edit', compact('module', 'title', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = $this->module->find($id);
        
        $dataForm = $request->all();
        
        $update = $module->update($dataForm);
        
        if( $update )
            return redirect()->route('course.modules', $dataForm['course_id']);
        else
            return redirect()->back()->with('error', 'Falha ao editar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $module = $this->module->find($id);
        
        $course = $module->course;
        
        // $this->authorize('owner-course', $course);
        
        $lessons = $module->lessons()->count();
        
        if( $lessons == 0 ) {
            $module->delete();
            
            return redirect()
                        ->route('course.modules', $course->id)
                        ->with('success', 'Curso deletado com sucesso!');
        }
        
        return redirect()
                    ->back()
                    ->with('error', 'Delete as aulas do módulo primeiramente!');
    }
}
