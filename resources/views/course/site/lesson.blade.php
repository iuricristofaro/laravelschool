@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
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
                    <li>Courses Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                     <div class="row ">
                    
                        <div class="col-lg-12 col-md-8 col-sm-12">
                            <div class="courses-post">
                                @if( auth()->check() && ( $lesson->free || $lesson->course_free || Auth()->user()->checkAccess($lesson->course_id) ) )

                                <div class="embed-responsive embed-responsive-16by9 iframe-list">
                                    <iframe width="560" height="315" src="{{$lesson->video}}" frameborder="0" allowfullscreen></iframe>
                                </div>

                                @else
                                <div class="ttr-post-media media-effect">
                                    <div class="key-img">
                                        <img src="{{url('assets/imgs/block.jpg')}}" alt="">
                                    </div>

                                    <div class="key">
                                        <div class="key-p">
                                            @if( !auth()->check() )
                                            <p><a href="{{url('login')}}">Faça Login Para Ter Acesso</a></p>
                                            @else
                                                <p><a href="{{route('course', $lesson->url)}}">Compre Este Curso Para Ter Acesso!</a></p>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    
                                
                                </div>
                                @endif
                                <div class="ttr-post-info">
                                    <div class="ttr-post-title ">
                                        <h2 class="post-title">{{$lesson->name}}</h2>
                                    </div>
                                    <div class="ttr-post-text">
                                        <p>{{$lesson->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b30" id="curriculum">
                                <h4>Grade curricular</h4>
                                <div class="col-md-12">  
                                    
                                        <div class="ttr-accordion m-b30 faq-bx" id="accordion1">


                                            @forelse( $course->modules as $key => $module )
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area END -->
        
</div>

@endsection