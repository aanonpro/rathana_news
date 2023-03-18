@extends('frontend.layout.main')
@section('title')
@if (isset($posts))
    thonea | {{$posts->name}}
@endif
@endsection

@section('contents')
<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{url('')}}" class="breadcrumb-item f1-s-3 cl9">
                Home 
            </a>

            {{-- <a href="{{ url('topic/'.$categories->slug) }}" class="breadcrumb-item f1-s-3 cl9">
                {{$categories->name}} 
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                 {{$posts->short_detail}}
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

<!-- Content -->
<section class="bg0 p-b-140 p-t-10">
    <div class="container">
        <div class="row justify-content-center">
           <h3>Sorry!! This current page are developing </h3>             
            <a href="{{url('')}}" class="btn btn-outline-success ml-4"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Go Back</a>
            
        </div>
    </div>
</section>

@endsection