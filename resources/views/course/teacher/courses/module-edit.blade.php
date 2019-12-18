@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Editar Módulo</h1>
                 </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Editar Módulo</li>
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
                                            <h3>Editar Módulo: {{$module->name}}</h3>
                                            
                                        </div>
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
                                        <div class="courses-filter">
                                            {!! Form::model($module, ['route' => ['modulos.update', $module->id], 'class' => 'form form-school', 'method' => 'PUT']) !!}

                                                @include('course.teacher.courses.form-module')

                                                {{Form::close()}}
                                                
                                                {!! Form::open(['route' => ['modulos.destroy', $module->id], 'class' => 'form form-school', 'method' => 'DELETE']) !!}
                                                    {!! Form::hidden('course_id', $module->course_id) !!}
                                                    {!! Form::submit('Deletar?', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
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