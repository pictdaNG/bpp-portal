@extends('layouts.app')
@section('transactions')
active
@endsection
@section('content')

<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
          <br/>
        <section class="panel panel-info">
            <header class="panel-heading">
              {{'List of  Transactions'}}
            </header>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
             @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p><b>{{ $message }}</b></p>
                </div>
            @endif
            <form class="bs-example form-horizontal" action="{{route('deletePDFName')}}" method="POST">
                <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                               
                                <th width="20">SNO</th>
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">MDA</th>
                                <th class="text-center">Advert Name</th>
                                <th class="text-center">Lot Description</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Payment Date</th>
                             
                            
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $i = 1; ?>
                            @if(sizeof($transactions) > 0)
                                @foreach($transactions as $transaction) 
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$transaction->transaction_id}}</td>
                                        <td>{{$transaction->mda_name}}</td>
                                        <td>{{$transaction->advert_name}}</td>
                                        <td>{{$transaction->lot_description}}</td> 
                                        <td>{{number_format($transaction->amount)}}</td>
                                        <td>
                                            @if ($transaction->payment_status === 'Paid')
                                                <span class="label label-success">{{ $transaction->payment_status }}</span>
                                            @else
                                                <span class="label label-danger">{{ $transaction->payment_status }}</span>
                                            @endif
                                            <?php $payment_date = $transaction->payment_date ? $transaction->payment_date : 'Not Available' ;?>
                                        <td>{{$payment_date}}</td>    
                                    </tr>
                                @endforeach
                            @else
                                <tr>   
                                    <td colspan="8">NO RECORD FOUND</td>   
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                </form>
         </section>

@endsection
