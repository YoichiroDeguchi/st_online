<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class ZoomAuthController extends Controller
{
    //
    public function createMeeting(Request $request)
    {
        $accessToken = session('zoom_access_token');

        if (!$accessToken) {
            return redirect()->route('zoom.authorize');
        }

        $client = new Client();
        $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'topic' => $request->input('topic'),
                'type' => 2, // Scheduled meeting
                'start_time' => $request->input('start_time'),
                'duration' => $request->input('duration'),
                'timezone' => 'Asia/Tokyo',
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        if (isset($data['id'])) {
            return view('zoom.meeting_created', ['meeting' => $data]);
        } else {
            return back()->withErrors(['message' => 'Failed to create Zoom meeting.']);
        }
    }

    public function redirectToProvider()
        {
            return Socialite::driver('zoom')->redirect();
        }
}
