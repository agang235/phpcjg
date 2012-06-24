<?php
$meta = array(
                //array('name' => 'robots', 'content' => 'no-cache'),
                //array('name' => 'description', 'content' => 'My Great Site'),
                //array('name' => 'keywords', 'content' => 'love, passion, intrigue, deception'),
                //array('name' => 'robots', 'content' => 'no-cache'),
                array('name' => 'Content-type', 'content' => 'text/html; charset='.$this->config->item('charset'), 'type' => 'equiv')
        );

echo doctype($this->config->item('doctype')); 
?>
<head>
    <?php echo meta($meta);?>
    <title><?php echo (isset($title) && $title) ? $title : $this->config->item('title');?>-<?php echo $this->config->item('site_name');?></title>
    <base href="<?php echo base_url(); ?>" />
	<link href="<?php echo $this->config->item('css_path');?>common.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->config->item('js_path');?>jquery.js?v=<?php echo $this->config->item('version');?>"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('js_path');?>common.js?v=<?php echo $this->config->item('version');?>"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('js_path');?>floatUI.js?v=<?php echo $this->config->item('version');?>"></script>
	<!-- shangxia START -->
	<script type="text/javascript">
	<!--
	jQuery(document).ready(function($){
		$('#topbar').next().next('div').prepend('<div id="shangxia"><div id="shang">↑</div><div id="comt" class="hide"></div><div id="xia">↓</div></div>');
		var s= $('#shangxia').offset().top;$(window).scroll(function (){$("#shangxia").animate({top : $(window).scrollTop() + s + "px" },{queue:false,duration:500});});
		$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
		$('#shang').click(function(){$body.animate({scrollTop: '0px'}, 400);});
		$('#xia').click(function(){$body.animate({scrollTop:$('#footer').offset().top}, 800);});
		$('#comt').click(function(){$body.animate({scrollTop:$('#comments').offset().top}, 800);});
	});
	-->
	</script>
	<!-- shangxia END -->