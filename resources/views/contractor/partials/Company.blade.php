    <div class="col-sm-8">
        <section class="panel panel-default">
        <header class="panel-heading font-bold">Company Identification</header>
        <div class="panel-body">
            <form class="bs-example form-horizontal" id="registrationForm" action="javascript:void(0)" method="POST">

            <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
            </div>
         
                <div class="form-group">
                    <label class="col-lg-2 control-label">Registered Business Name</label>
                    <div class="col-lg-10">
                    <input id="company_name" disabled name="company_name"  value="{{$user->name}}" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">CAC RC No.</label>
                    <div class="col-lg-10">
                    <input id="cac_number" name="cac_number" disabled  value="{{$user->cac}}" required class="form-control">
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

                        <select name="country" required class="form-control">
                            @foreach ($countries as $country)
                                <option value="{{$country->name}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                    <input id="email" name="email" disabled  value="{{$user->email}}" required class="form-control">
                    <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Website</label>
                    <div class="col-lg-10">
                    <input id="website" name="website"  class="form-control">
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

    <script>
        $("#registrationForm").submit(function(evt ){
            evt.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var host = '{{URL::to('/')}}';
            var dataType =  'JSON';
            $.ajax({ 
                url : host + '/contractor/create',
                type : 'POST',
                data :$("#registrationForm").serialize(),
                dataType: dataType,
                success:function(response){
                    $('#submitForm').html('Submitted');
                    $('#res_message').show();
                    $('#msg_div').show();

                    $('#res_message').html(response.success);
                    $('#msg_div').removeClass('d-none');
        
                    setTimeout(function(){
                            $('#res_message').hide();
                            $('#msg_div').hide();
                        $("#registrationForm").trigger('reset'); 
                        $('#submitForm').removeAttr('disabled');
                        $('#submitForm').html('Save Data');


                    },1000);
                    
                },
                beforeSend: function(){
                    $('#submitForm').html('Loading...');
                    $('#submitForm').attr('disabled', 'disabled');
                },
                error: function() {
                    $('#submitForm').html('Save Data');
                    $('#submitForm').removeAttr('disabled');
                
                }
            });

        })
    </script>