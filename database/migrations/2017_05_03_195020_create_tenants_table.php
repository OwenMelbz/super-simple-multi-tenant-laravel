<?php

use App\Tenant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->json('domains');
            $table->string('name');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });

        Tenant::create([
            'domains' => ['multi.dev', 'www.multi.com'],
            'name' => 'Root Domain',
            'slug' => 'root'
        ]);

        Tenant::create([
            'domains' => ['alt.mult.idev'],
            'name' => 'Alternative Domain',
            'slug' => 'alt'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
