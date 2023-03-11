<div>
    
    @if (session()->has('message'))

    @if (session('message')=='email erroneo')

        <script>

            Swal.fire({
                icon: 'error',
                text: 'El email que ingresaste es erroneo o no se encuentra registrada, intente nuevamente',
            })

        </script>

    @elseif (session('message') == 'contraseña erronea')    

    <script>

        Swal.fire({
            icon: 'error',
            text: 'La contraseña que ingresaste es erronea, intente nuevamente',
        })

    </script>


    @elseif (session('message') == 'Proceso Fallido')

    <script>

        Swal.fire({
            icon: 'error',
            text: 'Actualmente no es posible procesar la solicitud, intente nuevamente',
        })

    </script>

    @endif

    
@endif


    <div class="content-principal">

        <div class="content-title">
            <h1>¡Bienvenido!</h1>
            <h3>Activa Tú cuenta</h3>
        </div>

        <div class="line-separator">
            <hr>
        </div>

        <div class="section-description">
            <p>Si quieres activar tú cuenta debes iniciar sesión en está sección</p>
        </div>

        <div class="content-form">

            <form>

                <div class="mb-3">
                  <label for="" class="form-label">Email</label>
                  <input type="email" wire:model="email" id="inputmnan" class="form-control @error('email') is-invalid @enderror form-control" name="" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">

                  @error('email')
                  <span class="message-error">{{ $message }}</span>
                  @enderror 

                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Password</label>
                  <input type="password" wire:model="password" id="pasworldas" class="form-control @error('password') is-invalid @enderror form-control" name="" id="" placeholder="******">

                  @error('password')
                  <span class="message-error">{{ $message }}</span>
                  @enderror 

                </div>

                <div class="section-btn-login">
                    <button type="button" wire:loading.attr="disabled" wire:target='login' wire:click.prevent="login()" class="btn btn-primary disabled:opacity-25">Ingresar</button>
                </div>

            </form>

        </div>


    </div>


    @section('js')


    



    @endsection



</div>
