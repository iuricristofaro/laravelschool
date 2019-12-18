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


{{ csrf_field() }}


<div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Nome:</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus'])}}

        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">E-Mail:</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::text('email', null, ['class' => 'form-control', 'required', 'autofocus'])}}

        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>

{{-- <div class="form-group row {{ $errors->has('senha') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Senha:</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::text('senha', null, ['class' => 'form-control', 'required', 'autofocus'])}}

        @if ($errors->has('senha'))
        <span class="help-block">
            <strong>{{ $errors->first('senha') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Senha Comfirar:</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::password('password_confirmation', ['class' => 'form-control'])}}

        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>
</div> --}}


<div class="form-group row {{ $errors->has('imagem') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Imagem:</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::file('image', ['class' => 'form-control'])}}

        @if ($errors->has('image'))
        <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('token') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Token</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::text('token', null, ['class' => 'form-control'])}}

        @if ($errors->has('token'))
        <span class="help-block">
            <strong>{{ $errors->first('token') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('bibliography') ? ' has-error' : '' }}">
    <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">bibliography</label>
    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
        {{Form::textarea('bibliography', null, ['class' => 'form-control'])}}

        @if ($errors->has('bibliography'))
        <span class="help-block">
            <strong>{{ $errors->first('bibliography') }}</strong>
        </span>
        @endif
    </div>
</div>