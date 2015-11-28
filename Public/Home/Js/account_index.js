Account = {

	interval : null,
	tempCardList : {},

	init : function(){

		this.initCardList();
		this.initCardListEvent();
		this.bindAddCard();
		this.bindSingleExample();
		//接口
		// this.getAccountInfo();
		// interval = setInterval(Account.getAccountInfo,300000)
	},

	initCardList : function(pageurl){
		var self = this;
		var url = pageurl || getCardList;
		ajaxReturn(url,{},function(){

		},function(res){
			if(res.status){
				self.buildCardListHtml(res.info);
			}else{
				layer.alert(res.info,{icon:2});
			}
		})
	},

	initCardListEvent : function(){
		var self = this;
		$(document).off('click','.delCard').on('click','.delCard',function(){
			var $parent = $(this).parents('tr');
			layer.confirm('您确定删除吗？',function(){
				var cardid = $parent.attr('cardid');
				var cardpositiveurl = $parent.find('.zheng').attr('url');
				var cardnegativeurl = $parent.find('.fan').attr('url');
				ajaxReturn(delCardUrl,
					{
						cardid:cardid,
						cardpositiveurl : cardpositiveurl,
						cardnegativeurl : cardnegativeurl
					},
				function(){

				},function(res){
					layer.closeAll();
					if(res.status){
						self.initCardList();
					}else{
						layer.alert(res.info,{icon:2});
					}
				})
			})
		});

		$(document).off('click','.editCard').on('click','.editCard',function(){
			var $parent = $(this).parents('tr');
			var cardid = $parent.attr('cardid');
			var card = self.tempCardList[cardid];
			var banklistArr = card.bank.split('-');
			var banklist = {
				defaultBank : banklistArr[0],
				area : banklistArr[1],
				zhibank : banklistArr[2]
			}
			var accountMessage = {
				account : card.bankaccount.split('-')[0],
				accountNo : card.bankaccount.split('-')[1]
			}
			var img = {
				cardpositiveurl : card.cardpositiveurl,
				cardnegativeurl : card.cardnegativeurl
			}
			layer.open({
			    type: 1,
			    title: '修改银行卡信息',
			    closeBtn: 1,
			    area: '870px',
			    skin: 'layui-layer-demo', 
			    shadeClose: false,
			    content: Card.init(card.id,card.type,banklist,accountMessage,img)
			});
			self.uploadCardzheng();
			self.uploadCardfan();
			self.bindExample();
			self.bindAddCardSubmit();
			self.choseDeaultBank();
		})
	},

	buildCardListHtml : function(list){
		var self = this;
		var html = '';
		$.each(list.list,function(k,v){
			html += '<tr cardid="'+v.id+'" class="x-data-item">'+
						'<td class="x-grid-cell">'+
							'<div class="relative">'+
								'<label class="bank-icon '+v.bankicon+'">'+v.bankicon+'</label><div class="x-right mt5"><a url="'+v.cardpositiveurl+'" class="x-label showcard zheng">正</a><a url="'+v.cardnegativeurl+'" class="x-label showcard fan">反</a></div>'+
							'</div>'+
						'</td>'+
						'<td class="x-grid-cell x-font-18">'+v.bankaccount+'</td>'+
						'<td class="x-grid-cell x-text-center">'+
							'<div class="x-button-group">'+
								'<button class="btn btn-info radius editCard" type="button">更改</button>&nbsp;&nbsp;'+
								'<button class="btn btn-danger radius delCard" type="button">删除</button>'+
							'</div>'+
						'</td>'+
					'</tr>';
			self.tempCardList[v.id] = v;
		})
		$('#card-list').empty().html(html);
		$('#pagehtml').empty().html(list.page);
		$('#pagehtml li').bind('click',function(){
			var url = $(this).attr('pageurl');
			if(typeof url != 'undefined'){
				self.initCardList(url);
			}
			
		})
	},

	bindAddCard : function(){
		var self = this;
		$('#addCard').bind('click',function(){
			
			layer.open({
			    type: 1,
			    title: '添加新银行卡',
			    closeBtn: 1,
			    area: '870px',
			    skin: 'layui-layer-demo', 
			    shadeClose: false,
			    content: Card.init()
			});

			self.uploadCardzheng();
			self.uploadCardfan();
			self.bindExample();
			self.bindAddCardSubmit();
			self.choseDeaultBank();
		})
		
	},

	choseDeaultBank : function(){
		$('#mm-type .money-type').bind('click',function(){
			var $o = $(this);
			$o.addClass('type-current').siblings().removeClass('type-current');
		})
	},

	bindAddCardSubmit : function(){
		var self = this;
		$('dd').off('click','#drawal').on('click','#drawal',function(){
			var bank = $('#bank option:selected').val();
			var area = $.trim($('[name=area]').val());
			var zhibank = $.trim($('[name=zhibank]').val());
			var account = $.trim($('[name=account]').val());
			var accountNo = $.trim($('[name=accountNo]').val());
			var zheng = $('#filePicker1').attr('file') || '';
			var fan = $('#filePicker2').attr('file') || '';
			var cardid = $(this).attr('cardid') || 0;
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
			var params = {
				id : cardid,
				type : $.trim($('.type-current').find('.type-icon').text()),
				bank : bank+'-'+area+'-'+zhibank,
				bankAccount : account+'-'+accountNo,
				cardPositiveUrl : zheng,
				cardNegativeUrl : fan
			}

			ajaxReturn(saveCardUrl,params,function(){

			},function(res){
				if(res.status){
					layer.msg(res.info,{icon:1});
					window.location.href=accountIndexUrl;
				}else{
					layer.alert(res.info,{icon:2});
				}
			})
		})
	},

	uploadCardzheng : function(){
		// 初始化Web Uploader
		var uploader = WebUploader.create({

		    // 选完文件后，是否自动上传。
		    auto: true,

		    // swf文件路径
		    swf: "__STATIC__/webuploader/Uploader.swf",

		    // 文件接收服务端。
		    server: uploadCardUrl,

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
		    $('#fileList1').empty().append( $li );

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
		    server: uploadCardUrl,

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
		    $('#fileList2').empty().append( $li );

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
	},

	bindExample : function(){
		var self = this;
		$('.card-op').off('click','.suchas').on('click','.suchas',function(){
			var url = $(this).attr('url');
			self.layerShowContent(url);
		})
	},

	bindSingleExample : function(){
		var self = this;
		$(document).off('click','.showcard').on('click','.showcard',function(){
			var url = $(this).attr('url').substr(1);
			self.layerShowContent(url);
		})
	},

	layerShowContent : function(url){
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
	},

	getAccountInfo : function(){
		var self = this;
		ajaxReturn(getAccountInfoUrl,{},null,function(res){
			if(res.status){
				self.fillPage(res.info);
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},

	fillPage : function(params){
		$('#ganggan').empty().html(params.leveral);
	}
}