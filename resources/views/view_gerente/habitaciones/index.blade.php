@extends('partials/template')
@section('sidebar-list')
{{-- a la opción del sidebar activa (visitada) añadir clase 'active' --}}
<li class="sidebar-list-item ">
    <a href="{{ route('gerente/home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-home">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <polyline points="9 22 9 12 15 12 15 22" />
        </svg>
        <span>Home</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('gerente/huespedes') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-shopping-bag">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
        </svg>
        <span>Huespedes</span>
    </a>
</li>
<li class="sidebar-list-item active">
    <a href="{{ route('gerente/habitaciones') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-pie-chart">
            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
            <path d="M22 12A10 10 0 0 0 12 2v10z" />
        </svg>
        <span>Habitaciones</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('gerente/recepcionistas') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span>Recepcionistas</span>
    </a>
</li>
@endsection
@section('app-content')
    @section('activate-habit')
        active
    @endsection
    @section('title')
        Habitaciones actuales
    @endsection
    @section('app-content-actions')
        @component('partials/actions')
            @section('campos-búsqueda')
                <option value="nroHabitacion">Nro habitacion</option>
                <option value="tipo">Tipo</option>
                <option value="precio">Precio</option>
                <option value="estado">Estado</option>
            @endsection
        @endcomponent
    @endsection
    @section('button-insert')
        <a href="{{ route('gerente/habitaciones-showCreate') }}"><button class="app-content-headerButton">Registrar habitación</button></a>
    @endsection

    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                Nro habitación
                <button class="sort-button" onclick="sortList('nroHabitacion')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell status-cell">
                Tipo
                <button class="sort-button" onclick="sortList('tipo')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell sales">
                Precio
                <button class="sort-button" onclick="sortList('precio')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell stock">
                Estado
            </div>
            <div class="product-cell price">
                Accion
            </div>
        </div>
        {{-- Aquí la lista de habitaciones --}}
        @foreach ($habitaciones as $habitacion)
        <a class="row-element" href="{{ route('gerente/habitaciones-show', ['id'=>$habitacion->id]) }}">
            <div class="products-row">
                <div class="product-cell nroHabitacion">
                    <span class="value-row">{{$habitacion->nro_habitacion}}</span>
                </div>
                <div class="product-cell tipo">
                    <span class="cell-label">Tipo:</span>
                    <span class="value-row">{{$habitacion->tipo_habitacion}}</span>
                </div>
                <div class="product-cell precio">
                    <span class="cell-label">Precio:</span>
                    <span class="value-row">{{$habitacion->precio}}</span>
                </div>
                <div class="product-cell estado">
                    <span class="cell-label">Estado:</span>
                    <span class="value-row status {{$habitacion->estado}}">{{$habitacion->estado}}</span>
                </div>
                <span class="cell-label"><textarea class="form-input" disabled>{{$habitacion->caracteristicas}}</textarea></span>
                <div class="product-cell action">
                    <form action="{{ route('gerente/habitaciones-delete', ['id'=>$habitacion->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="raise btn-red">Eliminar</button>
                    </form>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection
