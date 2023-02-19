<form method="POST" action="http://127.0.0.1:8000/runnerForm/registro/total"  role="form" enctype="multipart/form-data" class="row g-3">
@csrf
    <h4>Register Runner</h4>
    <div class="col-md-12">
      <label for="dni" class="form-label">DNI</label>
      <input type="text" class="form-control" id="dni" name="dni" required>
    </div>
    <div class="col-md-12">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="col-md-12">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="col-md-12">
      <label for="birth_date" class="form-label">birth date</label>
      <input type="date" class="form-control" id="birth_date" name="birth_date" required>
    </div>
    <div class="col-md-12">
        <label for="federation" class="form-label">Federation</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="federation" id="federation0" value="0" onchange="document.getElementById('num_federation').disabled = true;" checked>
            <label class="form-check-label" for="federation0">
              No
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="federation" id="federation1" value="1" onchange="document.getElementById('num_federation').disabled = false;">
          <label class="form-check-label" for="federation1">
            Yes
        </label>
        </div>
    </div>
    <div class="col-md-12">
      <label for="num_federation" class="form-label">Num Federation</label>
      <input type="number" class="form-control" id="num_federation" name="num_federation" disabled required>
    </div>
    <h4>Insurer to Race</h4>
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
      <button class="btn btn-primary" type="submit">Register</button>
    </div>

    
</form>