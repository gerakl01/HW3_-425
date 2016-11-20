<!DOCTYPE html>
<html>

<?php
	$image_rate="fresh.gif";
	$movie="tmnt";
	if (isset($_GET["film"])) {
	$movie = $_GET["film"]; 
	}
	
	function curPageURL() {
 $pageURL = 'http';
 //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"];
 }
 return $pageURL;
}
	?>

<head>

<?php
	
	
	foreach(glob("info/moviefiles/".$movie."/info.txt") as $filename){
	
	list($title,$years,$rating)=file($filename);
	
		  } 
		 
		 $cast_rate=(int)$rating;
		if ($cast_rate>60){
		$image_gif="fresh.gif";
		$image_png="freshbig.jpg";
		}
		else{
			$image_png="rottenbig.png";
		$image_gif="rotten.gif";}
		
		 ?>


<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> <?=$title ?> - Rancid Tomatoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css"href="info/movie.css">
        <link rel="shortcut icon" type="image/gif" href="<?=curPageURL()."/info/images/".$image_gif?>">
    </head>
    <body>
	
	
        <div class="banner"  ><div class="lineimages" >
		
		<img  src="<?=curPageURL()."/info/images/green.jpg"?>" alt="green">

		<img src="<?=curPageURL()."/info/images/banner.png"?>" alt="banner">
		<img src="<?=curPageURL()."/info/images/green.jpg"?>" alt="green">
		</div>
		
		
		</div>
        
		<br></br>
		
		<h1>  <?= $title ?>  ( <?= $years ?>)</h1> 
		
		
        <div id="overall">
		<div class="reviewsbar">
				
                   <img class="reviewsbarimg" src="<?=curPageURL()."/info/images/".$image_png?>" alt="overview"> 
                   <div id="rate"> <?= $rating ?>%</div>
                </div>
            <div id="Overview">
			 
                <img style=""src=<?= "/info/moviefiles/".$movie."/overview.png"?> alt="overview">
                <dl class="OverViewdl">
                  
					<?php foreach(glob("info/moviefiles/".$movie."/overview.txt") as $filename){
	
	$file=$filename;
	
	
		  }?> 
		  
		  <?php foreach(file($file) as $filename){
		  $info=explode(" ",$filename);       
		  
		 $trimmed =  strpos($info[0], ":") ;
		  $t=null;
		  for ($i=0;$i<=sizeof($info)-1;$i++) { 
		 
		 $t.=" ".$info[$i]; 
		  if (strpos($info[$i], ":")>0)
			  break;
		 }
		 
		 
		 ?>
		  
		
		  
		 <dt><?= substr($t,0,strpos($t,':')) ?></dt><dd> <?php $t=null; if (strcasecmp(substr($info[0],0,$trimmed),'STARRING')==0) {
		 
		
$str =substr($info[0],$trimmed+1,strlen( $info[0] )-1); 
$strlen = strlen( $str );?>
 <ul><li> <?=$str?> <?=substr($info[1],0,strpos( $info[1],"," )) ?> </li>

 

<?php 

$str =substr($info[1],0,strlen( $info[1] )-1); 
$strlen = strlen( $str );
$i=2;
$c="";
while( $i <= sizeof($info)-1) {
    $char = substr( $info[$i], strlen( $info[$i] )-1, strlen( $info[$i] )-1 );
	if (strcasecmp($char,',')==0||$i==sizeof($info)-1){
		$c= $c ." ". substr( $info[$i], 0, strlen( $info[$i])-1);
    ?>
		 <li><?= $c ?>  </li>
	<?php  $c=""; }  else {
		
			 
			 $c.= " ".substr( $info[$i], 0, strlen( $info[$i] ) );
		 }
			 ?> 
		 
		 
		 <?php  $i++;} ?> 
		  </ul> 
		 <?php } else if (strcasecmp(substr($info[0],0,$trimmed),'LINKS')!=0) {
			 
			 $concat=substr($info[0],strpos($t, ":"),strlen( $info[0] )); 
		   for ($i=1;$i<=sizeof($info)-1;$i++) { 
		 $concat.=" ".$info[$i]; } ?> 	
				 <?=substr($concat,strpos($concat, ":")+1,strlen( $concat )-1);  ?>	</dd>
		  <?php $concat=null;} 

		  else if (strcasecmp(substr($info[0],0,$trimmed),'LINKS')==0) { 
		  $link=array();
		  $link=$info;
		  
		   }} ?> 	
                    <dd>
                        <ul>
						
                            <li>
							
							 <?php 
							 if (sizeof($info)>1&&strcasecmp(substr($info[0],0,$trimmed),'LINKS')==0){
								 $href=substr($link[1],strpos($link[1],"=")+2,strlen($link[1])-1);
							 $h=substr($href,0,strpos($href,'"'));
							// $x->str_replace("LINKS:","",$link[0]);
							
							$x=substr($link[0],strpos($link[0],":")+1,strlen($link[0])-1);
                              $a=substr($link[1],strpos($link[1],">")+1,strlen($link[1])-1);
							  $text="";
							  for ($i=2;$i<sizeof($link);$i++){
								  
								  $text.=" ".$link[$i];
							  }
							  
							 
								 ?>
							 
							 <li><a href=<?="http://".$h?>><?=$x?></a><?=$a.$text?></li> 
							
							 <?php } ?>
                           
                        </ul>  
                    </dd>
                </dl>
            </div>
			
			<?php   $i=0;  foreach(glob("info/moviefiles/".$movie."/review*.txt") as $filename){
						
						$i++;
						
						
						
					} 
					
					
						$right=(int)($i/2);
						$left=$i-$right;
					
					
					?>
			
			
            <div id="reviews">
                
				
				
                <div class="reviewcol">
				
				         
				
					<?php $j=0; $f=0;  foreach(glob("info/moviefiles/".$movie."/review*.txt") as $filename){
						
						if ($j<$left){
						list($text,$image,$name,$company)=file($filename);
						$image=strtolower($image).".gif";
						?>
						
                    <div class="reviewquote">
					
					
					
					
                        <img class="likeimg" src="<?=curPageURL()."/info/images/".$image?>" alt="rotten">
						<?= $text?>
                         
                    </div>
					<div class="personalquote">
                        <img class="personimg" src="<?= curPageURL()?>/info/images/critic.gif" alt="critic">
                        <?=$name?><br>
                        <?=$company?>
                    </div>
			
						<?php   }else {break;}   $j++;}?>
                </div>
				
					
                <div class="reviewcol">
                   <?php $x=0; $f=0;  
				   foreach(glob("info/moviefiles/".$movie."/review*.txt") as $filename){
						
						if ($x>=$j){
						
						list($text,$image,$name,$company)=file($filename);
						$image=strtolower($image).".gif";
						
						
						
						?>
						
                    <div class="reviewquote">
					
					
					
					
                        <img class="likeimg" src="<?=curPageURL()."/info/images/".$image?>" alt="rotten">
						<?= $text?>
                         
                    </div>
					<div class="personalquote">
                        <img class="personimg" src="<?= curPageURL()?>/info/images/critic.gif" alt="critic">
                        <?=$name?><br>
                        <?=$company?>
                    </div>
			
						<?php   }  $x++;}?>
                </div>
           
					

		   </div> 
            <div id="bottombar">
                (1-<?=$i ?>) of <?=$i ?>
            </div>   
			<div class="reviewsbar">
				
                   <img class="reviewsbarimg" src="<?=curPageURL()."/info/images/".$image_png?>" alt="overview"> 
                   <div id="rate"> <?= $rating ?>%</div>
                </div>
        </div>
		
		
    
        <div id="w3ccheck">
            <a href="http://validator.w3.org/check/referer"><img src="<?=curPageURL()."/info/images/w3c-html.png"?>" alt="Valid HTML5"></a> <br>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="<?=curPageURL()."/info/images/w3c-css.png"?>" alt="Valid CSS"></a>
 
	
	</div>
 	<br></br>
	<br></br>
	<br></br>
 <div id="bottom2"  ><div class="lineimages" >
		
		<img  src="<?=curPageURL()."/info/images/green.jpg"?>" alt="banner">

		<img src="<?=curPageURL()."/info/images/banner.png"?>" alt="banner">
		<img src="<?=curPageURL()."/info/images/green.jpg"?>" alt="banner">
		
		</div>
</body></html>