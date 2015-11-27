Payment = {

	init : function(){
		this.choseDefaultBank();
		this.initBankList();
		this.bindPanlEvent();
		this.bindWithdrawal(); //出金提交
		this.bindAddCardAndWithdrawal();//加银行卡 且出金
	},

	bindWithdrawal : function(){
		$('#chujin').bind('click',function(){
			var params = {
				cardid : $('#banklists dd.current').attr('cardid'),
				money : $.trim($('[name=chujinmoney]').val())
			}
			if(params.money=='' || isNaN(params.money)){
				layer.alert('请填写正确的出金金额',{icon:2});
				return false;
			}
			ajaxReturn(withdrawalUrl,params,function(){

			},function(res){
				if(!res.status){
					layer.alert(res.info,{icon:2});
					return;
				}else{
					window.location.href=outRecordsUrl;
				}
			})
		})
	},

	choseDefaultBank : function(){
		$('#banklists dd').bind('click',function(){
			$(this).addClass('current').siblings().removeClass('current');
		})
	},

	initBankList : function(){
		var html = '<option value="">请选择银行</option>';
		$.each(bank,function(k,v){
			html += '<option value="'+k+'">'+v+'</option>';
		})
		$('#bank').empty().html(html);
	},

	bindAddCardAndWithdrawal : function(){
		var self = this;
		$('dd').off('click','#drawal').on('click','#drawal',function(){
			var bank = $('#bank option:selected').val();
			var area = $.trim($('[name=area]').val());
			var zhibank = $.trim($('[name=zhibank]').val());
			var account = $.trim($('[name=account]').val());
			var accountNo = $.trim($('[name=accountNo]').val());
			var zheng = $('#filePicker1').attr('file') || '';
			var fan = $('#filePicker2').attr('file') || '';
			var money = $.trim($('[name=money]').val());
			
			if(bank==''){
				layer.alert('请选择银行',{icon:2});
				return false;
			}
			if(area==''){
				layer.alert('请填写银行地区',{icon:2});
				return false;
			}
			if(zhibank==''){
				layer.alert('请填写支行名称',{icon:2});
				return false;
			}
			if(account==''){
				layer.alert('请填写账户',{icon:2});
				return false;
			}
			if(accountNo==''){
				layer.alert('请填写银行账号',{icon:2});
				return false;
			}
			if(zheng==''){
				layer.alert('请上传银行卡正面',{icon:2});
				return false;
			}
			if(fan==''){
				layer.alert('请上传银行卡反面',{icon:2});
				return false;
			}
			if(money==''){
				layer.alert('请填写出金金额',{icon:2});
				return false;
			}

			var params = {
				type : $.trim($('.type-current').find('.type-icon').text()),
				bank : bank+'-'+area+'-'+zhibank,
				bankAccount : account+'-'+accountNo,
				cardPositiveUrl : zheng,
				cardNegativeUrl : fan,
				money : money
			}

			ajaxReturn(saveCardAndMoneyUrl,params,function(){

			},function(res){
				if(res.status){
					layer.alert(res.info,{icon:1})
				}else{
					layer.alert(res.info,{icon:2});
				}
			})
		})
	},

	bindExample : function(){

		$('.card-op').off('click','.suchas').on('click','.suchas',function(){
			var url = $(this).attr('url');
			layer.open({
			    type: 1,
			    title : false,
			    skin: 'layui-layer-demo', //样式类名
			    closeBtn: 0, //不显示关闭按钮
			    shift: 1,
			    area: ['505px', '320px'],
			    shadeClose: true, //开启遮罩关闭
			    content: '<img src="'+url+'">'
			});
		})
	},

	bindPanlEvent : function(){
		var self = this;
		$('#ways li').bind('click',function(){
			var $o = $(this);
			var index = $o.index();
			$o.addClass('current').siblings().removeClass('current');
			$('.panl').eq(index).show().siblings().hide();
			if(index===1){
				self.bindPickerHtml();
				self.uploadCardzheng();
				self.uploadCardfan();
				self.bindExample();
			}
		});

		$('#mm-type .money-type').bind('click',function(){
			var $o = $(this);
			$o.addClass('type-current').siblings().removeClass('type-current');
		})
	},

	bindPickerHtml : function(){
		$('#picker1').empty().html('<div id="filePicker1">银行卡正面</div>');
		$('#picker2').empty().html('<div id="filePicker2">银行卡反面</div>');
	},

	uploadCardzheng : function(){
		// 初始化Web Uploader
		var uploader = WebUploader.create({

		    // 选完文件后，是否自动上传。
		    auto: true,

		    // swf文件路径
		    swf: "__STATIC__/webuploader/Uploader.swf",

		    // 文件接收服务端。
		    server: zheng,

		    // 选择文件的按钮。可选。
		    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
		    pick: '#filePicker1',

		    // 只允许选择图片文件。
		    accept: {
		        title: 'Images',
		        extensions: 'gif,jpg,jpeg,bmp,png',
		        mimeTypes: 'image/*'
		    }
		});
		// 当有文件添加进来的时候
		uploader.on( 'fileQueued', function( file ) {
		    var $li = $('<div id="' + file.id + '" class="file-item thumbnail">' +
		                '<img>' +
		                '<div class="info">' + file.name + '</div>' +
		            '</div>'
		            ),
		        $img = $li.find('img');


		    // $list为容器jQuery实例
		    $('#fileList1').append( $li );

		    // 创建缩略图
		    // 如果为非图片文件，可以不用调用此方法。
		    // thumbnailWidth x thumbnailHeight 为 100 x 100
		    var thumbnailWidth = 300;
		    var thumbnailHeight = 192;
		    uploader.makeThumb( file, function( error, src ) {
		        if ( error ) {
		            $img.replaceWith('<span>不能预览</span>');
		            return;
		        }

		        $img.attr( 'src', src );
		    }, thumbnailWidth, thumbnailHeight );
		});

		// 文件上传过程中创建进度条实时显示。
		uploader.on( 'uploadProgress', function( file, percentage ) {
		    var $li = $( '#'+file.id ),
		        $percent = $li.find('.progress span');

		    // 避免重复创建
		    if ( !$percent.length ) {
		        $percent = $('<p class="progress"><span></span></p>')
		                .appendTo( $li )
		                .find('span');
		    }

		    $percent.css( 'width', percentage * 100 + '%' );
		});

		// 文件上传成功，给item添加成功class, 用样式标记上传成功。
		uploader.on( 'uploadSuccess', function( file ,res) {
		    $( '#'+file.id ).addClass('upload-state-done');
		    var res = eval('('+res._raw+')');
		    if(res.status){
            	$('#filePicker1').attr('file',res.file);
		    }else{
		    	layer.alert(res.message,{icon:2})
		    }
		    
		});

		// 文件上传失败，显示上传出错。
		uploader.on( 'uploadError', function( file ) {
		    var $li = $( '#'+file.id ),
		        $error = $li.find('div.error');

		    // 避免重复创建
		    if ( !$error.length ) {
		        $error = $('<div class="error"></div>').appendTo( $li );
		    }

		    $error.text('上传失败');
		});

		// 完成上传完了，成功或者失败，先删除进度条。
		uploader.on( 'uploadComplete', function( file ) {
		    $( '#'+file.id ).find('.progress').remove();
		});
	},

	uploadCardfan : function(){
		// 初始化Web Uploader
		var uploader = WebUploader.create({

		    // 选完文件后，是否自动上传。
		    auto: true,

		    // swf文件路径
		    swf: "__STATIC__/webuploader/Uploader.swf",

		    // 文件接收服务端。
		    server: fan,

		    // 选择文件的按钮。可选。
		    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
		    pick: '#filePicker2',

		    // 只允许选择图片文件。
		    accept: {
		        title: 'Images',
		        extensions: 'gif,jpg,jpeg,bmp,png',
		        mimeTypes: 'image/*'
		    }
		});
		// 当有文件添加进来的时候
		uploader.on( 'fileQueued', function( file ) {
		    var $li = $('<div id="' + file.id + '" class="file-item thumbnail">' +
		                '<img>' +
		                '<div class="info">' + file.name + '</div>' +
		            '</div>'
		            ),
		        $img = $li.find('img');


		    // $list为容器jQuery实例
		    $('#fileList2').append( $li );

		    // 创建缩略图
		    // 如果为非图片文件，可以不用调用此方法。
		    // thumbnailWidth x thumbnailHeight 为 100 x 100
		    var thumbnailWidth = 300;
		    var thumbnailHeight = 192;
		    uploader.makeThumb( file, function( error, src ) {
		        if ( error ) {
		            $img.replaceWith('<span>不能预览</span>');
		            return;
		        }

		        $img.attr( 'src', src );
		    }, thumbnailWidth, thumbnailHeight );
		});

		// 文件上传过程中创建进度条实时显示。
		uploader.on( 'uploadProgress', function( file, percentage ) {
		    var $li = $( '#'+file.id ),
		        $percent = $li.find('.progress span');

		    // 避免重复创建
		    if ( !$percent.length ) {
		        $percent = $('<p class="progress"><span></span></p>')
		                .appendTo( $li )
		                .find('span');
		    }

		    $percent.css( 'width', percentage * 100 + '%' );
		});

		// 文件上传成功，给item添加成功class, 用样式标记上传成功。
		uploader.on( 'uploadSuccess', function( file ,res) {
		    $( '#'+file.id ).addClass('upload-state-done');
		    var res = eval('('+res._raw+')');
		    if(res.status){
            	$('#filePicker2').attr('file',res.file);
		    }else{
		    	layer.alert(res.message,{icon:2})
		    }
		});

		// 文件上传失败，显示上传出错。
		uploader.on( 'uploadError', function( file ) {
		    var $li = $( '#'+file.id ),
		        $error = $li.find('div.error');

		    // 避免重复创建
		    if ( !$error.length ) {
		        $error = $('<div class="error"></div>').appendTo( $li );
		    }

		    $error.text('上传失败');
		});

		// 完成上传完了，成功或者失败，先删除进度条。
		uploader.on( 'uploadComplete', function( file ) {
		    $( '#'+file.id ).find('.progress').remove();
		});
	}
}