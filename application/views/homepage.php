<?php echo $this->load->view('header');?>
abc
<img src="http://dz/static/image/smiley/comcom/17.gif" />
<div id="d" style="display:none;">
abc
</div>
<a href="javascript:;" onclick="lload();">long load</a>
<script>
function lload(){
    $('#d').toggle('slow');
    $.ajax({
        url: 'welcome/longload',
        type: 'get',
        data: 'abc',
        success: function(r){
            console.log(r);
        }
    });
}
</script>
<?php echo $this->load->view('footer');?>
