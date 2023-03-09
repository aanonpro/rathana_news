@extends('frontend.layout.main')
@section('title')
@if (isset($posts))
    thonea | {{$posts->name}}
@endif
@endsection
@section('og_title','{{$posts->slug}}')
@section('og_description','{{$posts->short_detail}}')
@section('og_image', '{{$posts->image}}')

{{-- twitter  --}}
@section('twitter_title','{{$posts->slug}}')
@section('twitter_description','{{$posts->short_detail}}')
@section('twitter_image', '{{$posts->image}}')



@section('contents')
<style>
    .detail-kh{
        font-family: 'Battambang',sans-serif;
    }

    div#social-links {
        margin: 0 auto;
        max-width: 500px;
    }
    div#social-links ul li {
        display: inline-block;
    }          
    div#social-links ul li a {
        padding: 10px;
        /* border: 1px solid #ccc; */
        margin: 1px;
        font-size: 30px;
        color: #222;
        background-color: #ccc;
    }
    div#social-links ul li a:hover{
        background-color: #222;
        color: #fff;
        
    }
</style>
    
<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{url('')}}" class="breadcrumb-item f1-s-3 cl9">
                Home 
            </a>

            <a href="{{ url('topic/'.$categories->slug) }}" class="breadcrumb-item f1-s-3 cl9">
                {{$categories->name}} 
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                 {{$posts->short_detail}}
            </span>
        </div>

        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>
    </div>
</div>

<!-- Content -->
<section class="bg0 p-b-140 p-t-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-70">
                        <a href="{{url('topic/'.$categories->slug)}}" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            {{$categories->name}}
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2 ">
                            {{$posts->short_detail}}
                        </h3>
                        
                        <div class="flex-wr-s-s p-b-40">
                            <span class="f1-s-3 cl8 m-r-15">
                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                    by  {{$posts->user->name}}
                                </a>

                                <span class="m-rl-3">-</span>

                                <span>
                                    {{$posts->created_at->format('M d, Y')}}
                                </span>
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                {{$posts->views}} View{{($posts->views > 1) ? 's':''}}
                            </span>

                            <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
                                0 Comment
                            </a>
                        </div>

                        <div class="wrap-pic-max-w p-b-30">
                            <img src="{{url('uploads/post/'.$posts->image)}}" alt="IMG">
                        </div>

                        <p class="f1-s-11 cl6 p-b-25 detail-kh">
                            {!! $posts->detail !!}
                        </p>

                        {{-- <p class="f1-s-11 cl6 p-b-25">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sit amet est vel orci luctus sollicitudin. Duis eleifend vestibulum justo, varius semper lacus condimentum dictum. Donec pulvinar a magna ut malesuada. In posuere felis diam, vel sodales metus accumsan in. Duis viverra dui eu pharetra pellentesque. Donec a eros leo. Quisque sed ligula vitae lorem efficitur faucibus. Praesent sit amet imperdiet ante. Nulla id tellus auctor, dictum libero a, malesuada nisi. Nulla in porta nibh, id vestibulum ipsum. Praesent dapibus tempus erat quis aliquet. Donec ac purus id sapien condimentum feugiat.
                        </p>

                        <p class="f1-s-11 cl6 p-b-25">
                            Praesent vel mi bibendum, finibus leo ac, condimentum arcu. Pellentesque sem ex, tristique sit amet suscipit in, mattis imperdiet enim. Integer tempus justo nec velit fringilla, eget eleifend neque blandit. Sed tempor magna sed congue auctor. Mauris eu turpis eget tortor ultricies elementum. Phasellus vel placerat orci, a venenatis justo. Phasellus faucibus venenatis nisl vitae vestibulum. Praesent id nibh arcu. Vivamus sagittis accumsan felis, quis vulputate
                        </p> --}}

                        <!-- Tag -->
                        <div class="flex-s-s p-t-12 p-b-15">
                            <span class="f1-s-12 cl5 m-r-8">
                                Tags:
                            </span>
                            
                            <div class="flex-wr-s-s size-w-0">
                                <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                    Streetstyle
                                </a>

                                <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                    Crafts
                                </a>
                            </div>
                        </div>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>
                            
                            <div class="flex-wr-s-s size-w-0">
                        {!!$share!!}

                                {{-- <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-facebook-f m-r-7"></i>
                                    Facebook
                                </a>

                                <a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-twitter m-r-7"></i>
                                    Twitter
                                </a>

                                <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-google-plus-g m-r-7"></i>
                                    Google+
                                </a>

                                <a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-pinterest-p m-r-7"></i>
                                    Pinterest
                                </a> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Leave a comment -->
                    <div>
                        <h4 class="f1-l-4 cl3 p-b-12">
                            Leave a Comment
                        </h4>

                        <p class="f1-s-13 cl8 p-b-40">
                            Your email address will not be published. Required fields are marked *
                        </p>

                        <form>
                            <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>

                            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

                            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

                            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

                            <button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                Post Comment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-md-10 col-lg-4 p-b-30">
                <div class="p-l-10 p-rl-0-sr991 p-t-70">						
                    <!-- Category -->
                    <div class="p-b-60">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Category
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @php
                                 $categories = App\Models\Category::orderBy('id','asc')->where('status','1')->get();
                            @endphp
                            @foreach ($categories as $item )
                            <li class="how-bor3 p-rl-4">
                                <a href="{{url('topic/'.$item->slug)}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                    {{$item->name}}
                                </a>
                            </li>
                            @endforeach                          

                           
                        </ul>
                    </div>

                    <!-- Archive -->
                    <div class="p-b-37">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Latest Post
                            </h3>
                        </div>
                        <ul class="p-t-32">
                            @foreach ($lastest_posts->take(3) as $item)
                            <li class="flex-wr-sb-s p-b-30">
                                <a href="{{url('topic/'.$item->category->slug.'/'.$item->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                    <img src="{{url('uploads/post/'.$item->image)}}" alt="IMG">
                                </a>

                                <div class="size-w-11">
                                    <h6 class="p-b-4">
                                        <a href="{{url('topic/'.$item->category->slug.'/'.$item->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{$item->short_detail}}
                                        </a>
                                    </h6>

                                    <span class="cl8 txt-center p-b-24">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            {{$item->category->name}}
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            {{$posts->created_at->format('M d, Y')}}
                                        </span>
                                    </span>
                                </div>
                            </li>
                            @endforeach                           
                        </ul>
                    </div>

                    <!-- Popular Posts -->
                    <div class="p-b-30">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Popular Post
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($post_popular->take(3) as $item)
                            <li class="flex-wr-sb-s p-b-30">
                                <a href="{{url('topic/'.$item->category->slug.'/'.$item->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                    <img src="{{url('uploads/post/'.$item->image)}}" alt="IMG">
                                </a>

                                <div class="size-w-11">
                                    <h6 class="p-b-4">
                                        <a href="{{url('topic/'.$item->category->slug.'/'.$item->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{$item->short_detail}}
                                        </a>
                                    </h6>

                                    <span class="cl8 txt-center p-b-24">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            {{$item->category->name}}
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            {{$posts->created_at->format('M d, Y')}}
                                        </span>
                                    </span>
                                </div>
                            </li>
                            @endforeach      

                          
                        </ul>
                    </div>

                    <!-- Tag -->
                    <div>
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