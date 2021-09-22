<?php namespace Bizmark\Expert\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCollectionsTable Migration
 */
class CreateCollectionsTable extends Migration
{
    const COLLECTIONS_TABLE_NAME = 'bizmark_expert_collections';
    const REPLACEMENTS_TABLE_NAME = 'bizmark_expert_replacements';

    public function up()
    {
        if (!Schema::hasTable(self::COLLECTIONS_TABLE_NAME)) {
            Schema::create(self::COLLECTIONS_TABLE_NAME, function (Blueprint $table) {
                $table->increments('id');
                $table->integer('template_id');
                $table->integer('build_id');
                $table->integer('default_id');
                $table->integer('sort_order');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable(self::REPLACEMENTS_TABLE_NAME)) {
            Schema::create(self::REPLACEMENTS_TABLE_NAME, function ($table) {
                $table->integer('collection_id')->unsigned();
                $table->integer('product_id')->unsigned();
                $table->primary(['collection_id', 'product_id']);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::COLLECTIONS_TABLE_NAME);
        Schema::dropIfExists(self::REPLACEMENTS_TABLE_NAME);
    }
}
