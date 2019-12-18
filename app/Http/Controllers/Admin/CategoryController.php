<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Gate;

class CategoryController extends Controller
{
    private $totalPage = 10;

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->category->paginate($this->totalPage);

        $title = 'LaraSchool - Category';

        return view('course.category.index', compact('title', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'LaraSchool - Category';

        return view('course.category.create', compact('title'));
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
        
        $insert = $this->category->create($dataForm);
        
        if( $insert )
           return redirect()->back()->with(['success' => 'Categories Atualizado com Sucesso!']);
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
        $categorias = $this->category->find($id);
        
        
        $title = "Editar";
        
        return view("course.category.edit", compact('categorias', 'title'));
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

        $categories = $this->category->find($id);
        
        
        $update = $categories->update($dataForm);
        
        if( $update )
            return redirect()
                        ->back()
                        ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()
                        ->route("course.category.edit", ['id' => $id])
                        ->withErrors(['errors' => 'Falha ao editar'])
                        ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        if(!$category)
            return redirect()->back();
        
        if($category->delete())
            return redirect()
                        ->route('categorias')
                        ->with('success', 'Sucesso ao deletar');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao deletar');
    }
}
