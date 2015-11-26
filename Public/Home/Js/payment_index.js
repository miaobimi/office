Payment = {

	init : function(){
		this.choseBankEvent();
		this.submitEvent();
	},

	submitEvent : function(){
		$('#submit').bind('click',function(){
			var amount = $.trim($('[name=Amount]').val());
			if(amount==''|| isNaN(amount)){
				layer.alert('请输入正确的金额',{icon:2});
				return false;
			}
			$('form').submit();
		})
	},

	choseBankEvent : function(){
		$('#bankAll li').bind('click',function(){
			var $o = $(this);
			$o.addClass('active').siblings().removeClass('active');
			$('#bankTip').text($o.find('label').attr('name'));
			$o.siblings().find('[type=hidden]').remove();
			var code = $o.find('label').attr('bankco');
			$o.append('<input type="hidden" name="Bank_Code" value="'+code+'">');
		})
	}
}