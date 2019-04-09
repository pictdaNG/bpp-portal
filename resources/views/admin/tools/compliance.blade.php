@extends('layouts.admin')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
    <section class="panel panel-info">
                <header class="panel-heading">
                Administrative tools
                </header>
                <div class="row wrapper">
                <div class="col-sm-9 m-b-xs">
                    <a href="#addNewMDA" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create New</a> 
                    <button class="btn btn-sm btn-danger">Delete</button>                
                </div>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" class="input-sm form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                  <thead>
                        <tr>
                        <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
                        <th data-toggle="class">Ownership structure</th>
                        <!-- <th>CAC RC NO</th> -->
                        <!-- <th>TIN NO</th>
                        <th>ITF NO</th>
                        <th>Structure</th>
                        <th>Preview</th> -->
                        <th width="200">#</th>
                        </tr>
                    </thead>
                    <tbody>
            <tr>
            <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>2017</td>
            <!-- <td>2017 Capital Project For the Ministry</td>
            <td>National Competitive Bidding</td>
            <td>0</td>
            <td>
                2017-08-20
            </td>
            <td>
               2017-08-27
            </td> -->
            <td>
                <!-- <a href="#addNewLot" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-file"></i></a>  -->
                <a href="#" class="btn btn-default"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a>
                <!-- <a href="#" class="btn btn-default"><i class="fa fa-gear"></i></a> -->
            </td>
            </tr>
        </tbody>
    </table>
</div>

</section>

<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
    <section class="panel panel-info">
                <header class="panel-heading">
                Equipment
                </header>
                <div class="row wrapper">
                <div class="col-sm-9 m-b-xs">
                    <a href="#addNewMDA" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create New</a> 
                    <button class="btn btn-sm btn-danger">Delete</button>                
                </div>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" class="input-sm form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                  <thead>
                        <tr>
                        <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
                        <th data-toggle="class">Equipment Type</th>
                        <th width="200">#</th>
                        </tr>
                    </thead>
                    <tbody>
            <tr>
            <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>2017</td>
            <td>
                <!-- <a href="#addNewLot" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-file"></i></a>  -->
                <a href="#" class="btn btn-default"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a>
                <!-- <a href="#" class="btn btn-default"><i class="fa fa-gear"></i></a> -->
            </td>
            </tr>
        </tbody>
    </table>
</div>

</section>


<div class="modal fade" id="addNewMDA">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Compliance</h4>
    </div>
    <div class="modal-body">
      <form class="bs-example form-horizontal" id="ownershipfrom" action="/admin/compliance/store" method="POST">
      <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
      <div class="form-group">
          <label class="col-lg-3 control-label">Ownership Structure</label>
          <div class="col-lg-9">
          <input name="ownership_structure" class="form-control">
          </div>
      </div>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
      <button type="submit" id ="submitForm" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="addNewMDA">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Compliance</h4>
    </div>
    <div class="modal-body">
    
      <form class="bs-example form-horizontal">
      <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
      <div class="form-group">
          <label class="col-lg-3 control-label">Equipment Type</label>
          <div class="col-lg-9">
          <input name="equipment_type" class="form-control">
          <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
          </div>
      </div>

      </form>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
      <a href="#" class="btn btn-sm btn-success">Save Data</a>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>

 <script type="application/javascript">
    /* Create new Item */
    $("#submitForm").click(function(e){
        e.preventDefault();
        var form_action = $("#ownershipfrom").find("form").attr("action");
        var title = $("#ownershipfrom").find("input[name='ownership_structure']").val();
        var submit = $("#ownershipfrom").find("[type=submit]");
       
        console.log(title)
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data:{title:title},

            // beforeSend: function(){
            // submit.attr("value", "Loading...");
            // submit.prop("disabled", true);
            // },

            // error: function() {
            // submit.attr("value", submitOriginalText);
            // submit.prop("disabled", false);
            // // show error to end user
            // }
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });


    });

    // $('#ownershipfrom').on('submit',function(e){
    //     var form = $(this);
    //     var submit = form.find("[type=submit]");
    //     var submitOriginalText = submit.attr("value");

    //     e.preventDefault();
    //     var data = form.serialize();
    //     console.log("dara", data)
    //     var url = form.attr('action');
    //     var post = form.attr('method');
    //     var dataType =  'json',
    //     $.ajax({
    //         type : post,
    //         url : url,
    //         data :data,
    //       // dataType: dataType,
    //         success:function(data){
    //         submit.attr("value", "Submitted");
    //         },
    //         beforeSend: function(){
    //         submit.attr("value", "Loading...");
    //         submit.prop("disabled", true);
    //         },
    //         error: function() {
    //             submit.attr("value", submitOriginalText);
    //             submit.prop("disabled", false);
    //         // show error to end user
    //         }
    //     })
    // })
</script>

@endsection
