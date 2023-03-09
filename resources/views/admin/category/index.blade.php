@extends('layouts.master')
@section('title','Categories')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">            
            <h1 class="page-header">                 
                <a href="{{route('categories.create')}}" class="btn btn-outline btn-primary"><i class="fa fa-plus fa-fw"></i> Create new</a>
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
                    All categories
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>N0</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Order</th>
                                    <th>Created at</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($categories as $key => $item)
                                    <tr class="odd gradeX">
                                        <td>{{++$key}}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{url('uploads/category/'.$item->image)}}" alt="image" style="max-width: 50px;">
                                            @else
                                                --
                                            @endif
                                            
                                        </td>
                                        <td>{{$item->name??'--'}}</td>
                                        <td>{{$item->description??'--'}}</td>
                                        <td>{{$item->order??'--'}}</td>
                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
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
                                          <form action="{{route('categories.destroy',$item->id)}}" method="POST">
                                            <a href="{{route('categories.show',$item->id)}}" class="btn  btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('categories.edit',$item->id)}}" class="btn  btn-warning"><i class="fa fa-edit"></i></a>
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

@if (session('message'))
    @section('script')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{!! Session::get('message') !!}',
            showConfirmButton: false,
            timer: 1500
        })  

        // Swal.fire(
        // 'Good job!',
        // '{!! Session::get('message') !!}',
        // 'success')
    </script>
    
    @endsection
@endif