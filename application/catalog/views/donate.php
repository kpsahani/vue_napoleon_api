

<!DOCTYPE html>

<html lang="en">

<head>

   <title>Kp Paytm</title>



    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/dist/css/bootstrap.min.css">



    <!-- FontAwesome CSS -->

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/dist/css/font-awesome.min.css">



    <!-- ElegantFonts CSS -->

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/dist/css/elegant-fonts.css">



    <!-- themify-icons CSS -->

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/dist/css/themify-icons.css">



    <!-- Swiper CSS -->

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/dist/css/swiper.min.css">



    <!-- Styles -->

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/dist/style.css">

    <link rel="stylesheet" href="http://192.168.1.111/kpcharity/newadmin/images-grid.css">

<link rel="stylesheet" href="http://192.168.1.111/kpcharity/colorbox-master/example1/colorbox.css" />

</head>

<body class="single-page contact-page">

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/jquery-1.8.3.js'></script> 

    <script src="http://192.168.1.111/kpcharity/colorbox-master/jquery.colorbox.js"></script>

    <script src="http://192.168.1.111/kpcharity/newadmin/images-grid.js"></script>

    <header class="site-header">

        <div class="top-header-bar" style="display:none;">

            <div class="container">

                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">

                    <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">

                        <div class="header-bar-email">

                            MAIL: <a href="#">kp1399@yopmail.com</a>

                        </div><!-- .header-bar-email -->



                        <div class="header-bar-text">

                            <p>PHONE: <span>+99 9999 999 888 / +99999 88888</span></p>

                        </div><!-- .header-bar-text -->

                    </div><!-- .col -->



                    <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">

                        <div class="donate-btn">

                            <a href="http://192.168.1.111/kpcharity/donate">Donate Now</a>

                        </div><!-- .donate-btn -->

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .container -->

        </div><!-- .top-header-bar -->



        <div class="nav-bar" style="display:none;">

            <div class="container">

                <div class="row">

                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">

                        <div class="site-branding d-flex align-items-center">

                           <a class="d-block" href="#" rel="home"><img class="d-block" src="http://192.168.1.111/kpcharity/images/new_logo.png" alt="logo"></a>

                        </div><!-- .site-branding -->



                        <nav class="site-navigation d-flex justify-content-end align-items-center">

                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">

                                <li class=""><a href="http://192.168.1.111/kpcharity/">Home</a></li>

                                <li class="" ><a href="http://192.168.1.111/kpcharity/home/about">About us</a></li>

                                <!-- <li><a href="causes.html">Causes</a></li> -->

                                <li class="" ><a href="http://192.168.1.111/kpcharity/home/gallery">Gallery</a></li>

                                <!-- <li><a href="news.html">News</a></li> -->

                                <li class="" ><a href="http://192.168.1.111/kpcharity/home/contact">Contact</a></li>

                            </ul>

                        </nav><!-- .site-navigation -->



                        <div class="hamburger-menu d-lg-none">

                            <span></span>

                            <span></span>

                            <span></span>

                            <span></span>

                        </div><!-- .hamburger-menu -->

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .container -->

        </div><!-- .nav-bar -->

    </header><!-- .site-header -->

    <script>

            $(document).ready(function(){

                //Examples of how to assign the Colorbox event to elements

                 $(".group1").colorbox({rel:'group1'});



               

            });

        </script><!-- contact code start -->

<div class="page-header">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <h1>Paytm Donation</h1>

                </div><!-- .col -->

            </div><!-- .row -->

        </div><!-- .container -->

    </div><!-- .page-header -->



    <div class="contact-page-wrap">

        <div class="container" style="margin-top: 35px">





        <div class="row">

            <div class="col-12">

                <div class="donation-form-wrap">

                    <h2>Paytm Donation</h2>



                    <h4 class="mt-5">How much do you want to donate?</h4>



                    <form method="post" class="donation-form" action="<?php echo base_url("front/paytmpost"); ?>">

                        <div class="donate-amount-wrap d-flex flex-wrap align-items-center mt-5">

                            <label class="radio-label">

                                <input type="radio" value="10" onclick="hide_show_amount_box(this.value)" name="donation_amount">

                                <span class="donate-amount">₹10</span>

                            </label>



                            <label class="radio-label">

                                <input type="radio" value="20" onclick="hide_show_amount_box(this.value)" name="donation_amount">

                                <span class="donate-amount">₹20</span>

                            </label>



                            <label class="radio-label">

                                <input type="radio"  onclick="hide_show_amount_box(this.value)" value="25" name="donation_amount">

                                <span class="donate-amount">₹25</span>

                            </label>



                            <label class="radio-label">

                                <input type="radio" value="50"  checked="checked"  onclick="hide_show_amount_box(this.value)" name="donation_amount">

                                <span class="donate-amount">₹50</span>

                            </label>



                            <label class="radio-label">

                                <input type="radio" value="100" onclick="hide_show_amount_box(this.value)"  name="donation_amount">

                                <span class="donate-amount">₹100</span>

                            </label>



                            <label class="radio-label">

                                <input type="radio" value="custom" onclick="hide_show_amount_box(this.value)" name="donation_amount">

                                <span class="donate-amount">Other Amount</span>

                            </label>

                        </div>

                    <!-- Hidden fields start -->

                    <input id="ORDER_ID" type="hidden" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">

                    

                    <input id="CUST_ID" type="hidden" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">

                    

                    <input id="INDUSTRY_TYPE_ID" type="hidden" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

                    

                    <input id="CHANNEL_ID" type="hidden"  maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

                    

                    <input title="TXN_AMOUNT"  type="hidden" name="TXN_AMOUNT" id="TXN_AMOUNT" value="50">

                    <!-- Hidden fields end -->

                    

                    <div class="billing-information   justify-content-between align-items-center" id="custom_amount_div" style="display: none">

                        <h4 class="w-100 mt-5 mb-3">Custom Amount</h4>

                        <input type="number" onblur="change_amount(this.value)" name="custom_amount" id="custom_amount" placeholder="amount">

                    </div>



                    <div class="billing-information  d-flex flex-wrap justify-content-between align-items-center">

                        <h4 class="w-100 mt-5 mb-3">Billing Information</h4>



                        <input type="text" name="customer_name" placeholder="Name" required="">

                        <input type="email" name="customer_email" placeholder="E-mail" required="">

                        

                        <input type="number" name="customer_phone" placeholder="Phone Number" required="">

                        <input type="text" name="customer_address" placeholder="Address" required="">

                        

                        <input type="text" name="customer_city" placeholder="City" required="">

                        <input type="text" name="customer_state" placeholder="State" required="">

                        

                        <input type="number" name="customer_postalcode" placeholder="Postcode" required="">

                        <input type="text" name="customer_country" placeholder="Country" required="">

                    </div>



                    <input type="submit" value="Donate Now" class="btn gradient-bg mt-5">

                    </form>

                </div>

            </div>

        </div>

    </div>

    </div>





    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/cust.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/jquery.collapsible.min.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/swiper.min.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/jquery.countdown.min.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/circle-progress.min.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/jquery.countTo.min.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/jquery.barfiller.js'></script>

    <script type='text/javascript' src='http://192.168.1.111/kpcharity/newadmin/dist/js/custom.js'></script>



</body>

</html>



<!-- contact code end -->

<script type="text/javascript">

    function change_amount(value)

    {

        jQuery('#TXN_AMOUNT').val(value);

    }

    function hide_show_amount_box(value)

    {

        if(value == 'custom')

        {

            jQuery('#custom_amount').val('');

            jQuery('#custom_amount_div').show();

            jQuery('#custom_amount_div').css('display','block !important');

        }

        else

        {

            jQuery('#TXN_AMOUNT').val(value);

            jQuery('#custom_amount_div').css('display','none !important');

            jQuery('#custom_amount_div').hide();

        }

    }

</script>