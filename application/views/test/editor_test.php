<?php $this->load->view('header_common'); ?>
<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>editor_config.js?v=<?php echo $this->config->item('version');?>"></script>
<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>editor_all.js?v=<?php echo $this->config->item('version');?>"></script>	
<link href="<?php echo $this->config->item('editor_path');?>themes/default/ueditor.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />

</head>
<body>
<form id="form" method="post" action="">
	<div>
		<label>Title:</lable>
		<input class="ip_text" type="text" name="title" maxlength="255" />
	</div>

	<div>
		<label>Ask:</lable>
		<textarea id="ask" name="ed2"></textarea>
	</div>
	
	<div>
		<label>Answer:</lable>
		<textarea id="answer" name="ed1"></textarea>
	<input type="submit" value='OK' />
	</div>
</form>
<script type="text/javascript">
        var editor = new baidu.editor.ui.Editor();
        editor.render("answer");
		
	    var editor_a1 = new baidu.editor.ui.Editor({
	        //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
	        toolbars:[['FullScreen', 'Source', 'Undo', 'Redo','Bold']],
	        //focus时自动清空初始化时的内容
	        autoClearinitialContent:true,
	        //关闭字数统计
	        wordCount:false,
	        //关闭elementPath
	        elementPathEnabled:false
	        //更多其他参数，请参考editor_config.js中的配置项
	    });
    	editor_a1.render( 'ask' );

</script>
</body>
</html>