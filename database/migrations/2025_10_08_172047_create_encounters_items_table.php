<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('encounters_items', function (Blueprint $table) {
            $table->id('itm');
            //
            $table->string('code_type', 32)->default('CPT4');
            $table->string('code', 32)->default('00001');
            $table->decimal('fee', 10, 2)->default(0);
            $table->integer('units')->default(1);
            //
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encounters_items');
    }
};
