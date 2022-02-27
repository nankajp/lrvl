<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    /**
     * バリデーションルール
     */
    private const RULES = [
        'item1' => 'required',
        'item2' => 'max:10',
    ];

    /**
     * バリデーションメッセージ
     */
    private const MESSAGES = [
        'item1.required' => 'item1を入力してください',
        'item2.max' => 'item2 < 10.',
    ];

    /**
     * Validationテスト
     */
    public function form(Request $request){
        Log::info('Form method called');
        
        // 1. do validate
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if ( $validator->fails() ) {
            // 1-1. something
            return redirect('/hello')->withErrors($validator)->withInput();
        }

        // 2. BLogic...
        $item1 = $request->input('item1');
        $item2 = $request->input('item2');

        return view('Form', compact('item1', 'item2'));
    }
}
