<?php

namespace Database\Seeders;

use App\Models\MasterDiv;
use App\Models\MasterOrgUnit;
use App\Models\MasterPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemporaryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::masterDiv();
        self::orgUnit();
        self::masterPosition();
    }

    public function masterDiv()
    {
        $divisions = [
            ['div_code' => 'JKTDZ', 'div_name' => 'PT Citilink Indonesia'],
            ['div_code' => 'JKTNL', 'div_name' => 'Ancillary & Loyalty Division'],
            ['div_code' => 'JKTDS', 'div_name' => 'Corporate Secretary & CSR Division'],
            ['div_code' => 'JKTNC', 'div_name' => 'Customer Care Division'],
            ['div_code' => 'JKTDA', 'div_name' => 'Internal Audit Division'],
            ['div_code' => 'JKTDB', 'div_name' => 'Corporate Strategy Division'],
            ['div_code' => 'JKTNG', 'div_name' => 'Cargo Division'],
            ['div_code' => 'JKTDH', 'div_name' => 'Aircraft Asset Management Division'],
        ];

        MasterDiv::insert($divisions);
    }

    public function orgUnit()
    {
        $orgUnits = [
            ['org_unit' => '10000707', 'short' => 'JKTOCAQG', 'stext' => 'Chief Flight Attendant'],
            ['org_unit' => '10000718', 'short' => 'HLPOGL3QG', 'stext' => 'Station HLP'],
            ['org_unit' => '10000721', 'short' => 'BTHOGL3QG', 'stext' => 'Station BTH'],
            ['org_unit' => '10000722', 'short' => 'UPGOGL3QG', 'stext' => 'Station UPG'],
            ['org_unit' => '10000723', 'short' => 'KNOOGL3QG', 'stext' => 'Station KNO'],
            ['org_unit' => '10000724', 'short' => 'BPNOGL3QG', 'stext' => 'Station BPN'],
            ['org_unit' => '10000725', 'short' => 'JKTDOQG', 'stext' => 'Operations Directorate'],
        ];

        MasterOrgUnit::insert($orgUnits);
    }


    public function masterPosition()
    {
        $positions = [
            [
                'position_key' => 20007066,
                'position_code' => 'MGROGD2QG',
                'position_name' => 'Mgr Operation Support Publication',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOGQG',
                'dept' => 'JKTOGDQG',
                'unit' => 'JKTOGD2QG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-03-24',
                'end_date' => '9999-12-31',
                'job_key' => 60504000,
            ],
            [
                'position_key' => 20007889,
                'position_code' => 'DIRCEO',
                'position_name' => 'President & CEO',
                'direktorat' => 'JKTDZQG',
                'div' => 'JKTDZQG',
                'dept' => 'JKTDZQG',
                'unit' => 'JKTDZQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-03-17',
                'end_date' => '9999-12-31',
                'job_key' => 60501000,
            ],
            [
                'position_key' => 20007931,
                'position_code' => 'CP',
                'position_name' => 'Captain',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOFQG',
                'dept' => 'JKTOFRQG',
                'unit' => 'JKTOFRQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-06-01',
                'end_date' => '9999-12-31',
                'job_key' => 60506010,
            ],
            [
                'position_key' => 20007933,
                'position_code' => 'CP',
                'position_name' => 'Captain',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOFQG',
                'dept' => 'JKTOFRQG',
                'unit' => 'JKTOFRQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-06-01',
                'end_date' => '9999-12-31',
                'job_key' => 60506010,
            ],
            [
                'position_key' => 20007934,
                'position_code' => 'CP',
                'position_name' => 'Captain',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOFQG',
                'dept' => 'JKTOFRQG',
                'unit' => 'JKTOFRQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-06-01',
                'end_date' => '9999-12-31',
                'job_key' => 60506010,
            ],
            [
                'position_key' => 20007936,
                'position_code' => 'FO',
                'position_name' => 'First Officer',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOFQG',
                'dept' => 'JKTOFRQG',
                'unit' => 'JKTOFRQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-06-01',
                'end_date' => '9999-12-31',
                'job_key' => 60506040,
            ],
            [
                'position_key' => 20007937,
                'position_code' => 'FO',
                'position_name' => 'First Officer',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOFQG',
                'dept' => 'JKTOFRQG',
                'unit' => 'JKTOFRQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-06-01',
                'end_date' => '9999-12-31',
                'job_key' => 60506040,
            ],
            [
                'position_key' => 20007938,
                'position_code' => 'FO',
                'position_name' => 'First Officer',
                'direktorat' => 'JKTDOQG',
                'div' => 'JKTOFQG',
                'dept' => 'JKTOFRQG',
                'unit' => 'JKTOFRQG',
                'status_vacan' => 2,
                'status_avail' => 0,
                'start_date' => '2020-06-01',
                'end_date' => '9999-12-31',
                'job_key' => 60506040,
            ],
        ];

        MasterPosition::insert($positions);
    }
}
