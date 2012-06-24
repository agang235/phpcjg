<?php
    $cats = Lib::get_cats();
	$menus = array( 
			array('url' => '', 'title' => '首页'),
			array('url' => 'label/3', 'title' => 'unready'),
			array('url' => 'label/16', 'title' => 'non-verified '),
			array('url' => 'label/7', 'title' => 'show'),
			array('url' => 'label', 'title' => '标签')
		);
	if($cats)
	{
		foreach($cats as $k=>$v)
		{
			$tmp['url'] = 'cat/'.$k;
			$tmp['title'] = $v;
			$menus[] = $tmp;
		}
	}
?>
<div id="topbar">
    <div class="all">

        <div class="fl">
        	<?php if(isset($menus)){foreach($menus as $menu){?>
				 <?php if(isset($tmp)) echo '|';$tmp = 1; ?>
	             <a class="mr5" href="<?php echo $menu['url']?>" ><?php echo $menu['title'];?></a>
			<?php }}?>
        </div>
		<div class="fr">
            <?php if($userinfo){ ?><span>您好,<span><?php echo $userinfo['username']; ?></span> <a href="auth/logout">退出</a><?php }else{ if ($this->config->item('allow_registration', 'tank_auth')){?><a href="auth/register" class="mr5">注册</a><?php }?><a href="auth/login">登录</a><?php }?>
        </div>
    </div>
</div>
</div>
<div class="gbh"></div>
