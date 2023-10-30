<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();

            $table->unsignedBigInteger('from_account_id');
            $table->foreign('from_account_id')->references('id')->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->unsignedBigInteger('to_account_id');
            $table->foreign('to_account_id')->references('id')->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->integer('amount');
            $table->text('comment')->nullable();

            $table->timestamp('executed_on')->useCurrent();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
