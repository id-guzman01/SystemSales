<div>


    @if (session()->has('message'))

        @if (session('message')=='email erroneo')

            <script>

                Swal.fire({
                    icon: 'error',
                    text: 'El email que ingresaste es erroneo o no se encuentra registrada, intente nuevamente',
                })

            </script>

        @elseif (session('message') == 'password erronea')    

            <script>

                Swal.fire({
                    icon: 'error',
                    text: 'La contraseña que ingresaste es erronea, intente nuevamente',
                })

            </script>


        @elseif (session('message') == 'proceso fallido')

            <script>

                Swal.fire({
                    icon: 'error',
                    text: 'Actualmente no es posible procesar la solicitud, intente nuevamente',
                })

            </script>

        @endif

    
    @endif




    
    <div class="section-login">

       <div class="row">

            <div class="col">

                <div class="image">
                    <img src="{{ asset('storage/assets/pexels-karolina-grabowska-5632382.jpg') }}" alt="">
                </div>


            </div>


            <div class="col">

                <div class="section-formulario">

                        <div class="head-login">

                            <div class="titulo">
                                <h1>System Sales</h1>
                            </div>
                
                            <div class="subtitulo">
                                <h3>Log-In</h3>
                            </div>
                
                            <div class="line-separator">
                                <hr>
                            </div>
                
                        </div>
                
                        <div class="body-login">
                
                            <form>
                
                                <div class="section-form">
                
                                    <div class="mb-3 form-email-input">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror form-control" name="" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">

                                    @error('email')
                                    <span class="message-error">{{ $message }}</span>
                                    @enderror 

                                    </div>
                
                                    <div class="mb-3 form-email-password">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror form-control" name="" id="" placeholder="****">

                                    @error('password')
                                    <span class="message-error">{{ $message }}</span>
                                    @enderror 

                                    </div>

                                    <div class="row">

                                        <div class="col">

                                            <div class="section-check">

                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model="remember" type="checkbox" value="" id="">
                                                    <label class="form-check-label" for="">
                                                      Recuérdame
                                                    </label>
                                                  </div>
                                                  
                                            </div>

                                        </div>

                                        <div class="col">

                                            <div class="section-forget">
                                                <a href="http://localhost:8000">Olvide mi contraseña</a>
                                            </div>

                                        </div>

                                    </div>
                
                                </div>
                
                                <div class="section-button">
                
                                    <button type="button" wire:loading.attr="disabled" wire:target='login' wire:click.prevent="login()" class="btn btn-primary disabled:opacity-25">Ingresar</button>
                
                                </div>
                
                
                            </form>
                
                        </div>


                        <div class="section-sociales">

                            <div class="separator-social">

                                <div class="row">

                                    <div class="col">
                                        <hr>
                                    </div>

                                    <div class="col o">
                                        <h5>O</h5>
                                    </div>

                                    <div class="col" style="margin-left: -150px;">
                                        <hr>
                                    </div>

                                </div>

                                <div class="text-sociales">
                                    <p>También puedes iniciar sesión por medio de las siguientes plataformas</p>
                                </div>


                                <div class="btn-sociales">

                                    <div class="row">

                                        <div class="col">
    
                                            <div class="btn-google">
                                                <a name="" id="" class="btn btn-primary" href="#" role="button"> <img src="https://img.icons8.com/fluency/48/null/google-logo.png"/> Google</a>
                                            </div>
    
                                        </div>
    
                                        <div class="col">
    
                                            <div class="btn-facebook">
                                                <a name="" id="" class="btn btn-primary" href="#" role="button"> <img src="https://img.icons8.com/fluency/48/null/facebook-new.png"/> Facebook</a>
                                            </div>
    
                                        </div>
    
                                    </div>

                                </div>



                            </div>


                        </div>

                
                        <div class="footer-login">
                
                            <div class="line-separator">
                                <hr>
                            </div>
                
                            <div class="content">
                                <p>¿No estás registrado?, <a href="{{ url('registro') }}">¡Registrate!</a></p>
                            </div>
                
                        </div>


                </div>


            </div>

       </div>





    </div>

</div>
