<?php namespace Bizmark\Expert\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTemplatesTable Migration
 */
class CreateTemplatesTable extends Migration
{
    const TABLE_NAME = 'bizmark_expert_templates';

    public function up()
    {
        if (!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create('bizmark_expert_templates', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id');
                $table->string('name');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bizmark_expert_templates');
    }
}
