<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date'); // 1 type date
            $table->string('app'); // 2  type varchar
            $table->string('ad_unit'); // 3 type varchar
            $table->integer('admob_network_requests'); // 4 type integer
            $table->integer('matched_requests'); // 5 type integer
            $table->float('match_rate_persen'); // 6 type float
            $table->integer('impressions'); // 7 type integer
            $table->float('show_rate_persen'); // 8 type float
            $table->integer('clicks'); // 9 type integer
            $table->float('impressions_ctr_persen'); // 10 type float
            $table->float('admob_network_request_rpm_idr'); // 11 type float
            $table->float('impression_rpm_idr'); // 12 type float
            $table->float('estimated_earnings_idr'); // 13 type float
            $table->integer('active_view_eligible_impressions'); // 14 type integer
            $table->integer('measurable_impressions'); // 15 type integer
            $table->integer('viewable_impressions'); // 16 type integer
            $table->float('measurable_impressions_persen')->default(0); // 17 type float
            $table->float('viewable_impressions_persen')->default(0); // 18 type float
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
        Schema::drop('reports');
    }
}
