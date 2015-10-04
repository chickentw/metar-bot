<?PHP
    //Created by doratown

    require_once 'twitteroauth.php';
    include("plurk.php");
    
    define("CONSUMER_KEY", "Your key here");
    define("CONSUMER_SECRET", "Your key here");
    define("OAUTH_TOKEN", "Your key here");
    define("OAUTH_SECRET", "Your key here");
    
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
    $content = $connection->get('account/verify_credentials');
    
    $qulifier='says';

    $id=$_SERVER["QUERY_STRING"];
    $url="http://www.aviationweather.gov/metar/data?ids=rctp&format=raw&date=0&hours=0";
    $info=file_get_contents($url);
    preg_match('/code>(.*?)</i',$info,$m);


    $connection->post('statuses/update', array('status' => $m[1]));
    $post_info = do_action("http://www.plurk.com/APP/Timeline/plurkAdd",array("content"=>rawurlencode($m[1]),"qualifier"=>$qulifier));

?>