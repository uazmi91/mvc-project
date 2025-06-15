<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class author extends models{
    public function up(): void
{
    Schema::create('genres', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}

}