@extends('layouts.app')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <br/>
            <section class="panel panel-default">
                <header class="panel-heading">
                   <strong> Purchased Bids Document </strong> 
                </header>
                <form class="bs-example form-horizontal" action="{{route('storesales')}}" method="POST">
                        <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                    
                    
                            <thead>
                                <tr>
                                <th width="20">S/NO</th>
                                <th data-toggle="class">MDA</th>
                                <th>Advert Lot</th>
                                <th>Date/Time</th>
                                <th>Download</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                 <?php $i = 1 ?>
                                @foreach($sales as $data)
                                         
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->mda_name}}</td>
                                        <td>{{$data->lot_description}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td><a href="{{action('SalesController@downloadPDF')}}">Download</a> </td>

                                         
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
                            <!-- <button type="submit" class="btn btn-primary">Apply For Tender</button>
                            <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" /> -->

                        </div>
                    </div>
                    <br/>
                </section>
            </form>

        </section>
    </section>
</section>
@endsection

