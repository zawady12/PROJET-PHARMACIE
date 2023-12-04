<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notifications\NotificationClient;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $notification = DB::select('select * from notifications');
        return view('notification',compact('notification'));
        
    }
    public function index1()
    {
        $notification = DB::select('select * from notifications');
        return view('tabnotification',compact('notification'));
        
    }
    
   /* public function sendOfferNotification() {
        $userSchema = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'Un cient a été ajouté',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
        $userSchema->notify(new InvoicePaid($offerData)); 

        dd('Task completed!');
    }*/

    public function update(Request $request, DatabaseNotification $notification)
    {
        $notification->markAsRead();
        if($request->user()->unreadNotifications->isEmpty()) {
            return redirect()->route('dashboard');
        }
        return back();
    }


}
