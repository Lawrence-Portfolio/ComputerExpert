<?php namespace Bizmark\Expert\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateConfigsTable Migration
 */
class CreateConfigsTable extends Migration
{
    const TABLE_NAME = 'bizmark_expert_configs';

    public function up()
    {
        if (!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('active')->default(true);
                $table->string('name');
                $table->string('slug')->unique()->index();
                $table->string('code');
                $table->integer('user_id');
                $table->integer('cpu_id');
                $table->integer('motherboard_id');
                $table->integer('ram_id');
                $table->integer('cooling_id');
                $table->integer('gpu_id');
                $table->integer('disc_id')->nullable();
                $table->text('additional_discs')->nullable();
                $table->integer('case_id');
                $table->integer('power_id');
                $table->text('coolers')->nullable();
                $table->integer('monitor_id')->nullable();
                $table->integer('keyboard_id')->nullable();
                $table->integer('mouse_id')->nullable();
                $table->integer('audio_id')->nullable();
                $table->integer('microphone_id')->nullable();
                $table->integer('office_suite_id')->nullable();
                $table->integer('anitivirus_id')->nullable();
                $table->integer('os_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
