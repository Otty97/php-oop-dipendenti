<?php

class Persona {
    protected $nome;
    protected $cognome;
    protected $codice_fiscale;


    public function __construct($nome, $cognome, $codice_fiscale = 'N.D.'){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->codice_fiscale = $codice_fiscale;
    }

    public function to_string(){
        echo 'Nome: ' . $this->nome . '<br>' . 'Cognome: ' . $this->cognome . '<br>' . 'C.F.: ' . $this->codice_fiscale;
    }

}

class Impiegato extends Persona {
    protected $codice_impiegato;
    protected $compenso;

    public function __construct($nome, $cognome, $codice, $compenso = '0', $codice_fiscale = 'N.D.'){
        parent::__construct($nome, $cognome, $codice_fiscale);
        $this->codice_impiegato = $codice;
        $this->compenso = $compenso;
    }

    public function calcola_compenso(){
        echo $this->compenso;
    }

    public function to_string(){
        echo 'Nome: ' . $this->nome . '<br>' . 'Cognome: ' . $this->cognome . '<br>' . 'Codice Impiegato: ' . $this->codice_impiegato . '<br>' . 'Compenso: ' . $this->compenso . '<br>' . 'C.F.: ' . $this->codice_fiscale;
    }

}

class ImpiegatoSalariato extends Impiegato {
    protected $giorni_lavorati;
    protected $compenso_giornaliero;

    public function __construct($nome, $cognome, $codice, $giorni_lavorati, $compenso_giornaliero, $compenso = '0', $codice_fiscale = 'N.D.'){
        parent::__construct($nome, $cognome, $codice, $compenso = '0', $codice_fiscale = 'N.D.');
        $this->giorni_lavorati = $giorni_lavorati;
        $this->compenso_giornaliero = $compenso_giornaliero;
    }

    public function calcola_compenso(){
        echo $this->giorni_lavorati * $this->compenso_giornaliero;
    }
}

class ImpiegatoAOre extends Impiegato {
    protected $ore_lavorate;
    protected $compenso_orario;

    public function __construct($nome, $cognome, $codice, $ore_lavorate, $compenso_orario, $compenso = '0', $codice_fiscale = 'N.D.'){
        parent::__construct($nome, $cognome, $codice, $compenso = '0', $codice_fiscale = 'N.D.');
        $this->ore_lavorate = $ore_lavorate;
        $this->compenso_orario = $compenso_orario;
    }

    public function calcola_compenso(){
        echo $this->ore_lavorate * $this->compenso_orario;
    }
}

trait Progetto {
    protected $nome;
    protected $commissione;
}

class ImpiegatoSuCommissione extends Impiegato{
    use Progetto;

    public function __construct($nome, $cognome, $codice, $commissione, $compenso = '0', $codice_fiscale = 'N.D.'){
        parent::__construct($nome, $cognome, $codice, $compenso = '0', $codice_fiscale = 'N.D.');
        $this->commissione = $commissione;
    }

    public function calcola_compenso(){
        echo $this->commissione;
    }
}


?>
