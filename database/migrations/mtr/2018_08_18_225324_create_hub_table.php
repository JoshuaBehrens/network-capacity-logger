<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtr_hubs', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('request_id');
            $table->foreign('request_id')->references('id')->on('mtr_requests');

            $table->unsignedSmallInteger('order');
            $table->text('host');
            $table->text('ip');
            $table->unsignedMediumInteger('sent_packages');
            $table->float('package_loss');
            $table->float('last_latency')->nullable();
            $table->float('average_latency')->nullable();
            $table->float('minimum_latency')->nullable();
            $table->float('maximum_latency')->nullable();
            $table->float('standard_deviation_latency')->nullable();
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
        Schema::dropIfExists('mtr_hubs');
    }
}
