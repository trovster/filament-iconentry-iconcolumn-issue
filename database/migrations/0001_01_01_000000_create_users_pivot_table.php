<?php

declare(strict_types=1);

use App\Models\Item;
use App\Models\User;
use App\Models\UserPivot;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected string $tableName;

    public function __construct()
    {
        $this->tableName = (new UserPivot())->getTable();
    }

    public function up(): void
    {
        Schema::create($this->tableName, static function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Item::class);
            $table->uuid('uuid');
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->tinyInteger('order')->default(1);
            $table->boolean('status')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->tableName);
    }
};
