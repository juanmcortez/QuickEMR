<?php

use App\Enum\PhoneType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('commons_phones', function (Blueprint $table) {
            $table->id();
            //
            $table->boolean('is_primary')->default(false);
            $table->enum('type', PhoneType::values())->default(PhoneType::Mobile->value);
            //
            $table->string('country_code', 8)->default('+54 9')->nullable();
            //
            $table->string('area_code', 8)->index()->nullable();
            $table->string('number_code', 8)->index()->nullable();
            $table->string('number_line', 8)->index()->nullable();
            //
            $table->text('notes')->nullable();
            //
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commons_phones');
    }
};
