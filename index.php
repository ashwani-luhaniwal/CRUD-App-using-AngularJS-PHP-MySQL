<?php
	include 'header.php';
?>

	<div class="welcome-wrapper">
		<div class="container">
			<div class="row">
				<p>Great! Let's get you trading and saving as soon as possible.</p>
				<div class="welcome-heading">What kind of company are you ?</div>
			</div>
			<div class="f-space10"></div>
			<div class="row">
				<div class="col-md-6 welcome-box1">
					<div class="business-image">Image</div>
					<div class="f-space10"></div>
					<button type="button" class="button orange styled" data-toggle="modal" data-target="#myModal">WE ARE A COMMERCIAL BUSINESS</button>
					<div class="f-space10"></div>
					<div class="descr">
						<p>If you need to make regular overseas payments for wages, or just need to know that when you send money overseas that it's secure, fast and at the best rates around, a Currencies Direct business account will give you everything you need.</p>
						<div class="f-space15"></div>
						<p class="sub-para">This kind of account is perfect for:</p>
						<div class="f-space15"></div>
						<ul>
							<li>Large international businesses</li>
							<li>Any business with UK or international offices</li>
							<li>Something something buzzword</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 welcome-box2">
					<div class="etailer-image">Image</div>
					<div class="f-space10"></div>
					<button type="button" class="button orange styled" data-toggle="modal" data-target="#myModal">I AM AN ONLINE SELLER</button>
					<div class="f-space10"></div>
					<div class="descr">
						<p>If you trade on worldwide marketplaces such as Amazon, you may not be aware of the huge savings available. If you use our E-tailer service to convert your overseas profits into your home currency, you could increase the profits you keep by 2%.</p>
						<div class="f-space15"></div>
						<p class="sub-para">This kind of account is perfect for:</p>
						<div class="f-space15"></div>
						<ul>
							<li>UK based marketplace sellers trading overseas</li>
							<li>International sellers keen to maximise profits</li>
							<li>Something something buzzword</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog modal-lg opt-reg">
    		<!-- Modal content-->
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<div class="reg-heading">How much time do you have ?</div>
      			</div>
      			<div class="modal-body">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="quick-box">
								<p class="subheading">I have time right now. I want to start trading online as soon as possible!</p>
								<p class="avg-time">Average time to complete: <span>15</span> minutes</p>
								<p>By giving us more details online, we can process your account faster.</p>
								<p>To complete this form you will need your <a href="#">business registration number</a>, <a href="#">VAT number</a>, and details on your <a href="#">shareholders/signatories.</a></p>
								<div class="f-space15"></div>
								<a href="cfx_register_s1.php?mode=full" class="button orange styled">GET STARTED</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="full-box">
								<p class="subheading">I'm in a bit of a rush, can you take my details and get back to me ?</p>
								<p class="avg-time">Average time to complete: <span>3</span> minues</p>
								<p>If you don't have much time, give us some details on who you are and how we can contact you, and we will follow up with you later.</p>
								<p>This means it might be a short time until your account is ready.</p>
								<div class="f-space15"></div>
								<a href="cfx_register_s1.php?mode=quick" class="button orange styled">LET'S GO!</a>
							</div>
						</div>
					</div>
      			</div>
    		</div>
  		</div>
	</div>

<?php
	include 'footer.php';
?>