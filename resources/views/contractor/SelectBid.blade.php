@extends('layouts.app')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <br/>
            <section class="panel panel-default">
                <header class="panel-heading">
                   <strong> {{$advert->user->name}} </strong> <br>
                   Project Title: {{strtoupper($advert->introduction)}} <br>
                   Advert Type: {{strtoupper($advert->advert_type)}}
                </header>
                <form class="bs-example form-horizontal" action="{{route('storesales')}}" method="POST">

                    <input type="hidden" value="{{$advert->id}}" name="advertId"/>
                    <input type="hidden" name="advert_name" value="{{$advert->name}}" >
                        <input type="hidden" name="advert_introduction" value="{{$advert->introduction}}" >
                        <input type="hidden" name="mda_id" value="{{$advert->user->id}}" >
                        <input type="hidden" name="mda_name" value="{{$advert->user->name}}" >
                        <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                    
                    
                            <thead>
                                <tr>
                                <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input disabled type="checkbox"><i></i></label></th>
                                <th data-toggle="class">Lot</th>
                                <th>Lot Description</th>
                                <th>Category</th>
                                <th>Amount</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                
                                @foreach($advert->advertLot as $lot)
                                         
                                    <tr>
                                        <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="fids[]" value="{{$lot->id}}"><i></i></label></td>
                                        <td>Lot</td>
                                        <td>{{$lot->description}}</td>
                                        <td>{{$lot->category_name}}</td>
                                        <td>{{$lot->lot_amount}}</td>
                                         
                                    </tr>
                                     
                                @endforeach
                        
                            </tbody>
                        </table>
                    </div>
                    <br/>
                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                    <div class="col-md-6">
                            <!-- <a href="{{ route('newMdaAdvert') }}" class="btn btn-default">Back to Lots</a> -->
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary">Apply For Tender</button>
                            <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />

                        </div>
                    </div>
                    <br/>
                </section>
            </form>

        </section>
    </section>
</section>
@endsection

