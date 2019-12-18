<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function register()
    {
        return view('course.user.register');
    }
    
    public function registring(Request $request)
    {
        //Recupera todos os dados do formulário
        $dataForm = $request->all();
        
        //Criptografa a senha
        $password = $dataForm['password'];
        $dataForm['password'] = bcrypt($dataForm['password']);
        
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            
            $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
            
            $dataForm['image'] = $nameImage;
            
            $upload = $image->storeAs('users', $nameImage);
            
            if( !$upload )
                return redirect()->back()->with(['errors' => 'Falha no Upload!']);
        }
        
        //Cadastra o usuário
        $insert = $this->user->create($dataForm);
        
        //Verifica se cadastrou com sucesso!
        if( $insert ){
            if( Auth::attempt(['email' => $dataForm['email'], 'password' => $password]) )
                return redirect()->route('profile');
            else
                return redirect('/login');
        } else {
            return redirect()->back()->with(['errors' => 'Falha ao cadastrar!']);
        }
    }
    
    public function profile()
    {
        $title = 'Meu Perfil';
        
        return view('course.user.profile', compact('title'));
    }
    
    public function profileUpdate(Request $request)
    {
        $dataForm = $request->all();
        
        $user = $this->user->find(auth()->user()->id);
        
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            
            if( $user->image != null )
                $nameImage = $user->image;
            else
                $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
            
            $dataForm['image'] = $nameImage;
            
            $upload = $image->storeAs('users', $nameImage);
            
            if( !$upload )
                return redirect()->back()->with(['errors' => 'Falha no Upload!']);
        }
        
        $update = $user->update($dataForm);
        
        //Verifica se atualizou com sucesso!
        if( $update )
            return redirect()->back()->with(['success' => 'Perfil Atualizado com Sucesso!']);
        else
            return redirect()->back()->with(['errors' => 'Falha ao editar!']);
    }
    
    
    public function passwordUpdate(Request $request, User $user)
    {
    	$user = $user->find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->back()->with(['success' => 'Senha Atualizado com Sucesso!']);
    }


    public function logout()
    {
        Auth::logout();
        
        return redirect()
                ->route('home');
    }
}
