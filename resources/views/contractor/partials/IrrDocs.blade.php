@extends('layouts.app')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
          <br/>
        <section class="panel panel-info">
            <header class="panel-heading">
              Certificates
            </header>
              <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                  <thead>
                        <tr>
                        <th data-toggle="class">Certification Type</th>
                        <th>Category Type</th>
                        <th>Date</th>
                        <th>Download</th>
                        
                        </tr>
                    </thead>
                    <tbody> 
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['description']}}</td>
                        <td>{{$data['created_at']}}</td>           
                        <td><a href="{{action('ContractorController@downloadPDF', ['certification' =>$data->name, 'category' =>$data->description])}}">Download</a> </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
        </div>
    </section>
  </section>
</section>
</section>
</section>
@endsection


