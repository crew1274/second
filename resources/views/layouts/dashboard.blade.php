@extends('layouts.plane')

@section('body')
 <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('dashboard') }}">{{ config('app.name', 'DAE Client') }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                          <div class="container">
          @if (Session::has('message'))
              <div class="flash alert">
                  <p>{{ Session::get('message') }}</p>
              </div>
          @endif
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>{{trans('messages.email')}}</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-server fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                           <a href="{{ url('/link') }}">
                                <div>
                                    <i class="fa fa-link"></i> {{ trans('dashboard.link') }}
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-language"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/lang/zh') }}">
                                <div>
                                    <i class="fa fa-globe fa-fw"></i> 中文
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/lang/en') }}">
                                <div>
                                    <i class="fa fa-globe fa-fw"></i> English
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                        <a href="{{ url('profile') }}"><i class="fa fa-user fa-fw"></i>
                            {{ Auth::user()->name }}{{ trans('dashboard.profile') }}</a>
                        </li>

                        <li>
                        <a href="{{ url('location') }}"><i class="fa fa-map-marker fa-fw"></i>
                            {{ trans('dashboard.location') }}</a>  
                        </li>

                        <li class="divider"></li>

                        <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i>{{ trans('dashboard.logout') }}</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">  {{ csrf_field() }}  </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ url ('dashboard') }}"><i class="fa fa-home fa-fw"></i> {{ trans('dashboard.home') }}</a>
                        </li>
                        <li class="{{ Request::is('record') ? 'active' : '' }}">
                            <a href="{{ url ('record') }}"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('dashboard.record') }}</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="{{ Request::is('boot') ? 'active' : '' }}">
                            <a href="{{ url ('boot') }}"><i class="fa fa-cogs fa-fw"></i> {{ trans('dashboard.initial_setting') }}</a>
                        </li>

                        <li class="{{ Request::is('peaktime') ? 'active' : '' }}">
                            <a href="{{ url ('peaktime') }}"><i class="fa fa-edit fa-fw">
                            </i> {{ trans('dashboard.peak_time_config') }}</a>
                        </li>

                        <li class="{{ Request::is('network') ? 'active' : '' }}">
                            <a href="{{ url ('network') }}"><i class="fa fa-wifi"></i>{{ trans('dashboard.network')}}</a>
                        </li>

                            <li >
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>
                                {{ trans('dashboard.demand_respond')}}<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li class="{{ Request::is('demand') ? 'active' : '' }}">
                                        <a href="{{ url ('demand') }}">
                                        </i>一般設定</a>
                                    </li>
                                    <li class="{{ Request::is('offload') ? 'active' : '' }}">
                                        <a href="{{ url ('offload') }}">
                                        </i>卸載群組設定</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        <!--
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('panels') }}">Panels and Collapsibles</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('buttons' ) }}">Buttons</a>
                                </li>
                                <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                                    <a href="{{ url('notifications') }}">Alerts</a>
                                </li>
                                <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('typography') }}">Typography</a>
                                </li>
                                <li {{ (Request::is('*icons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('icons') }}"> Icons</a>
                                </li>
                                <li {{ (Request::is('*grid') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('grid') }}">Grid</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('blank') }}">Blank Page</a>
                                </li>
                                <li>
                                    <a href="{{ url ('login') }}">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <li class="{{ Request::is('control') ? 'active' : '' }}">
                            <a href="{{ url ('control') }}"><i class="fa fa-bolt fa-fw"></i> {{ trans('dashboard.control') }}</a>
                        </li>
                        
                        <li class="{{ Request::is('documentation') ? 'active' : '' }}">
                            <a href="{{ url ('documentation') }}" target="_blank"><i class="fa fa-file-word-o fa-fw"></i> {{ trans('dashboard.documentation') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop
