<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short')->nullable()->unique();
            $table->string('name');
            $table->string('merk')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->integer('qty')->nullable();
            $table->enum('type',['MOTOR','MOBIL']);
            $table->longText('label')->nullable();
            $table->longText('link')->nullable();
            $table->longText('img')->nullable();
            $table->string('price')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->command->info('yes');
        if (Schema::hasTable('products')) {
        }
        Schema::dropIfExists('products');
    }
}