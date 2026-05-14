<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_applications', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->date('date_of_birth');
            $table->string('applying_class');
            $table->string('parent_name');
            $table->string('phone');
            $table->string('email');
            $table->string('previous_school')->nullable();
            $table->text('notes')->nullable();
            $table->string('status', 32)->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_applications');
    }
};
