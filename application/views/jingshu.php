<?php echo $this->load->view('header_common'); ?>
<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCore.js?v=<?php echo $this->config->item('version');?>"></script>	
<link href="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCoreDefault.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />

</head>
<body>
<?php echo $this->load->view('topbar'); ?>
<div class="w960">
    <h1>Welcome to phpcangjingge!</h1>
	
	<?php $msg = Lib::flash_out('msg');if($msg){?>
	<div class="message <?php echo  Lib::flash_out('suc')? 'suc': 'err';?>">
		<?php echo $msg; ?>
	</div>
	<?php } ?>
	
	<ul>
		<li><a href="jingshu/add">Add</a> <span>total:<?php echo count($list);?></span></li>
	</ul>
	
	<div class="j_list">
		<ul>
			<?php if(isset($list) && $list){ foreach($list as $k => $row){ ?>
			<li class="mt5">
				<span><?php echo $k+1;?></span>
				<div class="title cl">
					<a class="fl" href="jingshu/<?php echo $row['id'];?>"><?php p($row['title']);?></a>
					<div class="fr">
						<?php if($row['label'])
							  {
									$has_labels = explode(',', trim( $row['label'], ','));
									foreach($labels as $label)
									{
								  		if($has_labels && in_array($label['id'], $has_labels))
										{ ?>
					
						<span class="fl xmk label" ><a href="label/<?php echo $label['id'];?>"><?php echo $label['name']; ?></a></span>
						<?php }}}?>
						<span class="fl cat_name" ><a href="cat/<?php echo $row['cid'];?>"><?php $cats = Lib::get_cats();if(array_key_exists($row['cid'], $cats)){echo $cats[$row['cid']];}?></a></span>
					</div>
				</div>
				<div class="ask cl">
					<div class="fl">
						<?php echo $row['ask']; ?>
					</div>
					<div class="fr">
						<span class="fl mr10"><a onclick="del(this);return false;" href="jingshu/del/<?php echo $row['id'];?>">del</a></span>
						<span class="fl"><a href="jingshu/edit/<?php echo $row['id'];?>">edit</a></span>
					</div>
				</div>
				<div><?php echo (isset($is_detail)&& $is_detail) ? $row['answer']: fix_tag(mb_substr($row['answer'], 0, 200, 'UTF-8')); ?></div>
				<div class="gbh"></div>
			</li>
			<?php }}else{?>
				<li><div>no data</div></li>
			<?php }?>
		</ul>
	</div>
   
</div>
<script>
	$(function(){
		/*
		if ($('pre[class^=brush]').length > 0){
			$.getScript("/static/editor/third-party/SyntaxHighlighter/shCore.js", function() {
				SyntaxHighlighter.boot("/static/editor/third-party/SyntaxHighlighter/", {theme : "Default", stripBrs : true}, {});
			});
		}
		*/
		//为了在编辑器之外能展示高亮代码
	    SyntaxHighlighter.highlight();
	    //调整左右对齐
	    for(var i=0,di;di=SyntaxHighlighter.highlightContainers[i++];){
	            var tds = di.getElementsByTagName('td');
	            for(var j=0,li,ri;li=tds[0].childNodes[j];j++){
	                ri = tds[1].firstChild.childNodes[j];
	                ri.style.height = li.style.height = ri.offsetHeight + 'px';
	            }
	    }
	});
	
	function del(obj){
		if(confirm('Are you sure to delete ?')){
			$.post(obj.href, null, function(res){
				var r = $.parseJSON(res);
				if(r.suc){
					window.location.reload();
				}else{
					alert(r.msg);
				}
			});
		}
		return false;
	}
	
</script>
<?php echo $this->load->view('footer'); ?>
