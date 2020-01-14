<?php

namespace Genericmilk\Holiday;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Holiday extends Controller
{
    public function Page(){
        $Api = (object)[
            'canSeeDb' => $this->canSeeDb(),
            'Migrations' => $this->MigrationsDir()
        ];
        return view('holiday::hello')->with('Api',$Api);
    }


    private function MigrationsDir(){
        $f = array_values(array_diff(scandir(database_path('migrations')), ['.', '..']));
        $f = array_reverse($f);
        $b = [];
        foreach($f as $file){

            $fp = fopen(database_path('migrations/'.$file), 'r');
            $class = $buffer = '';
            $i = 0;
            while (!$class) {
                if (feof($fp)) break;

                $buffer .= fread($fp, 512);
                $tokens = token_get_all($buffer);

                if (strpos($buffer, '{') === false) continue;

                for (;$i<count($tokens);$i++) {
                    if ($tokens[$i][0] === T_CLASS) {
                        for ($j=$i+1;$j<count($tokens);$j++) {
                            if ($tokens[$j] === '{') {
                                $class = $tokens[$i+2][1];
                            }
                        }
                    }
                }
            }

            $d = explode('_',$file);

            $b[] = (object)[
                'file' => $file,
                'class' => $class,
                'date' => $d[0].'-'.$d[1].'-'.$d[2]
            ];
        }

        return $b;
    }

    private function canSeeDb(){
        try{
            DB::connection()->getPdo();
            return true;
        }catch(\Exception $e){
            return false;
        }

    }
}