<?php

namespace App\Http\Controllers;

use App\Models\Image;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use App\Http\Traits\UserAgent;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    use UserAgent;

    public function index(Image $image)
    {
        $header = [
            'User-Agent'=>$this->randUserAgent(),
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'Accept-Encoding' => 'gzip',
            'Connection' => 'keep-alive'
        ];
        $client = new Client();
        $promise = $client->getAsync($image->origin_image_url, $header);
        return $promise->then(
            function (ResponseInterface $res) {
                return response($res->getBody()->getContents(),200,['content-type'=>'image/jpeg']);
            },
            function (RequestException $e) {
                Log::alert($e->getMessage());
                abort($e->getCode() == 404 ?: 417);
            }
        )->wait();
    }
}
