$('.project-image').on('mouseenter', function() {
   	gif = $(this).find("img.sequence");   
    this.iid = setInterval(function() {
    	var pLeft = gif.position();
    	pLeft = pLeft.left;
    	var frames = gif.data("frames");
    	var total = (frames * 235)*-1;
    	if (pLeft > (total+600)) {
    		if (pLeft == 249) {
    			gif.css( "left", 14 );
    		} else {
       			gif.css( "left", (pLeft - 215) );
       		}
    	} else {
       		gif.css( "left", 14 );
       }        
    }, 100);
}).on('mouseleave', function(){
    this.iid && clearInterval(this.iid);
    $(".sequence").css( "left", 249 );
});