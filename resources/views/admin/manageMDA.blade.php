@extends('layouts.admin')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <br/>
            <section class="panel panel-info">
                <header class="panel-heading">
                    Ministries Department and Agencies (MDA)
                </header>

                <form class="bs-example form-horizontal" id="deleteMdas" action="javascript:void(0)" Method="POST">
                <div class="row wrapper">
                    <div class="col-sm-9 m-b-xs">
                        <a href="#addNewMDA" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
                        <button id="mdaBtn" onclick="deleteMdas()" class="btn btn-sm btn-danger">Delete</button>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                      </span>
                        </div>
                    </div> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th width="20">
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox"><i></i></label>
                                </th>
                                <th data-toggle="class">MDA</th>
                                <th>MDA Code</th>
                                <th>Category</th>
                                <th>Email</th>
                                <!-- <th>Edit</th> -->
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody id="mdas">
                        <?php  $i = 0; ?>
                        @foreach ($mdas as $data)
                            <tr>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" name="mda[]" value="{{ $data['id']}}"><i></i></label>
                                </td>
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['mda_code'] }}</td>
                                <td>{{ $data['subsector'] }}</td>
                                <td>{{ $data['email'] }}</td>
                                <!-- <td>
                                    <a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-edit text-success text"></i></a>
                                </td> -->
                                <td>
                                    <a href="{{ route('mdasPreview',$data['id']) }}" class="active"><i class="fa fa-search text-success text-active"></i><i class="fa fa-search text-success text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $mdas->links() }}
                </div>
            </form>
            </section>

            <div class="modal fade" id="addNewMDA">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New MDA</h4>
                        </div>
                        <div class="modal-body">
                            <form class="bs-example form-horizontal" action="javascript:void(0)" id="mdasform" method="POST" enctype="multipart/form-data">
                            <div class="alert alert-success d-none" id="mdas_div">
                                <span id="mdas_message"></span>
                            </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Name of MDA</label>
                                    <div class="col-lg-9">
                                        <input name="name" class="form-control">
                                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">MDA Logo</label>
                                    <div class="col-lg-9">
                                        <input type="file" name="profile_pic" class="form-control">
                                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">MDA Code</label>
                                    <div class="col-lg-9">
                                        <input name="mda_code" class="form-control">
                                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">MDA Short Code</label>
                                    <div class="col-lg-9">
                                        <input name="mda_shortcode" class="form-control">
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Select Sub-Sector</label>
                                    <div class="col-lg-9">
                                    <select name="subsector" class="form-control">
                                    @foreach ($categories as $category)

                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <textarea required name="address" class="form-control"></textarea>
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input name="email" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Website</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="website" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Telephone</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="phone" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Mandate</label>
                                    <div class="col-lg-9">
                                        <textarea name="mandate" class="form-control"></textarea>
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Bank Name</label>
                                    <div class="col-lg-9">
                                    
                                        <select required name="bank_name" class="form-control">
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Bank Account</label>
                                    <div class="col-lg-9">
                                        <input name="bank_account" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Split Percentage</label>
                                    <div class="col-lg-9">
                                        <input type="number" name="split_percentage" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <a href="#" id="mdasBtn" class="btn btn-sm btn-primary">Save Data</a> -->
                            <button type="submit" name="mdasBtn" id="mdasBtn" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save Data</button>
                        </div>
                    </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
    </section>
</section>

<script type="application/javascript">

function deleteMdas(){
      $("#deleteMdas").submit(function(evt){
          evt.preventDefault();
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var url = '{{URL::to('/')}}';
          var dataType =  'JSON';
      
          $.ajax({
              type : 'POST',
              url : url + '/mda/delete',
              data :$('#deleteMdas').serialize(),
              dataType: dataType,
              success:function(data){    
                  $('#mdaBtn').html('Delete');
                  $('#mdaBtn').removeAttr('disabled');     
                  loadMdas('/mda/list/', function(data){
                  });
              },
              beforeSend: function(){
                  $('#mdaBtn').html('Sending..');
                  $('#mdaBtn').attr('disabled', 'disabled');
              },
              error: function(data) {
                  $('#mdaBtn').html('Try Again');
                  $('#mdaBtn').removeAttr('disabled'); 
              // show error to end user
              }
          });
      })

    }

window.addEventListener('load', function () {
    $("#mdasform").submit(function(evt){
      evt.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var url = '{{URL::to('/')}}';
      var dataType =  'JSON';
      $.ajax({
        type : 'POST',
        url : url + '/mda/create/',
        data: new FormData( this ),
        contentType: false,
        processData: false,
      // data :$('#lotForm').serialize(),
       // data : new FormData($("#lotForm")[0]),
        dataType: dataType,
      
        success:function(data){  
          $('#mdasBtn').html('Submitted');
          $('#mdasBtn').removeAttr('disabled');
          $('#mdas_message').show();
          $('#mdas_div').show();
          $('#mdas_message').html(data.success);
          $('#mdas_div').removeClass('d-none');
          document.getElementById("mdasform").reset();        
          setTimeout(function(){
              $('#mdas_message').hide();
              $('#mdas_div').hide();
              $('#mdasBtn').html('Save Data');
              $('.close').trigger('click');
          },1000);

          loadMdas('/mda/list/', function(data){
         });

        },
        beforeSend: function(){
          $('#mdasBtn').html('Sending..');
          $('#mdasBtn').attr('disabled', 'disabled');
        },
        error: function(data) {
          console.log('error', data)
          $('#mdasBtn').html('Try Again');
          $('#mdasBtn').removeAttr('disabled');
            
        // show error to end user
        }
      });
    });
   });


    function loadMdas(adverts, cb) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var url = '{{URL::to('/')}}';
    var dataType =  'JSON';
    $.ajax({
      type : 'GET',
      url : url + adverts,
      success:function(data){  
          console.log('sddf', data);
        data = data; 
        $('#mdas').empty();
        $.each(data, function (i) {
            console.log("mdas data", data);
        //   $('#mdas').append(
        //       '<tr>'+
        //       '<td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="aids[]" value="'+data[i].id+'"><i></i></label></td>' +
        //       '<td>'+data[i].budget_year+'</td>' +
        //       '<td>'+data[i].name+'</td>' +
        //       '<td>'+data[i].advert_type+'</td>'+
        //       '<td>'+data[i].lots+'</td>'+
        //       '<td>'+data[i].advert_publish_date+'</td>'+
        //       '<td>'+data[i].bid_opening_date+'</td>'+
        //       '<td>'+
        //         '<a href="#" data-id="'+data[i].id+'" data-name="'+data[i].name+'" class="btn btn-sm btn-primary addNewLot"><i class="fa fa-file"></i></a>'+
        //         '<a href="#" class="btn btn-default"><i class="fa fa-edit"></i></a>'+
        //         '<a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a>'+
        //         '<a href="/mda/advert/bidrequirement/'+data[i].id+'/" class="btn btn-default"><i class="fa fa-gear"></i></a>'+
        //         '</td>'+
        //       '</tr>'
        //     );
            location.reload();

          });     
        },
      });   
    }

</script>
@endsection
