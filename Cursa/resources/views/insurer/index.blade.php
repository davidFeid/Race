@extends('layouts.app')

@section('template_title')
    Insurer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Insurer') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('insurers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cif</th>
										<th>Name</th>
										<th>Address</th>
										<th>Price</th>
										<th>Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insurers as $insurer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $insurer->cif }}</td>
											<td>{{ $insurer->name }}</td>
											<td>{{ $insurer->address }}</td>
											<td>{{ $insurer->price }}</td>
											<td>{{ $insurer->active }}</td>

                                            <td>
                                                <form action="{{ route('insurers.destroy',$insurer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('insurers.show',$insurer->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('insurers.edit',$insurer->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $insurers->links() !!}
            </div>
        </div>
    </div>
@endsection
