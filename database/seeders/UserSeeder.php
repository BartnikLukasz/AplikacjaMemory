<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level_difficulty')->insert([

            [
                'id' => '1',
                'level' => '1',
                'amount_of_pictures' => '3',
                'multiplier' => '1',
            ],
            [
                'id' => '2',
                'level' => '2',
                'amount_of_pictures' => '6',
                'multiplier' => '2',
            ],
            [
                'id' => '3',
                'level' => '3',
                'amount_of_pictures' => '10',
                'multiplier' => '3',
            ]

        ]);
        
        DB::table('role')->insert([

            [
                'id' => '1',
                'name' => 'USER',
            ],
            [
                'id' => '2',
                'name' => 'ADMINISTRATOR',
            ]

        ]);

        DB::table('user')->insert([
           
            'id' => '1',
            'nickname' => 'Admin',
            'email' => 'aplikacja.memory@gmail.com',
            'password' => Hash::make('Admin123'),
            'role_id' => '2',
            'ranking_points' => '1',

        ]);

        DB::table('category')->insert([
            [
                'id' => '1',
                'name' => 'Owoce',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '2',
                'name' => 'Warzywa',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '3',
                'name' => 'Zwierzęta',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '4',
                'name' => 'Pojazdy',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '5',
                'name' => 'Zawody',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '6',
                'name' => 'Flagi',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '7',
                'name' => 'Ubrania',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],
            [
                'id' => '8',
                'name' => 'Instrumenty',
                'author' => '1',
                'status' => '1',
                'reported' => '0',
            ],

        ]);

        DB::table('picture')->insert([
            [
                'id' => '1',
                'word' => 'Granat',
                'link' => '/pictures/Owoce/granat.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '2',
                'word' => 'Brzoskwinia',
                'link' => '/pictures/Owoce/brzoskwinia.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '3',
                'word' => 'Kiwi',
                'link' => '/pictures/Owoce/kiwi.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '4',
                'word' => 'Cytryna',
                'link' => '/pictures/Owoce/cytryna.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '5',
                'word' => 'Pomarańcza',
                'link' => '/pictures/Owoce/pomarańcza.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '6',
                'word' => 'Maliny',
                'link' => '/pictures/Owoce/maliny.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '7',
                'word' => 'Gruszka',
                'link' => '/pictures/Owoce/gruszka.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '8',
                'word' => 'Jabłko',
                'link' => '/pictures/Owoce/jabłko.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '9',
                'word' => 'Ananas',
                'link' => '/pictures/Owoce/ananas.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '10',
                'word' => 'Banan',
                'link' => '/pictures/Owoce/banan.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '11',
                'word' => 'Arbuz',
                'link' => '/pictures/Owoce/arbuz.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '12',
                'word' => 'Truskawka',
                'link' => '/pictures/Owoce/truskawka.jpg',
                'category_id' => '1',
            ],
            [
                'id' => '13',
                'word' => 'Bakłażan',
                'link' => '/pictures/Warzywa/bakłażan.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '14',
                'word' => 'Brokuł',
                'link' => '/pictures/Warzywa/brokuł.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '15',
                'word' => 'Cebula',
                'link' => '/pictures/Warzywa/cebula.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '16',
                'word' => 'Cukinia',
                'link' => '/pictures/Warzywa/cukinia.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '17',
                'word' => 'Czosnek',
                'link' => '/pictures/Warzywa/czosnek.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '18',
                'word' => 'Dynia',
                'link' => '/pictures/Warzywa/dynia.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '19',
                'word' => 'Kalafior',
                'link' => '/pictures/Warzywa/kalafior.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '20',
                'word' => 'Kapusta',
                'link' => '/pictures/Warzywa/kapusta.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '21',
                'word' => 'Kukurydza',
                'link' => '/pictures/Warzywa/kukurydza.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '22',
                'word' => 'Marchewka',
                'link' => '/pictures/Warzywa/marchewka.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '23',
                'word' => 'Ogórek',
                'link' => '/pictures/Warzywa/ogórek.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '24',
                'word' => 'Papryka',
                'link' => '/pictures/Warzywa/papryka.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '25',
                'word' => 'Pieczarki',
                'link' => '/pictures/Warzywa/pieczarki.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '26',
                'word' => 'Pomidor',
                'link' => '/pictures/Warzywa/pomidor.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '27',
                'word' => 'Por',
                'link' => '/pictures/Warzywa/por.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '28',
                'word' => 'Ziemniaki',
                'link' => '/pictures/Warzywa/ziemniaki.jpg',
                'category_id' => '2',
            ],
            [
                'id' => '29',
                'word' => 'Bóbr',
                'link' => '/pictures/Zwierzęta/bóbr.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '30',
                'word' => 'Koń',
                'link' => '/pictures/Zwierzęta/koń.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '31',
                'word' => 'Koza',
                'link' => '/pictures/Zwierzęta/koza.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '32',
                'word' => 'Krowa',
                'link' => '/pictures/Zwierzęta/krowa.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '33',
                'word' => 'Lew',
                'link' => '/pictures/Zwierzęta/lew.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '34',
                'word' => 'Lis',
                'link' => '/pictures/Zwierzęta/lis.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '35',
                'word' => 'Łoś',
                'link' => '/pictures/Zwierzęta/łoś.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '36',
                'word' => 'Niedźwiedź',
                'link' => '/pictures/Zwierzęta/niedźwiedź.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '37',
                'word' => 'Owca',
                'link' => '/pictures/Zwierzęta/owca.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '38',
                'word' => 'Słoń',
                'link' => '/pictures/Zwierzęta/słoń.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '39',
                'word' => 'Świnia',
                'link' => '/pictures/Zwierzęta/świnia.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '40',
                'word' => 'Tygrys',
                'link' => '/pictures/Zwierzęta/tygrys.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '41',
                'word' => 'Wiewiórka',
                'link' => '/pictures/Zwierzęta/wiewiórka.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '42',
                'word' => 'Wilk',
                'link' => '/pictures/Zwierzęta/wilk.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '43',
                'word' => 'Zając',
                'link' => '/pictures/Zwierzęta/zając.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '44',
                'word' => 'Zebra',
                'link' => '/pictures/Zwierzęta/zebra.jpg',
                'category_id' => '3',
            ],
            [
                'id' => '45',
                'word' => 'Autobus',
                'link' => '/pictures/Pojazdy/autobus.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '46',
                'word' => 'Balon',
                'link' => '/pictures/Pojazdy/balon.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '47',
                'word' => 'Łódka',
                'link' => '/pictures/Pojazdy/łódka.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '48',
                'word' => 'Pociąg',
                'link' => '/pictures/Pojazdy/pociąg.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '49',
                'word' => 'Rower',
                'link' => '/pictures/Pojazdy/rower.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '50',
                'word' => 'Samochód',
                'link' => '/pictures/Pojazdy/samochód.jpg',
                'category_id' => '4',
            ],[
                'id' => '51',
                'word' => 'Samolot',
                'link' => '/pictures/Pojazdy/samolot.jpg',
                'category_id' => '4',
            ],[
                'id' => '52',
                'word' => 'Skuter',
                'link' => '/pictures/Pojazdy/skuter.jpg',
                'category_id' => '4',
            ],[
                'id' => '53',
                'word' => 'Statek',
                'link' => '/pictures/Pojazdy/statek.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '54',
                'word' => 'Taksówka',
                'link' => '/pictures/Pojazdy/taksówka.jpg',
                'category_id' => '4',
            ],
            [
                'id' => '55',
                'word' => 'Hydraulika',
                'link' => '/pictures/Zawody/hydraulik.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '56',
                'word' => 'Kucharz',
                'link' => '/pictures/Zawody/kucharz.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '57',
                'word' => 'Lekarz',
                'link' => '/pictures/Zawody/lekarz.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '58',
                'word' => 'Malarka',
                'link' => '/pictures/Zawody/malarka.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '59',
                'word' => 'Marynarz',
                'link' => '/pictures/Zawody/marynarz.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '60',
                'word' => 'Nauczyciel',
                'link' => '/pictures/Zawody/nauczycielka.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '61',
                'word' => 'Piłkarz',
                'link' => '/pictures/Zawody/piłkarz.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '62',
                'word' => 'Piosenkarka',
                'link' => '/pictures/Zawody/piosenkarka.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '63',
                'word' => 'Policjant',
                'link' => '/pictures/Zawody/policjant.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '64',
                'word' => 'Strażak',
                'link' => '/pictures/Zawody/strażak.jpg',
                'category_id' => '5',
            ],
            [
                'id' => '65',
                'word' => 'Belgia',
                'link' => '/pictures/Flagi/belgia.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '66',
                'word' => 'Czechy',
                'link' => '/pictures/Flagi/czechy.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '67',
                'word' => 'Francja',
                'link' => '/pictures/Flagi/francja.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '68',
                'word' => 'Hiszpania',
                'link' => '/pictures/Flagi/hiszpania.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '69',
                'word' => 'Holandia',
                'link' => '/pictures/Flagi/holandia.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '70',
                'word' => 'Irlandia',
                'link' => '/pictures/Flagi/irlandia.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '71',
                'word' => 'Islandia',
                'link' => '/pictures/Flagi/islandia.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '72',
                'word' => 'Japonia',
                'link' => '/pictures/Flagi/japonia.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '73',
                'word' => 'Kanada',
                'link' => '/pictures/Flagi/kanada.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '74',
                'word' => 'Niemcy',
                'link' => '/pictures/Flagi/niemcy.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '75',
                'word' => 'Polska',
                'link' => '/pictures/Flagi/polska.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '76',
                'word' => 'Rosja',
                'link' => '/pictures/Flagi/rosja.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '77',
                'word' => 'Słowacja',
                'link' => '/pictures/Flagi/słowacja.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '78',
                'word' => 'Wielka Brytania',
                'link' => '/pictures/Flagi/wielka_brytania.jpg',
                'category_id' => '6',
            ],
            [
                'id' => '79',
                'word' => 'Bluzka',
                'link' => '/pictures/Ubrania/bluzka.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '80',
                'word' => 'Buty',
                'link' => '/pictures/Ubrania/buty.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '81',
                'word' => 'Kapelusz',
                'link' => '/pictures/Ubrania/kapelusz.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '82',
                'word' => 'Koszula',
                'link' => '/pictures/Ubrania/koszula.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '83',
                'word' => 'Pasek',
                'link' => '/pictures/Ubrania/pasek.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '84',
                'word' => 'Skarpety',
                'link' => '/pictures/Ubrania/skarpety.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '85',
                'word' => 'Spodenki',
                'link' => '/pictures/Ubrania/spodenki.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '86',
                'word' => 'Spodnie',
                'link' => '/pictures/Ubrania/spodnie.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '87',
                'word' => 'Sukienka',
                'link' => '/pictures/Ubrania/sukienka.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '88',
                'word' => 'Torebka',
                'link' => '/pictures/Ubrania/torebka.jpg',
                'category_id' => '7',
            ],
            [
                'id' => '89',
                'word' => 'Bębenek',
                'link' => '/pictures/Instrumenty/bębenek.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '90',
                'word' => 'Cymbałki',
                'link' => '/pictures/Instrumenty/cymbałki.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '91',
                'word' => 'Flet',
                'link' => '/pictures/Instrumenty/flet.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '92',
                'word' => 'Fortepian',
                'link' => '/pictures/Instrumenty/fortepian.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '93',
                'word' => 'Gitara',
                'link' => '/pictures/Instrumenty/gitara.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '94',
                'word' => 'Grzechotki',
                'link' => '/pictures/Instrumenty/grzechotki.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '95',
                'word' => 'Harfa',
                'link' => '/pictures/Instrumenty/harfa.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '96',
                'word' => 'Tamburyn',
                'link' => '/pictures/Instrumenty/tamburyn.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '97',
                'word' => 'Trąbka',
                'link' => '/pictures/Instrumenty/trąbka.jpg',
                'category_id' => '8',
            ],
            [
                'id' => '98',
                'word' => 'Trójkąt',
                'link' => '/pictures/Instrumenty/trójkąt.jpg',
                'category_id' => '8',
            ],
            
        ]);

        DB::table('unlock_category')->insert([

            [
                'id' => '1',
                'user_id' => '1',
                'category_id' => '1',
            ],
            [
                'id' => '2',
                'user_id' => '1',
                'category_id' => '2',
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'category_id' => '3',
            ],
            [
                'id' => '4',
                'user_id' => '1',
                'category_id' => '4',
            ],
            [
                'id' => '5',
                'user_id' => '1',
                'category_id' => '5',
            ],
            [
                'id' => '6',
                'user_id' => '1',
                'category_id' => '6',
            ],
            [
                'id' => '7',
                'user_id' => '1',
                'category_id' => '7',
            ],
            [
                'id' => '8',
                'user_id' => '1',
                'category_id' => '8',
            ],

        ]);
       
    }
}
