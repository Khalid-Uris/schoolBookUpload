<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->bigInteger('cnic');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            // $table->tinyInteger('status')->default(1)->after('password');
            $table->enum('status', array('active', 'inactive'))->default('inactive');
            $table->timestamps();
            //$table->timestamp();
            // $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::create('students', function (Blueprint $table) {
        //     $table->dropColumn('password');
        // }
        Schema::dropIfExists('students');
    }
};
