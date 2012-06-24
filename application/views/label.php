<?php echo $this->load->view('header_common'); ?>
<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCore.js?v=<?php echo $this->config->item('version');?>"></script>	
	<script type="text/javascript" src="<?php echo $this->config->item('js_path');?>jquery.simplemodal.js?v=<?php echo $this->config->item('version');?>"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('js_path');?>jquery.form.js?v=<?php echo $this->config->item('version');?>"></script>
	<link href="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCoreDefault.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->item('css_path');?>osx.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
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
		<li><a id="add_label" href="label/add">Add</a> <span>total:<?php echo count($list);?></span></li>
	</ul>
	
	<div class="j_list">
		<ul>
			<?php if(isset($list) && $list){ foreach($list as $k => $row){ ?>
			<li class="mt5">
				<span><?php echo $k+1;?></span>
				<div class="title">
					<a href="label/<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
				</div>
				<div class="cl">
					<div class="fl">
						<label>Description:</label>
						<?php echo $row['desc']; ?>
					</div>
					<div class="fr">
						<span class="fl mr10"><a onclick="del(this);return false;" href="label/del/<?php echo $row['id'];?>">del</a></span>
						<span class="fl mr5"><a href="label/edit/<?php echo $row['id'];?>">edit</a></span>
					</div>
				</div>
				<div><?php echo $row['answer']; ?></div>
				<div class="gbh"></div>
			</li>
			<?php }}else{?>
				<li><div>no data</div></li>
			<?php }?>
		</ul>
	</div>
<div id="osx-modal-content">
	<div id="osx-modal-title">OSX Style Modal Dialog</div>
	<div class="close"><a href="#" class="simplemodal-close">x</a></div>
	<div id="osx-modal-data">
	</div>
</div>   
</div>
<script>
	$(function(){
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
	
	
jQuery(function ($) {
	var OSX = {
		container: null,
		obj : "#osx-modal-content",
		init: function () {
			$("#add_label").click(function (e) {
				e.preventDefault();	
				$.get("label/add", function(data){
					// create a modal dialog with the data
					$('#osx-modal-data').html(data);
					$(OSX.obj).modal({
						overlayId: 'osx-overlay',
						containerId: 'osx-container',
						closeHTML: null,
						minHeight: 80,
						opacity: 65, 
						position: ['0',],
						overlayClose: true,
						onOpen: OSX.open,
						onClose: OSX.close
					});
				});
			});
		},
		open: function (d) {
			var self = this;
			self.container = d.container[0];
			d.overlay.fadeIn('slow', function () {
				$(OSX.obj, self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown('slow', function () {
					setTimeout(function () {
						var h = $("#osx-modal-data", self.container).height()
							+ title.height()
							+ 20; // padding
						d.container.animate(
							{height: h}, 
							200,
							function () {
								$("div.close", self.container).show();
								$("#osx-modal-data", self.container).show();
								$("#osx-modal-data input", self.container).select();
							}
						);
					}, 300);
				});
			})
		},
		close: function (d) {
			var self = this; // this = SimpleModal object
			d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
					self.close(); // or $.modal.close();
				}
			);
		}
	};

	OSX.init();

});
var options = { 
       // target:        '#ajax_res',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
}; 
function showRequest(formData, jqForm, options){
	return true;
}
function showResponse(res, sts, xhr, $form){
	var r = $.parseJSON(res);
	$('#ajax_res').html(r.msg);
	if(r.suc){
		$.modal.close();
		//window.location.reload();
	}
	
}
$('#osx-modal-content').click(function(e){
	if(e.target.id === 'js_submit'){//use ajax from
		$(e.target).parents('form').ajaxForm(options).submit();
	}
	return false;
});
</script>
<?php echo $this->load->view('footer'); ?>
