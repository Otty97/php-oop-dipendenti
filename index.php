<?php

require_once('dipendenti.php');
try{
    $myPersona = new Persona('Pinco',12,'PNCPL1');
}catch(NomeException $e){
    echo $e->getMessage();
    $myPersona = new Persona('Tizo','Tizi','XXXX');
}catch(CognomeException $e){
    echo $e->getMessage();
    $myPersona = new Persona('Caio','Cai','YYYY');
}catch(CfException $e){
    echo $e->getMessage();
    $myPersona = new Persona('Sempronio','Sempro','YXYX');
}

echo $myPersona->to_string();
var_dump($myPersona);

$myImpiegato = new Impiegato([
    'nome' => 'Pinco',
    'cognome' => 'Pallino',
    'codice_fiscale' => 'PNCPL97',
    'codice_impiegato' => '001',
    'compenso' => 1000
]);
echo $myImpiegato->to_string();
var_dump($myImpiegato);

$myImpiegatoSalariato = new ImpiegatoSalariato([
    'nome' => 'Pinco',
    'cognome' => 'Pallino',
    'codice_fiscale' => 'PNCPL97',
    'codice_impiegato' => '001',
    'giorni_lavorati' => 220,
    'compenso_giornaliero' => 80
]);

var_dump($myImpiegatoSalariato);
echo $myImpiegatoSalariato->calcola_compenso();

$myImpiegatoAOre = new ImpiegatoAOre([
    'nome' => 'Pinco',
    'cognome' => 'Pallino',
    'codice_fiscale' => 'PNCPL97',
    'codice_impiegato' => '001',
    'ore_lavorate' => 140,
    'compenso_orario' => 5
    ]);

var_dump($myImpiegatoAOre);
echo $myImpiegatoAOre->calcola_compenso();



try {
    $myImpiegatoSuCommissione = new ImpiegatoSuCommissione([
        'nome' => 'Pinco',
        'cognome' => 'Pallino',
        'codice_fiscale' => 'PNCPL97',
        'codice_impiegato' => '001',
        'compenso' => 1000,
    ], 'sito',1000);
}catch (Exception $e){
    $myImpiegatoSuCommissione = new Impiegato([
        'nome' => 'Pinco',
        'cognome' => 'Pallino',
        'codice_fiscale' => 'PNCPL97',
        'codice_impiegato' => '001',
        'compenso' => 1000,
    ]
    );
    echo $e->getMessage();
}

try{
   $myImpiegatoSuCommissione->fun();
}catch (Exception $e){
    echo $e->getMessage();
}


var_dump($myImpiegatoSuCommissione);
echo $myImpiegatoSuCommissione->calcola_compenso();

?>
