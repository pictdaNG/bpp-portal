@extends('layouts.app')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <br/>
            <section class="panel panel-default">
                <header class="panel-heading">
                  <p> <strong> {{$advert->user->name}} </strong> </p>
                  <p> Project Title: {{strtoupper($advert->introduction)}} </p>
                  <p> Advert Type: {{strtoupper($advert->advert_type)}} </p>
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
                            <tbody id="lots">
                                @if(sizeof($advert->advertLot) > 0)
                                @foreach($advert->advertLot as $lot)
                                         
                                    <tr>
                                        <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="fids[]" value="{{$lot->id}}"><i></i></label></td>
                                        <td>Lot</td>
                                        <td>{{$lot->description}}</td>
                                        <td>{{$lot->category_name}}</td>
                                        <td>{{number_format($lot->lot_amount)}}</td>
                                         
                                    </tr>
                                     
                                @endforeach
                                @else 
                                    <tr>
                                        
 
                                        <td colspan="5">{{'NO Lot Found'}}</td>
                                         
                                    </tr>
                                @endif

                        
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                    <div class="col-md-6">
                         <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />  
                            <!-- <a href="{{ route('newMdaAdvert') }}" class="btn btn-default">Back to Lots</a> -->
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" id="submitBtn" disabled="disabled" class="btn btn-primary">Submit Application</button>
                         

                        </div>
                    </div>
                    <br/>
                </section>
            </form>

        </section>
    </section>
</section>
<script>

    window.addEventListener('load', function () {
        $(document).ready(function() {
            var sumchecked = 0;
            $('#lots').on('change', 'input[type="checkbox"]', function(){
                ($(this).is(':checked')) ? sumchecked++ : sumchecked--;
                (sumchecked > 0) ? $('#submitBtn').removeAttr('disabled') : $('#submitBtn').attr('disabled', 'disabled');
            

            });
        });
    });

</script>


@endsection

