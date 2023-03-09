@extends('layouts.master')
@section('title','Post view')
@section('content')
<style>

.detail,.title {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 200px;
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">            
            <h1 class="page-header">                 
                <a href="{{route('posts.create')}}" class="btn btn-outline btn-primary"><i class="fa fa-plus fa-fw"></i> Create new</a>
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
                    All posts
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>N0</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Short Detail</th>
                                    <th>Tags</th>
                                    <th>Views</th>
                                    <th>Created at</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($posts as $key => $item)
                                    <tr class="odd gradeX">
                                        <td>{{++$key}}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{url('uploads/post/'.$item->image)}}" alt="image" style="max-width: 50px;">
                                            @else
                                                --
                                            @endif
                                            
                                        </td>
                                        <td>{{$item->category->name}}</td>
                                        <td class="title">{{$item->name??'--'}}</td>
                                        <td class="detail">{!!$item->short_detail??'--'!!}</td>
                                        <td>{{$item->tags??'--'}}</td>
                                        <td>{{$item->views ?? 0}}</td>
                                        <td>{{$item->created_at->format('M d, Y')}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary ">
                                                {{$item->user->name}}
                                            </button>
                                        </td>
                                        <td class="center">
                                            @if ($item->status==1)
                                            <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                                            </button>
                                            @else
                                            <button type="button" class="btn btn-danger  btn-circle"><i class="fa fa-times"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td class="text-center">                                           
                                          <form action="{{route('posts.destroy',$item->id)}}" method="POST">
                                            <a href="{{route('posts.show',$item->id)}}" class="btn  btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('posts.edit',$item->id)}}" class="btn  btn-warning"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn  btn-danger "><i class="fa fa-trash-o"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                                            
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  
</div>
<!-- /#page-wrapper -->

@endsection