<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Store Analytics')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <h4 class="mb-2"><?php echo e(__('Visitor')); ?></h4>
                    <div class="card shadow-none mb-0">
                        <div class="card-body p-3 rounded border">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div id="Analytics"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="mb-2"><?php echo e(__('Top URL')); ?></h4>
                    <div class="card shadow-none mb-0">
                        <div class="card-body  rounded border">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="bg-transparent"><?php echo e(__('Url')); ?></th>
                                            <th class="bg-transparent"><?php echo e(__('Views')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $visitor_url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e($url->url); ?>" target="blank"><?php echo e($slug); ?></a>
                                                </td>
                                                <td><?php echo e($url->total); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h4 class="mb-2"><?php echo e(__('Platform')); ?></h4>
                    <div class="card shadow-none mb-0">
                        <div class="card-body rounded border">
                            <div class="d-flex align-items-center">
                                <h3 class="flex-grow-1 mb-0"><?php echo e(__('Analytics')); ?></h3>
                            </div>
                            <div class="tab-content" id="analyticsTabContent">
                                <div class="tab-pane fade show active" id="home1" role="tabpanel"
                                    aria-labelledby="home-tab1">
                                    <div id="user-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4><?php echo e(__('Device')); ?></h4>
                    <div class="card shadow-none mb-0">
                        <div class="card-body rounded border">

                            <div class="tab-content" id="analyticsTabContent">
                                <div class="tab-pane fade show active" id="home2" role="tabpanel"
                                    aria-labelledby="home-tab2">
                                    <div id="WebKit"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4><?php echo e(__('Browser')); ?></h4>
                    <div class="card shadow-none mb-0">
                        <div class="card-body rounded border">
                            <div class="tab-content" id="analyticsTabContent">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    <div id="Safari"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        (function() {
            var options = {
                chart: {
                    height: 300,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                series: [{
                    name: "<?php echo e(__('Totle Page View')); ?>",
                    data: <?php echo json_encode($chartData['data']); ?>

                }, {
                    name: "<?php echo e(__('Unique Page View')); ?>",
                    data: <?php echo json_encode($chartData['unique_data']); ?>

                }],

                xaxis: {
                    categories: <?php echo json_encode($chartData['label']); ?>,
                    title: {
                        text: "<?php echo e(__('Last 7 Days')); ?>"
                    }
                },
                colors: ['#ffa21d', '#FF3A6E'],

                grid: {
                    strokeDashArray: 4,
                    // show: false,
                },
                legend: {
                    show: false,
                },
                markers: {
                    size: 4,
                    colors: ['#ffa21d', '#FF3A6E'],
                    opacity: 0.9,
                    strokeWidth: 2,
                    hover: {
                        size: 7,
                    }
                },
                yaxis: {
                    tickAmount: 3,
                    // min: 10,
                    // max: 70,
                    // labels: {
                    //   show: false,
                    // },
                },

                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "horizontal",
                        shadeIntensity: 0,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 0,
                        opacityTo: 0,
                        stops: [0, 50, 100],
                        colorStops: []
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#Analytics"), options);
            chart.render();
        })();
        (function() {
            var options = {
                series: <?php echo json_encode($devicearray['data']); ?>,
                chart: {
                    type: 'bar',
                    height: 300,
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    labels: <?php echo json_encode($devicearray['label']); ?>,
                },

                plotOptions: {
                    bar: {
                        color: '#fff',
                        columnWidth: '20%',
                    }
                },
                fill: {
                    type: 'solid',
                    opacity: 1,
                },
                series: [{
                    data: <?php echo json_encode($platformarray['data']); ?>,
                }],
                colors: ['#6FD943', '#162C4E', '#DAE0E0', '#316849', '#1A3C4E', '#203E4C'],
                labels: <?php echo json_encode($devicearray['label']); ?>,
                xaxis: {
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    crosshairs: {
                        width: 0
                    },
                    labels: {
                        style: {
                            colors: PurposeStyle.colors.gray[600],
                            fontSize: '14px',
                            margin: '10px',
                            cssClass: 'apexcharts-xaxis-label',
                        },
                    },
                    title: {
                        text: "<?php echo e(__('Platform')); ?>"
                    },
                    categories: <?php echo json_encode($platformarray['label']); ?>,
                },
                yaxis: {
                    tickAmount: 6,
                    labels: {
                        style: {
                            colors: "#000",
                        }
                    },
                },
                grid: {
                    borderColor: '#ffffff00',
                    padding: {
                        bottom: 0,
                        left: 10,
                    }
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return 'Total Earnings'
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#user-chart"), options);
            chart.render();
        })();

        var options = {
            series: <?php echo json_encode($devicearray['data']); ?>,
            chart: {
                width: 450,
                type: 'pie',
            },
            colors: ["#6FD943", "#316849", "#1A3C4E", "#EBF7E7", " #EBEDEF"],
            labels: <?php echo json_encode($devicearray['label']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom',
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#WebKit"), options);
        chart.render();
        var options = {
            series: <?php echo json_encode($browserarray['data']); ?>,
            chart: {
                width: 450,
                type: 'pie',
            },
            colors: ["#6FD943", "#316849", "#1A3C4E", "#EBF7E7", " #EBEDEF"],
            labels: <?php echo json_encode($browserarray['label']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom',
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#Safari"), options);
        chart.render();
    </script>

    <script src="<?php echo e(asset('public/js/svgMap.min.js')); ?>"></script>
    <script>
        new svgMap({
            targetElementID: 'map',
            data: {
                data: {
                    pageviews: {
                        name: '',
                        format: '{0} visitors',
                        thousandSeparator: ',',
                    },
                },
                applyData: 'pageviews',
                values:<?php echo json_encode($countries_map); ?> ,
            },
            colorMin: '#6fd930',
            colorMax: '#509e23',
            flagType: 'emoji',
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/touramin/public_html/sem/resources/views/store-analytic.blade.php ENDPATH**/ ?>