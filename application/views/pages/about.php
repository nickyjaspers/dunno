about

<div id="MenuItemSelectedWrapper">
	<div id="MenuItemSelected">
	
		<!-- home page menu item, always at the same spot. -->
		<div class="MenuItemSelectedItem">
			<?php
			$image_properties_home = array(
				  'src' => 'images/home.png',
				  'alt' => 'Home',				  
				  'width' => '50',
				  'height' => '50',
				  'title' => 'Truuk!',
				  'border' => '0px',
			);						
			echo anchor(base_url().'index.php/member/home', img($image_properties_home));
			?>			
		</div>
		
		<!-- Now the rest of the menu items -->
		<?php
		foreach($all_menu_items as $key => $menu_item)
		{
		?>
			<div class="MenuItemSelectedItem">		
				<?php
				$image_properties_one = array(
					  'src' => 'images/real_one.png',
					  'alt' => 'Home',				  
					  'width' => '50',
					  'height' => '50',
					  'title' => 'Truuk!',
					  'border' => '0px',
				);						
				echo anchor(base_url().'index.php/member/home', img($image_properties_one));
				?>		
			</div>				
		<?php
		}
		?>			
	</div>
	
	<div id="MenuItemSelectContent">
		<?php		
		print_r($all_menu_items);
		echo '----';
		print_r($selected_menu_item);
		echo '----';
		print_r($page);
		?>
	</div>	
</div>
