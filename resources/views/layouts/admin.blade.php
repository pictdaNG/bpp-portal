<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="app">
<head>  
  <meta charset="utf-8" />
  <title>{{ config('app.name', 'e-Procurement Portal') }}</title>
  <meta name="description" content="e-Procurement Services" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/icon.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" />  
  <link rel="stylesheet" href="{{ asset('/js/calendar/bootstrap_calendar.css') }}" type="text/css" />
  <!-- eddie added these three jquery files below -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <!--[if lt IE 9]>
    <script src="{{ asset('js/ie/html5shiv.js') }}"></script>
    <script src="{{ asset('js/ie/respond.min.js') }}"></script>
    <script src="{{ asset('js/ie/excanvas.js') }}"></script>
  <![endif]-->
</head>
<body class="" >
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="/" class="navbar-brand">
          <img src="{{ asset('/images/logo.png') }}" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">PBPP</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-grid"></i>
          </a>
          <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
            <div class="row m-l-none m-r-none m-t m-b text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-mail i-2x text-primary-lt"></i>
                    </span>
                    <small class="text-muted">Mailbox</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-calendar i-2x text-danger-lt"></i>
                    </span>
                    <small class="text-muted">Calendar</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-map i-2x text-success-lt"></i>
                    </span>
                    <small class="text-muted">Map</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-paperplane i-2x text-info-lt"></i>
                    </span>
                    <small class="text-muted">Trainning</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-images i-2x text-muted"></i>
                    </span>
                    <small class="text-muted">Photos</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-clock i-2x text-warning-lter"></i>
                    </span>
                    <small class="text-muted">Timeline</small>
                  </a>
                </div>
              </div>
            </div>
          </section>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Search...">            
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <!--
        <li class="hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-chat3"></i>
            <span class="badge badge-sm up bg-danger count">2</span>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </div>
              <div class="list-group list-group-alt">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <div class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </div>
            </section>
          </section>
        </li>
        -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="{{ asset('/images/p0.jpg') }}" alt="...">
            </span>
            <b>{{ Auth::user()->name }}</b> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            <li>
              <span class="arrow top"></span>
              <a href="#">Settings</a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{{ route('logout') }}" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="{{ asset('/images/p0.jpg') }}" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt">{{ Auth::user()->name }}</strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block">{{ Auth::user()->user_type }}</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                      
                      <li>
                        <span class="arrow top hidden-nav-xs"></span>
                        <a href="">Settings</a>
                      </li>
                      <li>
                        <a href="">Help</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="{{ route('logout') }}" >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Pre Bidding Excercise</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li  class="active">
                      <a href="{{ route('home') }}" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold">Dashboard</span>
                      </a>
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Procurement Plan</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Bidding Documents</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Bid Adverts</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Bid Opening</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Transactions</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Projects</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Certificates</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="{{ route('manageMDA') }}" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">MDA Accounts</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Reports</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="{{ route('contractorReport') }}" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Contractors</span>
                          </a>
                        </li>
                    </ul>
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Support</span>
                      </a>
                      <!-- <ul class="nav dk">
                        <li >
                          <a href="/contractor/registration" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul> -->
                    </li>

                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Administrative Tools</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="{{ route('tools.compliance')}}" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company Registration</span>
                          </a>
                        </li>
                    </ul>
                    </li>

                    <li >
                      <a href="{{ route('logout') }}" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-lab icon">
                        </i>
                        <span class="font-bold">Log Out</span>
                      </a>
                    </li>

                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="{{ route('logout') }}" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          @yield('content')
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- App -->
  <script src="{{ asset('js/app.js') }}"></script>  
  <script src="{{ asset('js/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/charts/easypiechart/jquery.easy-pie-chart.js') }}"></script>
  <script src="{{ asset('js/charts/sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('js/charts/flot/jquery.flot.min.js') }}"></script>
  <script src="{{ asset('js/charts/flot/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{ asset('js/charts/flot/jquery.flot.spline.js') }}"></script>
  <script src="{{ asset('js/charts/flot/jquery.flot.pie.min.js') }}"></script>
  <script src="{{ asset('js/charts/flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('js/charts/flot/jquery.flot.grow.js') }}"></script>
  <script src="{{ asset('js/charts/flot/demo.js') }}"></script>

  <script src="{{ asset('js/calendar/bootstrap_calendar.js') }}"></script>
  <script src="{{ asset('js/calendar/demo.js') }}"></script>

  <script src="{{ asset('js/sortable/jquery.sortable.js') }}"></script>
  <script src="{{ asset('js/app.plugin.js') }}"></script>
  <script>
  $( document ).ready(function() {
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    })
  });
  </script>
</body>
</html>