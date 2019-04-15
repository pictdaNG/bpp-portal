@extends('layouts.app')

@section('content')
<section class="hbox stretch">
    <section>
        <section class="vbox">
        <section class="scrollable padder">              
            <section class="row m-b-md">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">Dashboard</h3>
                <small>Welcome back, {{ Auth::user()->name }}</small>
            </div>
            <div class="col-sm-6 text-right text-left-xs m-t-md">
                <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a>
            </div>
            </section>
            <div class="row">
            <div class="col-sm-6">
                <div class="panel b-a">
                <div class="row m-n">
                    <div class="col-md-6 b-b b-r">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                        <i class="i i-plus2 i-1x text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-danger">{{$adverts}}</span>
                        <small class="text-muted text-u-c">Adverts Published</small>
                        </span>
                    </a>
                    </div>
                    <div class="col-md-6 b-b">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                        <i class="i i-users2 i-sm text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-success">0</span>
                        <small class="text-muted text-u-c">Bids Submitted</small>
                        </span>
                    </a>
                    </div>
                    <div class="col-md-6 b-b b-r">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                        <i class="i i-location i-sm text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-info">{{sizeof($closingBids)}}</span>
                        <small class="text-muted text-u-c">Bids Closing in 7 Days</small>
                        </span>
                    </a>
                    </div>
                    <div class="col-md-6 b-b">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                        <i class="i i-alarm i-sm text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-primary">{{$percent_status['percentage']}}%</span>
                        <small class="text-muted text-u-c">Registration Progress</small>
                        </span>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="panel b-a">
                <div class="panel-heading no-border bg-primary lt text-center">
                    <a href="#">
                    <i class="fa fa-briefcase fa fa-3x m-t m-b text-white"></i>
                    </a>
                </div>
                <div class="padder-v text-center clearfix">                            
                    <div class="col-xs-12">
                    <div class="h3 font-bold">{{$jobs['constructions']}}</div>
                    <small class="text-muted">Construction | Works</small>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="panel b-a">
                <div class="panel-heading no-border bg-info lter text-center">
                    <a href="#">
                    <i class="fa fa-briefcase fa fa-3x m-t m-b text-white"></i>
                    </a>
                </div>
                <div class="padder-v text-center clearfix">                            
                    <div class="col-xs-12">
                    <div class="h3 font-bold">{{$jobs['consultancy']}}</div>
                    <small class="text-muted">Consultancy | Services</small>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="panel b-a">
                <div class="panel-heading no-border bg-primary lt text-center">
                    <a href="#">
                    <i class="fa fa-briefcase fa fa-3x m-t m-b text-white"></i>
                    </a>
                </div>
                <div class="padder-v text-center clearfix">                            
                    <div class="col-xs-12">
                    <div class="h3 font-bold">{{$jobs['supplies']}}</div>
                    <small class="text-muted">Goods | Supplies</small>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="row">

            <div class="col-md-6"> <!-- See portlet.html -->
              <section class="panel panel-success portlet-item">
                <header class="panel-heading">
                <b>Business Registration Status</b>
                </header>
                <ul class="list-group alt">
                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['companies'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                     
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Company Identification</a></div>
                        @if($percent_status['companies'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                        @if($percent_status['compliances'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Business Registration & Compliance</a></div>
                        @if($percent_status['compliances'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['directors'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Company Board of Directors</a></div>
                        @if($percent_status['directors'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['categories'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Business Category</a></div>
                        @if($percent_status['categories'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['personnels'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Company Staff/Personnel</a></div>
                        @if($percent_status['personnels'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>

                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['jobs'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Projects Executed</a></div>
                        @if($percent_status['jobs'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>

                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['finances'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Company Financial Statements</a></div>
                        @if($percent_status['finances'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>

                  <li class="list-group-item">
                    <div class="media">
                      <span class="pull-left thumb-sm"><img src="{{ asset('/images/p0.jpg') }}" alt="..." class="img-circle"></span>
                      @if($percent_status['machines'])
                        <div class="pull-right text-success m-t-sm">
                         @else 
                          <div class="pull-right text-muted m-t-sm"> 
                         @endif
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="#">Equipment/Machineries</a></div>
                        @if($percent_status['machines'])
                        <small class="text-muted">Completed</small>
                         @else 
                          <small class="text-muted">Not Completed</small>
                         @endif
                      </div>
                    </div>
                  </li>
                  
                </ul>
              </section>
            </div>

            <div class="col-md-6">
              <section class="panel panel-info portlet-item">
                <header class="panel-heading">
                <b>Recently Advertised Bids</b>
                </header>
                <section class="panel-body">
                    <!-- When you have Content -->
                    <div class="line pull-in"></div>
                    @if(sizeof($activeAdverts) >0)
                    @foreach($activeAdverts as $advert)
                    <article class="media">
                        <span class="pull-left thumb-sm"><i class="fa fa-file-o fa-3x icon-muted"></i></span>                
                        <div class="media-body">
                        <div class="pull-right media-xs text-center text-muted">
                            <?php $date = Carbon\Carbon::parse($advert->date_published);  $newDate = $date->isoFormat('MMM Do'); ?>
                            <strong class="h4">{{explode(" ", $newDate)[1]}}</strong><br>
                            <small class="label bg-light">{{explode(" ", $newDate)[0]}}</small>
                        </div>
                        <a href="#" class="h4">{{$advert->name}}</a>
                        <small class="block"><a href="#" class="">{{$advert->user->name}}</a></small>
                        <small class="block m-t-sm">{{$advert->introduction}}</small>
                        </div>
                    </article>
                    @endforeach
                    @else
                    <small class="block m-t-sm">No bids available</small>
                    @endif
                </section>
              </section>
            </div>

            <div class="col-md-6">

            <section class="panel panel-primary portlet-item">
                <header class="panel-heading">
                <b>Bids Submitted</b>
                </header>
                <section class="panel-body">
                    <!-- When you have Content -->
                    <div class="line pull-in"></div>
                    <article class="media">
                        <span class="pull-left thumb-sm"><i class="fa fa-file-o fa-3x icon-muted"></i></span>                
                        <div class="media-body">
                        <div class="pull-right media-xs text-center text-muted">
                            <strong class="h4">17</strong><br>
                            <small class="label bg-light">FEB</small>
                        </div>
                        <a href="#" class="h4">Plateau State Polytechnic</a>
                        <small class="block"><a href="#" class="">Retnan Daser</a></small>
                        <small class="block m-t-sm">There are a few easy ways to quickly get started with Bootstrap, each one appealing to a different skill level and use case. Read through to see what suits your particular needs.</small>
                        </div>
                    </article>

                    <div class="line pull-in"></div>
                    <article class="media">
                        <span class="pull-left thumb-sm"><i class="fa fa-file-o fa-3x icon-muted"></i></span>                
                        <div class="media-body">
                        <div class="pull-right media-xs text-center text-muted">
                            <strong class="h4">17</strong><br>
                            <small class="label bg-light">FEB</small>
                        </div>
                        <a href="#" class="h4">Construction of Lecture Theatre UniJos</a>
                        <small class="block"><a href="#" class="">Logical Address Ltd.</a></small>
                        <small class="block m-t-sm">There are a few easy ways to quickly get started with Bootstrap, each one appealing to a different skill level and use case. Read through to see what suits your particular needs.</small>
                        </div>
                    </article>
                </section>
              </section>
            </div>

            </div>
        </section>
        </section>
    </section>
    <!-- side content -->
    <aside class="aside-md bg-black hide" id="sidebar">
        <section class="vbox animated fadeInRight">
            <section class="scrollable">
                <div class="wrapper"><strong>Live feed</strong></div>
            </section>
        </section>              
    </aside>
    <!-- / side content -->
    </section>
@endsection
