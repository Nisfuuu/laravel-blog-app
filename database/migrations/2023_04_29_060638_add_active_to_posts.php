<!-- memodifikasi table yang sudah ada yaitu table posts yg kita punya  -->
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
        Schema::table('posts', function (Blueprint $table) {

            // menambahkan column ke table posts yang sudah ada, dengan nama column aktiv dengan tipe boolean dan menambahkannya setelah column content
            $table->boolean('active')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
