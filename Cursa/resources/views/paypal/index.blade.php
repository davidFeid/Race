@extends('layouts.app')

@section('template_title')
    Update Runner
@endsection

@section('content')

<div class="container">
    <div class="payment-box shadow">
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error') }}</div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success') }}</div>
            <a href="{{ route('generatePDF')}}" class="btn btn-primary"> Generate invoice (PDF)</a>
        @endif
        <div class="payment-box">
            <form action="{{ route('requestpayment')}}" method="POST">
                @csrf
                <input type="number" name="amount" placeholder="Enter The Price" class="form-control">
                <input type="submit"  value="PayPal" class="btn-container-module-paypal">

            </form>
        </div>


    </div>

</div>
<script src="https://www.paypal.com/sdk/js?client-id=env('PAYPAL_SANDBOX_CLIENT_ID')"></script>


@endsection

