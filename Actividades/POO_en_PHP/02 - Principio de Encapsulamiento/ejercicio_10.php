<?php
class CuentaCorriente {
    private $saldo;
    private $limite;

    public function __construct($saldoInicial, $limite) {
        $this->saldo = $saldoInicial;
        $this->limite = $limite;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function retirar($monto) {
        if ($monto <= $this->saldo + $this->limite) {
            $this->saldo -= $monto;
        }
    }
}

$cuenta = new CuentaCorriente(500, 200);
$cuenta->retirar(600); 
$cuenta->retirar(200); 
echo "Saldo restante: " . $cuenta->getSaldo();
?>