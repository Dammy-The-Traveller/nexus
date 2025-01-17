<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use App\Models\Employer;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
              // if we want to add new table we would do it this way and rerun the migration with php artisan migrate
              // foreign id called employer_id
            //  $table->unsignedBigInteger('employer_id');
            $table->foreignIdFor(\App\Models\Employer::class);
            $table->string('title');
            $table->string('Salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
