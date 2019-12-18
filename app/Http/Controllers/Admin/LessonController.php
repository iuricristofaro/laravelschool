<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Module;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    private $totalPage = 30;
    private $lesson;
    
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byModuleId($idModule)
    {
        $module = Module::find($idModule);
        
        $course = $module->course;
        
        // $this->authorize('owner-course', $course);
        
        $lessons = $module->lessons()->paginate($this->totalPage);
        
        $title = "Aulas do Módulo: {$module->name}";
        
        return view('course.teacher.courses.lessons.lessons', compact('module', 'lessons', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Module $module)
    {
        $title = "Cadastrar Nova Aula";
        
        $modules = $module->modulesUser();
        
        return view('course.teacher.courses.lessons.create-edit', compact('title', 'modules'));
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
        
        $dataForm['free'] = isset($dataForm['free']);
        
        $insert = $this->lesson->create($dataForm);
        
        if( $insert )
            return redirect()->route('module.lessons', $insert->module_id);
        else
            return redirect()->back()->with('error', 'Falha ao cadastrar!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module, $id)
    {
        $lesson = $this->lesson->find($id);
        
        $title = "Editar Aula {$lesson->name}";
        
        $modules = $module->modulesUser();
        
        return view('course.teacher.courses.lessons.create-edit', compact('lesson', 'title', 'modules'));
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
        $dataForm = $request->all();
        
        $lesson = $this->lesson->find($id);
        
        $dataForm['free'] = isset($dataForm['free']);

        $update = $lesson->update($dataForm);
        
        if( $update )
            return redirect()->route('module.lessons', $dataForm['module_id']);
        else
            return redirect()->back()->with('error', 'Falha ao Alterar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $lesson = $this->lesson->find($id);
        
        $course = $lesson->module->course;
        
        $this->authorize('owner-course', $course);
        
        $lesson->delete();
        
        return redirect()->route('module.lessons', $request->get('module_id'));
    }
}
