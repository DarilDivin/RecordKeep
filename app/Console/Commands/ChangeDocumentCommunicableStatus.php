<?php

namespace App\Console\Commands;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeDocumentCommunicableStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-document-communicable-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette tâche change le statut communicable d\'un Document une fois sa Durée de communicabilité écoulée';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Document::all() as $document) {
            if (Carbon::now()->addYears($document->naturedocument->duree_communicabilte)->isPast()) {
                $document->update(['communicable' => 1]);
            }
        }
    }
}
