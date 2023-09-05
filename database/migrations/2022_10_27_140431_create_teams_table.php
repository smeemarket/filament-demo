<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('slug')->unique();
            $table->timestamps();
        });

        // Schema::create('team_user', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignIdFor(Team::class)->index();
        //     $table->foreignIdFor(User::class)->index();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
