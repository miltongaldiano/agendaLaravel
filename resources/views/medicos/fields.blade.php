<!-- Nome Medico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_medico', 'Nome Medico:') !!}
    {!! Form::text('nome_medico', null, ['class' => 'form-control']) !!}
</div>

<!-- Crm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('crm', 'Crm:') !!}
    {!! Form::text('crm', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('medicos.index') !!}" class="btn btn-default">Cancel</a>
</div>
