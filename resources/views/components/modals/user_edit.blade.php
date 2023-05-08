<div>

    @props([
    'user_id'
    ])
    
    <div class="window-notice-edit" id="window-notice">
        <div class="content-edit">
            
            <div class="section-head">

                <div class="row">

                    <div class="col">
                        <div class="section-title">
                            <h4>Editar información del usuario</h4>
                        </div>
                    </div>

                    <div class="col">
                        <div class="section-btn-close">
                            {{$botton_close}}
                        </div>
                    </div>

                </div>

                <div class="section-line-separator">
                    <hr>
                </div>

            </div>



            <div class="section-content-edit-user">

                <div class="description">
                    <p>
                        A continuación puede actualizar la información de los usuarios referente al estado de la cuenta y el rol que tiene la misma.
                    </p>
                </div>

                <div class="section-content-state">
                    {{$estado_cuenta}}
                </div>

                <div class="section-content-role-acount">
                    {{$role_acount}}
                </div>

                <div class="section-content-btn-update-acount">
                    {{$button_update}}
                </div>

            </div>

            
            <div class="content-buttons">
                
            </div>

        </div>
    </div>

</div>