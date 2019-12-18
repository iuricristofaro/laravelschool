@extends('course.layouts.app')

@section('content')
<section class="pg-form text-center">
    <h1 class="title">Cadastrar-se</h1>
    {{Form::open(['url' => 'new-user', 'class' => 'form-horizontal', 'files' => true])}}

    @include('course.user.form')

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-form">
                Cadastrar
            </button>

            <a class="btn btn-link" href="{{ url('login') }}">
                Entrar
            </a>
        </div>
    </div>

    {{Form::close()}}
</section>
@endsection