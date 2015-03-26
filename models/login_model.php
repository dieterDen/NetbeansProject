<?php

class login_model extends Model {
    
    public function __construct() {
        //echo '111<br/> data van uit db<br />';
        parent::__construct();
    }

    public function run()
    {
        $result=  $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezichttekst_tekst as 'afwezigheids inlichtingen' FROM islp.view_afwezigheidstoezichtTekst");
        while($row =$result->fetch_assoc()) {
            //echo $row["elementnummer"].'<br />';
            //echo $row["afwezigheids inlichtingen"]."<br />";
           // printf("%s %s %s %s %s <br>", $row["elementnummer"],$row["afwezigheids inlichtingen"],$row["bewoner naam"],$row["bewoner voornaam"],$row["begindatum"]);
        }
        
        
        
        
        
        //$sth = $this->db->prepare("SELECT * FROM shop.sales");
        //$sth->execute();
        
        //code hieronder werkt maar niet ideaal
        /*$data= $sth->fetch();
        //echo $sth->rowCount();
        print_r($data);*/
       
        //deze werkt niet omdat mysql native driver ontbreekt
       /*$data= $sth->get_result();
       if($data->num_rows == 0){
           echo 'no results from query to show';
           
       }
       $data->fetch_all();*/
                
        /*$data=$this->db->mysqli_query("SELECT * FROM shop.sales ");
        //$this->db->mysqli_execute();
        if(!$data)
        {
            echo 'could not do query';
        }
        while ($row=  mysqli_fetch_row($data))
        {
            echo $row[0] . " <br /> ".$row[1]. "<br />" . $row[2] . "<br />" . $row[3];
        }
        //print_r($data);
        */
    }

}