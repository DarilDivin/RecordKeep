const memberConnectedPerMonth = document.getElementById('member-connected-per-month');
const donutGraph = document.getElementById('donut');

const levelColor = ['#6363ff', '#6363ff', '#6363ff'];

const archive = JSON.parse(document.getElementById('1').getAttribute('data-pourcentage-archive'));
const prete = JSON.parse(document.getElementById('2').getAttribute('data-pourcentage-prete'));
const telecharge = JSON.parse(document.getElementById('3').getAttribute('data-pourcentage-telecharge'));
const dispo = JSON.parse(document.getElementById('4').getAttribute('data-pourcentage-dispo'));
const authenticatedUsersPercentage = JSON.parse(document.getElementById('5').getAttribute('data-pourcentage-utilisateur-auth'));
const formattedData = JSON.parse(document.getElementById('chart').getAttribute('data'));
const userDonut = JSON.parse(document.getElementById('donutContainer').getAttribute('data-user-donut'));

var gauge1 = new JustGage({
    id: "1", // the id of the html element
    value: archive,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#eee',
    levelColors: levelColor,
    donutStartAngle: 90
});
var gauge2 = new JustGage({
    id: "2", // the id of the html element
    value: prete,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#eee',
    levelColors: levelColor,
    donutStartAngle: 90
});
var gauge3 = new JustGage({
    id: "3", // the id of the html element
    value: telecharge,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#eee',
    levelColors: levelColor,
    donutStartAngle: 90
});
var gauge4 = new JustGage({
    id: "4", // the id of the html element
    value: dispo,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#eee',
    levelColors: levelColor,
    donutStartAngle: 90
});
var gauge5 = new JustGage({
    id: "5", // the id of the html element
    value: authenticatedUsersPercentage,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#eee',
    levelColors: levelColor,
    donutStartAngle: 90
});


new Chart(memberConnectedPerMonth, {
    type: 'line',
    data: {
        labels: formattedData.map(entry => entry.date),

        datasets: [
            {
                label: 'Nombre de documents créé par mois',
                data: formattedData.map(entry => entry.nbrDocCreated),
                borderWidth: 1
            },
            {
                label: 'Nombre de documents archivé par mois',
                data: formattedData.map(entry => entry.nbrDocArchived),
                borderWidth: 1
            },
        ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      tension: 0.4,
      fill: false
    }
  });


new Chart(donutGraph, {
  type: 'doughnut',
  data: {
    labels: [
      'Utilisateurs',
      'Gestionnaire Central',
      'Gestionnaire Standard',
      'Administrateurs'
    ],
    datasets: [{
      label: 'Nombre total',
      data: [
        userDonut['user'],
        userDonut['managerStd'],
        userDonut['managerCtl'],
        userDonut['admin'],
    ],
      backgroundColor: [
        '#6363ff',
        '#4348aa',
        '#9999ff',
        '#162233'
      ],
      hoverOffset: 10,
      borderWidth: 0
    }]
  }
});

