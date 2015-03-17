<?php
//accordion easyui gebruiken  voor 5min briefing te tonen van afgelopen 5 dagen.
?>
<form action="<?php echo URL; ?>/algemeenInfo/get_briefingPDF" enctype="multipart/form-data" method="POST">
    <div style="margin-bottom:20px">
        <input id="fb" class="easyui-filebox" style="width:25%" data-options="prompt:'Choose a file...'"></div>
    <div>
        <!--<a href="#" class="easyui-linkbutton" style="width:25%">Upload</a>-->
        <input class="easyui-linkbutton" style="width: 25%; padding:5px" type="submit" value="Upload">
    </div>
</form>