@extends('layouts.admin')
@section('reports')
active
@endsection
@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">

            <br/>
            <section class="panel panel-default">
                <div class="panel-body">
                <div class="row">
                <?php //dd($contractors); ?>
                <?php $image = $contractors->user->profile_pic ? 'uploads/'.$contractors->user->profile_pic: 'images/download.png' ?>

                    <div class="col-xs-6">
                        <img src="{{ url($image)}}" height="200"/>
                        <h4>{{ $contractors['company_name']}}</h4>
                        <address>
                            Email: {{$contractors['email']}}<br/>
                            Website: {{$contractors['website']}}<br/>
                            Address: {{$contractors['address']}}<br/>
                            Telephone: {{$contractors->user->phone }}<br/>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <p class="h4">Contractor IRR # {{ $contractors['cac_number'] }}</p>
                        <h5>Date Registered: {{ $contractors['created_at']}}</h5>
                    </div>
             
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
                    <?php //dd($directors); ?>
                    @if (empty($directors))
                        <tr>
                        <td>No Records found</td>
                        </tr>
                    @else 
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
                    @endif
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
        @if (sizeof($personel) < 0)
            <tr>
            <td>No Records found</td>
            </tr>
        @else 
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
        @endif   
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
        @if (empty($categories))
            <tr>
            <td>No Records found</td>
            </tr>
        @else 
            @foreach ($categories as $data)
            <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['category']}}</td>
            <td>{{$data['subcategory_1']}}</td>
            <td>{{$data['subcategory_2']}}</td>
            </tr>
            @endforeach
        @endif 
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
        @if (empty($jobs))
            <tr>
            <td>No Records found</td>
            </tr>
        @else 
        @foreach ($jobs as $data)
            <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['job_category']}}</td>
            <td>{{$data['sub_category']}}</td>
            <td>{{$data['job_title']}}</td>
            <td>{{$data['job_description']}}</td>
            <td>{{$data['contact_phone']}}</td>
            <td>{{$data['award_date']}}</td>
            <td>{{number_format($data['amount'])}}</td>
            </tr>
        @endforeach
        @endif
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
        @if (empty($financies))
            <tr>
            <td>No Records found</td>
            </tr>
        @else 
        @foreach ($financies as $data)
            <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['year']}}</td>
            <td>{{$data['turn_over']}}</td>
            <td>{{$data['total_asset']}}</td>
            <td>{{$data['total_liability']}}</td>
            <td>{{$data['witholding_tax']}}</td>
            <td>{{$data['tax_paid']}}</td>
            <td>{{$data['tcc_no']}}</td>
            <td>{{$data['audit_firm']}}</td>
            <td>{{$data['report_date']}}</td>
            </tr>
        @endforeach
        @endif
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
        @if (empty($machineries))
            <tr>
            <td>No Records found</td>
            </tr>
        @else 
        @foreach ($machineries as $data)
            <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['equipment_type']}}</td>
            <td>{{$data['acquisition_date']}}</td>
            <td>{{$data['cost']}}</td>
            <td>{{$data['location']}}</td>
            <td>{{$data['serial_no']}}</td>
            <td>{{$data['serial_no']}}</td>
            <td>{{$data['equipment_status']}}</td>
            
            </tr>
        @endforeach
        @endif
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
                    @if (empty($getUploadfiles))
                    <div class="col-md-6 text-center" style="padding: 8px;"><a href="#" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i>No Uploads Found</a></div>
                    @else 
                    @foreach ($getUploadfiles as $data)
                        <div class="col-md-6 text-center" style="padding: 8px;"><a href="{{ asset('uploads/'.$data->key)}}" class="btn btn-s-md btn-primary btn-rounded"><i class="fa fa-file"></i>{{ ' '.strtoupper($data['name']) }}</a></div>
                    @endforeach
                    @endif  
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>
@endsection
