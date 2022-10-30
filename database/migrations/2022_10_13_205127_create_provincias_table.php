<?php

use App\Models\Provincia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $provinces = ['Agrigento',



            'Alessandria',



             'Ancona',



             'Aosta',



             'Ascoli Piceno',



             'Asti',



             'Avellino',



             'Bari',



             'Barletta-Andria-Trani',


             'Belluno',


             'Benevento',


             'Bergamo',


             'Biella',


             'Bologna',


             'Bolzano',


             'Brescia',


             'Brindisi',


             'Cagliari',


             'Caltanissetta',


             'Campobasso',


             'Caserta',


             'Catania',


             'Catanzaro',


             'Chieti',


             'Como',


             'Cosenza',


             'Cremona',


             'Crotone',


             'Cuneo',


             'Enna',


             'Fermo',


             'Ferrara',


             'Firenze',


             'Foggia',


             'Forli-Cesena',


             'Frosinone',


             'Genova',


             'Gorizia',


             'Grosseto',


             'Imperia',


             'Isernia',


             'La Spezia',


             'Latina',


             'Lecce',


             'Lecco',


             'Livorno',


             'Lodi',


             'Lucca',


             'Macerata',


             'Mantova',


             'Massa Carrara',


             'Matera',


             'Medio Campidano',


             'Messina',


             'Milano',


             'Modena',


             'Monza-Brianza',


             'Napoli',


             'Novara',


             'Nuoro',


             'Ogliastra',


             'Olbia Tempio',


             'Oristano',


             'Padova',


             'Palermo',


             'Parma',


             'Pavia',


             'Perugia',


             'Pesaro-Urbino',


             'Pescara',


             'Piacenza',


             'Pisa',


             'Pistoia',


             'Pordenone',


             'Potenza',


             'Prato',


             'Ragusa',


             'Ravenna',


             'Reggio Calabria',


             'Reggio Emilia',


             'Rieti',


             'Rimini',


             'Roma',


             'Rovigo',


             'Salerno',


             'Sassari',


             'Savona',


             'Siena',


             'Siracusa',


             'Sondrio',


             'Taranto',


             'Teramo',


             'Terni',


             'Torino',


             'Trapani',


             'Trento',


             'Treviso',


             'Trieste',


             'Udine',


             'Varese',


             'Venezia',


             'Vercelli',


             'Verona',


             'Vibo Valentia	',


             'Vicenza',


             'Viterbo',];

             foreach ($provinces as $province) {
                Provincia::create(['name'=>$province]);
             }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
};
