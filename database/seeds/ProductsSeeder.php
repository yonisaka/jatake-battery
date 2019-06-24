<?php

use Illuminate\Database\Seeder;
use App\Products;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productsArr = [
                [
                    'name'=>'Amaron C23AC SUper KW M',
                    'merk'=>'Amaron',
                    'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nam molestiae non optio magnam odio aspernatur. Cupiditate, odit asperiores autem praesentium, quasi eum necessitatibus facilis magni, voluptas fuga et eaque.',
                    'capacity'=>'50',
                    'dimention'=>['10','20'],
                    'code'=>'am-314',
                    'type'=>'MOTOR',
                    'img'=>[
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png',
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png',
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png'
                    ],
                    'price'=>'120000',
                    'status'=>1
                ],
                [
                    'name'=>'Amaron C23AC SUper KW 5',
                    'merk'=>'Amaron',
                    'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nam molestiae non optio magnam odio aspernatur. Cupiditate, odit asperiores autem praesentium, quasi eum necessitatibus facilis magni, voluptas fuga et eaque.',
                    'capacity'=>'50',
                    'dimention'=>['10','20'],
                    'code'=>'am-315',
                    'type'=>'MOBIL',
                    'img'=>[
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png',
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png',
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png'
                    ],
                    'price'=>'120000',
                    'status'=>1
                ],
                [
                    'name'=>'Amaron C23AC SUper KW N',
                    'merk'=>'Amaron',
                    'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nam molestiae non optio magnam odio aspernatur. Cupiditate, odit asperiores autem praesentium, quasi eum necessitatibus facilis magni, voluptas fuga et eaque.',
                    'capacity'=>'50',
                    'dimention'=>['10','20'],
                    'code'=>'an-314',
                    'type'=>'MOTOR',
                    'img'=>[
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png',
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png',
                        'http://jatakebattery.local/assets/Motobatt__MTZ-2.png'
                    ],
                    'price'=>'120000',
                    'status'=>1
                ],
            ];
            foreach($productsArr as $d)
            {
                Products::create($d);
            }
    }
}
