@extends('course.layouts.app')

@section('content')
{{-- <section class="pg-form text-center">
    <h1 class="title">Meu Perfil</h1>
    {{Form::model(auth()->user(), ['route' => 'profile.update', 'class' => 'form-horizontal', 'files' => true])}}

    @include('course.user.form')

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-form">
                Atualizar Perfil
            </button>
        </div>
    </div>

    {{Form::close()}}
</section> --}}


<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Perfil</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Perfil</li>
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
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="profile-bx text-center">
                            <div class="user-profile-thumb">
                                {{-- <img src="assets/images/profile/pic1.jpg" alt=""> --}}

                                @if( auth()->user()->image )
                                    <img src="{{url("storage/users/".auth()->user()->image)}}" alt="">
                                @else
                                    <img src="{{url('assets/images/profile/pic1.jpg')}}" alt="">
                                @endif
                            </div>
                            <div class="profile-info">
                                <h4>{{ Auth::user()->name }}</h4>
                                <span>{{ Auth::user()->email }}</span>
                            </div>
                            {{-- <div class="profile-social">
                                <ul class="list-inline m-a0">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div> --}}
                            <div class="profile-tabnav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile"><i class="ti-book"></i>Perfil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#password"><i class="ti-bookmark-alt"></i>Alterar Senha</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
                        <div class="profile-content-bx">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="profile-head">
                                        <h3>Perfil</h3>
                                        
                                    </div>
                                    <div class="courses-filter">
                                        {{Form::model(auth()->user(), ['route' => 'profile.update', 'class' => 'form-horizontal', 'files' => true])}}

                                        @include('course.user.form')

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn blue">
                                                    Atualizar Perfil
                                                </button>
                                            </div>
                                        </div>

                                        {{Form::close()}}
                                    </div>
                                </div>
                                <div class="tab-pane" id="password">
                                    <div class="profile-head">
                                        <h3>Alterar Senha</h3>
                                    </div>
                                    <div class="courses-filter">

                                        @if( isset($errors) && count($errors) > 0 )
                                        <div class="alert alert-warning">
                                            @foreach($errors->all() as $error)
                                            <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if( session('success') )
                                        <div class="alert alert-success">
                                            {{session('success')}}
                                        </div>
                                        @endif

                                        {!! Form::open(['route' => 'update.password']) !!}

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            
                                            <input id="password" type="password" class="form-control" placeholder="Senha" name="password" required>

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">

                                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Senha" name="password_confirmation" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn blue">
                                                Atualizar Senha
                                            </button>
                                        </div>
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