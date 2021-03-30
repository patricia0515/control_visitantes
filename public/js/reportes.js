$(document).ready(function () {

    /**
     * Llamado a funciones 
     * que carga la grafica 
     * y carrusel de reportes
     */

    loadGrafica();
    loadGraficaDona();
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
 * luego ponerlos en la grafica Dona
 *
 * @return void
 */

const loadGraficaDona = () => {
    let arreglo2 = [];
    let data2 = [];
    $.get("/lastDays", (data) => {

        let arreglo = JSON.parse(data);
        for (let x = 0; x < 6; x++) {
            arreglo2.push(arreglo[x]);
        }
        
        data2.push(arreglo[6]);
        $("#num_personas").val(data2);
        generarGraficaDona(arreglo2)
    });
}
/**
 * Realiza la carga
 * de los datos en la Dona
 *
 * @return void
 */
const generarGraficaDona = (arreglo2) => {
    let ctx = document.getElementById('myChart2').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Entradas', 'Total Salidas', 'Visitantes Registrados', 'Visitantes Activos', 'Visitantes Inactivos', 'Áreas Visitadas'],
            datasets: [{
                label: 'Control Acceso Visitantes Ultimos 30 Días',
                data: arreglo2,
                backgroundColor: [
                    'rgba(84, 111, 123, 1)',
                    'rgba(8, 170, 104, 1)',
                    'rgba(254, 208, 51, 1)',
                    'rgba(254, 97, 58, 1)',
                    'rgba(252, 69, 72, 1)',
                    'rgba(132, 68, 243, 1)'
                ]
            }]
        },
        options: {
            rotation: -Math.PI,
            circumference: Math.PI,
            responsive: true,
            maintainAspectRatio: false
        },
    });

}


/**
 * Captura los datos para
 * luego ponerlos en la grafica de barras
 *
 * @return void
 */

const loadGrafica = (inicio, fin) => {
    let data = `${inicio},${fin}`
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: `filter/${data}`,
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
                    'rgba(84, 111, 123, 0.2)',
                    'rgba(8, 170, 104, 0.2)',
                    'rgba(254, 208, 51, 0.2)',
                    'rgba(254, 97, 58, 0.2)',
                    'rgba(252, 69, 72, 0.2)',
                    'rgba(132, 68, 243, 0.2)'
                ],
                borderColor: [
                    'rgba(84, 111, 123, 1)',
                    'rgba(8, 170, 104, 1)',
                    'rgba(254, 208, 51, 1)',
                    'rgba(254, 97, 58, 1)',
                    'rgba(252, 69, 72, 1)',
                    'rgba(132, 68, 243, 1)'
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