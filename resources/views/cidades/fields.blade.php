<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado:') !!}
    <!-- {!! Form::number('estado_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('estado_id', (isset($estados) ? $estados : null), ['class' => 'form-control', 'id'=>'estado_id']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Ibge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ibge', 'Ibge:') !!}
    {!! Form::text('ibge', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cidades.index') !!}" class="btn btn-default">Cancel</a>
</div>
