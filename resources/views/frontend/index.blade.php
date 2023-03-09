@extends('frontend.layout.main')
@section('title','thonea')
@section('contents')

<!-- Headline -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
            {{-- <span class="text-uppercase cl2 p-r-8">
                Trending Now:
            </span>

            <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    Interest rate angst trips up US equity bull market
                </span>
                
                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    Designer fashion show kicks off Variety Week
                </span>

                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    Microsoft quisque at ipsum vel orci eleifend ultrices
                </span>
            </span> --}}
        </div>

        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>
    </div>
</div>
    
<!-- Feature post -->
<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            @foreach ($posts->take(6) as $index => $item)   
            <div class="col-sm-6 col-lg-4 p-rl-1 p-b-2">
                <div class="bg-img1 size-a-12 how1 pos-relative" style="background-image: url({{url('uploads/post/'.$item->image)}});">
                    <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="dis-block how1-child1 trans-03"></a>

                    <div class="flex-col-e-s s-full p-rl-25 p-tb-11">
                        <a href="{{ url('topic/'.$item->category->slug)  }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{$item->category->name}}
                        </a>

                        <h3 class="how1-child2 m-t-10">
                            <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="f1-m-1 cl0 hov-cl10 trans-03">
                                {{$item->short_detail}}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- @foreach ($posts->take(1) as $index => $item)             
            @if ($index == 0)               
            <div class="col-md-6 p-rl-1 p-b-2">
                <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{url('uploads/post/'.$item->image)}});">
                    <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="dis-block how1-child1 trans-03"></a>
                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{$item->category->name}}
                        </a>
                        <h3 class="how1-child2 m-t-14 m-b-10">
                            <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {{$item->short_detail}}
                            </a>
                        </h3>
                        <span class="how1-child2">
                            <span class="f1-s-4 cl11">
                                {{$item->user->name}}
                            </span>
                            <span class="f1-s-3 cl11 m-rl-3">
                                -
                            </span>
                            <span class="f1-s-3 cl11">
                               {{$item->created_at->format('M d, Y')}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>    
            @endif --}}

            {{-- <div class="col-md-6 p-rl-1">
                <div class="row m-rl--1">
                    @foreach ($posts_random->take(1) as $index => $item)                   
                        <div class="col-12 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url({{url('uploads/post/'.$item->image)}});">
                                <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                    <a href="{{ url('topic/'.$item->category->slug)  }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{$item->category->name}}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                            {{$item->short_detail}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                    @foreach ($posts_random_bottom->take(2) as $index => $item)                   
                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{url('uploads/post/'.$item->image)}});">
                                <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="{{ url('topic/'.$item->category->slug)  }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{$item->category->name}}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{$item->short_detail}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>
    </div>
</section>

<!-- Post -->
<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    <!-- Entertainment -->
                    @foreach ($categories as $category)
                               
                    <div class="tab01 p-b-20">
                        <div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
							<h3 class="f1-m-2 cl12 tab01-title">                                  
                                {{$category->name}}  
                                                                                
                            </h3>
                            <!--  -->
                            <a href="{{url('topic/'.$category->slug)}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                View all
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                        </div>             
                        <div class="tab-content p-t-35">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                <div class="row">
                                    @foreach ($category->posts as $index => $item)
                                        @if ($index == 0)                                            
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <div class="m-b-30">
                                                <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="wrap-pic-w hov1 trans-03">
                                                    <img class="bg-img1 size-a-4 how1 pos-relative" src="{{url('uploads/post/'.$item->image)}}" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{$item->short_detail}} 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="{{ url('topic/'.$item->category->slug)  }}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{$item->category->name}}
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{$item->created_at->format('M d, Y')}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @foreach ($category->posts->take(3) as $index => $item)
                                            @if($index ==0)
                                            @continue
                                            @endif
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('uploads/post/'.$item->image)}}" alt="IMG">
                                            </a>
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{$item->short_detail}}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="{{ url('topic/'.$item->category->slug)}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{$item->category->name}}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{$item->created_at->format('M d, Y')}}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                    
                    @endforeach                

                    <!-- Business -->
                    {{-- <div class="tab01 p-b-20">
                       <div class="how2 how2-cl2 flex-sb-c m-r-10 m-r-0-sr991">
							<h3 class="f1-m-2 cl13 tab01-title">
                                @if ($categories->order ==2)
                                    {{$categories->name}}                               
                                @endif     
                            </h3>      
                        </div>                            

                        <div class="tab-content p-t-35">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->	
                                        <div class="m-b-30">
                                            <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-10.jpg" alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        Bitcoin lorem ipsum dolor sit amet consectetur 
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        Finance
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 18
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->	
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-11.jpg" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Small Business
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 17
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-12.jpg" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Economy
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-13.jpg" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Money & Markets
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div> --}}

                    <!-- Travel -->
                    {{-- <div class="tab01 p-b-20">
                        <div class="how2 how2-cl3 flex-sb-c m-r-10 m-r-0-sr991">
                            <h3 class="f1-m-2 cl14 tab01-title">
                                Travel
                            </h3>                              
                        </div>                            

                        <div class="tab-content p-t-35">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->	
                                        <div class="m-b-30">
                                            <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-14.jpg" alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        You wish lorem ipsum dolor sit amet consectetur 
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        Hotels
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 18
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->	
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-15.jpg" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Beachs
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 17
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-16.jpg" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Flight
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{url('')}}/frontend/images/post-17.jpg" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Culture
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!-- most popular -->
                    <div>
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Most Popular
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($post_popular->take(5) as $key=> $item)
                            <li class="flex-wr-sb-s p-b-22">
                                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                    {{++$key}}
                                </div>

                                <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                    {{$item->name}}
                                </a>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>

                    <!-- ads -->
                    <div class="flex-c-s p-t-8">
                        <a href="#">
                            <img class="max-w-full" src="{{url('')}}/frontend/images/banner-02.jpg" alt="IMG">
                        </a>
                    </div>
                    
                    <!-- stay connect -->
                    <div class="p-t-50">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Stay Connected
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
                                    <span class="f1-s-8 cl3 p-r-20">
                                        6879 Fans
                                    </span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Like
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
                                    <span class="f1-s-8 cl3 p-r-20">
                                        568 Followers
                                    </span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Follow
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                    <span class="fab fa-youtube"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
                                    <span class="f1-s-8 cl3 p-r-20">
                                        5039 Subscribers
                                    </span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Subscribe
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner ads -->
<div class="container">
    <div class="flex-c-c">
        <a href="#">
            <img class="max-w-full" src="{{url('')}}/frontend/images/banner-01.jpg" alt="IMG">
        </a>
    </div>
</div>

<!-- Latest -->
<section class="bg0 p-t-60 p-b-35">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-20">
                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Latest Articles
                    </h3>
                </div>

                <div class="row p-t-35">
                    @foreach ($lastest_posts->take(6) as $item)
                        
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <!-- Item latest -->	
                        <div class="m-b-45">
                            <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="wrap-pic-w hov1 trans-03">
                                <img class="bg-img1 size-a-4 how1 pos-relative" src="{{url('uploads/post/'.$item->image)}}" alt="IMG">
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="{{ url('topic/'.$item->category->slug.'/'.$item->slug)  }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{$item->short_detail}}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <a href="#!" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        by {{$item->user->name}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{$item->created_at->format('M d, Y')}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!-- Video -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-35">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Featured Video
                            </h3>
                        </div>

                        <div>
                            <div class="wrap-pic-w pos-relative">
                                <img src="{{url('')}}/frontend/images/video-01.jpg" alt="IMG">

                                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                                    <span class="fab fa-youtube"></span>
                                </button>
                            </div>

                            <div class="p-tb-16 p-rl-25 bg3">
                                <h5 class="p-b-5">
                                    <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                        Music lorem ipsum dolor sit amet consectetur 
                                    </a>
                                </h5>

                                <span class="cl15">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        by John Alvarado
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        Feb 18
                                    </span>
                                </span>
                            </div>
                        </div>	
                    </div>
                        
                    <!-- Subscribe -->
                    <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                        <h5 class="f1-m-5 cl0 p-b-10">
                            Subscribe
                        </h5>

                        <p class="f1-s-1 cl0 p-b-25">
                            Get all latest content delivered to your email a few times a month.
                        </p>

                        <form class="size-a-9 pos-relative">
                            <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

                            <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                    
                    <!-- Tag -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-30">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Tags
                            </h3>
                        </div>

                        <div class="flex-wr-s-s m-rl--5">
                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Denim
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Streetstyle
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Crafts
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Magazine
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                News
                            </a>

                            <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                Blogs
                            </a>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection