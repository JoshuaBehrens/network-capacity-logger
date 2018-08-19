<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeedtestRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speedtest_requests', function (Blueprint $table) {
            $table->uuid('id');
            $table->text('client_ip');
            $table->float('client_longitude');
            $table->float('client_latitude');
            $table->text('client_isp');
            $table->float('client_isp_rating');

            $table->float('bytes_sent');
            $table->float('upload_bps');
            $table->float('bytes_received');
            $table->float('download_bps');
            $table->float('ping');

            $table->unsignedBigInteger('server_id');
            $table->text('server_name');
            $table->text('server_host');
            $table->text('server_sponsor');
            $table->float('server_longitude');
            $table->float('server_latitude');
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
        Schema::dropIfExists('speedtest_requests');
    }
}
