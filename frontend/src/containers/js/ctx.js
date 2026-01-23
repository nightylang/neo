// Get the context of the canvas element we want to select
const ctx = document.getElementById('myPieChart').getContext('2d');
// Create the chart
const myPieChart = new Chart(ctx, {
    type: 'pie', // The type of chart we want to create
    data: {
        labels: ['User', 'Product', 'Course'],
        datasets: [{
            label: 'Traffic Source',
            data: [5, 11, 0],
            backgroundColor: [
                '#d62728',
                '#1F99B4FF',
                '#ff7f0e',

            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Percentage of Total Traffic'
            }
        }
    }
});
const perfomctx = document.getElementById('myPerformanceChart').getContext('2d');

const myPerformanceChart = new Chart(perfomctx, {
    type: 'line', // The type of chart
    data: {
        labels: ['12:00', '15:00', '18:00', '21:00', '1:00', '3:00', '6:00', '9:00'],
        datasets: [{
                label: 'Payment',
                data: [20, 40, 35, 30, 10, 15, 100, 50],
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.1)', // Light fill
                tension: 0.1, // Makes the line slightly curved
                fill: true
            },
            {
                label: 'Limit payment 25',
                data: [25, 25, 25, 25, 25, 25, 25, 25],
                borderColor: 'red',
                borderDash: [5, 5], // Creates a dashed line
                pointRadius: 0, // Hide points on the target line
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false, // Start closer to the data range
                title: {
                    display: true,
                    text: 'Payment (seconds)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Day of the Week'
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Payment Chart'
            }
        }
    }
});