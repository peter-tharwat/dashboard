/**
 * Statistics Cards
 */

'use strict';

(function () {
  let cardColor, shadeColor, labelColor, headingColor, barBgColor, borderColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    labelColor = config.colors_dark.textMuted;
    headingColor = config.colors_dark.headingColor;
    shadeColor = 'dark';
    barBgColor = '#8692d014';
    borderColor = config.colors_dark.borderColor;
  } else {
    cardColor = config.colors.cardColor;
    labelColor = config.colors.textMuted;
    headingColor = config.colors.headingColor;
    shadeColor = '';
    barBgColor = '#4b465c14';
    borderColor = config.colors.borderColor;
  }

  // Donut Chart Colors
  const chartColors = {
    donut: {
      series1: config.colors.success,
      series2: '#28c76fb3',
      series3: '#28c76f80',
      series4: config.colors_label.success
    }
  };

  // Orders last week Bar Chart
  // --------------------------------------------------------------------
  const ordersLastWeekEl = document.querySelector('#ordersLastWeek'),
    ordersLastWeekConfig = {
      chart: {
        height: 90,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      plotOptions: {
        bar: {
          barHeight: '100%',
          columnWidth: '30px',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 4,
          colors: {
            backgroundBarColors: [barBgColor, barBgColor, barBgColor, barBgColor, barBgColor, barBgColor, barBgColor],
            backgroundBarRadius: 4
          }
        }
      },
      colors: [config.colors.primary],
      grid: {
        show: false,
        padding: {
          top: -30,
          left: -16,
          bottom: 0,
          right: -6
        }
      },
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [60, 50, 20, 45, 50, 30, 70]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%',
                borderRadius: 4
              }
            }
          }
        },
        {
          breakpoint: 1368,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 6,
                columnWidth: '30%',
                colors: {
                  backgroundBarRadius: 6
                }
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '35%',
                borderRadius: 6
              }
            }
          }
        },
        {
          breakpoint: 883,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '25%'
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 9
              },
              colors: {
                backgroundBarRadius: 9
              }
            }
          }
        },
        {
          breakpoint: 479,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 4,
                columnWidth: '35%'
              },
              colors: {
                backgroundBarRadius: 4
              }
            },
            grid: {
              padding: {
                right: -15,
                left: -15
              }
            }
          }
        },
        {
          breakpoint: 376,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 3
              }
            }
          }
        }
      ]
    };
  if (typeof ordersLastWeekEl !== undefined && ordersLastWeekEl !== null) {
    const ordersLastWeek = new ApexCharts(ordersLastWeekEl, ordersLastWeekConfig);
    ordersLastWeek.render();
  }

  // Sales last year Area Chart
  // --------------------------------------------------------------------
  const salesLastYearEl = document.querySelector('#salesLastYear'),
    salesLastYearConfig = {
      chart: {
        height: 90,
        type: 'area',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.25
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [200, 55, 400, 250]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof salesLastYearEl !== undefined && salesLastYearEl !== null) {
    const salesLastYear = new ApexCharts(salesLastYearEl, salesLastYearConfig);
    salesLastYear.render();
  }

  // Profit last month Line Chart
  // --------------------------------------------------------------------
  const profitLastMonthEl = document.querySelector('#profitLastMonth'),
    profitLastMonthConfig = {
      chart: {
        height: 90,
        type: 'line',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 6,
        xaxis: {
          lines: {
            show: true,
            colors: '#000'
          }
        },
        yaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: -18,
          left: -4,
          right: 7,
          bottom: -10
        }
      },
      colors: [config.colors.info],
      stroke: {
        width: 2
      },
      series: [
        {
          data: [0, 25, 10, 40, 25, 55]
        }
      ],
      tooltip: {
        shared: false,
        intersect: true,
        x: {
          show: false
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      markers: {
        size: 3.5,
        fillColor: config.colors.info,
        strokeColors: 'transparent',
        strokeWidth: 3.2,
        discrete: [
          {
            seriesIndex: 0,
            dataPointIndex: 5,
            fillColor: cardColor,
            strokeColor: config.colors.info,
            size: 5,
            shape: 'circle'
          }
        ],
        hover: {
          size: 5.5
        }
      },
      responsive: [
        {
          breakpoint: 768,
          options: {
            chart: {
              height: 110
            }
          }
        }
      ]
    };
  if (typeof profitLastMonthEl !== undefined && profitLastMonthEl !== null) {
    const profitLastMonth = new ApexCharts(profitLastMonthEl, profitLastMonthConfig);
    profitLastMonth.render();
  }

  // Sessions Last Month - Staked Bar Chart
  // --------------------------------------------------------------------
  const sessionsLastMonthEl = document.querySelector('#sessionsLastMonth'),
    sessionsLastMonthConfig = {
      chart: {
        type: 'bar',
        height: 90,
        parentHeightOffset: 0,
        stacked: true,
        toolbar: {
          show: false
        }
      },
      series: [
        {
          name: 'PRODUCT A',
          data: [4, 3, 6, 4, 3]
        },
        {
          name: 'PRODUCT B',
          data: [-3, -4, -3, -2, -3]
        }
      ],
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '30%',
          barHeight: '100%',
          borderRadius: 5,
          startingShape: 'rounded',
          endingShape: 'rounded'
        }
      },
      dataLabels: {
        enabled: false
      },
      tooltip: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 1,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: false
      },
      colors: [config.colors.primary, config.colors.success],
      grid: {
        show: false,
        padding: {
          top: -41,
          right: -10,
          left: -8,
          bottom: -26
        }
      },
      xaxis: {
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        show: false
      },
      responsive: [
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 6,
                columnWidth: '20%'
              }
            }
          }
        },
        {
          breakpoint: 1025,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 7,
                columnWidth: '25%'
              }
            },
            chart: {
              height: 110
            }
          }
        },
        {
          breakpoint: 900,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 6
              }
            }
          }
        },
        {
          breakpoint: 782,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 426,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 5
              }
            }
          }
        },
        {
          breakpoint: 376,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '35%'
              }
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof sessionsLastMonthEl !== undefined && sessionsLastMonthEl !== null) {
    const sessionsLastMonth = new ApexCharts(sessionsLastMonthEl, sessionsLastMonthConfig);
    sessionsLastMonth.render();
  }

  // Expenses Radial Bar Chart
  // --------------------------------------------------------------------
  const expensesRadialChartEl = document.querySelector('#expensesChart'),
    expensesRadialChartConfig = {
      chart: {
        height: 145,
        sparkline: {
          enabled: true
        },
        parentHeightOffset: 0,
        type: 'radialBar'
      },
      colors: [config.colors.warning],
      series: [78],
      plotOptions: {
        radialBar: {
          offsetY: 0,
          startAngle: -90,
          endAngle: 90,
          hollow: {
            size: '65%'
          },
          track: {
            strokeWidth: '45%',
            background: borderColor
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              fontSize: '22px',
              color: headingColor,
              fontWeight: 500,
              offsetY: -5
            }
          }
        }
      },
      grid: {
        show: false,
        padding: {
          bottom: 5
        }
      },
      stroke: {
        lineCap: 'round'
      },
      labels: ['Progress'],
      responsive: [
        {
          breakpoint: 1442,
          options: {
            chart: {
              height: 100
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '55%'
                },
                dataLabels: {
                  value: {
                    fontSize: '16px',
                    offsetY: -1
                  }
                }
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            chart: {
              height: 228
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '75%'
                },
                track: {
                  strokeWidth: '50%'
                },
                dataLabels: {
                  value: {
                    fontSize: '26px'
                  }
                }
              }
            }
          }
        },
        {
          breakpoint: 890,
          options: {
            chart: {
              height: 180
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '70%'
                }
              }
            }
          }
        },
        {
          breakpoint: 426,
          options: {
            chart: {
              height: 142
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '70%'
                },
                dataLabels: {
                  value: {
                    fontSize: '22px'
                  }
                }
              }
            }
          }
        },
        {
          breakpoint: 376,
          options: {
            chart: {
              height: 105
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '60%'
                },
                dataLabels: {
                  value: {
                    fontSize: '18px'
                  }
                }
              }
            }
          }
        }
      ]
    };
  if (typeof expensesRadialChartEl !== undefined && expensesRadialChartEl !== null) {
    const expensesRadialChart = new ApexCharts(expensesRadialChartEl, expensesRadialChartConfig);
    expensesRadialChart.render();
  }

  // Impression This Week
  // --------------------------------------------------------------------
  const impressionThisWeekEl = document.querySelector('#impressionThisWeek'),
    impressionThisWeekConfig = {
      chart: {
        height: 90,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      colors: [config.colors.danger],
      stroke: {
        width: 3
      },
      grid: {
        padding: {
          bottom: -10
        }
      },
      tooltip: {
        enabled: false
      },
      series: [
        {
          data: [200, 200, 500, 500, 300, 300, 100, 100, 450, 450, 650, 650]
        }
      ],
      responsive: [
        {
          breakpoint: 1200,
          options: {
            chart: {
              height: 110
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            chart: {
              height: 90
            }
          }
        },
        {
          breakpoint: 376,
          options: {
            chart: {
              height: 93
            }
          }
        }
      ]
    };
  if (typeof impressionThisWeekEl !== undefined && impressionThisWeekEl !== null) {
    const impressionThisWeek = new ApexCharts(impressionThisWeekEl, impressionThisWeekConfig);
    impressionThisWeek.render();
  }

  // Subscriber Gained Area Chart
  // --------------------------------------------------------------------
  const subscriberGainedEl = document.querySelector('#subscriberGained'),
    subscriberGainedConfig = {
      chart: {
        height: 90,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.1
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [200, 60, 300, 140, 230, 120, 400]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof subscriberGainedEl !== undefined && subscriberGainedEl !== null) {
    const subscriberGained = new ApexCharts(subscriberGainedEl, subscriberGainedConfig);
    subscriberGained.render();
  }

  // Quarterly Sales Area Chart
  // --------------------------------------------------------------------
  const quarterlySalesEl = document.querySelector('#quarterlySales'),
    quarterlySalesConfig = {
      chart: {
        height: 90,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.danger],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.1
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [200, 300, 160, 250, 130, 400]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof quarterlySalesEl !== undefined && quarterlySalesEl !== null) {
    const quarterlySales = new ApexCharts(quarterlySalesEl, quarterlySalesConfig);
    quarterlySales.render();
  }
  // Order Received Area Chart
  // --------------------------------------------------------------------
  const orderReceivedEl = document.querySelector('#orderReceived'),
    orderReceivedConfig = {
      chart: {
        height: 90,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.warning],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.1
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [350, 500, 310, 460, 280, 400, 300]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof orderReceivedEl !== undefined && orderReceivedEl !== null) {
    const orderReceived = new ApexCharts(orderReceivedEl, orderReceivedConfig);
    orderReceived.render();
  }

  // Revenue Generated Area Chart
  // --------------------------------------------------------------------
  const revenueGeneratedEl = document.querySelector('#revenueGenerated'),
    revenueGeneratedConfig = {
      chart: {
        height: 90,
        type: 'area',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.1
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [300, 350, 330, 380, 340, 400, 380]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof revenueGeneratedEl !== undefined && revenueGeneratedEl !== null) {
    const revenueGenerated = new ApexCharts(revenueGeneratedEl, revenueGeneratedConfig);
    revenueGenerated.render();
  }

  // Average Daily Sales
  // --------------------------------------------------------------------
  const averageDailySalesEl = document.querySelector('#averageDailySales'),
    averageDailySalesConfig = {
      chart: {
        height: 123,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.1
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [400, 200, 650, 500]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      },
      responsive: [
        {
          breakpoint: 1387,
          options: {
            chart: {
              height: 80
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            chart: {
              height: 123
            }
          }
        }
      ]
    };
  if (typeof averageDailySalesEl !== undefined && averageDailySalesEl !== null) {
    const averageDailySales = new ApexCharts(averageDailySalesEl, averageDailySalesConfig);
    averageDailySales.render();
  }

  // Average Daily Traffic Bar Chart
  // --------------------------------------------------------------------
  const averageDailyTrafficEl = document.querySelector('#averageDailyTraffic'),
    averageDailyTrafficConfig = {
      chart: {
        height: 145,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '100%',
          columnWidth: '25px',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 6
        }
      },
      colors: [config.colors.warning],
      grid: {
        show: false,
        padding: {
          top: -30,
          left: -18,
          bottom: -13,
          right: -10
        }
      },
      dataLabels: {
        enabled: false
      },
      tooltip: {
        enabled: false
      },
      series: [
        {
          data: [30, 40, 50, 60, 70, 80, 90]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['01', '02', '03', '04', '05', '06', '07'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px',
            fontFamily: 'Public Sans'
          },
          show: true
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 5
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '25%',
                borderRadius: 9
              }
            }
          }
        },
        {
          breakpoint: 992,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '25%'
              }
            }
          }
        },
        {
          breakpoint: 836,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 738,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '35%',
                borderRadius: 6
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '25%',
                borderRadius: 10
              }
            }
          }
        },
        {
          breakpoint: 500,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '24%',
                borderRadius: 8
              }
            }
          }
        },
        {
          breakpoint: 450,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 6
              }
            }
          }
        }
      ]
    };
  if (typeof averageDailyTrafficEl !== undefined && averageDailyTrafficEl !== null) {
    const averageDailyTraffic = new ApexCharts(averageDailyTrafficEl, averageDailyTrafficConfig);
    averageDailyTraffic.render();
  }

  // Revenue Growth Chart
  // --------------------------------------------------------------------
  const revenueGrowthEl = document.querySelector('#revenueGrowth'),
    revenueGrowthConfig = {
      chart: {
        height: 162,
        type: 'bar',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '80%',
          columnWidth: '30%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 7,
          distributed: true
        }
      },
      tooltip: {
        enabled: false
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -12,
          left: -10,
          right: 0
        }
      },
      colors: [
        config.colors_label.success,
        config.colors_label.success,
        config.colors_label.success,
        config.colors_label.success,
        config.colors.success,
        config.colors_label.success,
        config.colors_label.success
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [25, 40, 55, 70, 85, 70, 55]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px',
            fontFamily: 'Public Sans'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      responsive: [
        {
          breakpoint: 1471,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '45%'
              }
            }
          }
        },
        {
          breakpoint: 1350,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '57%'
              }
            }
          }
        },
        {
          breakpoint: 1032,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '60%'
              }
            }
          }
        },
        {
          breakpoint: 992,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%',
                borderRadius: 8
              }
            }
          }
        },
        {
          breakpoint: 855,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%',
                borderRadius: 6
              }
            }
          }
        },
        {
          breakpoint: 440,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 381,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '45%'
              }
            }
          }
        }
      ]
    };
  if (typeof revenueGrowthEl !== undefined && revenueGrowthEl !== null) {
    const revenueGrowth = new ApexCharts(revenueGrowthEl, revenueGrowthConfig);
    revenueGrowth.render();
  }

  // Generated Leads Chart
  // --------------------------------------------------------------------
  const generatedLeadsChartEl = document.querySelector('#generatedLeadsChart'),
    generatedLeadsChartConfig = {
      chart: {
        height: 147,
        width: 130,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [45, 58, 30, 50],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15,
          right: -20,
          left: -20
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              value: {
                fontSize: '1.375rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                fontWeight: 500,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                showAlways: true,
                color: config.colors.success,
                fontSize: '.8125rem',
                label: 'Total',
                fontFamily: 'Public Sans',
                formatter: function (w) {
                  return '184';
                }
              }
            }
          }
        }
      }
    };
  if (typeof generatedLeadsChartEl !== undefined && generatedLeadsChartEl !== null) {
    const generatedLeadsChart = new ApexCharts(generatedLeadsChartEl, generatedLeadsChartConfig);
    generatedLeadsChart.render();
  }
})();
