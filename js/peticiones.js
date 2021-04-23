function peticionFecha() {
    //Hacemos la petición a la siguiente url
    Url = 'http://localhost/ApiRemIot/api/fecha.php';

    fetch(Url)
        .then(response => response.text())
        .then(result => {
            let fecha = document.getElementById('fecha')
            fecha.innerHTML = `<p>${result}</p>`
                //Se dejan las peticiones en el console.log para que 
                // se pueda observar los cambios
            console.log(result)
        })
        .catch(error => console.log('error', error));
}
//Hacemos que se actualice en bucle cada 5 seg
setInterval(peticionFecha, 5000)

function peticionEstado() {
    //Declaramos las variables que utilizaremos para desplegar la función
    var boton = document.getElementById('boton')
    var resultado = document.getElementById('resultado')
        //Declaramos el evento
    boton.onclick = function(e) {
        //Obtenemos el resultado del botón
        resultado.value = this.value
            //Hacemos la petición a la siguiente url
        Url = 'http://localhost/ApiRemIot/api/estados.php?estado=' + resultado.value;

        fetch(Url)
            .then(response => response.text())
            .then(result => {
                let boton = document.getElementById('boton')
                    //Cambiamos el valor y nombre del botón según su valor
                if (resultado.value == "encendido") {
                    boton.value = "apagado"
                    boton.innerHTML = `Apagar`
                } else {
                    boton.value = "encendido"
                    boton.innerHTML = `Encender`
                }
                //Imprimimos la petición
                console.log(result)
            })
            .catch(error => console.log('error', error));
    }

}