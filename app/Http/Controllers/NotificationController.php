<?php

namespace App\Http\Controllers;

use App\Factories\NotificationFactory;
use Illuminate\Http\Request;

class NotificationController extends Controller {
    public function create(Request $request) {
        $type = $request->input('type');
        $message = $request->input('message');

        try{
            $notification = NotificationFactory::create($type);
            return response()->json([
                    'success' => true,
                    'message' => $notification->send($message)
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
