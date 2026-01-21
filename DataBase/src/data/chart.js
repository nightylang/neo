    // --- 1. The Morph ---
    const morphCtx = document.getElementById('morphChart').getContext('2d');
    const morphChart = new Chart(morphCtx, {
        type: 'bar',
        data: {
            labels: ['2022', '2023', '2024', '2025', '2026'],
            datasets: [{
                label: 'Weekly User Resquest',
                data: [10, 5, 15, 15, 5],
                backgroundColor: 'rgba(20, 12, 93, 0.6)',
                borderColor: 'rgba(93, 12, 12, 1)',
                borderWidth: 1
            }, {
                label: 'Monthly User Resquest',
                data: [32, 25, 45, 55, 2],
                backgroundColor: 'rgba(12, 93, 15, 0.6)',
                borderColor: 'rgba(93, 12, 12, 1)',
                borderWidth: 1
            }, {
                label: 'Yearly User Resquest',
                data: [85, 59, 120, 150, 1],
                backgroundColor: 'rgba(153, 11, 11, 0.6)',
                borderColor: 'rgba(93, 12, 12, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500,
                // This is the key! A more complex easing function.
                easing: 'easeInOutQuart',
                // Create a wave effect by delaying each bar's animation.
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default') {
                        delay = context.dataIndex * 100 + context.datasetIndex * 50;
                    }
                    return delay;
                },
            },
            scales: {
                y: { beginAtZero: true, grid: { color: '#444' }, ticks: { color: '#000000FF' } },
                x: { grid: { color: '#444' }, ticks: { color: '#000000FF' } }
            }
        }
    });

    function morphData() {
        morphChart.data.datasets[0].data = morphChart.data.datasets[0].data.map(() => Math.floor(Math.random() * 1000));
        morphChart.update();
    }

    //Secondary
    const threeChartctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(threeChartctx, {
        type: 'bar',
        data: {
            labels: ['User', 'Products', 'Course'],
            datasets: [{
                label: '# of Votes',
                data: [22, 50, 101],
                backgroundColor: [
                    'rgba(255, 0, 50, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 100, 0, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 100, 0, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                // Standard Main Title
                title: {
                    display: true,
                    text: 'Main Chart Title',
                    font: { size: 18, weight: 'bold' },
                    color: '#333',
                    padding: { bottom: 20 }
                },
                // Our Custom Secondary Title
                secondaryTitle: {
                    display: true,
                    text: ['Secondary Title', 'A Subtitle for Detail'],
                    position: 'top', // 'top', 'bottom', 'left', 'right'
                    align: 'center', // 'start', 'center', 'end'
                    font: {
                        size: 14,
                        weight: 'normal',
                        family: "'Trebuchet MS', sans-serif",
                        style: 'italic'
                    },
                    color: '#666',
                    padding: {
                        top: 5,
                        bottom: 10,
                        left: 10,
                        right: 10
                    },
                    fullWidth: true
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });