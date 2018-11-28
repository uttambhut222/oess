<?php 
include("config.php");

if(isset($_POST['inquire_submit'])){
	$MiddleName = $_POST['MiddleName'];
	if($MiddleName == NULL)
	{
	$FullName = $_POST['FullName'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	$Company = $_POST['Company'];
	$Comments = $_POST['Comments'];
	
	$sql = "INSERT INTO tblinquire (FullName, Email, Phone, Company, Comments)
			VALUES ('$FullName','$Email','$Phone','$Company','$Comments')";
			
	if ($conn->query($sql) === TRUE) {
		
		require_once('email/class.phpmailer.php');
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = HOST;
				$mail->Port = PORT;
				$mail->IsHTML(true);
				//$mail->FromName = FROMNAME; 
				$mail->Username = USERNAME;
				$mail->Password = USERPASSWORD;
				$mail->SetFrom('no-reply@theopeneyes.com','OpenEyes Software Solutions Pvt. Ltd.');
									
			$mail->Subject = "Inquire Generated - OpenEyes Software Solutions Pvt. Ltd.";
			$mail->Body = '
			<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid rgb(120, 120, 120); color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">
				<tbody>
					<tr>
						<td style="background-color:rgba(180, 180, 180, 0.5); border-bottom:5px solid #0061af; padding:10px"><a href="http://www.theopeneyes.com" target="_blank"><img alt="The OpenEyes Software Solution Logo" src="http://www.theopeneyes.com/images/logo-email.png" /></a></td>
					</tr>
					<tr>
						<td style="padding:10px">
						
						<p><span style="font-size:13pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif">The following person has sent inquire:</span></span></span></p>

						<p style="margin:0in 0in 8pt"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif">Full Name:&nbsp;'.$FullName.'</span></span></span></p>

						<p style="margin:0in 0in 8pt"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif">Email:&nbsp;'.$Email.'</span></span></span></p>

						<p style="margin:0in 0in 8pt"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif">Phone:&nbsp;'.$Phone.'</span></span></span></p>

						<p style="margin:0in 0in 8pt"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif; ">Company:&nbsp;'.$Company.'</span></span></span></p>

						<p style="margin:0in 0in 8pt"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif">Comments:&nbsp;'.$Comments.'</span></span></span></p>
						
						</td>
					</tr>
					<tr>
						<td style="background-color:#a6ce39; background:#a6ce39; color:#333; padding:10px; text-align:center">&copy; 2018 OpenEyes Software Solutions Pvt. Ltd. - All rights reserved.</td>
					</tr>
				</tbody>
			</table>
			
			';
			$mail->AddAddress(INQUIRETO);
			
			if(!$mail->Send())
			{
				?><script>
						setTimeout(function() {
							swal({
								title: "Something went wrong. Try again later.",
								type: "error",
								showConfirmButton: true,
							}, function() {
								window.location = "";
							});
						}, 0);
					</script>
		 		<?php
			}
			
			
			//------------------------------------------------
			
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = HOST;
				$mail->Port = PORT;
				$mail->IsHTML(true);
				//$mail->FromName = FROMNAME; 
				$mail->Username = USERNAME;
				$mail->Password = USERPASSWORD;
				$mail->SetFrom('info@theopeneyes.in','OpenEyes Software Solutions Pvt. Ltd.');
									
			$mail->Subject = "Thank you for enquiry - OpenEyes Software Solutions Pvt. Ltd.";
			$mail->Body = '
			<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid rgb(120, 120, 120); color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">
				<tbody>
					<tr>
						<td style="background-color:rgba(180, 180, 180, 0.5); border-bottom:5px solid #0061af; padding:10px"><a href="http://www.theopeneyes.com" target="_blank"><img alt="The OpenEyes Software Solution Logo" src="http://www.theopeneyes.com/images/logo-email.png" /></a></td>
					</tr>
					<tr>
						<td style="padding:10px">
							<h1 style="font-family:Calibri,sans-serif;">Thank you for your enquiry</h1>
							<h3 style="font-family:Calibri,sans-serif;">Your message has been sent successfully.</h3>
							<p></p>
							<p style="font-family:Calibri,sans-serif">Thank you for your enquiry. It has been forwarded to the relevant department and will be dealt with as soon as possible. If your inquiry is urgent, please use the contact number provided in <a href="http://www.theopeneyes.in/">website</a>.</p>
							<p></p>
							<p style="font-family:Calibri,sans-serif">Kindly,<br><strong>OpenEyes Software Solutions Pvt. Ltd.</strong></p>
						</td>
					</tr>
					<tr>
						<td style="background-color:#a6ce39; background:#a6ce39; color:#333; padding:10px; text-align:center">&copy; 2018 OpenEyes Software Solutions Pvt. Ltd. - All rights reserved.</td>
					</tr>
				</tbody>
			</table>
			
			';
			$mail->AddAddress($Email);
			
			if(!$mail->Send())
			{
				?><script>
						setTimeout(function() {
							swal({
								title: "Something went wrong. Try again later.",
								type: "error",
								showConfirmButton: true,
							}, function() {
								window.location = "";
							});
						}, 0);
					</script>
		 		<?php
			}
			else
			{	
				?><script>
            // alert("Thank you for your enquiry");
						setTimeout(function() {
							swal({
								title: "Thank you for your enquiry",
								type: "success",
								showConfirmButton: false,
								timer: 5000,
							}, function() {
								window.location = "";
							});
						}, 0);
					</script>
				<?php
			}
			
	} else {
		?><script>
				setTimeout(function() {
					swal({
						title: "Something went wrong. Try again later.",
						type: "error",
						showConfirmButton: true,
					}, function() {
						window.location = "";
					});
				}, 0);
			</script>
		<?php
	}
}}
?>




<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons -->
<link type="image/x-icon" rel="shortcut icon" href="images/favicon.ico" />

<title>OpenEyes Software Solutions Pvt. Ltd. (OPC)</title> 

<!-- Styles -->
<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"/>
<link href="css/style.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/timeline.css">
<link type="text/css" rel="stylesheet" href="css/flaticon.css" />
<link type="text/css" rel="stylesheet" href="css/sweetalert2.min.css" />
</head>
<body class="body-full-page">
    
    <div class="loader"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>

    <!-- Content CLick Capture-->

    <div class="click-capture"></div>

    <!-- Sidebar Menu-->

    <div class="menu"> 
      <span class="close-menu icon-cross2 right-boxed"></span>
		<div class="contact-info menu-list">
			<form action="" method="post" id="inquireform">
			  <div class="row">
			  <h2>Inquire Now</h2>
				<div class="form-group col-sm-6">
                  <input type="text" name="FullName" placeholder="Full Name*" pattern="[A-Za-z\/\s\.']{2,100}" required maxlength=100 oninvalid="this.setCustomValidity('Please enter valid Name')" oninput="setCustomValidity('')">
                  <input type="text" name="MiddleName" id="MiddleName"/>
				</div>
				<div class="form-group col-sm-6">
				  <input type="text" name="Company" placeholder="Company" maxlength=100>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-sm-6">
				  <input type="email" name="Email" placeholder="Email*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength=50 required oninvalid="this.setCustomValidity('Please enter your Email Address in valid format')" oninput="setCustomValidity('')">
				</div>
				<div class="form-group col-sm-6">
				  <input type="text" name="Phone" placeholder="Phone*" pattern="[0-9\-.\s]{10,}" maxlength=13 required oninvalid="this.setCustomValidity('Please enter your Phone Number in xxx.xxx.xxxx format')" oninput="setCustomValidity('')">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-sm-12">
				  <textarea name="Comments" placeholder="Message*" required oninvalid="this.setCustomValidity('Please enter Message')" oninput="setCustomValidity('')"></textarea>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-6">
                    <div class="g-recaptcha" data-sitekey="6LeGjHIUAAAAAJuV7KL2aoMQpKbgpdpR46TsWLJL"></div>
                    <span class='inquire_error' style="display:none; font-size:12px; color:red;">Captcha is Required.</span>
                </div>
                <div class="clearfix"></div>
				<div class="col-sm-12 col-sm-6">
                    <button type="submit" id="inquiry_submit" name="inquire_submit" class="btn">Submit</button>
                </div>
			  </div>
			</form>
		</div>
    </div>

    <!-- Navbar -->
<header class="navbar navbar-2 navbar-white boxed">
      <div class="navbar-bg"></div>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
		<a class="inquire_now">Inquire Now</a>
      </button>
      <a class="brand" href="#">
        <img class="brand-img" alt="" src="images/brand.png">
      </a>
    </header>
    
    <div class="pagepiling">
		<div data-anchor="welcomeoess" class="pp-scrollable text-white section section-1">
			<div class="scroll-wrap">
				<!-- <div class="section-bg" style="background-size: cover!important;background:url(images/bg/bg.jpg);"></div> -->
			    <video class="video-fluid" autoplay loop muted>
					<source src="assets/videos/explore.mp4" type="video/mp4">
					<source src="assets/videos/explore.webm" type="video/webm">
				</video>
				
				<div class="video_content">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="video_desc">
									<h5>welcome to</h5>
									<h2 class="title-uppercase text-white">OpenEyes Software Solutions Pvt. Ltd.</h2>
									<p>This could be the beginning of a beautiful relationship.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <div data-anchor="aboutoess" class="pp-scrollable section section-2">
        <div class="scroll-wrap">
          <div class="scrollable-content">
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="vertical-title text-dark hidden-xs hidden-sm"><span>who we are</span></div>
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <div class="row">
					  <div class="col-md-12">
                          <h2 class="title-uppercase text-white">about us</h2>
					  </div>
                        <div class="col-md-5 col-lg-5">
						<div class="section_aboutus">
                          <h2 class="title-uppercase">Make every detail<br> <span class="text-primary">perfect &amp; limit</span> the number of details to perfect.</h2>
                        </div>
						</div>
                        <div class="col-md-7 col-lg-7">
                          <div class="section_aboutus">
                          <p>At OpenEyes, we pride ourselves on offering our customers responsive, comptent and excellent services.</p>
						  <p>Our customers are the most important part of our business, and we work tirelessly to ensure your complete satisfaction, now and even ever after.</p>
						  <p>Our staffs of highly qualified professionals, with our new internal knowledge base system, ensure that deliveries of products are achieved within the time limits, without inconvenience or damage.</p>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div data-anchor="ourwork" class="pp-scrollable text-white section section-3">
        <div class="scroll-wrap">
          <div class="bg-changer">
            <div class="section-bg" style="background-size: cover!important;background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg/afpbg.jpg) no-repeat;"></div>
            <div class="section-bg" style="background-size: cover!important;background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg/atdbg.jpg) no-repeat;"></div>
            <div class="section-bg" style="background-size: cover!important;background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg/lfbbg.jpg) no-repeat;"></div>
            <div class="section-bg" style="background-size: cover!important;background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg/allibg.jpg) no-repeat;"></div>
            <div class="section-bg" style="background-size: cover!important;background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg/tedxbg.jpg) no-repeat;"></div>
            <div class="section-bg" style="background-size: cover!important;background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url(images/bg/aerebg.jpg) no-repeat;"></div>
          </div>
          <div class="scrollable-content">
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="vertical-title hidden-xs hidden-sm"><span>what we do</span></div>
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="title-uppercase text-white">our work</h2>
                          <div class="row-project-box row">
                            <div class="afp col-project-box col-sm-6 col-md-2 col-lg-2">
                              <a href="http://theopeneyes.com/afp_detail" target="_blank" class="project-box">
                                <div class="project-box-inner">
                                  <h5>AFP</h5>
                                  <div class="project-category">Assessment Tool</div>
                                </div>
                              </a>
                            </div>
                            <div class="atd col-project-box col-sm-6 col-md-2 col-lg-2">
                              <a href="http://theopeneyes.com/atd_detail" target="_blank" class="project-box">
                                <div class="project-box-inner">
                                  <h5>ATD</h5>
                                  <div class="project-category">Assessment Tool</div>
                                </div>
                              </a>
                            </div>
                            <div class="lfb col-project-box col-sm-6 col-md-2 col-lg-2">
                              <a href="http://theopeneyes.com/learnfeedback_detail" target="_blank" class="project-box">
                                <div class="project-box-inner">
                                  <h5>Learn Feedback</h5>
                                  <div class="project-category">Straehle Feedback Inventory</div>
                                </div>
                              </a>
                            </div>
                            <div class="alli col-project-box col-sm-6 col-md-2 col-lg-2">
                              <a href="http://theopeneyes.com/allinstitute_detail" target="_blank" class="project-box">
                                <div class="project-box-inner">
                                  <h5>All Institute</h5>
                                  <div class="project-category">Coaching Services</div>
                                </div>
                              </a>
                            </div>
                            <div class="ted col-project-box col-sm-6 col-md-2 col-lg-2">
                              <a href="http://theopeneyes.com/tedxtysons_detail" target="_blank" class="project-box">
                                <div class="project-box-inner">
                                  <h5>TedxTysons</h5>
                                  <div class="project-category">Coaching Services</div>
                                </div>
                              </a>
                            </div>
                            <div class="aere col-project-box col-sm-6 col-md-2 col-lg-2">
                              <a href="http://theopeneyes.com/aere_detail" target="_blank" class="project-box">
                                <div class="project-box-inner">
                                  <h5>AERE</h5>
                                  <div class="project-category">Event</div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div data-anchor="ourservices" class="pp-scrollable text-white section section-6">
        <div class="scroll-wrap">   
		<div class="section-bg" style="background:url(images/bg/bg3.jpg);"></div>		
          <div class="scrollable-content">
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="vertical-title hidden-xs hidden-sm"><span>WHAT WE DO</span></div>
                <div class="boxed">
                  <div class="container">
                    <div class="intro">
                      <div class="row">
					  <div class="col-md-12">
                          <h2 class="title-uppercase text-white">our services</h2>
					  </div>
                        <div class="col-md-4">
                          <div class="col-resume">
                            <h6 class="resume-title">
                              CUSTOM SOFTWARE DEVELOPMENT
                            </h6>
                            <div class="resume-content">
                              <div class="resume-inner">
                                <div class="resume-row">
                                  <p class="resume-study">We render web development services that combine technology with business concepts to help make your website user friendly. With expertise in PHP, MySQL, JavaScript, AJAX, CodeIgnitor, Wordpress, MODX and Joomla, our web developers create for you the website.</p>
								  <ul class="resume-type">
									<li title="Angular" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/angular.png"></li>
									<li title="Codeigniter" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/codeigniter.png"></li>
									<li title="HTML" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/html.png"></li>
									<li title="Bootstrap" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/bootstrap.png"></li>
									<li title="CSS" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/css.png"></li>
								  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-resume">
                            <h6 class="resume-title">
                              MOBILE APP DEVELOPMENT
                            </h6>
                            <div class="resume-content">
                              <div class="resume-inner">
                                <div class="resume-row">
                                  <p class="resume-study">With the advent of mobile technology, apps development industry has seen dramatic changes. At OpenEyes Technologies, we have trained app developers who have hands on experience in developing mobile apps for all kinds of platform, including Android and iOS.</p>
								  <ul class="resume-type">
									<li title="iOS" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/ios.png"></li>
									<li title="Android" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/android.png"></li>
								  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-resume">
                            <h6 class="resume-title">
                              UI/UX DESIGN STRATEGIES
                            </h6>
                            <div class="resume-content">
                              <div class="resume-inner">
                                <div class="resume-row">
                                  <p class="resume-study">Website is often the first impression customers see of your company, and with our web designing services we ensure you can give your best. With the help of modern design tools our web designers create appealing, exclusive designs that let you stand out from the crowd.</p>
								  <ul class="resume-type">
									<li title="inVision" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/invision.png"></li>
									<li title="Photoshop" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/photoshop.png"></li>
								  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-resume">
                            <h6 class="resume-title">
                              QUALITY ANALYSIS
                            </h6>
                            <div class="resume-content">
                              <div class="resume-inner">
                                <div class="resume-row">
                                  <p class="resume-study">Unrivalled quality is the motto of our company and IT services provided by us are in-line with the industry standards. With the help of manual testing and automatic testing, our quality analysts check the websites to ensure proper functionality. </p>
								  <ul class="resume-type">
									<li title="Jira" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/jira.png"></li>
								  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-resume">
                            <h6 class="resume-title">
                              CLOUD COMPUTING
                            </h6>
                            <div class="resume-content">
                              <div class="resume-inner">
                                <div class="resume-row">
                                  <p class="resume-study">Cloud computing is shared pools of configurable computer system resources and higher-level services that can be rapidly provisioned with minimal management effort, often over the Internet.</p>
								  <ul class="resume-type">
									<li title="Amazon Web Service" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/AWS.png"></li>
								  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-resume">
                            <h6 class="resume-title">
                              DATA ANALYTICS
                            </h6>
                            <div class="resume-content">
                              <div class="resume-inner">
                                <div class="resume-row">
                                  <p class="resume-study">Data analysis is a process of inspecting, cleansing, transforming, and modeling data with the goal of discovering useful information, informing conclusions, and supporting decision-making.</p>
                                  <ul class="resume-type">
									<li title="Slack" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/slack.png"></li>
									  <li title="Jira" data-toggle="tooltip" data-placement="top"><img alt="" class="img-responsive" src="images/services/jira.png"></li>
								  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div data-anchor="ourclients" class="pp-scrollable section section-4">
        <div class="scroll-wrap">
          <div class="scrollable-content">
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="vertical-title text-dark hidden-xs hidden-sm"><span>Our Clients</span></div>
                <div class="boxed">
                  <div class="container">
                    <div class="intro overflow-hidden">
                      <div class="row">
                        <div class="col-md-12">
						<h2 class="title-uppercase text-white">Our Clients</h2>
                          <div class="row-partners">
                            <div class="col-partner">
                              <div class="partner-inner"><a href="http://assessment.afponline.org" target="_blank"><img alt="" class="img-responsive" src="images/partners/afp.png"></a></div>
                            </div>
                            <div class="col-partner">
                              <div class="partner-inner"><a href="http://allinstitute.aerexperts.com" target="_blank"><img alt="" class="img-responsive" src="images/partners/all.png"></a></div>
                            </div>
                             <div class="col-partner">
                              <div class="partner-inner"><a href="http://atd.devbyopeneyes.com" target="_blank"><img alt="" class="img-responsive" src="images/partners/atd.png"></a></div>
                            </div>
                            <div class="col-partner">
                              <div class="partner-inner"><a href="http://learnfeedback.com" target="_blank"><img alt="" class="img-responsive" src="images/partners/lf.png"></a></div>
                            </div>
                            <div class="col-partner">
                              <div class="partner-inner"><a href="http://www.aerexperts.com" target="_blank"><img alt="" class="img-responsive" src="images/partners/aere.png"></a></div>
                            </div>
                            <div class="col-partner">
                              <div class="partner-inner"><a href="https://www.tedxtysons.com" target="_blank"><img alt="" class="img-responsive" src="images/partners/ted.png"></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div data-anchor="contactus" class="pp-scrollable section section-6">
        <div class="scroll-wrap">
		<div class="section-bg" style="background-size: cover!important;background:url(images/bg/banner.jpg);"></div>
          <div class="scrollable-content">
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="vertical-title text-dark hidden-xs hidden-sm"><span>contact</span></div>
                <div class="boxed">
                  <div class="container">
                    <div class="intro overflow-hidden">
                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="title-uppercase">Get In Touch</h2>                          
                        </div>
						<!-- Map Section -->
						<div class="footer map_content">
						  <div class="map footer_top">
							  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="usa_add1"><div class="country_logo"><img alt="" src="images/united-states-of-america.png"></div><strong>USA</strong><p>46907 Wesleyan Ct<br>Sterling VA 20164</p><p>Telephone : <a href="tel:+1 703.957.9525">+1 703.957.9525</a><br>Email : <a href="mailto:virginia@theopeneyes.com">virginia@theopeneyes.com</a></p></div></div>
							  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="usa_add2"><div class="country_logo"><img alt="" src="images/united-states-of-america.png"></div><strong>USA</strong><p>1629 K St NW #300<br>Washington DC 20006</p><p>Telephone : <a href="tel:+1 202.349.5858">+1 202.349.5858</a><br>Email : <a href="mailto:dc@theopeneyes.com">dc@theopeneyes.com</a></p></div></div>
							  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="india_add"><div class="country_logo"><img alt="" src="images/india.png"></div><strong>INDIA</strong><p>#405, 4th Floor, Iscon Atria 1<br>Gotri Road, Vadodara 390021</p><p>Telephone : <a href="tel:+91 265.298.EYES">+91 265.298.EYES</a><br>Email : <a href="mailto:info@theopeneyes.com">info@theopeneyes.com</a></p></div></div>				   
						  </div>
						  <div class="clearfix"></div>
						  <div class="title_sponser">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img class="img-responsive" alt="" src="images/microsoft-iso.png">
							</div>
						  </div>
						  <div class="clearfix"></div>
						  <div class="footer_bottom">
							<div class="col-md-9 col-sm-9 text-left">Copyrights &copy; 2018 OpenEyes Software Solutions Pvt. Ltd. (OPC)</div>
							<div class="col-md-3 col-sm-3 text-right">
								<ul class="social_links">
									<li><a href="https://twitter.com/OpenEyesTech" target="_blank"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
									<li><a href="https://www.linkedin.com/company/13243146/" target="_blank"><i class="flaticon-linkedin"></i></a></li>
								</ul>
							</div>
						  </div>
						</div>
						<div class="clearfix"></div>
						<!-- End Map Section --> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modals success -->

  <div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
            <h2 class="modal-title">Thank you</h2>
            <p class="modal-subtitle">Your message is successfully sent...</p>
          </div>
        </div>
    </div>
  </div>

  <!-- Modals error -->

  <div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
             <h2 class="modal-title">Sorry</h2>
            <p class="modal-subtitle"> Something went wrong </p>
          </div>
        </div>
    </div>
  </div>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

<script src="js/smoothscroll.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.pagepiling.js"></script>
<!-- Scripts -->
<script>
// Form Recapcha

$("#inquiry_submit").click(function(){
	 var recaptcha = document.forms["inquireform"]["g-recaptcha-response"];
	recaptcha.required = true;
	recaptcha.oninvalid = function(e) {
		$(".inquire_error").css("display", "block"); 
   };
})

// End Form Recapcha
</script>
<script src="js/scripts.js"></script> 
<script src="js/index.js"></script>
</body>
</html>