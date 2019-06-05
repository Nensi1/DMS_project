<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Area;
use App\Category;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area=Area::where('name', '21')->first();
        $category=Category::where('name', 'Gym')->first();

        $client = new Client();
        $client->name='Olympia';
        $client->address='Mustafa Haska st, nd 21';
        $client->email='olyfit@gmail.com';
        $client->phone='0692643443';
        $client->nipt='JB0423452B';
        $client->city='Tirane';
        $client->password=bcrypt('client');
        $client->category()->associate($category);
        $client->area()->associate($area);
        $client->save();

        $area2=Area::where('name', 'ish Blloku')->first();
        $category2=Category::where('name', 'Supermarket')->first();

        $client2 = new Client();
        $client2->name='EuroMarket';
        $client2->address='rr Perlat Rexhepi';
        $client2->email='euromarket@gmail.com';
        $client2->phone='0693343433';
        $client2->nipt='JB0435452B';
        $client2->city='Tirane';
        $client2->password=bcrypt('euromarket');
        $client2->category()->associate($category2);
        $client2->area()->associate($area2);
        $client2->save();


        $area3=Area::where('name', 'Laprake')->first();
        $category3=Category::where('name', 'Bar/Restaurant')->first();

        $client3 = new Client();
        $client3->name='Sophie';
        $client3->address='rr Teodor Keko';
        $client3->email='sophie@gmail.com';
        $client3->phone='0698967443';
        $client3->nipt='JB0422347B';
        $client3->city='Tirane';
        $client3->password=bcrypt('sophie');
        $client3->category()->associate($category3);
        $client3->area()->associate($area3);
        $client3->save();

        $area4=Area::where('name', 'Zogu I')->first();
        $category4=Category::where('name', 'Gym')->first();

        $client4 = new Client();
        $client4->name='Perfect Fitness';
        $client4->address='ish Drejtoria e Higjenes, rruga S.G';
        $client4->email='pf@gmail.com';
        $client4->phone='0691213145';
        $client4->nipt='JB0423111B';
        $client4->city='Tirane';
        $client4->password=bcrypt('perfect');
        $client4->category()->associate($category4);
        $client4->area()->associate($area4);
        $client4->save();

        $area5=Area::where('name', 'Myslym Shyri')->first();
        $category5=Category::where('name', 'Bar/Restaurant')->first();

        $client5 = new Client();
        $client5->name='Mon Cheri';
        $client5->address='rr Myslym Shyri';
        $client5->email='mch@gmail.com';
        $client5->phone='0690908076';
        $client5->nipt='JB0984452B';
        $client5->city='Tirane';
        $client5->password=bcrypt('moncheri');
        $client5->category()->associate($category5);
        $client5->area()->associate($area5);
        $client5->save();


        $area6=Area::where('name', '21')->first();
        $category6=Category::where('name', 'Gym')->first();

        $client6 = new Client();
        $client6->name='Your Gym';
        $client6->address='rr Hamdi Pepa, tregu ushqimor nd 12';
        $client6->email='ygym@gmail.com';
        $client6->phone='0682643443';
        $client6->nipt='J12309872B';
        $client6->city='Tirane';
        $client6->password=bcrypt('your');
        $client6->category()->associate($category6);
        $client6->area()->associate($area6);
        $client6->save();

        $area7=Area::where('name', 'Ali Demi')->first();
        $category7=Category::where('name', 'Supermarket')->first();

        $client7 = new Client();
        $client7->name='Coop';
        $client7->address='rr Ali Demi, nd 1, 3';
        $client7->email='coop@gmail.com';
        $client7->phone='0691929399';
        $client7->nipt='JB0429082B';
        $client7->city='Tirane';
        $client7->password=bcrypt('coop');
        $client7->category()->associate($category7);
        $client7->area()->associate($area7);
        $client7->save();

        $area8=Area::where('name', '21')->first();
        $category8=Category::where('name', 'Supermarket')->first();

        $client8 = new Client();
        $client8->name='Lidl';
        $client8->address='rr X';
        $client8->email='lidl@gmail.com';
        $client8->phone='0690204060';
        $client8->nipt='JB0423452B';
        $client8->city='Tirane';
        $client8->password=bcrypt('lidl');
        $client8->category()->associate($category8);
        $client8->area()->associate($area8);
        $client8->save();
    }
}
