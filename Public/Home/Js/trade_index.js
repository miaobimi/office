Trade = {
	init: function(){
		this.getOrderInfo();
	},
	getOrderInfo: function(){
		ajaxReturn(getOrderInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				var v_total=0;
				var html = '';
				for (var i = 0; i < params.length; i++) {
					v_total +=Number(params[0].volume);
					params[i].opendate = params[i].opentime.split(" ")[0];
					params[i].opentime = params[i].opentime.split(" ")[1];
					html += '<tr>'+
							  		'<td id="order">'+params[i].order+'</td>'+
							  		'<td>'+
							  			'<span class="label label-primary" id="cmd">'+params[i].cmd+'</span>'+
							  		'</td>'+
							  		'<td><span class="x-box-label" id="symbol">'+params[i].symbol+'</span></td>'+
							  		'<td class="x-text-right x-text-bold x-font-14" id="volume">'+params[i].volume+' 手</td>'+
							  		'<td>'+
							  			'<strong id="opendate">'+params[i].opendate+'</strong><br><span class="x-text-ccc" id="opentime">'+params[i].opentime+'</span>'+
							  			'<span class="x-box-label" style="float:right;margin-top:-20px;" id="openprice">'+params[i].openprice+'</span>'+
							  		'</td>'+
							  		'<td>'+
							  			'<span class="x-box-label" style="float:right;">1,078.39</span>'+
							  		'</td>'+
							  		'<td class="x-text-right">'+
							  			'<span class="x-text-ccc" id="sl">'+params[i].sl+'</span><span class="y"></span><span id="tp">'+params[i].tp+'</span>'+
							  		'</td>'+
							  		'<td class="x-text-right">'+
							  			'<span class="x-box-label x-text-bold x-text-red x-font-16" id="profit">$'+params[i].profit+'</span>'+
							  		'</td>'+
							  	'</tr>';
				};
				v_total = v_total.toFixed(2);
				$("#orderlist").empty().html(html);
				// console.log();
				/*$('#order').empty().html(params.order);
				$('#cmd').empty().html(params.cmd);
				$('#symbol').empty().html(params.symbol);
				$('#volume').empty().html(params.volume+' 手');
				$('#sl').empty().html(params.sl);
				$('#tp').empty().html(params.tp);
				$('#profit').empty().html('$'+params.profit);
				$('#openprice').empty().html(params.openprice);
				$('#opendate').empty().html(opendate);
				$('#opentime').empty().html(opentime);*/
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	}
}