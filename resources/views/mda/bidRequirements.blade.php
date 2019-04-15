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
                <form class="bs-example form-horizontal" action="{{route('storeRequirement')}}" Method="POST">
                  <input type="hidden" value="{{$advert->id}}" name="advertId"/>
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
                                        <input type="checkbox" value="cac certificate" name="requirement[]"><i></i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Tax Clearance Certificates</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" value="tax clearance certificate" name="requirement[]"><i></i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>PenCom Certificate</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" value="pencom certificate" name="requirement[]"><i></i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>ITF Certificate</td>
                                <td>
                                    <label class="checkbox m-l m-t-none m-b-none i-checks">
                                        <input type="checkbox" value="ITF certificate"  name="requirement[]"><i></i></label>
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
                        <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />

                    </div>
                </div>
                </form>
                <br/>
            </section>
        </section>
    </section>
</section>
@endsection
