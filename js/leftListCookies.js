//仅支持二级分类
$(document).ready(function(){
		//默认展开第一个分类
		if(getCookie() == null){
			$("#catsLeft li:eq(0)").addClass("catsCurrent");
			$("#catsLeft li:eq(0)").find("ul").show();
			$("#catsLeft li:eq(0)").siblings("li").find("ul").hide();
		}
		
		if(getCookie() != null){
			var indexValue = getCookie();
			$("#catsLeft").children("li:eq("+indexValue+")").addClass("catsCurrent");
			$("#catsLeft").children("li:eq("+indexValue+")").find("ul").show();//如果cookies存在，则输出cookIe
			$("#catsLeft").children("li:eq("+indexValue+")").siblings("li").find("ul").hide();
		}

	//设置弹出和隐藏
	$("#catsLeft").children("li").children("a").bind("click",function(){
		var display = $(this).siblings("ul").css("display");
		if(display=="none"){ //如果是关闭，则展开
			$(this).siblings("ul").show();
			$(this).parent().siblings("li").removeClass("catsCurrent");
			$(this).parent().addClass("catsCurrent");
		} else if(display=="block"){ //如果是展开的，则关闭；
			$(this).siblings("ul").hide();
			$(this).parent().removeClass("catsCurrent");
			}
		$(this).parent().siblings().find("ul").hide();
		var indexValue =$(this).parent().index();
		setCookie(indexValue);
	});
	
	
})

//获取Cookie
function getCookie(){
	var indexValue = $.cookie("catsLeft");
	return indexValue;
}

//存入Cookie
function setCookie(indexValue){
	$.cookie("catsLeft",indexValue);
	return true;
}


