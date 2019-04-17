@extends('layouts.admin')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">

            <br/>
            <section class="panel panel-default">
                <div class="panel-body">
                <div class="row">
                @foreach ($contractors as $data)
                    <div class="col-xs-6">
                        <img src="{{ asset('/images/p0.jpg') }}" height="200"/>
                        <h4>$data['company_name']</h4>
                        <address>
                            Email: $data['email']<br/>
                            Website: $data['website']<br/>
                            Address: $data['address']<br/>
                            Telephone: 08161730129<br/>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <p class="h4">Contractor IRR # $data['cac_number']</p>
                        <h5>Date Registered: $data['created_at']</h5>
                    </div>
                @endforeach
                </div>
                </div>
            </section>

            <section class="panel panel-default">
                <header class="panel-heading">
                    Board of Directors
                </header>
                <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                        <th>S/N</th>
                        <th data-toggle="class">Full Name</th>
                        <th>Sex</th>
                        <th>Nationality</th>
                        <th>ID Type</th>
                        <th>ID No.</th>
                        <th>Membership</th>
                        <th>Membership ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  $i = 0; ?>
                        @foreach ($directors as $data)
                        <tr>
                        <td>{{ $data['id'] }}</td>
                        <td>{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
                        <td>{{ $data['gender'] }}</td>
                        <td>{{ $data['nationality'] }}</td>
                        <td>type</td>
                        <td>1</td>
                        <td>{{ $data['professional_membership'] }}</td>
                        <td>{{ $data['membership_id_no'] }}</td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                        <td>1</td>
                        <td>Idrawfast</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>Jul 25, 2013</td>
                        </tr>
                        <tr>
                        <td>1</td>
                        <td>Idrawfast</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>4c</td>
                        <td>Jul 25, 2013</td>
                        </tr> -->
                    </tbody>
                    </table>
                </div>
                </div>
            </section>

            <section class="panel panel-default">
                <header class="panel-heading">
                Staff/Personnel
                </header>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th>S/N</th>
            <th data-toggle="class">Full Name</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Passport No.</th>
            <th>National ID</th>
            <th>Employee Type</th>
            <th>Joining Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personel as $data)
            <tr>
            <td>{{ $data['id'] }}</td>
            <td>{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
            <td>{{ $data['gender'] }}</td>
            <td>{{ $data['nationality'] }}</td>
            <td>{{ $data['passport_no'] }}</td>
            <td>{{ $data['national_id_no'] }}</td>
            <td>{{ $data['employment_type'] }}</td>
            <td>{{ $data['joining_date'] }}</td>
            </tr>
            @endforeach
            <!-- <tr>
            <td>2</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            </tr>
            <tr>
            <td>3</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            </tr> -->
        </tbody>
        </table>
                </div>
                </div>
            </section>


            <section class="panel panel-default">
                <header class="panel-heading">
                Business Category
                </header>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th>S/N</th>
            <th data-toggle="class">Business Category</th>
            <th>Business Sub-Category</th>
            <th>Business Sub-Category 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $data)
            <tr>
            <td>$data['id']</td>
            <td>$data['category']</td>
            <td>$data['subcategory_1']</td>
            <td>$data['subcategory_2']</td>
            </tr>
            @endforeach
            <!-- <tr>
            <td>2</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            </tr>
            <tr>
            <td>3</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            </tr> -->
        </tbody>
        </table>
                </div>
                </div>
            </section>


            <section class="panel panel-default">
                <header class="panel-heading">
                Projects Executed
                </header>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th>S/N</th>
            <th data-toggle="class">Job Category</th>
            <th>Organization</th>
            <th>Job Title</th>
            <th>Job Description</th>
            <th>Contact Person</th>
            <th>Award Date</th>
            <th>Amount</th>
            
            </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $data)
            <tr>
            <td>$data['id']</td>
            <td>$data['job_category']</td>
            <td>$data['sub_category']</td>
            <td>$data['job_title']</td>
            <td>$data['job_description']</td>
            <td>$data['contact_phone']</td>
            <td>$data['award_date']</td>
            <td>$data['amount']</td>
            </tr>
        @endforeach

            <!-- <tr>
            <td>2</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            
            </tr>
            <tr>
            <td>3</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            
            </tr> -->
        </tbody>
        </table>
                </div>
                </div>
            </section>


            <section class="panel panel-default">
                <header class="panel-heading">
                Financial Statements
                </header>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th>S/N</th>
            <th data-toggle="class">Year</th>
            <th>Turn Over (N)</th>
            <th>Total Assets (N)</th>
            <th>Total Liability (N)</th>
            <th>Witholding Tax (N)</th>
            <th>Tax Paid (N)</th>
            <th>TCC No.</th>
            <th>Audit Firm</th>
            <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($financies as $data)
            <tr>
            <td>$data['id']</td>
            <td>$data['year']</td>
            <td>$data['turn_over']</td>
            <td>$data['total_asset']</td>
            <td>$data['total_liability']</td>
            <td>$data['witholding_tax']</td>
            <td>$data['tax_paid']</td>
            <td>$data['tcc_no']</td>
            <td>$data['audit_firm']</td>
            <td>$data['report_date']</td>
            </tr>
        @endforeach
            <!-- <tr>
            <td>2</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            </tr>
            <tr>
            <td>3</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            </tr> -->
        </tbody>
        </table>
                </div>
                </div>
            </section>


            <section class="panel panel-default">
                <header class="panel-heading">
                Machines/Equipments
                </header>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th>S/N</th>
            <th data-toggle="class">Equipment type</th>
            <th>Acquisition Date</th>
            <th>Cost (N)</th>
            <th>Location</th>
            <th>Serial No.</th>
            <th>Reg. No.</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($machineries as $data)
            <tr>
            <td>$data['id']</td>
            <td>$data['equipment_type']</td>
            <td>$data['acquisition_date']</td>
            <td>$data['cost']</td>
            <td>$data['location']</td>
            <td>$data['serial_no']</td>
            <td>$data['serial_no']</td>
            <td>$data['equipment_status']</td>
            
            </tr>
        @endforeach
            <!-- <tr>
            <td>2</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            </tr>
            <tr>
            <td>3</td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>4c</td>
            <td>Jul 25, 2013</td>
            </tr> -->
        </tbody>
        </table>
                </div>
                </div>
            </section>


            <section class="panel panel-default">
                <header class="panel-heading">
                Documents uploaded
                </header>
                <div class="panel-body">
                    <div class="row">
                    @foreach ($getUploadfiles as $data)
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i>{{ $data['name'] }}</a></div>
                    @endforeach
                        <!-- <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> TIN Certificate</a></div>
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> PenCom Certificate</a></div>
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> Audited Account Certificate</a></div>
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> TCC Certificate</a></div>
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> Affidavit Certificate</a></div>
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> ITF Certificate</a></div>
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i> PLACCIMA Certificate</a></div> -->
                    </div>
                </div>
            </section>


        </section>
    </section>
</section>
@endsection
