<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="hello")
{
    $response = "Hey $firstname!\nTap on any button below to get the corresponding link.";
}
elseif($text=="/youtube")
{
    $response = "Subscribe to Dani's YouTube channel!\nhttps://youtube.com/danispringer";
}
elseif($text=="/twitter")
{
    $response = "Follow Dani on Twitter!\nhttps://twitter.com/imDaniSpringer";
}
elseif($text=="/facebook")
{
    $response = "Follow Dani on Facebook!\nhttps://www.facebook.com/DaniSpringerPage/";
}
elseif($text=="/linkedin")
{
    $response = "Connect with Dani on LinkedIn!\nhttps://www.linkedin.com/in/danispringer/";
}
elseif($text=="/github")
{
    $response = "Check out Dani's code on GitHub!\nhttps://github.com/DaniSpringer";
}
elseif($text=="/soundcloud")
{
    $response = "Follow Dani on SoundCloud!\nhttps://soundcloud.com/danispringer";
}
elseif($text=="/website")
{
    $response = "Read more on Dani's official site!\nhttps://danispringer.blogspot.com/";
}
elseif($text=="/play_store")
{
    $response = "Buy Dani's music on Google Play!\nhttps://play.google.com/store/music/artist/Dani_Springer?id=Azs4pemwjhdjeg3czesvzojv4au";
}
elseif($text=="/itunes")
{
    $response = "Buy Dani's music on iTunes!\nhttps://itunes.apple.com/us/artist/dani-springer/id1101532290";
}
elseif($text=="/apple_music")
{
    $response = "Play Dani's music on Apple Music!\nhttps://itunes.apple.com/us/artist/dani-springer/id1101532290";
}
elseif($text=="/amazon")
{
    $response = "Buy Dani's music on Amazon!\nhttps://www.amazon.com/s/ref=ntt_srch_drd_B01EE9QVCS?ie=UTF8&field-keywords=Dani%20Springer&index=digital-music&search-type=ss";
}
elseif($text=="/cd_baby")
{
    $response = "Buy Dani's music on CD Baby!\nhttps://store.cdbaby.com/Artist/DaniSpringer";
}
elseif($text=="/stack_overflow")
{
    $response = "Check out Dani's profile on Stack OverFlow!\nhttp://stackoverflow.com/users/5306470/dani-springer?tab=profile";
}
elseif($text=="/spotify")
{
    $response = "Play Dani's music on Spotify!\nhttps://play.spotify.com/artist/6wp28GMW9iypStW4pCsCN9";
}
elseif($text=="/yandex")
{
    $response = "Buy Dani's music on Yandex!\nhttps://music.yandex.ua/artist/4345578";
}
elseif($text=="/tidal")
{
    $response = "Buy Dani's music on Tidal!\nhttp://tidal.com/us/store/artist/7732967";
}
elseif($text=="/shazam")
{
    $response = "Check out Dani's profile on Shazam!\nhttps://www.shazam.com/gb/artist/202646271/dani-springer";
}
elseif($text=="/slacker")
{
    $response = "Play Dani's music on Slacker Radio!\nhttp://www.slacker.com/artist/dani-springer";
}
elseif($text=="/groove")
{
    $response = "Buy Dani's music on Groove!\nhttps://www.microsoft.com/en-us/store/music/artist/dani-springer/721a8c00-0200-11db-89ca-0019b92a3933";
}
elseif($text=="/kkbox")
{
    $response = "Buy Dani's music on KKBox!\nhttps://www.kkbox.com/jp/ja/album/2mJWyqnC.i3hS0F1l5eq009H-index.html";
}
elseif($text=="/deezer")
{
    $response = "Buy Dani's music on Deezer!\nhttp://www.deezer.com/us/artist/10164056";
}
elseif($text=="/napster")
{
    $response = "Buy Dani's music on Napster!\nhttps://us.napster.com/artist/dani-springer";
}
elseif($text=="/iheart_radio")
{
    $response = "Buy Dani's music on iHeart Radio!\nhttps://www.iheart.com/artist/dani-springer-31186894/";
}
elseif($text=="/anghami")
{
    $response = "Buy Dani's music on Anghami!\nhttps://www.anghami.com/artist/2541446";
}
elseif($text=="/google")
{
    $response = "Look up Dani Springer on Google!\nhttps://www.google.com/search?q=dani+springer";
}
elseif($text=="/google_images")
{
    $response = "Look up Dani Springer on Google Images!\nhttp://www.google.com/images?q=dani+springer";
}
elseif($text=="/logo")
{
    $response = "Check out Dani's logo!\nhttps://3.bp.blogspot.com/-0tRtvIfMMPw/WilfdWxi6dI/AAAAAAAAKJE/NsZ517ShE3k__Vi7H6tXf7wIprLsf1vMwCLcBGAs/s1400/star-dark.jpg";
}
elseif($text=="/donate")
{
    $response = "Help me bring you more great music!\nhttps://www.gofundme.com/help-me-bring-you-more-great-music";
}
elseif($text=="/help")
{
    $response = "Something wrong with me?\nPlease tell @DaniSpringer about it.";
}
else
{
    $response = "Sorry $firstname, I don't know what '$text' means.\nTap on any button below to get the corresponding link.\nIf you want a command to be added (like '/twitter' to know Dani's Twitter handle), please send a message to @DaniSpringer";
}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
// imposto la keyboard
$parameters["reply_markup"] = '{ "keyboard": [
    ["/youtube", "/twitter", "/facebook"],
    ["/linkedin", "/github", "/soundcloud"],
    ["/website", "/play_store", "/itunes"],
    ["/apple_music", "/amazon", "/cd_baby"],
    ["/stack_overflow", "/shazam", "/tidal"],
    ["/yandex", "/spotify", "/slacker"],
    ["/groove", "/kkbox", "/deezer"],
    ["/napster", "/iheart_radio", "/anghami"],
    ["/google", "/google_images", "/logo"],
    ["/donate", "/help"]], "one_time_keyboard": false}';
echo json_encode($parameters);