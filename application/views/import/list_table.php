<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<link href="<?php echo $this->config->item('css_path');?>import.css?v=<?php echo  $this->config->item('version');?>" rel="stylesheet" type="text/css" />
	</head>
	<body>
		选择数据表：
		<select name="table" id="table" >
			<?php
			foreach($tables as $t)
			{
				echo '<option value="'.$t.'">'.$t.'</option>';
			} 
			?>
		</select>
        <button onclick="save();">Save</button>
		<table id="js_table">
<?php
foreach ($objWorksheet->getRowIterator() as $key => $row) {
  echo '<tr>' . "\n";
		
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops all cells,
                                                     // even if it is not set.
                                                     // By default, only cells
                                                     // that are set will be
                                                     // iterated.过滤空值，请设置 为TRUE
  echo '<td width="20" height="25"><input type="checkbox" value="" name="sel[]"/></td>' ,"\n";													 
  foreach ($cellIterator as $cell) {
	echo '<td width="20" height="25">' . $cell->getValue() . '</td>' , "\n";
  }
  
  echo '</tr>' . "\n";
}
?>
		</table>
		<script>
			var $tab = $('#js_table');

			$(function(){
				//删除列功能
				// addtr($tab);
				// $tab.find('tr:eq(0) td').append('<span class="red del"><a href="javascript:;">x</a></span>');
				// $('.red.del').click(function(){
				// 	var inx = $(this).parents('tr').find('td').index($(this).parent('td')) + 1;
				//	$tab.find("tr>td:nth-child(" + inx + ")").remove();
				// });
			});
			$('#table').change(function(){
				$.get('import/get_fields/'+$(this).val(), function(res){
					var r = $.parseJSON(res);
					add_sel(r);
				});
			});
			
			function add_sel(options){
				if(!options || !options.length) return;
				arrayObj = new Array();
				var html = '<select name="field"><option value="">请选择</option>';
				for(i=options.length-1;i>=0;i-=1){
					html += '<option value="'+options[i]+'">' + options[i] + '</option>';
				}
				html += '</select>';
				$('#field_data').remove();
				addtr($tab, 'field_data');
				$tab.find('tr:eq(0) td:gt(0)').append(html);
				$tab.find('tr:eq(0) td:eq(0)').append('<input type="checkbox" onclick="sel_all(this);" />');
				$tab.find('tr:eq(0) select').change(function(){
					var val = $(this).val();
					if (val && is_dup(val)) {
						alert('选择重复，重新选择');
						$(this).val('');
						return
					}
				});
			}
			
			//检查选择字段不能重复
			function is_dup(val){
				var i=0;
				$tab.find('tr:eq(0) select').each(function(k,o){
					if(o.value && (o.value == val)){
						i+=1;
					}
				});
				return i>1;
			}
			//加空行
			function addtr($table, id){  
		     	var tr = $table.find('tr:eq(0)').clone();   
		     	//tr.appendTo($table); 
				tr.attr('id', id ||'jclone');  
		        tr.insertBefore($table.find('tr:first'));  
				$table.find('tr:eq(0) td').empty();
		   }  
		   //sel_all
		   function sel_all(obj){
			  $tab.find('input:checkbox').attr('checked', $(obj).attr('checked'));
		   }
		   
		   function save(){
                var field_set = 0;
		   		var data = {field:{}, row:[],table:$("#table").val()};
		   		$tab.find('tr:eq(0) select').each(function(k, o){
					if(o.value){
						data.field[k] = o.value;
                        field_set = 1;
					}
				});
				$tab.find('tr:gt(0) input:checkbox').each(function(k, o){
					if($(o).attr('checked')){
						data.row.push(k);
					}
				});
                if(!data.row.length){
                    alert('请勾选要保存的数据行');
                    return
                }
                if(!field_set){
                    alert('请设置数据列对应关系');
                    return
                }
			
				$.post('import/save', data, function(res){
                    var r = $.parseJSON(res);
                    if(r.suc){
                        alert('save suc');
                    }else{
                        alert(r.msg);
                    }
				});
		   }
		</script>
	</body>
</html>
