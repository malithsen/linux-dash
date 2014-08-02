<?php

    namespace Modules;

    class ba_status extends \ld\Modules\Module {
        protected $name = 'Bestat Status';
        protected $raw_output = true;

        public function getData($args=array()) {
			$data = '';
			
			exec(
                "ps -ef | grep -v grep | grep 'python bestat.py'",
                $result
            );
			
			foreach ($result as $a) {
				$p = explode('python', $a);
				$data = $p[1];
            }
			
			return $data;
        }
    }
