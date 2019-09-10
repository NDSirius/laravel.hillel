<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (!Schema::hasColumn('orders', 'user_name')) {
                    $table->unsignedBigInteger('user_name')->after('user_id');
                }
                if (!Schema::hasColumn('orders', 'user_surname')) {
                    $table->unsignedBigInteger('user_surname')->after('user_name');
                }
                if (!Schema::hasColumn('orders', 'email')) {
                    $table->unsignedBigInteger('email')->after('user_surname');
                }
                if (!Schema::hasColumn('orders', 'phone_number')) {
                    $table->unsignedBigInteger('phone_number')->after('email');
                }
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('orders')) {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'user_name')) {
                $table->dropForeign('user_name');
            }
            if (Schema::hasColumn('orders', 'user_surname')) {
                $table->dropForeign('user_surname');
            }
            if (Schema::hasColumn('orders', 'email')) {
                $table->dropForeign('email');
            }
            if (Schema::hasColumn('orders', 'phone_number')) {
                $table->dropForeign('phone_number');
            }
        });
    }
    }
}
