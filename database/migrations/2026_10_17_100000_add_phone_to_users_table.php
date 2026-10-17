<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->unique()->after('email');
            $table->string('email')->nullable()->change();
        });

        // Customers created at checkout before this change get the mobile number of their latest order.
        DB::table('users')->orderBy('id')->each(function ($user) {
            $phone = DB::table('orders')->where('user_id', $user->id)->orderByDesc('id')->value('phone');

            if ($phone && ! DB::table('users')->where('phone', $phone)->exists()) {
                DB::table('users')->where('id', $user->id)->update(['phone' => $phone]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['phone']);
            $table->dropColumn('phone');
        });
    }
};
