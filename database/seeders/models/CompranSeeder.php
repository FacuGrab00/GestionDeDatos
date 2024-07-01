<?php

namespace Database\Seeders\models;

use App\Models\Compran;
use App\Models\Inmueble;
use App\Models\Registran;
use App\Models\Trabajan;
use DateTime;
use Illuminate\Database\Seeder;

class CompranSeeder extends Seeder
{
    public function run()
    {
        $inmuebles = Inmueble::inRandomOrder()->limit(100)->get();
        foreach ($inmuebles as $inmueble) {
            $agencia = $inmueble->agencia;
            $trabajan = Trabajan::where('codigo_de_agencia', $agencia->codigo_de_agencia)->inRandomOrder()->first();

            if ($trabajan) {
                $registran = Registran::where('codigo_de_agencia', $agencia->codigo_de_agencia)->inRandomOrder()->first();

                if ($registran) {
                    $cliente = $registran->cliente;
                    $agente = $trabajan->agenteComercial;

                    if ($cliente && $agente) {

                        $fechaRegistro = $registran->fecha_registro;
                        $fechaCompra = $this->randomDate($fechaRegistro, now());

                        Compran::create([
                            'DNI_cliente' => $cliente->DNI,
                            'codigo_cliente' => $cliente->codigo_cliente,
                            'DNI_agente' => $agente->DNI,
                            'codigo_inmueble' => $inmueble->codigo_inmueble,
                            'fecha_compra' => $fechaCompra,
                        ]);

                        $inmueble->update(['propietario' => $cliente->DNI]);
                    }
                }
            }
        }
    }

    /**
     * Genera una fecha aleatoria entre $startDate y $endDate.
     *
     * @param DateTime|string $startDate
     * @param DateTime|string $endDate
     * @return DateTime
     */
    private function randomDate($startDate, $endDate)
    {
        $startTimestamp = is_string($startDate) ? strtotime($startDate) : $startDate->getTimestamp();
        $endTimestamp = is_string($endDate) ? strtotime($endDate) : $endDate->getTimestamp();

        $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

        return new DateTime(date('Y-m-d H:i:s', $randomTimestamp));
    }
}
