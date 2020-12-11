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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("category_id");
            $table->bigInteger("company_id");
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
