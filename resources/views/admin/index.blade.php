@extends('layout.admin')
@section('content')
    <title>Trang quản trị</title>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Trang chủ
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $totalTransaction}}</h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.transaction.index') }}" class="small-box-footer">Xem thêm<i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $totalRating}}</h3>

                            <p>Phản hồi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.rating')}}" class="small-box-footer">Xem thêm<i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $totalUser}}</h3>

                            <p>Người dùng mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">Xem thêm<i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Lượt truy cập</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="box box-solid bg-teal-gradient">
                        <div class="box-header">
                            <i class="fa fa-th"></i>

                            <h3 class="box-title">Doanh số bán hàng</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body border-radius-none">

                            <figure class="highcharts-figure">
                                <div id="container2" data-json={{ $listDay }} data-money={{ $arrRevenueTransactionMonth }}
                                data-money-default={{ $arrRevenueTransactionMonthDefault }}></div>

                            </figure>
                        </div>

                        <!-- /.box-footer -->
                    </div>



                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Map box -->
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange pull-right"
                                        data-toggle="tooltip" title="Date range">
                                    <i class="fa fa-calendar"></i></button>
                                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                            <!-- /. tools -->


                            <h3 class="box-title">
                                Thống kê
                            </h3>
                        </div>

                        <figure class="highcharts-figure">
                            <div id="container" data-json="{{$statusTransaction}} "></div>

                        </figure>

                        <!-- /.box-body-->

                    </div>
                    <!-- /.box -->

                    <!-- solid sales graph -->

                    <!-- /.box -->



                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>

        <section class="content">
             <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sản phẩm bán chạy  </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ID sản phẩm</th>
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượt thích</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hotProduct as $value => $list)
                                        <tr>
                                            <td>{{ $value }}</td>
                                            <td>{{$list->id}}</a></td>
                                            <td>{{ $list->pro_name }}</td>
                                            <td><img src="{{ $list->pro_avatar }}"
                                                     style="width:40px;height:40px;object-fit:contain"></td>
                                            <td style="text-align:center">{{ $list->pro_pay }} lượt mua</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                    </div>
                    </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let dataTransaction = $('#container').attr('data-json');
        let dataTurnOver = $('#container2').attr('data-json');
        let dataListMoney = $('#container2').attr('data-money');
        let dataListMoneyDefault = $('#container2').attr('data-money-default');
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'VND',
        });
        data = JSON.parse(dataTransaction);
        ListDay = JSON.parse(dataTurnOver);
        dataListMoney = JSON.parse(dataListMoney);
        dataListMoneyDefault = JSON.parse(dataListMoneyDefault);
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Thống kê đơn hàng'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: data
            }]
        });

        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Doanh thu theo ngày'
            },
            subtitle: {
                text: 'Doanh thu của từng ngày trong tháng'
            },
            xAxis: {
                categories: ListDay
            },
            yAxis: {
                title: {
                    text: 'Doanh thu'
                },
                labels: {
                    formatter: function () {
                        return formatter.format(this.value);
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Hoàn tất giao dịch',
                marker: {
                    symbol: 'square'
                },
                data: dataListMoney
            },
                {
                    name: 'Đang chờ xử lý',
                    marker: {
                        symbol: 'square'
                    },
                    data: dataListMoneyDefault
                }
            ]

        });
    </script>
@stop
