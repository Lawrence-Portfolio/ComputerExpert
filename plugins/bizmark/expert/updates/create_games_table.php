<?php namespace Bizmark\Expert\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateGamesTable Migration
 */
class CreateGamesTable extends Migration
{
    const TABLE_NAME = 'bizmark_expert_games';

    public function up()
    {
        if (!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('active')->default(true);
                $table->string('name');
                $table->integer('cpu_id');
                $table->integer('gpu_id');
                $table->text('fps');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
