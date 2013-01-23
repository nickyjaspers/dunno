<html>
<head>	
	<title><?php echo $title ?> - Fietse</title>		
	<?php echo link_tag('css/styles.css'); ?>		
	
	<script type="text/javascript">
	//<![CDATA[
	base_url = '<?= base_url();?>';	
	//]]>
	</script>		
	
	<script type="text/javascript" src="http://localhost/dunno/js/jquery.js"></script>
	<script>
	function ShowRandomSaying(){	
		$('#random_saying').fadeTo(1500, 1);
		$.post(base_url + 'index.php/random_saying/', function(data) {
		  $('#random_saying').html(data); 
		});
		$('#random_saying').fadeTo(3500, 0);
	}
	
	$( document ).ready( function() {				
		// Show first random saying		
		ShowRandomSaying();
		// Enable random saying at specified time
		var tid = setInterval(ShowRandomSaying, 5000);
	});		
	</script>
	
</head>
<body>	
	<div id="wrapper">	
		<div id="random_saying">
		</div>
		<div id="header_static_links">		
		<?php 
		$image_properties_twitter = array(
				  'src' => 'images/twitter-bird-blue-on-white.png',
				  'alt' => 'twitter-bird-blue-on-white.png',				  
				  'width' => '30',
				  'height' => '30',
				  'title' => 'Please follow us!',
				  'border' => '0px',
		);
		echo anchor('https://twitter.com/fietse1', img($image_properties_twitter));
		
		$image_properties_mail = array(
				  'src' => 'images/mail-icon.png',
				  'alt' => 'mail-icon.png',				  
				  'width' => '30',
				  'height' => '30',
				  'title' => 'Please mail us!',
				  'border' => '0px',
		);
		?>
		<a href="mailto:fiets@moeha.nl"><?php echo img($image_properties_mail); ?></a>
		</div>
		<div id="main_content">
			<div id="user_logon">
				<?php
				if ($userLoggedIn == true)
				{					
					echo anchor('logoff', 'Logoff');
				}
				else
				{									
					echo form_open('logon');
				?>
						<label for="username">Username</label> 
						<input type="input" name="username" />

						<label for="password">Password</label>
						<input type="input" name="password" />
		
						<input type="submit" name="submit" value="Logon" />
						<div id="user_logon_errors"><?php echo validation_errors(); ?></div>
					</form>
				<?php
				}
				?>
			</div>		