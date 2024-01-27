<?php

namespace App\Console\Commands;

use App\Models\Document;
use Illuminate\Console\Command;

class ChangeDocumentDisponibiliteStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-document-disponibilite-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette tâche change le statut disponibilite d\'un Document une fois ce dernier devenu communicable';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Document::all() as $document) {
            if ($document->communicable && !$document->prete) {
                $document->update(['disponibilite' => 1]);
            }
        }
    }
}
