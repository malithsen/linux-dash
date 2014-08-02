<?php

    namespace Modules;

    class balogs extends \ld\Modules\Module {
        protected $name = 'balogs';

        public function getData($args=array()) {

            exec(
                'tail /home/bestat/app/logs/Info.log',
                $infologs
            );
            exec(
                'tail /home/bestat/app/logs/debug.log',
                $debuglogs
            );
            exec(
                'tail /home/bestat/app/logs/cron.log',
                $cronlogs
            );


            $inforesult = array();
            $debugresult = array();
            $cronresult = array();

            for ($i = 1; $i < count($infologs); ++$i) {
                if ($infologs[$i] != "--------------------"){
                    $temp = explode("-", $infologs[$i]);
                    array_push($inforesult, array("{$temp[0]}-{$temp[1]}-{$temp[2]}", "{$temp[5]}", "{$temp[6]}"));
                }
            }

            for ($i = 1; $i < count($debuglogs); ++$i) {
                if ($debuglogs[$i] != "--------------------"){
                    $temp = explode("-", $debuglogs[$i]);
                    array_push($debugresult, array("{$temp[0]}-{$temp[1]}-{$temp[2]}", "{$temp[5]}", "{$temp[6]}"));
                }
            }

            for ($i = 2; $i < count($cronlogs); ++$i) {
                if ($cronlogs[$i] != "--------------------"){
                    $temp = explode("-", $cronlogs[$i]);
                    array_push($cronresult, array("{$temp[0]}-{$temp[1]}-{$temp[2]}", "{$temp[5]}", "{$temp[6]}"));
                }
            }

            $result = array($inforesult, $debugresult, $cronresult);
            return $result;
        }
    }
