@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Meus Alunos</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Meus Alunos</li>
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
                                        <h3>Meus Alunos</h3>
                                    </div>
                                    <div class="courses-filter">
                                        @forelse( $students as $student )
                                            <div class="col-md-2 col-sm-4 col-xm-6 student">

                                                <a href="?pg=student-detail">
                                                    <div class="user-profile-thumb">
                                                        @if( $student->user_image != '' )
                                                        <img src="{{url("storage/users/".$student->user_image)}}" alt="{{$student->user_name}}" >
                                                        @else
                                                        <img src="{{url('assets/imgs/profile.png')}}" alt="{{$student->user_name}}" >
                                                        @endif
                                                    </div>
                                                    <div class="meus-alunos">
                                                        <h2>{{$student->user_name}}</h2>
                                                    </div>
                                                    
                                                </a>
                                            </div>
                                            @empty
                                                <p>Nenhum aluno.</p>
                                        @endforelse
                                        <br>
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