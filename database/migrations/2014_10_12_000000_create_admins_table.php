<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile_link')->nullable();
            $table->string('avatar_link')->nullable();
            $table->string('email')->nullable()->unique();
            $table->float('provider_id', '100')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('address', '200')->nullable();
            $table->string('phone', '15')->nullable();
            $table->integer('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("_token")->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
        });

        $data = [
            'name'                          => 'Rezwan Hossain Sajeeb',
            'phone'                         => '01797840513',
            'address'                       => 'Jhunagach Chapani , Dimla , Nilphamari',
            'email'                          => 'admin@example.com',
            'password'                    =>  Hash::make("12345678"),
            'email_verified_at'       => now(),
        ];
        Admin::create($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}