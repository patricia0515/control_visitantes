$(document).ready(function () {

    /**
     * Llamado a funciones 
     * que carga la grafica 
     * y carrusel de reportes
     */

    loadGrafica();
    loadBanner();

})

/**
 * Boton para filtar
 * la grafica por fechas
 */

$('body').on('click', '#btnFiltroGrafica', function () {
    let inicio = $("#datepickerInicio").val();
    let fin = $("#datepickerFin").val();
    loadGrafica(inicio, fin)

})


/**
 * Captura las imagenes para
 * luego ponerlos en el banner
 *
 * @return void
 */

const loadBanner = () => {
    $.get("/slider", (data) => {
        data.forEach(element => {
            let div = `<div class="carousel-item" id="carousel-img">
                            <img src="${element.img_vehiculo}" class="d-block w-100" alt="${element.img_vehiculo}" height="320px">
                        </div>`
            $('#inner').append(div);
        });
        let imagen_carrusel = document.getElementsByClassName('carousel-item')[0]
        imagen_carrusel.className = 'carousel-item active';
    });
}

/**
 * Captura los datos para
 * luego ponerlos en la grafica
 *
 * @return void
 */

const loadGrafica = (inicio, fin) => {
    let data = `${inicio},${fin}`
    console.log(data)
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: `all/${data}`,
        typo: 'GET',
        data: {
            data: data,
            _token: token,
        },
        success: function (data) {
            let arreglo = JSON.parse(data);
            generarGrafica(arreglo)
        }
    });
}

/**
 * Realiza la carga
 * de los datos en la grafica
 *
 * @return void
 */
const generarGrafica = (arreglo) => {
    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['T. Entradas', 'T. Salidas', 'T. Registrados', 'Activos', 'Inactivos', 'Total Áreas Visitadas'],
            datasets: [{
                label: 'Control Acceso Visitantes',
                data: arreglo,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}