@extends('layouts.app')


@section('content')
{{$race}}
<p class="text-center">
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Register with ID</a>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Register from scratch</button>
</p>
    <div class="row">
        <div class="col-6">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body">
              
                <form method="POST" action="http://127.0.0.1:8000/runnerForm/registro/dni"  role="form" enctype="multipart/form-data" class="row g-3">
                @csrf
                    <div class="col-md-12">
                      <label for="runner_dni" class="form-label">DNI</label>
                      <input type="text" class="form-control" id="runner_dni" name="runner_dni" required>
                    </div>
                    <div class="col-md-12">
                      <label for="insurer_cif" class="form-label">Insurer</label>
                      <select class="form-select" id="insurer_cif" name="insurer_cif" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach ($race[0]->raceInsurer as $insurer)
                        <option value="{{$insurer->insurer_cif}}">{{$insurer->insurer_cif}}</option>
                        @endforeach
                      </select>
                    </div>
                    <input type="hidden" id="dorsal" name="dorsal" value="{{$dorsal}}">
                    <input type="hidden" id="race_id" name="race_id" value="{{$id}}">
                    <div class="col-12">
                      <button class="btn btn-primary" type="submit">register</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
  <div class="col-6">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
      {{ method_field('PATCH') }}
          @csrf
          @include('race.runnerFormRegister')
      </div>
    </div>
  </div>
</div>
@endsection