<div>
    
    <div class="window-notice-stock" id="window-notice">
        <div class="content-stock">

            <div class="section-btn-close-modal-history">
                {{$btnCloseModalHistory}}
            </div>

            <div class="section-title-modal-history">
                <h1>Actualización del Stock</h1>
            </div>

            <div class="section-line-separator-modal-history">
                <hr>
            </div>

            <div class="table-wrapper">

                <div class="row section-input-info-update-stock">

                    <div class="col section-label-info-update-stock">
                        <h5>Producto:</h5>
                    </div>

                    <div class="col section-text-info-update-stock">
                        {{$nombre_producto}}
                    </div>

                </div>

                <div class="section-content-update-stock-manual">


                        <div class="mb-3">
                          <label for="" class="form-label">Cantidad de Producto a Iniciar:</label>
                          {{$inputupdateStock}}
                        </div>


                        <div class="section-content-btn-update-stock-manual">
                            {{$btnUpdateStock}}
                        </div>

                </div>



            </div>

        </div>
    </div>    

</div>