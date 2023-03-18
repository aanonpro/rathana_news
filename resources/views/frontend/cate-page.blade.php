@extends('frontend.layout.main')
@section('title')
@if (isset($categories))
    thonea | {{$categories->name}}
@endif
@endsection
@section('contents')
<style>
    .page-item.active .page-link{
        background-color: #17b978;
        border-color: #17b978;
        color: #fff;
        margin: 0px 12px 0px 12px;
    }
    .page-link{
        font-family: Roboto-Regular;
        font-size: 13px;
        line-height: 1.5;
        color: #808080;
        width: 36px;
        height: 36px;
        border: 1px solid #e9e9e9;
        border-radius: 50%;
    }
    .page-link:hover{
        background-color: #17b978;
        border-color: #17b978;
        color: #fff;
    }
    .page-item:first-child .page-link {
        /* margin-left: 0; */
        border-radius: 50%;
        display: none;
        /* border-bottom-left-radius: 0.25rem; */
    }

    .page-item:last-child .page-link {        
        border-radius: 50%;
        display: none;
        /* border-bottom-right-radius: 0.25rem; */
    }

    .wrap-pic-w > img {
    width: 100%;
}
</style>
<!-- Breadcrumb -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{url('')}}" class="breadcrumb-item f1-s-3 cl9">
                Home 
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                {{$categories->name}}
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

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        {{$categories->name}}
    </h2>
</div>

<!-- Post -->
<section class="bg0 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">
                <div class="row">
                    @forelse ($posts as $item)                        
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <!-- Item latest -->	
                        <div class="m-b-45">
                            <a href="{{ url('topic/'.$categories->slug.'/'.$item->slug)  }}" class="wrap-pic-w hov1 trans-03 ">
                                <img class="bg-img1 size-a-4 how1 pos-relative" src="{{url('uploads/post/'.$item->image)}}" alt="image" >
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="{{ url('topic/'.$categories->slug.'/'.$item->slug)  }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{$item->short_detail}}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
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
                    @empty
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <h2>{{$categories->name}}  no post available</h2>
                    </div>
                    @endforelse

                </div>

                <!-- Pagination -->
                <div class="flex-wr-s-c m-rl--7 p-t-15">
                    {!! $posts->appends($_GET)->links() !!}
                    {{-- <a href="#" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active">1</a>
                    <a href="#" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7">2</a> --}}
                </div>
            </div>

            <div class="col-md-10 col-lg-4 p-b-80">
                <div class="p-l-10 p-rl-0-sr991">							
                    <!-- Subscribe -->
                    {{-- <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
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
                    </div> --}}

                    <!-- Most Popular -->
                    <div class="p-b-23">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Most Popular
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @forelse ($post_popular->take(5) as $key => $item)
                                
                            <li class="flex-wr-sb-s p-b-22">
                                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                    {{++$key}}
                                </div>

                                <a href="{{url('topic/'.$item->category->slug.'/'.$item->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                   {{$item->name}}
                                </a>
                            </li>
                            @empty
                            <li class="flex-wr-sb-s p-b-22">
                                <h2>{{$categories->name}} no post available</h2>
                            </li>
                            @endforelse
                            
                        </ul>
                    </div>

                    <!--  -->
                    <div class="flex-c-s p-b-50">
                        <a href="#">
                            <img class="max-w-full" src="{{url('')}}/frontend/images/banner-02.jpg" alt="IMG">
                        </a>
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