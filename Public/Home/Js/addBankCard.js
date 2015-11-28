Card = {

	init : function(id,defaultType,banklist,accountMessage,img){

		var html = '<div class="panl" id="panl-two" style="padding-top:10px;"><dl class="dl-horizontal">'+
				this.initCardType(defaultType)+
				this.initCardMessage(banklist)+
				this.initAccount(accountMessage)+
				this.initUploadImg(img)+
				this.initSubmit(id)+
			'</dl></div>';
		return html;
	},

	initCardType : function(defaultType){
		
		var html = '<dt>币种：</dt>'+
	               '<dd id="mm-type">';
			if(typeof defaultType=='undefined' || defaultType == 'CNY'){
				html += '<span class="money-type type-current">';
			}else{
				html += '<span class="money-type">';
			}
			  	
			  	html += '<span class="glyphicon glyphicon-yen icon"></span>'+
			  			'<span class="type-icon">CNY</span>'+
			  			'<i></i>'+
			  		'</span>';
			if(typeof defaultType!=='undefined' && defaultType == 'USD'){
			  	html +=	'<span class="money-type type-current">';
			 }else{
			 	html +=	'<span class="money-type">';
			 }
			  	html +=	'<span class="glyphicon glyphicon-usd icon"></span>'+
			  			'<span class="type-icon">USD</span>'+
			  			'<i></i>'+
			  		'</span>'+
			    '</dd>';

		return html;
	},

	initCardMessage : function(banklist){
		if(typeof banklist ==='undefined'){
			banklist = {
				area:'',
				zhibank:'',
				defaultBank : ''
			}
		}
		var html = '';
		html += '<dt>发卡银行：</dt>'+
			    '<dd>'+
			  		'<div class="form-inline">'+
			  		  '<div class="form-group">'+
					    '<select name="" id="bank" class="form-control">';
					html += '<option value="">请选择银行</option>';
			$.each(bank,function(k,v){
				if(banklist.defaultBank==k){
					html += '<option selected=true value="'+k+'">'+v+'</option>';
				}else{
					html += '<option value="'+k+'">'+v+'</option>';
				}
				
			})
				html += '</select>'+
					  '</div>&nbsp;&nbsp;'+
					  '<div class="form-group">'+
					    '<input type="text" name="area" value="'+banklist.area+'" class="form-control" placeholder="区域/城市">'+
					  '</div>&nbsp;&nbsp;'+
					  '<div class="form-group">'+
					    '<input type="text" name="zhibank" value="'+banklist.zhibank+'" style="width:300px;" class="form-control" placeholder="支行名称">'+
					  '</div>'+
					'</div>'+
			    '</dd>';

		return html;
	},

	initAccount : function(accountMessage){
		if(typeof accountMessage ==='undefined'){
			accountMessage = {
				account:'',
				accountNo:''
			}
		}
		var html = '<dt>账户：</dt>';
		html += '<dd>'+
			  		'<div class="form-inline">'+
					  '<div class="form-group">'+
					    '<input name="account" value="'+accountMessage.account+'" type="text" class="form-control" placeholder="户名">'+
					  '</div>&nbsp;&nbsp;'+
					  '<div class="form-group">'+
					    '<input name="accountNo" value="'+accountMessage.accountNo+'" type="text" style="width:300px;" class="form-control" placeholder="银行帐号">'+
					  '</div>'+
					'</div>'+
			    '</dd>';

		return html;
	},

	initUploadImg : function(img){
	
		var html = '';
		html += '<dt>上传银行卡：</dt>'+
			    '<dd>'+
			    	'<div id="uploader-demo">'+
				  		'<span class="bankcard">'+
				  			'<div class="card-box zheng" id="fileList1">';
				  			if(img){
			  			html += '<img width="308" src="'+img.cardpositiveurl.substr(1)+'">';
			  				}
					html += '</div>'+
							'<div class="card-op">';
							if(img){
						html += '<div id="filePicker1" file="'+img.cardpositiveurl+'">银行卡正面</div>';
							}else{
						html += '<div id="filePicker1">银行卡正面</div>';
							}
						html += '<span url="/Public/Home/Images/bankCardFront.png" class="suchas">示例</span>'+
							'</div>'+
							
				  		'</span>&nbsp;&nbsp;&nbsp;'+
				  		'<span class="bankcard">'+
				  			'<div class="card-box fan" id="fileList2">';
				  		if(img){
			  			html += '<img width="308" src="'+img.cardnegativeurl.substr(1)+'">';
			  			}
					html += '</div>'+
							'<div class="card-op">';
						if(img){
							html += '<div id="filePicker2" file="'+img.cardpositiveurl+'">银行卡反面</div>';
						}else{
							html += '<div id="filePicker2">银行卡反面</div>';
						}
								
						html += '<span url="/Public/Home/Images/bankCardNegative.png" class="suchas">示例</span>'+
							'</div>'+
				  		'</span>'+
				  	'</div>'+
			    '</dd>';

		return html;
	},

	initSubmit : function(id){
		if(typeof id === 'undefined'){
			var id = 0;
		}
		var html = '<dd>'+
	    	'<a cardid="'+id+'" id="drawal" class="btn btn-success radius">确认并提交</a>'+
	    '</dd>';
	    return html;
	}
}