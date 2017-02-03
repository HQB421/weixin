$(document).ready(function(){
	$('.News_imgList div').hover(
		function(){$(this).parent().addClass("News_imgList hover")},
		function(){$(this).parent().toggleClass("hover")}
	);
	
	//--��������


$(".Nav li").hover(
	function(){
	$(this).children("a").addClass("nav_hover");
	$(this).children("div:hidden").stop(true,true).slideToggle("fast",function(){
	$(this).children("div").css({"display":"block"});													  
															  });
	},
	function(){
	$(this).children("a").removeClass("nav_hover");

	$(this).children("div").css({"display":"none"});

	}
)

	//---banner

	$("#focus div").hover(
		function(){$(this).animate({opacity: '0.5'}, "slow");},	
		function(){$(this).animate({opacity: '0.2'}, "slow");}
							   );

	marquee("#focus",".pre",".next",1000,5000);
	
});


function ObjNews(id){
	var licount = $("#ObjNews li").length;
	$(".cont_"+id).css("display","block");
	$("#ObjNews li:eq("+id+")").find("img").attr("src","./image/c"+id+".gif")
	for(i=0;i<licount;i++){
	if(i!=id){$(".cont_"+i).css("display","none");$("#ObjNews li:eq("+i+")").find("img").attr("src","./image/c"+i+"_hover.gif")}
	}
	if(id==0){$("#ObjNewsMore").attr("href","news/20120713104301.html")}else{$("#ObjNewsMore").attr("href","news/20120713104221.html")}
}


function marquee(divElem,Pav,Next,speed,addspeed){
	this.divElem = $(divElem);
	this.Pav = $(Pav);
	this.Next = $(Next);
	this.liwidth = $("body").width();
	this.ulwidth = $("body").width() * $("#focus ul").find("li").length;
	this.speed=speed;
	this.addspeed=addspeed;
	this.num = 0;
	var that=this;
	
	$(that.divElem).find("ul").find("li").css("width",that.liwidth+"px");
	$(that.divElem).find("ul").css("width",that.ulwidth+"px");
	
	function autoGo(type){
		if(type == 1){
		that.num += 1;
		if(that.num > ($("#focus ul").find("li").length-1)){that.num = 0}
		}else{
		that.num -= 1;	
		if(that.num < 0){that.num = 0}
		}

		$("#focus ul").animate({left: '-'+that.num*that.liwidth+'px'}, that.speed);	


	}
	
	this.autoGo = function(){

		that.num += 1;
		if(that.num > ($("#focus ul").find("li").length-1)){that.num = 0}
		

		$("#focus ul").animate({left: '-'+that.num*that.liwidth+'px'}, that.speed);	


	}
	
	this.Pav.click(function(){					
		autoGo(1);						
	});
	this.Next.click(function(){
		autoGo(0);						
	});
	
	/*ͼƬ���Զ�����*/
	auto123=setInterval(this.autoGo,this.addspeed);
	
	this.divElem.mouseover(function(){
		clearInterval(auto123);						 
	});
	this.divElem.mouseout(function(){
		clearInterval(auto123);	
		auto123=setInterval(that.autoGo,that.addspeed);							
	});
	
	
	
	
}