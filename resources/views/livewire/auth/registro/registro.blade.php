<div>
    
    @if ($openModal)

        @if (session()->has('message'))

            @if (session('message') == 'Registro completo')

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>¡Registro Completado!</strong> Enviamos un email al correo electronico que registraste para que actives tú cuenta.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <x-modals.info>

                    <x-slot name="titulo">
                        <h3 class="title-text-modal" style="text-align: center;">Registro Exitoso</h3>
                    </x-slot>

                    <x-slot name="imagen">
                        <img src="https://img.icons8.com/color/48/null/ok--v1.png"/>
                    </x-slot>

                    <x-slot name="contenido">
                        <p>¡Tú registro se realizo con éxito!</p>
                    </x-slot>

                    <x-slot name="link">
                        <p>Para iniciar sesión da click <a href="http://localhost:8000/login">aquí</a></p>
                    </x-slot>

                    <x-slot name="botonOK">
                        <button type="button" wire:click="$set('openModal',false)" class="btn btn-primary">OK</button>
                    </x-slot>

                </x-modals.info>

            @elseif (session('message') == 'Correo no enviado')

            <x-modals.info>

                <x-slot name="titulo">
                    <h3 class="title-text-modal">Proceso Fallido</h3>
                </x-slot>

                <x-slot name="imagen">
                    <img src="https://img.icons8.com/office/16/null/cancel.png"/>
                </x-slot>

                <x-slot name="contenido">
                    <p>Actualmente no es posible enviar el correo electronico de activación de la cuenta.</p>
                    <p>En los proximos días será enviado a tu correo electronico registrado.</p>
                </x-slot>

                <x-slot name="botonOK">
                    <button type="button" wire:click="$set('openModal',false)" class="btn btn-primary">OK</button>
                </x-slot>

            </x-modals.info>

            @elseif (session('message') == 'Registro no creado')

            <x-modals.info>

                <x-slot name="titulo">
                    <h3 class="title-text-modal">Registro Fallido</h3>
                </x-slot>

                <x-slot name="imagen">
                    <img src="https://img.icons8.com/office/16/null/cancel.png"/>
                </x-slot>

                <x-slot name="contenido">
                    <p>Actualmente no es posible registrarte en el sistema, intente más tarde.</p>
                </x-slot>

                <x-slot name="botonOK">
                    <button type="button" wire:click="$set('openModal',false)" class="btn btn-primary">OK</button>
                </x-slot>

            </x-modals.info>

            @endif
            
        @endif

        

    @endif





    <div class="content-register">

        <div class="section-title">

            <div class="title">
                <h1>System Sales</h1>
            </div>

            <div class="subtitle">
                <h4>Registrate</h4>
            </div>

            <div class="separator">
                <hr>
            </div>

        </div>


        <div class="first-section">

            <div class="row">

                <div class="col">

                    <div class="image">
                        <img src="https://orquideatech.com/wp-content/uploads/2019/04/newsletter-registro-1.jpg" alt="">
                    </div>

                </div>


                <div class="col">

                    <div class="section-datos-personales">
                        <h1>Datos Personales</h1>
                    </div>

                        <form>

                            <div class="section-cuestions">

                                <div class="first-part">
        
                                    <div class="nombres">
                                        <label for="" class="form-label">Nombres</label>
                                        <input type="text"
                                          class="form-control @error('nombres') is-invalid @enderror form-control" wire:model="nombres" name="" id="nombres" placeholder="Nombres" aria-describedby="helpId" placeholder="">

                                        @error('nombres')
                                            <span class="message-error">{{ $message }}</span>
                                        @enderror

                                    </div>
        
                                    
                                    <div class="row section-apellido">
        
                                        <div class="col">
        
                                            <div class="mb-3">
                                              <label for="" class="form-label">Primer apellido</label>
                                              <input type="text"
                                                class="form-control @error('primer_apellido') is-invalid @enderror form-control" wire:model="primer_apellido" name="" id="primer_apellido" aria-describedby="helpId" placeholder="Primer Apellido">
                                            
                                                @error('primer_apellido')
                                                <span class="message-error">{{ $message }}</span>
                                                @enderror      

                                            </div>
        
                                        </div>
        
        
                                        <div class="col">
        
                                            <div class="mb-3">
                                              <label for="" class="form-label">Segundo apellido</label>
                                              <input type="text"
                                                class="form-control @error('segundo_apellido') is-invalid @enderror form-control" wire:model="segundo_apellido" name="" id="segundo_apellido" aria-describedby="helpId" placeholder="Segundo Apellido">
                                            
                                                @error('segundo_apellido')
                                                <span class="message-error">{{ $message }}</span>
                                                @enderror     

                                            </div>
        
                                        </div>
        
        
                                    </div>
        
        
                                    <div class="row section-document">
        
                                        <div class="col">
        
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tipo de documento</label>
                                                <select class="form-select form-select-lg @error('tipo_documento') is-invalid @enderror form-control" wire:model="tipo_documento" name="" id="tipo_documento">
                                                    <option>Seleccione</option>

                                                    @foreach ($documents as $document)
                                                        <option value="{{ $document->id }}">{{ $document->nombre }}</option>
                                                    @endforeach

                                                </select>

                                                @error('tipo_documento')
                                                <span class="message-error">{{ $message }}</span>
                                                @enderror   

                                            </div>
        
                                        </div>
        
        
                                        <div class="col">
        
                                            <div class="mb-3">
                                              <label for="" class="form-label">No. Documento</label>
                                              <input type="number"
                                                class="form-control @error('documento') is-invalid @enderror form-control" wire:model="documento" name="" id="no_documento" aria-describedby="helpId" placeholder="123456789">
                                            
                                                @error('documento')
                                                <span class="message-error">{{ $message }}</span>
                                                @enderror 
                                            
                                            </div>
        
                                        </div>
        
        
        
                                    </div>
        
        
                                    <div class="email">
                                      <label for="" class="form-label">Email</label>
                                      <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror form-control" name="" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">

                                      @error('email')
                                      <span class="message-error">{{ $message }}</span>
                                      @enderror   

                                    </div>
        
                                    <div class="row section-phone">
        
                                        <div class="col">
        
                                            <div class="mb-3">
                                                <label for="" class="form-label">Código de País</label>
                                                <select class="form-select form-select-lg @error('codigo_pais') is-invalid @enderror form-control" wire:model="codigo_pais" name="" id="codigo_pais">
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
                                              <label for="" class="form-label">No. de Teléfono</label>
                                              <input type="text"
                                                class="form-control @error('telefono') is-invalid @enderror form-control" wire:model="telefono" name="" id="no_telefono" aria-describedby="helpId" placeholder="123456789">

                                                @error('telefono')
                                                <span class="message-error">{{ $message }}</span>
                                                @enderror    

                                            </div>
        
                                        </div>
        
        
        
                                    </div>
        
        
                                    <div class="section-date">
        
                                        <div class="row">

                                            <div class="col">

                                                <div class="fecha">
                                                    <label for="" class="form-label">Fecha de Nacimiento</label>
                                                    <input class="form-control @error('fecha_nacimiento') is-invalid @enderror form-control" wire:model="fecha_nacimiento" id="fecha_nacimiento" type='date' max="2004-12-31"/>
        
                                                    @error('fecha_nacimiento')
                                                    <span class="message-error">{{ $message }}</span>
                                                    @enderror 
        
                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Genero</label>
                                                    <select class="form-select form-select-lg @error('genero') is-invalid @enderror form-control" wire:model="genero" name="" id="genders">
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

                                        </div>

        
                                    </div>
        
                                    <div class="section-password">
        
                                        <div class="row">
        
                                            <div class="col">
        
                                                <div class="mb-3">
                                                  <label for="" class="form-label">Contraseña</label>
                                                  <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror form-control" name="" id="password" placeholder="********" autocomplete="off">

                                                  @error('password')
                                                  <span class="message-error">{{ $message }}</span>
                                                  @enderror 

                                                </div>
        
                                            </div>
        
        
                                            <div class="col">
        
                                                <div class="mb-3">
                                                  <label for="" class="form-label">Confirmar Contraseña</label>
                                                  <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror form-control" name="" id="pass" placeholder="********" autocomplete="off">

                                                  @error('password_confirmation')
                                                  <span class="message-error">{{ $message }}</span>
                                                  @enderror 

                                                </div>
        
                                            </div>
        
                                        </div>
        
                                    </div>


                                    <div class="section-acuerdos">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="" value="option1" wire:model="permission">
                                            <label class="form-check-label" for="">Acepto todas las declaraciones en <a href="">Términos y condiciones de servicio</a></label>

                                            @error('permission')
                                            <span class="message-error-permisos">Es necesario aceptar los permisos para continuar</span>
                                            @enderror 

                                        </div>
                     
                                    </div>
        
        
                                </div>

                                <div>
                                {!! RecaptchaV3::initJs() !!}
                                {!! RecaptchaV3::field('capcha') !!}
                                </div>


        
                                <div class="section-btn">
                                    <button type="button" class="btn btn-primary disabled:opacity-25" wire:loading.attr='disabled' wire:target='registrar' wire:click.prevent='registrar()'>Registrar</button>
                                </div>
        
                            </div>



                        </form>


                </div>


            </div>



        </div>


    </div>

    @push('scripts')


    @endpush



</div>
