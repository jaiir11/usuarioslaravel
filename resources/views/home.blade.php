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
        <div class="col-ms-12">
            <table style="width:100%">
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
                <td width="45" height="45"><img src="{{ $rou->image ? '/images/'.$rou->image :  '/images/Avatar.jpg'}}"> </td> 
            </tr>
              @endforeach 
            </table>
        </div>
    </div>
</div>
@endsection
