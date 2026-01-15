<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration   
{
    public function up(): void
    {
        if (!Schema::hasTable('career_applications')) {
            Schema::create('career_applications', function (Blueprint $table) {
                $table->id();
                $table->string('full_name');
                $table->string('email')->unique();
                $table->string('phone', 15);
                $table->string('position');
                $table->text('experience')->nullable();
                $table->text('motivation');
                $table->string('resume');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};
