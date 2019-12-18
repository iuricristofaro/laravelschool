@extends('course.layouts.app')

@section('content')


<div class="page-content bg-white">
    <div class="page-banner section-area section-sp1 ovbl-dark bg-fix online-cours" style="background-image:url(assets/images/webdesign.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white">
                        <h2>Meus Cursos</h2>
                    </div>
                </div>
        </div>
    <!-- Main Slider -->
</div>


<div class="container">
    <section class="text-center my-5">
        
        <div class="form-search">
            {!! Form::open(['route' => 'teacher.courses.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key-search', null, ['placeholder' => 'Digite um Nome:', 'class' => 'form-control']) !!}

                <input type="submit" value="Pesquisar" class="btn btn-search">
            {!! Form::close() !!}
            
            @if( isset($dataForm['key-search']) )
                <p><b>Resultados Para: </b>{{$dataForm['key-search']}}</p>
        @endif
        </div>

        <h2 class="h1-responsive font-weight-bold text-center my-5">Instrutor: Meus Cursos</h2>
        <div class="col-lg-12 col-md-8 col-sm-12">
            @if( session('success') )
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
                        <div class="cours-bx">
                            <div class="action-box">
                                @if( $course->image != null )
                                    <img src="{{url("storage/courses/{$course->image}")}}" alt="{{$course->name}}">
                                @else
                                    <img src="{{url('assets/images/courses/pic1.jpg')}}" alt="{{$course->name}}">
                                @endif
                                {{-- <a href="#" class="btn">Read More</a> --}}
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="#">{{$course->name}}</a></h5>
                                {{-- <span>Programming</span> --}}
                            </div>
                            <div class="cours-more-info">
                                {{-- <div class="review">
                                    <span>3 Review</span>
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-edit"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    
                                </div> --}}
                                <div class="course">
                                    <div class="btn-view-teacher">
                                        <a href="?pg=curso" class="white">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="btn-view-edit">
                                        <a href="{{route('teacher.course.edit', $course->id)}}" class="white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-module-teacher">
                                       <a href="{{route('course.modules', $course->id)}}" class="white">
                                            <i class="fa fa-plus"></i>
                                        </a> 
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 m-b20">
                    <div class="pagination-bx rounded-sm gray clearfix">
                        <ul class="pagination">
                            @if( isset($dataForm) )
                            <li class="active">
                                <a href="#">{!! $courses->appends($dataForm)->links() !!}</a>
                            </li>
                                
                            @else
                                {!! $courses->links() !!}
                            @endif

                            {{-- <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li> --}}
                        </ul>
                    </div>
                </div>
                <!--Pagination-->
            </div>
        </div>

    </section>
</div>

@endsection