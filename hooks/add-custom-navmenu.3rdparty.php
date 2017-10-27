<!-- Example 1: With submenu -->
<script type="text/javascript">
	$(document).ready(function() {
		var newNavButtonsList = ''; // leave this empty

		var newNavButtonsName = 'Custom Menu'; // rename main button as you want

		/* Add SubButtons here, as many as you want :D */
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 1</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 2</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 3</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 4</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 5</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 6</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 7</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 8</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 9</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 10</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 11</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 12</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 13</a></li>';
		newNavButtonsList	+= '<li><a class="navSub" href="#"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub Menu 14</a></li>';

		/* not recommended to edit if you don't know what you are doing */
		var newNavButtonsStyle = '<style type="text/css">ul.navSub {background-color: #f4f4f4;border-right: 1px solid #bfbfbf;border-left: 1px solid #bfbfbf;border-bottom: 1px solid #bfbfbf;padding-left: 5px;list-style: none;padding-top: 5px;position: absolute;min-width: 100%;min-height: 100%;display: none;}a.newNavButtons:hover + ul.navSub {display:block;}ul.navSub:hover {display:block;}a.navSub:hover {background: none !important;box-shadow: none !important;width: 150px !important;position: relative;}</style>';
		var newNavButtons = '<li><a a href="#" class="newNavButtons"><span aria-hidden="true" class="icon16 wpzoom-star"></span>'+newNavButtonsName+'<span class="hasDrop icon16 icomoon-icon-arrow-down-2"></span></a><ul class="navSub">'+newNavButtonsList+'</ul></li>';
		$(newNavButtonsStyle).appendTo($('head'));
		$(newNavButtons).appendTo($('.navbar-nav'));
	});
</script>

<!-- Example 2: Without submenus -->
<script type="text/javascript">
	$(document).ready(function() {
		var newNavButton = ''; // leave this empty

		newNavButton += '<li><a target="_blank" href="#"><span class="icon16 wpzoom-star"></span> <span class="txt">Custom Button 1</span></a></li>';
		newNavButton += '<li><a target="_blank" href="#"><span class="icon16 wpzoom-star"></span> <span class="txt">Custom Button 1</span></a></li>';

		$(newNavButton).appendTo($('.navbar-nav'));
	});
</script>
