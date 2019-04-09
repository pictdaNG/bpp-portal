<section class="panel panel-default">
    <header class="panel-heading">
        Company Financial Report
    </header>
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addFinancialReport" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Financial Report</a> 
        <button class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
            <th data-toggle="class">Year</th>
            <th>Turn Over (N)</th>
            <th>Total Assets (N)</th>
            <th>Total Liability (N)</th>
            <th>Witholding Tax (N)</th>
            <th>Tax Paid (N)</th>
            <th>TCC No.</th>
            <th>Audit Firm</th>
            <th>Date</th>
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

<div class="modal fade" id="addFinancialReport">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Company's Finance</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal" id="financeForm" action="javascript:void(0)" method="POST">

         <div class="alert alert-success d-none" id="finance_div">
              <span id="finance_message"></span>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Select Year</label>
            <div class="col-lg-9">
            <input name="year" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Turn Over (N)</label>
            <div class="col-lg-9">
            <textarea name="turn_over" class="form-control"></textarea>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Total Assets (N)</label>
            <div class="col-lg-9">
            <input name="total_asset" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Total Liability:</label>
            <div class="col-lg-9">
            <input name="total_liability" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Witholding Tax (N):</label>
            <div class="col-lg-9">
            <input name="witholding_tax" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Tax Paid (N):</label>
            <div class="col-lg-9">
            <input name="tax_paid" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">TCC No.:</label>
            <div class="col-lg-9">
            <input name="tcc_no" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Audit Firm:</label>
            <div class="col-lg-9">
            <input name="audit_firm" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Report Date:</label>
            <div class="col-lg-9">
            <input name="report_date" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  id ="submitFinance" name="submitFinance" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
        </div>
    </form>
    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<script>
        $("#financeForm").validate({
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var host = '{{URL::to('/')}}';
                var dataType =  'JSON';
                $('#submitFinance').html('Sending..');
                $.ajax({ 
                    url : host + '/finance/create',
                    type : 'POST',
                    data :$("#financeForm").serialize(),
                    dataType: dataType,
                    success:function(response){
                        $('#submitFinance').html('Submitted');
                        $('#submitFinance').attr('disabled', 'disabled');
                        $('#finance_message').show();
                        $('#finance_message').html(response.success);
                        $('#finance_message').removeClass('d-none');
            
                       // document.getElementById("registrationForm").reset(); 
                        setTimeout(function(){
                            $('#finance_message').hide();
                            $('#finance_div').hide();
                        },10000);
                        
                    },
                    beforeSend: function(){
                        $('#submitFinance').html('Loading...');
                        $('#submitFinance').attr('disabled', 'disabled');
                    },
                    error: function(data) {
                        $('#submitFinance').html('Try Again');
                        $('#submitFinance').removeAttr('disabled');
                        console.log(data)
                    
                    }
                });

            }
        })
    </script>