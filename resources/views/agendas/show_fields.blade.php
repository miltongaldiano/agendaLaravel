<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $agenda->id !!}</p>
</div>

<!-- Datahora Field -->
<div class="form-group">
    {!! Form::label('datahora', 'Datahora:') !!}
    <p>{!! $agenda->datahora !!}</p>
</div>

<!-- Medico Id Field -->
<div class="form-group">
    {!! Form::label('medico_id', 'Medico Id:') !!}
    <p>{!! $agenda->medico_id !!}</p>
</div>

<!-- Paciente Id Field -->
<div class="form-group">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    <p>{!! $agenda->paciente_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $agenda->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $agenda->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $agenda->deleted_at !!}</p>
</div>

