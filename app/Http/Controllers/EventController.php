<?php

namespace App\Http\Controllers;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

Use Mail;
use App\Event;

class EventController extends Controller
{
    private $recipients;
    private $title ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $id = Auth::user()->id;
        $events = DB::table('events')
                ->where('id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;

        // $event->id = $request->get('id', $id);
        // $event->eventTitle = $request->get('eventName');
        // $event->eventDescription = $request->get('eventDescription');

        // $event->save();
        
        // $events = DB::table('events')
        //         ->where('id', $id)
        //         ->get();
                
        return view('events.create', compact('events'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = Auth::user()->id;
        $event  = new \App\Event;
        $this->title = $request->get('eventName');
        $content = $request->get('eventDescription');
        $location = $request->get('eventLocation');
        $date =  $request->get('startDate');
        // $time = Carbon::parse($request->get('startDate')->format('M d Y'));
        $this->recipients = $request->get('recipients');
        $test = explode(';',        $this->recipients = $request->get('recipients'));
        // dd($test);

        // $validatedData = $request->validate($request,[
        //         'eventName' => 'required|unique:posts|max:255',
        //         'eventDescription' => 'required',
        //         'eventName' => 'required|unique:posts|max:255',
        //         'eventDescription' => 'required',
        //         'eventName' => 'required|unique:posts|max:255',
        //         'eventDescription' => 'required',
        //     ]);

        // $end = $request->get('endDate');


        $event->id = $request->get('id', $id);
        $event->eventTitle = $request->get('eventName');
        $event->eventDescription = $request->get('eventDescription');
        $event->startDate = $request->get('startDate');
        $event->endDate = $request->get('endDate');
        $event->eventLocation = $request->get('eventLocation');
        $event->recipients = $request->get('recipients');

        $event->save();

        \Mail::send
            ('emails.email', 
             [  'title' => $this->title, 
                'content' => $content,
                'location' => $location,
                'date' => $date,
                // 'time' => $time,
            ], 
                function ($message){
                    $email = Auth::user()->email;
                    $name = Auth::user()->firstname .' '. Auth::user()->lastname;
                    $message->from($email, $name);
                    $message->to(explode(';', $this->recipients));
                    $message->subject("You're invited to " . $this->title . "!");
                    
                });

        return redirect()->action('EventController@calender');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Event::find($id);
        // dd($events);
        return view('events.show', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $eventId = $request->get('eventId');
        Event::where('eventId', $eventId)->update(array(
            'eventTitle' => $request->get('eventTitle'),
            'eventDescription' => $request->get('eventDescription'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'allDay' => $request->get('allDay'),
            'eventLocation' => $request->get('eventLocation'),
            'recipients' => $request->get('recipients')  
        ));

        return redirect()->action('EventController@calender');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calender(Request $request)
    {
        
        $events =[];
        $id = Auth::user()->id;
        $data = DB::table('events')
                ->where('id', $id)
                ->orderBy('startDate', 'desc')
                ->get();

                 if($data->count())
                 {
                    foreach ($data as $key => $value)             
                    {
                        $eventId = $value->eventId;
                        // $name = str_replace(' ', '_', $eventName);
                        $events[] = \Calendar::event(
                                                $value->eventTitle,
                                                $request->get('allDay'),
                                                new \DateTime($value->startDate),
                                                new \DateTime($value->endDate),
                                                $value->eventId,
                                                [
                                                    'url' => '../events/' . $eventId
                                                ]
                                );
                    }
                 }

        $calendar = \Calendar::addEvents($events);
        //  dd($data);
        return view('events.index', compact('calendar', 'data', 'eventId'));
    }       
}
