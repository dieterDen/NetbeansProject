<?php
/**
 * De klasse toont een overzicht van de 5min briefingen.
 * 5min briefingen die ouder zijn dan een week worden verwijderd
 * @package views
 * @subpackage algemeenInfo
 * @version 0.0
 * @todo sort functie maken om briefingen te tonen op datum. Eerst iterator in array zetten en deze filteren 
 */
$log = KLogger::getInstance();
?>


<div class="easyui-accordion" style="width:98%;height:98%;">
    <!--ToDO -> sort functie maken om te tonen op datum van (gebruik van scandir)-->
    <?php
    $path_dir = 'external_files/';
    $fi = new FilesystemIterator('external_files', FilesystemIterator::CURRENT_AS_PATHNAME);
    foreach ($fi as $fileinfo) {

        if ($handle = opendir($path_dir)) {
            while (false !== ($file = readdir($handle))) {
                $filelastmodified = filemtime($path_dir . $file);
                if ((time() - $filelastmodified) > 3600 * 24 * 7) {
                    unlink($path_dir . $file);
                }
            }
            closedir($handle);
        }

        echo '<div title="5min briefing: ' . DATE("j/m/Y", filectime($fi->current())) . '"data-options="""iconCls:icon-ok" style="overflow:auto;padding:10px;">'
        . '<p><a href=' . URL . 'external_files/' . $fi->getFilename() . ' style="font-size:14px;">' . $fi->getFilename() . '</a></p>'
        . '<br /><a href="' . URL . 'algemeenInfo/delete_briefing/' . str_replace(".", "", $fi->getFilename()) . '">Delete </a>'
        . '</div>';
    }
    ?>
</div><br><br>

<form action='<?php echo URL; ?>algemeenInfo/get_briefingPDF' method="POST" enctype="multipart/form-data">
    <div style="margin-bottom:20px">
        <input id="fb" class="easyui-filebox" name="upload" style="width:25%" data-options="prompt:'Choose a file...'"></div>
    <div>
        <input class="easyui-linkbutton" style="width: 25%; padding:5px" name="submit" type="submit" value="Upload">
    </div>
</form>
<br />







