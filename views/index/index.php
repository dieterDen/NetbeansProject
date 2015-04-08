<?php
/**
 * de klasse toont de view met de main body voor de hoofdpagina.
 * Er wordt een lijst getoond met alle modules en items in een navigation bar
 * @package views
 * @subpackage index
 * @version 0.0
 */
// include_once ("languages/ned_language.php"); 
?>
This is the main page welcome!


<div style="background:#fafafa;padding:5px;width:100%;border:1px solid #ccc;">
    <a href="#" class="easyui-menubutton" menu="#mm1" iconCls="icon-info"><?php echo $lang['algemeneInfo']; ?></a>
    <a href="#" class="easyui-menubutton" menu="#mm2" iconCls="icon-beheer"><?php echo $lang['FunctioneelBeheer']; ?></a>
    <a href="#" class="easyui-menubutton" menu="#mm3" iconCls="icon-afwerking"><?php echo $lang['Afwerkingstermijnen']; ?></a>
</div>
<div id="mm1"style="width:200px;">
    <div iconCls=""><a href="<?php echo URL; ?>algemeenInfo/get_afwezigheidstoezicht"><?php echo $lang['Afwezigheidstoezicht']; ?></a></div>
    <div><a href="<?php echo URL; ?>algemeenInfo/get_briefing"><?php echo $lang['briefing']; ?></a></div>
    <div iconCls=""><a href="<?php echo URL; ?>algemeenInfo/get_daderGerichteAanpak"><?php echo $lang['DaderGerichteAanpak']; ?></a></div>
    <div class="menu-sep"></div>
    <div><a href="<?php echo URL; ?>algemeenInfo/test"><?php echo $lang['innameOpenbareweg']; ?></a></div>

</div>
<div id="mm2" style="width:200px;">
    <div><a href="<?php echo URL; ?>functioneelBeheer/get_openstaandeDossiers_namen"><?php echo $lang['OpenstaandeDossiers']; ?></a></div>
    <div><a href="<?php echo URL; ?>functioneelBeheer/get_imeiNummers"><?php echo $lang['IMEI']; ?></a></div>
</div>
<div id="mm3" style="width: 200px;">
    <div><?php echo $lang['innameOpenbareweg']; ?></div>
</div>

<hr>



