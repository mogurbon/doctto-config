<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // En PostgreSQL, cambiar de UUID a BIGINT requiere un casting explícito.
        // Como doctor_id en los tests es null o podría contener UUIDs inválidos para bigint,
        // lo más seguro es resetear la columna o usar un cast que maneje errores.
        // Dado que estamos en desarrollo inicial, podemos resetearla.

        DB::statement('ALTER TABLE services ALTER COLUMN doctor_id TYPE bigint USING NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE services ALTER COLUMN doctor_id TYPE uuid USING NULL');
    }
};
