(function($) {    
    separator = (num) => {
      var str = num.toString().split(".")
      str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      return str.join(".")
    }

    votesChart = (url) => {
      'use strict';
      var options = {
        chart: {
          type: 'donut'
        },
        series: [],
        noData: {
          text: 'No data',
          style: {
            color: '#000',
            fontSize: '20px'
          }
        },
        labels: [],
        responsive: [{
          breakpoint: 767,
          options: {
            legend: {
              show: false
            }
          }
        }],
        legend: {
          labels: {
            colors: '#000'
          }
        },
        plotOptions: {
          pie: {
            donut: {
              // size: '65%',
              labels: {
                show: true,
                name: {
                  show: true,
                  fontSize: '15'
                },
                value: {
                  show: true,
                  fontSize: '16',
                  color: '#000',
                  formatter: (val) => {
                    return separator(val)
                  }
                },
                total: {
                  show: true,
                  fontSize: '22',
                  color: '#000',
                  label: 'Votes',
                  formatter: (w) => {
                    var t = w.globals.seriesTotals.reduce((a,b) => a + b, 0)
                    return separator(t)
                  }
                }
              }
            },
          }
        },
        dataLabels: {
          enabled: true
        }
      }
      var votesChart = new ApexCharts(document.querySelector('#votesChart'), options)
      votesChart.render()
      $.getJSON(url, (response) => {
          response.forEach(a => {
            options.labels.push(a.fullname)
            options.series.push(+a.counter)
          });
          votesChart.updateOptions([{}])
      })
    }
  })(jQuery);