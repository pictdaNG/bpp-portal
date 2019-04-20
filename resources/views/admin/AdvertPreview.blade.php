@extends('layouts.mda')

@section('content')

<style>
.text-align {
    text-align: center;
    position: relative;
    margin-right: 8em;
}

.pt40 {
  padding-top: 20px;
}
  </style>


  <section class="hbox stretch">
    <section id="content">
      
      <section class="vbox">
        <section class="scrollable padder">
          <div class=" text-left-xs text-right pt40">
            <button href="{{action('ContractorController@getAdvertById', $advert->id)}}" class="btn btn-rounded btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Approve Advert"><i class="i i-like"></i></button>
            <button href="{{action('ContractorController@getAdvertById', $advert->id)}}" class="btn btn-rounded btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Decline Advert"><i class="i i-dislike"></i></button>
          </div>
              <form action="javascript:void(0)" method="POST" id="updateAdvertForm">     
          <div class="m-b-md">
            <div class="col-md-8 col-md-offset-4 m-b-md m-t-md">
              <img src="{{ asset('uploads/'.Auth::user()->profile_pic) }}"  class="img-responsive" height="200" width="200" alt="">    
            </div>
          </div>

          <div class="row text-align">
            <h4 class="text-primary"><strong>{{strtoupper($advert->user->name)}}</strong></h4>
            <p>{{ $advert->user->address }}</p>
            <h4 class="text-success"><strong>{{strtoupper($advert->name)}}</strong></h4>
          </div>

          <div class="row m-l-md">
            <div class="col-sm-6">
              <span>     
                <h4 class="m-t-md"><i class="i i-stack"></i> INTRODUCTION</h4>
              </span>
              <small class="" style="margin-left: 22px">  {{$advert->introduction}}</small>
              <span>
                <h4 class="m-t-md"><i class="i i-stack"></i> LOT DESCRIPTION</h4>
              </span>
              <?php $i = 1; ?>
              @if(sizeof($advert->advertLot))
                @foreach($advert->advertLot as $lot)
                <p style="margin-left: 22px"><strong>LOT {{$i++}}: </strong>{{$lot->description}}</p>
                @endforeach
              @else
               <strong>NO AVAILABLE LOT </strong>
              @endif
              <span>        
                <h4  class="m-t-md"><i class="i i-stack"></i> TENDER REQUIREMENTS</h4>
              </span>
                @if(sizeof($advert->tenderRequirement ) > 0)
                  <ol> 
                    @foreach($advert->tenderRequirement as $requirement)
                    <li>{{$requirement->name}}</li>
                    @endforeach
                  </ol>
                @else 
                  <p><strong>NO RECORD FOUND </strong></p>
                @endif
              <div class="col-md-6">
                  <button class="btn btn-primary" disabled="disabled" id="submitBtn">Save &amp; Continue</button>
              </div>
            </div>
            <div class="col-sm-6">
              <span>        
                <h4 class="m-t-md"><i class="glyphicon glyphicon-hand-right"></i> COLLECTION OF TENDER DOCUMENTS</h4>
              </span>
              <textarea style="width: 100%; background-color: transparent; border: 0px; margin-left: 22px" id="tender_collection" name="tender_collection" placeholder="Click here to edit this default text" type="text">{{$advert->tender_collection}}</textarea>
              <span>
                
                <h4 class="m-t-md"><i class="glyphicon glyphicon-hand-right"></i> SUBMISSION OF TENDER DOCUMENTS</h4>
              </span>
               <p> <textarea style="width: 100%; background-color: transparent; border: 0px; margin-left: 22px" id="tender_submission" name="tender_submission" placeholder="Click here to edit this default text" type="text">{{$advert->tender_submission}}</textarea></p>
              <h4 class="m-t-md"><i class="glyphicon glyphicon-hand-right"></i> OPENING OF TENDER DOCUMENTS</h4>
               <p><textarea style="width: 100%; background-color: transparent; border: 0px; margin-left: 22px" id="tender_opening" name="tender_opening" placeholder="Click here to edit this default text" type="text">{{$advert->tender_opening}}</textarea></p>
              <input type="hidden" name="id" value="{{$advert->id}}">
              <!-- <span>   
                <h4  class="m-t-md"><i class="fa fa-address-book"></i> OPENING OF TENDER DOCUMENTS</h4>
              </span>
              <input style="width: 100%; background-color: transparent; border: 0px" placeholder="Click here to edit this default text" type="text">          -->
            </div>  
            </form>
   
          </section>
        </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
    </section>
  </section>

@endsection
