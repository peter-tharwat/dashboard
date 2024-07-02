/**
 * Dashboard eCommerce
 */

'use strict';

(function () {
  let cardColor, labelColor, headingColor, borderColor, legendColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    labelColor = config.colors_dark.textMuted;
    legendColor = config.colors_dark.bodyColor;
    headingColor = config.colors_dark.headingColor;
    borderColor = config.colors_dark.borderColor;
  } else {
    cardColor = config.colors.cardColor;
    labelColor = config.colors.textMuted;
    legendColor = config.colors.bodyColor;
    headingColor = config.colors.headingColor;
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
              height: 120
            },
            plotOptions: {
              radialBar: {
                dataLabels: {
                  value: {
                    fontSize: '18px'
                  }
                },
                hollow: {
                  size: '60%'
                }
              }
            }
          }
        },
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 136
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '65%'
                },
                dataLabels: {
                  value: {
                    fontSize: '18px'
                  }
                }
              }
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 120
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '55%'
                }
              }
            }
          }
        },
        {
          breakpoint: 426,
          options: {
            chart: {
              height: 145
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '65%'
                }
              }
            },
            dataLabels: {
              value: {
                offsetY: 0
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
          breakpoint: 1442,
          options: {
            chart: {
              height: 100
            }
          }
        },
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 86
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 93
            }
          }
        }
      ]
    };
  if (typeof profitLastMonthEl !== undefined && profitLastMonthEl !== null) {
    const profitLastMonth = new ApexCharts(profitLastMonthEl, profitLastMonthConfig);
    profitLastMonth.render();
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
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 172,
              width: 160
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 178
            }
          }
        },
        {
          breakpoint: 426,
          options: {
            chart: {
              height: 147
            }
          }
        }
      ]
    };
  if (typeof generatedLeadsChartEl !== undefined && generatedLeadsChartEl !== null) {
    const generatedLeadsChart = new ApexCharts(generatedLeadsChartEl, generatedLeadsChartConfig);
    generatedLeadsChart.render();
  }

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        {
          name: 'Earning',
          data: [270, 210, 180, 200, 250, 280, 250, 270, 150]
        },
        {
          name: 'Expense',
          data: [-140, -160, -180, -150, -100, -60, -80, -100, -180]
        }
      ],
      chart: {
        height: 413,
        parentHeightOffset: 0,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      tooltip: {
        enabled: false
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '40%',
          borderRadius: 9,
          startingShape: 'rounded',
          endingShape: 'rounded'
        }
      },
      colors: [config.colors.primary, config.colors.warning],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: true,
        horizontalAlign: 'right',
        position: 'top',
        fontFamily: 'Public Sans',
        markers: {
          height: 12,
          width: 12,
          radius: 12,
          offsetX: -3,
          offsetY: 2
        },
        labels: {
          colors: legendColor
        },
        itemMargin: {
          horizontal: 10,
          vertical: 2
        }
      },
      grid: {
        show: false,
        padding: {
          bottom: -8,
          top: 20
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        labels: {
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: 'Public Sans'
          }
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
          offsetX: -16,
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: 'Public Sans'
          }
        },
        min: -200,
        max: 300,
        tickAmount: 5
      },
      responsive: [
        {
          breakpoint: 1700,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '43%'
              }
            }
          }
        },
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            },
            chart: {
              height: 422
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
          breakpoint: 1025,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            },
            chart: {
              height: 390
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '38%'
              }
            }
          }
        },
        {
          breakpoint: 850,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 449,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '73%'
              }
            },
            chart: {
              height: 360
            },
            xaxis: {
              labels: {
                offsetY: -5
              }
            },
            legend: {
              show: true,
              horizontalAlign: 'right',
              position: 'top',
              itemMargin: {
                horizontal: 10,
                vertical: 0
              }
            }
          }
        },
        {
          breakpoint: 394,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '88%'
              }
            },
            legend: {
              show: true,
              horizontalAlign: 'center',
              position: 'bottom',
              markers: {
                offsetX: -3,
                offsetY: 0
              },
              itemMargin: {
                horizontal: 10,
                vertical: 5
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
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

  // Total Revenue Report Budget Line Chart
  const budgetChartEl = document.querySelector('#budgetChart'),
    budgetChartOptions = {
      chart: {
        height: 100,
        toolbar: { show: false },
        zoom: { enabled: false },
        type: 'line'
      },
      series: [
        {
          name: 'Last Month',
          data: [20, 10, 30, 16, 24, 5, 40, 23, 28, 5, 30]
        },
        {
          name: 'This Month',
          data: [50, 40, 60, 46, 54, 35, 70, 53, 58, 35, 60]
        }
      ],
      stroke: {
        curve: 'smooth',
        dashArray: [5, 0],
        width: [1, 2]
      },
      legend: {
        show: false
      },
      colors: [borderColor, config.colors.primary],
      grid: {
        show: false,
        borderColor: borderColor,
        padding: {
          top: -30,
          bottom: -15,
          left: 25
        }
      },
      markers: {
        size: 0
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
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof budgetChartEl !== undefined && budgetChartEl !== null) {
    const budgetChart = new ApexCharts(budgetChartEl, budgetChartOptions);
    budgetChart.render();
  }

  // Earning Reports Bar Chart
  // --------------------------------------------------------------------
  const reportBarChartEl = document.querySelector('#reportBarChart'),
    reportBarChartConfig = {
      chart: {
        height: 230,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '60%',
          columnWidth: '60%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 4,
          distributed: true
        }
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: 0,
          left: -10,
          right: -10
        }
      },
      colors: [
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors.primary,
        config.colors_label.primary,
        config.colors_label.primary
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [40, 95, 60, 45, 90, 50, 75]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 190
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 250
            }
          }
        }
      ]
    };
  if (typeof reportBarChartEl !== undefined && reportBarChartEl !== null) {
    const barChart = new ApexCharts(reportBarChartEl, reportBarChartConfig);
    barChart.render();
  }

  // Variable declaration for table
  var dt_invoice_table = $('.datatable-invoice');
  // Invoice datatable
  // --------------------------------------------------------------------
  if (dt_invoice_table.length) {
    var dt_invoice = dt_invoice_table.DataTable({
      ajax: assetsPath + 'json/invoice-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'invoice_id' },
        { data: 'invoice_status' },
        { data: 'total' },
        { data: 'issued_date' },
        { data: 'invoice_status' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // Invoice ID
          targets: 1,
          render: function (data, type, full, meta) {
            var $invoice_id = full['invoice_id'];
            // Creates full output for row
            var $row_output = '<a href="app-invoice-preview.html"><span>#' + $invoice_id + '</span></a>';
            return $row_output;
          }
        },
        {
          // Invoice status
          targets: 2,
          render: function (data, type, full, meta) {
            var $invoice_status = full['invoice_status'],
              $due_date = full['due_date'],
              $balance = full['balance'];
            var roleBadgeObj = {
              Sent: '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30"><i class="ti ti-circle-check ti-sm"></i></span>',
              Draft:
                '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30"><i class="ti ti-device-floppy ti-sm"></i></span>',
              'Past Due':
                '<span class="badge badge-center rounded-pill bg-label-danger w-px-30 h-px-30"><i class="ti ti-info-circle ti-sm"></i></span>',
              'Partial Payment':
                '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span>',
              Paid: '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30"><i class="ti ti-chart-pie ti-sm"></i></span>',
              Downloaded:
                '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i class="ti ti-arrow-down-circle ti-sm"></i></span>'
            };
            return (
              "<span data-bs-toggle='tooltip' data-bs-html='true' title='<span>" +
              $invoice_status +
              '<br> <span class="fw-medium">Balance:</span> ' +
              $balance +
              '<br> <span class="fw-medium">Due Date:</span> ' +
              $due_date +
              "</span>'>" +
              roleBadgeObj[$invoice_status] +
              '</span>'
            );
          }
        },
        {
          // Total Invoice Amount
          targets: 3,
          render: function (data, type, full, meta) {
            var $total = full['total'];
            return '$' + $total;
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center">' +
              '<a href="javascript:;" class="text-body" data-bs-toggle="tooltip" title="Send Mail"><i class="ti ti-mail me-2 ti-sm"></i></a>' +
              '<a href="app-invoice-preview.html" class="text-body" data-bs-toggle="tooltip" title="Preview"><i class="ti ti-eye mx-2 ti-sm"></i></a>' +
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm lh-1"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="javascript:;" class="dropdown-item">Details</a>' +
              '<a href="javascript:;" class="dropdown-item">Archive</a>' +
              '<div class="dropdown-divider"></div>' +
              '<a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a>' +
              '</div>' +
              '</div>' +
              '</div>'
            );
          }
        },
        {
          // Invoice Status
          targets: -2,
          visible: false
        }
      ],
      order: [[1, 'asc']],
      dom:
        '<"row ms-2 me-3"' +
        '<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>>' +
        '<"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"invoice_status mb-3 mb-md-0">>' +
        '>t' +
        '<"row d-flex align-items-center mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6 mt-1"p>' +
        '>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search Invoice'
      },
      // Buttons
      buttons: [
        {
          text: '<i class="ti ti-plus me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span>',
          className: 'btn btn-primary waves-effect waves-light',
          action: function (e, dt, button, config) {
            window.location = 'app-invoice-add.html';
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(5)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select"><option value=""> Select Status </option></select>'
            )
              .appendTo('.invoice_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      }
    });
  }
  // On each datatable draw, initialize tooltip
  dt_invoice_table.on('draw.dt', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl, {
        boundary: document.body
      });
    });
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
})();
