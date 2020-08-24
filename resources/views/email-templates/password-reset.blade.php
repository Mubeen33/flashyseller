<!DOCTYPE html>
<html>
<head>
	<title>Password Reset Email</title>
	<style type="text/css">
		.body{
			width: 100%;
			margin: 0 auto;
			background: #ddd;
			padding:40px 20px
		}
		
		.body .header h3{
			text-align:center;
			font-size:35px;
		}
		
		.body .content p{
			font-size:18px;
		}
		.body .content .link-btn{
			margin-top: 30px;
		}
		
		.body .content .link-btn a{
			text-decoration: none;
			text-transform: uppercase;
			background: #7952b3;
			color: #fff;
			padding: 10px 20px;
			border-radius: 2px;
		}
		
		
		.body .footer{
			margin-top:100px
		}
		.body .footer p{
			text-align:center;
		}
		
		.body .social_links{
			display: flex;
			justify-content: center;
		}
		.body .social_links a{
			text-decoration: none;
			background: #878787;
			color: #fff;
			padding: 5px 10px;
			margin-right: 2px;
			border-radius: 3px;
		}
	</style>
</head>
<body>
	<section class="body">
		<div class="header">
			<h3>Flashybuy</h3>
		</div>

		<div class="content">
			<p><b>Hi, {{ $firstName }} {{ $lastName }}</b></p>
			<p>Your password reset link. Please click the button to reset password.</p>
			
			<div class='link-btn'>
				<a href='{{ $siteURL."/reset/passoword/".$token."/".$email }}'>Reset</a>
			</div>
		</div>

		<div class="footer">
			<p>Flashybuy - <?php echo date('Y');?> all rights reserved.</p>
			<div class="social_links">
				<a href="#">Facebook</a>
				<a href="#">Twitter</a>
				<a href="#">LinkedIn</a>
			</div>
		</div>
	</section>
</body>
</html>