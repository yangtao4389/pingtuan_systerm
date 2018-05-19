<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\www\pingtuan_systerm/application/common\view\default\form\show.html";i:1511435629;}*/ ?>
<?php switch($type): case "readonly": ?>
		<input type="text" class="form-control" placeholder="<?php echo $title; ?>" name="<?php echo $field; ?>" id="<?php echo $field; ?>" value="<?php echo $value; ?>" autocomplete="false" readonly>
	<?php break; case "num": ?>
		<input type="text" style="width: auto;" placeholder="<?php echo $title; ?>" class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>" autocomplete="false" value="<?php echo $value; ?>">
	<?php break; case "decimal": ?>
		<input type="text" style="width: auto;" class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>" autocomplete="false" value="<?php echo $value; ?>">
	<?php break; case "text": ?>
		<input type="text" class="form-control" placeholder="<?php echo $title; ?>" name="<?php echo $field; ?>" id="<?php echo $field; ?>" autocomplete="false" value="<?php echo $value; ?>">
	<?php break; case "password": ?>
		<input type="password" class="form-control" placeholder="<?php echo $title; ?>" name="<?php echo $field; ?>" id="<?php echo $field; ?>" autocomplete="false" value="<?php echo $value; ?>">
	<?php break; case "textarea": ?>
	<textarea class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>"><?php echo $value; ?></textarea>
	<?php break; case "select": ?>

	<select class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>" style="width:auto;">
		<?php if(is_array($option) || $option instanceof \think\Collection || $option instanceof \think\Paginator): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<option value="<?php echo $key; ?>" <?php if($value !=='' && $key == $value): ?>selected<?php endif; ?>><?php echo $item; ?></option>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<?php break; case "bool": ?>
	<select class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>" style="width:auto;">
		<?php if(is_array($option) || $option instanceof \think\Collection || $option instanceof \think\Paginator): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<option value="<?php echo $key; ?>" <?php if($key == $value): ?>selected<?php endif; ?>><?php echo $item; ?></option>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<?php break; case "bind": ?>
	<select class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>" style="width:auto;">
		<?php if(is_array($option) || $option instanceof \think\Collection || $option instanceof \think\Paginator): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<option value="<?php echo $key; ?>" <?php if($key == $value): ?>selected<?php endif; ?>><?php echo $item; ?></option>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<?php break; case "checkbox": 
 if(!is_array($value) ){
        $value = explode(',', $value);
 }

 if(is_array($option) || $option instanceof \think\Collection || $option instanceof \think\Paginator): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<div class="checkbox-nice checkbox-inline">
			<input type="checkbox" name="<?php echo $field; ?>[]" id="<?php echo $field; ?>-<?php echo $key; ?>" value="<?php echo $key; ?>" <?php if(in_array($key, $value)): ?>checked<?php endif; ?>/>
			<label for="<?php echo $field; ?>-<?php echo $key; ?>"><?php echo $item; ?></label>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; break; case "radio": $value = isset($value) ? $value : 1; if(is_array($option) || $option instanceof \think\Collection || $option instanceof \think\Paginator): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<div class="radio radio-nice radio-inline">
			<input type="radio" name="<?php echo $field; ?>" id="<?php echo $field; ?>-<?php echo $key; ?>" value="<?php echo $key; ?>" <?php if($key == $value): ?>checked<?php endif; ?>/>
			<label for="<?php echo $field; ?>-<?php echo $key; ?>"><?php echo $item; ?></label>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; break; endswitch; ?>