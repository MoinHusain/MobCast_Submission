<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getDataFromApi()
    {
        $response = Http::get('https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json');

        if ($response->successful()) {
            $data = $response->json();
            // Check if the 'channel' key exists and has an 'item' key
            if (isset($data['channel']['item']) && is_array($data['channel']['item'])) {
                $perPage = 10; // Number of items per page

                $items = $data['channel']['item'];
                $dcCreatorText = $items[0]['dc:creator']['#text'];

                $currentPage = request()->get('page', 1);
                $pagedData = array_slice($items, ($currentPage - 1) * $perPage, $perPage);
                $dataToDisplay = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($items), $perPage, $currentPage);

                $channelInfo = [
                    'title' => $data['channel']['title'],
                    'link' => $data['channel']['link'],
                    'description' => $data['channel']['description'],
                    'language' => $data['channel']['language'],
                ];

                return view('allpost', [
                    'channelInfo' => $channelInfo,
                    'data' => $dataToDisplay,
                    'dcCreatorText' => $dcCreatorText,
                ]);
            }
        }
    }
}



