<div wire:init="loadData">
    
    <div wire:offline>
        <div class="section-notice-offline">
            <h1>¡Haz perdido tú conexión a Internet!</h1>
        </div>
    </div>

    @if(session()->has('message'))

        @switch(session('message'))
            @case('stock actualizado')

                    <x-alert.alert_x alerta="success">

                        <x-slot:titulo>
                            ¡Proceso Completado!
                        </x-slot>
                
                        <x-slot:contenido>
                            El stock del producto se actualizó con exito
                        </x-slot>
                
                    </x-alert.alert_x>

                @break
            @case('stock no actualizado')
                
                    <x-alert.alert_x alerta="danger">

                        <x-slot:titulo>
                            ¡Proceso Fallido!
                        </x-slot>
                
                        <x-slot:contenido>
                            Actualmente no es posible actualizar el stock del producto.
                        </x-slot>
                
                    </x-alert.alert_x>

                @break

            @case('Stock solicitado')
            
                    <x-alert.alert_x alerta="success">

                        <x-slot:titulo>
                            ¡Proceso Completado!
                        </x-slot>
                
                        <x-slot:contenido>
                            La solicitud al proveedor se escaló con éxito.
                        </x-slot>
                
                    </x-alert.alert_x>

                @break


            @case('Stock no solicitado')
            
                    <x-alert.alert_x alerta="danger">

                        <x-slot:titulo>
                            ¡Proceso Fallido!
                        </x-slot>
                
                        <x-slot:contenido>
                            Actualmente no es posible solicitar stock al proveedor, intente más tarde.
                        </x-slot>
                
                    </x-alert.alert_x>

                @break    

                
        @endswitch

    @endif




    @if ($openModalInfo)
        
        <x-modals.product_info>

            <x-slot:btnClose>
                <button type="button" class="btn" wire:click="$set('openModalInfo',false)"> <i class="fas fa-times"></i> </button>
            </x-slot>

            <x-slot:photos>

                @if (count($listProduct->photos) == 1)
        
                    <div class="carousel-item active">
                        <img src="{{$listProduct->photos[0]->url}}"  class="d-block w-100" alt="...">
                    </div>

                @endif


                @if (count($listProduct->photos) > 1)
                    
                    @for ($i = 0; $i < count($listProduct->photos); $i++)
                        <div class="carousel-item @if($i==1) active @endif">
                            <img src="{{$listProduct->photos[$i]->url}}" class="d-block w-100" alt="...">
                        </div>
                    @endfor

                @endif

                
            </x-slot>

            <x-slot:btnPhotos>

                @if (count($listProduct->photos) > 1)
                    
                    <button class="carousel-control-prev bg-primary" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>

                    <button class="carousel-control-next bg-primary" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>

                @endif

            </x-slot>

            <x-slot:nombre>
                <h1>{{$listProduct->nombre}}</h1>
            </x-slot>

            <x-slot:precio>
                <p>${{$listProduct->precio}}</p>
            </x-slot>

            <x-slot:estado>

                @if ($listProduct->state_id == 1)

                    <div class="section-state-product-info-success">
                        <p> <i class="fas fa-circle"></i> {{$listProduct->state->nombre}}</p>
                    </div>
                    
                @elseif ($listProduct->state_id == 2)

                    <div class="section-state-product-info-warning">
                        <p> <i class="fas fa-circle"></i> {{$listProduct->state->nombre}}</p>
                    </div>

                @elseif ($listProduct->state_id == 3)

                    <div class="section-state-product-info-danger">
                        <p> <i class="fas fa-circle"></i> {{$listProduct->state->nombre}}</p>
                    </div>    

                @endif


            </x-slot>

            <x-slot:stock>
                @foreach ($listProduct->stock as $item)
                    <p>{{$item->existencias}}</p>
                @endforeach
            </x-slot>

            <x-slot:categorie>
                <p>{{$listProduct->subcategorie->categorie->nombre}}</p>
            </x-slot>

            <x-slot:sub_categorie>
                <p>{{$listProduct->subcategorie->nombre}}</p>
            </x-slot>

            <x-slot:discount>

                @if ($listProduct->discount_id == '')
                    <p> - </p>
                @else
                    <p>{{$listProduct->descripcion}} - {{$porcentaje}}%</p>
                @endif
                
            </x-slot>

            <x-slot:description>
                <p>{{$listProduct->descripcion}}</p>
            </x-slot>

            <x-slot:specification>
                <p>{{$listProduct->especificaciones}}</p>
            </x-slot>

        </x-modals.product_info>

    @endif


    @if ($openModalEditProduct)
        
        <x-modals.product_edit>

            <x-slot:btnCloseModalHistory>
                <button type="button" class="btn" wire:click="$set('openModalEditProduct',false)"> <i class="fas fa-times"></i> </button>
            </x-slot>


            <x-slot:photos>

                @if (count($photos) == 1)
                                        
                    <div class="carousel-item active">
                        <div class="form-group" align="center">
                            <label for="file-input" style="cursor: pointer;">
                              <img src="{{$photos[0]->url}}" width="100%" height="400px" class="d-block w-100"/>
                            </label>
                          
                            <input id="file-input" type="file" />
                        </div>
                    </div>

                @endif



                @if (count($photos) > 1)
                                    
                    @for ($i = 0; $i < count($photos); $i++)
                        <div class="carousel-item @if($i==1) active @endif">
                            <div class="form-group" align="center">
                                <label for="file-input" style="cursor: pointer;">
                                  <img src="{{$photos[$i]->url}}" width="100%" height="400px" class="d-block w-100"/>
                                </label>
                              
                                <input id="file-input" type="file"/>
                            </div>
                        </div>
                    @endfor

                @endif


            </x-slot>


            <x-slot:btnPhotos>

              <button class="carousel-control-prev bg-primary" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
              </button>

              <button class="carousel-control-next bg-primary" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
              </button>

            </x-slot>


            <x-slot:nombre>
                <input type="text"
                class="form-control @error('nombre') is-invalid @enderror form-control" name="" id="" wire:model="nombre" aria-describedby="helpId" placeholder="Nombre del Producto">

                @error('nombre')
                    <span class="message-error">{{ $message }}</span>
                @enderror

            </x-slot>

            <x-slot:descripcion>
                
                <div wire:ignore>
                    <textarea class="form-control" name="" id="editor" rows="3" wire:model="descripcion"></textarea>
                </div>

            </x-slot>

            <x-slot:especificaciones>
                
                <div wire:ignore>
                    <textarea class="form-control" name="" id="editor2" rows="3" wire:model="especificaciones"></textarea>
                </div>

            </x-slot>

            <x-slot:estado>
                <select class="form-control" name="" wire:model="state_id" id="">
                    <option selected>Seleccione</option>

                    @foreach ($states as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach

                </select>
            </x-slot>

            <x-slot:precio>
                <input type="number"
                class="form-control" name="" id="" aria-describedby="helpId" wire:model="precio" placeholder="Precio del Producto">
            </x-slot>

            <x-slot:categoria>
                <select class="form-control" wire:model="categorie_id_edit" name="" id="">
                    <option>Seleccione</option>

                    @foreach ($categories_edit as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                    
                </select>
            </x-slot>


            <x-slot:subcategoria>
                <select class="form-control" wire:model="subcategorie_id_edit" name="" id=""
                @if($categorie_id_edit=='' || $categorie_id_edit=='Seleccione') disabled @endif>
                    <option>Seleccione</option>

                    @foreach ($subcategories_edit as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>                        
                    @endforeach

                </select>
            </x-slot>


            <x-slot:descuento>
                <select class="form-control" wire:model="descuento_id" name="" id=""
                    @if(!count($discounts)) disabled title="Actualmente no cuenta con Descuentos activos" @endif>
                    <option>Seleccione</option>

                    @foreach ($discounts as $item)
                        <option value="{{$item->id}}">{{$item->nombre}} - {{$item->porcentaje}}%</option>
                    @endforeach

                </select>
            </x-slot>


            <x-slot:impuesto>
                <select class="form-control" wire:model="taxe_id" name="" id=""
                @if(!count($taxes)) disabled title="Actualmente no cuenta con Impuestos activos." @endif>
                    <option>Seleccione</option>

                    @foreach ($taxes as $item)
                        <option value="{{$item->id}}">{{$item->nombre}} - {{$item->porcentaje}}%</option>
                    @endforeach

                </select>
            </x-slot>


            <x-slot:proveedor>
                <select class="form-control" wire:model="proveedor_id" name="" id="">
                    <option>Seleccione</option>

                    @foreach ($proveedores as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach

                </select>
            </x-slot>


            <x-slot:addPhotos>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" wire:model="addPhotos" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Añadir Imagenes
                    </label>
                </div>
            </x-slot>

            

            <x-slot:inputPhotos>

                @if ($addPhotos)

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione las nuevas imagenes del producto</label>
                        <input class="form-control form-style" wire:model="photos_new" type="file" id="formFile" multiple>
                    </div>


                @endif    

            </x-slot>
                
            


            <x-slot:btnUpdate>
                <button type="button" class="btn disabled:opacity-25" wire:loading.attr='disabled' wire:target='updateProduct' wire:click="updateProduct">Actualizar</button>
            </x-slot>


        </x-modals.product_edit>

    @endif



    @if ($openModalHistory)

        <x-modals.product_history>

            <x-slot:btnCloseModalHistory>

                <button type="button" class="btn" wire:click="$set('openModalHistory',false)"> <i class="fas fa-times"></i> </button>

            </x-slot>

            <x-slot:nombre>

                @foreach ($listEntradas as $item)
                    <p>{{$item->nombre}}</p>
                @endforeach

                
            </x-slot>

            <x-slot:filas>

                @foreach ($listEntradas as $stack)
                    
                    @foreach ($stack->stock as $slag)

                        @foreach ($slag->entradas as $item)
                            <tr>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->cantidad}}</td>
                            </tr>
                        @endforeach

                    @endforeach

                @endforeach


            </x-slot>

            <x-slot:paginador>
               
            </x-slot>
            

        </x-modals.product_history>

    @endif


    @if ($openModalHistorySales)
        
        <x-modals.products_salidas>

            <x-slot:btnCloseModalHistory>

            <button type="button" class="btn" wire:click="$set('openModalHistorySales',false)"> <i class="fas fa-times"></i> </button>

            </x-slot>


            <x-slot:nombre>

                @foreach ($listSalidas as $item)
                    <p>{{$item->nombre}}</p>                    
                @endforeach

            </x-slot>


            <x-slot:filas>

                @foreach ($listSalidas as $stack)

                    @foreach ($stack->stock as $slog)

                        @foreach ($slog->departures as $item)
                            
                            <tr>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->cantidad}}</td>
                            </tr>

                        @endforeach

                    @endforeach

                @endforeach

            </x-slot>



        </x-modals.products_salidas>

    @endif


    @if ($openModalRegisteredStock)

        <x-modals.product_stock>

            <x-slot:btnCloseModalHistory>
                <button type="button" class="btn" wire:click="closeModelUpdateStock"> <i class="fas fa-times"></i> </button>
            </x-slot>

            <x-slot:nombre_producto>
                <p>{{$nombre_producto_stock}}</p>
            </x-slot>

            <x-slot:inputupdateStock>
                <input type="number"
                class="form-control @error('stock_new') is-invalid @enderror form-control" wire:model="stock_new" name="" id="" aria-describedby="helpId" placeholder="Cantidad de Productos">

                @error('stock_new')
                    <span class="message-error">El campo STOCK es necesario para completar el proceso.</span>
                @enderror

            </x-slot>

            <x-slot:btnUpdateStock>
                <button type="button" class="btn disabled:opacity-25" wire:loading.attr='disabled' wire:target='create_new_product' wire:click="create_new_product">Registrar</button>
            </x-slot>


        </x-modals.product_stock>
        
    @endif





    <div class="table-wrapper">

        <div class="row">

            <div class="col">
                
                <div class="section-registered-page">

                    <div class="mb-3">
                        <label for="" class="form-label">Registros</label>
                        <select class="form-control" wire:model="count" name="" id="" wire:offline.attr="disabled">
                            <option>Seleccione</option>
    
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
    
                        </select>
                    </div>

                </div>


            </div>


            <div class="col">

                <div class="section-btn-add-product">
                    <button type="button" class="btn" wire:click="new_product()" wire:offline.attr="disabled"> <i class="fas fa-plus"></i> Nuevo</button>
                </div>

            </div>


            <div class="col">

                <div class="section-search-table">
                    
                    <div class="row">

                        <div class="col">
    
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" wire:click="active_buscar()" name="customRadio" class="custom-control-input" @checked($buscar) wire:offline.attr="disabled">
                                <label class="custom-control-label" for="customRadio1">Buscar</label>
                            </div>
    
                        </div>
    
    
                        <div class="col">
    
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" wire:click="active_filtrar()" name="customRadio" class="custom-control-input" @checked($filtrar) wire:offline.attr="disabled">
                                <label class="custom-control-label" for="customRadio2">Filtrar</label>
                            </div>
    
                        </div>
    
                    </div>
    
    
                    @if ($buscar)
                        
                        <div class="section-text-search">
                            <div class="mb-3">
                                <label for="" class="form-label">Buscar</label>
                                <input type="text"
                                  class="form-control" name="" id="" wire:model="buscar_producto" aria-describedby="helpId" placeholder="Buscar" wire:offline.attr="disabled">
                              </div>
                        </div>
    
                    @endif
    
                    @if ($filtrar)
                        
                        <div class="section-text-search">

                            <div class="mb-3">
                                <label for="" class="form-label">Categoría</label>
                                <select class="form-control" wire:model="categorie_id" name="" id="">
                                    <option>Seleccione</option>

                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                        <div class="section-text-search-subcategorie">

                            <div class="mb-3">
                                <label for="" class="form-label">Sub-Categoría</label>
                                <select class="form-control" wire:model="subcategorie_id" name="" id="" @if($categorie_id=='' || $categorie_id=='Seleccione') disabled @endif>
                                    <option>Seleccione</option>

                                    @foreach ($subcategories as $subcategorie)
                                        <option value="{{$subcategorie->id}}">{{$subcategorie->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
    
                    @endif


                
                
                </div>                


                
            </div>






        </div>

        

        @if (count($products))
            
            
        <table class="fl-table">
            <thead>
            <tr>

                <th>
                    ID
                    <a name="" id="btn btn-primary" role="button" wire:click='ordenar("id")'>

                    </a>
                </th>

                <th>
                    Producto
                    <a name="" id="btn btn-primary" role="button" wire:click='ordenar("nombres")'>

                    </a>
                </th>

                <th>
                    Sub-Categoria
                    <a name="" id="btn btn-primary" role="button" wire:click='ordenar("documento")'>

                    </a>
                </th>

                <th>
                    Existencias
                </th>

                <th>
                    Disposición
                </th>

                <th align="center">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    
                    <tr>

                        <td class="td-id-product">
                            <p>{{$product->id}}</p>
                        </td>

                        <td class="td-product">
                            <p>{{$product->nombre}}</p>
                        </td>

                        <td class="td_product_sub_categorie">
                            <p>{{$product->subcategorie->nombre}}</p>
                        </td>

                            @foreach ($product->stock as $item)
                                <td class="td_prodcut_existencias">
                                    <p>{{$item->existencias}}</p>
                                </td>
                            @endforeach

                        <td>

                            @if ($product->state->id == 1)
                                <div class="section-state-product-success">
                                    <p><i class="fas fa-circle"></i> {{$product->state->nombre}}</p>
                                </div>
                            @endif


                            @if ($product->state->id == 2)
                                <div class="section-state-product-warning">
                                    <p><i class="fas fa-circle"></i> {{$product->state->nombre}}</p>
                                </div>
                            @endif


                            @if ($product->state->id == 3)
                                <div class="section-state-product-red">
                                    <p><i class="fas fa-circle"></i> {{$product->state->nombre}}</p>
                                </div>
                            @endif

                            
                        </td>

                        <td align="center">

                            <!--Visualizar la información del producto-->
                            <button type="button" class="btn btn-primary" wire:offline.attr="disabled" wire:click="searchProduct({{$product->id}})"> <i class="fas fa-eye icon-size icon-eye"></i> </button>

                            <!--Editar Producto-->
                            <button type="button" class="btn btn-warning" wire:offline.attr="disabled" wire:click="searchProductForEdit({{$product->id}})"> <i class="fas fa-edit icon-size icon-edit"></i> </button>
                            
                            <!--Editar Stock-->
                            <button type="button" class="btn btn-dark" wire:offline.attr="disabled" wire:click="searchProductStock({{$product->id}})"> <i class="fas fa-th-large icon-size icon-edit"></i> </button>

                            <!--Visualizar lista de entradas--->
                            <button type="button" class="btn btn-success" wire:offline.attr="disabled"  wire:click="searchEntrances({{$product->id}})"> <i class="fas fa-plus-square"></i> </button>

                            <!--Vsiaulizar lista de salidas-->
                            <button type="button" class="btn btn-success" wire:offline.attr="disabled" wire:click="searchSalidas({{$product->id}})"> <i class="fas fa-minus-square"></i> </button>

                            <!--Solicitar productos al stock-->
                            @foreach ($product->stock as $item)
                                <button type="button" class="btn btn-info" wire:offline.attr="disabled" wire:click="sendEmailStock({{$item->id}})"> <i class="fas fa-envelope icon-size icon-edit"></i> </button>
                            @endforeach

                            <!--Comentarios en el Producto-->
                            <button type="button" class="btn btn-primary" wire:offline.attr="disabled"> <i class="fas fa-comment"></i> </button>

                            <!--Calificación en el producto-->
                            <button type="button" class="btn btn-primary" wire:offline.attr="disabled"> <i class="fas fa-star"></i> </button>


                        </td>
                    </tr>

                @endforeach 


            <tbody>
        </table>

        <div class="footer-table-pagination">
            {{$products->links()}}
        </div>

        @else
            
            @if ($state == 'cargando')

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
