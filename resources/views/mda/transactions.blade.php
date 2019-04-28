@extends('layouts.admin')


@section('content')

<!--<script src="//code.jquery.com/jquery-1.12.3.js"></script>-->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Contractor Transactions</h4>
                            </div>
                            <!--tables-->
                            <div class="row">
                                <div class="col-md-12">
                                   <table class="table table-bordered table-striped table-condensed" id="table" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Advert Name</th>
                                                <th class="text-center">Lot Description</th>
                                                <th class="text-center">User Name</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Payment Status</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            <tr class="">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href=""><button id="edit-modal" class="edit-modal btn btn-info">
                                                        <span class="glyphicon glyphicon-edit"></span> Update Status
                                                    </button></a>
                                                    <!-- <a href="">
                                                    <button class="delete-modal btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                                    </button>
                                                    </a> -->
                                                   
                                                </td>
                                            </tr>
                                       

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

<script>
  $(document).ready(function() {
    $('.table').DataTable();
} );
 </script>
@endsection

