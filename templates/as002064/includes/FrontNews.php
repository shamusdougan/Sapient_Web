<?php

$db = JFactory::getDbo();
$frontPageCategory = 8;
$db->setQuery('SELECT * FROM #__content WHERE catid='.$frontPageCategory.' order by ordering ASC');   
$articles = $db->loadObjectList();

$articleLinkArray = array(
	"Support" => "index.php/support-plans",
	"Cloud" => "index.php/cloud-services",
	"Upgrades" => "index.php/upgrades"
	
)
?>

<style>

.sap_articleContainer{
	width: 100%
}

.sap_articleTop{
	width: 100%; 
	height: 150px;
	position: relative;
	z-index: 2;
	background-image: url("/images/news_top.png");
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
}

img.sap_articleTopImage {
	width: 100px; 
	height: 100px;
	margin-top: 5px;
	border-style: none;
}

.sap_articleTopText{
	color: #5a5a5a; 
	font-weight: bold;
	clear: both;
	display: block;
	hover: 
}

.sap_articleMain{
	border:3px solid #FFFFFF; 
	padding:0px; 
	
	border-radius:25px;
	position: relative;
	top: -60px;
 	z-index: 1;
 	transition: background-color 0.5s ease;

}

.sap_articleMain:hover {
	background-color: #6d6d6d;
}


.sap_articleMainContentWrapper{
	
	
	overflow: hidden;
}



.sap_articleMainSpacer{
	height: 60px; 
	width: 5px
	
}

.sap_articleMainContent{
	padding: 10px;
	height: 140px;
	
}

.sap_ArticleMainContentSpacer{
	height: 50px;
	width: 100%;
	
}


#featured-row .sap_articleMainContent p{
	color: #ffffff;
	text-decoration: none;
	overflow: hidden;	
}



.sap_articleMainFooter{
	color: #ffffff;
	height: 50px;
	text-decoration: none;
}



 
#readmorebutton {
	background: #03ace4;
	border: 2px solid #eee;
	height: 38px;
	width: 125px;
	margin: 0px 0 0 0px;
	overflow: hidden;
	display: block;
	text-align: center;
	line-height: 38px;
	margin-left: auto;
	margin-right: auto;
	font-weight: bold;
	color: #FFFFFF;

	/*Rounded Corners*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;

	/*Gradient*/
	background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2));
	background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2));
	background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2));
	background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2));
	background-image: linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2));

	/*Shadow*/
	-webkit-box-shadow: 0px 3px 1px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 0px 3px 1px rgba(0, 0, 0, 0.2);
	box-shadow: 0px 3px 1px rgba(0, 0, 0, 0.2);


	/*Transition*/
	-webkit-transition: All 0.5s ease;
	-moz-transition: All 0.5s ease;
	-o-transition: All 0.5s ease;
	-ms-transition: All 0.5s ease;
	transition: All 0.5s ease;
 
  
}
 
 #readmorebutton:hover {
  background-color: #050064;
  
}


</style>



<?


echo "<div class='row-fluid'>";
foreach($articles as $article){
	
	$images = json_decode($article->images);
	$links = json_decode($article->urls);
	$title = $article->title;

	?>
	<div class='span4' >
		<div class='sap_articleContainer'>
			<div class='sap_articleTop'>
				<img class='sap_articleTopImage' style='border-style: none;' src='<?php echo "/".htmlspecialchars($images->image_fulltext); ?>'>
				<font class='sap_articleTopText' size='+1' ><?php echo $article->title; ?></font>
			</div>
			<div class='sap_articleMain'><a href='<?php echo htmlspecialchars($links->urla); ?>'>
				<DIV class='sap_articleMainSpacer'></DIV>
				<DIV class='sap_articleMainContentWrapper'>
					<DIV class='sap_articleMainContent' ><? echo $article->introtext; ?></DIV>
					<DIV class='sap_ArticleMainContentSpacer'></DIV>
				</DIV>
				<DIV class='sap_articleMainFooter'><a class="sap_buttonText" id="readmorebutton" href="<?php echo htmlspecialchars($links->urla); ?>">Read More</a></DIV>
			</a></div>
		</div>
	</div>
	
	<?
}
echo "</div>";




?>