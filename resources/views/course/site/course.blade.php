@extends('course.layouts.app')

@section('content')


<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/02.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">{{$course->name}}</h1>
                    <p>{{$course->description}}</p>
                 </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>{{$course->name}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                     <div class="row d-flex flex-row-reverse">
                        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                            <div class="course-detail-bx">
                                <div class="course-price">
                                    <h4 class="price">$ {{$course->price}}</h4>
                                </div>  
                                <div class="course-buy-now text-center">
                                    <a href="https://pay.hotmart.com/{{$course->link_buy}}" class="btn radius-xl text-uppercase">Comprar Agora!</a>
                                </div>
                                <div class="teacher-bx">
                                    <div class="teacher-info">
                                        <div class="teacher-thumb">
                                            @if( $course->user_image != '' )
                                            <img src="{{url("storage/users/".$course->user_image)}}" alt="" class="img-circle">
                                            @else
                                            <img src="{{url('assets/imgs/profile.png')}}" alt="" class="img-profile">
                                            @endif
                                        </div>
                                        <div class="teacher-name">
                                            <h5>{{$course->user->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-info-list scroll-page scroller">

                                    <ul class="course-features">
                                            <li><i class="ti-book"></i> <span>Categoria:</span> <span class="value">{{$course->category_id}}</span></li>
                                            <li><i class="ti-user"></i> <span>Total de Alunos:</span> <span class="value">{{$course->users->count()}}</span></li>
                                            <li><i class="ti-check-box"></i> <span>Gratuito:</span> <span class="value">@if( $course->free ) SIM @else NÃO @endif</span></li>
                                            <li><i class="ti-stats-up"></i> <span>Total Horas:</span> <span class="value">{{$course->total_hours}}</span></li>
                                            <li><i class="ti-smallcap"></i> <span>Tempo de Acesso:</span> <span class="value"> Vitalício</span></li>
                                            <li><i class="ti-user"></i> <span>Students</span> <span class="value">32</span></li>
                                            <li><i class="ti-check-box"></i> Assessments <span class="value">Yes</span></li>
                                        </ul>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div class="courses-post">
                                <div class="ttr-post-media media-effect">
                                    @if( $course->image != null )
                                    <img src="{{url("storage/courses/{$course->image}")}}" alt="{{$course->name}}">
                                    @else
                                    <img src="{{url('assets/imgs/courses/no-image.png')}}" alt="{{$course->name}}">
                                    @endif
                                    {{-- <a href="#"><img src="assets/images/blog/default/thum1.jpg" alt=""></a> --}}
                                </div>
                                <div class="ttr-post-info">
                                    <div class="ttr-post-title ">
                                        <h2 class="post-title">{{$course->name}}</h2>
                                    </div>
                                    <div class="ttr-post-text">
                                        <p>{{$course->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b30" id="curriculum">
                                <h4>Grade curricular</h4>
                                <div class="col-md-12">  
                                    
                                        <div class="ttr-accordion m-b30 faq-bx" id="accordion1">


                                            @forelse( $modules as $key => $module )
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        
                                                           <h4 class="acod-title">
                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
                                                                    {{$module->name}}
                                                                </a>
                                                            </h4> 
                                                        
                                                    </div>
                                                    <div id="collapse-{{$key}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">

                                                            @forelse( $module->lessons as $lesson )
                                                            <ul class="list">
                                                                <li>
                                                                    <div class="lesson">
                                                                        <a href="{{route('lesson', $lesson->url)}}">
                                                                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                                                                            
                                                                            {{$lesson->name}}
                                                                            
                                                                            @if( $lesson->free )
                                                                                <span class="badge badge-free">Grátis</span>
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                    @empty
                                                                        <p class="list-p">
                                                                            Nenhuma aula cadastrada neste módulo!
                                                                        </p>
                                                                    @endforelse  
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div><p>Não existem módulos a serem exibidos!</p></div>
                                            @endforelse
                                        </div>
 
                                </div>
                            </div>
                            <div class="" id="instructor">
                                <h4>Instrutor</h4>
                                <div class="instructor-bx">
                                    <div class="instructor-author">
                                        @if( $course->user_image != '' )
                                        <img src="{{url("storage/users/".$course->user_image)}}" alt="{{$course->user_name}}" class="img-circle">
                                        @else
                                        <img src="{{url('assets/imgs/profile.png')}}" alt="{{$course->user_name}}" class="img-profile">
                                        @endif
                                    </div>
                                    <div class="instructor-info">
                                        <h6>{{$course->user->name}} </h6>
                                        <span>Professor</span>
                                        <ul class="list-inline m-tb10">
                                            <li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#" class="btn sharp-sm google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                        <p class="m-b0">{{$course->user->bibliography}}</p>
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