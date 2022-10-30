<?php

namespace App\Http\Livewire;

use File;
use App\Jobs\WaterMark;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Annuncement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;

class AnnuncementEditForm extends Component
{
    use WithFileUploads;


    public $annuncement;
    public $title;
    public $description;
    public $price;
    public $category_id;
    public $provincia;
    public $images = [];
    public $old_images = [];

    protected $rules = [
        'title' => 'required|min:2|max:80',
        'description' => 'required|min:10|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required',
        'provincia' => 'required',
        'images.*' => 'image|max:10240',
        'old_images.*' => 'image|max:10240',
    ];
    
    public function update()
    {
        $this->validate();

        $annuncement = Annuncement::find($this->annuncement->id);

        $annuncement->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'provincia' => $this->provincia,
        ]);

        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $annuncement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "announcements/{$this->annuncement->id}";
                $newImage = $this->annuncement->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    // resize immagini
                    new ResizeImage($newImage->path, 300, 300),

                    // IA per gestione di ricerca violenza ecc
                    new GoogleVisionSafeSearch($newImage->id),

                    // descizione contenuto immagini
                    new GoogleVisionLabelImage($newImage->id),
                    // waterMark
                    new WaterMark($newImage->id),

                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('message', 'Hai modificato il tuo articolo');

        $annuncement->is_accepted = NULL;

        $annuncement->save();
    }


    public function mount()
    {
        $annuncement = Annuncement::find($this->annuncement->id);

        $this->title = $annuncement->title;
        $this->price = $annuncement->price;
        $this->category_id = $annuncement->category_id;
        $this->description = $annuncement->description;
        $this->provincia = $annuncement->provincia;
        $this->old_images = $annuncement->images;
    }
    public function render()
    {
        return view('livewire.annuncement-edit-form');
    }
}
