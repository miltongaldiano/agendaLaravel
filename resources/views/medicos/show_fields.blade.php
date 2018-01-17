<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $medico->id !!}</p>
</div>

<!-- Nome Medico Field -->
<div class="form-group">
    {!! Form::label('nome_medico', 'Nome Medico:') !!}
    <p>{!! $medico->nome_medico !!}</p>
</div>

<!-- Crm Field -->
<div class="form-group">
    {!! Form::label('crm', 'Crm:') !!}
    <p>{!! $medico->crm !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $medico->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $medico->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $medico->deleted_at !!}</p>
</div>

