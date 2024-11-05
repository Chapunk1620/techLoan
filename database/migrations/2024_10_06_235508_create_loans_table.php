<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('id_borrower')->nullable();
            $table->string('borrower_name')->nullable();
            $table->string('item_key')->nullable();
            $table->datetime('date')->nullable();
            $table->datetime('due_date')->nullable();
            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->string('it_approver')->nullable();
            $table->string('it_receiver')->nullable();
            $table->string('item_returner_name')->nullable();
            $table->string('item_returner_id')->nullable();
            $table->string('after_condition')->nullable();
            $table->timestamps();

            $table->foreign('item_key')->references('item_key')->on('items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};