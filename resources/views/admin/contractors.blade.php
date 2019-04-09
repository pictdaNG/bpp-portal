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
                            <tr>
                                <td>Test Company Limited</td>
                                <td>378273</td>
                                <td>378273</td>
                                <td>55555</td>
                                <td>i534232132</td>
                                <td>3424FG</td>
                                <td>Private Limited</td>
                                <td>
                                    <a href="{{ route('contractorPreview', 1) }}" class="active"><i class="fa fa-search text-success text-active"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </section>
    </section>
</section>
@endsection
