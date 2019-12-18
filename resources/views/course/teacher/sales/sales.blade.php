@extends('course.layouts.app')

@section('content')

<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Minhas Vendas</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Minhas Vendas</li>
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
                                        <h3>Minhas Vendas</h3>
                                    </div>
                                    <div class="courses-filter">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Transação</th>
                                                    <th>Aluno</th>
                                                    <th>Curso</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse( $sales as $sale )
                                                    <tr>
                                                        <td>{{$sale->transaction}}</td>
                                                        <td><a href="">{{$sale->user_name}}</a></td>
                                                        <td><a href="">{{$sale->course_name}}</a></td>
                                                        <td>{{$sale->date}}</td>
                                                    </tr>
                                                @empty
                                                    <p>Nenhuma venda realizada</p>
                                                @endforelse
                                            </tbody>
                                        </table>
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