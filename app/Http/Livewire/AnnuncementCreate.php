<?php

namespace App\Http\Livewire;

use File;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Model\Annuncement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\WaterMark;
use Illuminate\Support\Facades\Auth;

class AnnuncementCreate extends Component
{
    use WithFileUploads;


    public $title;
    public $description;
    public $price;
    public $category;
    public $provincia;
    public $temporary_images;
    public $images = [];
    public $annuncement;


    protected $rules = [
        'title' => 'required|min:2|max:80',
        'description' => 'required|min:10|max:255',
        'price' => 'required|numeric|min:0',
        'category' => 'required',
        'provincia' => 'required',
        'images.*' => 'image|max:5120',
        'temporary_images.*' => 'image|max:10240',

    ];

    // messaggi personalizzati
    // protected $messages = [
    //     'title.required' => "E' richiesto un titolo",
    //     'title.min' => "E' richiesto un minimo di 2 lettere",
    //     'title.max' => "E' richiesto un massimo di 80 lettere",
    //     'description.required' => "E' richiesta una descrizione",
    //     'description.min' => "E' richiesto un minimo di 10 lettere",
    //     'description.max' => "E' richiesto un massimo di 255 lettere",
    //     'price.required' => "E' richiesto un prezzo",
    //     'price.numeric' => "E' richiesto che sia un numero",
    //     'category' => "E' richiesta una categoria",
    //     'price.min' => "E' richiesto che sia un numero maggiore di 0",
    //     'provincia.required' => "Selezionare la provincia",
    //     'temporary_images.required' => "L'immagine è richiesta",
    //     'temporary_images.*.required' => 'I file devono essere immagini',
    //     'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1MB',
    //     'images.image' => 'L\'immagine dev\'essere un\'immagine',
    //     'images.max' => 'L\'immagine dev\'essere massimo di 1MB',


    // ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:102400',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function store()
    {
        $this->validate();

        $category = Category::find($this->category);

        $this->annuncement = $category->annuncements()->create([
            'title' => $this->title,
            'description' => $this->description,
            'price' =>  $this->price,
            'category' => $this->category,
            'provincia' => $this->provincia,
            'user_id' => Auth::user()->id,
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

        Auth::user()->annuncements()->save($this->annuncement);

        session()->flash('message', 'Hai correttamenre inserito il tuo articolo');

        $this->cleanForm();
    }

    public function updated($proprertyName)
    {
        $this->validateOnly($proprertyName);
    }


    public function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->image = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->provincia = '';
    }

    public function render()
    {
        return view('livewire.annuncement-create');
    }
}
