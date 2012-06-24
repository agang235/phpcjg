<div class="bbb">
			<?php echo form_open($this->uri->uri_string(),array(
			'methnd' => 'post',
			'class' => 'j_f'
			   ) ); ?>
		
			<div>
				<label>Name:</label>
				<input class="ip_text" type="text" name="label[name]" id="title" maxlength="255" value="<?php p($row['name']);?>" />
			</div>
		
			<div>
				<label>desc:</label>
				<textarea id="desc" name="label[desc]"><?php p($row['desc']);?></textarea>
			</div>
			
			<div>
				<span class="fl" id="ajax_res"></span>
				<input class="fr" type="submit" value="SAVE" id="js_submit" name="submit"/>
			</div>
		</form>
</div>