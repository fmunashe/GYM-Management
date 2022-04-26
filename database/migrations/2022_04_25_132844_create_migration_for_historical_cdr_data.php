<?php

use App\Models\CDR;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Output\ConsoleOutput;

class CreateMigrationForHistoricalCdrData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->cdr_data_migration();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }

    public function cdr_data_migration()
    {
//        $output = new ConsoleOutput();
//
//        $output->writeln("Getting CDR data for January 2021........");
//        $january_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '01',
//        ])->body();
//
//        $january_2021 = json_decode($january_2021_response);
//
//        $output->writeln("Getting CDR data for February 2021........");
//        $february_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '02',
//        ])->body();
//        $february_2021 = json_decode($february_2021_response);
//
//        $output->writeln("Getting CDR data for March 2021........");
//        $march_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '03',
//        ])->body();
//        $march_2021 = json_decode($march_2021_response);
//
//        $output->writeln("Getting CDR data for April 2021........");
//        $april_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '04',
//        ])->body();
//        $april_2021 = json_decode($april_2021_response);
//
//        $output->writeln("Getting CDR data for May 2021........");
//        $may_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '05',
//        ])->body();
//        $may_2021 = json_decode($may_2021_response);
//
//        $output->writeln("Getting CDR data for June 2021........");
//        $june_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '06',
//        ])->body();
//        $june_2021 = json_decode($june_2021_response);
//
//        $output->writeln("Getting CDR data for July 2021........");
//        $july_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '07',
//        ])->body();
//        $july_2021 = json_decode($july_2021_response);
//
//        $output->writeln("Getting CDR data for August 2021........");
//        $august_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '08',
//        ])->body();
//        $august_2021 = json_decode($august_2021_response);
//
//        $output->writeln("Getting CDR data for September 2021........");
//        $september_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '09',
//        ])->body();
//        $september_2021 = json_decode($september_2021_response);
//
//        $output->writeln("Getting CDR data for October 2021........");
//        $october_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '10',
//        ])->body();
//        $october_2021 = json_decode($october_2021_response);
//
//        $output->writeln("Getting CDR data for November 2021........");
//        $november_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '11',
//        ])->body();
//        $november_2021 = json_decode($november_2021_response);
//
//        $output->writeln("Getting CDR data for December 2021........");
//        $december_2021_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2021',
//            'month' => '12',
//        ])->body();
//        $december_2021 = json_decode($december_2021_response);
//
//        $output->writeln("Getting CDR data for January 2022........");
//        $january_2022_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2022',
//            'month' => '01',
//        ])->body();
//        $january_2022 = json_decode($january_2022_response);
//
//        $output->writeln("Getting CDR data for February 2022........");
//        $february_2022_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2022',
//            'month' => '02',
//        ])->body();
//        $february_2022 = json_decode($february_2022_response);
//
//        $output->writeln("Getting CDR data for March 2022........");
//        $march_2022_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2022',
//            'month' => '03',
//        ])->body();
//        $march_2022 = json_decode($march_2022_response);
//
//        $output->writeln("Getting CDR data for April 2022........");
//        $april_2022_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2022',
//            'month' => '04',
//        ])->body();
//        $april_2022 = json_decode($april_2022_response);
//
//        $output->writeln("Getting CDR data for May 2022........");
//        $may_2022_response = Http::asForm()->post('http://41.174.110.163:8010/api/cdrInformation', [
//            'year' => '2022',
//            'month' => '05',
//        ])->body();
//        $may_2022 = json_decode($april_2022_response);
//
//
//        $years = [$january_2021, $february_2021, $march_2021, $april_2021, $may_2021, $june_2021, $july_2021, $august_2021, $september_2021, $october_2021, $november_2021, $december_2021, $january_2022, $february_2022, $march_2022, $april_2022,$may_2022];
//
//        $count = 1;
//        foreach ($years as $period) {
//            if ($period->result != 'No table with information could be found for the specified period' || $period->result!='No records were found for the specified period') {
//                $output->writeln("Migrating CDR data for period ........" . $count);
//                foreach ($period->result as $result) {
//                    CDR::query()->create([
//                        "datetime" => $result->datetime,
//                        "clid" => $result->clid,
//                        "src" => $result->src,
//                        "dst" => $result->dst,
//                        "dcontext" => $result->dcontext,
//                        "srctrunk" => $result->srctrunk,
//                        "dstrunk" => $result->dstrunk,
//                        "lastapp" => $result->lastapp,
//                        "lastdata" => $result->lastdata,
//                        "duration" => $result->duration,
//                        "billable" => $result->billable,
//                        "disposition" => $result->disposition,
//                        "amaflags" => $result->amaflags,
//                        "calltype" => $result->calltype,
//                        "accountcode" => $result->accountcode,
//                        "uniqueid" => $result->uniqueid,
//                        "recordfile" => $result->recordfile,
//                        "recordpath" => $result->recordpath,
//                        "monitorfile" => $result->monitorfile,
//                        "monitorpath" => $result->monitorpath,
//                        "dstmonitorfile" => $result->dstmonitorfile,
//                        "dstmonitorpath" => $result->dstmonitorpath,
//                        "extfield1" => $result->extfield1,
//                        "extfield2" => $result->extfield2,
//                        "extfield3" => $result->extfield3,
//                        "extfield4" => $result->extfield4,
//                        "extfield5" => $result->extfield5,
//                        "payaccount" => $result->payaccount,
//                        "usercost" => $result->usercost,
//                        "didnumber" => $result->didnumber,
//                        "transbilling" => $result->transbilling,
//                        "payexten" => $result->payexten,
//                        "srcchanurl" => $result->srcchanurl,
//                        "dstchanurl" => $result->dstchanurl,
//                        "companycontact" => $result->companycontact,
//                        "personalcontact" => $result->personalcontact,
//                        "contactnumber" => $result->contactnumber,
//                        "personalcontacttf" => $result->personalcontacttf,
//                    ]);
//                }
//                $output->writeln("Completed migrating CDR data for period ........" . $count);
//                $count++;
//            }
//        }
//        $output->writeln("........ Successfully migrated all CDR historical data ........");
    }
}
