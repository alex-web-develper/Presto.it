<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $annuncement_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($annuncement_image_id)
    {
        $this->annuncement_image_id = $annuncement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = Image::find($this->annuncement_image_id);
        if (!$i) {
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        // $safe è la response del safeSearchDetection

        $safe = $response->getSafeSearchAnnotation();

        // salviamo i valori
        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        // creiamo un "dizionario" per indentificare la classe aggiunta
        // da modificare eventuali colori(vedi ciro Rompiscatole per lo stile)
        $likelihoodName = [
            'text-secondary bi bi-question-circle-fill', 'text-success bi bi-check-circle-fill', 'text-success bi bi-check-circle-fill',
            'text-warning bi bi-exclamation-circle-fill', 'text-warning bi bi-exclamation-circle-fill', 'text-danger bi bi-x-circle-fill'
        ];


        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();
    }
}
