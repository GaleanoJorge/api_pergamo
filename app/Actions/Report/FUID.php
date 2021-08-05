<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class FUID
{
    /**
     * FUID
     *
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT c.short_name AS 'Curso',
                m.name AS 'Modulo',
                s.name AS 'Sesion',
                a.name AS 'Actividad',
                d.file_name AS 'NombreArchivo',
                d.file_path AS 'RutaArchivo',
                CONCAT(u.firstname,' ',u.lastname) AS 'Aprendis'
        FROM course c 
        INNER JOIN module m ON m.course_id = c.id
        INNER JOIN session s ON s.module_id = m.id
        INNER JOIN activity a ON a.session_id = s.id
        left JOIN delivery d ON d.activity_id = a.id
        left JOIN users u ON u.id = d.user_id");
    }
}
