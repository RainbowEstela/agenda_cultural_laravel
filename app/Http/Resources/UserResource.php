<?php

namespace App\Http\Resources;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'rol' => $this->rol,
            'nombre' => $this->name,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'dni' => $this->dni,
            'edad' => $this->edad,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'telefono' => $this->telefono,
            'puesto' => $this->puesto,
            "empresa" => new EmpresaResource(Empresa::where('id', intval($this->empresa_id))->first()),

        ];
    }
}
