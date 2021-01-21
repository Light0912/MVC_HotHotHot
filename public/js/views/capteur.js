(() => {

    "use strict"

    const sensor_data = window.data['capteur']['data']
    const sensor_name = document.getElementById('sensor-name')
    const sensor_type = document.getElementById('sensor-type')
    const sensor_alert = document.getElementById('sensor-alert')
    const sensor_value = document.getElementById('sensor-value')
    const sensor_value_type = document.getElementById('sensor-value-type')

    let getAlert = (type, loc, val) => {
        val = parseInt(val)
        if (type.toString() === 'temp') {
            if (loc.toString() === 'ext') {
                if (val > 35) {
                    return "Hot Hot Hot !"
                } else if (val < 0) {
                    return "Banquise en vue !"
                }
            } else if (loc.toString() === 'int') {
                if (val > 50) {
                    return "Appelez les pompiers ou arretez votre barbecueu !"
                } else if (val > 22) {
                    return "Baissez le chauffage !"
                } else if (val < 12) {
                    return "Montez le chauffage ou mettez un gros pull  !"
                } else if (val < 0) {
                    return "Canalisations gelées, appelez SOS plombier - et mettez un bonnet !"
                }
            }
        }
        return "Aucune alerte, tout se passe bien"
    }

    let parseHistory = (history) => {
        let result = []
        history.forEach((el) => {
            result.push({
                'x': new Date(Date.parse(el.date)),
                'y': el.value
            })
        })
        return result
    }

    let setChart = (history) => {
        var ctx = document.getElementById('sensor-chart');
        var chart = new Chart(ctx, {
            type: 'scatter',
            data : {
                datasets: [{
                    data: history,
                    showLine: true,
                    label: "Valeur du capteur"
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    }],
                    yAxes: [{}]
                }
            }
        });
    }

    sensor_name.innerText = sensor_data.name

    if (sensor_data.type.toString() === 'temp') {
        sensor_type.innerText = 'Termometre'
    } else if (sensor_data.type.toString() === 'humidity') {
        sensor_type.innerText = 'Capteur d\'humidiuté'
    }

    sensor_alert.innerText = getAlert(sensor_data.type, sensor_data.loc, sensor_data.current_value)
    sensor_value.innerText = sensor_data.current_value
    sensor_value_type.innerText = sensor_data.value_type

    setChart(parseHistory(sensor_data.history))
})()


