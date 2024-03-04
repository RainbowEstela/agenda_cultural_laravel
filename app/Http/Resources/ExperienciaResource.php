<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha' => $this->fecha,
            'fecha_string' => $this->fecha_string,
            'descripcion_corta' => $this->descripcion_corta,
            'descripcion_larga' => $this->descripcion_larga,
            'precio' => $this->precio,
            'link' => $this->link,
            'imagen' => $this->imagen,
            "categoria_id" => $this->categoria_id,
            "empresa_id" => $this->empresa_id
        ];
    }
}
