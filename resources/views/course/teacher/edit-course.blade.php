@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Curso Editar</h1>
                 </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Curso Editar</li>
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
                                            <h3>Curso Editar</h3>
                                            
                                        </div>
                                        <div class="courses-filter">
                                            {!! Form::open(['route' => ['course.destroy', $course->id], 'class' => 'form form-school', 'method' => 'DELETE']) !!}
                                                {!! Form::submit('Deletar Curso?', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                            <br>

                                            <h1 class="title">Editar Curso {{$course->name}}</h1>
                                            
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

                                            {!! Form::model($course, ['route' => ['update.course', $course->id], 'class' => 'form form-school', 'files' => true, 'method' => 'put']) !!}

                                                @include('course.teacher.form-course')

                                            {{Form::close()}}
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