<script language='javascript'>

function changePage(select){
	
	document.location.href=select.value;
}

</script>



<style>

.sapient_footer_menu_mobile
{
	display:none;	
}
.sapient_footer_menu_wrapper{
	width: 100%;
	padding-left: 20px;
}

.sapient_footer_col
{
	width: 19%;
	float: left;
}

.sapient_footer_title
{
	font-size: 20px;
	line-height: 20px;
	color: white;
	
	
}

.sapient_footer_menu_top_level a, .sapient_footer_title a
{
	font-size: 18px;
	text-decoration: none;
	color: #FFFFFF;
}

.sapient_footer_menu_top_level a:hover
{
	font-size: 19px;
	text-decoration: none;
	color: #D1CFCD;
}

.sapient_footer_menu_sub_items a
{
	font-size: 12px;
	text-decoration: none;
	color: #FFFFFF;
}

.sapient_footer_menu_sub_items a:hover
{
	font-size: 13px;
	text-decoration: none;
	color: #D1CFCD;
}

@media screen and (max-width: 1200px)
{
	div.sapient_sitemap
	{
		width:600px;
		height: 200px;
		
	}
	
	div.sapient_footer_menu_top_level a
	{
		font-size: 12px;
	}
	
	div.sapient_footer_menu_top_level a:hover
	{
		font-size: 13px;
	}
	
	div.sapient_footer_menu_sub_items a
	{
		font-size: 10px;
	}
	
	.sapient_footer_menu_sub_items a:hover
	{
		font-size: 11px;
	}
	
	div.footer-container{
		width: 100%;
	}
	
	#sapient-footer-row{
		min-height: 275px;
	}
	
}

@media screen and (max-width: 930px)
{
	div.sapient_sitemap
	{
		clear: left;
		width: 100%;
	}
	
	#sapient-footer-row{
		min-height: 400px;
	}
	
	
}


@media screen and (max-width: 544px)
{

div.sapient_sitemap
	{
		height: 70px;	
	}

div.sapient_footer_menu_full
	{
	display: none;
	}

div.sapient_footer_menu_mobile
	{
	display: block;
	}

#sapient-footer-row{
		min-height: 300px;
	}
	
}


</style>


<?php


//Get the menu out of the database, strucute is flat :()
$menuObject = JFactory::getApplication()->getMenu();
$menuItems = $menuObject->getItems('menutype', 'mainmenu');

$topLevel = array();
$subMenus = array();
foreach($menuItems as $menuObjectItem)
	{
	if($menuObjectItem->parent_id == 1){
		$topLevel[] = $menuObjectItem;
		}
	else
		{
		$subMenus[$menuObjectItem->parent_id][] = $menuObjectItem;
		}
	}
	
$firstElement = array_shift($topLevel);
array_push($topLevel, $firstElement);


?>
<div class="sapient_footer_menu_wrapper">
	<div class='sapient_footer_title'>
	<a href="index.php">Sapient Technology Solutions - Site Map</A><br><br>
	</div>
	<div class='sapient_footer_menu_full'>

	<?php
	foreach($topLevel as $menuItem){ ?>
		<div class='sapient_footer_col sapient_footer_menu_top_level'><A Href='/index.php/<?php echo $menuItem->route; ?>'><?php echo $menuItem->title ?></A>
		<?php if(array_key_exists($menuItem->id, $subMenus)) 
			echo "<ul>";
			{
				foreach($subMenus[$menuItem->id] as $subItem){
					echo "<div class='sapient_footer_menu_sub_items'><a href='/index.php/".$subItem->route."'><li>".$subItem->title."</li></A></div>";
				}
			echo "</ul>";
			}
		
		
		?>
		
		</div>
		
		
	<?php }	?>
	</div>
	<div class='sapient_footer_menu_mobile'>
		<?php
			$activeID = $menuObject->getActive()->id;
			echo "<SELECT name='footer_menu Mobile' onchange='changePage(this)'>";
			foreach($topLevel as $menuItem)
				{ 
				$SELECTED = "";
				if($menuItem->id == $activeID){
					$SELECTED = "SELECTED";
					}
				echo "<option value='/index.php/".$menuItem->route."' ".$SELECTED.">".$menuItem->title."</OPTION>";
				if(array_key_exists($menuItem->id, $subMenus))
					{
					
					foreach($subMenus[$menuItem->id] as $subItem)
						{
							$SELECTED = "";
							if($subItem->id == $activeID)
								{
								$SELECTED = "SELECTED";
								}
							echo "<OPTION value='/index.php/".$subItem->route."' ".$SELECTED."> - ".$subItem->title."</OPTION>";
						}
					}
				}
			echo "</SELECT>";
		?>
		
	</div>
</div>		
		
