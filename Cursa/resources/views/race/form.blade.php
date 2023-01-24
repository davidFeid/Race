<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $race->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ramp') }}
            {{ Form::text('ramp', $race->ramp, ['class' => 'form-control' . ($errors->has('ramp') ? ' is-invalid' : ''), 'placeholder' => 'Ramp']) }}
            {!! $errors->first('ramp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('max_participants') }}
            {{ Form::text('max_participants', $race->max_participants, ['class' => 'form-control' . ($errors->has('max_participants') ? ' is-invalid' : ''), 'placeholder' => 'Max Participants']) }}
            {!! $errors->first('max_participants', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('km') }}
            {{ Form::text('km', $race->km, ['class' => 'form-control' . ($errors->has('km') ? ' is-invalid' : ''), 'placeholder' => 'Km']) }}
            {!! $errors->first('km', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $race->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hour') }}
            {{ Form::text('hour', $race->hour, ['class' => 'form-control' . ($errors->has('hour') ? ' is-invalid' : ''), 'placeholder' => 'Hour']) }}
            {!! $errors->first('hour', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('starting_point') }}
            {{ Form::text('starting_point', $race->starting_point, ['class' => 'form-control' . ($errors->has('starting_point') ? ' is-invalid' : ''), 'placeholder' => 'Starting Point']) }}
            {!! $errors->first('starting_point', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('maps_image') }}
            {{ Form::text('maps_image', $race->maps_image, ['class' => 'form-control' . ($errors->has('maps_image') ? ' is-invalid' : ''), 'placeholder' => 'Maps Image']) }}
            {!! $errors->first('maps_image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('promotional_poster') }}
            {{ Form::text('promotional_poster', $race->promotional_poster, ['class' => 'form-control' . ($errors->has('promotional_poster') ? ' is-invalid' : ''), 'placeholder' => 'Promotional Poster']) }}
            {!! $errors->first('promotional_poster', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sponsor_price') }}
            {{ Form::text('sponsor_price', $race->sponsor_price, ['class' => 'form-control' . ($errors->has('sponsor_price') ? ' is-invalid' : ''), 'placeholder' => 'Sponsor Price']) }}
            {!! $errors->first('sponsor_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('active') }}
            {{ Form::text('active', $race->active, ['class' => 'form-control' . ($errors->has('active') ? ' is-invalid' : ''), 'placeholder' => 'Active']) }}
            {!! $errors->first('active', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>