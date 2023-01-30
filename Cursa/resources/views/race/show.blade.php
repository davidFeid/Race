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
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Edad</th>
                            </tr>
                            @foreach ($runners as $runner)
                                <tr>
                                    <td>{{$runner->id}}</td>
                                    <td>{{$runner->name}}</td>
                                    <td>{{$runner->address}}</td>
                                    <td>{{$runner->birth_date}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@endsection
