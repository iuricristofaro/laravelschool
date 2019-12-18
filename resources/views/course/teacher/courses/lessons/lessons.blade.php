@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Aulas do Módulo</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Aulas do Módulo</li>
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
                                        <h3>Aulas do Módulo: {{$module->name}}</h3>
                                        
                                    </div>
                                    
                                    <div class="courses-filter">
                                        <a href="{{route('aulas.create')}}" class="btn btn-create">
                                            <i class="fa fa-plus"></i>
                                            Cadastrar
                                        </a>
                                        <br><br>

                                        @if( session('error') )
                                            <div class="alert alert-warning">
                                                {{session('error')}}
                                            </div>
                                        @endif
                                            
                                        @if( isset($errors) && count($errors) > 0 )
                                            <div class="alert alert-danger">
                                                @foreach( $errors->all() as $error )
                                                <p>{{$error}}</p>
                                                @endforeach
                                            </div>
                                        @endif

                                        <table class="table table-striped">
                                            <tr>
                                                <th>Nome</th>
                                                <th>url</th>
                                                <th>Descrição</th>
                                                <th>free</th>
                                                <th width="100px">Ação</th>
                                            </tr>
                                            
                                            @foreach($lessons as $lesson)
                                            <tr>
                                                <td>{{$lesson->name}}</td>
                                                <td>{{$lesson->url}}</td>
                                                <td>{{$lesson->description}}</td>
                                                <td>{{$lesson->free}}</td>
                                                <td>
                                                    <a href="{{route('aulas.edit', $lesson->id)}}" class="edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>

@endsection