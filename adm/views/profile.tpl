<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="dropdownMenuButton" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="../images/{foto}" alt="user" class="rounded-circle" width="31">
        <span class="ml-2 user-text font-medium">{nombre}</span><span class="fas fa-angle-down ml-2 user-text"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY" aria-labelledby="dropdownMenuButton">
        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
            <div class=""><img src="../images/{foto}" alt="user" class="rounded" width="80"></div>
            <div class="ml-2">
                <h4 class="mb-0">{nombre}</h4>
                <p class=" mb-0 text-muted" style="font-size: .8rem">{cargo}</p>
            </div>
        </div>
        <a class="dropdown-item menu" href="javascript:void(0)" data-menu="CONFIGURACION" data-mod="FORM_PERFIL" data-submod="NONE" data-subref="NONE" data-acc="MODULO"><i class="fas fa-user mr-1 ml-1"></i> MI PERFIL</a>
        <a class="dropdown-item" href="javascript:void(0)" id="password_change" data-toggle="modal" data-target="#exampleModalLive"><i class="fas fa-user-lock mr-1 ml-1"></i> CAMBIAR CONTRASEÑA</a>
        <div class="dropdown-divider"></div>
        <a id="logout" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> SALIR</a>
    </div>
</li>
<script>
    jQuery("#logout").click(function(){
        var data = {};
        Object.assign(data, {["accion"]: 'logout'});
        axios.post('./modules/controllers/json.php',{
           data
        }).then(function (data) {
            let repuesta = data.data
            if(repuesta.title=="SUCCESS"){
                document.location.href="./";
            }else{
                dialog(repuesta.content,repuesta.title);
            }
        }).catch(function (error) {
            axios_Error(error);
            
        });
        // jQuery.ajax({
        //     type: "GET",
        //     url: "./modules/controllers/usuarios/form_usuarios.php",
        //     data: "accion=logout",
        //     success: function(msj){
        //         document.location.href = "./";
        //     }
        // });
    });
</script>