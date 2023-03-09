@extends('layouts.master')
@section('title')
    @if (isset($post))
        Posts update
    @else
        Posts create
    @endif
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">            
            <h1 class="page-header">                 
                <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
                {{-- <a href="{{route('categories.create')}}" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Import CSV</a>
                <a href="{{route('categories.create')}}" class="btn btn-warning"><i class="fa fa-upload" aria-hidden="true"></i> Export CSV</a> --}}
            </h1>
            
        </div>
        <!-- /.col-lg-12 -->
    </div>

 <!-- /.row -->
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 {{isset($post) ? 'Posts update ':'Posts create'}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Article</a>
                    </li>
                    <li><a href="#tags" data-toggle="tab">SEO Tags</a>
                    </li>                   
                </ul>
                <!-- Tab panes -->
                <form method="POST" action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    @if (isset($post))
                        @method('PUT')
                    @endif
                    <div class="tab-content">                       
                        <div class="tab-pane fade in active" id="home">
                            <h4 style="margin-top: 20px;">Home</h4>                            
                           
                            <div class="form-group">
                                <label>Category type <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id">
                                    <option  disabled selected>Select category</option>
                                    @if (isset($post))
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}" {{ $post->category_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    @else
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif                         
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input class="form-control" name="name" @if(isset($post)) value="{{$post->name}}" @endif placeholder="Post title" autofocus> 
                                {{-- <p class="help-block">Example block-level help text here.</p> --}}
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" @if(isset($post)) value="{{$post->slug}}" @endif placeholder="Post slug">
                            </div>                    
                            <div class="form-group">
                                <label>Short detail</label>
                                <input class="form-control" name="short_detail" @if(isset($post)) value="{{$post->short_detail}}" @endif placeholder="Short detail">
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <textarea class="form-control summernote" name="detail" rows="5">@if(isset($post)) {{$post->detail}} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="status">
                                    <option  disabled selected>Select status</option>
                                    <option value="1" @if(isset($post)) {{ $post->status == 1 ? 'selected' : '' }} @endif >Active</option>
                                    <option value="0" @if(isset($post))  {{ $post->status == 0 ? 'selected' : '' }} @endif>Inactive</option>
                                </select>
                            </div>  
                            <div class="form-group">
                                <label>Image thumbnail</label>
                                <input type="file" name="image" >
                                @if (isset($post))
                                    <div style="margin-top: 10px;">
                                        <img src="{{url('uploads/post/'.$post->image)}}"
                                        alt="image" style="max-width: 100px;">
                                    </div>
                                @endif
                            </div>   
                        </div>
                        <div class="tab-pane fade" id="tags">
                            <h4 style="margin-top: 20px;">SEO Tags</h4>
                            <div class="form-group">
                                <label>Meta title</label>
                                <input class="form-control" name="meta_title" @if(isset($post)) value="{{$post->meta_title}}" @endif placeholder="Meta title">
                            </div>                    
                            <div class="form-group">
                                <label>Meta keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="3">@if(isset($post)) {{$post->meta_keyword}} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta description</label>
                                <textarea class="form-control" name="meta_description" rows="3">@if(isset($post)) {{$post->meta_description}} @endif</textarea>
                            </div>
                        </div>                             
                    </div>
                    <button type="submit" class="btn btn-primary" >{{isset($post) ? 'Update':'Save posts'}}</button>
                </form>
                {{-- <form method="POST" action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    @if (isset($post))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label>Image thumbnail</label>
                        <input type="file" name="image">
                        @if (isset($post))
                            <div class="mt-4 ">
                                <img src="{{url('uploads/post/'.$post->image)}}"
                                alt="image" style="max-width: 100px;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Category type</label>
                        <select class="form-control" name="category_id">
                            <option  disabled selected>Select category</option>
                            @if (isset($post))
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{ $post->category_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            @else
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            @endif                         
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="name" @if(isset($post)) value="{{$post->name}}" @endif placeholder="Post title" autofocus> 
                     
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" name="slug" @if(isset($post)) value="{{$post->slug}}" @endif placeholder="Categories slug">
                    </div>                    
                    <div class="form-group">
                        <label>Short detail</label>
                        <textarea class="form-control" name="detail" rows="3">@if(isset($post)) {{$post->short_detail}} @endif</textarea>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="detail" rows="5">@if(isset($post)) {{$post->detail}} @endif</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option  disabled selected>Select status</option>
                            <option value="1" @if(isset($post)) {{ $post->status == 1 ? 'selected' : '' }} @endif >Active</option>
                            <option value="0" @if(isset($post))  {{ $post->status == 0 ? 'selected' : '' }} @endif>Inactive</option>
                        </select>
                    </div>
                    <label>SEO Tags</label>
                    <div class="form-group">
                        <label>Meta title</label>
                        <input class="form-control" name="meta_title" @if(isset($post)) value="{{$post->meta_title}}" @endif placeholder="Meta title">
                    </div>                    
                    <div class="form-group">
                        <label>Meta keyword</label>
                        <textarea class="form-control" name="meta_keyword" rows="3">@if(isset($post)) {{$post->meta_keyword}} @endif</textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta description</label>
                        <textarea class="form-control" name="meta_description" rows="3">@if(isset($post)) {{$post->meta_description}} @endif</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" >{{isset($post) ? 'Update':'Save posts'}}</button>
                </form> --}}
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

</div>
@endsection
