<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::disableForeignKeyConstraints(); // On desactive le contrainte sur les clés étrangères
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("company_id");
            $table->string("title");
            $table->string("experience");
            $table->string("salary")->nullable();
            $table->text("description");
            $table->string("location");

            $table->foreign("category_id")->references("id")
                ->on("categories")->onDelete("restrict")->onUpdate("restrict");
            $table->foreign("company_id")->references("id")
                ->on("companies")->onDelete("restrict")->onUpdate("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
