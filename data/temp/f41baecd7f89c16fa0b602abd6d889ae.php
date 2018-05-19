<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\www\pingtuan_systerm/application/common\view\default\form\autoselect.html";i:1511498079;}*/ ?>
<div class="input-group">
    <input type="hidden" id="<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $value; ?>" />
    <input type="text" class="form-control" name="auto_<?php echo $field; ?>" id="auto_<?php echo $field; ?>" autocomplete="off" value=""
           placeholder="<?php echo $title; ?>"
            />
</div>
<script>
    $(document).ready(function() {
          var fid = "<?php echo $field; ?>";
          //若是编辑初始化
        $.getJSON('<?php echo $option; ?>',{ 'id':'<?php echo $value; ?>'},function (data) {
           $('#auto_'+fid).val(data.value);
        });
        $('#auto_'+fid).autocomplete({
            source:'<?php echo $option; ?>',
             select: function( event, ui ) {
                $("#"+fid).val(ui.item.id);
               console.log(ui.item);
                //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
            }
        });

    });
</script>