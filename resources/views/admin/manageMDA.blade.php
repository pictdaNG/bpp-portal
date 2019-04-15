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
                <div class="row wrapper">
                    <div class="col-sm-9 m-b-xs">
                        <a href="#addNewMDA" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                <th width="20">
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox"><i></i></label>
                                </th>
                                <th data-toggle="class">MDA</th>
                                <th>MDA Code</th>
                                <th>Category</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $i = 0; ?>
                        @foreach ($mdas as $data)
                            <tr>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['mda_code'] }}</td>
                                <td>{{ $data['category'] }}</td>
                                <td>{{ $data['email'] }}</td>
                                <td>
                                    <a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-edit text-success text"></i></a>
                                </td>
                                <td>
                                    <a href="#" class="active" data-toggle="class"><i class="fa fa-search text-success text-active"></i><i class="fa fa-search text-success text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </section>

            <div class="modal fade" id="addNewMDA">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New MDA</h4>
                        </div>
                        <div class="modal-body">
                            <form class="bs-example form-horizontal" id="categoryform" method="POST">

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
                                        <span class="help-block m-b-none">URL</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Select Sub-Sector</label>
                                    <div class="col-lg-9">
                                        <select name="subsector" class="form-control">
                                            <option value="default"></option>
                                        </select>
                                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input required name="address" class="form-control">
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
                                            <option value="default"></option>
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
                                        <input name="split_percentage" class="form-control">
                                        <!-- <span class="help-block m-b-none">URL</span> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#" id="categoryBtn" class="btn btn-sm btn-primary">Save Data</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
    </section>
</section>

<script type="application/javascript">

$("#categoryform").submit(function(evt){
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
        url : url + '/mda/create',
        data :$('#categoryform').serialize(),
        dataType: dataType,
        success:function(data){   
            $('#categoryBtn').html('Submitted');
            $('#cat_message').show();
            $('#cat_message').html(data.success);
            $('#cat_div').show();
            $('#cat_div').removeClass('d-none');
            setTimeout(function(){
                $('.close').trigger('click');
                $('#cat_message').hide();
                $('#cat_div').hide();
                $('#categoryBtn').html('Save Data');
                $('#categoryBtn').removeAttr('disabled');
                document.getElementById("categoryform").reset(); 
            },1000);

            // loadCategories('/admin/manageMDA', function(data){
            });
        },
        beforeSend: function(){
            $('#categoryBtn').html('Sending..');
            $('#categoryBtn').attr('disabled', 'disabled');
        },
        error: function(data) {
            $('#categoryBtn').html('Try Again');
            $('#directorBtn').removeAttr('disabled');
            
        // show error to end user
        }
    });
})

function loadCategories(categories, cb){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '{{URL::to('/')}}';
    var dataType =  'JSON';
    $.ajax({
        type : 'GET',
        url : url + categories,
        success:function(data){  
            data = data.categories; 
            $('#categories').empty();
            $.each(data, function (i) {
                $('#categories').append(
                    '<tr>'+
                    '<td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="ids[]" value="'+data[i].id+'"><i></i></label></td>' +
                    '<td>'+data[i].category+'</td>' +
                    '<td>'+data[i].subcategory_1+'</td>' +
                    '<td>'+data[i].subcategory_2+'</td>'+
                    '<td><a href="#" class="active" data-toggle="class"><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>'+
                    '</tr>'
                );
            });
              
        },
    });   
}

function deleteCategory(){
$("#deleteCategory").submit(function(evt){
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
        url : url + '/category/delete',
        data :$('#deleteCategory').serialize(),
        dataType: dataType,
        success:function(data){    
            document.getElementById("deleteCategory").reset(); 
            $('#cateBtn').html('Delete');
            $('#cateBtn').removeAttr('disabled');
           
            loadCategories('/category/categories', function(data){
            });

        },
        beforeSend: function(){
            $('#cateBtn').html('Sending..');
            $('#cateBtn').attr('disabled', 'disabled');
        },
        error: function(data) {
            console.log('error', data)
            $('#cateBtn').html('Try Again');
            $('#cateBtn').removeAttr('disabled');
            
        // show error to end user
        }
    });
})

}
</script>
@endsection
