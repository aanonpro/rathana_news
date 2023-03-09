<?php

namespace App\Http\Controllers;

use Share;
use Illuminate\Http\Request;

class ShareButtonsController extends Controller
{
    public function share(){
        $share =Share::page(
            url('/share-social'),
            'here is text',
        )
        ->facebook()
        ->telegram()
        ->linkedin()
        ->whatsapp()
        ->reddit()
        ->twitter()
        ->printerest();

        return view('post',compact('share'));
    }
}
