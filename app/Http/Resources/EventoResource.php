<?php

namespace App\Http\Resources;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
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
            $imagen = asset('/storage/eventos/' . $this->imagen);
        }


        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'descripcion' => $this->descripcion,
            'ciudad' => $this->ciudad,
            'direccion' => $this->direccion,
            'estado' => $this->estado,
            'aforo' => $this->aforo,
            'tipo' => $this->tipo,
            'entradas_persona' => $this->entradas_persona,
            'imagen' =>  $imagen,
            'categoria' => new CategoriaResource(Categoria::where('id', intval($this->categoria_id))->first()),
            "creador" => new UserResource(User::where('id', intval($this->user_id))->first())

        ];
    }
}
