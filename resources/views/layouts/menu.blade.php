<li class="{{ Request::is('pacientes*') ? 'active' : '' }}">
    <a href="{!! route('pacientes.index') !!}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
</li>

<li class="{{ Request::is('medicos*') ? 'active' : '' }}">
    <a href="{!! route('medicos.index') !!}"><i class="fa fa-edit"></i><span>Medicos</span></a>
</li>

<li class="{{ Request::is('agendas*') ? 'active' : '' }}">
    <a href="{!! route('agendas.index') !!}"><i class="fa fa-edit"></i><span>Agendas</span></a>
</li><li class="{{ Request::is('estados*') ? 'active' : '' }}">
    <a href="{!! route('estados.index') !!}"><i class="fa fa-edit"></i><span>Estados</span></a>
</li>

<li class="{{ Request::is('cidades*') ? 'active' : '' }}">
    <a href="{!! route('cidades.index') !!}"><i class="fa fa-edit"></i><span>Cidades</span></a>
</li>