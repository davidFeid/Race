@extends('layouts.app')

@section('template_title')
    {{ $insurer->name ?? 'Show Insurer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Insurer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('insurers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cif:</strong>
                            {{ $insurer->cif }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $insurer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $insurer->address }}
                        </div>
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $insurer->active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
