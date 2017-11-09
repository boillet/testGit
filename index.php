<!DOCTYPE html>
<html>
<head>
    
<title></title>

</head>
<body>
<pre> <?php print_r($_GET); ?> </pre>

 <form action="index1.php" method="GET">
    <input type="text" name="nom"> <br>
    <textarea name="message"></textarea>
   
    <select name="choix">
                <option value="carottes">Carottes</option>
                <option value="cerises">Cerises</option>
                <option value="fruits">Fruits</option>
                <option value="piments">Piments</option>
                <option value="poivrons">Poivrons</option>                          
    </select><br>
              
     <input type="checkbox" name="coche"><br>
                  
     <button type="submit">Valider</button>
     
</form>
    
<pre> <?php print_r($_POST); ?> </pre>   
<form action="index1.php" method="POST">
    <input type="text" name="nom"> <br>
    <textarea name="message"></textarea>
   
    <select name="choix">
                <option value="carottes">Carottes</option>
                <option value="cerises">Cerises</option>
                <option value="fruits">Fruits</option>
                <option value="piments">Piments</option>
                <option value="poivrons">Poivrons</option>                          
    </select><br>
              
     <input type="checkbox" name="coche"><br>
                  
     <button type="submit">Valider</button>
     
</form> 

    
 <?php 
    
    echo 'je suis '. $_POST['nom'] ; 
    
?>  
    
    
    <?php "nou sommes le " . date('d-m-Y'); ?>
    


</body>
</html>