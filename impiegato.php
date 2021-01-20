<?php

class NomeException extends Exception {
                public function __construct($message=null,$code=0){
                    echo $message;
                }
            }

class CognomeException extends Exception {
    public function __construct($message=null,$code=0){
        echo $message;
    }
}

class CfException extends Exception {
    public function __construct($message=null,$code=0){
        echo $message;
    }
}

class Persona{

    private $nome;
    private $cognome;
    private $codice_fiscale;


    public function __construct($nome,$cognome,$codice_fiscale){

            if(!is_string($nome)){
                throw new NomeException('ERRORE $nome');
            }

            if(!(is_string($cognome))){
                throw new CognomeException('ERRORE $cognome');
            }

            if(strlen($codice_fiscale)!=4){
                throw new CfException('ERRORE $codice_fiscale');
            }

            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->codice_fiscale = $codice_fiscale;
        }

    public function to_string(){

        return 'nome: ' . $this->nome . ' ; cognome: ' . $this->cognome  . ' ; codice fiscale: ' . $this->codice_fiscale;
    }
}

class Impiegato extends Persona{

    private $codice_impiegato;
    protected $compenso;

    public function __construct($init_impiegato){

        parent::__construct(
            $init_impiegato['nome'],
            $init_impiegato['cognome'],
            $init_impiegato['codice_fiscale']
        );

        $this->codice_impiegato = $init_impiegato['codice_impiegato'];
        $this->calcola_compenso();

    }

    public function to_string(){
        return parent::to_string() . ' ; codice-imp: ' . $this->codice_impiegato . ' ; compenso: ' . $this->compenso;
    }


    public function calcola_compenso(){
        return $this->compenso = 0;
    }
}

class ImpiegatoSalariato extends Impiegato{

    private $giorni_lavorati;
    private $compenso_giornaliero;

    public function __construct($init_is){

                parent::__construct($init_is);

                $this->giorni_lavorati = $init_is['giorni_lavorati'];
                $this->compenso_giornaliero = $init_is['compenso_giornaliero'];
                $this->calcola_compenso();
        }

    public function calcola_compenso(){
        $this->compenso = $this->giorni_lavorati * $this->compenso_giornaliero;
        return $this->compenso;
    }
}

class ImpiegatoAOre extends Impiegato{

    private $ore_lavorate;
    private $compenso_orario;

    public function __construct($init_iao){

                parent::__construct($init_iao);

                $this->ore_lavorate = $init_iao['ore_lavorate'];
                $this->compenso_orario = $init_iao['compenso_orario'];
                $this->calcola_compenso();
        }

    public function calcola_compenso(){
        $this->compenso = $this->ore_lavorate * $this->compenso_orario;
        return $this->compenso;
    }
}

trait Progetto {
    private $nome_progetto;
    protected $commissione;
}

class ImpiegatoSuCommissione extends Impiegato{

    use Progetto;

    const PROPORZIONE = 0.8;

    public function __construct($init_isc, $nome_proj, $commissione){


            parent::__construct($init_isc);

            if(!is_string($nome_proj)){ 
                throw new Exception ('SEI ENTRATO IN UN ECCEZIONE!!! nome_proj non è una stringa');
            }

            if(!is_numeric($commissione)){
                throw new Exception ('SEI ENTRATO IN UN ECCEZIONE!!! commissione non è un numero');
            }

            $this->nome_progetto = $nome_proj;
            $this->commissione = $commissione;
            $this->calcola_compenso();



        }

    public function calcola_compenso(){
        return $this->compenso = $this->commissione * self::PROPORZIONE;
    }

    public function fun(){

        if($this->compenso < 1000){
            throw new Exception('this is not funny');
        }
    }
}

?>
