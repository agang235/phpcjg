<?php $this->load->view('header_common'); ?>
	<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>editor_config.js?v=<?php echo $this->config->item('version');?>"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('js_path');?>jquery.simplemodal.js?v=<?php echo $this->config->item('version');?>"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('js_path');?>jquery.form.js?v=<?php echo $this->config->item('version');?>"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>editor_all.js?v=<?php echo $this->config->item('version');?>"></script>	
	<link href="<?php echo $this->config->item('editor_path');?>themes/default/ueditor.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCoreDefault.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCore.js?v=<?php echo $this->config->item('version');?>"></script>	
	<link href="<?php echo $this->config->item('editor_path');?>third-party/SyntaxHighlighter/shCoreDefault.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->item('css_path');?>osx.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
</head>
<body>
<?php echo $this->load->view('topbar'); ?>
	<div class="w960 cl">
		<?php echo form_open($this->uri->uri_string(),array(
			'methnd' => 'post',
			'class' => 'j_f'
			   ) ); ?>
		<div class="cl">
			<span class="fl"><a href="index.php">return</a></span>
			<span class="fr"><input class="fr" type="submit" value="SAVE" id="js_submit2" name="submit"/></span>
		</div>
		
		<?php $msg = Lib::flash_out('msg');if($msg){?>
		<div class="message <?php echo  Lib::flash_out('suc')? 'suc': 'err';?>">
			<?php echo $msg; ?>
		</div>
		<?php } ?>
			<div>
				<label>Category:</label>
				<?php 
					echo form_dropdown('jingshu[cid]', Lib::get_cats(), isset($row)?$row['cid']:5);
				?>
			</div>
   			<div class="cl">
				<label>Label:</label>
				<div>
					<input id="label" type="hidden" name="jingshu[label]" value="<?php echo $row['label'];?>" />
					<?php if($row['label']){$has_labels = explode(',', trim( $row['label'], ','));}?>
				</div>
				<div id="label_box">
					<?php foreach($labels as $label){ ?>
					<span class="<?php echo $has_labels && in_array($label['id'], $has_labels) ? 'xmk':'xrk';?> label" data="<?php echo $label['id'];?>"><?php echo $label['name']; ?></span>
					<?php }?>
				</div>
				<span class="xrk" id="add_label">+</span>
			</div>
			<div>
				<label>Title:</label>
				<input class="ip_text" type="text" name="jingshu[title]" id="title" maxlength="255" value="<?php p($row['title']);?>" />
			</div>
		
			<div>
				<label>Ask:</label>
				<span><a href="javascript:;"  id="shed">开关编辑器</a></span>
				<textarea  class="hide" id="ask" name="jingshu[ask]"><?php p($row['ask']);?></textarea>
			</div>
			
			<div>
				<label>Answer:</label>
				<textarea id="answer" name="jingshu[answer]"><?php p($row['answer']);?></textarea>
			</div>
			

			<div>
				<input class="fr" type="submit" value="SAVE" id="js_submit2" name="submit"/>
			</div>
		</form>
</div>
<div id="osx-modal-content">
	<div id="osx-modal-title">OSX Style Modal Dialog</div>
	<div class="close"><a href="#" class="simplemodal-close">x</a></div>
	<div id="osx-modal-data">
	</div>
</div>
<script type="text/javascript">
        var editor = new baidu.editor.ui.Editor({
	        //这里可以选择自己需要的工具按钮名称
	        toolbars: CUI.editor.simple_tool_bar,
	        //focus时自动清空初始化时的内容
	        autoClearinitialContent:false,
	        //关闭字数统计
	        wordCount:false,
	        //关闭elementPath
	        elementPathEnabled:false
	        //更多其他参数，请参考editor_config.js中的配置项
	    });
        editor.render("answer");
		
	    var editor_a1 = new baidu.editor.ui.Editor({
	        //这里可以选择自己需要的工具按钮名称
	        toolbars: CUI.editor.simple_tool_bar,
	        //focus时自动清空初始化时的内容
	        autoClearinitialContent:false,
	        //关闭字数统计
	        wordCount:false,
	        //关闭elementPath
	        elementPathEnabled:false
	        //更多其他参数，请参考editor_config.js中的配置项
	    });
    	
		
		$('#js_submit1,#js_submit2').click(function(){
			editor_a1.sync();
			editor.sync();
		});
		
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
				if($('#ask').val()){
					$('#ask').css('display','block');
					editor_a1.render( 'ask' );
				}
				$('#shed').click(function(){
					if(typeof editor_a1.container == 'undefined'){
						$('#ask').css('display','block');
						editor_a1.render( 'ask' );
					}else{
						$(editor_a1.container).toggle();
					}
					
				});
		});
		
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
$('.label').click(function(){
	label_click(this);
});
function label_click(obj){
	if($(obj).hasClass('xrk')){
		$(obj).removeClass('xrk')
				.addClass('xmk');
		modify_label($(obj).attr('data'), true);
	}else{
		$(obj).removeClass('xmk')
				.addClass('xrk');
		modify_label($(obj).attr('data'));
	}
}
function modify_label(id, isadd){
	var label = $('#label').val() || ',',find = ','+id+',',add=id+',';
	if(typeof isadd != 'undefined' && isadd){
		if(label.indexOf(find) == -1){//not exists
			label += add;
		}
	}else{
		label = label.replace(find, ',')
						.replace(/^,$/,'');
	}
	$('#label').val(label);
}

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
		new_label(r.id);
	}
	
}
$('#osx-modal-content').click(function(e){
	if(e.target.id === 'js_submit'){//use ajax from
		$(e.target).parents('form').ajaxForm(options).submit();
	}
	return false;
});
function new_label(id){
	$.get('label/ajax/'+id, function(data){
		$('#label_box')
			.append('<span  onclick="label_click(this);" class="xrk label" data="'+id+'">'+data+'</span>');
	});
}
</script>
<?php $this->load->view('footer'); ?>