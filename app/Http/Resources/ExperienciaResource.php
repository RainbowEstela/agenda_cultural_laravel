<?php

namespace App\Http\Resources;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\User;
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
        $imagen = null;

        if ($this->imagen) {
            $imagen = asset('/storage/experiencias/' . $this->imagen);
        }

        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha' => $this->fecha,
            'fecha_string' => $this->fecha_string,
            'descripcion_corta' => $this->descripcion_corta,
            'descripcion_larga' => $this->descripcion_larga,
            'precio' => $this->precio,
            'link' => $this->link,
            'imagen' => $imagen,
            "categoria_id" => new CategoriaResource(Categoria::where('id', intval($this->categoria_id))->first()),
            "empresa_id" => new EmpresaResource(Empresa::where('id', intval($this->empresa_id))->first()),
        ];
    }
}
