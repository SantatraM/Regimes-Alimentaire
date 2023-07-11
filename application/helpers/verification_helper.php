<?php 
    function verify_login ($email,$mdp,$data){
        for($i=0;$i<count($data);$i++){            
            echo $data[$i]['email'];
            echo $data[$i]['mot_de_passe'];
            if ($email == $data[$i]['email'] && $mdp == $data[$i]['mot_de_passe']){                
                return $data[$i]['id'];
            }
        }
        return 0;
    }
    function verify_sign ($pass,$mdp){
        if ($mdp == $pass){			
            return 0;
		}else {
            return 1;
		}
    }
?>