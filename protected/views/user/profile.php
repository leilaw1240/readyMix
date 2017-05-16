<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-8" class="post-8 page type-page status-publish hentry">
            <header class="page-header">
                <h1 class="page-title">Edit Address</h1>
            </header>

            <div class="entry-content" id="entry-content-anchor">

                <div class="woocommerce">
                    <div role="alert" class="errorMessage alert alert-info alert-dismissible" style=" display: none;  background-color: rgba(52, 152, 219, 0.88); border-color: rgba(52, 152, 219, 0.88); color: #e9edef; padding-right: 35px; border: 1px solid transparent; border-radius: 4px; margin-bottom: 20px; padding: 15px; transition: opacity 0.15s linear 0s; "> <button aria-label="Close" data-dismiss="alert" class="close" type="button" style=" color: inherit; position: relative; right: -21px; top: -2px; color: inherit; position: relative; right: -21px; top: -2px; background: transparent none repeat scroll 0 0; border: 0 none; cursor: pointer; padding: 0; color: #000; float: right; font-size: 21px; font-weight: bold; line-height: 1; opacity: 0.2; text-shadow: 0 1px 0 #fff; margin-bottom: 5px; margin-right: 15px; "><span aria-hidden="true">×</span></button> <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good. </div>
                    <div style="display: <?php echo $_GET['page'] == 'profile' ? 'block' : 'none'; ?>;">

                        <form method="post" id="edit_user_profile" enctype="multipart/form-data" >

                            <h3>Update Profile</h3>
                            <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                                <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="<?php echo $userprofile->first_name ? $userprofile->first_name : ''; ?>">
                            </p>
                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="<?php echo $userprofile->last_name ? $userprofile->last_name : ''; ?>">
                            </p>
                            <div class="clear"></div>
<!--                            <p class="form-row form-row-wide" id="billing_company_field">
                                <label for="billing_company" class="">Company Name</label>
                                <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="">
                            </p>-->
                            <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                                <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                <input disabled="disabled" type="email" class="input-text " id="billing_email" name="billing_email" placeholder="" value="<?php echo $userprofile->email ? $userprofile->email : ''; ?>">
                                <input type="hidden" name="email" value="<?php echo $userprofile->email ? $userprofile->email : ''; ?>" />
                            </p>
                           



                            <p class="form-row form-row-first"  >
                                <label for="billing_email" class="">County<abbr class="required" title="required" aria-required="true">*</abbr></label>
                                <select name="country_id" class="country_id">
                                    <option value="">Select Country</option>
                                    <?php if (!empty($countries)) {
                                        foreach ($countries as $country) { ?> 
                                            <option <?php echo $userprofile->country_id == $country->id ? 'selected="selected"' : '';  ?> value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </p>

                            <p class="form-row form-row-wide" id="billing_company_field">
                                <label for="billing_company" class="">State<abbr class="required" title="required" aria-required="true">*</abbr></label>
                                <select name="state_id" class="state_id">
                                    <option value="">Select State</option>
                                </select>
                            </p>

                            <p class="form-row form-row-wide" id="billing_company_field">
                                <label for="billing_company" class="">City<abbr class="required" title="required" aria-required="true">*</abbr></label>
                                <select name="city_id" class="city_id">
                                    <option value="" >Select City</option>
                                </select>
                            </p>

                            <p class="form-row" >
                                <label for="billing_email" class="">ZipCode <abbr class="required" title="required" aria-required="true">*</abbr></label>
                                <input type="text" class="input-text " name="zipcode" id="zipcode" placeholder="Zipcode" value="<?php echo $userprofile->zipcode ? $userprofile->zipcode : ''; ?>"  >
                            </p>
                            
                             <p class="form-row" id="billing_phone_field" style="width:700px;">
                                <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="Phone Number" value="<?php echo $userprofile->phone_number ? $userprofile->phone_number : ''; ?>">
                            </p>






                            <p class="form-row form-row-wide"  >
                                <label class="">Profile Image</label>
                                <input type="file" class="input-text " name="profile_image" id="profile_image" >
                            </p>

                            <p class="form-row form-row-wide" >
                                <img  class="input-text " width="250px" height="250px" src="<?php echo Yii::app()->session['login']['profile_pic']; ?>" />
                            </p>
                            <div class="clear"></div>

                            <p>
                                <input type="submit" class="button" name="save_address" value="Save Address">
                            </p>

                        </form>
                    </div>
                    <div style="display: <?php echo $_GET['page'] == 'password' ? 'block' : 'none'; ?>;">
                        <form id="chnage_password">

                            <h2 class="password-change-title">Password Change</h2>

                            <p class="form-row-wide">
                                <label for="password_current">Current Password</label>
                                <input type="password" class="input-text" name="password_current" id="password_current">
                            </p>
                            <p class="form-row-half">
                                <label for="password_1">New Password</label>
                                <input type="password" class="input-text" name="password_1" id="password_1">
                            </p>
                            <p class="form-row-half">
                                <label for="password_2">Confirm New Password</label>
                                <input type="password" class="input-text" name="password_2" id="password_2">
                            </p>

                            <p>
                                <input type="hidden" name="user_id" value="<?php echo Yii::app()->session['login']['user_id']; ?>" />
                                <input type="submit" class="button" name="save_address" value="Change Password">
                            </p>


                        </form>
                    </div>

                </div>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- #main -->
</div>

<script>
    function loadState(country_id,active){
          
         $.ajax({
                type: "POST",
                url: base_url + '/site/GetStates',
                data: {country_id: country_id,active:active},
                success: function (d) { 
                     $('.state_id').html(d);
                },
            });
     }
     function loadCity(state_id,active){
         $.ajax({
                type: "POST",
                url: base_url + '/site/GetCities',
                data: {state_id: state_id,active:active},
                success: function (d) { 
                     $('.city_id').html(d);
                },
            });
     }
<?php if($userprofile->state_id){ ?> loadState(<?php echo $userprofile->country_id; ?>,<?php echo $userprofile->state_id; ?>) <?php } ?>;
<?php if($userprofile->city_id){ ?>loadCity(<?php echo $userprofile->state_id; ?>,<?php echo $userprofile->city_id; ?>) <?php } ?>

</script>
