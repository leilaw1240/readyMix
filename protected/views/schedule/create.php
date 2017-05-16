<!--<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>-->

<div class="">
    <div class="page-title">

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <form id="add_schedular_form" class="form-horizontal form-label-left" method="POST" enctype='multipart/form-data'>
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Client Details</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content client_info">

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Client Name</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input id="client_name" name="client[client_name]" type="text" class="form-control client_name" placeholder="Client name" />
                                    </div>
                                </div>






                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Govt Proof</label>
                                    <div class="col-md-5 col-sm-5">
                                        <img src="" width="150" height="75" class="identity_proof_img proof" style="display:none;" />
                                        <input type="file" name="identity_proof" class="form-control proof identity_proof" placeholder="Default Input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Address 1</label>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="text" name="client[address_1]" class="form-control client_address_1" placeholder="Address 1">-->
                                        <textarea name="client[address_1]" class="form-control client_address_1" placeholder="Address 1"></textarea>
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Address 2</label>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="text" name="client[address_2]" class="form-control client_address_2" placeholder="Address 2">-->
                                        <textarea name="client[address_2]" class="form-control client_address_2" placeholder="Address 2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Mobile 1</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="client[mobile_1]" maxlength="10" class="form-control client_mobile_1" placeholder="Mobile 1">
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Mobile 2</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="client[mobile_2]" maxlength="10" class="form-control client_mobile_2" placeholder="Mobile 2">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Site Information</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content site_info">

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Site Name</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="site[site_name]" class="form-control site_name" placeholder="Site name">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Address 1</label>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="text" name="site[address_1]" class="form-control site_address_1" placeholder="Address 1">-->
                                        <textarea name="site[address_1]" class="form-control site_address_1" placeholder="Address 1"></textarea>

                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Address 2</label>
                                    <div class="col-md-5 col-sm-5">
                                        <!--<input type="text" name="site[address_2]" class="form-control site_address_2" placeholder="Address 2">-->
                                        <textarea name="site[address_2]" class="form-control site_address_2" placeholder="Address 2"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Mobile 1</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="site[mobile_1]" maxlength="10" class="form-control site_mobile_1" placeholder="Mobile 1">
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Mobile 2</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="site[mobile_2]" maxlength="10" class="form-control site_mobile_2" placeholder="Mobile 2">
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plant Information</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">



                        <!--                        <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-1">Plant</label>
                                                            <div class="col-md-5 col-sm-5">
                                                                <select class="form-control">
                                                                    <option>Select</option>
                                                                </select>
                                                            </div>
                                                        </div>
                        
                        
                        
                        
                                                    </div>
                                                     
                                                </div>-->

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Supervisor Name</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input id="supervisor_name" name="supervisor_name" type="text" class="form-control" placeholder="Supervisor Name">
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Supervisor Mobile Number</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="supervisor_mobile_1" class="form-control supervisor_mobile_1" placeholder="Supervisor Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Work Information</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">M3 (Size)</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="work[diameter]" class="form-control" placeholder="Size">
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Mix Type</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text"  name="work[mix_type]" class="form-control" placeholder="Mix Type">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">No of pumps</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="work[pumps]" class="form-control" placeholder="No of pumps">
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">No of Slumps</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="work[slumps]" class="form-control" placeholder="No of Slumps">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-6">

                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Start Time</label>
                                    <div class='col-md-5 col-sm-5 input-group date' id='datetimepicker6'>
                                        <input id="start_date" name="work[start_date]" type='text' class="form-control" placeholder="Start Date" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-xs-6">

                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">End Time</label>
                                    <div class='col-md-5 col-sm-5 input-group date' id='datetimepicker7'>
                                        <input id="end_date" type='text' name="work[end_date]" class="form-control" placeholder="End Date" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--<div class="container">
                            <div class='col-md-5'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker6'>
                                        <input name="work[start_date]" type='text' class="form-control" placeholder="Start Time" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker7'>
                                        <input name="work[start_date]" type='text' class="form-control" placeholder="End Time" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="row">
                            <div class="col-md-6 col-xs-6">

                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Payment Type</label>
                                    <div class="col-md-5 col-sm-5">
                                        <select class="form-control select_payment_type" name="payment[payment_type]">
                                            <option value=""> Payement Type</option>
                                             <?php foreach($this->payment_types as $k => $v){ ?>
                                            <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                            <?php } ?>
                                         </select>
                                   </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-xs-6">

                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Payment Mode</label>
                                    <div class="col-md-5 col-sm-5">

                                        <select class="form-control" name="payment[payment_mode]">
                                            <option value=""> Payement Mode</option>
                                            <?php foreach($this->payment_modes as $k => $v){ ?>
                                            <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Rate</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="work[estimated_amount]" class="form-control" placeholder="Rate">
                                    </div>
                                </div>




                            </div>

                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Advance Payment</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" name="work[advance_amount]" class="form-control" placeholder="Advance Payment">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">


                            <div class="col-md-6 col-xs-6 is_credit_payment" style="display:none;">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1">Credit Period</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" class="form-control" name="payment[credit_preriod]" placeholder="Credit Period">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group pull-right ">
                                    <input type="hidden" class="client_id" name="client_id" />
                                    <input type="hidden" class="site_id" name="site_id" />
                                    <input type="hidden" class="supervisor_id" name="supervisor_id" />
                                    <a href="<?php echo $this->createUrl('schedule/index'); ?>" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Add Schedule</button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </form>

    </div>
</div>