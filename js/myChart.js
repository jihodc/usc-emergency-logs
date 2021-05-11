var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'SERVICE', 
            'PROPERTY', 
            'TRAFFIC', 
            'THEFT-PETTY', 
            'VANDALISM',
            'FIRE',
            'OBSCENE ACTIVITY',
            'INCIDENT',
            'BATTERY',
            'LA MUNICIPAL CODE',
            'BURGLARY-MOTOR VEHICLE',
            'ALCOHOL',
            'SEX OFFENSE',
            'VEHICLE CODE',
            'THEFT-GRAND',
            'EH&S',
            'ROBBERY',
            'MOTOR VEHICLE THEFT',
            'BURGLARY',
            'ALARM RESPONSE',
            'THEFT-MOTOR VEHICLE',
            'TRESSPASS',
            'THEFT-GRAND AUTO',
            'WARRANT',
            'HATE INCIDENT',
            'ADMINISTRATIVE',
            'HARASSMENT',
            'DOMESTIC VIOLENCE',
            'DISTURBANCE',
            'CRIMINAL THREATS'
        ],
        datasets: [{
            label: 'Incidents Around the USC Campus',
            data: [
                53,
                21,
                10,
                10,
                7,
                7,
                6,
                5,
                5,
                4,
                4,
                4,
                4,
                4,
                3,
                3,
                3,
                3,
                3,
                3,
                3,
                2,
                2,
                2,
                2,
                2,
                2,
                1,
                1,
                1
            ],
            backgroundColor: [
                'rgba(153, 0, 0, 0.2)',
                'rgba(255, 204, 0, 0.2)'
            ],
            borderColor: [
                'rgba(153, 0, 0, 1)',
                'rgba(255, 204, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});