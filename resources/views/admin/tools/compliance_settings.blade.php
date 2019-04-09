@extends('layouts.admin')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                         <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Compliance / Ownership Structure</h4>
                            </div>
                            <div class="content">
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
                                <form action="{{ route('compliance.store') }}" method="POST">
                                     {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Ownership Structure</label>
                                                <input type="text" class="form-control" name="ownership_structure" placeholder="Ownership structure" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right"><i class="glyphicon glyphicon-th"></i>Submit</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                             <hr>
                            <!--tables-->
                            <div class="row">
                                <div class="col-md-12">
                                   <table class="table table-bordered table-striped table-condensed" id="table" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Ownership Structure</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr class="">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->ownership_structure}}</td>
                                                <td><a href=""><button id="edit-modal" class="edit-modal btn btn-info">
                                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                                    </button></a>
                                                    <a href="" onclick="return confirm('Do you really want to delete This?')">
                                                    <button class="delete-modal btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                                    </button>
                                                    </a>
                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end table-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <section class="vbox">
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                         <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Compliance / Equipments</h4>
                            </div>
                            <div class="content">
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
                                <form action="{{ route('compliance.store') }}" method="POST">
                                     {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Equipments Type</label>
                                                <input type="text" class="form-control" name="equipment_type" placeholder="Equipment Type" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right"><i class="glyphicon glyphicon-th"></i>Submit</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                             <hr>
                            <!--tables-->
                            <div class="row">
                                <div class="col-md-12">
                                   <table class="table table-bordered table-striped table-condensed" id="table" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Ownership Structure</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr class="">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->ownership_structure}}</td>
                                                <td><a href=""><button id="edit-modal" class="edit-modal btn btn-info">
                                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                                    </button></a>
                                                    <a href="" onclick="return confirm('Do you really want to delete This?')">
                                                    <button class="delete-modal btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                                    </button>
                                                    </a>
                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end table-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> 

</section>
@endsection