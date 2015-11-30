/**
 * js  公共方法
 */
var bank = {
	'ABC' : '农业银行',
	'BJBANK' : '北京银行',
	'BOC' : '中国银行',
	'BSB' : '包商银行',
	'CCB' : '建设银行',
	'CEB' : '光大银行',
	'CIB' : '兴业银行',
	'CITIC' : '中信银行',
	'CMB' : '招商银行',
	'CMBC' : '民生银行',
	'COMM' : '交通银行',
	'GCB' : '广州银行',
	'GDB' : '广发银行',
	'HXBANK' : '华夏银行',
	'ICBC' : '工商银行',
	'JSBANK' : '江苏银行',
	'PSBC' : '中国邮政储蓄',
	'SHBANK' : '上海银行',
	'SPABANK' : '平安银行',
	'SPDB' : '浦发银行'
}
$(function(){
	$('.menu-title').bind('click',function(){
		var $o = $(this);
		var $next = $o.next();
		$('.menu-title').removeClass('menu-title-current');

		if($next.is(':hidden')){
			$o.addClass('menu-title-current');
			$o.parents('ul').siblings().find('.menu01').slideUp('normal');
			$next.addClass('menu-title-current').slideDown('normal');
		}else{
			$next.slideUp('normal');
			$o.parents('ul').next().find('.menu01').slideDown('normal');
			$o.parents('ul').next().find('.menu-title').addClass('menu-title-current');
		}
	});
})

/**
 * 登出
 * @return {[type]} [description]
 */
function logout(){
	layer.confirm('您确定退出系统吗？',function(){
		ajaxReturn(logoutUrl,{},null,function(res){
			if(res.status){
				window.location.href=loginUrl;
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	})
}

//导航高亮
function highlight_subnav(url){
	$('.menu-title').removeClass('menu-title-current');
	var $now = $('.menu').find('a[href="'+url+'"]');
	$now.parents('.menu01').prev().addClass('menu-title-current');
	$('.menu01').hide();
	$now.parents('.menu01').slideDown('normal');
    $now.addClass('current');
}

function jsonpReturn(url,data,callback){
	$.ajax({
		url:url,
		dataType : 'jsonp',
		data:data,
		success:function(res){
			if(typeof callback === 'function'){
				callback(res);
			}
		}
	});	
}

function ajaxReturn(url,data,before,callback,errBack){
	$.ajax({
		url : url,
		data : data,
		dataType : 'json',
		type : 'POST',
		cache : false,
		beforeSend : function(){
			if(typeof before === 'function'){
				before();
			}
		},
		success : function(res){
			if(typeof callback === 'function'){
				callback(res)
			}
		},
		error : function(){
			if(typeof errBack === 'function'){
				errBack();
			}
		}
	})
}