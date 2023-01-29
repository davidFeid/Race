@extends('layouts.app')

@section('template_title')
    {{ $sponsor->name ?? 'Show Sponsor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sponsor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sponsors.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cif:</strong>
                            {{ $sponsor->cif }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $sponsor->name }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $sponsor->logo }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $sponsor->address }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $sponsor->email }}
                        </div>
                        <div class="form-group">
                            <strong>Home:</strong>
                            {{ $sponsor->home }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $sponsor->total }}
                        </div>
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $sponsor->active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
