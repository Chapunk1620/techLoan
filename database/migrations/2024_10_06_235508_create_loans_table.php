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
            $table->string('id_borrower');
            $table->string('borrower_name');
            $table->string('item_key');
            $table->date('date');
            $table->date('due_date');
            $table->string('status');
            $table->text('description')->nullable();
            $table->string('it_approver');
            $table->string('it_receiver');
            $table->timestamps();

            $table->foreign('item_key')->references('item_key')->on('items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};