<div class="">


    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Due Date">
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Qc Date">
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <button class="btn btn-default">Search</button>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <button class="btn btn-dark">Export</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Collection List</h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                    <!--<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                                Sno
                            </th>
                            <th class="column-title">Schedule ID </th>
                            <th class="column-title">Customer Name </th>
                            <th class="column-title">Contact Number </th>
                            <th class="column-title">Total </th>
                            <th class="column-title">Payment Recevied</th>
                            <th class="column-title">Due Date </th>
                            <th class="column-title">Comments </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($reports)) { // echo '<pre>'; print_r($reports);exit; ?>
                            <?php $i=1; foreach ($reports as $report) { ?>
                                <tr class="<?php echo $i%2 == 0 ? 'event' : 'odd'; ?> pointer">
                                    <td class=" "><?php echo $i; ?></td>
                                    <td class=""><?php echo $report->schedule_id; ?></td>
                                    <td class=" "><?php echo $report->client_name; ?></td>
                                    <td class=" "><?php echo $report->mobile_1; ?></td>
                                    <td class=" "><i class="fa fa-rupee" aria-hidden="true"></i><?php echo number_format($report->estimated_amount); ?></td>
                                    <td class=" "><i class="fa fa-rupee" aria-hidden="true"></i><?php echo number_format($report->paid_amount); ?></td>
                                    <td class=" ">--</td>
                                    <td class="a-right a-right ">--</td>
                                    <td class=" last">
                                        <a class="btn btn-dark" href="<?php echo $this->createUrl('schedule/update?schedule_id='.$report->schedule_id.'#payments'); ?>">View</a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>

                        <?php } else { ?>
                            <tr class="pointer">
                                <td colspan="9" align="center">No Collection found</td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>


</div>