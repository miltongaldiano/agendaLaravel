<!-- Datahora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datahora', 'Datahora:') !!}
    <!-- {!! Form::date('datahora', (isset($agenda) ? $agenda->datahora : null), ['class' => 'form-control']) !!} -->
    <input id="datahora" value="{{(isset($agenda) ? $agenda->datahora : null)}}" name="datahora" type="datetime-local">
</div>

<!-- Medico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medico_id', 'Medico:') !!}
    <!-- {!! Form::number('medico_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('medico_id', (isset($medicos) ? $medicos : null), ['class' => 'form-control', 'id'=>'medico_id']) !!}
</div>

<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente:') !!}
    <!-- {!! Form::number('paciente_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('paciente_id', (isset($pacientes) ? $pacientes : null), ['class' => 'form-control', 'id'=>'paciente_id']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agendas.index') !!}" class="btn btn-default">Cancel</a>
</div>
