@extends('course.layouts.app')

@section('content')


<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Categorias</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Categorias</li>
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
                                        <h3>Categorias</h3>
                                        
                                    </div>
                                    <div class="courses-filter">
                                        @if( session('success') )
                                        <div class="alert alert-success">
                                            {{session('success')}}
                                        </div>
                                        @endif
                                        

                                        <a href="{{route('categorias.create')}}" class="btn btn-create">
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
                                            
                                            @foreach ($categorias as $category )
                                            <tr>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                <td class="float-left">
                                                        <a href="">
                                                            <span class="fa fa-eye"></span>
                                                        </a> |
                                                        <a href="{{route('category.edit', $category->id)}}" class="edit">
                                                            <span class="fa fa-edit"></span>
                                                        </a> |
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </table>
                                        
                                        
                                        <div class="pag">
                                            {!! $categorias->render() !!}
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