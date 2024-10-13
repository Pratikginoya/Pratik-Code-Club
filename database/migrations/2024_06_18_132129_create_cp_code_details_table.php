<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cp_code_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tech_id');
            $table->string('code_name');
            $table->text('code_desc')->nullable();
            $table->text('code_detail');
            $table->text('code_keyword')->nullable();
            $table->integer('status');
            $table->integer('wishlist')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('tech_id')->references('id')->on('cp_technology')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Disable foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Schema::table('cp_code_details', function (Blueprint $table) {
            $table->dropForeign(['tech_id']);
            $table->dropForeign(['user_id']);
        });

        // Enable foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Schema::dropIfExists('cp_code_details');
    }
};
