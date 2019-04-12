<section class="panel panel-default">
    <header class="panel-heading">
        Category
    </header>
    <form class="bs-example form-horizontal"  id="deleteCategory" method="POST">
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addBusinessCategory" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Business Category</a> 
        <button type="submit" id="cateBtn" onclick="deleteCategory()" class="btn btn-sm btn-danger">Delete</button>                
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
        <tbody id="categories">
            @foreach ($allcategories as $category)
            <tr>
                <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="cates[]" value="{{$category['id']}}"><i></i></label></td>
                <td>{{$category->category}}</td>
                <td>{{$category->subcategory_1}}</td>
                <td>{{$category->subcategory_2}}</td>
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

<div class="modal fade" id="addBusinessCategory">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Select a category associated with your business</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal" id="categoryform" method="POST">
        <div class="alert alert-success d-none" id="cat_div">
            <span id="cat_message"></span>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Select a Category</label>
            <div class="col-lg-10">
            <select name="category" class="form-control">
            @foreach ($business_cates as $category)

                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Select Sub-Category</label>
            <div class="col-lg-10">
            <select name="subcategory_1" class="form-control">
            @foreach ($business_cates1 as $category)

             <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach

            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Select a Category</label>
            <div class="col-lg-10">
            <select name="subcategory_2" class="form-control">
            @foreach ($business_cates2 as $category)

             <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            
            </select>
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
            url : url + '/category/create',
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

                loadCategories('/category/categories', function(data){
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
                        '<td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="ids[]" value="+data[i].id+"><i></i></label></td>' +
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