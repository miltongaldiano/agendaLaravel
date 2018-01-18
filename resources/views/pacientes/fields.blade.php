<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf', 'Cpf:') !!}
    {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
</div>

<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cep', 'Cep:') !!}
    {!! Form::text('cep', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
</div>

<!-- Cidade Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade_id', 'Cidade:') !!}
    <!-- {!! Form::select('cidade_id', $cidades, ['class' => 'form-control', 'id'=>'cidade']) !!} -->
    <select name="cidade_id" id="cidade">
        <option value=""></option>
        @foreach($cidades as $cidade)
        <option value="{!!$cidade->id!!}" data-value="{!!$cidade->ibge!!}" {{(isset($paciente) && $paciente->cidade_id == $cidade->id ? 'selected':'')}}>{!!$cidade->nome!!}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pacientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
