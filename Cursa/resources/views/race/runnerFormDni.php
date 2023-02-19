<form class="row g-3">
  <div class="col-md-12">
    <label for="runner_dni" class="form-label">DNI</label>
    <input type="text" class="form-control" id="runner_dni" name="runner_dni" required>
  </div>
  <div class="col-md-12">
    <label for="insurer_cif" class="form-label">Insurer</label>
    <select class="form-select" id="insurer_cif" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

{{$value}}