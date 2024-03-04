<?php

namespace App\Http\Resources;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InscriptionResource extends JsonResource
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
            'numeroEntradas' => $this->numero_entradas,
            'estado' => $this->estado,
            "asistente" => new UserResource(User::where('id', intval($this->user_id))->first()),
            "evento" => new EventoResource(Evento::where('id', intval($this->evento_id))->first())
        ];
    }
}
