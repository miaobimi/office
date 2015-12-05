/**
 * js  公共方法
 */
var bank = {
        "01100" : "中国工商银行",
        "01101" : "中国农业银行",
        "01102" : "招商银行",
        "01103" : "兴业银行",
        "01104" : "中信银行",
        "01106" : "建设银行",
        "01107" : "中国银行",
        "01108" : "交通银行",
        "01109" : "上海浦东发展银行",
        "01110" : "民生银行",
        "01111" : "华夏银行",
        "01112" : "光大银行",
        "01113" : "北京银行",
        "01114" : "广东发展银行",
        "01119" : "中国邮政储蓄",
        "01121" : "平安银行"
	// 'ABC' : '农业银行',
	// 'BJBANK' : '北京银行',
	// 'BOC' : '中国银行',
	// 'BSB' : '包商银行',
	// 'CCB' : '建设银行',
	// 'CEB' : '光大银行',
	// 'CIB' : '兴业银行',
	// 'CITIC' : '中信银行',
	// 'CMB' : '招商银行',
	// 'CMBC' : '民生银行',
	// 'COMM' : '交通银行',
	// 'GCB' : '广州银行',
	// 'GDB' : '广发银行',
	// 'HXBANK' : '华夏银行',
	// 'ICBC' : '工商银行',
	// 'JSBANK' : '江苏银行',
	// 'PSBC' : '中国邮政储蓄',
	// 'SHBANK' : '上海银行',
	// 'SPABANK' : '平安银行',
	// 'SPDB' : '浦发银行'
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

function goPage(){
  $('.pagination li').bind('click',function(){
    window.location.href=$(this).attr('pageurl');
  })
}

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

function ajaxReturn(url,data,before,callback,errBack,async){
      if(typeof async == 'undefined'){
            var async = true;
      }
	$.ajax({
		url : url,
		data : data,
		dataType : 'json',
		type : 'POST',
		cache : false,
            async: async,
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

/* 
* 时间格式化 
* strDateTime:需要格式化的字符串时间 
* intType：格式化类型 
*/
function formatDateTime(strDateTime, intType) {
	var years, month, days, hours, minutes, seconds;
      var newDate, arrDate = new Array(), arrTime = new Array();

      try {
            if (strDateTime != undefined && strDateTime != null && strDateTime != "") {
                  //获取日期和时间数组  
                  if (strDateTime.toString().indexOf("-") != -1) {
                        var item = strDateTime.split(" ");
                        arrDate = item[0].toString().split("-");
                        arrTime = item[1].toString().split(":");
                  } else if (strDateTime.toString().indexOf("/") != -1) {
                        var item = strDateTime.split(" ");
                        arrDate = item[0].toString().split("/");
                        arrTime = item[1].toString().split(":");
                  } else if (!isNaN(Number(strDateTime))) {
                        //unix 时间戳
                        newDate = new Date(Number(strDateTime) * 1000);
                  }

                //处理数据  
                if (arrDate != undefined && arrTime != undefined && arrDate.length == 3 && arrTime.length == 3 && (newDate == undefined || newDate == null)) {
                        newDate = new Date(
                        parseInt(arrDate[0]),
                        parseInt(Number(arrDate[1]) - 1),
                        parseInt(arrDate[2]),
                        parseInt(arrTime[0]),
                        parseInt(arrTime[1]),
                        parseInt(arrTime[2])
                    );
                  }

                  switch (Number(intType)) {
                        case 1:     //格式:yyyy-MM-dd  
                              years = newDate.getFullYear();
                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;
                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              newDate = years + "-" + month + "-" + days;
                              break;
                        case 2:     //格式:MM-dd HH:mm  
                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              newDate = month + "-" + days +
                              " " + hours + ":" + minutes;
                              break;
                        case 3:     //格式:HH:mm:ss  
                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              seconds = newDate.getSeconds();
                              if (Number(seconds) < 10) seconds = "0" + seconds;

                              newDate = hours + ":" + minutes + ":" + seconds;
                              break;
                        case 4:     //格式:HH:mm  
                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              newDate = hours + ":" + minutes;
                              break;
                        case 5:     //格式:yyyy-MM-dd HH:mm  
                              years = newDate.getFullYear();

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              newDate = years + "-" + month + "-" + days +
                              " " + hours + ":" + minutes;
                              break;
                        case 6:     //格式:yyyy/MM/dd  
                              years = newDate.getFullYear();

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              newDate = years + "/" + month + "/" + days;
                              break;
                        case 7:     //格式:MM/dd HH:mm  
                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              newDate = month + "/" + days +
                              " " + hours + ":" + minutes;
                              break;
                        case 8:     //格式:yyyy/MM/dd HH:mm  
                              years = newDate.getFullYear();

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              newDate = years + "/" + month + "/" + days +
                              " " + hours + ":" + minutes;
                              break;
                        case 9:     //格式:yy-MM-dd  
                              years = newDate.getFullYear();
                              years = years.toString().substr(2, 2);

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              newDate = years + "-" + month + "-" + days;
                              break;
                        case 10:     //格式:yy/MM/dd  
                              years = newDate.getFullYear();
                              years = years.toString().substr(2, 2);

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              newDate = years + "/" + month + "/" + days;
                              break;
                        case 11:     //格式:yyyy年MM月dd hh:mm:ss  
                              years = newDate.getFullYear();

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              hours = newDate.getHours();
                              if (Number(hours) < 10) hours = "0" + hours;

                              minutes = newDate.getMinutes();
                              if (Number(minutes) < 10) minutes = "0" + minutes;

                              seconds = newDate.getSeconds();
                              if (Number(seconds) < 10) seconds = "0" + seconds;

                              newDate = years + "年" + month + "月" + days +
                              " " + hours + ":" + minutes + ":" + seconds;
                              break;
                        case 12:     //格式:yyyyMMdd 
                              years = newDate.getFullYear();

                              month = (newDate.getMonth() + 1);
                              if (Number(month) < 10) month = "0" + month;

                              days = newDate.getDate();
                              if (Number(days) < 10) days = "0" + days;

                              newDate = years.toString() + month.toString() + days.toString();
                              break;
                  }
            }else{
            	newDate = new Date();

		          return newDate.getFullYear() + "-" +
		         (newDate.getMonth() + 1) + "-" +
		         newDate.getDate() + " " +
		         newDate.getHours() + ":" +
		         newDate.getMinutes() + ":" +
		         newDate.getSeconds();
            }
      } catch (e) {
          newDate = new Date();

          return newDate.getFullYear() + "-" +
         (newDate.getMonth() + 1) + "-" +
         newDate.getDate() + " " +
         newDate.getHours() + ":" +
         newDate.getMinutes() + ":" +
         newDate.getSeconds();
      }

      return newDate;
}  