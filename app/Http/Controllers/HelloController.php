<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// 1. self
// use Memcache;
use Illuminate\Support\Facades\Cache;

class HelloController extends Controller
{
    /**
     * Memcachedテスト
     */
    public function index(Request $request){
        $test = "TEST";
        Log::info('LOG TEST');

        // 1. self
        //$mc = new Memcache();
        //$mc->addServer("localhost", 11211);
        //$mc->add("key1", "value1");

        //$mc = new \Memcached();

        // 2. use default Cache Facade
        //Cache::store('memcached')->put('key','123', 600);
        //$test = Cache::store('memcached')->get('key');

        return view('Hello', compact('test'));
    }

    /**
     *  PHP unit用
     */
    private function isOverZero($param){
        if( 0 < $param ){
            return true;
        }
        return false;
    }

    /**
     *  PHP unit用
     */
    private function getSomething(){
        return "TEST";
    }
}
