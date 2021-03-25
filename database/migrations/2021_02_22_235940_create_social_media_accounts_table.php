<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSocialMediaAccountsTable.
 */
class CreateSocialMediaAccountsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_media_accounts', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('enterprise_id')->constrained('enterprises');
            $table->foreignUuid('social_media_id')->constrained('social_medias');
            $table->bigInteger('ref_id')->constrained();
            $table->string('username')->nullable();
            $table->json('settings');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['social_media_id', 'ref_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('social_media_accounts');
	}
}
