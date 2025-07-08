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
        Schema::create('guardian_groups', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('group_name')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('guardian_group_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_group_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian_group_user');
        Schema::dropIfExists('guardian_groups');
    }
};
