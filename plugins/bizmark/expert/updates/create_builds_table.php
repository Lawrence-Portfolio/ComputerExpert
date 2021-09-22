<?php namespace Bizmark\Expert\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateBuildsTable Migration
 */
class CreateBuildsTable extends Migration
{
    const TABLE_NAME = 'bizmark_expert_builds';

    public function up()
    {
        if (Schema::hasTable(self::TABLE_NAME)) {
            return;
        }

        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->integer('product_id');
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->string('code')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
