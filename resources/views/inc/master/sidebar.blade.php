<!--
====================================
——— LEFT SIDEBAR WITH FOOTER
=====================================
-->
<aside class="left-sidebar bg-sidebar">
<div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
    <a href="{{url('/')}}" data-toggle="tooltip" title="Assignment Submission System">
        <svg
        class="brand-icon"
        xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="xMidYMid"
        width="30"
        height="33"
        viewBox="0 0 30 33"
        >
        <g fill="none" fill-rule="evenodd">
            <path
            class="logo-fill-blue"
            fill="#7DBCFF"
            d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
            />
            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
        </g>
        </svg>
        <span class="brand-name">{{ config('app.name', 'Laravel') }}</span>
    </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">

    <!-- sidebar menu -->
    <ul class="nav sidebar-inner" id="sidebar-menu">

        <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Dashboard</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="dashboard" data-parent="#sidebar-menu">
                <div class="sub-menu">
                    <li >
                        <a class="sidenav-item-link" href="{{url('/')}}">
                            <span class="nav-text">Home</span>
                        </a>
                    </li>
                    <li >
                        <a class="sidenav-item-link" href="{{url('/master')}}">
                            <span class="nav-text">Status</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>



        <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users">
                <i class="mdi mdi-account-group"></i>
                <span class="nav-text">Users</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="users" data-parent="#sidebar-menu">
                <div class="sub-menu">
                    <li >
                        <a class="sidenav-item-link" href="{{url('/master/users')}}">
                            <span class="nav-text">List</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#posts" aria-expanded="false" aria-controls="posts">
                <i class="mdi mdi-note"></i>
                <span class="nav-text">Posts</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="posts" data-parent="#sidebar-menu">
                <div class="sub-menu">
                    <li >
                        <a class="sidenav-item-link" href="{{url('/master/posts/list')}}">
                            <span class="nav-text">List</span>
                        </a>
                    </li>
                    <li >
                        <a class="sidenav-item-link" href="{{url('/master/posts/expired')}}">
                            <span class="nav-text">Expired</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>



    </ul>

    </div>
</div>
</aside>
