<section class="panel panel-default">
    <header class="panel-heading">
        Machineries
    </header>
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addEquipment" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Equipment</a> 
        <button class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
            <th data-toggle="class">Equipment type</th>
            <th>Acquisition Date</th>
            <th>Cost (N)</th>
            <th>Location</th>
            <th>Serial No.</th>
            <th>Reg. No.</th>
            <th>Status</th>
            <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            <td>
                <a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
        
        </div>
    </footer>
</section>

<div class="modal fade" id="addEquipment">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Machineries/Equipment</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal"  id="machineryForm" action="javascript:void(0)" method="POST">
        <div class="alert alert-success d-none" id="machinery_div">
              <span id="machinery_message"></span>
            </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Equipment Type</label>
            <div class="col-lg-9">
            <select name="equipment_type" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Specify</label>
            <div class="col-lg-9">
            <input name="specifics" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Acquisition Date:</label>
            <div class="col-lg-9">
            <input name="acquisition_date" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Cost</label>
            <div class="col-lg-9">
            <input name="cost" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Location</label>
            <div class="col-lg-9">
            <input name="location" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Serial No:</label>
            <div class="col-lg-9">
            <input name="serial_no" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Equipment Status</label>
            <div class="col-lg-9">
            <select name="equipment_status" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  id ="submitMachinery" name="submitMachinery" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
        </div>
    </form>
    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<script>
        $("#machineryForm").validate({
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var host = '{{URL::to('/')}}';
                var dataType =  'JSON';
                $('#submitMachinery').html('Sending..');
                console.log($("#machineryForm").serialize())
                $.ajax({ 
                    url : host + '/machinery/create',
                    type : 'POST',
                    data :$("#machineryForm").serialize(),
                    dataType: dataType,
                    success:function(response){
                        $('#submitMachinery').html('Submitted');
                        $('#submitMachinery').attr('disabled', 'disabled');
                        $('#machinery_message').show();
                        $('#machinery_message').html(response.success);
                        $('#machinery_div').removeClass('d-none');
            
                       // document.getElementById("registrationForm").reset(); 
                        setTimeout(function(){
                            $('#machinery_message').hide();
                            $('#machinery_div').hide();
                        },10000);
                        
                    },
                    beforeSend: function(){
                        $('#submitMachinery').html('Loading...');
                        $('#submitMachinery').attr('disabled', 'disabled');
                    },
                    error: function(data) {
                        $('#submitMachinery').html('Try Again');
                        $('#submitMachinery').removeAttr('disabled');
                        console.log(data)
                    
                    }
                });

            }
        })
    </script>