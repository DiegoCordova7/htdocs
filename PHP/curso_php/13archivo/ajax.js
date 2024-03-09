const formularios_ajax=document.querySelectorAll('.formulario_ajax');
function enviar_formulario_ajax(e){
    e.preventDefault

    let enviar=confirm('Estas Seguro')

    if(enviar=true){

        let data= new FormData(this);
        let method= this.getAttribute('method');
        let action= this.getAttribute('action');

        let encabezados= new Headers()

        let config={
            method: method,
            headers: encabezados,
            action: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action,config)
        .then(respuesta => text())
        .then(respuesta => {alert(respuesta)
        });
    }

}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener('submit',enviar_formulario_ajax);
});