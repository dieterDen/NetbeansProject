
<form action='<?php echo URL; ?>algemeenInfo/get_briefingPDF' method="POST" enctype="multipart/form-data">
    <div style="margin-bottom:20px">
        <input id="fb" class="easyui-filebox" name="upload" style="width:25%" data-options="prompt:'Choose a file...'"></div>
    <div>
        <input class="easyui-linkbutton" style="width: 25%; padding:5px" name="submit" type="submit" value="Upload">
    </div>
</form>
<br />

<div class="easyui-accordion" style="width:98%;height:98%;">
    <!--!!delete functie maken en sort functie maken om te tonen op datum van!!-->
    <?php
    $fi = new FilesystemIterator('external_files', FilesystemIterator::CURRENT_AS_PATHNAME);
    foreach ($fi as $fileinfo) {
        //verwijder 5min briefing pdf die ouder is dan een week
       /* if ((abs(time() - $fi->getCTime()) / 60 / 60 / 24) > 7) {
            unlink($fi->getFilename());
        }
        //echo (abs(time() - $fi->getCTime())/60/60/24);
        //unlink('../../external_files/5minBriefing_1903.pdf');
        $path=URL.'external_files/5minBriefing_1903.pdf';
        if (file_exists($path)){
            echo 'success on path';
        }
        else {
            echo 'failure on path';
        }
        if(unlink(URL.'external_files/5minBriefing_1903.pdf')){
        echo "succes";}
            else {
            echo 'failure';
        }*/
      //  echo 'delete van 1903';
        echo '<div title="5min briefing: ' . DATE("j/m/Y", filectime($fi->current())) . '"data-options="""iconCls:icon-ok" style="overflow:auto;padding:10px;">'
        . '<p><a href=' . URL . 'external_files/' . $fi->getFilename() . ' style="font-size:14px;">' . $fi->getFilename() . '</a></p>'
        . '<form action="' . URL . 'algmeenInfo/get_briefingPDF" method="POST"><input class="easyio-linkbutton" name="delete" type="submit" value="Delete" id="Delete">'
        . '</form>'
        . '</div>';
    }
    ?>
</div>






