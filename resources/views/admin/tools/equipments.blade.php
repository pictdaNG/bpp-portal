@extends('layouts.admin')

@section('content')
<section class="panel panel-default">
    <header class="panel-heading">
        Equipment Type
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
    <form class="bs-example form-horizontal"  id="deleteCategory" method="POST">
    {{csrf_field()}}
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addBusinessCategory" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Equipment Type</a> 
        <!-- <button type="submit" id="cateBtn"  class="btn btn-sm btn-danger">Delete</button>                 -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th data-toggle="class">S/N</th>
            <th>Name</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody id="categories">
        <?php  $i = 0; ?>
            @foreach ( $equipments as $data)
            <tr>
                <td>{{ 1 + $i++ }}</td>
                <td>{{ $data['equipment_type'] }}</td>
                <td>
                <form action="{{ route('equipment.delete', $data['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete-modal btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                    </form> 
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
      <h4 class="modal-title">Add Equipment Type</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal" action="{{ route('storeEquipments') }}" method="POST">
    {{csrf_field()}}
        <div class="alert alert-success d-none" id="cat_div">
            <span id="cat_message"></span>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Equipment Type</label>
            <div class="col-lg-10">
            <input type="text" class="form-control" name="equipment_type" placeholder="Equipment Type" value="">
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

@endsection