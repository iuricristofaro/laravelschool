@extends('course.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Blog</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-block">
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row">
                        <!-- Left part start -->
                        <div class="col-md-7 col-lg-8 col-xl-8">
                            <div class="recent-news blog-lg m-b40">
                                <div class="action-box blog-lg">
                                    <img src="assets/images/blog/default/thum1.jpg" alt="">
                                </div>
                                <div class="info-bx">
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-calendar"></i>Jan 14 2019</a></li>
                                        <li><a href="#"><i class="fa fa-user"></i>By Jone</a></li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-details.html">This Story Behind Education Will Haunt You Forever.</a></h5>
                                    <p>You just need to enter the keyword and select the keyword type to generate a list of 6 title ideas and suggestions. If you’re not satisfied with the results, you can always hit the refresh button to generate a new list of unique titles.</p>
                                    <div class="post-extra">
                                        <a href="#" class="btn-link">READ MORE</a>
                                        <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>78 Comment</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination start -->
                            <div class="pagination-bx rounded-sm gray clearfix">
                                <ul class="pagination">
                                    <li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- Pagination END -->
                        </div>
                        <!-- Left part END -->
                        <!-- Side bar start -->
                        <div class="col-md-5 col-lg-4 col-xl-4 sticky-top">
                            <aside class="side-bar sticky-top">
                                <div class="widget">
                                    <h6 class="widget-title">Search</h6>
                                    <div class="search-bx style-1">
                                        <form role="search" method="post">
                                            <div class="input-group">
                                                <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="fa fa-search text-primary"></button>
                                                </span> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="widget recent-posts-entry">
                                    <h6 class="widget-title">Recent Posts</h6>
                                    <div class="widget-post-bx">
                                        <div class="widget-post clearfix">
                                            <div class="ttr-post-media"> <img src="assets/images/blog/recent-blog/pic1.jpg" alt="" width="200" height="143"> </div>
                                            <div class="ttr-post-info">
                                                <div class="ttr-post-header">
                                                    <h6 class="post-title"><a href="blog-details.html">This Story Behind Education Will Haunt You Forever.</a></h6>
                                                </div>
                                                <ul class="media-post">
                                                    <li><a href="#"><i class="fa fa-calendar"></i>Oct 23 2019</a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i>15 Comment</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget_tag_cloud">
                                    <h6 class="widget-title">Tags</h6>
                                    <div class="tagcloud"> 
                                        <a href="#">Design</a> 
                                        <a href="#">User interface</a> 
                                        <a href="#">SEO</a> 
                                        <a href="#">WordPress</a> 
                                        <a href="#">Development</a> 
                                        <a href="#">Joomla</a> 
                                        <a href="#">Design</a> 
                                        <a href="#">User interface</a> 
                                        <a href="#">SEO</a> 
                                        <a href="#">WordPress</a> 
                                        <a href="#">Development</a> 
                                        <a href="#">Joomla</a> 
                                        <a href="#">Design</a> 
                                        <a href="#">User interface</a> 
                                        <a href="#">SEO</a> 
                                        <a href="#">WordPress</a> 
                                        <a href="#">Development</a> 
                                        <a href="#">Joomla</a> 
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <!-- Side bar END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content END -->
@endsection