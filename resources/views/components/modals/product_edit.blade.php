<div>
    
    <div class="window-notice-edit" id="window-notice">
        <div class="content-edit">

            <div class="section-btn-close-modal-history">
                {{$btnCloseModalHistory}}
            </div>

            <div class="section-title-modal-history">
                <h1>Actualización del Producto</h1>
            </div>

            <div class="section-line-separator-modal-history">
                <hr>
            </div>


            <div class="content-principal-edit-product">



                <div class="section-img-edit-product">

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            {{$photos}}

                        </div>

                            {{$btnPhotos}}


                      </div>


                </div>




                <div class="section-name-edit-product">


                    <div class="mb-3">
                      <label for="" class="form-label">Nombre:</label>
                        {{$nombre}}
                    </div>

                </div>


                <div class="section-description-edit-product">

                    <div class="mb-3">
                      <label for="" class="form-label">Descripción:</label>
                      {{$descripcion}}
                    </div>

                </div>


                <div class="section-specification-edit-product">

                    <div class="mb-3">
                      <label for="" class="form-label">Especificaciones</label>
                      {{$especificaciones}}
                    </div>

                </div>


                <div class="section-disposicion-edit-product">

                    <div class="row">

                        <div class="col">
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                {{$estado}}
                            </div>

                        </div>


                        <div class="col">

                            <div class="mb-3">
                              <label for="" class="form-label">Precio</label>
                                {{$precio}}
                            </div>

                        </div>


                    </div>


                    <div class="section-categorie-edit-product">

                        <div class="row">

                            <div class="col">

                                <div class="mb-3">
                                    <label for="" class="form-label">Categoria</label>
                                    {{$categoria}}
                                </div>


                            </div>


                            <div class="col">

                                <div class="mb-3">
                                    <label for="" class="form-label">Sub-Categoria</label>
                                    {{$subcategoria}}
                                </div>

                            </div>


                        </div>


                    </div>




                    <div class="section-discount-edit-product">

                        <div class="row">

                            <div class="col">

                                <div class="mb-3">
                                    <label for="" class="form-label">Descuento</label>
                                    {{$descuento}}
                                </div>
    
                            </div>
    
                            <div class="col">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">Impuesto</label>
                                    {{$impuesto}}
                                </div>
    
                            </div>



                        </div>


                    </div>


                    <div class="section-provider-edit-product">

                        <div class="mb-3">
                            <label for="" class="form-label">Proveedor</label>
                            {{$proveedor}}
                        </div>

                    </div>


                    <div class="section-add-photo-edit-product">

                        {{$addPhotos}}
                        
                    </div>

                    <div class="section-add-photos-new-edit-product">

                        {{$inputPhotos}}

                    </div>
                    

                    <div class="section-btn-edit-product">
                        {{$btnUpdate}}
                    </div>


                </div>



            </div>



        </div>
    </div>


</div>