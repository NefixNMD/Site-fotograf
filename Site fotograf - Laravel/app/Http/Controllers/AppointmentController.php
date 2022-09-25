<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    public function index(Request $request) {
        return view('photo_app.programari');
      }
    public function view() {
        $appointments = Appointment::all();
        return view('photo_app.admin.appointment.appointments', compact('appointments'));
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return Redirect::back();
    }
      // Store Contact Form data
      public function store(Request $request) {
          // Form validation
          $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email',
              'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
              'event'=>'required',
              'event_date' =>'required',
              'message' => 'required',
           ]);
          //  Store data in database
          Appointment::create($request->all());
          //  Send mail to admin
          Mail::send('appointment_mail', array(
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'phone' => $request->get('phone'),
              'event' => $request->get('event'),
              'event_date' => $request->get('event_date'),
              'user_query' => $request->get('message'),
          ), function($message) use ($request){
              $message->from($request->email);
              $message->to('marinvictormvv@gmail.com', 'Admin')->subject("New Appointment");
          }); 
          Mail::send('customer_appointment_mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'event' => $request->get('event'),
            'event_date' => $request->get('event_date'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to($request->get('email'), $request->get('name'))->subject("Congratulations on your new appointment");
        }); 
          return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
      }
}
