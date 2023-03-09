<!-- Header -->
<header>
    <style>
        .active{
            color: #17b978 !important;
        }
    </style>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span>
                            New York, NY
                        </span>

                        <img class="m-b-1 m-rl-8" src="{{url('')}}/frontend/images/icons/icon-night.png" alt="IMG">

                        <span>
                            HI 58° LO 56°
                        </span>
                    </span>

                    <a href="{{url('about')}}" class="left-topbar-item">
                        About
                    </a>

                    <a href="{{url('contact')}}" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="{{url('register')}}" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="{{url('login')}}" class="left-topbar-item">
                        Log in
                    </a>
                </div>

                <div class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->		
            <div class="logo-mobile">
                <a href="{{url('')}}"><img src="{{url('')}}/frontend/images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span>
                            New York, NY
                        </span>

                        <img class="m-b-1 m-rl-8" src="{{url('')}}/frontend/images/icons/icon-night.png" alt="IMG">

                        <span>
                            HI 58° LO 56°
                        </span>
                    </span>
                </li>

                <li class="left-topbar">
                    <a href="{{url('about')}}" class="left-topbar-item">
                        About
                    </a>

                    <a href="{{url('contact')}}" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="{{url('register')}}" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="{{url('login')}}" class="left-topbar-item">
                        Log in
                    </a>
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{url('')}}">Home</a>
                   
                </li>

                <li>
                    <a href="#!">News</a>
                </li>

                <li>
                    <a href="#!">Entertainment </a>
                </li>

                <li>
                    <a href="#!">Business</a>
                </li>

                <li>
                    <a href="#!">Travel</a>
                </li>

                <li>
                    <a href="#!">Life Style</a>
                </li>

                <li>
                    <a href="#!">Video</a>
                </li>

                <li>
                    <a href="#">Features</a>
                </li>
            </ul>
        </div>
        
        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->		
            <div class="logo">
                <a href="{{url('')}}"><img src="{{url('')}}/frontend/images/icons/logo-01.png" alt="LOGO"></a>
            </div>	

            <!-- Banner -->
            <div class="banner-header">
                <a href="#!"><img src="{{url('')}}/frontend/images/banner-01.jpg" alt="IMG"></a>
            </div>
        </div>	
        
        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="{{url('')}}">
                        <img src="{{url('')}}/frontend/images/icons/logo-01.png" alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li class="main-menu-active">
                            <a href="{{url('')}}" class="{{ Request::is('/') ? 'active ':'' }}">Home</a>
                        </li>
                        @php
                            $categories = App\Models\Category::where('status',1)->orderBy('created_at','ASC')->get();
                        @endphp
                        @foreach ($categories as $item)
                            <li class="mega-menu-item  ">
                                <a  href="{{ url('topic/'.$item->slug) }}" class="{{ Request::is('topic/'.$item->slug) || Request::is('topic/'.$item->slug.'/*') ? 'active a::before':'' }}">
                                   {{$item->name}}
                                </a>
                            </li>
                        @endforeach
                       

                        {{-- <li class="mega-menu-item">
                            <a href="#!">Entertainment </a>

                        </li>

                        <li class="mega-menu-item">
                            <a href="#!">Business</a>

                        </li>

                        <li class="mega-menu-item">
                            <a href="#!">Travel</a>

                        </li>

                        <li class="mega-menu-item">
                            <a href="#!">Life Style</a>

                        </li>

                        <li class="mega-menu-item">
                            <a href="#!">Video</a>

                           
                        </li>

                        <li>
                            <a href="#">Features</a>
                            
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </div>	
    </div>
</header>