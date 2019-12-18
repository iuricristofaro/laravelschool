@extends('course.layouts.app')

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Módulos do Curso</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Módulos do Curso</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-12 m-b30">
                        <div class="profile-content-bx">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="profile-head">
                                        <h3>Módulos do Curso: {{$course->name}}</h3>
                                        
                                    </div>
                                    <div class="courses-filter">
                                        @if( session('success') )
                                        <div class="alert alert-success">
                                            {{session('success')}}
                                        </div>
                                        @endif
                                        
                                        <a href="{{route('modulos.create')}}" class="btn btn-create">
                                            <i class="fa fa-plus"></i>
                                            Cadastrar
                                        </a>

                                        <br><br>

                                        <table class="table table-striped">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Descrição</th>
                                                <th width="100px">Ação</th>
                                            </tr>
                                            
                                            @foreach($modules as $module)
                                            <tr>
                                                <td>{{$module->name}}</td>
                                                <td>{{$module->description}}</td>
                                                <td>
                                                    <a href="{{route('modulos.edit', $module->id)}}" class="edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{route('module.lessons', $module->id)}}" class="edit">
                                                        <i class="fa fa-play-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        
                                        <div class="pag">
                                            {!! $modules->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection