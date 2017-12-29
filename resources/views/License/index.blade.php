@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-md-12 text-right padding-right10">
        <a href="{{ url('/logout') }}">Logout</a>
    </div>
</div>
<div class="row padding-top10">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                @include('Partials.Common._flash')
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Licenses</h3>
            </div>
            <div id="send-report-container" class="col-md-6 padding-top17 text-right">
                @include('Partials.Forms._send_report')
            </div>
        </div>

        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>State</th>
                        <th>License Number</th>
                        <th>Expiration Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="licenses-list-container">
                    @include('Partials.Licenses._list', compact('licenses'))
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        @if(count($expiring_licenses))
        <div class="row padding-top10">
            <div class="col-md-12">
                <div class="error-container">
                    <div class="alert alert-warning">
                        <h4>Expiring Licenses</h4>
                        @foreach($expiring_licenses as $i => $license)
                        <p>{{ $i + 1 }}. {{ $license['name'] }} with license number {{ $license['license_number']}} will expire on {{ date('m/d/Y', strtotime($license['expiration_date'])) }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@include('Partials.Modals._license')

@endsection

@section('custom-js')
<script src="{{ url('js/class/license.js') }}" type="text/javascript"></script>
@endsection
