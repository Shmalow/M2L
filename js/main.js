/* --------------------------------------
   Progress Bar
   -------------------------------------- */
progressBar = {
	countElmt : 0,
	loadedElmt : 0,

	init : function(){
		var that = this;
		this.countElmt = $('img').length;

		// Construction et ajout progress bar
		var $progressBarContainer = $('<div/>').attr('id', 'progress-bar-container');
		$progressBarContainer.append($('<div/>').attr('id', 'progress-bar'));
		$progressBarContainer.appendTo($('.loadingBar'));

		// Ajout container d'élements
		var $container = $('<div/>').attr('id', 'progress-bar-elements');
		$container.appendTo($('.loadingBar'));

		// Parcours des éléments à prendre en compte pour le chargement
		$('img').each(function(){
			$('<img/>')
				.attr('src', $(this).attr('src'))
				.on('load error', function(){
					that.loadedElmt++;
					that.updateProgressBar();
				})
				.appendTo($container)
			;
		});
	},

	updateProgressBar : function(){
		$('#progress-bar').stop().animate({
			'width'	: (progressBar.loadedElmt/progressBar.countElmt)*100 + '%'
		}, function(){
			if(progressBar.loadedElmt == progressBar.countElmt){
				setTimeout(function(){
					$('#progress-bar-container').animate({
						'top' : '-8px'
					}, function(){
						$('#progress-bar-container').remove();
						$('#progress-bar-elements').remove();
					});
				}, 500);
			}
		});
	}
};

progressBar.init();

/* --------------------------------------
   Survol Directionnel
   -------------------------------------- */

(function($){

	function _getDir($el,event){
		var w 	= $el.width(),
			h	= $el.height(),
			cx  = $el.offset().left + w/2,  // position de centre de l'element par rapport a la page 
			cy  = $el.offset().top  + h/2,
			x	= (event.pageX - cx) * (w>h?(h/w) : 1),//position du point d'entree par rapport au centre de l'element, x>0=>mouse right to left
			y   = -(event.pageY - cy) * (h>w?(w/h) : 1),
			direction = Math.round( ( (Math.atan2(x,y) + Math.PI) / (Math.PI/2)) + 2 ) % 4;
		var directions = {
			0 : {left:0, top:-h},
			1 : {left:w, top:0},
			2 : {left:0, top:h},
			3 : {left:-w,top:0}
		}
		return directions[direction]; 
	}

	$('.thumb').on('mouseenter',function(event){
		$(this).find('.alt').stop().css(_getDir($(this),event)).animate({top:0, left:0}, 300);
	});

	$('.thumb').on('mouseleave',function(event){
		$(this).find('.alt').stop().animate(_getDir($(this),event), 300);
	});

})(jQuery);
