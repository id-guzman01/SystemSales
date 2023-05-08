<div>
    
    @props([
        'alerta'
    ])

    <div class="alert alert-{{$alerta}} alert-dismissible fade show" role="alert">
        <strong>{{$titulo}}</strong> {{$contenido}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

</div>