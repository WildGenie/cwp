<!-- Example 1: Including submenus! -->
<script type="text/javascript">
	$(document).ready(function() {
		var newButtons = ''
		+' <li>'
		+' <a href="#" class="hasUl"><span aria-hidden="true" class="icon16 icomoon-icon-question"></span>Custom Menu<span class="hasDrop icon16 icomoon-icon-arrow-down-2"></span></a>'
		+'	<ul class="sub">'
		+'		<li><a href="#1"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub 1</a></li>'
		+'		<li><a href="#2"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub 2</a></li>'
		+'		<li><a href="#3"><span class="icon16 icomoon-icon-arrow-right-3"></span>Sub 3</a></li>'
		+'	</ul>'
		+'</li>';
		$(".mainnav > ul").append(newButtons);
	});
</script>


<!-- Example 2: Without submenus! -->
<script type="text/javascript">
	$(document).ready(function() {
		var newButtons = ''
		+'<li><a href="#your_link_here"><span aria-hidden="true" class="icon16 icomoon-icon-question"></span>Custom Menu 2</a></li>'
		+'<li><a href="#your_link_here"><span aria-hidden="true" class="icon16 icomoon-icon-question"></span>Custom Menu 3</a></li>'
		+'<li><a href="#your_link_here"><span aria-hidden="true" class="icon16 icomoon-icon-question"></span>Custom Menu 4</a></li>'
		;
		$(".mainnav > ul").append(newButtons);
	});
</script>
