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
        $data = [];
        foreach ($rows as $rowIndex => $row) {

            // Recorremos cada coordenada para extraer el dato específico
            foreach ($coordinates as $coordinate) {
                // Verifica que el índice de la fila coincida con el de la coordenada
                if ($rowIndex + 1 == $coordinate->row) {
                    // Define el rango de columnas a extraer
                    $columns = range(strtoupper($coordinate->column_start), strtoupper($coordinate->column_end));

                    foreach ($columns as $column) {
                        $columnIndex = strtolower($column);
                        $data[] = $row[$columnIndex] ?? null; // Almacena el dato directamente
                    }
                }
            }
        }
        // Solo intenta guardar si hay datos extraídos
        if (!empty(array_filter($data))) {
            // Crea el contacto en la base de datos, uniendo el nombre completo
            PersonalData::create([
                'name' => implode(' ', array_slice($data, 0, 3)), // Primeros tres elementos como nombre completo
                'phone' => $data[4] ?? null,                      // Cuarto elemento como teléfono
                'email' => $data[6] ?? null,                      // Quinto elemento como email
            ]);
        }
    }
}
