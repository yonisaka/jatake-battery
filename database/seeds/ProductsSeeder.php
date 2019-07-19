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
            [   'short'=>'abc-1',
                'name'=>'Aki Test 1',
                'merk'=>'Honda',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'label'=>[],
                'link'=>[],
                'type'=>'MOTOR',
                'img'=>[],
                'qty'=>1,
                'price'=>100000,],

            [   'short'=>'abc-2',
                'name'=>'Aki Test 2',
                'merk'=>'Honda',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'label'=>[],
                'link'=>[],
                'type'=>'MOBIL',
                'img'=>[],
                'qty'=>1,
                'price'=>500000,],
            [   'short'=>'',
                'name'=>'Aki Test 3',
                'merk'=>'',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'label'=>[],
                'link'=>[],
                'type'=>'MOTOR',
                'img'=>[],
                'qty'=>1,
                'price'=>10000000,],
            [   'short'=>'abc-4',
                'name'=>'Aki Test 5',
                'merk'=>'Honda',
                'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'label'=>[],
                'link'=>[],
                'type'=>'MOBIL',
                'img'=>[],
                'qty'=>1,
                'price'=>'',],
        ];
        foreach($productsArr as $d)
        {
            Products::create($d);
        }
    }
}
