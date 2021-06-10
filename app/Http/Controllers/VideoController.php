<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
class VideoController extends Controller
{
    //
    public function index()
    {
        $video = Video::paginate(10);
        return view('admin.video', compact('video'));
    }

    public function fetch_data()
    {
        $queryParams = [
            'channelId' => 'UCsyREEwjN2Ohn41pLwreqyA',
            'maxResults' => 20,
            'order' => 'date',
            'key' => 'AIzaSyBcLi2lzsRLbhTL8a0qxkw8HwEGm8zjxIE'
        ];
        $apiUrl = "https://youtube.googleapis.com/youtube/v3/search?part=snippet";
        foreach ($queryParams as $param => $value) {
            $apiUrl .= "&" . $param . "=" . $value;
        }
        $request = json_decode(file_get_contents($apiUrl));
        $youtube = collect($request->items);
        $counter = 0;
        foreach($youtube as $yt){
            $check = Video::where('videoId', $yt->id->videoId)->get()->first();
            if(!$check){
                Video::create([
                    'nama' => $yt->snippet->title,
                    'description' => $yt->snippet->description,
                    'url' => 'https://youtube.com/watch?v='.$yt->id->videoId,
                    'thumbnail' => $yt->snippet->thumbnails->high->url,
                    'videoId' => $yt->id->videoId,
                    'show_headline' => 1,
                    'publishTime' => date('Y-m-d h:i:s', strtotime($yt->snippet->publishTime)),
                ]);
                $counter++;
            }
        }
        $status = 'warning';
        $message = 'Data Video sudah paling terupdate';
        if($counter != 0){
            $status = 'success';
            $message = 'Berhasil mengambil data dari Youtube';
        }
        return redirect()->back()->with($status, $message);
    }
}
