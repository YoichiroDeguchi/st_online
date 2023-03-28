<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Meeting;
use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Carbon\Carbon;

class ZoomMeetingController extends Controller
{
    //
    private function generateZoomToken() {
        $key = config('services.zoom.api_key');
        $secret = config('services.zoom.api_secret');
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute')
        ];
        return JWT::encode($payload, $secret, 'HS256');
    }

    public function createMeeting(Request $request) {
        // Zoom APIからのレスポンス処理
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.zoom.us/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'Bearer '.$this->generateZoomToken(),
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'topic' => $request->input('topic'),
                'type' => 2,
                'start_time' => $request->input('start_time'),
                'duration' => $request->input('duration'),
                'timezone' => $request->input('timezone'),
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $start_time = Carbon::parse($data['start_time'])->format('Y-m-d H:i:s');

        // ミーティング情報をデータベースに保存
        $meeting = new Meeting;
        $meeting->user_id = auth()->user()->id;
        $meeting->name = $request->input('name');
        $meeting->office = $request->input('office');
        $meeting->start_time = $request->input('start_time');
        $meeting->client_name = $request->input('client_name');
        $meeting->age = $request->input('age');
        $meeting->disease = $request->input('disease');
        $meeting->consultation = $request->input('consultation');
        $meeting->join_url = $data['join_url'];
        $meeting->save();

        return view('meeting_created', ['meeting' => $data]);
    }

    public function myMeetings()
    {
        $meetings = Meeting::where('user_id', Auth::id())->get();
        return view('my_meetings', ['meetings' => $meetings]);
    }

    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);

        // ユーザーが所有者であることを確認する
        if ($meeting->user_id != Auth::id()) {
            return abort(403);
        }
        $meeting->delete();
        return redirect()->route('my_meetings')->with('success', 'ミーティングが削除されました。');
    }
}
