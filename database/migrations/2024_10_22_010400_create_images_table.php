<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->onDelete('cascade'); // Foreign key linking to loans table
            $table->string('file_name'); // Store the uploaded file name
            $table->string('file_path'); // Store the path to the uploaded file
            $table->timestamps(); // For created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
};

