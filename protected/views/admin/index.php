<div id="login" class="animate form">
                <section class="login_content">
                    <form method="post">
                        <h1>Welcome to <?php echo Yii::app()->name ?> </h1>
                        <?php if($model->errorMessage){  ?>
                        <h6 style="color:red; font-weight: bold;"><?php echo $model->errorMessage; ?></h6>
                        <?php } ?>
                        <div>
                            <input type="text" name="email" value="<?php echo $model->email ? $model->email:''; ?>" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" value="<?php echo $model->password ? $model->password:''; ?>" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <!--<a class="btn btn-default submit" href="index.html">Log in</a>-->
                            <input type="submit" class="btn btn-default submit" name="do_submit" value="Log In" />
                            <!--<a class="reset_pass" href="#">Lost your password?</a>-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

<!--                            <p class="change_link">New to site?
                                <a href="#toregister" class="to_register"> Create Account </a>
                            </p>-->
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                 

                                <p><?php echo Yii::app()->params['copyrightInfo']; ?></p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>

