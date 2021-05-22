@foreach($usuarios as $rou)
<tr>
    <td>{{ $rou->id }}</td>
    <td><a href="/usuario/{{ $rou->id }}">{{ $rou->name }}</a></td>
    <td>{{ $rou->status == 1 ? 'Activo' : 'Inactivo'}}</td>
    <td width="45" height="45"><img src="{{ $rou->image ? '/images/'.$rou->image :  '/images/Avatar.jpg'}}"> </td> 
</tr>
@endforeach 