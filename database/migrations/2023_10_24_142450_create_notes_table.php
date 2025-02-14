<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id'); // Foreign key for the associated complaint
            $table->unsignedBigInteger('user_id'); // Foreign key for the user who added the note
            $table->text('content');
            $table->timestamps();
    
            // Define foreign key relationships
            $table->foreign('complaint_id')->references('id')->on('complaints');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
