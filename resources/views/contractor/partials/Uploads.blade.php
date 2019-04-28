<section class="panel panel-success">
    <header class="panel-heading">
    <p>Upload Documents </p>
        <p>
            <small>All documents MUST be in their originals; PDF, JPEG, JPG, or PNG formats only. Each document must NOT be larger than 200kB in size</small>
        </p>
    </header>
    <!-- <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addFinancialReport" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Financial Report</a> 
        <button class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div> -->
    <div class="table-responsive">
        <table class="table b-t b-light">
        <thead>
            <tr>
            <th>Document Upload</th>
            <th>Size</th>
            <th>Progress</th>
            <th>Status</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Upload CAC Certificate<br/>
                    <?php
                    if($cac){
                        echo '<input type="file" name="cac_file" id="cac_file" disabled/><span id="cac_file_uploaded">'.$cac->key.'</span>';
                    }else{
                        echo '<input type="file" name="cac_file" id="cac_file" /><span id="cac_file_uploaded"></span>';
                    }
                    ?>
                    
                </td>
                <td><div id="cac_file_size">{{ $cac ? number_format((float)$cac->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="cac_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $cac ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="cac_file_status" class="active" ><i class="fa {{ $cac ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadCACFile()" id="cac_file_upload_btn" class="btn btn-primary" {{ $cac ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $cac ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $cac ? '' : 'disabled' }} id="cac_preview_btn" href="{{ $cac ? asset('/uploads/' . $cac->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $cac ? '' : 'disabled' }} id="resetCACBtn" onClick="resetCACFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload TCC Certificate<br/>
                    <?php
                    if($tcc){
                        echo '<input type="file" name="tcc_file" id="tcc_file" disabled/><span id="tcc_file_uploaded">' . $tcc->key.'</span>';
                    }else{
                        echo '<input type="file" name="tcc_file" id="tcc_file" /><span id="tcc_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="tcc_file_size">{{ $tcc ? number_format((float)$tcc->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="tcc_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $tcc ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="tcc_file_status" class="active" ><i class="fa {{ $tcc ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadTCCFile()" id="tcc_file_upload_btn" class="btn btn-primary" {{ $tcc ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $tcc ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $tcc ? '' : 'disabled' }} id="tcc_preview_btn" href="{{ $tcc ? asset('/uploads/' . $tcc->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $tcc ? '' : 'disabled' }} id="resetTCCBtn" onClick="resetTCCFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload TIN Certificate<br/>
                    <?php
                    if($tin){
                        echo '<input type="file" name="tin_file" id="tin_file" disabled/><span id="tin_file_uploaded">' . $tin->key.'</span>';
                    }else{
                        echo '<input type="file" name="tin_file" id="tin_file" /><span id="tin_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="tin_file_size">{{ $tin ? number_format((float)$tin->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="tin_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $tin ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="tin_file_status" class="active" ><i class="fa {{ $tin ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadTINFile()" id="tin_file_upload_btn" class="btn btn-primary" {{ $tin ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $tin ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $tin ? '' : 'disabled' }} id="tin_preview_btn" href="{{ $tin ? asset('/uploads/' . $tin->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $tin ? '' : 'disabled' }} id="resetTINBtn" onClick="resetTINFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload PenCom Certificate<br/>
                    <?php
                    if($pencom){
                        echo '<input type="file" name="pencom_file" id="pencom_file" disabled/><span id="pencom_file_uploaded">' . $pencom->key.'</span>';
                    }else{
                        echo '<input type="file" name="pencom_file" id="pencom_file" /><span id="pencom_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="pencom_file_size">{{ $pencom ? number_format((float)$pencom->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="pencom_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $pencom ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="pencom_file_status" class="active" ><i class="fa {{ $pencom ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadPenComFile()" id="pencom_file_upload_btn" class="btn btn-primary" {{ $pencom ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $pencom ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $pencom ? '' : 'disabled' }} id="pencom_preview_btn" href="{{ $pencom ? asset('/uploads/' . $pencom->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $pencom ? '' : 'disabled' }} id="resetPenComBtn" onClick="resetPenComFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload ITF Certificate<br/>
                    <?php
                    if($itf){
                        echo '<input type="file" name="itf_file" id="itf_file" disabled/><span id="itf_file_uploaded">' . $itf->key.'</span>';;
                    }else{
                        echo '<input type="file" name="itf_file" id="itf_file" /><span id="itf_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="itf_file_size">{{ $itf ? number_format((float)$itf->size / 1024, 1, '.', '') .'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="itf_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $itf ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="itf_file_status" class="active" ><i class="fa {{ $itf ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadITFFile()" id="itf_file_upload_btn" class="btn btn-primary" {{ $itf ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $itf ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $itf ? '' : 'disabled' }} id="itf_preview_btn" href="{{ $itf ? asset('/uploads/' . $itf->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>

                        <button {{ $itf ? '' : 'disabled' }} id="resetITFBtn"  onClick="resetITFFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload 3 Year Audited Account<br/>
                    <?php
                    if($audited_account){
                        echo '<input type="file" name="audited_account_file" id="audited_account_file" disabled/><span id="audited_account_file_uploaded">' . $audited_account->key.'</span>';
                    }else{
                        echo '<input type="file" name="audited_account_file" id="audited_account_file" /><span id="audited_account_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="audited_account_file_size">{{ $audited_account ? number_format((float)$audited_account->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="audited_account_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $audited_account ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="audited_account_file_status" class="active" ><i class="fa {{ $audited_account ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadAuditedAccountFile()" id="audited_account_file_upload_btn" class="btn btn-primary" {{ $audited_account ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $audited_account ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $audited_account ? '' : 'disabled' }} id="audited_account_preview_btn" href="{{ $audited_account ? asset('/uploads/' . $audited_account->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $audited_account ? '' : 'disabled' }} id="resetAuditedAccountBtn" onClick="resetAuditedAccountFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload Sworn Affidavit<br/>
                    <?php
                    if($swon_affidavit){
                        echo '<input type="file" name="swon_affidavit_file" id="swon_affidavit_file" disabled/><span id="swon_affidavit_file_uploaded">' . $swon_affidavit->key.'</span>';
                    }else{
                        echo '<input type="file" name="swon_affidavit_file" id="swon_affidavit_file" /><span id="swon_affidavit_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="swon_affidavit_file_size">{{ $swon_affidavit ? number_format((float)$swon_affidavit->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="swon_affidavit_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $swon_affidavit ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="swon_affidavit_file_status" class="active" ><i class="fa {{ $swon_affidavit ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadSwonAffidavitFile()" id="swon_affidavit_file_upload_btn" class="btn btn-primary" {{ $swon_affidavit ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $swon_affidavit ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $swon_affidavit ? '' : 'disabled' }} id="swon_affidavit_preview_btn" href="{{ $swon_affidavit ? asset('/uploads/' . $swon_affidavit->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $swon_affidavit ? '' : 'disabled' }} id="resetSwonAffidavitBtn" onClick="resetSwonAffidavitFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    Upload PLACCIMA<br/>
                    <?php
                    if($placcima){
                        echo '<input type="file" name="placcima_file" id="placcima_file" disabled/><span id="placcima_file_uploaded">' . $placcima->key . '</span>';
                    }else{
                        echo '<input type="file" name="placcima_file" id="placcima_file" /><span id="placcima_file_uploaded"></span>';
                    }
                    ?>
                </td>
                <td><div id="placcima_file_size">{{ $placcima ? number_format((float)$placcima->size / 1024, 1, '.', '') . 'kB' : '0kB' }}</div></td>
                <td>
                    <div class="progress progress-xs m-t-sm">
                        <div id="placcima_file_progress" class="progress-bar bg-info" data-toggle="tooltip" style="width: {{ $placcima ? '100%' : '0%' }}"></div>
                    </div>
                </td>
                <td>
                    <a id="placcima_file_status" class="active" ><i class="fa {{ $placcima ? 'fa-check text-success' : 'fa-times text-danger' }} text-active"></i></a>
                </td>
                <td>
                    <p>
                        <button onClick="uploadPlaccimaFile()" id="placcima_file_upload_btn" class="btn btn-primary" {{ $placcima ? 'disabled' : '' }}><i class="fa fa-cloud-upload text"></i> {{ $placcima ? 'Uploaded' : 'Upload' }}</button>
                        <a {{ $placcima ? '' : 'disabled' }} id="placcima_preview_btn" href="{{ $placcima ? asset('/uploads/' . $placcima->key) : '#' }}" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                        <button {{ $placcima ? '' : 'disabled' }} id="resetplaccimaBtn" onClick="resetPlaccimaFile()" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Remove</button>
                    </p>
                </td>
            </tr>
        </tbody>
        </table>

    </div>
    <footer class="panel-footer">
        <div class="row">
        <div class="col-lg-12">
            <a  id="btnComplete" disabled="disabled" data-toggle="modal" class="btn btn-primary text-center btn-lg btn-block">Complete Registration</a>
        </div>
        </div>
    </footer>
</section>



<div class="modal fade" id="completeRegistration">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Business Category Registration</h4>
    </div>
    <div class="modal-body">
        <p>In compliance with the Plateau State Public Procurement Act, All State Contractors are to register under any section of the designated categories. Thank you.</p>
    <form class="bs-example form-horizontal">
        <table id="inventario" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th width="20"><input type="checkbox" id="check-all" disabled="disabled"></th>
                <th>Items</th>
                <th style="visibility:visible;">Description</th>
                <th style="visibility:visible;">Fee</th>
                <th style="visibility:visible;">Renewal</th>
            </tr>
            </thead>
            <tbody id="inventario-data">
            <?php $sumTotal = 0;?> 
             @if(sizeof($fees) > 0)
              
                @foreach($fees as $fee)
                <?php $sumTotal+= $fee->amount; ?>
                    <tr>
                        <td width="20"><input type="checkbox" class="data-check"></td>
                        <td>{{$fee->name}}</td>
                        <td style="visibility:visible" >{{$fee->description}}</td>
                        <td style="visibility:visible" >{{number_format($fee->amount)}}</td>
                        <td style="visibility:visible" >{{number_format($fee->renewal_fee)}}</td>
                    </tr>
                @endforeach
           
            
            </tbody>
            <tfoot>
            <tr>
                <th colspan ="3">Total payable</th>
                <th colspan="2"><div id="sumchecked" > NGN: <span id="checked-prices-total-sum">0</span></div></th>
               
            </tr>
            <th   style="visibility: hidden;">Tot. No <span id="totalAmount">{{number_format($sumTotal)}}</span></th>
            @else 
                <tr>
                    
                    <td colspan = "5">No Record Found</td>
                 </tr>
            @endif
            </tfoot>
        </table>
           
           
    </form>
    </div>
    <div class="modal-footer">
      <!-- <p style="float: left;">Amount Payable: </p> -->
      <!-- <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-credit-card"></i> Proceed to Checkout</a> -->
      <!-- <a class="btn btn-danger" href="{{action('ContractorController@getIRR')}}" disabled="disabled" data-toggle="class:show inline" id="spin" data-target="#spin" data-loading-text="Completing Registration.."><i class="fa fa-credit-card"></i> Proceed to Checkout</a> <i class="fa fa-spin fa-spinner hide" id="spin"></i> -->
      <a class="btn btn-danger" id="spin" href="{{action('ContractorController@getIRR')}}" disabled="disabled" ><i class="fa fa-credit-card"></i> Proceed to Checkout</a> <i class="fa fa-spin fa-spinner hide" id="spin"></i>

    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script>

function resetCACFile(){
    // $('#cac_file').removeAttribute('disabled');
    $('#cac_file').prop("disabled", false);
    $('#cac_file_uploaded').html('');
    $('#cac_file_size').html('0kB');
    $('#cac_file_progress').css("width", "0%");
    $('#cac_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    // $('#cac_file_upload_btn').removeAttribute('disabled');
    $('#cac_file_upload_btn').prop("disabled", false);
    $('#cac_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#cac_preview_btn').attr('disabled', 'disabled');
    $('#cac_preview_btn').attr('href', '#');
    $('#resetCACBtn').attr('disabled', 'disabled');

}

function resetTCCFile(){
    $('#tcc_file').prop("disabled", false);
    $('#tcc_file_uploaded').html('');
    $('#tcc_file_size').html('0kB');
    $('#tcc_file_progress').css("width", "0%");
    $('#tcc_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#tcc_file_upload_btn').prop("disabled", false);
    $('#tcc_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#tcc_preview_btn').attr('disabled', 'disabled');
    $('#tcc_preview_btn').attr('href', '#');
    $('#resetTCCBtn').attr('disabled', 'disabled');

}

function resetTINFile(){

    $('#tin_file').prop("disabled", false);
    $('#tin_file_uploaded').html('');
    $('#tin_file_size').html('0kB');
    $('#tin_file_progress').css("width", "0%");
    $('#tin_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#tin_file_upload_btn').prop("disabled", false);
    $('#tin_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#tin_preview_btn').attr('disabled', 'disabled');
    $('#tin_preview_btn').attr('href', '#');
    $('#resetTINBtn').attr('disabled', 'disabled');

}

function resetPenComFile(){
    $('#pencom_file').prop("disabled", false);
    $('#pencom_file_uploaded').html('');
    $('#pencom_file_size').html('0kB');
    $('#pencom_file_progress').css("width", "0%");
    $('#pencom_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#pencom_file_upload_btn').prop("disabled", false);
    $('#pencom_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#pencom_preview_btn').attr('disabled', 'disabled');
    $('#pencom_preview_btn').attr('href', '#');
    $('#resetPenComBtn').attr('disabled', 'disabled');

}

function resetITFFile(){
    $('#itf_file').prop("disabled", false);
    $('#itf_file_uploaded').html('');
    $('#itf_file_size').html('0kB');
    $('#itf_file_progress').css("width", "0%");
    $('#itf_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#itf_file_upload_btn').prop("disabled", false);
    $('#itf_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#itf_preview_btn').attr('disabled', 'disabled');
    $('#itf_preview_btn').attr('href', '#');
    $('#resetITFBtn').attr('disabled', 'disabled');

}

function resetAuditedAccountFile(){
    $('#audited_account_file').prop("disabled", false);
    $('#audited_account_file_uploaded').html('');
    $('#audited_account_file_size').html('0kB');
    $('#audited_account_file_progress').css("width", "0%");
    $('#audited_account_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#audited_account_file_upload_btn').prop("disabled", false);
    $('#audited_account_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#audited_account_preview_btn').attr('disabled', 'disabled');
    $('#audited_account_preview_btn').attr('href', '#');
    $('#resetAuditedAccountBtn').attr('disabled', 'disabled');

}

function resetSwonAffidavitFile(){
    $('#swon_affidavit_file').prop("disabled", false);
    $('#swon_affidavit_file_uploaded').html('');
    $('#swon_affidavit_file_size').html('0kB');
    $('#swon_affidavit_file_progress').css("width", "0%");
    $('#swon_affidavit_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#swon_affidavit_file_upload_btn').prop("disabled", false);
    $('#swon_affidavit_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#swon_affidavit_preview_btn').attr('disabled', 'disabled');
    $('#swon_affidavit_preview_btn').attr('href', '#');
    $('#resetSwonAffidavitBtn').attr('disabled', 'disabled');
}

function resetPlaccimaFile(){
    $('#placcima_file').prop("disabled", false);
    $('#placcima_file_uploaded').html('');
    $('#placcima_file_size').html('0kB');
    $('#placcima_file_progress').css("width", "0%");
    $('#placcima_file_status').html('<i class="fa fa-times text-danger text-active"></i>');
    $('#placcima_file_upload_btn').prop("disabled", false);
    $('#placcima_file_upload_btn').html('<i class="fa fa-cloud-upload text"></i> Upload');
    $('#placcima_preview_btn').attr('disabled', 'disabled');
    $('#placcima_preview_btn').attr('href', '#');
    $('#resetplaccimaBtn').attr('disabled', 'disabled');
}

function uploadCACFile(){
    uploadFile('cac', 'cac_file', 'cac_file_progress', 'cac_file_upload_btn', 'cac_file_status', 'cac_file_size', 'cac_preview_btn', 'resetCACBtn', 'cac_file_uploaded');
}
function uploadTCCFile(){
    uploadFile('tcc', 'tcc_file', 'tcc_file_progress', 'tcc_file_upload_btn', 'tcc_file_status', 'tcc_file_size', 'tcc_preview_btn', 'resetTCCBtn', 'tcc_file_uploaded');
}
function uploadTINFile(){
    uploadFile('tin', 'tin_file', 'tin_file_progress', 'tin_file_upload_btn', 'tin_file_status', 'tin_file_size', 'tin_preview_btn', 'resetTINBtn', 'tin_file_uploaded');
}
function uploadPenComFile(){
    uploadFile('pencom', 'pencom_file', 'pencom_file_progress', 'pencom_file_upload_btn', 'pencom_file_status', 'pencom_file_size', 'pencom_preview_btn', 'resetPenComBtn', 'pencom_file_uploaded');
}
function uploadITFFile(){
    uploadFile('itf', 'itf_file', 'itf_file_progress', 'itf_file_upload_btn', 'itf_file_status', 'itf_file_size', 'itf_preview_btn', 'resetITFBtn', 'itf_file_uploaded');
}
function uploadAuditedAccountFile(){
    uploadFile('audited_account', 'audited_account_file', 'audited_account_file_progress', 'audited_account_file_upload_btn', 'audited_account_file_status', 'audited_account_file_size', 'audited_account_preview_btn', 'resetAuditedAccountBtn', 'audited_account_file_uploaded');
}
function uploadSwonAffidavitFile(){
    uploadFile('swon_affidavit', 'swon_affidavit_file', 'swon_affidavit_file_progress', 'swon_affidavit_file_upload_btn', 'swon_affidavit_file_status', 'swon_affidavit_file_size', 'swon_affidavit_preview_btn', 'resetSwonAffidavitBtn', 'swon_affidavit_file_uploaded');
}

function uploadPlaccimaFile(){
    uploadFile('placcima', 'placcima_file', 'placcima_file_progress', 'placcima_file_upload_btn', 'placcima_file_status', 'placcima_file_size', 'placcima_preview_btn', 'resetplaccimaBtn', 'placcima_file_uploaded');
}



function uploadFile(name, divId, divProgressId, cacFileUploadBtnId, cacFileStatus, cacFileSize, previewBtn, removeBtn, keyId){
    var fd = new FormData();
    var file = document.getElementById(divId).files[0];
    fd.append('name', name);
    fd.append('file', file);
    fd.append('_token', '{{{ csrf_token() }}}');
    var xhr = new XMLHttpRequest();
      xhr.open('POST', "{{ route('uploadContractorFile') }}", true);
      var firstProgressEvent = true;
      xhr.loaded = 0;
      xhr.upload.addEventListener('progress', function(e) {
        if (firstProgressEvent) {
          firstProgressEvent = false;
        //   $('#' + divProgressId).css("display", "block");
        }
        xhr.loaded += (e.loaded - xhr.loaded);
        var progress = parseInt(xhr.loaded / e.total * 100, 10);
        $('#' + divProgressId).css("width", progress + "%");
      }, false);

      $('#' + cacFileUploadBtnId).html('<i class="fa fa-spin" id="spin"> Uploading..');
      $('#' + cacFileUploadBtnId).attr('disabled', 'disabled');
      xhr.onreadystatechange = function(data){ 
        if ( xhr.readyState == 4 ) {
          if ( xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            console.log({data})
            $('#'+ cacFileUploadBtnId).removeClass('btn-primary');
            $('#'+ cacFileUploadBtnId).addClass('btn-success');
            $('#'+ cacFileUploadBtnId).attr('disabled', 'disabled');
            $('#' + cacFileUploadBtnId).html('<i class="fa fa-cloud-upload text"></i> Uploaded');
            $('#' + cacFileStatus).html('<i class="fa fa-check text-success text-active"></i>');
            var sizeInKb = parseFloat(data.size / 1024);
            $('#' + cacFileSize).html( sizeInKb.toFixed(1) + 'kB' );
            $('#' + previewBtn).attr('href',  '{{ asset('uploads') }}/' + data.key);
            $('#' + previewBtn).removeAttr('disabled');
            $('#' + removeBtn).removeAttr('disabled');
            $('#' + divId).attr('disabled', 'disabled');
            document.getElementById(divId).value = "";
            $('#' + keyId).html(data.key);
            loadDocuments();
          } else {
            $('#' + divProgressId).removeClass("bg-info");
            $('#' + divProgressId).addClass("bg-danger");
            $('#' + cacFileUploadBtnId).html('<i class="fa fa-cloud-upload text"></i> Upload');
            $('#' + cacFileUploadBtnId).attr('disabled', 'disabled');
            $('#' + cacFileStatus).html('<i class="fa fa-times text-danger text-active"></i>');
          }
        } 
      };

      xhr.onerror = function () {
        // error(xhr, xhr.status); 
        console.log("xhr Error");
      }; 
      xhr.send(fd);
    }


    function loadDocuments(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{URL::to('/')}}';
        var dataType =  'JSON';
        $.ajax({
            type : 'GET',
            url : url + '/contractor/files',
             success:function(data){  
                 ({data: data.length})
                if(data.length > 7){
                    $('#btnComplete').attr('href', '#completeRegistration');
                    $('#btnComplete').removeAttr('disabled');

                }
                  
            },
        });   
    }

    window.addEventListener('load', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{URL::to('/')}}';
        var dataType =  'JSON';
        $.ajax({
            type : 'GET',
            url : url + '/contractor/files',
             success:function(data){  
                 console.log({data: data.length})
                if(data.length > 7){
                    $('#btnComplete').attr('href', '#completeRegistration');
                    $('#btnComplete').removeAttr('disabled');

                }
                  
            },
        });   
   });

    window.addEventListener('load', function () {
        $("#check-al").click(function() {
            var isChecked = $(this).prop('checked');
            $(".data-check").prop('checked', isChecked);
            var $sumchecked = $('#sumchecked');
            var $totalSum = $('#checked-prices-total-sum');

            if (isChecked) {
                $totalSum.html($('#totalAmount').html());
                $sumchecked.css('visibility', 'visible');
            } else {
                $totalSum.html(0);
                $sumchecked.css('visibility', 'hidden');
            }
        });


        $('#inventario-data').on('change', 'input[type="checkbox"]', function(){
            var $sumchecked = $('#sumchecked');
            var $totalSum = $('#checked-prices-total-sum');
            var totalSumValue = parseFloat($totalSum.html());
            var price = parseFloat($(this).parent().next().next().next().html().replace(",", "."));
            console.log('typeod price', typeof(price));
            console.log('typeod sumchecked', typeof(parseInt($sumchecked)));
            console.log('typeod totalsum', typeof(parseInt($totalSum)));
            console.log('typeod totalvaluesum', typeof(parseInt(totalSumValue)));



            if ($(this).is(':checked')) {
                totalSumValue += price;
            } else {
                totalSumValue -= price;
            }

            $totalSum.html( totalSumValue.toFixed(0));
        // totalSumValue > 0 ? $sumchecked.css('visibility', 'visible') : $sumchecked.css('visibility', 'hidden');
            if(totalSumValue > 0) {
                $sumchecked.css('visibility', 'visible');
                $('#spin').removeAttr('disabled');
            } 
            else {
            // $sumchecked.css('visibility', 'hidden');
                $('#spin').attr('disabled', 'disabled');
            } 

        });
    });
</script>