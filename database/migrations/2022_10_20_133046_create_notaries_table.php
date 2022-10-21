<?php

use App\Models\Notary;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration {

    public function up() {
        Schema::create('notaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->timestamp('receipt_date');
            $table->enum('record_type',  Notary::recordsList());
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down() {
        Schema::dropIfExists('notaries');
    }
};
