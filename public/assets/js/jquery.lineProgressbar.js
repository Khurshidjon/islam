/**
 * jQuery Line Progressbar
 * Author: Sharifur Rahman
 * Author URL: http://devrobin.com
 * Version: 1.0.0
 */

(function($){
	'use strict';

	$.fn.RobinProgressbar = function(options){

		var options = $.extend({
			percentage : null,
			ShowProgressCount: true,
			duration: 1000,

			// Styling Options
			fillBackgroundColor: '#0268B2',
			backgroundColor: '#32383C',
			radius: '0px',
			height: '10px',
			width: '100%'
		},options);

		return this.each(function(index, el) {
			// Markup
			$(el).html('<div class="progressbar"><div class="proggress"></div><div class="percentCount"></div><div class="percentbox"></div><div class="percentindicator"></div></div>');
			


			var progressFill = $(el).find('.proggress');
			var progressBar= $(el).find('.progressbar');
            var percentCount =  $(el).find('.percentCount');   
            var percentBox =  $(el).find('.percentbox');   
            var percentIndicator =  $(el).find('.percentindicator');   

			progressFill.css({
				backgroundColor : options.fillBackgroundColor,
				height : options.height,
				borderRadius: options.radius
			});
			progressBar.css({
				width : options.width,
				backgroundColor : options.backgroundColor,
				borderRadius: options.radius
			});
            percentCount.css({
                left: options.percentage + "%"
            })
            
            setTimeout(function(){
               percentBox.css({
                left: options.percentage + "%",
                visibility: 'visible',
                opacity: 1,
                transition: '2s'
            }) 
            },500)
            percentIndicator.css({
                left: options.percentage  + "%"
            })
			// Progressing
			progressFill.animate(
				{
					width: options.percentage + "%",
				},
				{	
					step: function(x) {
						if(options.ShowProgressCount){
							$(el).find(".percentCount").text(Math.round(x) + "%");
						}
					},
					duration: options.duration
				}
			);
            
		////////////////////////////////////////////////////////////////////
		});

        
	}
})(jQuery);