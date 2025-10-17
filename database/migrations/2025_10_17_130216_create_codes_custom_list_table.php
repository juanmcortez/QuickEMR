<?php

use App\Enum\CodeType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('codes_custom_list', static function (Blueprint $table) {
            $table->id();
            //
            $table->enum('type', CodeType::values())->default(CodeType::CPT4->value);
            $table->string('code');
            $table->string('code_short')->nullable();
            $table->string('description')->nullable();
            //
            $table->string('default_modifier')->nullable();
            $table->string('default_ndc')->nullable();
            $table->integer('default_units')->default(1);
            //
            $table->decimal('default_fee')->default(0);
            //
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('codes_custom_list');
    }
};
