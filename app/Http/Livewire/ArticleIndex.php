<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annuncement;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $order = 'DESC';
    public $created_at;
    public $price;
    public $provincia;
    public $title;
    public $price_min;
    public $price_max;
    public $a = 0;

    protected $rules = [
        'price_min' => 'min:0|lte:price_max',

        'price_max' => 'min:0|gte:price_min',

    ];

    public function render()
    {
        // $this->validate();
        $annuncements = Annuncement::where('is_accepted', true)->where(function ($subQuery) {

            if (!empty($this->provincia)) {

                $subQuery->where('provincia', $this->provincia);
            }

            if (!empty($this->price_min)) {
                $subQuery->where('price', '>=', $this->price_min);
            }
            if (!empty($this->price_max)) {
                $subQuery->where('price', '<=', $this->price_max);
            }

            // $subQuery->where('title', 'like', $this->title);
        });

        if ($this->a == 0) {
            $annuncements = $annuncements->orderBy('created_at', 'DESC')->paginate(6);  //Ordine di default
        }
        if ($this->a == 1) {
            $annuncements = $annuncements->orderBy('created_at', $this->order)->paginate(6);  //Ordinato in base alla data
        }
        if ($this->a == 2) {
            $annuncements = $annuncements->orderBy('price', $this->order)->paginate(6);  //Ordinato in base al prezzo
        }

        return view('livewire.article-index', ['annuncements' => $annuncements]);
    }

    public function updated($proprertyName)
    {
        if (($this->price_min != 0 && $this->price_max != 0) || ($this->price_max != 0 && $this->price_min != 0)) {

            $this->validateOnly($proprertyName);
        }
    }

    public function order_by_newest()
    {
        $this->a = 1;
        $this->order = 'DESC';
    }
    public function order_by_oldest()
    {
        $this->a = 1;
        $this->order = 'ASC';
    }

    public function order_by_cheap()
    {
        $this->a = 2;
        $this->order = 'DESC';
    }
    public function order_by_expensive()
    {
        $this->a = 2;
        $this->order = 'ASC';
    }


    // public function order_by_ascendentAflfabetic()
    // {
    //
    //     $this->order = 'ASC';
    // }

    // public function order_by_descendantAflfabetic()
    // {
    //
    //     $this->order = 'DESC';
    // }




}
