<?php
class Cuenta {
    private $saldo;
    

    public function __construct($saldoInicial) {
        $this->saldo = $saldoInicial;
    }

    public function depositar($monto) {
            $this->saldo += $monto;
        }


    public function retirar($monto) {
        if ($monto <= $this->saldo) {
            $this->saldo -= $monto;
        } else {
            echo "No hay fondos suficiantes";
        }
    }
     public function getSaldo() {
        return $this->saldo;
    }
}

class CuentaPremium extends Cuenta {
    private $bonificacion; 

    public function __construct($saldoInicial, $bonificacion) {
        parent::__construct($saldoInicial);
        $this->bonificacion = $bonificacion;
    }

    public function aplicarBonificacion() {
        $bono = $this->saldo * ($this->bonificacion / 100);
        $this->saldo += $bono;
    }
}


$cuenta = new CuentaPremium(10000, 20); 
$cuenta->aplicarBonificacion();
echo "El saldo después de aplicar bonificación: " . $cuenta->getSaldo();

?>
