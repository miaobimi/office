Account = {

	interval : null,

	init : function(){

		this.bindAddCard();
		this.bindExample();
		//接口
		// this.getAccountInfo();
		// interval = setInterval(Account.getAccountInfo,300000)
	},

	bindAddCard : function(){
		$('#addCard').bind('click',function(){
			alert(111)
		})
	},

	bindExample : function(){

		$('.relative').off('click','.showcard').on('click','.showcard',function(){
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