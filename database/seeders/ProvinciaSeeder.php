<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivamos llaves foráneas para limpiar la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('provincia')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Lista de provincias mapeadas con los IDs de departamento oficiales (Ubigeo INEI)
        DB::table('provincia')->insert([
            // AMAZONAS (id_departamento: 1)
            ['id_provincia' => 1, 'id_departamento' => 1, 'nombre' => 'CHACHAPOYAS'],
            ['id_provincia' => 2, 'id_departamento' => 1, 'nombre' => 'BAGUA'],
            ['id_provincia' => 3, 'id_departamento' => 1, 'nombre' => 'BONGARA'],
            ['id_provincia' => 4, 'id_departamento' => 1, 'nombre' => 'CONDORCANQUI'],
            ['id_provincia' => 5, 'id_departamento' => 1, 'nombre' => 'LUYA'],
            ['id_provincia' => 6, 'id_departamento' => 1, 'nombre' => 'RODRIGUEZ DE MENDOZA'],
            ['id_provincia' => 7, 'id_departamento' => 1, 'nombre' => 'UTCUBAMBA'],

            // ANCASH (id_departamento: 2)
            ['id_provincia' => 8, 'id_departamento' => 2, 'nombre' => 'HUARAZ'],
            ['id_provincia' => 9, 'id_departamento' => 2, 'nombre' => 'AIJA'],
            ['id_provincia' => 10, 'id_departamento' => 2, 'nombre' => 'ANTONIO RAYMONDI'],
            ['id_provincia' => 11, 'id_departamento' => 2, 'nombre' => 'ASUNCION'],
            ['id_provincia' => 12, 'id_departamento' => 2, 'nombre' => 'BOLOGNESI'],
            ['id_provincia' => 13, 'id_departamento' => 2, 'nombre' => 'CARHUAZ'],
            ['id_provincia' => 14, 'id_departamento' => 2, 'nombre' => 'CARLOS FERMIN FITZCARRALD'],
            ['id_provincia' => 15, 'id_departamento' => 2, 'nombre' => 'CASMA'],
            ['id_provincia' => 16, 'id_departamento' => 2, 'nombre' => 'CORONGO'],
            ['id_provincia' => 17, 'id_departamento' => 2, 'nombre' => 'HUARI'],
            ['id_provincia' => 18, 'id_departamento' => 2, 'nombre' => 'HUARMEY'],
            ['id_provincia' => 19, 'id_departamento' => 2, 'nombre' => 'HUAYLAS'],
            ['id_provincia' => 20, 'id_departamento' => 2, 'nombre' => 'MARISCAL LUZURIAGA'],
            ['id_provincia' => 21, 'id_departamento' => 2, 'nombre' => 'OCROS'],
            ['id_provincia' => 22, 'id_departamento' => 2, 'nombre' => 'PALLASCA'],
            ['id_provincia' => 23, 'id_departamento' => 2, 'nombre' => 'POMABAMBA'],
            ['id_provincia' => 24, 'id_departamento' => 2, 'nombre' => 'RECUAY'],
            ['id_provincia' => 25, 'id_departamento' => 2, 'nombre' => 'SANTA'],
            ['id_provincia' => 26, 'id_departamento' => 2, 'nombre' => 'SIHUAS'],
            ['id_provincia' => 27, 'id_departamento' => 2, 'nombre' => 'YUNGAY'],

            // APURIMAC (id_departamento: 3)
            ['id_provincia' => 28, 'id_departamento' => 3, 'nombre' => 'ABANCAY'],
            ['id_provincia' => 29, 'id_departamento' => 3, 'nombre' => 'ANDAHUAYLAS'],
            ['id_provincia' => 30, 'id_departamento' => 3, 'nombre' => 'ANTABAMBA'],
            ['id_provincia' => 31, 'id_departamento' => 3, 'nombre' => 'AYMARAES'],
            ['id_provincia' => 32, 'id_departamento' => 3, 'nombre' => 'COTABAMBAS'],
            ['id_provincia' => 33, 'id_departamento' => 3, 'nombre' => 'GRAU'],
            ['id_provincia' => 34, 'id_departamento' => 3, 'nombre' => 'CHINCHEROS'],

            // AREQUIPA (id_departamento: 4)
            ['id_provincia' => 35, 'id_departamento' => 4, 'nombre' => 'AREQUIPA'],
            ['id_provincia' => 36, 'id_departamento' => 4, 'nombre' => 'CAMANA'],
            ['id_provincia' => 37, 'id_departamento' => 4, 'nombre' => 'CARAVELI'],
            ['id_provincia' => 38, 'id_departamento' => 4, 'nombre' => 'CASTILLA'],
            ['id_provincia' => 39, 'id_departamento' => 4, 'nombre' => 'CAYLLOMA'],
            ['id_provincia' => 40, 'id_departamento' => 4, 'nombre' => 'CONDESUYOS'],
            ['id_provincia' => 41, 'id_departamento' => 4, 'nombre' => 'ISLAY'],
            ['id_provincia' => 42, 'id_departamento' => 4, 'nombre' => 'LA UNION'],

            // AYACUCHO (id_departamento: 5)
            ['id_provincia' => 43, 'id_departamento' => 5, 'nombre' => 'HUAMANGA'],
            ['id_provincia' => 44, 'id_departamento' => 5, 'nombre' => 'CANGALLO'],
            ['id_provincia' => 45, 'id_departamento' => 5, 'nombre' => 'HUANCA SANCOS'],
            ['id_provincia' => 46, 'id_departamento' => 5, 'nombre' => 'HUANTA'],
            ['id_provincia' => 47, 'id_departamento' => 5, 'nombre' => 'LA MAR'],
            ['id_provincia' => 48, 'id_departamento' => 5, 'nombre' => 'LUCANAS'],
            ['id_provincia' => 49, 'id_departamento' => 5, 'nombre' => 'PARINACOCHAS'],
            ['id_provincia' => 50, 'id_departamento' => 5, 'nombre' => 'PAUCAR DEL SARA SARA'],
            ['id_provincia' => 51, 'id_departamento' => 5, 'nombre' => 'SUCRE'],
            ['id_provincia' => 52, 'id_departamento' => 5, 'nombre' => 'VICTOR FAJARDO'],
            ['id_provincia' => 53, 'id_departamento' => 5, 'nombre' => 'VILCAS HUAMAN'],

            // CAJAMARCA (id_departamento: 6)
            ['id_provincia' => 54, 'id_departamento' => 6, 'nombre' => 'CAJAMARCA'],
            ['id_provincia' => 55, 'id_departamento' => 6, 'nombre' => 'CAJABAMBA'],
            ['id_provincia' => 56, 'id_departamento' => 6, 'nombre' => 'CELENDIN'],
            ['id_provincia' => 57, 'id_departamento' => 6, 'nombre' => 'CHOTA'],
            ['id_provincia' => 58, 'id_departamento' => 6, 'nombre' => 'CONTUMAZA'],
            ['id_provincia' => 59, 'id_departamento' => 6, 'nombre' => 'CUTERVO'],
            ['id_provincia' => 60, 'id_departamento' => 6, 'nombre' => 'HUALGAYOC'],
            ['id_provincia' => 61, 'id_departamento' => 6, 'nombre' => 'JAEN'],
            ['id_provincia' => 62, 'id_departamento' => 6, 'nombre' => 'SAN IGNACIO'],
            ['id_provincia' => 63, 'id_departamento' => 6, 'nombre' => 'SAN MARCOS'],
            ['id_provincia' => 64, 'id_departamento' => 6, 'nombre' => 'SAN MIGUEL'],
            ['id_provincia' => 65, 'id_departamento' => 6, 'nombre' => 'SAN PABLO'],
            ['id_provincia' => 66, 'id_departamento' => 6, 'nombre' => 'SANTA CRUZ'],

            // CALLAO (id_departamento: 7)
            ['id_provincia' => 67, 'id_departamento' => 7, 'nombre' => 'CALLAO'],

            // CUSCO (id_departamento: 8)
            ['id_provincia' => 68, 'id_departamento' => 8, 'nombre' => 'CUSCO'],
            ['id_provincia' => 69, 'id_departamento' => 8, 'nombre' => 'ACOMAYO'],
            ['id_provincia' => 70, 'id_departamento' => 8, 'nombre' => 'ANTA'],
            ['id_provincia' => 71, 'id_departamento' => 8, 'nombre' => 'CALCA'],
            ['id_provincia' => 72, 'id_departamento' => 8, 'nombre' => 'CANAS'],
            ['id_provincia' => 73, 'id_departamento' => 8, 'nombre' => 'CANCHIS'],
            ['id_provincia' => 74, 'id_departamento' => 8, 'nombre' => 'CHUMBIVILCAS'],
            ['id_provincia' => 75, 'id_departamento' => 8, 'nombre' => 'ESPINAR'],
            ['id_provincia' => 76, 'id_departamento' => 8, 'nombre' => 'LA CONVENCION'],
            ['id_provincia' => 77, 'id_departamento' => 8, 'nombre' => 'PARURO'],
            ['id_provincia' => 78, 'id_departamento' => 8, 'nombre' => 'PAUCARTAMBO'],
            ['id_provincia' => 79, 'id_departamento' => 8, 'nombre' => 'QUISPICANCHI'],
            ['id_provincia' => 80, 'id_departamento' => 8, 'nombre' => 'URUBAMBA'],

            // HUANCAVELICA (id_departamento: 9)
            ['id_provincia' => 81, 'id_departamento' => 9, 'nombre' => 'HUANCAVELICA'],
            ['id_provincia' => 82, 'id_departamento' => 9, 'nombre' => 'ACOBAMBA'],
            ['id_provincia' => 83, 'id_departamento' => 9, 'nombre' => 'ANGARAES'],
            ['id_provincia' => 84, 'id_departamento' => 9, 'nombre' => 'CASTROVIRREYNA'],
            ['id_provincia' => 85, 'id_departamento' => 9, 'nombre' => 'CHURCAMPA'],
            ['id_provincia' => 86, 'id_departamento' => 9, 'nombre' => 'HUAYTARA'],
            ['id_provincia' => 87, 'id_departamento' => 9, 'nombre' => 'TAYACAJA'],

            // HUANUCO (id_departamento: 10)
            ['id_provincia' => 88, 'id_departamento' => 10, 'nombre' => 'HUANUCO'],
            ['id_provincia' => 89, 'id_departamento' => 10, 'nombre' => 'AMBO'],
            ['id_provincia' => 90, 'id_departamento' => 10, 'nombre' => 'DOS DE MAYO'],
            ['id_provincia' => 91, 'id_departamento' => 10, 'nombre' => 'HUACAYBAMBA'],
            ['id_provincia' => 92, 'id_departamento' => 10, 'nombre' => 'HUAMALIES'],
            ['id_provincia' => 93, 'id_departamento' => 10, 'nombre' => 'LEONCIO PRADO'],
            ['id_provincia' => 94, 'id_departamento' => 10, 'nombre' => 'MARAÑON'],
            ['id_provincia' => 95, 'id_departamento' => 10, 'nombre' => 'PACHITEA'],
            ['id_provincia' => 96, 'id_departamento' => 10, 'nombre' => 'PUERTO INCA'],
            ['id_provincia' => 97, 'id_departamento' => 10, 'nombre' => 'LAURICOCHA'],
            ['id_provincia' => 98, 'id_departamento' => 10, 'nombre' => 'YAROWILCA'],

            // ICA (id_departamento: 11)
            ['id_provincia' => 99, 'id_departamento' => 11, 'nombre' => 'ICA'],
            ['id_provincia' => 100, 'id_departamento' => 11, 'nombre' => 'CHINCHA'],
            ['id_provincia' => 101, 'id_departamento' => 11, 'nombre' => 'NAZCA'],
            ['id_provincia' => 102, 'id_departamento' => 11, 'nombre' => 'PALPA'],
            ['id_provincia' => 103, 'id_departamento' => 11, 'nombre' => 'PISCO'],

            // JUNIN (id_departamento: 12)
            ['id_provincia' => 104, 'id_departamento' => 12, 'nombre' => 'HUANCAYO'],
            ['id_provincia' => 105, 'id_departamento' => 12, 'nombre' => 'CONCEPCION'],
            ['id_provincia' => 106, 'id_departamento' => 12, 'nombre' => 'CHANCHAMAYO'],
            ['id_provincia' => 107, 'id_departamento' => 12, 'nombre' => 'JAUJA'],
            ['id_provincia' => 108, 'id_departamento' => 12, 'nombre' => 'JUNIN'],
            ['id_provincia' => 109, 'id_departamento' => 12, 'nombre' => 'SATIPO'],
            ['id_provincia' => 110, 'id_departamento' => 12, 'nombre' => 'TARMA'],
            ['id_provincia' => 111, 'id_departamento' => 12, 'nombre' => 'YAULI'],
            ['id_provincia' => 112, 'id_departamento' => 12, 'nombre' => 'CHUPACA'],

            // LA LIBERTAD (id_departamento: 13)
            ['id_provincia' => 113, 'id_departamento' => 13, 'nombre' => 'TRUJILLO'],
            ['id_provincia' => 114, 'id_departamento' => 13, 'nombre' => 'ASCOPE'],
            ['id_provincia' => 115, 'id_departamento' => 13, 'nombre' => 'BOLIVAR'],
            ['id_provincia' => 116, 'id_departamento' => 13, 'nombre' => 'CHEPEN'],
            ['id_provincia' => 117, 'id_departamento' => 13, 'nombre' => 'JULCAN'],
            ['id_provincia' => 118, 'id_departamento' => 13, 'nombre' => 'OTUZCO'],
            ['id_provincia' => 119, 'id_departamento' => 13, 'nombre' => 'PACASMAYO'],
            ['id_provincia' => 120, 'id_departamento' => 13, 'nombre' => 'PATAZ'],
            ['id_provincia' => 122, 'id_departamento' => 13, 'nombre' => 'SANCHEZ CARRION'], // Saltamos 121 reservado para Lima Cercado
            ['id_provincia' => 123, 'id_departamento' => 13, 'nombre' => 'SANTIAGO DE CHUCO'],
            ['id_provincia' => 124, 'id_departamento' => 13, 'nombre' => 'GRAN CHIMU'],
            ['id_provincia' => 125, 'id_departamento' => 13, 'nombre' => 'VIRU'],

            // LAMBAYEQUE (id_departamento: 14)
            ['id_provincia' => 126, 'id_departamento' => 14, 'nombre' => 'CHICLAYO'],
            ['id_provincia' => 127, 'id_departamento' => 14, 'nombre' => 'FERREÑAFE'],
            ['id_provincia' => 128, 'id_departamento' => 14, 'nombre' => 'LAMBAYEQUE'],

            // LIMA (id_departamento: 15)
            ['id_provincia' => 121, 'id_departamento' => 15, 'nombre' => 'LIMA'], // Eje de Lima Metropolitana
            ['id_provincia' => 129, 'id_departamento' => 15, 'nombre' => 'BARRANCA'],
            ['id_provincia' => 130, 'id_departamento' => 15, 'nombre' => 'CAJATAMBO'],
            ['id_provincia' => 131, 'id_departamento' => 15, 'nombre' => 'CANTA'],
            ['id_provincia' => 132, 'id_departamento' => 15, 'nombre' => 'CAÑETE'],
            ['id_provincia' => 133, 'id_departamento' => 15, 'nombre' => 'HUARAL'],
            ['id_provincia' => 134, 'id_departamento' => 15, 'nombre' => 'HUAROCHIRI'],
            ['id_provincia' => 135, 'id_departamento' => 15, 'nombre' => 'HUAURA'],
            ['id_provincia' => 136, 'id_departamento' => 15, 'nombre' => 'OYON'],
            ['id_provincia' => 137, 'id_departamento' => 15, 'nombre' => 'YAUYOS'],

            // LORETO (id_departamento: 16)
            ['id_provincia' => 138, 'id_departamento' => 16, 'nombre' => 'MAYNAS'],
            ['id_provincia' => 139, 'id_departamento' => 16, 'nombre' => 'ALTO AMAZONAS'],
            ['id_provincia' => 140, 'id_departamento' => 16, 'nombre' => 'LORETO'],
            ['id_provincia' => 141, 'id_departamento' => 16, 'nombre' => 'MARISCAL RAMON CASTILLA'],
            ['id_provincia' => 142, 'id_departamento' => 16, 'nombre' => 'REQUENA'],
            ['id_provincia' => 143, 'id_departamento' => 16, 'nombre' => 'UCAYALI'],
            ['id_provincia' => 144, 'id_departamento' => 16, 'nombre' => 'DATEM DEL MARAÑON'],
            ['id_provincia' => 145, 'id_departamento' => 16, 'nombre' => 'PUTUMAYO'],

            // MADRE DE DIOS (id_departamento: 17)
            ['id_provincia' => 146, 'id_departamento' => 17, 'nombre' => 'TAMBOPATA'],
            ['id_provincia' => 147, 'id_departamento' => 17, 'nombre' => 'MANU'],
            ['id_provincia' => 148, 'id_departamento' => 17, 'nombre' => 'TAHAMANU'],

            // MOQUEGUA (id_departamento: 18)
            ['id_provincia' => 149, 'id_departamento' => 18, 'nombre' => 'MARISCAL NIETO'],
            ['id_provincia' => 150, 'id_departamento' => 18, 'nombre' => 'GENERAL SANCHEZ CERRO'],
            ['id_provincia' => 151, 'id_departamento' => 18, 'nombre' => 'ILO'],

            // PIURA (id_departamento: 20) -- Ajustado al id real 20
            ['id_provincia' => 152, 'id_departamento' => 20, 'nombre' => 'PIURA'],
            ['id_provincia' => 153, 'id_departamento' => 20, 'nombre' => 'AYABACA'],
            ['id_provincia' => 154, 'id_departamento' => 20, 'nombre' => 'HUANCABAMBA'],
            ['id_provincia' => 155, 'id_departamento' => 20, 'nombre' => 'MORROPON'],
            ['id_provincia' => 156, 'id_departamento' => 20, 'nombre' => 'PAITA'],
            ['id_provincia' => 157, 'id_departamento' => 20, 'nombre' => 'SULLANA'],
            ['id_provincia' => 158, 'id_departamento' => 20, 'nombre' => 'TALARA'],
            ['id_provincia' => 159, 'id_departamento' => 20, 'nombre' => 'SECHURA'],

            // PUNO (id_departamento: 21)
            ['id_provincia' => 160, 'id_departamento' => 21, 'nombre' => 'PUNO'],
            ['id_provincia' => 161, 'id_departamento' => 21, 'nombre' => 'AZANGARO'],
            ['id_provincia' => 162, 'id_departamento' => 21, 'nombre' => 'CARABAYA'],
            ['id_provincia' => 163, 'id_departamento' => 21, 'nombre' => 'CHUCUITO'],
            ['id_provincia' => 164, 'id_departamento' => 21, 'nombre' => 'EL COLLAO'],
            ['id_provincia' => 165, 'id_departamento' => 21, 'nombre' => 'HUANCANE'],
            ['id_provincia' => 166, 'id_departamento' => 21, 'nombre' => 'LAMPA'],
            ['id_provincia' => 167, 'id_departamento' => 21, 'nombre' => 'MELGAR'],
            ['id_provincia' => 168, 'id_departamento' => 21, 'nombre' => 'MOHO'],
            ['id_provincia' => 169, 'id_departamento' => 21, 'nombre' => 'SAN ANTONIO DE PUTINA'],
            ['id_provincia' => 170, 'id_departamento' => 21, 'nombre' => 'SAN ROMAN'],
            ['id_provincia' => 171, 'id_departamento' => 21, 'nombre' => 'SANDIA'],
            ['id_provincia' => 172, 'id_departamento' => 21, 'nombre' => 'YUNGUYO'],

            // SAN MARTIN (id_departamento: 22)
            ['id_provincia' => 173, 'id_departamento' => 22, 'nombre' => 'MOYOBAMBA'],
            ['id_provincia' => 174, 'id_departamento' => 22, 'nombre' => 'BELLAVISTA'],
            ['id_provincia' => 175, 'id_departamento' => 22, 'nombre' => 'EL DORADO'],
            ['id_provincia' => 176, 'id_departamento' => 22, 'nombre' => 'HUALLAGA'],
            ['id_provincia' => 177, 'id_departamento' => 22, 'nombre' => 'LAMAS'],
            ['id_provincia' => 178, 'id_departamento' => 22, 'nombre' => 'MARISCAL CACERES'],
            ['id_provincia' => 179, 'id_departamento' => 22, 'nombre' => 'PICOTA'],
            ['id_provincia' => 180, 'id_departamento' => 22, 'nombre' => 'RIOJA'],
            ['id_provincia' => 181, 'id_departamento' => 22, 'nombre' => 'SAN MARTIN'],
            ['id_provincia' => 182, 'id_departamento' => 22, 'nombre' => 'TOCACHE'],

            // TACNA (id_departamento: 23)
            ['id_provincia' => 183, 'id_departamento' => 23, 'nombre' => 'TACNA'],
            ['id_provincia' => 184, 'id_departamento' => 23, 'nombre' => 'CANDARAVE'],
            ['id_provincia' => 185, 'id_departamento' => 23, 'nombre' => 'JORGE BASADRE'],
            ['id_provincia' => 186, 'id_departamento' => 23, 'nombre' => 'TARATA'],

            // TUMBES (id_departamento: 24) -- Ajustado al id real 24
            ['id_provincia' => 187, 'id_departamento' => 24, 'nombre' => 'TUMBES'],
            ['id_provincia' => 188, 'id_departamento' => 24, 'nombre' => 'CONTRALMIRANTE VILLAR'],
            ['id_provincia' => 189, 'id_departamento' => 24, 'nombre' => 'ZARUMILLA'],

            // UCAYALI (id_departamento: 25) -- Ajustado al id real 25
            ['id_provincia' => 190, 'id_departamento' => 25, 'nombre' => 'CORONEL PORTILLO'],
            ['id_provincia' => 191, 'id_departamento' => 25, 'nombre' => 'ATALAYA'],
            ['id_provincia' => 192, 'id_departamento' => 25, 'nombre' => 'PADRE ABAD'],
            ['id_provincia' => 193, 'id_departamento' => 25, 'nombre' => 'PURUS'],

            // PASCO (id_departamento: 19) -- Añadiendo Pasco pendiente
            ['id_provincia' => 194, 'id_departamento' => 19, 'nombre' => 'PASCO'],
            ['id_provincia' => 195, 'id_departamento' => 19, 'nombre' => 'DANIEL ALCIDES CARRION'],
            ['id_provincia' => 196, 'id_departamento' => 19, 'nombre' => 'OXAPAMPA'],
        ]);
    }
}