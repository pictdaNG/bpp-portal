<section class="panel panel-default">
    <header class="panel-heading">
        Jobs Carried Out
    </header>
    <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
        <a href="#addJob" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Job</a> 
        <button class="btn btn-sm btn-danger">Delete</button>                
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
            <th data-toggle="class">Job Category</th>
            <th>Organization</th>
            <th>Job Title</th>
            <th>Job Description</th>
            <th>Contact Person</th>
            <th>Award Date</th>
            <th>Amount</th>
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

<div class="modal fade" id="addJob">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Company's Work Experience</h4>
    </div>
    <div class="modal-body">
    <form class="bs-example form-horizontal">
        <div class="form-group">
            <label class="col-lg-3 control-label">Select Job Category</label>
            <div class="col-lg-9">
            <select name="job_category" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Sub-Category</label>
            <div class="col-lg-9">
            <select name="sub_category" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Sub-Category</label>
            <div class="col-lg-9">
            <select name="sub_sub_category" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Job Title</label>
            <div class="col-lg-9">
            <input name="job_title" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Job Description</label>
            <div class="col-lg-9">
            <textarea name="job_description" class="form-control"></textarea>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Client</label>
            <div class="col-lg-9">
            <select name="nationality" class="form-control">
                <option value="default"></option>
            </select>
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Contact Phone:</label>
            <div class="col-lg-9">
            <input name="contact_phone" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Award Date:</label>
            <div class="col-lg-9">
            <input name="award_date" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Amount N:</label>
            <div class="col-lg-9">
            <input name="amount" class="form-control">
            <!-- <span class="help-block m-b-none">Example block-level help text here.</span> -->
            </div>
        </div>

    </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i> Save Data</a>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>