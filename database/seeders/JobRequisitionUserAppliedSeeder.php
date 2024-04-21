<?php

namespace Database\Seeders;

use App\Models\JobRequisitionUserApplied;
use App\Models\JobRequisitionUserAppliedProcess;
use App\Models\JobRequisitionUserAppliedProcessStep;
use App\Models\JobRequisitonUserAppliedQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class JobRequisitionUserAppliedSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::jobRequisitionUserAppliedProcessStepSeeder();
        self::jobRequisitionUserAppliedInformationSeeder();
        self::jobRequisitionUserAppliedQuestion();
    }

    public function jobRequisitionUserAppliedInformationSeeder()
    {
        $noJoReAp = 1;

        for ($jobRequisitionId = 1; $jobRequisitionId <= 3; $jobRequisitionId++) {
            for ($userId = 1; $userId <= 60; $userId++) {
                JobRequisitionUserApplied::create([
                    'id_job_requisition' => $jobRequisitionId,
                    'id_user' => $userId,
                    'id_job_requisition_category' => rand(1, 3),
                    'id_job_requisition_user_applied_process_step_active' => rand(1, 31),
                ]);

                $numberOfSteps = mt_rand(1, 9);
                $steps = range(1, $numberOfSteps);
                $records = [];

                foreach ($steps as $step) {
                    $records[] = [
                        'id_job_requisition_user_applied' => $noJoReAp,
                        'id_job_requisition_user_applied_process_step' => $step,
                        'status' => true,
                    ];
                }

                JobRequisitionUserAppliedProcess::insert($records);
                $noJoReAp += 1;
            }
        }
    }

    public function jobRequisitionUserAppliedProcessStepSeeder()
    {
        function createProcessSteps($role, $processes)
        {
            foreach ($processes as $process) {
                JobRequisitionUserAppliedProcessStep::create([
                    'name_process' => $process,
                    'id_job_requisition_category' => $role,
                ]);
            }
        }

        $processesPilot = [
            'applied',
            'Written Test',
            'Interview HC & User',
            'Simulator Test',
            'Psikotest',
            'Background Check',
            'MCU',
            'Final Review',
            'Hired',
            'Rejected',
        ];

        $processesFA = [
            'applied',
            'Standar Penampilan',
            'Interview HC & User',
            'English Test',
            'Psikotest',
            'Interview BOD',
            'Background Check',
            'MCU',
            'Final Review',
            'Hired',
            'Rejected',
        ];

        $processGeneral = [
            'applied',
            'Written Test',
            'Psikotest',
            'Interview HC & User',
            'Presentation',
            'Background Check',
            'MCU',
            'Final Review',
            'Hired',
            'Rejected',
        ];

        $rolePilot = 1;
        createProcessSteps($rolePilot, $processesPilot);

        $roleFA = 2;
        createProcessSteps($roleFA, $processesFA);

        $roleGeneral = 3;
        createProcessSteps($roleGeneral, $processGeneral);

    }

    public function jobRequisitionUserAppliedQuestion()
    {
        $numberOfApplicants = 465;

        for ($i = 1; $i <= $numberOfApplicants; $i++) {
            $idJobRequisitionUserApplied = $i;
            $numberOfSteps = mt_rand(1, 9);
            $steps = range(1, $numberOfSteps);

            $records = [];

            foreach ($steps as $step) {


                $records[] = [
                    'id_job_requisition_user_applied' => $idJobRequisitionUserApplied,
                    'id_job_requisition_question' => $step,
                    'answer' => (bool) rand(0, 1),
                ];
            }

            JobRequisitonUserAppliedQuestion::insert($records);
        }
    }
}
