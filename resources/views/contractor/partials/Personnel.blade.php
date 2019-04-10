<section class="panel panel-default">
    <header class="panel-heading">
        Personnel
    </header>
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addPersonnel" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Personnel</a> 
        <button class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
            <th data-toggle="class">Full Name</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Passport No.</th>
            <th>National ID</th>
            <th>Employee Type</th>
            <th>Joining Date</th>
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

<div class="modal fade" id="addPersonnel">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Personnel Bio-Data</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal" id="personnelForm" action="javascript:void(0)" method="POST">

         <div class="alert alert-success d-none" id="personnel_div">
              <span id="personnel_message"></span>
            </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">First Name</label>
            <div class="col-lg-10">
            <input name="first_name" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Last Name</label>
            <div class="col-lg-10">
            <input name="last_name" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Gender</label>
            <div class="col-sm-10">
            <label class="checkbox-inline">
                <input type="radio" name="gender" value="male"> Male
            </label>
            <label class="checkbox-inline">
                <input type="radio" name="gender" value="female"> Female
            </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Nationality</label>
            <div class="col-lg-10">
            <select name="nationality" class="form-control">
                <option>Nigeria</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Passport No:</label>
            <div class="col-lg-10">
            <input name="passport_no" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">National ID:</label>
            <div class="col-lg-10">
            <input name="national_id_no" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Employment Type</label>
            <div class="col-lg-10">
            <select name="employment_type" class="form-control">
                <option value="default"></option>
                <option value="contract">Contract</option>
                <option value="permanent">Permanent</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Years of Experience:</label>
            <div class="col-lg-10">
            <input name="experience_years" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">joining Date:</label>
            <div class="col-lg-10">
            <input name="joining_date" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Name of School:</label>
            <div class="col-lg-10">
            <input name="school_name" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Qualification</label>
            <div class="col-lg-10">
            <select name="qualification" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Country</label>
            <div class="col-lg-10">
            <select name="country" class="form-control">
                <option>Nigeria</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Year of Graduation</label>
            <div class="col-lg-10">
            <input name="graduation_year" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Regulatory Body</label>
            <div class="col-lg-10">
            <input name="regulatory_body" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Membership ID</label>
            <div class="col-lg-10">
            <input name="membership_id_no" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Project Involved</label>
            <div class="col-lg-10">
            <input name="project_involved" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
            <textarea name="description" class="form-control"></textarea>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        </div>
            <div class="modal-footer">
            <button type="submit"  id ="submitPersonnel" name="submitPersonnel" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
        </div>

    </form>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script>
        $("#personnelForm").validate({
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var host = '{{URL::to('/')}}';
                var dataType =  'JSON';
                $('#submitPersonnel').html('Sending..');
                $.ajax({ 
                    url : host + '/personnel/create',
                    type : 'POST',
                    data :$("#personnelForm").serialize(),
                    dataType: dataType,
                    success:function(response){
                        $('#submitPersonnel').html('Submitted');
                        $('#submitPersonnel').attr('disabled', 'disabled');
                        $('#personnel_message').show();
                        $('#personnel_message').html(response.success);
                        $('#personnel_div').removeClass('d-none');
            
                       // document.getElementById("registrationForm").reset(); 
                        setTimeout(function(){
                            $('#personnel_message').hide();
                            $('#personnel_div').hide();
                        },1000);
                        
                    },
                    beforeSend: function(){
                        $('#submitPersonnel').html('Loading...');
                        $('#submitPersonnel').attr('disabled', 'disabled');
                    },
                    error: function(data) {
                        $('#submitPersonnel').html('Try Again');
                        $('#submitPersonnel').removeAttr('disabled');
                        console.log(data)
                    
                    }
                });

            }
        })
    </script>