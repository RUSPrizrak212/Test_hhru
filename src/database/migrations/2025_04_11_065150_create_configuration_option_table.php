<?php

use App\Models\Configuration;
use App\Models\Option;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('configuration_option', static function (Blueprint $table) {
            $table->foreignIdFor(Configuration::class)->constrained();
            $table->foreignIdFor(Option::class)->constrained();

            $table->unique(['configuration_id', 'option_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuration_options');
    }
};
