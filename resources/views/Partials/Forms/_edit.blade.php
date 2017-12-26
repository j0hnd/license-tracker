<div class="col-md-12">
    {!! Form::open(['id' => 'edit-license-form', 'method' => 'post']) !!}
    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state-name" placeholder="State Name" disabled>
    </div>
    <div class="form-group">
        <label for="license-number">License Number</label>
        <input type="text" class="form-control" id="license-number" name="license_number" placeholder="License Number">
    </div>
    <div class="form-group">
        <label for="expiration-date">Expiration Date</label>
        <input type="text" class="form-control datepicker" id="expiration-date" name="expiration_date" placeholder="mm/dd/yyyy">
    </div>

    {!! Form::hidden('license_id', null, ['id' => 'license_id']) !!}
    {!! Form::hidden('state_id', null, ['id' => 'state_id']) !!}

    {!! Form::close() !!}
</div>
