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
    let arreglo2 =[];
    let data2 =[];
    $.get("/lastDays", (data) => {
            console.log(data)
            let arreglo = JSON.parse(data);
            console.log(arreglo)

            
                arreglo2.push(arreglo[0]);
                arreglo2.push(arreglo[1]);
                arreglo2.push(arreglo[2]);
                arreglo2.push(arreglo[3]);
                arreglo2.push(arreglo[4]);
                arreglo2.push(arreglo[5]);
            
            data2.push(arreglo[6]);
            console.log(arreglo2)
            console.log(data2)

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
                    'rgba(255, 105, 180)',
                    'rgba(255, 140, 0)',
                    'rgba(152, 251, 152)',
                    'rgba(188, 143, 143)',
                    'rgba(255, 140, 0)',
                    'rgba(70, 130, 180 )'
                ],
                
            }]
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