@extends('layouts.mda')

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
            
            <div class="col-md-2 col-sm-6">
                <div class="panel b-a">
                <div class="panel-heading no-border bg-primary lt text-center">
                    <a href="#">
                    <i class="fa fa-briefcase fa fa-3x m-t m-b text-white"></i>
                    </a>
                </div>
                <div class="padder-v text-center clearfix">                            
                    <div class="col-xs-12">
                    <div class="h3 font-bold">0</div>
                    <small class="text-muted">Construction/Works</small>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="panel b-a">
                <div class="panel-heading no-border bg-success lter text-center">
                    <a href="#">
                    <i class="fa fa-briefcase fa fa-3x m-t m-b text-white"></i>
                    </a>
                </div>
                <div class="padder-v text-center clearfix">                            
                    <div class="col-xs-12">
                    <div class="h3 font-bold">0</div>
                    <small class="text-muted">Consultancy/Services</small>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="panel b-a">
                <div class="panel-heading no-border bg-info lt text-center">
                    <a href="#">
                    <i class="fa fa-briefcase fa fa-3x m-t m-b text-white"></i>
                    </a>
                </div>
                <div class="padder-v text-center clearfix">                            
                    <div class="col-xs-12">
                    <div class="h3 font-bold">0</div>
                    <small class="text-muted">Goods/Supply</small>
                    </div>
                </div>
                </div>
            </div>
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
                        <span class="h3 block m-t-xs text-danger">0</span>
                        <small class="text-muted text-u-c">Application Submitted</small>
                        </span>
                    </a>
                    </div>
                    <div class="col-md-6 b-b">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-primary-lt hover-rotate"></i>
                        <i class="i i-users2 i-sm text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-primary">0</span>
                        <small class="text-muted text-u-c">Adverts Published</small>
                        </span>
                    </a>
                    </div>
                    <div class="col-md-6 b-b b-r">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-success hover-rotate"></i>
                        <i class="i i-location i-sm text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-success">N0.00</span>
                        <small class="text-muted text-u-c">Revenue Generated</small>
                        </span>
                    </a>
                    </div>
                    <div class="col-md-6 b-b">
                    <a href="#" class="block padder-v hover">
                        <span class="i-s i-s-2x pull-left m-r-sm">
                        <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                        <i class="i i-alarm i-sm text-white"></i>
                        </span>
                        <span class="clear">
                        <span class="h3 block m-t-xs text-info">0</span>
                        <small class="text-muted text-u-c">No of Bids Bought</small>
                        </span>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6">
              <section class="panel panel-info portlet-item">
                <header class="panel-heading">
                <b>All Bids Advertised</b>
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
                        <a href="#" class="h4">Federal Polytechnic Nassarawa</a>
                        <small class="block"><a href="#" class="">Eddie Bigs</a></small>
                        <small class="block m-t-sm">Contractors/Supplier/Consultants for 2014 Budget Implementation of the fund</small>
                        </div>
                    </article>
                </section>
              </section>
            </div>

            <div class="col-md-6">
            <section class="panel panel-success portlet-item">
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
