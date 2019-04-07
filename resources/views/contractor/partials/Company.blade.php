    <div class="col-sm-8">
        <section class="panel panel-default">
        <header class="panel-heading font-bold">Company Identification</header>
        <div class="panel-body">
            <form id="regform" action="{{ route('contractor_storeCompany')}}" method="post" class="bs-example form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Registered Business Name</label>
                    <div class="col-lg-10">
                    <input id="company_name" name="company_name" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">CAC RC No.</label>
                    <div class="col-lg-10">
                    <input id="cac_number" name="cac_number" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Office Address</label>
                    <div class="col-lg-10">
                    <input  id="address" name="address" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">City</label>
                    <div class="col-lg-10">
                    <input id="city" name="city" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-10">
                    <input id="country" name="country" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                    <input id="email" name="email" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Website</label>
                    <div class="col-lg-10">
                    <input id="website" name="website" required class="form-control">
                    <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit"  id ="submitForm" name="submitForm" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Data</button>
                    </div>
                </div>
            </form>
        </div>
        </section>
    </div>
    <script type="application/javascript">


        $('#regform').on('submit',function(e){
            var form = $(this);
            var submit = form.find("[type=submit]");
            var submitOriginalText = submit.attr("value");

            e.preventDefault();
            var data = form.serialize();
            var url = form.attr('action');
            var post = form.attr('method');
            var dataType =  'JSON',
            $.ajax({
                type : post,
                url : url,
                data :data,
                dataType: dataType,
                success:function(data){
                submit.attr("value", "Submitted");
                },
                beforeSend: function(){
                submit.attr("value", "Loading...");
                submit.prop("disabled", true);
                },
                error: function() {
                    submit.attr("value", submitOriginalText);
                    submit.prop("disabled", false);
                // show error to end user
                }
            })
        })
    </script>