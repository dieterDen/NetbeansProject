<?php
//accordion easyui gebruiken  voor 5min briefing te tonen van afgelopen 5 dagen.
?>

<form action='<?php echo URL; ?>algemeenInfo/get_briefingPDF' method="POST" enctype="multipart/form-data">
    <div style="margin-bottom:20px">
        <!--type="file" eventueel toevoegen -->
        <input id="fb" class="easyui-filebox"  name="upload" style="width:25%" data-options="prompt:'Choose a file...'"></div>
    <div>
        <!--<a href="#" class="easyui-linkbutton" style="width:25%">Upload</a>-->
        <input class="easyui-linkbutton" style="width: 25%; padding:5px" name="submit" type="submit" value="Upload">
    </div>
</form>
        
        
       



        