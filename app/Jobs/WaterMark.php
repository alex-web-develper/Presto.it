<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class WaterMark implements ShouldQueue
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
        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);


        $image = SpatieImage::load($srcPath);

        $image->watermark(base_path('resources/img/trasparent-logo-bw.png'))
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
            ->watermarkOpacity(70)
            ->watermarkPadding(1, 1, Manipulations::UNIT_PERCENT)
            ->watermarkHeight(12, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(12, Manipulations::UNIT_PERCENT);

        $image->save($srcPath);
    }
}
