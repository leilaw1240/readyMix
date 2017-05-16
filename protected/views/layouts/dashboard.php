<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php if (Yii::app()->controller->id == 'dashboard') { ?> 
            <!-- Bootstrap core CSS -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/fonts/css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/animate.min.css" rel="stylesheet">
            <!-- Custom styling plus plugins -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/custom.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/maps/jquery-jvectormap-2.0.1.css" />
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/icheck/flat/green.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/floatexamples.css" rel="stylesheet" />

            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.min.js"></script>
        <?php } else if (Yii::app()->controller->action->id == 'index') { ?> 
            <!-- Bootstrap core CSS -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/fonts/css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/animate.min.css" rel="stylesheet">
            <!-- Custom styling plus plugins -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/custom.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/icheck/flat/green.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.min.js"></script>

        <?php } else { ?> 
            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/wysihtml5/lib/css/bootstrap.min.css"></link>
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/fonts/css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/animate.min.css" rel="stylesheet">

            <!-- Custom styling plus plugins -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/custom.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/icheck/flat/green.css" rel="stylesheet">
            <!-- editor -->
            <!--<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">-->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/editor/index.css" rel="stylesheet">
            <!-- select2 -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/select/select2.min.css" rel="stylesheet">
            <!-- switchery -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/switchery/switchery.min.css" />
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.min.js"></script>

        <?php } ?>    
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.base64.js"></script>

        <script>
            var base_url = '<?php echo Yii::app()->createAbsoluteUrl(''); ?>';
            var current_date = '<?php echo date('Y-m-d') ?>';
            var role_id = <?php echo Yii::app()->session['userdata']['role_id']; ?>;
            var action = '<?php echo Yii::app()->controller->action->id; ?>';
        </script>
        <!--[if lt IE 9]>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo $this->createUrl('admin/index'); ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo Yii::app()->name; ?></span></a>
                        </div>
                        <div class="clearfix"></div>


                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="<?php echo Yii::app()->session['userdata']['profile_pic']; ?>" alt="" class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo Yii::app()->session['userdata']['user_name']; ?></h2>
                            </div>
                        </div>
                        <!-- /menu prile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <?php $this->widget('LeftMenu'); ?>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>



                            <?php $this->widget('Notifications'); ?>

                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->


                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <?php echo $content; ?>
                    </div>

                    <!-- footer content -->
                    <footer>
                        <div class="">
                            <p class="pull-right"> <?php echo Yii::app()->params['copyrightInfo']; ?> </p>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->

                </div>
                <!-- /page content -->
            </div>


        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <?php if (Yii::app()->controller->id == 'dashboard') { ?> 
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/bootstrap.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/nicescroll/jquery.nicescroll.min.js"></script>

            <!-- chart js -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/chartjs/chart.min.js"></script>
            <!-- bootstrap progress js -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/progressbar/bootstrap-progressbar.min.js"></script>
            <!-- icheck -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/icheck/icheck.min.js"></script>

            <!-- sparkline -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/sparkline/jquery.sparkline.min.js"></script>

            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/custom.js"></script>

            <!-- flot js -->
            <!--[if lte IE 8]><script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/excanvas.min.js"></script><![endif]-->
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.pie.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.orderBars.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.time.min.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/date.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.spline.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.stack.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/curvedLines.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/flot/jquery.flot.resize.js"></script>

            <!-- flot -->
            <script type="text/javascript">
                //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )
                var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

                //generate random number for charts
                randNum = function () {
                    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                }

                $(function () {
                    var d1 = [];
                    //var d2 = [];

                    //here we generate data for chart
                    for (var i = 0; i < 30; i++) {
                        d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);
                        //    d2.push([new Date(Date.today().add(i).days()).getTime(), randNum()]);
                    }

                    var chartMinDate = d1[0][0]; //first day
                    var chartMaxDate = d1[20][0]; //last day

                    var tickSize = [1, "day"];
                    var tformat = "%d/%m/%y";

                    //graph options
                    var options = {
                        grid: {
                            show: true,
                            aboveData: true,
                            color: "#3f3f3f",
                            labelMargin: 10,
                            axisMargin: 0,
                            borderWidth: 0,
                            borderColor: null,
                            minBorderMargin: 5,
                            clickable: true,
                            hoverable: true,
                            autoHighlight: true,
                            mouseActiveRadius: 100
                        },
                        series: {
                            lines: {
                                show: true,
                                fill: true,
                                lineWidth: 2,
                                steps: false
                            },
                            points: {
                                show: true,
                                radius: 4.5,
                                symbol: "circle",
                                lineWidth: 3.0
                            }
                        },
                        legend: {
                            position: "ne",
                            margin: [0, -25],
                            noColumns: 0,
                            labelBoxBorderColor: null,
                            labelFormatter: function (label, series) {
                                // just add some space to labes
                                return label + '&nbsp;&nbsp;';
                            },
                            width: 40,
                            height: 1
                        },
                        colors: chartColours,
                        shadowSize: 0,
                        tooltip: true, //activate tooltip
                        tooltipOpts: {
                            content: "%s: %y.0",
                            xDateFormat: "%d/%m",
                            shifts: {
                                x: -30,
                                y: -50
                            },
                            defaultTheme: false
                        },
                        yaxis: {
                            min: 0
                        },
                        xaxis: {
                            mode: "time",
                            minTickSize: tickSize,
                            timeformat: tformat,
                            min: chartMinDate,
                            max: chartMaxDate
                        }
                    };
                    var plot = $.plot($("#placeholder33x"), [{
                            label: "Email Sent",
                            data: d1,
                            lines: {
                                fillColor: "rgba(150, 202, 89, 0.12)"
                            }, //#96CA59 rgba(150, 202, 89, 0.42)
                            points: {
                                fillColor: "#fff"
                            }
                        }], options);
                });
            </script>
            <!-- /flot -->
            <!--  -->
            <script>
                $('document').ready(function () {
                    $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                        type: 'bar',
                        height: '125',
                        barWidth: 13,
                        colorMap: {
                            '7': '#a1a1a1'
                        },
                        barSpacing: 2,
                        barColor: '#26B99A'
                    });

                    $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
                        type: 'bar',
                        height: '40',
                        barWidth: 8,
                        colorMap: {
                            '7': '#a1a1a1'
                        },
                        barSpacing: 2,
                        barColor: '#26B99A'
                    });

                    $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
                        type: 'line',
                        height: '40',
                        width: '200',
                        lineColor: '#26B99A',
                        fillColor: '#ffffff',
                        lineWidth: 3,
                        spotColor: '#34495E',
                        minSpotColor: '#34495E'
                    });

                    var doughnutData = [
                        {
                            value: 30,
                            color: "#455C73"
                        },
                        {
                            value: 30,
                            color: "#9B59B6"
                        },
                        {
                            value: 60,
                            color: "#BDC3C7"
                        },
                        {
                            value: 100,
                            color: "#26B99A"
                        },
                        {
                            value: 120,
                            color: "#3498DB"
                        }
                    ];
                    var myDoughnut = new Chart(document.getElementById("canvas1i").getContext("2d")).Doughnut(doughnutData);
                    var myDoughnut = new Chart(document.getElementById("canvas1i2").getContext("2d")).Doughnut(doughnutData);
                    var myDoughnut = new Chart(document.getElementById("canvas1i3").getContext("2d")).Doughnut(doughnutData);
                });
            </script>
            <!-- -->


        <?php } else if (Yii::app()->controller->action->id == 'index') { ?> 
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/bootstrap.min.js"></script>
            <!-- chart js -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/chartjs/chart.min.js"></script>
            <!-- bootstrap progress js -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/progressbar/bootstrap-progressbar.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/nicescroll/jquery.nicescroll.min.js"></script>
            <!-- icheck -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/icheck/icheck.min.js"></script>

            <!-- Datatables -->
    <!--            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatables/js/jquery.dataTables.js"></script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatables/tools/js/dataTables.tableTools.js"></script>-->


            <link href='<?php echo Yii::app()->request->baseUrl; ?>/bower_components/fullcalendar/dist/fullcalendar.min.css' rel='stylesheet' />
            <link href='<?php echo Yii::app()->request->baseUrl; ?>/bower_components/fullcalendar/dist/fullcalendar.print.min.css' rel='stylesheet' media='print' />
            <script src='<?php echo Yii::app()->request->baseUrl; ?>/bower_components/moment/min/moment.min.js'></script>
            <script src='<?php echo Yii::app()->request->baseUrl; ?>/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>

            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/custom.js"></script>


            <script>


                $(document).ready(function () {
                    $('input.tableflat').iCheck({
                        checkboxClass: 'icheckbox_flat-green',
                        radioClass: 'iradio_flat-green'
                    });
                });
            </script>


        <?php } else { ?> 
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/bootstrap.min.js"></script>
            <!-- bootstrap progress js -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/progressbar/bootstrap-progressbar.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/nicescroll/jquery.nicescroll.min.js"></script>
            <!-- icheck -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/icheck/icheck.min.js"></script>
            <!-- tags -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/tags/jquery.tagsinput.min.js"></script>
            <!-- switchery -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/switchery/switchery.min.js"></script>

            <!-- richtext editor -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/editor/bootstrap-wysiwyg.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/editor/external/jquery.hotkeys.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/editor/external/google-code-prettify/prettify.js"></script>
            <!-- select2 -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/select/select2.full.js"></script>

            <!-- textarea resize -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/textarea/autosize.min.js"></script>
            <script>
                autosize($('.resizable_textarea'));
            </script>
            <!-- Autocomplete -->
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/autocomplete/countries.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/autocomplete/jquery.autocomplete.js"></script>

            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/custom.js"></script>


            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/moment/min/moment.min.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

            <!-- select2 -->
            <script>
                $(document).ready(function () {
                    var dateToday = new Date();
                    $('#datetimepicker6').datetimepicker({
                        minDate: dateToday,
                        format: "DD-MM-YYYY hh:mm A",
                        widgetPositioning: {
                            horizontal: 'right',
                            vertical: 'top'
                        }

                    });
                    $('#datetimepicker7').datetimepicker({
                        format: "DD-MM-YYYY hh:mm A",
                        widgetPositioning: {
                            horizontal: 'right',
                            vertical: 'top'
                        },
                        useCurrent: false //Important! See issue #1075
                        
                    });
                    $("#datetimepicker6").on("dp.change", function (e) {
                        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                    });
                    $("#datetimepicker7").on("dp.change", function (e) {
                        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                    });
                    $(".select2_single").select2({
                        placeholder: "Select a state",
                        allowClear: true
                    });
                    $(".select2_group").select2({});
                    $(".select2_multiple").select2({
                        maximumSelectionLength: 4,
                        placeholder: "With Max Selection limit 4",
                        allowClear: true
                    });
                });
            </script>
            <!-- /select2 -->
            <!-- input tags -->
            <script>
                function onAddTag(tag) {
                    alert("Added a tag: " + tag);
                }

                function onRemoveTag(tag) {
                    alert("Removed a tag: " + tag);
                }

                function onChangeTag(input, tag) {
                    alert("Changed a tag: " + tag);
                }

                $(function () {
                    $('#tags_1').tagsInput({
                        width: 'auto'
                    });
                });
            </script>
            <!-- /input tags -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/validation/jquery.validate.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/validation/additional-methods.js"></script>
            
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/custom_validation.js"></script>

        <?php } ?>
    </body>

</html>