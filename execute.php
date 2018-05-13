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
$frase1 = "TEST sentence";
$fraseinstructions = "Tap on any button below to get the corresponding link.\nIf you would like a command added, or you feel something is wrong with me, please tell @DaniSpringer about it. Thank you!";
// non commands keyboard? keep /help command
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="hello")
{
    $response = "Hey $firstname!\n$fraseinstructions";
}
elseif($text=="/youtube" || $text=="youtube")
{
    $response = "Subscribe to Dani's YouTube channel!\nhttps://youtube.com/danispringer";
}
elseif($text=="/twitter" || $text=="twitter")
{
    $response = "Follow Dani on Twitter!\nhttps://twitter.com/imDaniSpringer";
}
elseif($text=="/facebook" || $text=="facebook")
{
    $response = "Follow Dani on Facebook!\nhttps://www.facebook.com/imDaniSpringer/";
}
elseif($text=="/linkedin" || $text=="linkedin")
{
    $response = "Connect with Dani on LinkedIn!\nhttps://www.linkedin.com/in/danispringer/";
}
elseif($text=="/github" || $text=="github")
{
    $response = "Check out Dani's code on GitHub!\nhttps://github.com/DaniSpringer";
}
elseif($text=="/soundcloud" || $text=="soundcloud")
{
    $response = "Follow Dani on SoundCloud!\nhttps://soundcloud.com/danispringer";
}
elseif($text=="/website" || $text=="website")
{
    $response = "Read more on Dani's official site!\nhttps://danispringer.github.io/";
}
elseif($text=="/play_store" || $text=="play store")
{
    $response = "Buy Dani's music on Google Play!\nhttps://play.google.com/store/music/artist/Dani_Springer?id=Azs4pemwjhdjeg3czesvzojv4au";
}
elseif($text=="/itunes" || $text=="itunes" || $text=="/apple_music" || $text=="apple music")
{
    $response = "Buy Dani's music on iTunes!\nhttps://itunes.apple.com/us/artist/dani-springer/id1101532290";
}
elseif($text=="/amazon" || $text=="amazon")
{
    $response = "Buy Dani's music on Amazon!\nhttps://www.amazon.com/s/ref=ntt_srch_drd_B01EE9QVCS?ie=UTF8&field-keywords=Dani%20Springer&index=digital-music&search-type=ss";
}
elseif($text=="/cd_baby" || $text=="cd baby")
{
    $response = "Buy Dani's music on CD Baby!\nhttps://store.cdbaby.com/Artist/DaniSpringer";
}
elseif($text=="/stack_overflow" || $text=="stack overflow")
{
    $response = "Check out Dani's profile on Stack OverFlow!\nhttp://stackoverflow.com/users/5306470/dani-springer?tab=profile";
}
elseif($text=="/spotify" || $text=="spotify")
{
    $response = "Play Dani's music on Spotify!\nhttps://play.spotify.com/artist/6wp28GMW9iypStW4pCsCN9";
}
elseif($text=="/yandex" || $text=="yandex")
{
    $response = "Buy Dani's music on Yandex!\nhttps://music.yandex.ua/artist/4345578";
}
elseif($text=="/tidal" || $text=="tidal")
{
    $response = "Buy Dani's music on Tidal!\nhttp://tidal.com/us/store/artist/7732967";
}
elseif($text=="/shazam" || $text=="shazam")
{
    $response = "Check out Dani's profile on Shazam!\nhttps://www.shazam.com/gb/artist/202646271/dani-springer";
}
elseif($text=="/slacker" || $text=="slacker")
{
    $response = "Play Dani's music on Slacker Radio!\nhttp://www.slacker.com/artist/dani-springer";
}
elseif($text=="/kkbox" || $text=="kkbox")
{
    $response = "Buy Dani's music on KKBox!\nhttps://www.kkbox.com/jp/ja/artist/kMofOQIp1IH1JO0F0V7.m08K-index-1.html";
}
elseif($text=="/deezer" || $text=="deezer")
{
    $response = "Buy Dani's music on Deezer!\nhttp://www.deezer.com/us/artist/10164056";
}
elseif($text=="/napster" || $text=="napster")
{
    $response = "Buy Dani's music on Napster!\nhttps://us.napster.com/artist/dani-springer";
}
elseif($text=="/iheart_radio" || $text=="iheart radio")
{
    $response = "Buy Dani's music on iHeart Radio!\nhttps://www.iheart.com/artist/dani-springer-31186894/";
}
elseif($text=="/anghami" || $text=="anghami")
{
    $response = "Buy Dani's music on Anghami!\nhttps://www.anghami.com/artist/2541446";
}
elseif($text=="/google" || $text=="google")
{
    $response = "Look up Dani Springer on Google!\nhttps://www.google.com/search?q=dani+springer";
}
elseif($text=="/google_images" || $text=="google images")
{
    $response = "Look up Dani Springer on Google Images!\nhttp://www.google.com/images?q=dani+springer";
}
elseif($text=="/logo" || $text=="logo")
{
    $response = "Check out Dani's logo!\nhttps://danispringer.github.io/i/dani-springer-tiny.jpg";
}
elseif($text=="/donate" || $text=="donate")
{
    $response = "Help me bring you more great music!\nhttps://www.gofundme.com/help-me-bring-you-more-great-music";
}
elseif($text=="/help" || $text=="help")
{
    $response = "$fraseinstructions";
}
else
{
    $response = "Sorry $firstname, I don't know what '$text' means.\n$fraseinstructions";
}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
// imposto la keyboard
$parameters["reply_markup"] = '{ "keyboard": [
    ["YouTube", "Twitter", "Facebook"],
    ["LinkedIn", "GitHub", "SoundCloud"],
    ["Website", "Play Store", "iTunes"],
    ["Apple Music", "Amazon", "CD Baby"],
    ["Stack OverFlow", "Shazam", "Tidal"],
    ["Yandex", "Spotify", "Slacker"],
    ["KKBOX", "Deezer", "Anghami"],
    ["Napster", "iHeart Radio"],
    ["Google", "Google Images", "Logo"],
    ["Donate", "Help"]], "one_time_keyboard": false}';
echo json_encode($parameters);