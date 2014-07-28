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


            for ($i = 1; $i < count($infologs); ++$i) {
				$temp = explode("-", $infologs[$i]);
                $inforesult[$i-1] = ["{$temp[0]}-{$temp[1]}-{$temp[2]}", "{$temp[5]}", "{$temp[6]}"];
            }

            for ($i = 1; $i < count($debuglogs); ++$i) {
				$temp = explode("-", $debuglogs[$i]);
                $debugresult[$i-1] = ["{$temp[0]}-{$temp[1]}-{$temp[2]}", "{$temp[5]}", "{$temp[6]}"];
            }

            for ($i = 1; $i < count($cronlogs); ++$i) {
				$temp = explode("-", $cronlogs[$i]);
                $cronresult[$i-1] = ["{$temp[0]}-{$temp[1]}-{$temp[2]}", "{$temp[5]}", "{$temp[6]}"];
            }

            $result = [$inforesult, $debugresult, $cronresult];
            return $result;
        }
    }
