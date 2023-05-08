<div>
    
    <div class="window-notice-history" id="window-notice">
        <div class="content-history">

            <div class="section-btn-close-modal-history">
                {{$btnCloseModalHistory}}
            </div>

            <div class="section-title-modal-history">
                <h1>Historial de Ingresos</h1>
                
            </div>

            <div class="section-line-separator-modal-history">
                <hr>
            </div>

            <div class="section-table-modal-history">

                <div class="table-wrapper">

                    <div class="section-name-product-modal-history">

                        <div class="row">

                            <div class="col">
                                <h5>Producto:</h5>
                            </div>

                            <div class="col section-name-product-modal-history-text">
                                {{$nombre}}
                            </div>

                        </div>

                    </div>

                    <table class="fl-table">

                        <thead>
    
                            <th>Fecha</th>
                            <th>Entradas</th>
    
                        </thead>
    
                        <tbody>
    
                            {{$filas}}
    
                        </tbody>
    
                    </table>

                    

                </div>
                

            </div>

        
        
        </div>
    </div>    


</div>