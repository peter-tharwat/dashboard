<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('rinvex.statistics.tables.requests'), function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->integer('route_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('device_id')->unsigned();
            $table->integer('platform_id')->unsigned();
            $table->integer('path_id')->unsigned();
            $table->integer('geoip_id')->unsigned();
            $table->nullableMorphs('user');
            $table->string('session_id');
            $table->integer('status_code');
            $table->string('protocol_version')->nullable();
            $table->text('referer')->nullable();
            $table->string('language');
            $table->boolean('is_no_cache')->default(0);
            $table->boolean('wants_json')->default(0);
            $table->boolean('is_secure')->default(0);
            $table->boolean('is_json')->default(0);
            $table->boolean('is_ajax')->default(0);
            $table->boolean('is_pjax')->default(0);
            $table->timestamp('created_at')->nullable();

            // Indexes
            $table->foreign('route_id')->references('id')->on(config('rinvex.statistics.tables.routes'))
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('agent_id')->references('id')->on(config('rinvex.statistics.tables.agents'))
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('device_id')->references('id')->on(config('rinvex.statistics.tables.devices'))
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('platform_id')->references('id')->on(config('rinvex.statistics.tables.platforms'))
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('path_id')->references('id')->on(config('rinvex.statistics.tables.paths'))
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('geoip_id')->references('id')->on(config('rinvex.statistics.tables.geoips'))
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('rinvex.statistics.tables.requests'));
    }

    /**
     * Get jsonable column data type.
     *
     * @return string
     */
    protected function jsonable(): string
    {
        $driverName = DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);
        $dbVersion = DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION);
        $isOldVersion = version_compare($dbVersion, '5.7.8', 'lt');

        return $driverName === 'mysql' && $isOldVersion ? 'text' : 'json';
    }
}
