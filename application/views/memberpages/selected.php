<div id="SelectedHeader">
	<?php		
	$image_properties_selected = array(
		'src' => 'images/'.$selected_menu_item->small_icon,
		'alt' => $selected_menu_item->title,
		'width' => '50',
		'height' => '50',
		'title' => $selected_menu_item->title,
		'border' => '0px',
	);
	echo anchor(base_url().'index.php/member/selected/'. $selected_menu_item->id, img($image_properties_selected));
	echo ' '.$selected_menu_item->title;	
	?>
</div>

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
					'src' => 'images/'.$menu_item->small_icon,
					'alt' => $menu_item->title,
					'width' => '50',
					'height' => '50',
					'title' => $menu_item->title,
					'border' => '0px',
				);						
				echo anchor(base_url().'index.php/member/selected/'. $menu_item->id, img($image_properties_one));				
				?>		
			</div>				
		<?php
		}
		?>			
	</div>
	
	<div id="MenuItemSelectContent">
		<?php		
		
		?>
	</div>	
</div>
