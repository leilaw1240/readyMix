<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <article id="post-68" class="post-68 page type-page status-publish hentry">

            <header class="page-header">
                <h1 class="page-title">My Account</h1>


            </header>

            <div class="entry-content" id="entry-content-anchor">
                <div class="woocommerce">
                    <div class="myaccount">
                        <div class="myaccount__flex clearfix">
                            <div class="myaccount__avatar">
                                <img alt="" src="<?php echo Yii::app()->session['login']['profile_pic']; ?>"  class="avatar avatar-128 photo" height="128" width="128">		</div>
                            <div class="myaccount__content">
                                Hello <strong><?php echo Yii::app()->session['login']['user_name']; ?></strong> (not <?php echo Yii::app()->session['login']['user_name']; ?>? <a href="<?php echo $this->createUrl('site/logout'); ?>">Sign out</a>). From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="<?php echo Yii::app()->createUrl('user/profile',array('page'=>'password')); ?>">edit your password and account details</a>.		</div>
                        </div>
                    </div>





                    <div class="addresses">

                        <div class="addresses__description">
                            <h2>My Address</h2>
                            <p class="myaccount_address">
                                The following addresses will be used on the checkout page by default.		</p>
                        </div>

                        <div class="addresses__address">
                            <div class="address">
                                <header class="title">
                                    <h3>Billing Address</h3>
                                </header>
                                <address>
                                    You have not set up this type of address yet.				</address>
                                <a href="http://localhost/cbook/my-account/edit-address/billing" class="edit">Edit</a>
                            </div>
                        </div>

                    </div>

                </div>
                <span class="edit-link"><a class="post-edit-link" href="http://localhost/cbook/wp-admin/post.php?post=68&amp;action=edit">Edit <span class="screen-reader-text">"My Account"</span></a></span>	</div><!-- .entry-content -->
        </article><!-- #post-## -->


    </main><!-- #main -->
</div>