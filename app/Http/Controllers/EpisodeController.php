<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Softonic\GraphQL\ClientBuilder;

class EpisodeController extends Controller
{
    function store() {
        $client = ClientBuilder::build(env('RICKMORTY_API'));

        $query = '
        query {
            episodes {
                results {
                    name, id, created, characters {
                        name
                    }
                }
            }
        }';

        $response = $client->query($query);

        $data = $response->getData();

        foreach ($data['episodes']['results'] as $result) {
            $episodes = array('name' => $result['name'], 'episode_num' => $result['id'], 'ep_created' => date('Y-m-d H:i:s', strtotime($result['created'])));
            $characters = array('name' => $result['characters']);
            DB::table('episodes')->insert($episodes);
            foreach ($characters['name'] as $character) {
                DB::table('characters')->insert(['name' => $character['name'], 'episode_num' => $result['id']]);
            }
        }
        return redirect('episodes');
    }

    function read(Request $request) {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        if (!$from_date) {
            $from_date = '1970-01-01';
        }
        if (!$to_date) {
            $to_date = '2050-01-01';
        }

        $episodes = Episode::whereBetween('ep_created', [$from_date, $to_date])->sortable()->paginate(10);
        return view('episodes', compact('episodes'));
    }
}