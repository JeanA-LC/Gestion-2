<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerritorialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departamento')->insertOrIgnore([
            ['id_departamento' => 1,  'nombre' => 'AMAZONAS'],
            ['id_departamento' => 2,  'nombre' => 'ANCASH'],
            ['id_departamento' => 3,  'nombre' => 'APURIMAC'],
            ['id_departamento' => 4,  'nombre' => 'AREQUIPA'],
            ['id_departamento' => 5,  'nombre' => 'AYACUCHO'],
            ['id_departamento' => 6,  'nombre' => 'CAJAMARCA'],
            ['id_departamento' => 7,  'nombre' => 'CALLAO'],
            ['id_departamento' => 8,  'nombre' => 'CUSCO'],
            ['id_departamento' => 9,  'nombre' => 'HUANCAVELICA'],
            ['id_departamento' => 10, 'nombre' => 'HUANUCO'],
            ['id_departamento' => 11, 'nombre' => 'ICA'],
            ['id_departamento' => 12, 'nombre' => 'JUNIN'],
            ['id_departamento' => 13, 'nombre' => 'LA LIBERTAD'],
            ['id_departamento' => 14, 'nombre' => 'LAMBAYEQUE'],
            ['id_departamento' => 15, 'nombre' => 'LIMA'],
            ['id_departamento' => 16, 'nombre' => 'LORETO'],
            ['id_departamento' => 17, 'nombre' => 'MADRE DE DIOS'],
            ['id_departamento' => 18, 'nombre' => 'MOQUEGUA'],
            ['id_departamento' => 19, 'nombre' => 'PASCO'],
            ['id_departamento' => 20, 'nombre' => 'PIURA'],
            ['id_departamento' => 21, 'nombre' => 'PUNO'],
            ['id_departamento' => 22, 'nombre' => 'SAN MARTIN'],
            ['id_departamento' => 23, 'nombre' => 'TACNA'],
            ['id_departamento' => 24, 'nombre' => 'TUMBES'],
            ['id_departamento' => 25, 'nombre' => 'UCAYALI'],
        ]);

        DB::table('provincia')->insertOrIgnore([
            // AMAZONAS
            ['id_provincia' => 1, 'id_departamento' => 1, 'nombre' => 'CHACHAPOYAS'],
            ['id_provincia' => 2, 'id_departamento' => 1, 'nombre' => 'BAGUA'],
            ['id_provincia' => 3, 'id_departamento' => 1, 'nombre' => 'BONGARA'],
            ['id_provincia' => 4, 'id_departamento' => 1, 'nombre' => 'CONDORCANQUI'],
            ['id_provincia' => 5, 'id_departamento' => 1, 'nombre' => 'LUYA'],
            ['id_provincia' => 6, 'id_departamento' => 1, 'nombre' => 'RODRIGUEZ DE MENDOZA'],
            ['id_provincia' => 7, 'id_departamento' => 1, 'nombre' => 'UTCUBAMBA'],
            // ANCASH
            ['id_provincia' => 8,  'id_departamento' => 2, 'nombre' => 'HUARAZ'],
            ['id_provincia' => 9,  'id_departamento' => 2, 'nombre' => 'AIJA'],
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
            // APURIMAC
            ['id_provincia' => 28, 'id_departamento' => 3, 'nombre' => 'ABANCAY'],
            ['id_provincia' => 29, 'id_departamento' => 3, 'nombre' => 'ANDAHUAYLAS'],
            ['id_provincia' => 30, 'id_departamento' => 3, 'nombre' => 'ANTABAMBA'],
            ['id_provincia' => 31, 'id_departamento' => 3, 'nombre' => 'AYMARAES'],
            ['id_provincia' => 32, 'id_departamento' => 3, 'nombre' => 'COTABAMBAS'],
            ['id_provincia' => 33, 'id_departamento' => 3, 'nombre' => 'GRAU'],
            ['id_provincia' => 34, 'id_departamento' => 3, 'nombre' => 'CHINCHEROS'],
            // AREQUIPA
            ['id_provincia' => 35, 'id_departamento' => 4, 'nombre' => 'AREQUIPA'],
            ['id_provincia' => 36, 'id_departamento' => 4, 'nombre' => 'CAMANA'],
            ['id_provincia' => 37, 'id_departamento' => 4, 'nombre' => 'CARAVELI'],
            ['id_provincia' => 38, 'id_departamento' => 4, 'nombre' => 'CASTILLA'],
            ['id_provincia' => 39, 'id_departamento' => 4, 'nombre' => 'CAYLLOMA'],
            ['id_provincia' => 40, 'id_departamento' => 4, 'nombre' => 'CONDESUYOS'],
            ['id_provincia' => 41, 'id_departamento' => 4, 'nombre' => 'ISLAY'],
            ['id_provincia' => 42, 'id_departamento' => 4, 'nombre' => 'LA UNION'],
            // AYACUCHO
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
            // CAJAMARCA
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
            // CALLAO
            ['id_provincia' => 67, 'id_departamento' => 7, 'nombre' => 'CALLAO'],
            // CUSCO
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
            // HUANCAVELICA
            ['id_provincia' => 81, 'id_departamento' => 9, 'nombre' => 'HUANCAVELICA'],
            ['id_provincia' => 82, 'id_departamento' => 9, 'nombre' => 'ACOBAMBA'],
            ['id_provincia' => 83, 'id_departamento' => 9, 'nombre' => 'ANGARAES'],
            ['id_provincia' => 84, 'id_departamento' => 9, 'nombre' => 'CASTROVIRREYNA'],
            ['id_provincia' => 85, 'id_departamento' => 9, 'nombre' => 'CHURCAMPA'],
            ['id_provincia' => 86, 'id_departamento' => 9, 'nombre' => 'HUAYTARA'],
            ['id_provincia' => 87, 'id_departamento' => 9, 'nombre' => 'TAYACAJA'],
            // HUANUCO
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
            // ICA
            ['id_provincia' => 99,  'id_departamento' => 11, 'nombre' => 'ICA'],
            ['id_provincia' => 100, 'id_departamento' => 11, 'nombre' => 'CHINCHA'],
            ['id_provincia' => 101, 'id_departamento' => 11, 'nombre' => 'NAZCA'],
            ['id_provincia' => 102, 'id_departamento' => 11, 'nombre' => 'PALPA'],
            ['id_provincia' => 103, 'id_departamento' => 11, 'nombre' => 'PISCO'],
            // JUNIN
            ['id_provincia' => 104, 'id_departamento' => 12, 'nombre' => 'HUANCAYO'],
            ['id_provincia' => 105, 'id_departamento' => 12, 'nombre' => 'CONCEPCION'],
            ['id_provincia' => 106, 'id_departamento' => 12, 'nombre' => 'CHANCHAMAYO'],
            ['id_provincia' => 107, 'id_departamento' => 12, 'nombre' => 'JAUJA'],
            ['id_provincia' => 108, 'id_departamento' => 12, 'nombre' => 'JUNIN'],
            ['id_provincia' => 109, 'id_departamento' => 12, 'nombre' => 'SATIPO'],
            ['id_provincia' => 110, 'id_departamento' => 12, 'nombre' => 'TARMA'],
            ['id_provincia' => 111, 'id_departamento' => 12, 'nombre' => 'YAULI'],
            ['id_provincia' => 112, 'id_departamento' => 12, 'nombre' => 'CHUPACA'],
            // LA LIBERTAD
            ['id_provincia' => 113, 'id_departamento' => 13, 'nombre' => 'TRUJILLO'],
            ['id_provincia' => 114, 'id_departamento' => 13, 'nombre' => 'ASCOPE'],
            ['id_provincia' => 115, 'id_departamento' => 13, 'nombre' => 'BOLIVAR'],
            ['id_provincia' => 116, 'id_departamento' => 13, 'nombre' => 'CHEPEN'],
            ['id_provincia' => 117, 'id_departamento' => 13, 'nombre' => 'JULCAN'],
            ['id_provincia' => 118, 'id_departamento' => 13, 'nombre' => 'OTUZCO'],
            ['id_provincia' => 119, 'id_departamento' => 13, 'nombre' => 'PACASMAYO'],
            ['id_provincia' => 120, 'id_departamento' => 13, 'nombre' => 'PATAZ'],
            ['id_provincia' => 121, 'id_departamento' => 13, 'nombre' => 'SANCHEZ CARRION'],
            ['id_provincia' => 122, 'id_departamento' => 13, 'nombre' => 'SANTIAGO DE CHUCO'],
            ['id_provincia' => 123, 'id_departamento' => 13, 'nombre' => 'GRAN CHIMU'],
            ['id_provincia' => 124, 'id_departamento' => 13, 'nombre' => 'VIRU'],
            // LIMA
            ['id_provincia' => 128, 'id_departamento' => 15, 'nombre' => 'LIMA'],
            ['id_provincia' => 129, 'id_departamento' => 15, 'nombre' => 'BARRANCA'],
            ['id_provincia' => 130, 'id_departamento' => 15, 'nombre' => 'CAJATAMBO'],
            ['id_provincia' => 131, 'id_departamento' => 15, 'nombre' => 'CANTA'],
            ['id_provincia' => 132, 'id_departamento' => 15, 'nombre' => 'CAÑETE'],
            ['id_provincia' => 133, 'id_departamento' => 15, 'nombre' => 'HUARAL'],
            ['id_provincia' => 134, 'id_departamento' => 15, 'nombre' => 'HUAROCHIRI'],
            ['id_provincia' => 135, 'id_departamento' => 15, 'nombre' => 'HUAURA'],
            ['id_provincia' => 136, 'id_departamento' => 15, 'nombre' => 'OYON'],
            ['id_provincia' => 137, 'id_departamento' => 15, 'nombre' => 'YAUYOS'],
            // LORETO
            ['id_provincia' => 138, 'id_departamento' => 16, 'nombre' => 'MAYNAS'],
            ['id_provincia' => 139, 'id_departamento' => 16, 'nombre' => 'ALTO AMAZONAS'],
            ['id_provincia' => 140, 'id_departamento' => 16, 'nombre' => 'LORETO'],
            ['id_provincia' => 141, 'id_departamento' => 16, 'nombre' => 'MARISCAL RAMON CASTILLA'],
            ['id_provincia' => 142, 'id_departamento' => 16, 'nombre' => 'REQUENA'],
            ['id_provincia' => 143, 'id_departamento' => 16, 'nombre' => 'UCAYALI'],
            ['id_provincia' => 144, 'id_departamento' => 16, 'nombre' => 'DATEM DEL MARAÑON'],
            ['id_provincia' => 145, 'id_departamento' => 16, 'nombre' => 'PUTUMAYO'],
            // MADRE DE DIOS
            ['id_provincia' => 146, 'id_departamento' => 17, 'nombre' => 'TAMBOPATA'],
            ['id_provincia' => 147, 'id_departamento' => 17, 'nombre' => 'MANU'],
            ['id_provincia' => 148, 'id_departamento' => 17, 'nombre' => 'TAHUAMANU'],
            // MOQUEGUA
            ['id_provincia' => 149, 'id_departamento' => 18, 'nombre' => 'MARISCAL NIETO'],
            ['id_provincia' => 150, 'id_departamento' => 18, 'nombre' => 'GENERAL SANCHEZ CERRO'],
            ['id_provincia' => 151, 'id_departamento' => 18, 'nombre' => 'ILO'],
            // PIURA
            ['id_provincia' => 152, 'id_departamento' => 20, 'nombre' => 'PIURA'],
            ['id_provincia' => 153, 'id_departamento' => 20, 'nombre' => 'AYABACA'],
            ['id_provincia' => 154, 'id_departamento' => 20, 'nombre' => 'HUANCABAMBA'],
            ['id_provincia' => 155, 'id_departamento' => 20, 'nombre' => 'MORROPON'],
            ['id_provincia' => 156, 'id_departamento' => 20, 'nombre' => 'PAITA'],
            ['id_provincia' => 157, 'id_departamento' => 20, 'nombre' => 'SULLANA'],
            ['id_provincia' => 158, 'id_departamento' => 20, 'nombre' => 'TALARA'],
            ['id_provincia' => 159, 'id_departamento' => 20, 'nombre' => 'SECHURA'],
            // PUNO
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
            // SAN MARTIN
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
            // TACNA
            ['id_provincia' => 183, 'id_departamento' => 23, 'nombre' => 'TACNA'],
            ['id_provincia' => 184, 'id_departamento' => 23, 'nombre' => 'CANDARAVE'],
            ['id_provincia' => 185, 'id_departamento' => 23, 'nombre' => 'JORGE BASADRE'],
            ['id_provincia' => 186, 'id_departamento' => 23, 'nombre' => 'TARATA'],
            // TUMBES
            ['id_provincia' => 187, 'id_departamento' => 24, 'nombre' => 'TUMBES'],
            ['id_provincia' => 188, 'id_departamento' => 24, 'nombre' => 'CONTRALMIRANTE VILLAR'],
            ['id_provincia' => 189, 'id_departamento' => 24, 'nombre' => 'ZARUMILLA'],
            // UCAYALI
            ['id_provincia' => 190, 'id_departamento' => 25, 'nombre' => 'CORONEL PORTILLO'],
            ['id_provincia' => 191, 'id_departamento' => 25, 'nombre' => 'ATALAYA'],
            ['id_provincia' => 192, 'id_departamento' => 25, 'nombre' => 'PADRE ABAD'],
            ['id_provincia' => 193, 'id_departamento' => 25, 'nombre' => 'PURUS'],
            // PASCO
            ['id_provincia' => 194, 'id_departamento' => 19, 'nombre' => 'PASCO'],
            ['id_provincia' => 195, 'id_departamento' => 19, 'nombre' => 'DANIEL ALCIDES CARRION'],
            ['id_provincia' => 196, 'id_departamento' => 19, 'nombre' => 'OXAPAMPA'],
        ]);

        $this->insertDistritos();
    }

    private function insertDistritos(): void
    {
        // Inserting in batches to avoid memory issues
        // Fixes applied:
        //   '13809' → '160109' (TORRES CAUSANA, Loreto)
        //   '13604' → '150904' (COCHAMARCA, Lima/Oyon)
        //   '11101' → '120801' (LA OROYA, Junin/Yauli)
        //   Removed CHALAMARCA_REPETIDO duplicate
        //   Removed duplicate Lima districts (150141, 150142, 150143)

        $distritos = [
            // AMAZONAS - CHACHAPOYAS
            [1,'CHACHAPOYAS','010101'],[1,'ASUNCION','010102'],[1,'BALSAS','010103'],
            [1,'CHETO','010104'],[1,'CHILIQUIN','010105'],[1,'CHUQUIBAMBA','010106'],
            [1,'GRANADA','010107'],[1,'HUANCAS','010108'],[1,'LA JALCA','010109'],
            [1,'LEIMEBAMBA','010110'],[1,'LEVANTO','010111'],[1,'MAGDALENA','010112'],
            [1,'MARISCAL CASTILLA','010113'],[1,'MOLINOPAMPA','010114'],[1,'MONTEVIDEO','010115'],
            [1,'OLLEROS','010116'],[1,'QUINJALCA','010117'],[1,'SAN FRANCISCO DE DAGUAS','010118'],
            [1,'SAN ISIDRO DE MAINOMBO','010119'],[1,'SOLOCO','010120'],[1,'SONCHE','010121'],
            // BAGUA
            [2,'BAGUA','010201'],[2,'ARAMANGO','010202'],[2,'COPALLIN','010203'],
            [2,'EL PARCO','010204'],[2,'IMAZA','010205'],[2,'LA PECA','010206'],
            // BONGARA
            [3,'JUMBILLA','010301'],[3,'CHISQUILLA','010302'],[3,'CHURUJA','010303'],
            [3,'COROSHA','010304'],[3,'CUISPES','010305'],[3,'FLORIDA','010306'],
            [3,'JAZAN','010307'],[3,'RECTA','010308'],[3,'SAN CARLOS','010309'],
            [3,'SHIPASBAMBA','010310'],[3,'VALERA','010311'],[3,'YAMBRASBAMBA','010312'],
            // CONDORCANQUI
            [4,'NIEVA','010401'],[4,'EL CENEPA','010402'],[4,'RIO SANTIAGO','010403'],
            // LUYA
            [5,'LAMUD','010501'],[5,'CAMPORREDONDO','010502'],[5,'COCABAMBA','010503'],
            [5,'COLEMAR','010504'],[5,'CONILA','010505'],[5,'INGUILPATA','010506'],
            [5,'LONGUITA','010507'],[5,'LONYA CHICO','010508'],[5,'LUYA','010509'],
            [5,'LUYA VIEJO','010510'],[5,'MARIA','010511'],[5,'OCALLI','010512'],
            [5,'OCUMAL','010513'],[5,'PISUQUIA','010514'],[5,'PROVIDENCIA','010515'],
            [5,'SAN CRISTOBAL','010516'],[5,'SAN FRANCISCO DEL YESO','010517'],
            [5,'SAN JERONIMO','010518'],[5,'SAN JUAN DE LOPECANCA','010519'],
            [5,'SANTA CATALINA','010520'],[5,'SANTO TOMAS','010521'],
            [5,'TINGO','010522'],[5,'TRITA','010523'],
            // RODRIGUEZ DE MENDOZA
            [6,'SAN NICOLAS','010601'],[6,'CHIRIMOTO','010602'],[6,'COCHAMAL','010603'],
            [6,'HUAMBO','010604'],[6,'LIMABAMBA','010605'],[6,'LONGAR','010606'],
            [6,'MILPUCC','010607'],[6,'OMIA','010608'],[6,'SANTA ROSA','010609'],
            [6,'TOTORA','010610'],[6,'VISTA ALEGRE','010611'],
            // UTCUBAMBA
            [7,'BAGUA GRANDE','010701'],[7,'CAJARURO','010702'],[7,'CUMBA','010703'],
            [7,'EL MILAGRO','010704'],[7,'JAMALCA','010705'],[7,'LONYA GRANDE','010706'],
            [7,'YAMON','010707'],
            // ANCASH - HUARAZ
            [8,'HUARAZ','020101'],[8,'COCHABAMBA','020102'],[8,'COLCABAMBA','020103'],
            [8,'HUANCHAY','020104'],[8,'INDEPENDENCIA','020105'],[8,'JANGAS','020106'],
            [8,'LA LIBERTAD','020107'],[8,'OLLEROS','020108'],[8,'PAMPAS GRANDE','020109'],
            [8,'PARIACOTO','020110'],[8,'PIRA','020111'],[8,'TARICA','020112'],
            // AIJA
            [9,'AIJA','020201'],[9,'CORIS','020202'],[9,'HUACLLAN','020203'],
            [9,'LA MERCED','020204'],[9,'SUCCRA','020205'],
            // ANTONIO RAYMONDI
            [10,'LLAMELLIN','020301'],[10,'ACZO','020302'],[10,'CHACCHO','020303'],
            [10,'CHINGAS','020304'],[10,'MIRGAS','020305'],[10,'SAN JUAN DE RONTOY','020306'],
            // ASUNCION
            [11,'CHACAS','020401'],[11,'ACOCHAN','020402'],
            // BOLOGNESI
            [12,'CHIQUIAN','020501'],[12,'ABELARDO PARARDO LEZAMETA','020502'],
            [12,'ANTONIO RAYMONDI','020503'],[12,'AQUIA','020504'],[12,'CAJACAY','020505'],
            [12,'CANIS','020506'],[12,'COLQUIOC','020507'],[12,'HUALLANCA','020508'],
            [12,'HUASTA','020509'],[12,'HUAYLLACAYAN','020510'],[12,'LA PRIMAVERA','020511'],
            [12,'MANGAS','020512'],[12,'PACLLON','020513'],[12,'SAN MIGUEL DE CORPANQUI','020514'],
            [12,'TICLLOS','020515'],
            // CARHUAZ
            [13,'CARHUAZ','020601'],[13,'ACOPAMPA','020602'],[13,'AMASHCA','020603'],
            [13,'ANTA','020604'],[13,'ATAQUERO','020605'],[13,'MARCARA','020606'],
            [13,'PARIAHUANCA','020607'],[13,'SAN MIGUEL DE ACO','020608'],[13,'SHILLA','020609'],
            [13,'TINCO','020610'],[13,'YUNGAR','020611'],
            // CARLOS FERMIN FITZCARRALD
            [14,'SAN LUIS','020701'],[14,'SAN NICOLAS','020702'],[14,'YAUYA','020703'],
            // CASMA
            [15,'CASMA','020801'],[15,'BUENA VISTA ALTA','020802'],
            [15,'COMANDANTE NOEL','020803'],[15,'YAUTAN','020804'],
            // CORONGO
            [16,'CORONGO','020901'],[16,'ACO','020902'],[16,'BAMBAS','020903'],
            [16,'CUSCA','020904'],[16,'LA PAMPA','020905'],[16,'YANAC','020906'],
            [16,'YUPAN','020907'],
            // HUARI
            [17,'HUARI','021001'],[17,'ANRA','021002'],[17,'CAJAY','021003'],
            [17,'CHAVIN DE HUANTAR','021004'],[17,'HUACACHI','021005'],[17,'HUACCHIS','021006'],
            [17,'HUACHIS','021007'],[17,'HUANTAR','021008'],[17,'MASIN','021009'],
            [17,'PAUCAS','021010'],[17,'PONTO','021011'],[17,'RAHUARY','021012'],
            [17,'RAPAYAN','021013'],[17,'SAN MARCOS','021014'],[17,'SAN PEDRO DE CHANA','021015'],
            [17,'UCO','021016'],
            // HUARMEY
            [18,'HUARMEY','021101'],[18,'COCHAPETI','021102'],[18,'CULEBRAS','021103'],
            [18,'HUAYAN','021104'],[18,'MALVAS','021105'],
            // HUAYLAS
            [19,'CARAZ','021201'],[19,'HUALLAN','021202'],[19,'HUATA','021203'],
            [19,'HUAYLAS','021204'],[19,'MATACOTO','021205'],[19,'PAMPAROMAS','021206'],
            [19,'PUEBLO LIBRE','021207'],[19,'SANTA CRUZ','021208'],[19,'SANTO TORIBIO','021209'],
            [19,'YURACMARCA','021210'],
            // MARISCAL LUZURIAGA
            [20,'PISCOBAMBA','021301'],[20,'CASCA','021302'],[20,'ELEAZAR GUZMAN BARRON','021303'],
            [20,'FIDEL OLIVAS ESCUDERO','021304'],[20,'LLAMA','021305'],[20,'LLUMPA','021306'],
            [20,'LUCMA','021307'],[20,'MUSGA','021308'],
            // OCROS
            [21,'OCROS','021401'],[21,'ACAS','021402'],[21,'CAJAMARQUILLA','021403'],
            [21,'CARHUAPAMPA','021404'],[21,'COCHAS','021405'],[21,'CONGAS','021406'],
            [21,'LLIPA','021407'],[21,'SAN CRISTOBAL DE RAJAN','021408'],[21,'SAN PEDRO','021409'],
            [21,'SANTIAGO DE CHILCAS','021410'],
            // PALLASCA
            [22,'CABANA','021501'],[22,'BOLOGNESI','021502'],[22,'CONCHUCOS','021503'],
            [22,'HUACASCHUQUE','021504'],[22,'HUANDOVAL','021505'],[22,'LACABAMBA','021506'],
            [22,'LLAPO','021507'],[22,'PALLASCA','021508'],[22,'PAMPAS','021509'],
            [22,'SANTA ROSA','021510'],[22,'TAUCA','021511'],
            // POMABAMBA
            [23,'POMABAMBA','021601'],[23,'HUAYLLAN','021602'],[23,'PAROBAMBA','021603'],
            [23,'QUINUABAMBA','021604'],
            // RECUAY
            [24,'RECUAY','021701'],[24,'CATAC','021702'],[24,'COTAPARACO','021703'],
            [24,'HUAYLLAPAMPA','021704'],[24,'LLACLLIN','021705'],[24,'MARCA','021706'],
            [24,'PAMPAS CHICO','021707'],[24,'PARARIN','021708'],[24,'TAPACOCHA','021709'],
            [24,'TICAPAMPA','021710'],
            // SANTA
            [25,'CHIMBOTE','021801'],[25,'CACERES DEL PERU','021802'],[25,'COISHCO','021803'],
            [25,'MACATE','021804'],[25,'MORO','021805'],[25,'NEPEÑA','021806'],
            [25,'SAMANCO','021807'],[25,'SANTA','021808'],[25,'NUEVO CHIMBOTE','021809'],
            // SIHUAS
            [26,'SIHUAS','021901'],[26,'ACOBAMBA','021902'],[26,'ALFONSO UGARTE','021903'],
            [26,'CASHAPAMPA','021904'],[26,'CHINGALPO','021905'],[26,'HUAYLLABAMBA','021906'],
            [26,'QUICHES','021907'],[26,'RAGASH','021908'],[26,'SAN JUAN','021909'],
            [26,'SICSIBAMBA','021910'],
            // YUNGAY
            [27,'YUNGAY','022001'],[27,'CASCAPARA','022002'],[27,'MANCOS','022003'],
            [27,'MATACOTO','022004'],[27,'QUILLO','022005'],[27,'RANRAHIRCA','022006'],
            [27,'SHUPLUY','022007'],[27,'YANAMA','022008'],
        ];

        $distritos2 = [
            // APURIMAC - ABANCAY
            [28,'ABANCAY','030101'],[28,'CHACOCHE','030102'],[28,'CIRCA','030103'],
            [28,'CURAHUASI','030104'],[28,'HUANIPACA','030105'],[28,'LAMBRAMA','030106'],
            [28,'PICHIRHUA','030107'],[28,'SAN PEDRO DE CACHORA','030108'],[28,'TAMBURCO','030109'],
            // ANDAHUAYLAS
            [29,'ANDAHUAYLAS','030201'],[29,'ANDARAPA','030202'],[29,'CHIARA','030203'],
            [29,'HUANCARAMA','030204'],[29,'HUANCARAY','030205'],[29,'HUAYANA','030206'],
            [29,'KISHUARA','030207'],[29,'PACOBAMBA','030208'],[29,'PACUCHA','030209'],
            [29,'PAMPACHIRI','030210'],[29,'POMACOCHA','030211'],[29,'SAN ANTONIO DE CACHI','030212'],
            [29,'SAN JERONIMO','030213'],[29,'SAN MIGUEL DE CHACCRAMPA','030214'],
            [29,'SANTA MARIA DE CHICMO','030215'],[29,'TALAVERA','030216'],
            [29,'TUMAY HUARACA','030217'],[29,'TURPO','030218'],[29,'KAQUIABAMBA','030219'],
            [29,'JOSE MARIA ARGUEDAS','030220'],
            // ANTABAMBA
            [30,'ANTABAMBA','030301'],[30,'EL ORO','030302'],[30,'HUAQUIRCA','030303'],
            [30,'JUAN ESPINOZA MEDRANO','030304'],[30,'OROPESA','030305'],[30,'SABAINO','030306'],
            // AYMARAES
            [31,'CHALHUANCA','030401'],[31,'CAPAYA','030402'],[31,'CARAYBAMBA','030403'],
            [31,'CHAPIMARCA','030404'],[31,'COLCABAMBA','030405'],[31,'COTARUSE','030406'],
            [31,'IHUAYLLO','030407'],[31,'JUSTO APU SAHAUARAURA','030408'],[31,'LUCRE','030409'],
            [31,'POCOHUANCA','030410'],[31,'SAN JUAN DE CHACÑA','030411'],[31,'SAÑAYCA','030412'],
            [31,'SORAYA','030413'],[31,'TAPAIRIHUA','030414'],[31,'TINTAY','030415'],
            [31,'TORAYA','030416'],[31,'YANACA','030417'],
            // COTABAMBAS
            [32,'TAMBOBAMBA','030501'],[32,'COTABAMBAS','030502'],[32,'COYLLURQUI','030503'],
            [32,'HAQUIRA','030504'],[32,'MARA','030505'],[32,'CHALLHUAHUACHO','030506'],
            // GRAU
            [33,'CHUQUIBAMBILLA','030601'],[33,'CURPAHUASI','030602'],[33,'GAMARRA','030603'],
            [33,'HUAYLLATI','030604'],[33,'MAMARA','030605'],[33,'MICAELA BASTIDAS','030606'],
            [33,'PATAYPAMPA','030607'],[33,'PROGRESO','030608'],[33,'SAN ANTONIO','030609'],
            [33,'SANTA ROSA','030610'],[33,'TURPAY','030611'],[33,'VILCABAMBA','030612'],
            [33,'VIRUNDO','030613'],
            // CHINCHEROS
            [34,'CHINCHEROS','030701'],[34,'ANCO-HUALLO','030702'],[34,'COCHARCAS','030703'],
            [34,'HUACCANA','030704'],[34,'OCOBAMBA','030705'],[34,'ONGOY','030706'],
            [34,'URANMARCA','030707'],[34,'RANRACANCHA','030708'],[34,'ROCCHACC','030709'],
            [34,'EL PORVENIR','030710'],[34,'LOS CHANKAS','030711'],
            // AREQUIPA - AREQUIPA
            [35,'AREQUIPA','040101'],[35,'ALTO SELVA ALEGRE','040102'],[35,'CAYMA','040103'],
            [35,'CERRO COLORADO','040104'],[35,'CHARACATO','040105'],[35,'CHIGUATA','040106'],
            [35,'JACOBO HUNTER','040107'],[35,'LA JOYA','040108'],[35,'MARIANO MELGAR','040109'],
            [35,'MIRAFLORES','040110'],[35,'MOLLEBAYA','040111'],[35,'PAUCARPATA','040112'],
            [35,'POCSI','040113'],[35,'POLOBAYA','040114'],[35,'QUEQUEÑA','040115'],
            [35,'SABANDIA','040116'],[35,'SACHACA','040117'],[35,'SAN JUAN DE SIGUAS','040118'],
            [35,'SAN JUAN DE TARUCANI','040119'],[35,'SANTA RITA DE SIGUAS','040120'],
            [35,'SANTA ISABEL DE SIGUAS','040121'],[35,'SOCABAYA','040122'],[35,'TIABAYA','040123'],
            [35,'UCHUMAYO','040124'],[35,'VITOR','040125'],[35,'YANAHUARA','040126'],
            [35,'YARABAMBA','040127'],[35,'YURA','040128'],[35,'JOSE LUIS BUSTAMANTE Y RIVERO','040129'],
            // CAMANA
            [36,'CAMANA','040201'],[36,'JOSE MARIA QUIMPER','040202'],
            [36,'MARIANO NICOLAS VALCARCEL','040203'],[36,'MARISCAL CACERES','040204'],
            [36,'NICOLAS DE PIEROLA','040205'],[36,'OCAÑA','040206'],[36,'QUILCA','040207'],
            [36,'SAMUEL PASTOR','040208'],
            // CARAVELI
            [37,'CARAVELI','040301'],[37,'ACARI','040302'],[37,'ATICO','040303'],
            [37,'ATIQUIPA','040304'],[37,'BELLA UNION','040305'],[37,'CAHUACHO','040306'],
            [37,'CHALA','040307'],[37,'CHAPARRA','040308'],[37,'HUANUHUANU','040309'],
            [37,'JAQUI','040310'],[37,'LOMAS','040311'],[37,'QUICACHA','040312'],
            [37,'YAUCA','040313'],
            // CASTILLA
            [38,'APLAO','040401'],[38,'ANDAGUA','040402'],[38,'AYO','040403'],
            [38,'CHACHAS','040404'],[38,'CHILCAYMARCA','040405'],[38,'CHOCO','040406'],
            [38,'HUANCARQUI','040407'],[38,'MACHAGUAY','040408'],[38,'ORCOPAMPA','040409'],
            [38,'PAMPACOLCA','040410'],[38,'TIPAN','040411'],[38,'UÑON','040412'],
            [38,'URACA','040413'],[38,'VIRACO','040414'],
            // CAYLLOMA
            [39,'CHIVAY','040501'],[39,'ACHOMA','040502'],[39,'CABANACONDE','040503'],
            [39,'CALLALLI','040504'],[39,'CAYLLOMA','040505'],[39,'COPORAQUE','040506'],
            [39,'HUAMBO','040507'],[39,'HUANCA','040508'],[39,'ICHUPAMPA','040509'],
            [39,'LARI','040510'],[39,'LLUTA','040511'],[39,'MACA','040512'],
            [39,'MADRIGAL','040513'],[39,'SAN ANTONIO DE CHUCA','040514'],[39,'SIBAYO','040515'],
            [39,'TAPAY','040516'],[39,'TISCO','040517'],[39,'TUTI','040518'],
            [39,'YANQUE','040519'],[39,'MAJES','040520'],
            // CONDESUYOS
            [40,'CHUQUIBAMBA','040601'],[40,'ANDARAY','040602'],[40,'CAYARANI','040603'],
            [40,'CHICHAS','040604'],[40,'IRAY','040605'],[40,'RIO GRANDE','040606'],
            [40,'SALAMANCA','040607'],[40,'YANAQUIHUA','040608'],
            // ISLAY
            [41,'MOLLENDO','040701'],[41,'COCACHACRA','040702'],[41,'DEAN VALDIVIA','040703'],
            [41,'ISLAY','040704'],[41,'MEJIA','040705'],[41,'PUNTA DE BOMBON','040706'],
            // LA UNION
            [42,'COTAHUASI','040801'],[42,'ALCA','040802'],[42,'CHARCANA','040803'],
            [42,'HUAYLLACUCHO','040804'],[42,'PAMPAMARCA','040805'],[42,'PUYCA','040806'],
            [42,'QUECHUALLA','040807'],[42,'SAYLA','040808'],[42,'TAURIA','040809'],
            [42,'TOMEPAMPA','040810'],[42,'TORO','040811'],
        ];

        $distritos3 = [
            // AYACUCHO - HUAMANGA
            [43,'AYACUCHO','050101'],[43,'ACOCRO','050102'],[43,'ACOS VINCHOS','050103'],
            [43,'CARMEN ALTO','050104'],[43,'CHIARA','050105'],[43,'OCROS','050106'],
            [43,'PACAYCASA','050107'],[43,'QUINUA','050108'],[43,'SAN JOSE DE TICLLAS','050109'],
            [43,'SAN JUAN BAUTISTA','050110'],[43,'SANTIAGO DE PISCHA','050111'],
            [43,'SOCOS','050112'],[43,'TAMBILLO','050113'],[43,'VINCHOS','050114'],
            [43,'JESUS NAZARENO','050115'],[43,'ANDRES AVELINO CACERES DORREGARAY','050116'],
            // CANGALLO
            [44,'CANGALLO','050201'],[44,'CHUSCHI','050202'],[44,'LOS MOROCHUCOS','050203'],
            [44,'MARIA PARADO DE BELLIDO','050204'],[44,'PARAS','050205'],[44,'TOTOS','050206'],
            // HUANCA SANCOS
            [45,'SANCOS','050301'],[45,'CARAPO','050302'],[45,'SACSAMARCA','050303'],
            [45,'SANTIAGO DE LUCANAMARCA','050304'],
            // HUANTA
            [46,'HUANTA','050401'],[46,'AYAHUANCO','050402'],[46,'HUAMANGUILLA','050403'],
            [46,'IGUAIN','050404'],[46,'LURICOCHA','050405'],[46,'SANTILLANA','050406'],
            [46,'SIVIA','050407'],[46,'LLOCHEGUA','050408'],[46,'CANAYRE','050409'],
            [46,'UCHURACCAY','050410'],[46,'PUCACOLPA','050411'],[46,'CHACA','050412'],
            // LA MAR
            [47,'SAN MIGUEL','050501'],[47,'ANCO','050502'],[47,'AYNA','050503'],
            [47,'CHILCAS','050504'],[47,'CHUNGUI','050505'],[47,'LUIS CARRANZA','050506'],
            [47,'SANTA ROSA','050507'],[47,'TAMBO','050508'],[47,'SAMUGARI','050509'],
            [47,'ANCHIHUAY','050510'],[47,'ORONCCOY','050511'],
            // LUCANAS
            [48,'PUQUIO','050601'],[48,'AUCKARA','050602'],[48,'CABANA','050603'],
            [48,'CARMEN SALCEDO','050604'],[48,'CHAVIÑA','050605'],[48,'CHIPAO','050606'],
            [48,'HUAC-HUAS','050607'],[48,'LARAMATE','050608'],[48,'LEONCIO PRADO','050609'],
            [48,'LLAUTA','050610'],[48,'LUCANAS','050611'],[48,'OCAÑA','050612'],
            [48,'OTOCA','050613'],[48,'SAISA','050614'],[48,'SAN CRISTOBAL','050615'],
            [48,'SAN JUAN','050616'],[48,'SAN PEDRO','050617'],[48,'SAN PEDRO DE PALCO','050618'],
            [48,'SANCOS','050619'],[48,'SANTA ANA DE HUAYCAHUACHO','050620'],[48,'SANTA LUCIA','050621'],
            // PARINACOCHAS
            [49,'CORACORA','050701'],[49,'CHUMPI','050702'],[49,'CORONEL CASTAÑEDA','050703'],
            [49,'PACAPAUZA','050704'],[49,'PULLO','050705'],[49,'PUYUSCA','050706'],
            [49,'SAN FRANCISCO DE RAVACAYCO','050707'],[49,'UPAHUACHO','050708'],
            // PAUCAR DEL SARA SARA
            [50,'PAUSA','050801'],[50,'COLTA','050802'],[50,'CORCULLA','050803'],
            [50,'LAMPA','050804'],[50,'MARCABAMBA','050805'],[50,'OYOLO','050806'],
            [50,'PARARCA','050807'],[50,'SAN JAVIER DE ALPABAMBA','050808'],
            [50,'SAN JOSE DE SANTIAGO','050809'],[50,'SARA SARA','050810'],
            // SUCRE
            [51,'QUEROBAMBA','050901'],[51,'BELEN','050902'],[51,'CHALCOS','050903'],
            [51,'CHILCAYOC','050904'],[51,'HUACAÑA','050905'],[51,'MORCOLLA','050906'],
            [51,'PAICO','050907'],[51,'SAN PEDRO DE LARCAY','050908'],
            [51,'SAN SALVADOR DE QUIJE','050909'],[51,'SANTIAGO DE PAUCARAY','050910'],
            [51,'SORAS','050911'],
            // VICTOR FAJARDO
            [52,'HUANCAPI','051001'],[52,'ALCAMENCA','051002'],[52,'APONGO','051003'],
            [52,'ASQUIPATA','051004'],[52,'CANARIA','051005'],[52,'CAYARA','051006'],
            [52,'COLCA','051007'],[52,'HUAMANQUIQUIA','051008'],[52,'HUANCARAYLLA','051009'],
            [52,'HUAYA','051010'],[52,'SARHUA','051011'],[52,'VILCANCHOS','051012'],
            // VILCAS HUAMAN
            [53,'VILCAS HUAMAN','051101'],[53,'ACCOMARCA','051102'],[53,'CARHUANCHO','051103'],
            [53,'CONCEPCION','051104'],[53,'HUAMBALPA','051105'],[53,'INDEPENDENCIA','051106'],
            [53,'SAURAMA','051107'],[53,'VISCHONGO','051108'],
        ];

        $distritos4 = [
            // CAJAMARCA
            [54,'CAJAMARCA','060101'],[54,'ASUNCION','060102'],[54,'CHETILLA','060103'],
            [54,'COSPAN','060104'],[54,'ENCAÑADA','060105'],[54,'JESUS','060106'],
            [54,'LLACANORA','060107'],[54,'LOS BAÑOS DEL INCA','060108'],[54,'MAGDALENA','060109'],
            [54,'MATARA','060110'],[54,'NAMORA','060111'],[54,'SAN JUAN','060112'],
            // CAJABAMBA
            [55,'CAJABAMBA','060201'],[55,'CACHACHI','060202'],[55,'CONDEBAMBA','060203'],
            [55,'SITACOCHA','060204'],
            // CELENDIN
            [56,'CELENDIN','060301'],[56,'CHUMUCH','060302'],[56,'CORTEGANA','060303'],
            [56,'HUASMIN','060304'],[56,'JORGE CHAVEZ','060305'],[56,'JOSE GALVEZ','060306'],
            [56,'MIGUEL IGLESIAS','060307'],[56,'OXAMARCA','060308'],[56,'SOROCHUCO','060309'],
            [56,'SUCRE','060310'],[56,'UTCO','060311'],[56,'LA LIBERTAD DE PALLAN','060312'],
            // CHOTA
            [57,'CHOTA','060401'],[57,'ANGUIA','060402'],[57,'CHADIN','060403'],
            [57,'CHALAMARCA','060404'],[57,'CHIGUIRIP','060405'],[57,'CHIMBAN','060406'],
            [57,'CHOCHABAMBA','060407'],[57,'CONCHAN','060408'],[57,'HUAMBOS','060409'],
            [57,'LAJAS','060410'],[57,'LLAMA','060411'],[57,'MIRACOSTA','060412'],
            [57,'PACCHA','060413'],[57,'PION','060414'],[57,'QUEROCOTO','060415'],
            [57,'SAN JUAN DE LICUPIS','060416'],[57,'TACABAMBA','060417'],[57,'TOCMOCHE','060418'],
            // CONTUMAZA
            [58,'CONTUMAZA','060501'],[58,'CHILETE','060502'],[58,'CUPISNIQUE','060503'],
            [58,'GUZMANGO','060504'],[58,'SAN BENITO','060505'],[58,'SANTA CRUZ DE TOLED','060506'],
            [58,'TANTARICA','060507'],[58,'YONAN','060508'],
            // CUTERVO
            [59,'CUTERVO','060601'],[59,'CALLAYUC','060602'],[59,'CHOROS','060603'],
            [59,'CUJILLO','060604'],[59,'LA RAMADA','060605'],[59,'PIMPINGOS','060606'],
            [59,'QUEROCOTILLO','060607'],[59,'SAN ANDRES DE CUTERVO','060608'],
            [59,'SAN JUAN DE CUTERVO','060609'],[59,'SAN LUIS DE LUCMA','060610'],
            [59,'SANTA CRUZ','060611'],[59,'SANTO DOMINGO DE LA CAPILLA','060612'],
            [59,'SANTO TOMAS','060613'],
            // HUALGAYOC
            [60,'BAMBAMARCA','060701'],[60,'CHUGUR','060702'],[60,'HUALGAYOC','060703'],
            // JAEN
            [61,'JAEN','060801'],[61,'BELLAVISTA','060802'],[61,'CHONTALI','060803'],
            [61,'COLASAY','060804'],[61,'HUABAL','060805'],[61,'LAS PIRIAS','060806'],
            [61,'POMAHUACA','060807'],[61,'PUCARA','060808'],[61,'SALLIQUE','060809'],
            [61,'SAN FELIPE','060810'],[61,'SAN JOSE DEL ALTO','060811'],[61,'SANTA ROSA','060812'],
            // SAN IGNACIO
            [62,'SAN IGNACIO','060901'],[62,'CHIRINOS','060902'],[62,'HUARANGO','060903'],
            [62,'LA COIPA','060904'],[62,'NAMBALALLE','060905'],[62,'SAN JOSE DE LOURDES','060906'],
            [62,'TABACONAS','060907'],
            // SAN MARCOS
            [63,'PEDRO GALVEZ','061001'],[63,'CHANCAY','061002'],[63,'EDUARDO VILLANUEVA','061003'],
            [63,'GREGORIO PITA','061004'],[63,'ICHOCAN','061005'],[63,'JOSE MANUEL QUIROZ','061006'],
            [63,'JOSE SABOGAL','061007'],
            // SAN MIGUEL
            [64,'SAN MIGUEL','061101'],[64,'BOLIVAR','061102'],[64,'CALQUIS','061103'],
            [64,'CATILLUC','061104'],[64,'EL PRADO','061105'],[64,'LA FLORIDA','061106'],
            [64,'LLAPA','061107'],[64,'NANCHOC','061108'],[64,'NIEPOS','061109'],
            [64,'SAN GREGORIO','061110'],[64,'SAN SILVESTRE DE COCHAN','061111'],
            [64,'TONGOD','061112'],[64,'UNION AGUA BLANCA','061113'],
            // SAN PABLO
            [65,'SAN PABLO','061201'],[65,'SAN BERNARDINO','061202'],[65,'SAN LUIS','061203'],
            [65,'TUMBADEN','061204'],
            // SANTA CRUZ
            [66,'SANTA CRUZ','061301'],[66,'ANDABAMBA','061302'],[66,'CATACHE','061303'],
            [66,'CHANCAYBAÑOS','061304'],[66,'LA ESPERANZA','061305'],[66,'NINABAMBA','061306'],
            [66,'PULAN','061307'],[66,'SAUCEPAMPA','061308'],[66,'SEXE','061309'],
            [66,'UTICYACU','061310'],[66,'YAUYUCAN','061311'],
            // CALLAO
            [67,'CALLAO','070101'],[67,'BELLAVISTA','070102'],[67,'CARMEN DE LA LEGUA REYNOSO','070103'],
            [67,'LA PERLA','070104'],[67,'LA PUNTA','070105'],[67,'VENTANILLA','070106'],
            [67,'MI PERU','070107'],
        ];

        $distritos5 = [
            // CUSCO
            [68,'CUSCO','080101'],[68,'CCORCA','080102'],[68,'POROY','080103'],
            [68,'SAN JERONIMO','080104'],[68,'SAN SEBASTIAN','080105'],[68,'SANTIAGO','080106'],
            [68,'SAYLLA','080107'],[68,'WANCHAQ','080108'],
            // ACOMAYO
            [69,'ACOMAYO','080201'],[69,'ACOPIA','080202'],[69,'ACOS','080203'],
            [69,'MOSOC LLACTA','080204'],[69,'POMACANCHI','080205'],[69,'RONDOCAN','080206'],
            [69,'SANGARARA','080207'],
            // ANTA
            [70,'ANTA','080301'],[70,'ANCAHUASI','080302'],[70,'CACHIMAYO','080303'],
            [70,'CHINCHAYPUQUIO','080304'],[70,'HUAROCONDO','080305'],[70,'LIMATAMBO','080306'],
            [70,'MOLLEPATA','080307'],[70,'PUCYURA','080308'],[70,'ZURITE','080309'],
            // CALCA
            [71,'CALCA','080401'],[71,'COYA','080402'],[71,'LAMAY','080403'],
            [71,'LARES','080404'],[71,'PISAC','080405'],[71,'SAN SALVADOR','080406'],
            [71,'TARAY','080407'],[71,'YANATILE','080408'],
            // CANAS
            [72,'YANAOCA','080501'],[72,'CHECCA','080502'],[72,'KUNTURKANKI','080503'],
            [72,'LANGUI','080504'],[72,'LAYO','080505'],[72,'PAMPAMARCA','080506'],
            [72,'QUEHUE','080507'],[72,'TUPAC AMARU','080508'],
            // CANCHIS
            [73,'SICUANI','080601'],[73,'CHECACUPE','080602'],[73,'COMBAPATA','080603'],
            [73,'MARANGANI','080604'],[73,'PITUMARCA','080605'],[73,'SAN PABLO','080606'],
            [73,'SAN PEDRO','080607'],[73,'TINTA','080608'],
            // CHUMBIVILCAS
            [74,'SANTO TOMAS','080701'],[74,'CAPACMARCA','080702'],[74,'CHAMACA','080703'],
            [74,'COLQUEMARCA','080704'],[74,'LIVITACA','080705'],[74,'LLUSCO','080706'],
            [74,'QUIÑOTA','080707'],[74,'VELILLE','080708'],
            // ESPINAR
            [75,'YAURI','080801'],[75,'CONDOROMA','080802'],[75,'COPORAQUE','080803'],
            [75,'OCORURO','080804'],[75,'PALLPATA','080805'],[75,'PICHIGUA','080806'],
            [75,'SUYCKUTAMBO','080807'],[75,'ALTO PICHIGUA','080808'],
            // LA CONVENCION
            [76,'SANTA ANA','080901'],[76,'ECHARATE','080902'],[76,'HUAYOPATA','080903'],
            [76,'MARANURA','080904'],[76,'OCOBAMBA','080905'],[76,'QUELLOUNO','080906'],
            [76,'QUIMBIRI','080907'],[76,'SANTA TERESA','080908'],[76,'VILCABAMBA','080909'],
            [76,'PICHARI','080910'],[76,'INKAWASI','080911'],[76,'VILLA VIRGEN','080912'],
            [76,'VILLA KINTIARINA','080913'],[76,'MEGANTONI','080914'],[76,'KUMPIRUSHIATO','080915'],
            [76,'CIELO PUNCO','080916'],[76,'MANITEA','080917'],
            // PARURO
            [77,'PARURO','081001'],[77,'ACCHA','081002'],[77,'CCAPI','081003'],
            [77,'COLCHA','081004'],[77,'HUANOQUITE','081005'],[77,'OMACHA','081006'],
            [77,'PACCARITECT','081007'],[77,'PILLPINTO','081008'],[77,'YARISECA','081009'],
            // PAUCARTAMBO
            [78,'PAUCARTAMBO','081101'],[78,'CAICAY','081102'],[78,'CHALLABAMBA','081103'],
            [78,'COLQUEPATA','081104'],[78,'HUANCARANI','081105'],[78,'KOSÑIPATA','081106'],
            // QUISPICANCHI
            [79,'URCOS','081201'],[79,'ANDAHUAYLILLAS','081202'],[79,'CAMANTI','081203'],
            [79,'CCARHUAYO','081204'],[79,'CCATCA','081205'],[79,'CUSIPATA','081206'],
            [79,'HUARO','081207'],[79,'LUCRE','081208'],[79,'MARCAPATA','081209'],
            [79,'OCONGATE','081210'],[79,'OROPESA','081211'],[79,'QUIQUIJANA','081212'],
            // URUBAMBA
            [80,'URUBAMBA','081301'],[80,'CHINCHERO','081302'],[80,'HUAYLLABAMBA','081303'],
            [80,'MACHUPICCHU','081304'],[80,'MARAS','081305'],[80,'OLLANTAYTAMBO','081306'],
            [80,'YUCAY','081307'],
        ];

        $distritos6 = [
            // HUANCAVELICA
            [81,'HUANCAVELICA','090101'],[81,'ACOBAMBILLA','090102'],[81,'ACORIA','090103'],
            [81,'CONAYCA','090104'],[81,'CUENCA','090105'],[81,'HUACHOCOLPA','090106'],
            [81,'HUAYLLAHUARA','090107'],[81,'IZCUCHACA','090108'],[81,'LARIA','090109'],
            [81,'MANTA','090110'],[81,'MARISCAL CACERES','090111'],[81,'MOYA','090112'],
            [81,'NUEVO OCCORO','090113'],[81,'PALCA','090114'],[81,'PILCHACA','090115'],
            [81,'VILCA','090116'],[81,'YAULI','090117'],[81,'ASCENCION','090118'],
            [81,'HUANDO','090119'],
            // ACOBAMBA
            [82,'ACOBAMBA','090201'],[82,'ANDABAMBA','090202'],[82,'ANTA','090203'],
            [82,'CAJAMARQUILLA','090204'],[82,'MARCAS','090205'],[82,'PAUCARA','090206'],
            [82,'POMACOCHA','090207'],[82,'ROSARIO','090208'],
            // ANGARAES
            [83,'LIRCAY','090301'],[83,'ANCHONGA','090302'],[83,'CALLANMARCA','090303'],
            [83,'CONGALLA','090304'],[83,'CHINCHO','090305'],[83,'HUANCA-HUANCA','090306'],
            [83,'HUAYLLAY GRANDE','090307'],[83,'JULCAMARCA','090308'],
            [83,'SAN ANTONIO DE ANTAPAMPA','090309'],[83,'SANTO TOMAS DE PATA','090310'],
            [83,'SECCLLA','090311'],[83,'CCOCHACCASA','090312'],
            // CASTROVIRREYNA
            [84,'CASTROVIRREYNA','090401'],[84,'ARMA','090402'],[84,'AURAHUA','090403'],
            [84,'CAPILLAS','090404'],[84,'CHUPAMARCA','090405'],[84,'COCAS','090406'],
            [84,'HUACHOS','090407'],[84,'HUAMATAMBO','090408'],[84,'SAN JUAN','090409'],
            [84,'SANTA ANA','090410'],[84,'TANTARA','090411'],[84,'TICRAPO','090412'],
            [84,'MOLLEPAMPA','090413'],
            // CHURCAMPA
            [85,'CHURCAMPA','090501'],[85,'ANCO','090502'],[85,'CHINCHIHUASI','090503'],
            [85,'EL CARMEN','090504'],[85,'LA MERCED','090505'],[85,'LOCROJA','090506'],
            [85,'PAUCARBAMBA','090507'],[85,'SAN MIGUEL DE MAYOCC','090508'],
            [85,'SAN PEDRO DE CORIS','090509'],[85,'PACHAMARCA','090510'],[85,'COSME','090511'],
            // HUAYTARA
            [86,'HUAYTARA','090601'],[86,'AYAVI','090602'],[86,'CORDOVA','090603'],
            [86,'HUAYACUNDO ARMA','090604'],[86,'LA LAREDO','090605'],[86,'LALAMBA','090606'],
            [86,'OCRE','090607'],[86,'PILPICHACA','090608'],[86,'QUERCO','090609'],
            [86,'QUISHUAR','090610'],[86,'SAN FRANCISCO DE SANGAYAICO','090611'],
            [86,'SAN ISIDRO','090612'],[86,'SANTIAGO DE CHOCORVOS','090613'],
            [86,'SANTIAGO DE QUIRAHUARA','090614'],[86,'SANTO DOMINGO DE CAPILLAS','090615'],
            [86,'TAMBO','090616'],
            // TAYACAJA
            [87,'PAMPAS','090701'],[87,'ACOSTAMBO','090702'],[87,'ACRAQUIA','090703'],
            [87,'AHUAYCHA','090704'],[87,'COLCABAMBA','090705'],[87,'DANIEL HERNANDEZ','090706'],
            [87,'HUACHOCOLPA','090707'],[87,'HUANDO','090708'],[87,'HUARIBAMBA','090709'],
            [87,'ÑAHUIMPUQUIO','090710'],[87,'PAZOS','090711'],[87,'QUISHUAR','090712'],
            [87,'SALCABAMBA','090713'],[87,'SALCAHUASI','090714'],[87,'SAN MARCOS DE ROCCHAC','090715'],
            [87,'SURCUBAMBA','090716'],[87,'TINTAY PUNCU','090717'],[87,'QUICHUAS','090718'],
            [87,'ANDAYMARCA','090719'],[87,'ROBLE','090720'],[87,'PICHOS','090721'],
            [87,'SANTIAGO DE TUCUMA','090722'],
        ];

        $distritos7 = [
            // HUANUCO
            [88,'HUANUCO','100101'],[88,'AMARILIS','100102'],[88,'CHINCHAO','100103'],
            [88,'CHURUBAMBA','100104'],[88,'MARGOS','100105'],[88,'QUISQUI','100106'],
            [88,'SAN FRANCISCO DE CAYRAN','100107'],[88,'SAN PEDRO DE CHAULAN','100108'],
            [88,'SANTA MARIA DEL VALLE','100109'],[88,'YARUMAYO','100110'],
            [88,'PILLCO MARCA','100111'],[88,'YACUS','100112'],[88,'SAN PABLO DE PILLAO','100113'],
            // AMBO
            [89,'AMBO','100201'],[89,'CAYNA','100202'],[89,'COLPAS','100203'],
            [89,'CONCHAMARCA','100204'],[89,'HUACAR','100205'],[89,'SAN FRANCISCO','100206'],
            [89,'SAN RAFAEL','100207'],[89,'TOMAY KICHWA','100208'],
            // DOS DE MAYO
            [90,'LA UNION','100301'],[90,'CHUQUIS','100307'],[90,'MARIAS','100311'],
            [90,'PACHAS','100313'],[90,'QUIVILLA','100316'],[90,'RIPAN','100317'],
            [90,'SAN JACINTO DE APAN','100321'],[90,'SHUNQUI','100322'],
            [90,'SILLAPATA','100323'],[90,'YANAS','100324'],
            // HUACAYBAMBA
            [91,'HUACAYBAMBA','100401'],[91,'CANCHABAMBA','100402'],[91,'COCHABAMBA','100403'],
            [91,'PINRA','100404'],
            // HUAMALIES
            [92,'LLATA','100501'],[92,'ARANCAY','100502'],[92,'CHAVIN DE PARIARCA','100503'],
            [92,'JACOBO HUNTER','100504'],[92,'JACAS GRANDE','100505'],[92,'JIRCAN','100506'],
            [92,'MIRAFLORES','100507'],[92,'MONZON','100508'],[92,'PUNCHAO','100509'],
            [92,'PUÑOS','100510'],[92,'SINGA','100511'],[92,'TANTAMAYO','100512'],
            // LEONCIO PRADO
            [93,'RUPA-RUPA','100601'],[93,'DANIEL ALOMIA ROBLES','100602'],
            [93,'HERMILIO VALDIZAN','100603'],[93,'JOSE CRESPO Y CASTILLO','100604'],
            [93,'LUYANDO','100605'],[93,'MARIANO DAMASO BERAUN','100606'],
            [93,'PANDA','100607'],[93,'CASTILLO GRANDE','100608'],[93,'PUCAYACU','100609'],
            [93,'SANTO DOMINGO DE ANDA','100610'],
            // MARAÑON
            [94,'HUACRACHUCO','100701'],[94,'CHOLON','100702'],[94,'SAN BUENAVENTURA','100703'],
            [94,'LA MORADA','100704'],[94,'SANTA ROSA DE ALTO YANAJANCA','100705'],
            // PACHITEA
            [95,'PANAO','100801'],[95,'CHAGLLA','100802'],[95,'MOLINO','100803'],[95,'UMARI','100804'],
            // PUERTO INCA
            [96,'PUERTO INCA','100901'],[96,'CODO DEL POZUZO','100902'],[96,'HONORIA','100903'],
            [96,'TOURNAVISTA','100904'],[96,'YUYAPICHIS','100905'],
            // LAURICOCHA
            [97,'JESUS','101001'],[97,'BAÑOS','101002'],[97,'JIVIA','101003'],
            [97,'QUEROPALCA','101004'],[97,'RONDOS','101005'],[97,'SAN FRANCISCO DE ASIS','101006'],
            [97,'SAN MIGUEL DE CAURI','101007'],
            // YAROWILCA
            [98,'CHAVINILLO','101101'],[98,'APARICIO POMARES','101102'],[98,'CAUAC','101103'],
            [98,'CHACABAMBA','101104'],[98,'CHUPAN','101105'],[98,'JACAS CHICO','101106'],
            [98,'OBAS','101107'],[98,'PAMPAMARCA','101108'],
            // ICA
            [99,'ICA','110101'],[99,'LA TINGUIÑA','110102'],[99,'LOS AQUIJES','110103'],
            [99,'OCUCAJE','110104'],[99,'PACHACUTEC','110105'],[99,'PARCONA','110106'],
            [99,'PUEBLO NUEVO','110107'],[99,'SALAS','110108'],[99,'SAN JOSÉ DE LOS MOLINOS','110109'],
            [99,'SAN JUAN BAUTISTA','110110'],[99,'SANTIAGO','110111'],[99,'SUBTANJALLA','110112'],
            [99,'TATE','110113'],[99,'YAUCA DEL ROSARIO','110114'],
            // CHINCHA
            [100,'CHINCHA ALTA','110201'],[100,'ALTO LARÁN','110202'],[100,'CHINCHA BAJA','110203'],
            [100,'EL CARMEN','110204'],[100,'GROCIO PRADO','110205'],[100,'PUEBLO NUEVO','110206'],
            [100,'SAN JOSÉ DE CHINCHA','110207'],[100,'SAN JUAN DE YANAC','110208'],
            [100,'SAN PEDRO DE HUACARPANA','110209'],[100,'SUNAMPE','110210'],[100,'TAMBO DE MORA','110211'],
            // NAZCA
            [101,'NAZCA','110301'],[101,'CHANGUILLO','110302'],[101,'EL INGENIO','110303'],
            [101,'MARCONA','110304'],[101,'VISTA ALEGRE','110305'],
            // PALPA
            [102,'PALPA','110401'],[102,'LLIPATA','110402'],[102,'RÍO GRANDE','110403'],
            [102,'SANTA CRUZ','110404'],[102,'TIBILLO','110405'],
            // PISCO
            [103,'PISCO','110501'],[103,'HUANCANO','110502'],[103,'HUMAY','110503'],
            [103,'INDEPENDENCIA','110504'],[103,'PARACAS','110505'],[103,'SAN ANDRÉS','110506'],
            [103,'SAN CLEMENTE','110507'],[103,'TÚPAC AMARU INCA','110508'],
        ];

        $distritos8 = [
            // JUNIN - HUANCAYO
            [104,'HUANCAYO','120101'],[104,'CARHUACALLANGA','120104'],[104,'CHACAPAMPA','120105'],
            [104,'CHICCHE','120106'],[104,'CHILCA','120107'],[104,'CHONGOS ALTO','120108'],
            [104,'CHUPURO','120111'],[104,'COLCA','120112'],[104,'CULLHUAS','120113'],
            [104,'EL TAMBO','120114'],[104,'HUACRAPUQUIO','120116'],[104,'HUALHUAS','120117'],
            [104,'HUANCAN','120119'],[104,'HUASICANCHA','120120'],[104,'HUAYUCACHI','120121'],
            [104,'INGENIO','120122'],[104,'PARIAHUANCA','120124'],[104,'PILCOMAYO','120125'],
            [104,'PUCARA','120126'],[104,'QUICHUAY','120127'],[104,'QUILCAS','120128'],
            [104,'SAN AGUSTIN','120129'],[104,'SAN JERONIMO DE TUNAN','120130'],
            [104,'SAÑO','120131'],[104,'SAPALLANGA','120132'],[104,'SICAYA','120133'],
            [104,'SANTO DOMINGO DE ACOBAMBA','120134'],[104,'VIQUES','120135'],
            // CONCEPCION
            [105,'CONCEPCION','120201'],[105,'ACO','120202'],[105,'ANDAMARCA','120203'],
            [105,'CHAMBARA','120204'],[105,'COCHAS','120205'],[105,'COMAS','120206'],
            [105,'HEROINAS TOLEDO','120207'],[105,'MANZANARES','120208'],
            [105,'MARISCAL CASTILLA','120209'],[105,'MATAHUASI','120210'],[105,'MITO','120211'],
            [105,'NUEVE DE JULIO','120212'],[105,'ORCOTUNA','120213'],
            [105,'SAN JOSE DE QUERO','120214'],[105,'SANTA ROSA DE OCOPA','120215'],
            // CHANCHAMAYO
            [106,'CHANCHAMAYO','120301'],[106,'PERENE','120302'],[106,'PICHANAQUI','120303'],
            [106,'SAN LUIS DE SHUARO','120304'],[106,'SAN RAMON','120305'],[106,'VITOC','120306'],
            // JAUJA
            [107,'JAUJA','120401'],[107,'ACOLLA','120402'],[107,'APATA','120403'],
            [107,'ATAURA','120404'],[107,'CANCHAYLLO','120405'],[107,'CURICACA','120406'],
            [107,'EL MANTARO','120407'],[107,'HUAMALI','120408'],[107,'HUARIPAMPA','120409'],
            [107,'HUERTAS','120410'],[107,'JANJAILLO','120411'],[107,'JULCAN','120412'],
            [107,'LEONOR ORDOÑEZ','120413'],[107,'LLOCLLAPAMPA','120414'],[107,'MARCO','120415'],
            [107,'MASMA','120416'],[107,'MASMA CHICCHE','120417'],[107,'MONOBAMBA','120418'],
            [107,'MUQUI','120419'],[107,'MUQUIYAUYO','120420'],[107,'PACA','120421'],
            [107,'PACCHA','120422'],[107,'PANCAN','120423'],[107,'PARCO','120424'],
            [107,'POMACANCHA','120425'],[107,'RICRAN','120426'],[107,'SAN LORENZO','120427'],
            [107,'SAN PEDRO DE CHUNAN','120428'],[107,'SAUSA','120429'],[107,'SINCOS','120430'],
            [107,'TUNAN MARCA','120431'],[107,'YAULI','120432'],[107,'YAUYOS','120433'],
            // JUNIN
            [108,'JUNIN','120501'],[108,'CARHUAMAYO','120502'],[108,'ONDORES','120503'],
            [108,'ULCUMAYO','120504'],
            // SATIPO
            [109,'SATIPO','120601'],[109,'COVIRIALI','120602'],[109,'LLAYLLA','120603'],
            [109,'MAZAMARI','120604'],[109,'PAMPA HERMOSA','120605'],[109,'PANGOA','120606'],
            [109,'RIO NEGRO','120607'],[109,'RIO TAMBO','120608'],[109,'VIZCATAN DEL ENE','120609'],
            // TARMA
            [110,'TARMA','120701'],[110,'ACOBAMBA','120702'],[110,'HUACAPO','120703'],
            [110,'HUASAHUASI','120704'],[110,'LA UNION','120705'],[110,'PALCA','120706'],
            [110,'PALCAMAYO','120707'],[110,'SAN PEDRO DE CAJAS','120708'],[110,'TAPO','120709'],
            // YAULI (ubigeo LA OROYA corregido)
            [111,'LA OROYA','120801'],[111,'CHACAPALPA','120802'],[111,'HUAY-HUAY','120803'],
            [111,'MARCAPOMACOCHA','120804'],[111,'MOROCOCHA','120805'],[111,'PACCHA','120806'],
            [111,'SAN PEDRO DE CAJAS','120807'],[111,'SUITUCANCHA','120808'],[111,'YAULI','120809'],
            // CHUPACA
            [112,'CHUPACA','120901'],[112,'AHUAC','120902'],[112,'CHONGOS BAJO','120903'],
            [112,'HUACHAC','120904'],[112,'HUAMANCACA CHICO','120905'],
            [112,'SAN JUAN DE ISCOS','120906'],[112,'SAN JUAN DE JARPA','120907'],
            [112,'TRES DE DICIEMBRE','120908'],[112,'YANACANCHA','120909'],
        ];

        $distritos9 = [
            // LA LIBERTAD - TRUJILLO
            [113,'TRUJILLO','130101'],[113,'EL PORVENIR','130102'],[113,'FLORENCIA DE MORA','130103'],
            [113,'HUANCHACO','130104'],[113,'LA ESPERANZA','130105'],[113,'LAREDO','130106'],
            [113,'MOCHE','130107'],[113,'POROTO','130108'],[113,'SALAVERRY','130109'],
            [113,'SIMBAL','130110'],[113,'VICTOR LARCO HERRERA','130111'],
            // ASCOPE
            [114,'ASCOPE','130201'],[114,'CHICAMA','130202'],[114,'CHOCOPE','130203'],
            [114,'MAGDALENA DE CAO','130204'],[114,'PAIJAN','130205'],[114,'RAZURI','130206'],
            [114,'SANTIAGO DE CAO','130207'],[114,'CASA GRANDE','130208'],
            // BOLIVAR
            [115,'BOLIVAR','130301'],[115,'BAMBAMARCA','130302'],[115,'CONDORMARCA','130303'],
            [115,'LONGOTEA','130304'],[115,'UCHUMARCA','130305'],[115,'UCUNCHA','130306'],
            // CHEPEN
            [116,'CHEPEN','130401'],[116,'PACANGA','130402'],[116,'PUEBLO NUEVO','130403'],
            // JULCAN
            [117,'JULCAN','130501'],[117,'CALAMARCA','130502'],[117,'CARABAMBA','130503'],
            [117,'HUASO','130504'],
            // OTUZCO
            [118,'OTUZCO','130601'],[118,'AGALLPAMPA','130602'],[118,'CHARAT','130603'],
            [118,'HUARANCHAL','130604'],[118,'LA CUESTA','130605'],[118,'MACHE','130606'],
            [118,'PARANDAY','130610'],[118,'SALPO','130611'],[118,'SINSICAP','130613'],
            [118,'USQUIL','130614'],
            // PACASMAYO
            [119,'SAN PEDRO DE LLOC','130701'],[119,'GUADALUPE','130702'],
            [119,'JEQUETEPEQUE','130703'],[119,'PACASMAYO','130704'],[119,'SAN JOSE','130705'],
            // PATAZ
            [120,'TAYABAMBA','130801'],[120,'BULDIBUYO','130802'],[120,'CHILLIA','130803'],
            [120,'HUANCASPATA','130804'],[120,'HUAYLILLAS','130805'],[120,'HUAYO','130806'],
            [120,'ONGON','130807'],[120,'PARCOY','130808'],[120,'PATAZ','130809'],
            [120,'PIAS','130810'],[120,'SANTIAGO DE CHALLAS','130811'],[120,'TAURIJA','130812'],
            [120,'URPAY','130813'],
            // SANCHEZ CARRION
            [121,'HUAMACHUCO','130901'],[121,'CHUGAY','130902'],[121,'COCHACHINCHAY','130903'],
            [121,'CURGOS','130904'],[121,'MARCABAL','130905'],[121,'SANAGORAN','130906'],
            [121,'SARIN','130907'],[121,'SARTIMBAMBA','130908'],
            // SANTIAGO DE CHUCO
            [122,'SANTIAGO DE CHUCO','131001'],[122,'ANGASMARCA','131002'],[122,'CACHICADAN','131003'],
            [122,'MOLLEBAMBA','131004'],[122,'MOLLEPATA','131005'],[122,'QUIRUVILCA','131006'],
            [122,'SANTA CRUZ DE CHUCA','131007'],[122,'SITABAMBA','131008'],
            // GRAN CHIMU
            [123,'CASCAS','131101'],[123,'LUCMA','131102'],[123,'MARMOT','131103'],
            [123,'SAYAPULLO','131104'],
            // VIRU
            [124,'VIRU','131201'],[124,'CHAO','131202'],[124,'GUADALUPITO','131203'],
        ];

        $distritos10 = [
            // LIMA METROPOLITANA
            [128,'LIMA','150101'],[128,'ANCON','150102'],[128,'ATE','150103'],
            [128,'BREÑA','150104'],[128,'CARABAYLLO','150105'],[128,'CHACLACAYO','150106'],
            [128,'CHORRILLOS','150107'],[128,'CIENEGUILLA','150108'],[128,'COMAS','150109'],
            [128,'EL AGUSTINO','150110'],[128,'INDEPENDENCIA','150111'],[128,'JESUS MARIA','150112'],
            [128,'LA MOLINA','150113'],[128,'LA VICTORIA','150114'],[128,'LINCE','150115'],
            [128,'LOS OLIVOS','150116'],[128,'LURIGANCHO','150117'],[128,'LURIN','150118'],
            [128,'MAGDALENA DEL MAR','150119'],[128,'MIRAFLORES','150120'],[128,'PUEBLO NUEVO','150121'],
            [128,'PUENTE PIEDRA','150122'],[128,'PUNTA HERMOSA','150123'],[128,'PUNTA NEGRA','150124'],
            [128,'RIMAC','150125'],[128,'SAN BARTOLO','150126'],[128,'SAN BORJA','150127'],
            [128,'SAN ISIDRO','150128'],[128,'SAN JUAN DE LURIGANCHO','150129'],
            [128,'SAN JUAN DE MIRAFLORES','150130'],[128,'SAN LUIS','150131'],
            [128,'SAN MARTIN DE PORRES','150132'],[128,'SAN MIGUEL','150133'],
            [128,'SANTA ANITA','150134'],[128,'SANTA MARIA DEL MAR','150135'],
            [128,'SANTA ROSA','150136'],[128,'SANTIAGO DE SURCO','150137'],
            [128,'SURQUILLO','150138'],[128,'VILLA EL SALVADOR','150139'],
            [128,'VILLA MARIA DEL TRIUNFO','150140'],
            // BARRANCA
            [129,'BARRANCA','150201'],[129,'PARAMONGA','150202'],[129,'PATIVILCA','150203'],
            [129,'SUPE','150204'],[129,'SUPE PUERTO','150205'],
            // CAJATAMBO
            [130,'CAJATAMBO','150301'],[130,'COPA','150302'],[130,'GORGOR','150303'],
            [130,'HUANCAPON','150304'],[130,'MANAS','150305'],
            // CANTA
            [131,'CANTA','150401'],[131,'ARAHUAY','150402'],[131,'HUAMANTANGA','150403'],
            [131,'LACHAQUI','150404'],[131,'SAN BUENAVENTURA','150405'],
            [131,'SANTA ROSA DE QUIVES','150406'],
            // CAÑETE
            [132,'SAN VICENTE DE CAÑETE','150501'],[132,'ASIA','150502'],[132,'CALANGO','150503'],
            [132,'CERRO AZUL','150504'],[132,'CHILCA','150505'],[132,'COAYLLO','150506'],
            [132,'IMPERIAL','150507'],[132,'LUNAHUANA','150508'],[132,'MALA','150509'],
            [132,'NUEVO IMPERIAL','150510'],[132,'PACARAN','150511'],[132,'QUILMANA','150512'],
            [132,'SAN ANTONIO','150513'],[132,'SAN LUIS','150514'],
            [132,'SANTA CRUZ DE FLORES','150515'],[132,'ZUÑIGA','150516'],
            // HUARAL
            [133,'HUARAL','150601'],[133,'ATAVILLOS ALTO','150602'],[133,'ATAVILLOS BAJO','150603'],
            [133,'AUCALLAMA','150604'],[133,'CHANCAY','150605'],[133,'IHUARI','150606'],
            [133,'LAMPIAN','150607'],[133,'PACARAOS','150608'],[133,'SAN MIGUEL DE ACOS','150609'],
            [133,'SANTA CRUZ DE ANDAMARCA','150610'],[133,'SUMBILCA','150611'],
            [133,'27 DE NOVIEMBRE','150612'],
            // HUAROCHIRI
            [134,'MATUCANA','150701'],[134,'ANTIOQUIA','150702'],[134,'RICARDO PALMA','150703'],
            [134,'CHICLA','150705'],[134,'CUENCA','150706'],[134,'HUACHUPAMPA','150707'],
            [134,'HUANZA','150708'],[134,'HUAROCHIRI','150709'],[134,'LAHUAYTAMBO','150710'],
            [134,'LANGA','150711'],[134,'LARAOS','150712'],[134,'MARIATANA','150713'],
            [134,'SAN ANDRES DE TUPICOCHA','150715'],[134,'SAN ANTONIO','150716'],
            [134,'SAN BARTOLOME','150717'],[134,'SAN DAMIAN','150718'],
            [134,'SAN JERONIMO DE SURCO','150719'],[134,'SAN JUAN DE IRIS','150721'],
            [134,'SAN LORENZO DE QUINTI','150722'],[134,'SAN MATEO','150723'],
            [134,'SAN MATEO DE OTAO','150724'],[134,'SAN PEDRO DE CASTA','150725'],
            [134,'SAN PEDRO DE HUANCAYRE','150726'],[134,'SANGALLAYA','150727'],
            [134,'SANTA CRUZ DE COCACHACRA','150728'],[134,'SANTA EULALIA','150729'],
            [134,'SANTIAGO DE ANCHUCAYA','150730'],[134,'SANTIAGO DE TUNA','150731'],
            [134,'SANTO DOMINGO DE LOS OLLEROS','150732'],[134,'SURCO','150733'],
            // HUAURA
            [135,'HUACHO','150801'],[135,'AMBAR','150802'],[135,'CALETA DE CARQUIN','150803'],
            [135,'CHECRAS','150804'],[135,'HUALMAY','150805'],[135,'HUAURA','150806'],
            [135,'LEONCIO PRADO','150807'],[135,'PACCHO','150808'],[135,'SANTA LEONOR','150809'],
            [135,'SANTA MARIA','150810'],[135,'SAYAN','150811'],[135,'VEGUETA','150812'],
            // OYON (ubigeo COCHAMARCA corregido)
            [136,'OYON','150901'],[136,'ANDAJES','150902'],[136,'CAUJUL','150903'],
            [136,'COCHAMARCA','150904'],[136,'NAVAN','150905'],[136,'PACHANGARA','150906'],
            // YAUYOS
            [137,'YAUYOS','151001'],[137,'ALIS','151002'],[137,'AYAUCA','151003'],
            [137,'AYAVIRI','151004'],[137,'AZANGARO','151005'],[137,'CACRA','151006'],
            [137,'CARANIA','151007'],[137,'CATAHUASI','151008'],[137,'CHOCOS','151009'],
            [137,'COCHAS','151010'],[137,'COLONIA','151011'],[137,'HONGOS','151012'],
            [137,'HUAMPARA','151013'],[137,'HUANCAYA','151014'],[137,'HUANGASCAR','151015'],
            [137,'HUANTAN','151016'],[137,'HUAÑEC','151017'],[137,'LARAOS','151018'],
            [137,'LINCHA','151019'],[137,'MADEAN','151020'],[137,'MIRAFLORES','151021'],
            [137,'OMAS','151022'],[137,'PUTINZA','151023'],[137,'QUINCHES','151024'],
            [137,'QUINOCAY','151025'],[137,'SAN JOAQUIN','151026'],[137,'SAN PEDRO DE PILAS','151027'],
            [137,'TANTA','151028'],[137,'TAURIPAMPA','151029'],[137,'TOMAS','151030'],
            [137,'TUPE','151031'],[137,'VIÑAC','151032'],[137,'VITIS','151033'],
        ];

        $distritos11 = [
            // LORETO - MAYNAS (ubigeo TORRES CAUSANA corregido)
            [138,'IQUITOS','160101'],[138,'ALTO NANAY','160102'],[138,'FERNANDO LORES','160103'],
            [138,'INDIANA','160104'],[138,'LAS AMAZONAS','160105'],[138,'MAZAN','160106'],
            [138,'NAPO','160107'],[138,'PUNCHANA','160108'],[138,'TORRES CAUSANA','160109'],
            [138,'BELEN','160112'],[138,'SAN JUAN BAUTISTA','160113'],
            // ALTO AMAZONAS
            [139,'YURIMAGUAS','160201'],[139,'BALSAPUERTO','160202'],[139,'JEBEROS','160205'],
            [139,'LAGUNAS','160206'],[139,'SANTA CRUZ','160211'],
            [139,'TENIENTE CESAR LOPEZ ROJAS','160212'],
            // LORETO
            [140,'NAUTA','160301'],[140,'PARINARI','160302'],[140,'TIGRE','160303'],
            [140,'TROMPETEROS','160304'],[140,'URARINAS','160305'],
            // MARISCAL RAMON CASTILLA
            [141,'RAMON CASTILLA','160401'],[141,'PEBAS','160402'],[141,'YAVARI','160403'],
            [141,'SAN PABLO','160404'],
            // REQUENA
            [142,'REQUENA','160501'],[142,'ALTO TAPICHE','160502'],[142,'CAPELO','160503'],
            [142,'EMILIO SAN MARTIN','160504'],[142,'MAQUIA','160505'],[142,'PUINAHUA','160506'],
            [142,'SAQUENA','160507'],[142,'SOPLIN','160508'],[142,'TAPICHE','160509'],
            [142,'YAQUERANA','160510'],[142,'JENARO HERRERA','160511'],
            // UCAYALI
            [143,'CONTAMANA','160601'],[143,'INAHUAYA','160602'],[143,'PADRE MARQUEZ','160603'],
            [143,'PAMPA HERMOSA','160604'],[143,'SARAYACU','160605'],[143,'VARGAS GUERRA','160606'],
            // DATEM DEL MARAÑON
            [144,'BARRANCA','160701'],[144,'CAHUAPANAS','160702'],[144,'MANSERICHE','160703'],
            [144,'MORONA','160704'],[144,'PASTAZA','160705'],[144,'ANDOAS','160706'],
            // PUTUMAYO
            [145,'PUTUMAYO','160801'],[145,'ROSA PANDURO','160802'],
            [145,'TENIENTE MANUEL CLAVERO','160803'],[145,'YAGUAS','160804'],
            // MADRE DE DIOS
            [146,'TAMBOPATA','170101'],[146,'INAMBARI','170102'],[146,'LAS PIEDRAS','170103'],
            [146,'LABERINTO','170104'],
            [147,'MANU','170201'],[147,'FITZCARRALD','170202'],[147,'MADRE DE DIOS','170203'],
            [147,'HUEPETUHE','170204'],
            [148,'IÑAPARI','170301'],[148,'IBERIA','170302'],[148,'TAHUAMANU','170303'],
            // MOQUEGUA
            [149,'MOQUEGUA','180101'],[149,'CARUMAS','180102'],[149,'CUCHUMBAYA','180103'],
            [149,'SAMEGUA','180104'],[149,'SAN CRISTOBAL','180105'],[149,'TORATA','180106'],
            [150,'OMATE','180201'],[150,'COALAQUE','180202'],[150,'CHOJATA','180203'],
            [150,'ICHUÑA','180204'],[150,'LA CAPILLA','180205'],[150,'LLUCO','180206'],
            [150,'MATALAQUE','180207'],[150,'PUQUINA','180208'],[150,'QUINISTAQUILLAS','180209'],
            [150,'UBINAS','180210'],[150,'YUNGA','180211'],
            [151,'ILO','180301'],[151,'EL ALGARROBAL','180302'],[151,'PACOCHA','180303'],
            // PIURA
            [152,'PIURA','200101'],[152,'CASTILLA','200104'],[152,'CATACAOS','200105'],
            [152,'CURA MORI','200107'],[152,'EL TALLAN','200108'],[152,'LA ARENA','200109'],
            [152,'LA UNION','200110'],[152,'LAS LOMAS','200111'],[152,'TAMBO GRANDE','200114'],
            [152,'26 DE OCTUBRE','200115'],
            [153,'AYABACA','200201'],[153,'FRIAS','200202'],[153,'JILILI','200203'],
            [153,'LAGUNAS','200204'],[153,'MONTERO','200205'],[153,'PACAIPAMPA','200206'],
            [153,'PAIMAS','200207'],[153,'SAPILLICA','200208'],[153,'SICCHEZ','200209'],
            [153,'SUYO','200210'],
            [154,'HUANCABAMBA','200301'],[154,'CANCHAQUE','200302'],
            [154,'EL CARMEN DE LA FRONTERA','200303'],[154,'HUARMACA','200304'],
            [154,'LALAQUIZ','200305'],[154,'SAN MIGUEL DE EL FAIQUE','200306'],
            [154,'SONDOR','200307'],[154,'SONDORILLO','200308'],
            [155,'CHULUCANAS','200401'],[155,'BUENOS AIRES','200402'],[155,'CHALACO','200403'],
            [155,'LA MATANZA','200404'],[155,'MORROPON','200405'],[155,'SALITRAL','200406'],
            [155,'SAN JUAN DE BIGOTE','200407'],[155,'SANTA CATALINA DE MOSSA','200408'],
            [155,'SANTO DOMINGO','200409'],[155,'YAMANGO','200410'],
            [156,'PAITA','200501'],[156,'AMOTAPE','200502'],[156,'ARENAL','200503'],
            [156,'COLAN','200504'],[156,'LA HUACA','200505'],[156,'TAMARINDO','200506'],
            [156,'VICHAYAL','200507'],
            [157,'SULLANA','200601'],[157,'BELLAVISTA','200602'],[157,'IGNACIO ESCUDERO','200603'],
            [157,'LANCONES','200604'],[157,'MARCAVELICA','200605'],[157,'MIGUEL CHECA','200606'],
            [157,'QUERECOTILLO','200607'],[157,'SALITRAL','200608'],
            [158,'PARIÑAS','200701'],[158,'EL ALTO','200702'],[158,'LA BREA','200703'],
            [158,'LOBITOS','200704'],[158,'MANCORA','200705'],[158,'LOS ORGANOS','200706'],
            [159,'SECHURA','200801'],[159,'BELLAVISTA DE LA UNION','200802'],[159,'BERNAL','200803'],
            [159,'CRISTO NOS VALGA','200804'],[159,'VICE','200805'],[159,'RINCONADA LLICUAR','200806'],
        ];

        $distritos12 = [
            // PUNO
            [160,'PUNO','210101'],[160,'ACORA','210102'],[160,'AMANTANI','210103'],
            [160,'ATUNCOLLA','210104'],[160,'CAPACHICA','210105'],[160,'CHUCUITO','210106'],
            [160,'COATA','210107'],[160,'CONIMA','210108'],[160,'ILLPA','210109'],
            [160,'MAÑAZO','210110'],[160,'PAUCARCOLLA','210111'],[160,'PICHACANI','210112'],
            [160,'PLATERIA','210113'],[160,'SAN ANTONIO','210114'],[160,'TIQUILLACA','210115'],
            [160,'VILQUE','210116'],
            [161,'AZANGARO','210201'],[161,'ACHAYA','210202'],[161,'ARAPA','210203'],
            [161,'ASILLO','210204'],[161,'CAMINACA','210205'],[161,'CHUPA','210206'],
            [161,'JOSE DOMINGO CHOQUEHUANCA','210207'],[161,'MUÑANI','210208'],
            [161,'POTONI','210209'],[161,'SAMAN','210210'],[161,'SAN ANTON','210211'],
            [161,'SAN JOSE','210212'],[161,'SAN JUAN DE SALINAS','210213'],
            [161,'SANTIAGO DE PUPUJA','210214'],[161,'TIRAPATA','210215'],
            [162,'MACUSANI','210301'],[162,'AJOYANI','210302'],[162,'AYAPATA','210303'],
            [162,'COASA','210304'],[162,'CORANI','210305'],[162,'CRUCERO','210306'],
            [162,'ITUATA','210307'],[162,'OLLACHEA','210308'],[162,'SAN GABAN','210309'],
            [162,'USICAYOS','210310'],
            [163,'JULI','210401'],[163,'DESAGUADERO','210402'],[163,'HUACULLANI','210403'],
            [163,'KELLUYO','210404'],[163,'PISACOMA','210405'],[163,'POMATA','210406'],
            [163,'ZEPITA','210407'],
            [164,'ILAVE','210501'],[164,'CONDURIRI','210502'],[164,'LOZANO','210503'],
            [164,'PILCACOMA','210504'],[164,'SANTA ROSA','210505'],
            [165,'HUANCANE','210601'],[165,'COJATA','210602'],[165,'HUATASANI','210603'],
            [165,'INCHUPALLA','210604'],[165,'PUSI','210605'],[165,'ROSASPATA','210606'],
            [165,'TARACCO','210607'],[165,'VILQUE CHICO','210608'],
            [166,'LAMPA','210701'],[166,'CABANILLA','210702'],[166,'CALAPUJA','210703'],
            [166,'NICASIO','210704'],[166,'OCUVIRI','210705'],[166,'PALCA','210706'],
            [166,'PARATIA','210707'],[166,'PUCARA','210708'],[166,'SANTA LUCIA','210709'],
            [166,'VILAVILA','210710'],
            [167,'AYAVIRI','210801'],[167,'ANTAUTA','210802'],[167,'CUPI','210803'],
            [167,'LLALLI','210804'],[167,'MACARI','210805'],[167,'NUÑOA','210806'],
            [167,'ORURILLO','210807'],[167,'SANTA ROSA','210808'],[167,'UMACHIRI','210809'],
            [168,'MOHO','210901'],[168,'CONIMA','210902'],[168,'HUAYRAPATA','210903'],
            [168,'TILALI','210904'],
            [169,'PUTINA','211001'],[169,'ANANEA','211002'],[169,'PEDRO VILCA APAZA','211003'],
            [169,'QUILCAPUNCU','211004'],[169,'SINA','211005'],
            [170,'JULIACA','211101'],[170,'CABANA','211102'],[170,'CABANILLAS','211103'],
            [170,'CARACOTO','211104'],[170,'SAN MIGUEL','211105'],
            [171,'SANDIA','211201'],[171,'CUYOCUYO','211202'],[171,'LIMBANI','211203'],
            [171,'PATAMBUCO','211204'],[171,'PHARA','211205'],[171,'QUIACA','211206'],
            [171,'SAN JUAN DEL ORO','211207'],[171,'YANAHUAYA','211208'],
            [171,'ALTO INAMBARI','211209'],[171,'SAN PEDRO DE PUTINA PUNCO','211210'],
            [172,'YUNGUYO','211301'],[172,'ANAPIA','211302'],[172,'COPACABANA','211303'],
            [172,'CUTURAPI','211304'],[172,'OLLARAYA','211305'],[172,'TINICACHI','211306'],
            [172,'UNICACHI','211307'],
            // SAN MARTIN
            [173,'MOYOBAMBA','220101'],[173,'CALZADA','220102'],[173,'HABANA','220103'],
            [173,'JEPELACIO','220104'],[173,'SORITOR','220106'],[173,'YANTALO','220107'],
            [174,'BELLAVISTA','220201'],[174,'ALTO BIAVO','220202'],[174,'BAJO BIAVO','220203'],
            [174,'HUALLAGA','220204'],[174,'SAN PABLO','220205'],[174,'SAN RAFAEL','220206'],
            [175,'SAN JOSE DE SISA','220301'],[175,'AGUA BLANCA','220302'],
            [175,'SAN MARTIN','220303'],[175,'SANTA ROSA','220304'],[175,'SHATOJA','220305'],
            [176,'SAPOSOA','220401'],[176,'ALTO SAPOSOA','220402'],[176,'EL ESLABON','220403'],
            [176,'PISCOYACU','220404'],[176,'SACANCHE','220405'],[176,'TINGO DE SAPOSOA','220406'],
            [177,'LAMAS','220501'],[177,'ALONSO DE ALVARADO','220502'],[177,'BARRANQUITA','220503'],
            [177,'CAYNARACHI','220504'],[177,'CUÑUMBUQUI','220505'],[177,'PINTO RECODO','220506'],
            [177,'RUMISAPA','220507'],[177,'SAN ROQUE DE CUMBAZA','220508'],[177,'SHANAO','220509'],
            [177,'TABALOSOS','220510'],[177,'ZAPATERO','220511'],
            [178,'JUANJUI','220601'],[178,'CAMPANILLA','220602'],[178,'HUICUNGO','220603'],
            [178,'PACHIZA','220604'],[178,'PAJARILLO','220605'],
            [179,'PICOTA','220701'],[179,'BUENOS AIRES','220702'],[179,'CASPISAPA','220703'],
            [179,'PILCOMAYO','220704'],[179,'PUCACACA','220705'],[179,'SAN HILARION','220706'],
            [179,'SHAMBOYACU','220707'],[179,'TINGO DE PONASA','220708'],[179,'TRES UNIDOS','220709'],
            [180,'RIOJA','220801'],[180,'AWAJUN','220802'],[180,'ELIAS SOPLIN VARGAS','220803'],
            [180,'NUEVA CAJAMARCA','220804'],[180,'PARDO MIGUEL','220805'],[180,'POSIC','220806'],
            [180,'SAN FERNANDO','220807'],[180,'YORONGOS','220808'],[180,'YURACYACU','220809'],
            [181,'TARAPOTO','220901'],[181,'ALBERTO LEVEAU','220902'],[181,'CACATACHI','220903'],
            [181,'CHAZUTA','220904'],[181,'CHIPURANA','220905'],[181,'EL PORVENIR','220906'],
            [181,'HUIMBAYOC','220907'],[181,'JUAN GUERRA','220908'],
            [181,'LA BANDA DE SHILCAYO','220909'],[181,'MORALES','220910'],
            [181,'PAPAPLAYA','220911'],[181,'SAN ANTONIO','220912'],[181,'SAUCE','220913'],
            [181,'SHAPAJA','220914'],
            [182,'TOCACHE','221001'],[182,'NUEVO PROGRESO','221002'],[182,'POLVORA','221003'],
            [182,'SHUNTE','221004'],[182,'UCHIZA','221005'],[182,'SANTA LUCIA','221006'],
            // TACNA
            [183,'TACNA','230101'],[183,'ALTO DE LA ALIANZA','230102'],[183,'CALANA','230103'],
            [183,'CIUDAD NUEVA','230104'],[183,'INCLAN','230105'],[183,'PACHIA','230106'],
            [183,'PALCA','230107'],[183,'POCOLLAY','230108'],[183,'SAMA','230109'],
            [183,'CORONEL GREGORIO ALBARRACIN LANDA','230110'],
            [183,'LA YARADA LOS PALOS','230111'],
            [184,'CANDARAVE','230201'],[184,'CAIRANI','230202'],[184,'CAMILACA','230203'],
            [184,'CURIBAYA','230204'],[184,'HUANUARA','230205'],[184,'QUILAHUANI','230206'],
            [185,'LOCOUMBA','230301'],[185,'ILABAYA','230302'],[185,'ITE','230303'],
            [186,'TARATA','230401'],[186,'CHUCATAMANI','230402'],[186,'ESTIQUE','230403'],
            [186,'ESTIQUE-PAMPA','230404'],[186,'SITAJARA','230405'],[186,'SUSAPAYA','230406'],
            [186,'TARUCACHI','230407'],[186,'TICACO','230408'],
            // TUMBES
            [187,'TUMBES','240101'],[187,'CORRALES','240102'],[187,'LA CRUZ','240103'],
            [187,'PAMPAS DE HOSPITAL','240104'],[187,'SAN JACINTO','240105'],
            [187,'SAN JUAN DE LA VIRGEN','240106'],[187,'SAN PEDRO DE LOS INCAS','240107'],
            [188,'ZORRITOS','240201'],[188,'CASITAS','240202'],[188,'CANOAS DE PUNTA SAL','240203'],
            [189,'ZARUMILLA','240301'],[189,'AGUAS VERDES','240302'],[189,'MATAPALO','240303'],
            [189,'PAPAYAL','240304'],
            // UCAYALI
            [190,'CALLERIA','250101'],[190,'CAMPOVERDE','250102'],[190,'IPARIA','250103'],
            [190,'MASISEA','250104'],[190,'YARINACOCHA','250105'],[190,'NUEVA REQUENA','250106'],
            [190,'MANANTAY','250107'],
            [191,'RAYMONDI','250201'],[191,'SEPAHUA','250202'],[191,'TAHUANIA','250203'],
            [191,'YURUA','250204'],
            [192,'PADRE ABAD','250301'],[192,'IRAZOLA','250302'],[192,'CURIMANA','250303'],
            [192,'ALEXANDER VON HUMBOLDT','250304'],[192,'NESHUYA','250305'],
            [193,'PURUS','250401'],
            // PASCO
            [194,'CHAUPIMARCA','190101'],[194,'HUACHON','190102'],[194,'HUARIACA','190103'],
            [194,'HUAYLLAY','190104'],[194,'NINACACA','190105'],[194,'PALLANCHACRA','190106'],
            [194,'PAUCARTAMBO','190107'],[194,'SAN FRANCISCO DE ASIS DE YARUSYACAN','190108'],
            [194,'SIMON BOLIVAR','190109'],[194,'TICLACAYAN','190110'],[194,'TINYAHUARCO','190111'],
            [194,'VICCO','190112'],[194,'YANACANCHA','190113'],
            [195,'YANAHUANCA','190201'],[195,'CHACAYAN','190202'],[195,'GOYLLARISQUIZGA','190203'],
            [195,'PAUCAR','190204'],[195,'SAN PEDRO DE PILLAO','190205'],
            [195,'SANTA ANA DE TUSI','190206'],[195,'TAPUC','190207'],[195,'VILCABAMBA','190208'],
            [196,'OXAPAMPA','190301'],[196,'CHONTABAMBA','190302'],[196,'HUANCABAMBA','190303'],
            [196,'PALCAZU','190304'],[196,'POZUZO','190305'],[196,'PUERTO BERMUDEZ','190306'],
            [196,'VILLA RICA','190307'],[196,'CONSTITUCION','190308'],
        ];

        foreach ([$distritos, $distritos2, $distritos3, $distritos4, $distritos5,
                  $distritos6, $distritos7, $distritos8, $distritos9, $distritos10,
                  $distritos11, $distritos12] as $batch) {
            $rows = array_map(fn($d) => [
                'id_provincia' => $d[0],
                'nombre'       => $d[1],
                'ubigeo'       => $d[2],
            ], $batch);
            DB::table('distrito')->insertOrIgnore($rows);
        }
    }
}
