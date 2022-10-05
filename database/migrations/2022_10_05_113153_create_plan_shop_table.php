<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_shop', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('shop_id');
            $table->timestamps();
            
            // $table->foreign('plan_id')
            //       ->references('id')
            //       ->on('plan')
            //       ->onDelete('cascade');
            // $table->foreign('shop_id')
            //       ->references('id')
            //       ->on('shop')
            //       ->onDelete('cascade');
                  
                  $table->primary(['plan_id', 'shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_shop');
    }
}
