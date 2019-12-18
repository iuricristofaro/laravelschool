@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Gestão Aula: {{$lesson->name or 'Novo'}}</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Gestão Aula: {{$lesson->name or 'Novo'}}</li>
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
                                        <h3>Gestão Aula: {{$lesson->name or 'Novo'}}</h3>
                                        
                                    </div>
                                    
                                    <div class="courses-filter">
                                        @if( isset($errors) && count($errors) > 0 )
                                        <div class="alert alert-danger">
                                            @foreach( $errors->all() as $error )
                                            <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if( isset($lesson) )
                                        {!! Form::model($lesson, ['route' => ['aulas.update', $lesson->id], 'class' => 'form form-school', 'method' => 'put']) !!}
                                        @else
                                        {!! Form::open(['route' => 'aulas.store', 'class' => 'form form-school']) !!}
                                        @endif

                                        <div class="form-group">
                                            {!! Form::select('module_id', $modules, null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url:']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'Vídeo:']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Free?
                                                {!! Form::checkbox('free', '1') !!}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
                                        </div>
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Enviar', ['class' => 'btn btn-form']) !!}
                                        </div>

                                        {!! Form::close() !!}
                                        
                                        
                                        @if( isset($lesson) )
                                            {!! Form::open(['route' => ['aulas.destroy', $lesson->id], 'method' => 'DELETE', 'class' => 'form']) !!}
                                                {!! Form::hidden('module_id', $lesson->module_id) !!}
                                                {!! Form::submit('Deletar?', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endif
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