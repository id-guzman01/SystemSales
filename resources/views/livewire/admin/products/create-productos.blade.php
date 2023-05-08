<div>
    
    @if (session()->has('message'))
        
        @if (session('message')=='Producto registrado')
            
            <x-alert.alert_x alerta="success">

                <x-slot:titulo>
                    ¡Proceso Completado!
                </x-slot>
        
                <x-slot:contenido>
                    el producto se registro satisfactoriamente.
                </x-slot>
        
            </x-alert.alert_x>

        @endif


        @if (session('message')=='Producto no registrado')
            
            <x-alert.alert_x alerta="danger">

                <x-slot:titulo>
                    ¡Proceso Fallido!
                </x-slot>
        
                <x-slot:contenido>
                    Actualmente no es posible registrar el producto, intente nuevamente.
                </x-slot>
        
            </x-alert.alert_x>

        @endif


    @endif


    <div class="content-principal">

        <form>

            <div class="section-dates-product-inicial">

                <div class="section-primer-title">
                    <h1>Información del Producto</h1>
                </div>

                <div class="section-line-separator">
                    <hr>
                </div>

                <div class="section-nombre">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del producto</label>
                        <input type="text"
                            class="form-control form-style @error('nombre') is-invalid @enderror form-control" wire:model="nombre" name="" id="" aria-describedby="helpId" placeholder="Nombre del Producto">

                        @error('nombre')
                            <span class="message-error">{{ $message }}</span>
                        @enderror 
                            
                     </div>
                </div>
    
                <div class="section-description" >
                    <div class="mb-3" wire:ignore>
                      <label for="" class="form-label">Descripción</label>
                      <textarea id="editor" class="form-control @error('descripcion') is-invalid @enderror form-control" wire:model="descripcion" name="" id="" rows="6" placeholder="Descripción del Producto"></textarea>
                    </div>

                    @error('descripcion')
                        <span class="message-error">{{ $message }}</span>
                    @enderror 

                </div>

                <div class="section-specification">

                    <div class="mb-3" wire:ignore>
                      <label for="" class="form-label">Especificaciones del Producto</label>
                      <textarea class="form-control  @error('especificaciones') is-invalid @enderror form-control" wire:model="especificaciones" name="" id="editor2" rows="3"></textarea>
                    </div>

                    @error('especificaciones')
                        <span class="message-error">{{ $message }}</span>
                    @enderror 
                    
                </div>


                <div class="section-categories">

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Categoria</label>
                                <select class="form-control form-style @error('categorie_id') is-invalid @enderror form-control" wire:model="categorie_id" name="" id="">
                                    <option>Seleccione</option>

                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->nombre}}</option>
                                    @endforeach

                                </select>

                                @error('categorie_id')
                                    <span class="message-error">El campo Categoria es requerido</span>
                                @enderror 
                                
                            </div>
                        </div>

                        <div class="col">

                                <div class="mb-3">
                                    <label for="" class="form-label">Sub-Categoria</label>
                                    <select class="form-control form-style @error('subcategorie_id') is-invalid @enderror form-control" wire:model="subcategorie_id" name="" id=""
                                    @if($categorie_id=='' || $categorie_id=='Seleccione') disabled @endif>
                                        <option>Seleccione</option>

                                        @foreach ($subcategories as $subcategorie)
                                            <option value="{{$subcategorie->id}}">{{$subcategorie->nombre}}</option>
                                        @endforeach
                                        

                                    </select>

                                    @error('subcategorie_id')
                                        <span class="message-error">El campo Sub-Categoria es requerido.</span>
                                    @enderror 
                                    
                                </div>
                                

                        </div>

                    </div>

                </div>

                <div class="section-discount">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="" wire:model="discount_state">
                      <label class="form-check-label" for="">
                        Descuentos
                      </label>
                    </div>

                    @if ($discount_state)
                        
                        <div class="section-discount-add">

                            <label for="" class="form-label">Descuento</label>

                            <select class="form-control form-style" wire:model="discount_id" name="" id="">
                                <option selected>Seleccione</option>

                                @foreach ($discounts as $discount)
                                    <option value="{{$discount->id}}">{{$discount->nombre}} - {{$discount->porcentaje}}%</option>
                                @endforeach

                            </select>

                        </div>

                    @endif

                </div>


                <div class="section-precio">
                    <div class="mb-3">
                      <label for="" class="form-label">Precio</label>
                      <input type="number"
                        class="form-control @error('precio') is-invalid @enderror form-control" wire:model="precio" name="" id="" aria-describedby="helpId" placeholder="Precio">
                    </div>

                    @error('precio')
                        <span class="message-error">{{ $message }}</span>
                    @enderror

                </div>

                <div class="section-state">

                    <div class="mb-3">
                        <label for="" class="form-label">Estado del producto</label>
                        <select class="form-control form-style @error('state_id') is-invalid @enderror form-control" wire:model="state_id" name="" id="">
                            <option selected>Seleccione</option>

                            @foreach ($states as $state)
                                <option value="{{$state->id}}">{{$state->nombre}}</option>
                            @endforeach

                        </select>

                        @error('state_id')
                            <span class="message-error">El campo estado es requerido.</span>
                        @enderror

                    </div>

                </div>

                <div class="section-photos">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione imagenes del producto</label>
                        <input class="form-control form-style @error('photos') is-invalid @enderror form-control" wire:model="photos" type="file" id="formFile" multiple>
                        
                    </div>

                    @error('photos')
                        <span class="message-error">Las imagenes son requeridas.</span>
                    @enderror

                </div>


                @if (count($photos))
                    
                    <div class="section-photo-preview">

                        <div id="carouselExample" class="carousel slide">

                            <div class="carousel-inner">

                                @if (count($photos) == 1)
                                    
                                    <div class="carousel-item active">
                                        <img src="{{$photos[0]->temporaryURL()}}" width="100%" height="500" class="d-block w-100" alt="...">
                                    </div>

                                @endif

                                @if (count($photos) > 1)
                                    
                                    @for ($i = 0; $i < count($photos); $i++)
                                        <div class="carousel-item @if($i==1) active @endif">
                                            <img src="{{$photos[$i]->temporaryURL()}}" width="100%" height="500" class="d-block w-100" alt="...">
                                        </div>
                                    @endfor

                                @endif

                            </div>

                            @if (count($photos) > 1)
                                
                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
  
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>

                            @endif

                          </div>
                        

                    </div>

                @endif


                <div class="section-second-title">
                    <h1>Información del Proveedor</h1>
                </div>

                <div class="section-line-separator">
                    <hr>
                </div>

                <div class="section-nombre-proveedor">

                    <div class="mb-3">
                        <label for="" class="form-label">Proveedor</label>
                        <select class="form-control form-style @error('provider_id') is-invalid @enderror form-control" wire:model="provider_id" name="" id="">
                            <option>Seleccione</option>

                            @foreach ($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->nombre}}</option>
                            @endforeach

                        </select>

                        @error('provider_id')
                            <span class="message-error">El campo proveedor es requerido.</span>
                        @enderror

                    </div>

                </div>



                <div class="section-second-title">
                    <h1>Información del Stock</h1>
                </div>

                <div class="section-line-separator">
                    <hr>
                </div>

                <div class="section-stock">

                    <div class="mb-3">
                      <label for="" class="form-label">Stock inicial</label>
                      <input type="number"
                        class="form-control form-style @error('stock') is-invalid @enderror form-control" wire:model="stock" name="" id="" aria-describedby="helpId" placeholder="Stock inicial">

                        @error('stock')
                            <span class="message-error">{{ $message }}</span>
                        @enderror

                    </div>

                </div>


                <div class="section-btn-registro">
                    <button type="button" class="btn disabled:opacity-25" wire:loading.attr='disabled' wire:target='registro' wire:click="registro()">Registrar</button>
                </div>


                    
            </div>


        </form>

    </div>

    <div class="section-btn-back">
        <button type="button" class="btn" wire:click="regresar" > <i class="fas fa-arrow-left"></i> Regresar</button>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then(function(editor) {
                      editor.model.document.on('change:data', () => {
                        @this.set('descripcion', editor.getData());
                      });
              })
            .catch( error => {
                console.error( error );
            } );
    </script>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .then(function(editor) {
                  editor.model.document.on('change:data', () => {
                    @this.set('especificaciones', editor.getData());
                  });
          })
        .catch( error => {
            console.error( error );
        } );
</script>






</div>
