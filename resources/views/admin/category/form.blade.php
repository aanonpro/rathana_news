@extends('layouts.master')
@section('title')
    @if (isset($category))
        Categories update
    @else
        Categories create
    @endif
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">            
            <h1 class="page-header">                 
                <a href="{{route('categories.index')}}" class="btn btn-danger">Back</a>
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
                 {{isset($category) ? 'Categories update ':'Categories create'}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form method="POST" action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" enctype="multipart/form-data">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" @if(isset($category)) value="{{$category->name}}" @endif placeholder="Categories name" autofocus> 
                        {{-- <p class="help-block">Example block-level help text here.</p> --}}
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" @if(isset($category)) value="{{$category->slug}}" @endif placeholder="Categories slug">
                    </div>  
                    <div class="form-group">
                        <label>Describe</label>
                        <textarea class="form-control" name="description" rows="3">@if(isset($category)) {{$category->description}} @endif</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option  disabled selected>Select status</option>
                            <option value="1" @if(isset($category)) {{ $category->status == 1 ? 'selected' : '' }} @endif >Active</option>
                            <option value="0" @if(isset($category))  {{ $category->status == 0 ? 'selected' : '' }} @endif>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image">
                        @if (isset($category))
                            <div style="margin-top: 10px;">
                                <img src="{{url('uploads/category/'.$category->image)}}"
                                alt="image" style="max-width: 100px;">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary" >{{isset($category) ? 'Update':'Save categories'}}</button>
                </form>
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

  @if ($errors->any())
    @foreach ($errors->all() as $error)
        @section('script')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{!! $error !!}'
            })
          
        </script>
        @endsection
    @endforeach
@endif