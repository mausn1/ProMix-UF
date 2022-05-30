<?php 

include 'translator.html';

$errors = array();

if (isset($_POST['submit'])){
    $inputClean = trim($_POST['input']);
    $input = strtolower($inputClean);
    $radio = $_POST['language'];
    
    
    //If sats, om tom skriver ut en string
    if (empty($input)){
        $errors['input'] = "Skriv ett ord!";
        echo $errors['input'];
    }elseif (empty($radio)){
        $errors['language'] = "Välj ett språk!";
        echo $errors['language'];
    }
    

    $arrayWithSwedish = array('apa','hund','dator','fågel','fisk','häst','banan','äpple','ananas','hej');
    $arrayWithEnglish = array('monkey','dog','computer','bird','fish','horse','banana','apple','pineapple','hello');
    $arrayWithFrench = array('singe','chien',"l'ordinateur",'oiseau','poisson','cheval','banane','pomme','ananas','bonjour');
    $arrayWithGerman = array('affe','hund','computer','vogel','fisch','pferd','banane','apfel','ananas', 'hallo');
    $arrayWithSpanish = array('mono','perro','computadora','pájaro','pescado','caballo','plátano','manzana','piña','hola');
    $arrayWithItalian = array('scimmia','cane','computer','uccelo','pesce','cavallo','banana','mela','ananas','ciao');
    

    if (count($errors) === 0) {
        for($x=0; $x < count($arrayWithSwedish); $x++){
            if ($input === $arrayWithSwedish[$x]){
                $inputVerified = $arrayWithSwedish[$x];
                break;
            }
    }
            if ($radio == 'tyska'){
            echo $inputVerified, " på tyska är ", $arrayWithGerman[$x];
            }elseif ($radio == 'engelska'){
            echo $inputVerified, " på engelska är ", $arrayWithEnglish[$x];
            }elseif ($radio == 'franska'){
            echo $inputVerified, " på franska är ", $arrayWithFrench[$x];
            }elseif ($radio == 'spanska'){
            echo $inputVerified, " på spanska är ", $arrayWithSpanish[$x];
            }elseif ($radio == 'italienska')
            echo $inputVerified, " på italienska är ", $arrayWithItalian[$x];
    }
}