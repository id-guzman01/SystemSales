<div>
    
    <div class="window-notice" id="window-notice">
        <div class="content">

            <div class="content-section-btn-close">
                {{$btnClose}}
            </div>

            <div class="section-imagenes">

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    <div class="carousel-inner">

                        {{$photos}}

                    </div>

                        {{$btnPhotos}}

                  </div>
            
            </div>

            <div class="section-info-product-description">


                <div class="section-title">
                    {{$nombre}}
                </div>
    
                <div class="section-cost">
                    
                    <div class="row">

                        <div class="col">
                            <h5>Precio:</h5>
                        </div>

                        <div class="col">
                            <div class="section-text-precio">
                                {{$precio}}
                            </div>
                        </div>

                    </div>

                </div>
    
                <div class="row section-state-stock-product-info">
    
                    <div class="col">
                        {{$estado}}
                    </div>
    
                    <div class="col">
                        <div class="section-stock-product-info">
                            <div class="row">
                                <div class="col">
                                    <h5>Existencias:</h5>
                                </div>
                                <div class="col stock-text-section-product-info">
                                    {{$stock}}
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
                <div class="row">
    
                    <div class="col">
                        <div class="section-categorie-product-info">
                            
                            <div class="row">

                                <div class="col">
                                    <h5>Categoría:</h5>
                                </div>

                                <div class="col section-text-categorie-product-info">
                                    {{$categorie}}
                                </div>

                            </div>

                        </div>
                    </div>
    
                    <div class="col">
                        <div class="section-subcategorie-product-info">
                            
                            <div class="row">

                                <div class="col">

                                    <h5>Sub Categoría:</h5>

                                </div>

                                <div class="col section-subcategorie-product-info-text">
                                    {{$sub_categorie}}
                                </div>

                            </div>

                        </div>
                    </div>
    
                </div>
    
                <div class="section-discount-product-info">
                
                    <div class="row">

                        <div class="col">
                            <h5>Descuento:</h5>
                        </div>

                        <div class="col section-discount-product-info-text">
                            {{$discount}}
                        </div>



                    </div>

                </div>
    
    
    
                <div class="section-description-product">
                    <h5>Descripción:</h5>
                    <div class="subsection-description-product-info-text">
                        {{$description}}
                    </div>
                </div>
    
    
                <div class="section-specification-product">
                    <h5>Especificaciones</h5>
                    <div class="subsection-specification-product-info-text">
                        {{$specification}}
                    </div>
                </div>




            </div>



        </div>
    </div>

</div>