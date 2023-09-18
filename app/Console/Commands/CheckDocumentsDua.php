<?php

namespace App\Console\Commands;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckDocumentsDua extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-documents-dua';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /* $documents = Document::all();
        foreach($documents as $document) {
            $dua = Carbon::now()->subYears($document->dua);
            if($dua->isPast()) {
                $document->update([
                    'disponibilite' => 1
                ]);
            } else {
                $document->update([
                    'disponibilite' => 0
                ]);
            }
            $this->info('Vérification Terminée'); */

        $documents = Document::all();
        foreach($documents as $document) {
            $duaAndCreatedAt = $document->created_at->addYears($document->dua);
            if(Carbon::now()->isAfter($duaAndCreatedAt)) {
                $document->update([
                    'disponibilite' => 1
                ]);
            } else {
                $document->update([
                    'disponibilite' => 0
                ]);
            }
            $this->info('Vérification Terminée');
        }
    }
}
