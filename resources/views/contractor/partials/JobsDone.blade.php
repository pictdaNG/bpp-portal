<section class="panel panel-default">
    <header class="panel-heading">
        Jobs Carried Out
    </header>
    <form class="bs-example form-horizontal"  id="deleteJob" method="POST">
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addJob" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Job</a> 
        <button type="submit" name="jobDelete" onclick="deleteJob()" class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
            <th data-toggle="class">Job Category</th>
            <th>Organization</th>
            <th>Job Title</th>
            <th>Job Description</th>
            <th>Contact Person</th>
            <th>Award Date</th>
            <th>Amount</th>
            <th>Edit</th>
            </tr>
        </thead>
        <tbody id="jobs">
         @if(sizeof($jobs) > 0) {
            @foreach ($jobs as $job)
                <tr>
                <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="jids[]" value="{{$job->id}}"><i></i></label></td>
                <td>{{$job->job_category}}</td>
                <td>{{$job->client}}</td>
                <td>{{$job->job_title}}</td>
                <td>{{$job->job_description}}</td>
                <td>{{$job->contact_phone}}</td>
                <td>{{$job->award_date}}</td>
                <td>{{$job->amount}}</td>
                <td>
                    <a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8"><label class="checkbox m-l m-t-none m-b-none i-checks">No Record Found</label></td>
            
            </tr>
        @endif
        </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
        
        </div>
    </footer>
</form>
</section>

<div class="modal fade" id="addJob">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Company's Work Experience</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal" id="jobForm" action="javascript:void(0)" method="POST">

         <div class="alert alert-success d-none" id="job_div">
              <span id="job_message"></span>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Select Job Category</label>
            <div class="col-lg-9">
            <select name="job_category" required class="form-control">
            @foreach ($business_cates as $category)

                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Sub-Category</label>
            <div class="col-lg-9">
            <select name="sub_category" required class="form-control">
            @foreach ($business_cates1 as $category)

                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Sub-Category</label>
            <div class="col-lg-9">
            <select name="sub_sub_category" required class="form-control">
                @foreach ($business_cates2 as $category)

                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Job Title</label>
            <div class="col-lg-9">
            <input name="job_title"  required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Job Description</label>
            <div class="col-lg-9">
            <textarea name="job_description" required class="form-control"></textarea>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Client</label>
            <div class="col-lg-9">
            <input type="text" name="client" required class="form-control">

            <!-- <select name="client" required class="form-control">
                <option value="default"></option>
            </select> -->
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Contact Phone:</label>
            <div class="col-lg-9">
            <input type="number" name="contact_phone" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Award Date:</label>
            <div class="col-lg-9">
            <input type="date" name="award_date" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Amount N:</label>
            <div class="col-lg-9">
            <input type="number" name="amount" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="modal-footer">
        <button type="submit"  id ="submitJob" name="submitJob" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
        </div>

    </form>
    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<script>
    window.addEventListener('load', function () {
    $("#jobForm").submit(function(evt){
            evt.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var host = '{{URL::to('/')}}';
            var dataType =  'JSON';
            $('#submitJob').html('Sending..');
            $.ajax({ 
                url : host + '/job/create',
                type : 'POST',
                data :$("#jobForm").serialize(),
                dataType: dataType,
                success:function(response){
                    $('#submitJob').html('Save Data');
                    $('#job_message').show();
                    $('#job_message').html(response.success);
                    $('#job_div').removeClass('d-none');
                    $('#submitJob').attr('disabled', 'disabled');


                    $('#job_div').show();
                    document.getElementById("jobForm").reset(); 
                    setTimeout(function(){
                        $('#job_message').hide();
                        $('#job_div').hide();
                        $('.close').trigger('click');
                        $('#submitJob').removeAttr('disabled');

                    },1000);
                    toastr.success(response.success, {timeOut: 1000});


                    loadJobs('/job/jobs', function(response){
                        });

                    
                },
                beforeSend: function(){
                    $('#submitJob').html('Loading...');
                    $('#submitJob').attr('disabled', 'disabled');
                },
                error: function(response) {
                    $('#submitJob').html('Try Again');
                    $('#submitJob').removeAttr('disabled');
                    toastr.error(response.responseJSON.error); //{timeOut: 5000}  

                    console.log(data)
                
                }
            });
        })
    })

    function loadJobs(jobs, cb){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{URL::to('/')}}';
        var dataType =  'JSON';
        $.ajax({
            type : 'GET',
            url : url + jobs,
             success:function(data){  
                data = data.jobs; 
                $('#jobs').empty();
                if(data.length > 0){
                    $.each(data, function (i) {
                        $('#jobs').append(
                            '<tr>'+
                            '<td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="jids[]" value="'+data[i].id+'"><i></i></label></td>' +
                            '<td>'+data[i].job_category +'</td>' +
                            '<td>'+data[i].client+ '</td>' +
                            '<td>'+data[i].job_title+'</td>'+
                            '<td>'+data[i].job_description+'</td>'+
                            '<td>'+data[i].contact_phone+'</td>'+
                            '<td>'+data[i].award_date +'</td>'+
                            '<td>'+data[i].amount+'</td>'+
                            '<td><a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>'+
                            '</tr>'
                        );
                    });

                }else {
                    $('#jobs').append(
                        '<tr>'+
                        '<td colspan="8"><label class="checkbox m-l m-t-none m-b-none i-checks">No Record found</label></td>' +
                        '</tr>'
                    );
                }
                  
            },
        });   
    }

    function deleteJob(){
    $("#deleteJob").submit(function(evt){
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
            url : url + '/job/delete',
            data :$('#deleteJob').serialize(),
            dataType: dataType,
            success:function(data){    
                document.getElementById("deleteJob").reset(); 
                $('#jobBtn').html('Delete');
                $('#jobBtn').removeAttr('disabled'); 
                  
                loadJobs('/job/jobs', function(data){
                });

            },
            beforeSend: function(){
                $('#jobBtn').html('Sending..');
                $('#jobBtn').attr('disabled', 'disabled');
            },
            error: function(data) {
                console.log('error', data)  
                $('#jobBtn').html('Try Again');
                $('#jobBtn').removeAttr('disabled');        
            // show error to end user
            }
        });
    })

}



</script>