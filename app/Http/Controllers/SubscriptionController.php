<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Illuminate\Http\Request;
use App\Notification;
use App\Subscription;


class SubscriptionController extends Controller
{
    public function add(Request $request)
    {
        $newSubscription = Subscription::create([
            'email' => $request->email,
        ]);

        $notification = Notification::create([
            'type'      => 'New Subscription',
            'message'   => "{$newSubscription->email} subscribed " . $newSubscription->created_at->diffForHumans(),
        ]);
        event( new NewNotification( $notification ) );
        return redirect('/')->with('message', "You've successfully subscribed");
    }
}
