@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Minhas Compras</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Minhas Compras</li>
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
                                        <h3>Minhas Compras</h3>
                                    </div>

                                    <div class="courses-filter">
                                        <div class="col-lg-12 col-md-8 col-sm-12">
                                            <div class="row">
                                                @forelse( $sales as $course )
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
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <p>Nenhuma Compra! :/</p>
                                                @endforelse
                                                </div>
                                                <div class="col-lg-12 m-b20">
                                                    <div class="pagination-bx rounded-sm gray clearfix">
                                                        <ul class="pagination">
                                                            {!! $sales->links() !!}
                                                        </ul>
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
        </div>
    </div>
</div>

@endsection