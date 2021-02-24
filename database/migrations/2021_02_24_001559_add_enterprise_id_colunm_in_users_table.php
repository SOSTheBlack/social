<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddEnterpriseIdColunmInUsersTable
 */
class AddEnterpriseIdColunmInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('enterprise_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();

            $table->dropConstrainedForeignId('enterprise_id');

            Schema::enableForeignKeyConstraints();
        });
    }
}
