@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
    <!-- Main Slider -->
    <div class="page-banner section-area section-sp1 ovbl-dark bg-fix online-cours" style="background-image:url(assets/images/02.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white">
                        <h2>Cursos online de programação</h2>
                        {{-- <h5>Own Your Feature Learning New Skills Online</h5> --}}
                    </div>
                </div>
                {{-- <div class="mw800 m-auto">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="cours-search-bx m-b30">
                                <div class="icon-box">
                                    <h3><i class="ti-user"></i><span class="counter">5</span>M</h3>
                                </div>
                                <span class="cours-search-text">Over 5 million student</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="cours-search-bx m-b30">
                                <div class="icon-box">
                                    <h3><i class="ti-book"></i><span class="counter">30</span>K</h3>
                                </div>
                                <span class="cours-search-text">30,000 Courses.</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="cours-search-bx m-b30">
                                <div class="icon-box">
                                    <h3><i class="ti-layout-list-post"></i><span class="counter">20</span>K</h3>
                                </div>
                                <span class="cours-search-text">Learn Anythink Online.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    <!-- Main Slider -->
</div>

<div class="container">
    <section class="text-center my-5">

        
        <div class="form-search form-inline ml-auto">
            {!! Form::open(['route' => 'courses.search', 'class' => 'form form-inline']) !!}
            <div class="md-form my-0">
                {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-5 md-form my-0">
                {!! Form::text('key-search', null, ['placeholder' => 'Digite um Nome:', 'class' => 'form-control']) !!}
            </div>

                {{-- <input type="submit" value="Pesquisar" class="btn btn-outline-white btn-md my-0 ml-sm-2"> --}}
                <div class="input-group-append">
                    <button type="submit" class="btn blue">Pesquisar</button>
                </div>
                
                {{-- <input type="submit" value="Pesquisar" class="btn btn-primary"> --}}

            {!! Form::close() !!}
            
            <div class="col-5">
                <div class="md-form">
                    @if( isset($dataForm['key-search']) )
                        <p><b>Resultados Para: </b>{{$dataForm['key-search']}}</p>
                    @endif
                </div>
            </div>
        </div>

        <h2 class="h1-responsive font-weight-bold text-center my-5">Lançamentos:</h2>
        <div class="col-lg-12 col-md-8 col-sm-12">
            <div class="row">
                @foreach( $courses as $course )
                <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
                    <div class="cours-bx">
                        <div class="action-box">
                            {{-- <img src="assets/images/courses/pic1.jpg" alt=""> --}}
                            @if( $course->image != null )
                            <img src="{{url("storage/courses/{$course->image}")}}" alt="{{$course->name}}">
                            @else
                            <img src="{{url('assets/imgs/courses/no-image.png')}}" alt="{{$course->name}}">
                            @endif
                            <a href="{{route('course', $course->url)}}" class="btn">Saiba Mais</a>
                        </div>
                        <div class="info-bx text-center">
                            <h5><a href="{{route('course', $course->url)}}">{{$course->name}}</a></h5>
                            <p>{{$course->users->count()}} alunos</p>
                        </div>
                        <div class="cours-more-info">
                            <div class="review">
                                <i class="fa fa-user"></i>
                                <span>{{$course->user->name}}</span>
                                
                            </div>
                            <div class="price">
                                <h5>$ {{$course->price}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 m-b20">
                    <div class="pagination-bx rounded-sm gray clearfix">
                        <ul class="pagination">
                            @if( isset($dataForm) )
                            <li class="active">{!! $courses->appends($dataForm)->links() !!}</li>
                            @else
                                {!! $courses->links() !!}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Testimonials ==== -->
    <div class="section-area section-sp2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    <h2 class="title-head text-uppercase">what people <span>say</span></h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                <div class="item">
                    <div class="testimonial-bx">
                        <div class="testimonial-thumb">
                            <img src="assets/images/testimonials/pic1.jpg" alt="">
                        </div>
                        <div class="testimonial-info">
                            <h5 class="name">Peter Packer</h5>
                            <p>-Art Director</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-bx">
                        <div class="testimonial-thumb">
                            <img src="assets/images/testimonials/pic2.jpg" alt="">
                        </div>
                        <div class="testimonial-info">
                            <h5 class="name">Peter Packer</h5>
                            <p>-Art Director</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials END ==== -->
</div>

   
@endsection