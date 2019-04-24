<form class="bs-example form-horizontal" id="complianceform" action="javascript:void(0)" method="POST">

    <!-- <div class="alert alert-success d-none" id="compliance_div">
        <span id="compliance_message"></span>
    </div> -->

    <div class="alert alert-success d-none"  style="margin-bottom:10px;height:45px" id="compliance_div">
        <span id="compliance_message"></span>
    </div>
         
    <div class="row">
        <div class="col-sm-6">
            <section class="panel panel-default">
                <header class="panel-heading font-bold">Business Registration</header>
                <div class="panel-body">
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Registered Business Name</label>
                        <div class="col-lg-10">
                       
                        <input disabled type="text" name="company_name" value="{{$user['name']}}" class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Parent Company</label>
                        <div class="col-lg-10">
                        <input type="text" name="parent_company" value="{{$compliance['parent_company']}}"  required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">CAC RC No.</label>
                        <div class="col-lg-10">
                        <input disabled type="text" disabled name="cac_number"  value="{{$user['cac']}}"required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">CAC Date of Reg.</label>
                        <div class="col-lg-10">
                        <input type="date" name="cac_date_of_reg" value="{{$compliance['cac_date_of_reg']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>



        <div class="col-sm-6">
            <section class="panel panel-default">
            <header class="panel-heading font-bold">PenCom</header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pension Employer Code</label>
                        <div class="col-lg-10">
                            <input type="text" name="pension_employer_code" value="{{$compliance['pension_employer_code']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Certificate Number</label>
                        <div class="col-lg-10">
                            <input type="text" name="pension_certificate_number" value="{{$compliance['pension_certificate_number']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Expiring Date</label>
                        <div class="col-lg-10">
                        <input type="date" name="pension_expiring_date" value="{{$compliance['pension_expiring_date']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No. of Employee</label>
                        <div class="col-lg-10">
                        <input type="number" name="pension_no_of_employee" value="{{$compliance['pension_no_of_employee']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <section class="panel panel-default">
            <header class="panel-heading font-bold">Tax Clearance Certificate</header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">TCC No.</label>
                    <div class="col-lg-10">
                    <input type="text" name="tcc_no" value="{{$compliance['tcc_no']}}" class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">TIN No.</label>
                    <div class="col-lg-10">
                    <input type="text" name="tcc_tin_no" value="{{$compliance['tcc_tin_no']}}" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Ownership Structure.</label>
                    <div class="col-lg-10">
                    <select name="tcc_ownership_structure" required class="form-control">
                        @foreach ($tcc_ownerships as $ownership)
                            <option value="{{$ownership->name}}">{{$ownership->name}}</option>
                        @endforeach

                    </select>
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Company Ownership</label>
                    <div class="col-lg-10">
                    <select name="tcc_company_ownership" required class="form-control">
                         @foreach ($tcc_ownerships as $ownership)
                            <option value="{{$ownership->name}}">{{$ownership->name}}</option>
                        @endforeach
                    </select>
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>

            </div>
            </section>
        </div>

        <div class="col-md-6">
            <section class="panel panel-default">
            <header class="panel-heading font-bold">Industrial Trust Fund (ITF)</header>
                <div class="panel-body">
                    <form class="bs-example form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Registration No.</label>
                        <div class="col-lg-10">
                        <input type="text" name="itf_registration_no" value="{{$compliance['itf_registration_no']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Certificate No.</label>
                        <div class="col-lg-10">
                        <input type="text" name="itf_certificate_no" value="{{$compliance['itf_certificate_no']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Registration Date.</label>
                        <div class="col-lg-10">
                        <input type="date" name="itf_payment_date" value="{{$compliance['itf_payment_date']}}" required class="form-control">
                        <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-offset-10 col-lg-10">
                <button type="submit"  id="complianceBtn" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
            </div>
        </div>
    </div>
</form>

<script type="application/javascript">


$("#complianceform").validate({
    submitHandler: function(form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{URL::to('/')}}';
        var dataType =  'JSON';
        $.ajax({
            type : 'POST',
            url : url + '/compliance/create',
            data :$('#complianceform').serialize(),
            dataType: dataType,
            success:function(data){    
                $('#complianceBtn').html('Submitted');
                $('#compliance_message').show();
                $('#compliance_div').show();
                $('#compliance_div').attr('class', 'alert-success');
                $('#compliance_message').html(data.success);
                $('#compliance_div').removeClass('d-none');
                setTimeout(function(){
                    $('#compliance_message').hide();
                    $('#compliance_div').hide();
                   // document.getElementById("complianceform").reset(); 
                    $('#complianceBtn').removeAttr('disabled');
                    $('#complianceBtn').html('Save Data');
                },1000);
            },
            beforeSend: function(){
                $('#complianceBtn').html('Sending..');
                $('#complianceBtn').attr('disabled', 'disabled');
            },
            error: function(res) {
             
                $('#complianceBtn').html('Try Again');
                $('#complianceBtn').removeAttr('disabled');
                $('#compliance_message').show();
                $('#compliance_div').show();
                $('#compliance_div').attr('class', 'alert-danger');
                $('#compliance_message').html(res.responseJSON.err);
                $('#compliance_div').removeClass('d-none');
            }
        });
    }
})
</script>