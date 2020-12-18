<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateProfilesTable
 */
class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('avatar')->nullable()->default(asset('images/avatar/avatar-0.png'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
}
