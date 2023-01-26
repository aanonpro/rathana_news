<style>
    li.active{
        background-color: rgb(226, 229, 231) !important;
    }
   
    li a:hover{
        background-color: rgb(226, 229, 231) !important;
    }
</style>
<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="  {{Request::is('admin/dashboard') ? 'active':'' }}">
                <a  href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Categories page<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level {{ Request::is('admin/categories*') ? 'collapse in':''}} ">
                    <li  class=" {{ Request::is('admin/categories*') ? 'active':'' }}">
                        <a href="{{route('categories.index')}}" class=" {{Request::is('admin/categories*')  ? 'active':'' }}">Categories</a>
                    </li>
                        
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->