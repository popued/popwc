//function getThreadCate(){
$.jsonP({			
		url: serverURL+'/apptest/test.php?callback=?',	//改成服务器相对应路径
		success:function(data){						
			//alert(data['code']);
			var str=data['data']['question_item0']['question_content'];
			//alert(str);
			$('#test1').append(str);
		}		
	});	
//}