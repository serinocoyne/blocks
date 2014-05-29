var simpleFAQ ={
	init:function(){
            this.render();
   			$(".amc-faq-question:first").addClass("amc-faq-active");
   			$(".amc-faq-answer:first").show();
	},
        render:function(){
           $('span.amc-faq-question').click(function () {
                       $n = $(this).next('div.amc-faq-answer');
                       if($(this).hasClass('amc-faq-active')){
                               $(this).removeClass('amc-faq-active');
                               $n.slideUp('fast');}
                       else{
                               $(this).addClass('amc-faq-active');
                               $n.slideDown('fast');
                       return false;
                       }
           });
    }
}
$(function(){simpleFAQ.init();});