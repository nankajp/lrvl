<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Memcache;

class HelloController extends Controller
{
    public function index(Request $request){
        $test = "TEST";
        Log::info('LOG TEST');

        $mc = new Memcache();
        $mc->addServer("localhost", 11211);
        //$mc->add("key1", "value1");
        //echo "key1 : " . $mc->get("key1") . "\n";

        return view('Hello', compact('test'));
    }
}
