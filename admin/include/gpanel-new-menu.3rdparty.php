<!-- //START// GAME PANEL PLUGIN +++ DO NOT DELETE THIS LINE +++ GAME PANEL PLUGIN -->
<script type="text/javascript">
$(document).ready(function() {
var newGpButtons = ''
+' <li>'
+' <a href="#" class="hasUl"><span aria-hidden="true" class="icon16 wpzoom-gamepad-2" style="padding-right: 8px;"></span>Gamepanel<span class="hasDrop icon16 icomoon-icon-arrow-down-2"></span></a>'
+'	<ul class="sub">'
+'		<li><a href="index.php?module=Game_Panel"><span class="icon16 icomoon-icon-arrow-right-3"></span>GPanel Home</a></li>'
+'		<li><a href="index.php?module=Game_Panel&amp;action=servers"><span class="icon16 icomoon-icon-arrow-right-3"></span>All Servers</a></li>'
+'		<li><a href="index.php?module=Game_Panel&amp;action=games"><span class="icon16 icomoon-icon-arrow-right-3"></span>All Games</a></li>'
+'		<li><a href="index.php?module=Game_Panel&action=server&do=add"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Server</a></li>'
+'		<li><a href="index.php?module=Game_Panel&action=game&do=add"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Game</a></li>'
+'	</ul>'
+'</li>';
$(".mainnav > ul").append(newGpButtons);
});
</script>
<!-- //END// GAME PANEL PLUGIN +++ DO NOT DELETE THIS LINE +++ GAME PANEL PLUGIN -->
