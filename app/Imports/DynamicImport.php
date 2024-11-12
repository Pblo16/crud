<?php

namespace App\Imports;

use App\Models\Contact; // Cambia al modelo correcto
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Coordinate;
use App\Models\PersonalData;

class DynamicImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Obtenemos todas las coordenadas
        $coordinates = Coordinate::all();
        $value = "";
        foreach ($rows as $rowIndex => $row) {
            // Recorremos cada coordenada para extraer el dato específico
            foreach ($coordinates as $coordinate) {
                // Verifica que el índice de la fila coincida con el de la coordenada
                if ($rowIndex + 1 == $coordinate->row) {
                    $value = $row[$coordinate->column - 1] ?? null; // Almacena el dato directamente
                    dump($value);
                    PersonalData::create([
                        'coordinate_id' => $coordinate->id,
                        'value' => $value, // Primeros tres elementos como nombre completo 
                    ]);
                }
            }
        }
    }
}
