<div wire:init="lodadData">

    <x-componentes.table>

        <x-slot:contenido>

        <div class="head-table">

            <div class="row">

                <div class="col">

                    <div class="section-entries">
                        <div class="mb-3">
                            <label for="" class="form-label">Registros</label>
                            <select class="form-select form-select-lg" wire:model="paginas" name="" id="">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>

                </div>


                <div class="col">

                    <div class="section-btn">
                        <button type="button" wire:click="new_user()" class="btn btn-danger"> <i class="fas fa-plus"></i> Nuevo</button>
                    </div>

                </div>

                <div class="col">

                    <div class="section-search">
                        <div class="mb-3">
                          <label for="" class="form-label">Buscar</label>
                          <input type="text"
                            class="form-control" wire:model="search" name="" id="" aria-describedby="helpId" placeholder=" Buscar">
                        </div>
                    </div>

                </div>


            </div>

        </div>
        
        <div class="table-wrapper">

            @if (count($users))

                <table class="fl-table">
                    <thead>
                    <tr>
                        <th>
                            ID 
                            <a name="" id="btn btn-primary" role="button" wire:click='ordenar("id")'>
                                @if ($column == 'id')
                                
                                    @if ($order == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </a>
                        </th>

                        <th>
                            Usuario
                            <a name="" id="btn btn-primary" role="button" wire:click='ordenar("nombres")'>
                                @if ($column == 'nombres')
                                
                                    @if ($order == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </a>
                        </th>

                        <th>
                            Documento
                            <a name="" id="btn btn-primary" role="button" wire:click='ordenar("documento")'>
                                @if ($column == 'documento')
                                
                                    @if ($order == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </a>
                        </th>

                        <th>Estado</th>
                        <th align="center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            
                            <tr>
                                <td>
                                    <div class="section-id">
                                        <h5>{{$user->id}}</h5>
                                    </div>
                                </td>

                                <td class="td-user">

                                    <div class="row">

                                        <div class="col">
                                            <div class="section-photo">
                                                <img src="{{ asset($user->url) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="col user-date">
                                            <div class="section-user-date">
                                                <h5>{{$user->nombres}} {{$user->primer_apellido}} {{$user->segundo_apellido}}</h5>
                                                <p>{{$user->email}}</p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </td>
                                <td>
                                    <div class="section-document">
                                        <h5>{{$user->documento}}</h5>
                                    </div>
                                </td>
                                <td>

                                    @if ($user->estado_id == 1)
                                        <div class="state_user">
                                            <p class="state_user_green"> <i class="fas fa-check"></i> Activo</p>
                                        </div>
                                    @endif
                                    
                                    @if ($user->estado_id == 2)
                                        <div class="state_user">
                                            <p class="state_user_red"> <i class="fas fa-ban"></i> Inactivo</p>
                                        </div> 
                                    @endif
                                    
                                    @if ($user->estado_id == 3)
                                        <div class="state_user">        
                                            <p class="state_user_orange"> <i class="fas fa-exclamation"></i> Sin Activar</p>
                                        </div>    
                                    @endif

                                </td>
                                <td align="center">

                                    <button type="button" class="btn btn-primary"> <i class="fas fa-eye icon-size icon-eye"></i> </button>
                                    <button type="button" class="btn btn-warning"> <i class="fas fa-edit icon-size"></i> </button>
                                    <button type="button" class="btn btn-danger"> <i class="fas fa-trash icon-size"></i> </button>

                                </td>
                            </tr>

                        @endforeach

                    <tbody>
                </table>

                <div class="footer-table">

                    <div class="content-footer">
                        {{ $users->links() }}
                    </div>
        
                </div>

            @else
                
                @if ($stateLoadTable == 'cargando')


                        <div class="load">
                            <div id="preloader6">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            Cargando Contenido
                        </div>


                @else
                    
                    <div class="empty">
                        <h3>El registro que busca no se encuentra registrado en la base de datos</h3>
                    </div>

                @endif

                

            @endif


        </div>

        </x-slot:contenido>

    </x-componentes.table>

</div>
