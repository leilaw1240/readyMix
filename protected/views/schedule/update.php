<?php
   $role_id = Yii::app()->session['userdata']['role_id'];
   $client_section = array(1, 2, 3, 4, 5, 6);
   $site_section = array(1, 2, 3, 4, 5, 6);
   $plant_section = array(1, 2, 3, 5, 6);
   $work_section = array(1, 2, 3, 4, 5, 6);
   ?>
<div class="">
   <div class="page-title">
      <!--        <div class="title_left">
         <h3>
             Form Validation
         </h3>
         </div>-->
      <!--        <div class="title_right">
         <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="Search for...">
                 <span class="input-group-btn">
                     <button class="btn btn-default" type="button">Go!</button>
                 </span>
             </div>
         </div>
         </div>-->
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="form-horizontal form-label-left">
         <?php if (in_array($role_id, $client_section)) { ?>
         <div class="col-md-12 col-xs-12">
                 <?php if (Yii::app()->user->hasFlash('schedule')) { ?>
                     <div class="infoMesage alert alert-success ">
                         <?php echo Yii::app()->user->getFlash('schedule'); ?> 
                     </div>
                 <?php } ?>
            <div class="x_panel">
               <div class="x_title">
                  <h2>Client Details</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Client Name</label>
                           <div class="col-md-5 col-sm-5">
                              <input  type="text" readonly="true" value="<?php echo!empty($schedule->client_name) ? $schedule->client_name : ''; ?>" class="form-control" placeholder="Client name">
                           </div>
                        </div>
                     </div>
                     <?php if (!empty($schedule->identity_proof)) { ?>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Govt Proof</label>
                           <div class="col-md-5 col-sm-5">
                              <img src="<?php echo $schedule->identity_proof ?>" width="150" height="75" />
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Address 1</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->client_address_1) ? $schedule->client_address_1 : ''; ?>" class="form-control client_address_1" placeholder="Address 1">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Address 2</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->client_address_2) ? $schedule->client_address_2 : ''; ?>" class="form-control client_address_2" placeholder="Address 2">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Mobile 1</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->client_mobile_1) ? $schedule->client_mobile_1 : ''; ?>" class="form-control client_mobile_1" placeholder="Mobile 1">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Mobile 2</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->client_mobile_2) ? $schedule->client_mobile_2 : ''; ?>" class="form-control client_mobile_2" placeholder="Mobile 2">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php if (in_array($role_id, $site_section)) { ?>
         <div class="col-md-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Site Information</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Site Name</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->site_name) ? $schedule->site_name : ''; ?>" class="form-control site_name" placeholder="Site name">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Address 1</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->site_address_1) ? $schedule->site_address_1 : ''; ?>" class="form-control site_address_1" placeholder="Address 1">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Address 2</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->site_address_1) ? $schedule->site_address_2 : ''; ?>" class="form-control site_address_2" placeholder="Address 2">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Mobile 1</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->site_mobile_1) ? $schedule->site_mobile_1 : ''; ?>" class="form-control site_mobile_1" placeholder="Mobile 1">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Mobile 2</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->site_mobile_2) ? $schedule->site_mobile_2 : ''; ?>" class="form-control site_mobile_1" placeholder="Mobile 2">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php if (in_array($role_id, $plant_section)) { ?>
         <div class="col-md-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Plant Information</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Supervisor Name</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->first_name) ? $schedule->first_name . ' ' . $schedule->last_name : ''; ?>" class="form-control" placeholder="Supervisor Name">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Supervisor Mobile Number</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->supervisor_mobile_number) ? $schedule->supervisor_mobile_number : ''; ?>" class="form-control" placeholder="Supervisor Mobile Number">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php if (in_array($role_id, $work_section)) { ?>
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
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->diameter) ? $schedule->diameter : ''; ?>" class="form-control" placeholder="Client name">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Mix Type</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->diameter) ? $schedule->diameter : ''; ?>" class="form-control" placeholder="Default Input">
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php /* if (Yii::app()->session['userdata']['role_id'] == 1) { ?>
                  <div class="row" >
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Payment Type</label>
                           <div class="col-md-5 col-sm-5">
                              <!--<input type="text" readonly="true" value="<?php echo!empty($schedule->diameter) ? $schedule->diameter : ''; ?>" class="form-control" placeholder="Address 1">-->
                              <select name="" class="form-control">
                                 <option value=""> Payement Type</option>
                                 <?php foreach ($this->payment_types as $k => $v) { ?>
                                 <option <?php ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Payment Mode</label>
                           <div class="col-md-5 col-sm-5">
                              <select name="" class="form-control">
                                 <option value=""> Payement Mode</option>
                                 <?php foreach ($this->payment_modes as $k => $v) { ?>
                                 <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } */ ?>
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Start Time</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->start_date) ? $schedule->start_date : ''; ?>" class="form-control" placeholder="Start Time">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">End Time</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->end_date) ? $schedule->end_date : ''; ?>" class="form-control" placeholder="End Time">
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php if (Yii::app()->session['userdata']['role_id'] == 1) { ?>
                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Rate</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->estimated_amount) ? $schedule->estimated_amount : ''; ?>" class="form-control" placeholder="Rate">
                           </div>
                        </div>
                     </div>
                  </div>
<!--                  <div class="row">
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Advance Payment</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->advance_amount) ? $schedule->advance_amount : ''; ?>" class="form-control" placeholder="Advance Payment">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                           <label class="control-label col-md-1 col-sm-1">Credit Period</label>
                           <div class="col-md-5 col-sm-5">
                              <input type="text" readonly="true" value="<?php echo!empty($schedule->diameter) ? $schedule->diameter : ''; ?>" class="form-control" placeholder="Credit Period">
                           </div>
                        </div>
                     </div>
                  </div>-->
                  <?php } ?>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php if (!empty($notes)) { ?>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" id="notes">
               <div class="x_title">
                  <h2>Schedule Summary</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content" >
                       <?php if (Yii::app()->user->hasFlash('note')){ ?>
                       <div class="infoMesage alert alert-success ">
                           <?php echo Yii::app()->user->getFlash('note'); ?> 
                       </div>
                       <?php } ?>
                  <ul class="list-unstyled msg_list">
                     <?php
                        foreach ($notes as $note) {
                            $img = Controller::getProfile($note->profile_image);
                            ?>
                     <li>
                        <a>
                        <span class="image">
                        <img src="<?php echo $img; ?>" alt="img">
                        </span>
                        <span>
                        <span><?php echo $note->first_name . ' ' . $note->last_name; ?></span>
                        <span class="time"><?php echo Controller::time_elapsed_string(strtotime($note->created_date)); ?></span>
                        </span>
                        <?php if ($note->file_name) { ?>
                        <span class="message">
                        <a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/uploads/schedule/quality/<?php echo $note->file_name; ?>"><?php echo $note->file_name; ?></a>
                        </span>
                        <?php } ?>
                        <?php if ($note->message) { ?>
                        <span class="message">
                        <?php echo $note->message; ?>
                        </span>
                        <?php } ?>
                        </a>
                     </li>
                     <?php } ?>
                  </ul>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php if ($role_id == 1 || $role_id == 3) { ?>
         <?php if (!empty($payments)) { ?>
         <div class="col-md-12 col-xs-12">
            <div class="x_panel" id="payments">
               <div class="x_title">
                  <h2>Payment Summary</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content" >
                    <?php if (Yii::app()->user->hasFlash('payment')) { ?>
                        <div class="infoMesage alert alert-success ">
                            <?php echo Yii::app()->user->getFlash('payment'); ?> 
                        </div>
                    <?php } ?>
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th>
                              #
                           </th>
                           <th class="column-title">Payment Type </th>
                           <th class="column-title">Payment Mode </th>
                           <th class="column-title">Received Amount </th>
                           <th class="column-title">Pending Amount</th>
                           <th class="column-title">Pending Due Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if (!empty($payments)) {
                               $i = 1;
                               foreach ($payments as $payment) {
                                   ?> 
                        <tr class="<?php echo $i % 2 == 0 ? 'event' : 'odd'; ?> pointer">
                           <td class="a-center ">
                              <?php echo $i; ?> 
                           </td>
                           <td class=" "><?php echo $this->payment_types[$payment->payment_type]; ?></td>
                           <td class=" "><?php echo $this->payment_modes[$payment->payment_mode]; ?></td>
                           <td class=" "><i class="success fa fa-rupee"></i><?php echo number_format($payment->paid_amount); ?></td>
                           <td class=" "><i class="success fa fa-rupee"></i><?php echo number_format($payment->due_amount); ?></td>
                           <td><?php echo $payment->payment_due_date ? $payment->payment_due_date : '--' ?></td>
                        </tr>
                        <?php
                           $i++;
                           }
                           }
                           ?>
                     </tbody>
                  </table>
                   <?php if($schedule->status != 4 && $schedule->status == 3 ){ ?>
                   <form method="POST" id="UpdatePaymentForm">
                       <div class="updatePayment">
                     <div class="row">
                        <div class="col-md-6 col-xs-6">
                           <div class="form-group">
                              <label class="control-label col-md-1 col-sm-1">Payment Type</label>
                              <div class="col-md-5 col-sm-5">
                                 <select class="form-control select_payment_type" name="payment[payment_type]" readonly="true">
                                    <option value=""> Payement Type</option>
                                    <?php foreach ($this->payment_types as $k => $v) { ?>
                                    <option <?php echo $payment->payment_type == $k ? 'selected="selected" ' : '';  ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
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
                                    <?php foreach ($this->payment_modes as $k => $v) { ?>
                                    <option <?php echo $payment->payment_mode == $k ? 'selected="selected" ' : '';  ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-xs-6">
                           <div class="form-group">
                              <label class="control-label col-md-1 col-sm-1">Amount</label>
                              <div class="col-md-5 col-sm-5">
                                 <input type="text" name="work[paid_amount]" class="form-control" placeholder="Amount">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                           <div class="form-group">
                              <label class="control-label col-md-1 col-sm-1">Credit Period</label>
                              <div class="col-md-5 col-sm-5">
                                 <input type="text" class="form-control" name="payment[credit_preriod]" placeholder="Credit Period">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 col-xs-12">
                           <input type="hidden" name="schedule_id" value="<?php echo $_GET['schedule_id'] ?>" />
                           <div class="form-group">
                              <button type="submit" class="btn btn-success pull-right" name="update_type" value="payment">Update</button>
                           </div>
                        </div>
                     </div>
                  </div>
                   </form>
                    <?php }else if($schedule->status == 4){ ?>
                   <div class="row">
                     <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                           <button type="button" class="btn btn-warning pull-right">Payment Completed</button>
                        </div>
                     </div>
                  </div>
                    <?php } ?>
                   
                  
               </div>
            </div>
         </div>
         <?php } ?>
         <?php } ?>
         <?php if (($role_id != 3 && $role_id != 5)) { ?>
         <div class="col-md-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Welcome <?php echo Yii::app()->session['userdata']['user_name']; ?> </h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <?php if ($schedule->status != 3 && $schedule->status != 4) { ?>
                  <form method="POST" enctype='multipart/form-data' id="UpdateScheduleForm">
                     <div class="row">
                        <div class="col-md-12 col-xs-12">
                           <div class="form-group">
                              <label class="control-label col-md-1 col-sm-1">Note Type</label>
                              <div class="col-md-5 col-sm-5">
                                 <select id="note_type" name="note_type" class="form-control">
                                    <?php foreach ($this->note_types as $k => $type) { ?>
                                    <option value="<?php echo $k; ?>"><?php echo $type; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group note_option note_type_2" style="display:none;">
                              <label class="control-label col-md-1 col-sm-1">Document</label>
                              <div class="col-md-5 col-sm-5">
                                 <input class="form-control" name="file_name" type="file" />
                              </div>
                           </div>
                           <div class="form-group note_option note_type_1">
                              <label class="control-label col-md-1 col-sm-1">Notes</label>
                              <div class="col-md-10 col-sm-10">
                                 <textarea name="message" type="text" cols="200" rows="5"   class="form-control" placeholder="Schedular Notes"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 col-xs-12">
                           <input type="hidden" name="schedule_id" value="<?php echo $_GET['schedule_id'] ?>" />
                           <?php if ($schedule->status != 0) { ?>
                           <?php if ($role_id == 4) { ?>
                           <button type="submit" class="btn btn-success pull-right" name="update_type" value="complete">Completed</button>
                           <?php } ?>
                           <button type="submit" class="btn btn-danger pull-right" name="update_type" value="note">Update schedule</button>
                           <?php } else { ?>
                           <div class="form-group">
                              <button type="submit" class="btn btn-danger pull-right" name="update_type" value="reschedule">Reschedule</button>
                              <button type="submit" class="btn btn-success pull-right" name="update_type" value="approve">Approve</button>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </form>
                  <?php } else { ?>
                  <div class="row">
                     <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                           <button type="button" class="btn btn-warning pull-right">Schedule Completed</button>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</div>