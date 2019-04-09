<section class="panel panel-default">
    <header class="panel-heading">
        Category
    </header>
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addBusinessCategory" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Business Category</a> 
        <button class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
            <th data-toggle="class">Business Category</th>
            <th>Business Sub-Category</th>
            <th>Business Sub-Category 2</th>
            <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
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

<div class="modal fade" id="addBusinessCategory">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Select a category associated with your business</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal" id="categoryform" action="javascript:void(0)" method="POST">
        <div class="alert alert-success d-none" id="msg_div">
            <span id="res_message"></span>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Select a Category</label>
            <div class="col-lg-10">
            <select name="category" class="form-control">
                <option value="helllo">1</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Select Sub-Category</label>
            <div class="col-lg-10">
            <select name="subcategory_1" class="form-control">
                <option value="hey">2</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Select a Category</label>
            <div class="col-lg-10">
            <select name="subcategory_2" class="form-control">
                <option value="helll">3</option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="modal-footer">
            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" id="categoryBtn" name="categoryBtn" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
        </div>

    </form>
    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script>
    $("#categoryform").validate({
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '{{URL::to('/')}}';
           // console.log(url + '/contractorcategory/create');

            $.ajax({
                type : 'POST',
                url : url + '/contractorcategory/create',
                data :$('#categoryform').serialize(),
                dataType: 'JSON',
                success:function(data){    
                    $('#categoryBtn').html('Submitted');
                    $('#categoryBtn').removeAttr('disabled');
                    $('#res_message').show();
                    $('#res_message').html(response.success);
                    $('#msg_div').removeClass('d-none');
                    setTimeout(function(){
                        $('.close').trigger('click');
                    },1000);
                    console.log('hello....1')

                },
                beforeSend: function(){
                    $('#categoryBtn').html('Sending..');
                    $('#categoryBtn').attr('disabled', 'disabled');
                    console.log('hello....2')

                },
                error: function(data) {
                    console.log('error', data)
                    $('#categoryBtn').html('Try Again');
                    $('#categoryBtn').removeAttr('disabled');
                    //console.log('hello....3')

                    
                // show error to end user
                }
            });
        }
    })
</script>