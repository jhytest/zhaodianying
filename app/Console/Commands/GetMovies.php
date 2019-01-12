<?php

namespace App\Console\Commands;

use App\Movies;
use Illuminate\Console\Command;

class GetMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getMovies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '从豆瓣导入电影';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $num = 0;
        $loop = true;
        while ($loop) {
            $url = "https://movie.douban.com/j/new_search_subjects?sort=S&range=0,10&tags=%E7%94%B5%E5%BD%B1&start=$num";
            $movies = json_decode(trim($this->curl($url)), true);
            //print_r($movies);
            if (!empty($movies['data'])) {
                foreach ($movies['data'] as $value) {
                    //$detailUrl = "https://api.douban.com/v2/movie/subject/{$value['id']}";
                    //$detail = json_decode($this->curl($detailUrl), true);
                    $movie = new Movies();
                    $movie->url = trim($value['url']);
                    $movie->title = trim($value['title']);
                    $movie->score = $value['rate'] ?: 0.0;
                    $movie->image = $value['cover'] ?: '';
                    /*$movie->countries = $detail['country'][0] ?: '';
                    $movie->genres = isset($detail['movie_type'][0]) ?: '';
                    $movie->year = $detail['year'][0] ?: '无';
                    $movie->language = $detail['language'][0] ?: '';*/
                    $movie->save();
                }
            } else {
                $loop = false;
                continue;
            }
            $num += 20;
            echo $url . PHP_EOL;
        }
    }


    /**
     * crul方法获取网址内容
     *
     * @param $url
     * @param int $timeOut
     * @return bool|string
     */
    public
    function curl($url, $timeOut = 50000)
    {
        $header = array(
            'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; InfoPath.2; AskTbPTV/5.17.0.25589; Alexa Toolbar)',
            'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0',
            'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET4.0C; Alexa Toolbar)',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:43.0) Gecko/20100101 Firefox/43.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // 抓取指定网页
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeOut); // 超时时间
        curl_setopt($ch, CURLOPT_USERAGENT, $header[mt_rand(0, 4)]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); // 避免data数据过长问题
        // 获取返回信息
        $htmlContent = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $htmlContent;
    }
}
