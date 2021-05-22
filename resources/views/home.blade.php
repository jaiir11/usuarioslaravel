@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> 
        <div class="col-ms-12" style='text-align: center;'>
            <table style="width: 100%; text-align: center;" id="contenidoajax">
              <caption>Monthly savings</caption>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Staus</th>
                <th>Imagen</th>
              </tr>
              @foreach($usuarios as $rou)
            <tr>
                <td>{{ $rou->id }}</td>
                <td><a href="/usuario/{{ $rou->id }}">{{ $rou->name }}</a></td>
                <td>{{ $rou->status == 1 ? 'Activo' : 'Inactivo'}}</td>
                <td><img src="{{ $rou->image ? '/images/'.$rou->image :  '/images/Avatar.jpg'}}"> </td> 
            </tr>
              @endforeach
              <span ></span> 
            </table>
        </div>
        <div>
            <button id="siguiente" value="2">siguiente</button>
        </div>
    </div>
</div>
@endsection
