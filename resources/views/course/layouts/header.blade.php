<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- MOBILE SPECIFIC = -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- META = -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        
        <!-- DESCRIPTION -->
        <meta name="description" content="Gladcheff : Cursos online de programação" />
        
        <!-- OG -->
        <meta property="og:title" content="Gladcheff : Cursos online de programação" />
        <meta property="og:description" content="Gladcheff : Cursos online de programação" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title or 'LaraSchool'}}</title>

        <!-- Custom fonts for this template -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        
        <!-- All PLUGINS CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/assets.css') }}">
        
        <!-- TYPOGRAPHY ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/typography.css') }}">
        
        <!-- SHORTCODES ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shortcodes/shortcodes.css') }}">
        
        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/color-3.css') }}">
        
        <!-- REVOLUTION SLIDER CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/revolution/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/revolution/css/settings.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/revolution/css/navigation.css') }}">
        <!-- REVOLUTION SLIDER END -->  

    </head>
<body id="bg">        


    <!-- Header Top ==== -->
    <header class="header rs-nav">
        {{-- <div class="top-bar">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="topbar-left">
                        <ul>
                            <li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
                            <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div> --}}
        <div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
                    <!-- Header Logo ==== -->
                    {{-- <div class="menu-logo">
                        <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                    </div> --}}
                    <!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
                                <li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:;" class="btn-link"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="javascript:;" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                <!-- Search Button ==== -->
                                {{-- <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
                        <span id="search-remove"><i class="ti-close"></i></span>
                    </div>
                    <!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                        <div class="menu-logo">
                            <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                        </div>
                        <ul class="nav navbar-nav"> 
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li><a href="{{ route('sobre') }}">sobre </a>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contato') }}">Contato</a></li>
                            <li><a href="{{ route('aovivo') }}">Ao Vivo</a></li>
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li><a href="javascript:;">Instrutor <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('categorias') }}">Categorias</a></li>
                                    <li><a href="{{route('sales')}}">Meus Cursos</a></li>
                                    <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
                                    <li><a href="{{route('my.students')}}">Alunos</a></li>
                                    <li><a href="{{route('my.sales')}}">Venda</a></li>
                                    <li><a href="{{route('create.course')}}">Cadastrar Curso</a></li>
                                </ul>
                            </li>
                            <li class="nav-dashboard">
                                <a href="javascript:;">
                                {{ Auth::user()->name }} 
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('profile') }}">Meu Perfil</a></li>
                                    <li><a href="#">Minhas Dúvidas</a></li>
                                    <li><a href="{{ route('sales') }}">Meus Cursos</a></li>
                                    <li><a href="#">Assinatura</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Sair
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                        <div class="nav-social-link">
                            <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                            <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->