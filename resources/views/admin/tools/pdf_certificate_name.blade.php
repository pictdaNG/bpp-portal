@extends('layouts.admin')

@section('content')

<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
          <br/>
        <section class="panel panel-info">
            <header class="panel-heading">
              Certificates
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
            <form class="bs-example form-horizontal" method="POST">

                {{csrf_field()}}
                <div class="row wrapper">
                    <div class="col-sm-5 m-b-xs">
                        <a href="#PDFRegistration" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add PDF Name</a> 
                    </div>
                </div>
   
                <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th data-toggle="class">Certification Type</th>
                                <th>Category Type</th>
                                <th>Date</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($names as $name) 
                                <tr>
                                    <td>{{$name['certification_type']}}</td>
                                    <td>{{$name['category_type']}}</td>
                                    <td>{{$name['certification_type']}}</td>   
                                    <input type="hidden" value="{{$name['id']}}" id="pdfId" name="id"/>

                                    <td>
                                        <a href="javascript:void(0)"class="delete-modal btn btn-danger">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </form>
         </section>

    <div class="modal fade" id="PDFRegistration">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Certifcates</h4>
        </div>
        <div class="modal-body">
        <form class="bs-example form-horizontal" action="{{ route('storePDFName') }}" method="POST">
        {{csrf_field()}}
            <div class="alert alert-success d-none" id="cat_div">
                <span id="cat_message"></span>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Category Type</label>
                <div class="col-lg-10">
                <input type="text" required class="form-control" name="category_type" placeholder="Category Type" value="">
                <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Certification Type</label>
                <div class="col-lg-10">
                <input type="text" required class="form-control" name="certification_type" placeholder="Certification Type" value="">
                <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                </div>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" name="categoryBtn" id="categoryBtn" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
        </div>

        </form>
    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
</section>
</section>
</section>

@endsection
