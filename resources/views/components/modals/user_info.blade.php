<div>

    @props([
    'user_id'
    ])
    
    <div class="window-notice" id="window-notice">
        <div class="content">
            

            <div class="section-head">

                <div class="row">

                    <div class="col">
                        <div class="section-title">
                            <h1>Información del Usuario</h1>
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


                <div class="section-info-user">

                    <div class="row">

                        <div class="col">
                            <div class="img-profile">
                                {{$url}}
                            </div>
                        </div>

                        <div class="col">
                            <div class="column-info-user">
                                
                                <div class="name-user">
                                    <h3>{{$nombre}}</h3>
                                </div>

                                <div class="data-user">
                                    <h6>{{$email}}</h6>
                                </div>

                                <div class="data-user">
                                    {{$telefono}}
                                </div>


                                <div class="rol-user">
                                    {{$role}}
                                </div>

                                <div class="status-user">
                                    {{$status}}
                                </div>

                            </div>
                        </div>


                    </div>


                </div>


            <div class="content-buttons">
                
            </div>

        </div>
    </div>

</div>