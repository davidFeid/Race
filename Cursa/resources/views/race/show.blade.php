@extends('layouts.app')

@section('template_title')
    {{ $race->name ?? 'Show Race' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Race</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('races.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $race->description }}
                        </div>
                        <div class="form-group">
                            <strong>Ramp:</strong>
                            {{ $race->ramp }}
                        </div>
                        <div class="form-group">
                            <strong>Max Participants:</strong>
                            {{ $race->max_participants }}
                        </div>
                        <div class="form-group">
                            <strong>Km:</strong>
                            {{ $race->km }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $race->date }}
                        </div>
                        <div class="form-group">
                            <strong>Hour:</strong>
                            {{ $race->hour }}
                        </div>
                        <div class="form-group">
                            <strong>Starting Point:</strong>
                            {{ $race->starting_point }}
                        </div>
                        <div class="form-group">
                            <strong>Maps Image:</strong>
                            {{ $race->maps_image }}
                        </div>
                        <div class="form-group">
                            <strong>Promotional Poster:</strong>
                            {{ $race->promotional_poster }}
                        </div>
                        <div class="form-group">
                            <strong>Sponsor Price:</strong>
                            {{ $race->sponsor_price }}
                        </div>
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $race->active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
