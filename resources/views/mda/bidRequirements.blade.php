@extends('layouts.mda')

@section('content')
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <br/>
            <section class="panel panel-default">
                <header class="panel-heading">
                    Tender Requirement/Eligibility Criteria
                </header>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="100">Required</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CAC Certificates</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" name="post[]"><i></i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Tax Clearance Certificates</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" name="post[]"><i></i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>PenCom Certificate</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" name="post[]"><i></i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>ITF Certificate</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" name="post[]"><i></i></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br/>
                <div class="row" style="padding-left: 10px; padding-right: 10px;">
                    <div class="col-md-6">
                        <a href="{{ route('newMdaAdvert') }}" class="btn btn-default">Back to Lots</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <br/>
            </section>
        </section>
    </section>
</section>
@endsection
