const list = document.querySelectorAll('.list');
const sidebar = document.querySelector('.navigation');
const container = document.querySelector('.container');


const memberConnectedPerMonth = document.getElementById('member-connected-per-month');
const donutGraph = document.getElementById('donut');

function activeLink() {
    list.forEach((item) => 
    item.classList.remove('active'));
    this.classList.add('active');
}
list.forEach((item) => 
item.addEventListener('click', activeLink));

sidebar.addEventListener('mouseenter', () => {
    if(!sidebar.classList.contains('hoverrable')) {
        sidebar.classList.add('hoverrable')
        container.classList.add('develop')
    }
})

sidebar.addEventListener('mouseleave', () => {
    if(sidebar.classList.contains('hoverrable')) {
        sidebar.classList.remove('hoverrable')
        container.classList.remove('develop')
    }
})



var gauge1 = new JustGage({
    id: "1", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#fff',
    levelColors: ['#4187f6', '#4187f6', '#4187f6'],
    donutStartAngle: 90
});
var gauge2 = new JustGage({
    id: "2", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#fff',
    levelColors: ['#ff0000', '#00ff00', '#0000ff'],
    donutStartAngle: 90
});
var gauge3 = new JustGage({
    id: "3", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#fff',
    levelColors: ['#ff0000', '#00ff00', '#0000ff'],
    donutStartAngle: 90
});
var gauge4 = new JustGage({
    id: "4", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6,
    donut: true,
    valueFontFamily: 'Poppins',
    valueFontColor: '#333',
    symbol: '%',
    gaugeColor: '#fff',
    levelColors: ['#ff0000', '#00ff00', '#0000ff'],
    donutStartAngle: 90
});

// update the value randomly
setInterval(() => {
gauge1.refresh(Math.random() * 100);
gauge2.refresh(Math.random() * 100);
gauge3.refresh(Math.random() * 100);
gauge4.refresh(Math.random() * 100);
}, 1000)

document.getElementById('userConnected').innerHTML = setInterval(Math.random() * 1000, 1000);
// setInterval((document.getElementById('userConnected').innerHTML = Math.random() * 1000), 1000 );

// const data = [
//     { month: January, count: 10 },
//     { month: February, count: 20 },
//     { month: March, count: 15 },
//     { month: April, count: 25 },
//     { month: Mai, count: 22 },
//     { month: June, count: 30 },
//     { month: July, count: 28 },
//     { month: August, count: 28 },
//     { month: September, count: 28 },
//     { month: October, count: 28 },
//     { month: November, count: 28 },
//     { month: December, count: 28 },
//   ];

let tabs = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

new Chart(memberConnectedPerMonth, {
    type: 'line',
    data: {
      labels: tabs,
      // labels: data.map(row => row.month),
      datasets: [{
        label: 'Member connected',
        data: [12, 19, 3, 5, 2, 3, 7, 16, 5, 10, 14, 8],
        // data: data.map(row => row.count),
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      tension: 0.4,
      fill: true
    }
  });

  
new Chart(donutGraph, {
  type: 'doughnut',
  data: {
    labels: [
      'Directeur',
      'Chef Services',
      'Chefs Divisions'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [350, 200, 300],
      backgroundColor: [
        '#7faffc',
        '#0062ff',
        '#4187f6'
      ],
      hoverOffset: 10,
      borderWidth: 0
    }]
  }
});

