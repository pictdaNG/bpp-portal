<section class="panel panel-default">
    <header class="panel-heading">
        Directors
    </header>
    <form class="bs-example form-horizontal"  id="deleteDirector" method="POST">

    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addMember" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New Member</a> 
        <button type="submit" class="btn btn-sm btn-danger" onClick="deleteDirector()" id="delete">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light" id="dTable">
        <thead>
            <tr>
                <th width="20"></th>
                <th data-toggle="class">Full Name</th>
                <th>Sex</th>
                <th>Nationality</th>
                <th>Country</th>
                <th>ID Type</th>
                <th>Membership</th>
                <th>Membership ID</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody id="directors">
        <?php  $i = 0; ?>
            @foreach ($directors as $director)
           
            <tr>
        
                <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="ids[]" value="{{$director['id']}}"><i></i></label></td>
                <td>{{$director['first_name'].' '.$director['last_name']}}</td>
                <td>{{$director['gender']}}</td>
                <td>{{$director['nationality']}}</td>
                <td>{{$director['country']}}</td>
                <td>{{$director['identification']}}</td>
                <td>{{$director['professional_membership']}}</td>
                <td>{{$director[ 'membership_id_no']}}</td>
                
                <td>
                 <a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
        
        </div>
    </footer>
    </form>
</section>

<div class="modal fade" id="addMember">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Board of Directors</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal"  id="directorform" method="POST">
        <div class="alert alert-success d-none" id="directors_div">
            <span id="directors_message"></span>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">First Name</label>
            <div class="col-lg-10">
            <input name="first_name" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Last Name</label>
            <div class="col-lg-10">
            <input name="last_name" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Gender</label>
            <div class="col-sm-10">
            <label class="checkbox-inline">
                <input type="radio" required name="gender" value="male"> Male
            </label>
            <label class="checkbox-inline">
                <input type="radio" name="gender" value="female"> Female
            </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Nationality</label>
            <div class="col-lg-10">
            <select name="nationality" required class="form-control">
                @foreach ($countries as $country)
                     <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Country of Origin</label>
            <div class="col-lg-10">
            <select name="country" class="form-control">
               @foreach ($countries as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Identification</label>
            <div class="col-lg-10">
            <select name="identification" class="form-control">
                <option>National ID</option>
                <option>Drivers License</option>
                <option>Voters Card</option>
                <option>Intl. Passport</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Professional Membership</label>
            <div class="col-lg-10">
            <input name="professional_membership" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Membership ID</label>
            <div class="col-lg-10">
            <input name="membership_id_no" required class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="modal-footer">
            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" id="directorBtn" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>

        </div>

    </form>
    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<script type="application/javascript">
    function loadDirectors(directors, cb){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{URL::to('/')}}';
        var dataType =  'JSON';
        $.ajax({
            type : 'GET',
            url : url + directors,
            success:function(data){  
                data = data.directors; 
                $('#directors').empty();
                $.each(data, function (i) {
                    $('#categories').append(
                        '<tr>'+
                        '<td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="ids[]" value="+data[i].id+"><i></i></label></td>' +
                        '<td>'+data[i].first_name+' '+data[i].last_name+'</td>' +
                        '<td>'+data[i].gender+'</td>' +
                        '<td>'+data[i].nationality+'</td>'+
                        '<td>'+data[i].country+'</td>'+
                        '<td>'+data[i].identification+'</td>'+
                        '<td>'+data[i].professional_membership+'</td>'+
                        '<td>'+data[i].membership_id_no+'</td>'+
                        '<td><a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>'+
                        '</tr>'
                    );
                });
                  
            },
        });   
    }
    
 function deleteDirector(){
    $("#deleteDirector").submit(function(evt){
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
            url : url + '/director/delete',
            data :$('#deleteDirector').serialize(),
            dataType: dataType,
            success:function(data){    
                $('#directorBtn').html('Submitted');
                $('#directorBtn').removeAttr('disabled');
                $('#directors_message').show();
                $('#directors_message').html(data.success);
                $('#directors_div').removeClass('d-none');
                document.getElementById("deleteDirector").reset(); 
                setTimeout(function(){
                    $('#directors_message').hide();
                    $('#directors_div').hide();
                    $('.close').trigger('click');

                },10000);
              
                loadDirectors('/director/directors', function(data){
                });

            },
            beforeSend: function(){
                $('#directorBtn').html('Sending..');
                $('#directorBtn').attr('disabled', 'disabled');
            },
            error: function(data) {
                console.log('error', data)
                $('#directorBtn').html('Try Again');
                $('#directorBtn').removeAttr('disabled');
                
            // show error to end user
            }
        });
    })

}
    $("#directorform").submit(function(evt){
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
            url : url + '/director/create',
            data :$('#directorform').serialize(),
            dataType: dataType,
            success:function(data){    
                $('#directorBtn').html('Submitted');
                $('#directorBtn').removeAttr('disabled');
                $('#directors_message').show();
                $('#directors_div').show();
                $('#directors_message').html(data.success);
                $('#directors_div').removeClass('d-none');

                document.getElementById("directorform").reset(); 
                setTimeout(function(){
                    $('#directors_message').hide();
                    $('#directors_div').hide();
                    $('#directorBtn').html('Save Data');
                    $('.close').trigger('click');
                },1000);

                loadDirectors('/director/directors', function(data){
                });

            },
            beforeSend: function(){
                $('#directorBtn').html('Sending..');
                $('#directorBtn').attr('disabled', 'disabled');
            },
            error: function(data) {
                console.log('error', data)
                $('#directorBtn').html('Try Again');
                $('#directorBtn').removeAttr('disabled');
                
            // show error to end user
            }
        });
    })


    
</script>