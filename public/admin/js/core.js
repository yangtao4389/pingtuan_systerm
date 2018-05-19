
$(function() {
    //layer
	$(".openwin").click(function (e) {
        var ele = $(e.target);
        var w = ele.attr('w');
        var h = ele.attr('h');
        var title = ele.attr('title');
        console.log(title);
        layer.open({
            title: title !==undefined ? title :ele.text(),
            type: 2,
            maxmin: true,
            shadeClose: true,
            area: [w !==undefined ? w :'80%', h!==undefined ? h : '80%'],
            content:ele.attr('href')
        });
        console.log('debug............');
        return false;
    });
	//全选的实现
	$(".check-all").click(function() {
		$(".ids").prop("checked", this.checked);
	});
	$(".ids").click(function() {
		var option = $(".ids");
		option.each(function(i) {
			if (!this.checked) {
				$(".check-all").prop("checked", false);
				return false;
			} else {
				$(".check-all").prop("checked", true);
			}
		});
	});

	//ajax get请求
	$('.ajax-get').click(function() {
		var target;
		var that = this;
		if ($(this).hasClass('confirm')) {
			if (!confirm('确认要执行该操作吗?')) {
				return false;
			}
		}
		if ((target = $(this).attr('href')) || (target = $(this).attr('url'))) {
			$.get(target).success(function(data) {
				//var data = JSON.parse(data);
				if (data.code == 1) {
					if (data.url) {
						updateAlert(data.msg + ' 页面即将自动跳转~', 'success');
					} else {
						updateAlert(data.msg, 'success');
					}
					setTimeout(function() {
						if (data.url) {
							location.href = data.url;
						} else if ($(that).hasClass('no-refresh')) {
							$('#top-alert').find('button').click();
						} else {
							location.reload();
						}
					}, 1500);
				} else {
					updateAlert(data.msg);
 				}
			});

		}
		return false;
	});

	//ajax post submit请求
	$('.ajax-post').click(function() {
		var target, query, form;
		var target_form = $(this).attr('target-form');
		var that = this;
		var nead_confirm = false;
		if (($(this).attr('type') == 'submit') || (target = $(this).attr('href')) || (target = $(this).attr('url'))) {
			form = $('.' + target_form);

			if ($(this).attr('hide-data') === 'true') { //无数据时也可以使用的功能
				form = $('.hide-data');
				query = form.serialize();
			} else if (form.get(0) == undefined) {
				return false;
			} else if (form.get(0).nodeName == 'FORM') {
				if ($(this).hasClass('confirm')) {
					if (!confirm('确认要执行该操作吗?')) {
						return false;
					}
				}
				if ($(this).attr('url') !== undefined) {
					target = $(this).attr('url');
				} else {
					target = form.get(0).action;
				}
				query = form.serialize();
			} else if (form.get(0).nodeName == 'INPUT' || form.get(0).nodeName == 'SELECT' || form.get(0).nodeName == 'TEXTAREA') {
				form.each(function(k, v) {
					if (v.type == 'checkbox' && v.checked == true) {
						nead_confirm = true;
					}
				})
				if (nead_confirm && $(this).hasClass('confirm')) {
					if (!confirm('确认要执行该操作吗?')) {
						return false;
					}
				}
				query = form.serialize();
			} else {
				if ($(this).hasClass('confirm')) {
					if (!confirm('确认要执行该操作吗?')) {
						return false;
					}
				}
				query = form.find('input,select,textarea').serialize();
			}
			$(that).addClass('disabled').attr('autocomplete', 'off').prop('disabled', true);
			$.post(target, query).success(function(data) {
				//var data = JSON.parse(data);
				if (data.code == 1) {
					if (data.url) {
						updateAlert(data.msg + ' 页面即将自动跳转~', 'success');
					} else {
						updateAlert(data.msg, 'success');
					}
					setTimeout(function() {
						$(that).removeClass('disabled').prop('disabled', false);
						if (data.url) {

                                location.href = data.url;


						} else if ($(that).hasClass('no-refresh')) {
							$('#top-alert').find('button').click();
						} else {
                            console.log(data);
                            if(data.data=='parent_reload'){
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.location.reload();
                                parent.layer.close(index);


                            }else{
                                location.reload();
							}

						}
					}, 1500);
				} else {
					updateAlert(data.msg, 'danger');
					setTimeout(function() {
						$(that).removeClass('disabled').prop('disabled', false);
						 location.reload();

					}, 1500);
				}
			});
		}
		return false;
	});

	window.updateAlert = function(text, c) {
		if (typeof c != 'undefined') {
			var msg = $.messager.show(text, {
				placement: 'bottom',
				type: c
			});
		} else {
			var msg = $.messager.show(text, {
				placement: 'bottom'
			})
		}
		msg.show();
	};
});

/**
 * 置顶函数
 * @param  {[type]} obj [description]
 * @return {[type]}     [description]
 */
function go_to_top(obj){
	var scrTop = $(window).scrollTop();
	var windowTop = $(window).height();
	if ((windowTop-300)<scrTop){
		$("#"+obj).fadeIn("slow");
	}else{
		$("#"+obj).fadeOut("slow");
	}	
}