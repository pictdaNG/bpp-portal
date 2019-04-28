@extends('layouts.admin')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <br/>
            <section class="panel panel-info">
                <header class="panel-heading">
                    Contractors
                </header>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>CAC RC No.</th>
                                <th>TIN No.</th>
                                <th>PenCom ID</th>
                                <th>TCC No.</th>
                                <th>ITF ID</th>
                                <th>Structure</th>
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $i = 0; ?>
                           @foreach ($getCompliance as $data)
                            <tr>
                                <td>{{ $data['company_name'] }}</td>
                                <td>{{ $data['cac_number'] }}</td>
                                <td>{{ $data['tcc_tin_no'] }}</td>
                                <td>{{ $data['pension_employer_code'] }}</td>
                                <td>{{ $data['tcc_no'] }}</td>
                                <td>{{ $data['itf_registration_no'] }}</td>
                                <td>{{ $data['tcc_ownership_structure'] }}</td>
                                <td>
                                    <a href="{{ route('contractorPreview',$data['user_id']) }}" class="active"><i class="fa fa-search text-success text-active"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </section>
        </section>
    </section>
</section>
@endsection
