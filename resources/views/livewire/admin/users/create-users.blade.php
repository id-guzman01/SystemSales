<div>

    @if (session()->has('message'))

        @if (session('message')=='Registro no creado')

            <script>

                Swal.fire({
                    icon: 'error',
                    text: 'Actualmente no es posible realizar el registor, intente más tarde.',
                })

            </script>

        @elseif (session('message') == 'Registro creado')    

            <script>

                Swal.fire({
                    icon: 'success',
                    text: 'El registro del usuario nuevo se realizó con éxito.',
                })

            </script>

        @endif


    @endif




    <div class="content-principal">

        <div class="section-btn-back">
            <button type="button" class="btn" wire:click="regresar"> <i class="fas fa-arrow-left"></i> Regresar</button>
        </div>

        <div class="content-formulario">

            <div class="row">

                <div class="col form-questions">

                    <form>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombres</label>
                            <input type="text"
                              class="form-control @error('nombres') is-invalid @enderror form-control" wire:model="nombres" name="" id="" aria-describedby="helpId" placeholder="Nombres">

                              @error('nombres')
                                <span class="message-error">{{ $message }}</span>
                              @enderror 

                          </div>
                    
                          <div class="row section-form-space">
                    
                              <div class="col">
                    
                                  <div class="mb-3">
                                    <label for="" class="form-label">Primer Apellido</label>
                                    <input type="text"
                                      class="form-control @error('primer_apellido') is-invalid @enderror form-control" wire:model="primer_apellido" name="" id="" aria-describedby="helpId" placeholder="Primer Apellido">

                                    @error('primer_apellido')
                                      <span class="message-error">{{ $message }}</span>
                                    @enderror 

                                  </div>
                    
                              </div>
                    
                              <div class="col">
                    
                                    <div class="mb-3">
                                      <label for="" class="form-label">Segundo Apellido</label>
                                      <input type="text"
                                        class="form-control @error('segundo_apellido') is-invalid @enderror form-control" wire:model="segundo_apellido" name="" id="" aria-describedby="helpId" placeholder="Segundo Apellido">

                                        @error('segundo_apellido')
                                            <span class="message-error">{{ $message }}</span>
                                        @enderror 

                                    </div>
                    
                              </div>
                    
                          </div>
                    
                    
                          <div class="row section-form-space">
                    
                              <div class="col">
                    
                                  <div class="mb-3">
                                      <label for="" class="form-label">Tipo de Documento</label>
                                      <select class="form-control @error('tipo_documento') is-invalid @enderror form-control" wire:model="tipo_documento" name="" id="">

                                          <option>Seleccione</option>

                                        @foreach ($documents as $document)
                                            <option value="{{$document->id}}">{{$document->nombre}}</option>
                                        @endforeach

                                      </select>
                                      
                                      @error('tipo_documento')
                                        <span class="message-error">{{ $message }}</span>
                                      @enderror   

                                  </div>
                    
                              </div>
                    
                              <div class="col">
                    
                                  <div class="mb-3">
                                    <label for="" class="form-label">Documento</label>
                                    <input type="number"
                                      class="form-control @error('documento') is-invalid @enderror form-control" wire:model="documento" name="" id="" aria-describedby="helpId" placeholder="Número de documento">

                                    @error('documento')
                                      <span class="message-error">{{ $message }}</span>
                                    @enderror   

                                  </div>
                    
                              </div>
                    
                          </div>
                    
                    
                          <div class="row section-form-space">
                    
                              <div class="col">
                    
                                  <div class="mb-3">
                                      <label for="" class="form-label">Código País</label>
                                      <select class="form-control @error('codigo_pais') is-invalid @enderror form-control" wire:model="codigo_pais" name="" id="">
                                          <option>Seleccione</option>

                                            @foreach ($codes as $code)
                                                <option value="{{$code->id}}">{{$code->codigo}} {{$code->pais}}</option>
                                            @endforeach


                                      </select>

                                    @error('codigo_pais')
                                      <span class="message-error">{{ $message }}</span>
                                    @enderror

                                  </div>
                    
                              </div>
                    
                              <div class="col">
                    
                                  <div class="mb-3">
                                    <label for="" class="form-label">Teléfono</label>
                                    <input type="number"
                                      class="form-control @error('telefono') is-invalid @enderror form-control" wire:model="telefono" name="" id="" aria-describedby="helpId" placeholder="Número de Telefono">

                                    @error('telefono')
                                      <span class="message-error">{{ $message }}</span>
                                    @enderror
                                      
                                  </div>
                    
                              </div>
                    
                    
                          </div>
                    
                    
                          <div class="row section-form-space">

                            <div class="col">

                                <div class="mb-3">
                                    <label for="" class="form-label">Genero</label>
                                    <select class="form-control @error('genero') is-invalid @enderror form-control" wire:model="genero" name="" id="">
                                        <option>Seleccione</option>
      
                                        @foreach ($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->nombre}}</option>                                            
                                        @endforeach

                                    </select>

                                    @error('genero')
                                        <span class="message-error">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="mb-3">
                                    <label for="" class="form-label">Rol</label>
                                    <select class="form-control @error('role') is-invalid @enderror form-control" wire:model="role" name="" id="">
                                        <option>Seleccione</option>
      
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>                                            
                                        @endforeach

                                    </select>

                                    @error('role')
                                        <span class="message-error">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>




                          </div>

                    
                    
                          <div class="mb-3 section-form-space">
                            <label for="" class="form-label">Email</label>
                            <input type="email"
                              class="form-control @error('email') is-invalid @enderror form-control" wire:model="email" name="" id="" aria-describedby="helpId" placeholder="abc@example.com">

                            @error('email')
                              <span class="message-error">{{ $message }}</span>
                            @enderror

                        </div>
                    
                    
                        <div class="mb-3 section-form-space">
                            <label for="" class="form-label">Fecha de Nacimiento</label>
                            <input class="form-control @error('fecha_nacimiento') is-invalid @enderror form-control" wire:model="fecha_nacimiento" id="fecha_nacimiento" type='date' max="2004-12-31"/>

                            @error('fecha_nacimiento')
                                <span class="message-error">{{ $message }}</span>
                            @enderror 

                        </div>


                        <div class="section-btn-register">
                            <button type="button" class="btn disabled:opacity-25" wire:loading.attr='disabled' wire:target='registro' wire:click="registro()">Registrar</button>
                        </div>
                    
                    
                    </form>




                </div>

                <div class="col">

                    <img src="{{ asset('/storage/assets/pc-escritorio.jpg') }}" alt="">

                </div>

            </div>



        </div>


    </div>


</div>








