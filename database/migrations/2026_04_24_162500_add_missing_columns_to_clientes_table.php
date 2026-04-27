<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            if (!Schema::hasColumn('clientes', 'email')) {
                $table->string('email')->nullable()->after('nome');
            }

            if (!Schema::hasColumn('clientes', 'cpf')) {
                $table->string('cpf')->nullable()->after('email');
            }

            if (!Schema::hasColumn('clientes', 'numero')) {
                $table->string('numero')->nullable()->after('cpf');
            }

            if (!Schema::hasColumn('clientes', 'senha')) {
                $table->string('senha')->nullable()->after('numero');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $columnsToDrop = [];

            foreach (['email', 'cpf', 'numero', 'senha'] as $column) {
                if (Schema::hasColumn('clientes', $column)) {
                    $columnsToDrop[] = $column;
                }
            }

            if ($columnsToDrop !== []) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
