
<?php if (Yii::app()->session['userdata']['role_id'] == 1) { ?>
    <div class="">

        <div class="row top_tiles">
            <a href="<?php echo $this->createUrl('user/index'); ?>" style="text-decoration: none;">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                        </div>
                        <div class="count"><?php echo sprintf('%02d', $countinfo['users']); ?></div>

                        <h3>Users</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo $this->createUrl('listing/index'); ?>" style="text-decoration: none;">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-comments-o"></i>
                        </div>
                        <div class="count"><?php echo sprintf('%02d', $countinfo['questions']); ?></div>

                        <h3>Schedules</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div> 
            </a>
            <a href="<?php echo $this->createUrl('comment/index'); ?>" style="text-decoration: none;">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                        </div>
                        <div class="count"><?php echo sprintf('%02d', $countinfo['answers']); ?></div>

                        <h3>Reviews</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div> 
            </a>
            <a href="" style="text-decoration: none;">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check-square-o"></i>
                        </div>
                        <div class="count"><?php echo sprintf('%02d', $countinfo['views']); ?></div>

                        <h3>Views</h3>
                        <p>Lorem ipsum psdea itgum rixt.</p>
                    </div>
                </div> 
            </a>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaction Summary <small>Weekly progress</small></h2>
                        <div class="filter">
                            <div style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" class="pull-right" id="reportrange">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>November 27, 2015 - December 26, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div style="height:280px" class="demo-container">
                                <div class="demo-placeholder" id="placeholder33x" style="padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 709px; height: 280px;" width="709" height="280"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 88px; top: 263px; left: 81px; text-align: center;" class="flot-tick-label tickLabel">28/12/15</div><div style="position: absolute; max-width: 88px; top: 263px; left: 180px; text-align: center;" class="flot-tick-label tickLabel">31/12/15</div><div style="position: absolute; max-width: 88px; top: 263px; left: 279px; text-align: center;" class="flot-tick-label tickLabel">03/01/16</div><div style="position: absolute; max-width: 88px; top: 263px; left: 378px; text-align: center;" class="flot-tick-label tickLabel">06/01/16</div><div style="position: absolute; max-width: 88px; top: 263px; left: 477px; text-align: center;" class="flot-tick-label tickLabel">09/01/16</div><div style="position: absolute; max-width: 88px; top: 263px; left: 576px; text-align: center;" class="flot-tick-label tickLabel">12/01/16</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 245px; left: 12px; text-align: right;" class="flot-tick-label tickLabel">0</div><div style="position: absolute; top: 204px; left: 6px; text-align: right;" class="flot-tick-label tickLabel">20</div><div style="position: absolute; top: 163px; left: 6px; text-align: right;" class="flot-tick-label tickLabel">40</div><div style="position: absolute; top: 123px; left: 6px; text-align: right;" class="flot-tick-label tickLabel">60</div><div style="position: absolute; top: 82px; left: 6px; text-align: right;" class="flot-tick-label tickLabel">80</div><div style="position: absolute; top: 41px; left: 0px; text-align: right;" class="flot-tick-label tickLabel">100</div><div style="position: absolute; top: 1px; left: 0px; text-align: right;" class="flot-tick-label tickLabel">120</div></div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 709px; height: 280px;" width="709" height="280"></canvas><div class="legend"><div style="position: absolute; width: 69px; height: 17px; top: 17px; right: 21px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:17px;right:21px;;font-size:smaller;color:#3f3f3f"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(150,202,89);overflow:hidden"></div></div></td><td class="legendLabel">Email Sent&nbsp;&nbsp;</td></tr></tbody></table></div></div>
                            </div>
                            <div class="tiles">
                                <div class="col-md-4 tile">
                                    <span>Total Sessions</span>
                                    <h2>231,809</h2>
                                    <span style="height: 160px;" class="sparkline11 graph"><canvas style="display: inline-block; width: 198px; height: 40px; vertical-align: top;" width="198" height="40"></canvas></span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Revenue</span>
                                    <h2>$231,809</h2>
                                    <span style="height: 160px;" class="sparkline22 graph"><canvas style="display: inline-block; width: 200px; height: 40px; vertical-align: top;" width="200" height="40"></canvas></span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Sessions</span>
                                    <h2>231,809</h2>
                                    <span style="height: 160px;" class="sparkline11 graph"><canvas style="display: inline-block; width: 198px; height: 40px; vertical-align: top;" width="198" height="40"></canvas></span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div>
                                <div class="x_title">
                                    <h2>Top Profiles</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="list-unstyled top_profiles scroll-view" style="overflow: hidden; cursor: grab;" tabindex="5001">
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>
                                        <div class="media-body">
                                            <a href="#" class="title">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                        </a>
                                        <div class="media-body">
                                            <a href="#" class="title">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-blue profile_thumb">
                                            <i class="fa fa-user blue"></i>
                                        </a>
                                        <div class="media-body">
                                            <a href="#" class="title">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>
                                        <div class="media-body">
                                            <a href="#" class="title">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                        </a>
                                        <div class="media-body">
                                            <a href="#" class="title">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Weekly Summary <small>Activity shares</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;" class="row">
                            <div style="overflow:hidden;" class="col-md-7">
                                <span style="height: 160px; padding: 10px 25px;" class="sparkline_one"><canvas style="display: inline-block; width: 478px; height: 125px; vertical-align: top;" width="478" height="125"></canvas></span>
                                <h4 style="margin:18px">Weekly sales progress</h4>
                            </div>

                            <div class="col-md-5">
                                <div style="text-align: center;" class="row">
                                    <div class="col-md-4">
                                        <canvas style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;" width="110" height="110" id="canvas1i"></canvas>
                                        <h4 style="margin:0">Bounce Rates</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;" width="110" height="110" id="canvas1i2"></canvas>
                                        <h4 style="margin:0">New Traffic</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;" width="110" height="110" id="canvas1i3"></canvas>
                                        <h4 style="margin:0">Device Share</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Top Profiles <small>Sessions</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item One Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Three Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Top Profiles <small>Sessions</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item One Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Three Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Top Profiles <small>Sessions</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item One Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">April</p>
                                <p class="day">23</p>
                            </a>
                            <div class="media-body">
                                <a href="#" class="title">Item Three Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>
<div class="row center-block">
        Welcome to ready mix dashboard
    </div>
<?php } ?>