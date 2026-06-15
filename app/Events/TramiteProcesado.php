<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use App\Models\RecaudoTramite;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TramiteProcesado
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public RecaudoTramite $tramite;
    public array $persona;

    public function __construct(RecaudoTramite $tramite, array $persona)
    {
        $this->tramite = $tramite;
        $this->persona = $persona;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
