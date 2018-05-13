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

// $myUrls = [
//     "YouTube" => "https://youtube.com/danispringer",
//     "Twitter" => "https://twitter.com/imDaniSpringer",
//     "Facebook" => "https://www.facebook.com/imDaniSpringer/",
//     "LinkedIn" => "https://www.linkedin.com/in/danispringer/",
//     "GitHub" => "https://github.com/DaniSpringer",
//     "SoundCloud" => "https://soundcloud.com/danispringer",
//     "Website" => "https://danispringer.github.io/",
//     "Play Store" => "https://play.google.com/store/music/artist/Dani_Springer?id=Azs4pemwjhdjeg3czesvzojv4au",
//     "iTunes" => "https://itunes.apple.com/us/artist/dani-springer/id1101532290",
//     "Amazon" => "https://www.amazon.com/s/ref=ntt_srch_drd_B01EE9QVCS?ie=UTF8&field-keywords=Dani%20Springer&index=digital-music&search-type=ss",
//     "CDBaby" => "https://store.cdbaby.com/Artist/DaniSpringer",
//     "StackOverFlow" => "http://stackoverflow.com/users/5306470/dani-springer?tab=profile",
//     "Spotify" => "https://play.spotify.com/artist/6wp28GMW9iypStW4pCsCN9",
//     "Yandex" => "https://music.yandex.ua/artist/4345578",
//     "Tidal" => "http://tidal.com/us/store/artist/7732967",
//     "Shazam" => "https://www.shazam.com/gb/artist/202646271/dani-springer",
//     "Slacker" => "http://www.slacker.com/artist/dani-springer",
//     "KKBOX" => "https://www.kkbox.com/jp/ja/artist/kMofOQIp1IH1JO0F0V7.m08K-index-1.html",
//     "Deezer" => "http://www.deezer.com/us/artist/10164056",
//     "Napster" => "https://us.napster.com/artist/dani-springer",
//     "iHeartRadio" => "https://www.iheart.com/artist/dani-springer-31186894/",
//     "Anghami" => "https://www.anghami.com/artist/2541446",
//     "Google" => "https://www.google.com/search?q=dani+springer",
//     "GoogleImages" => "http://www.google.com/images?q=dani+springer",
//     "Logo" => "https://danispringer.github.io/i/dani-springer-tiny.jpg",
//     "Donate" => "https://www.gofundme.com/help-me-bring-you-more-great-music",
//     "Help" => "HELP LINK"
// ];

if(strpos($text, "/start") === 0 || $text=="/list")
{
    // return buttons
}
elseif($text=="/help" || $text=="help")
{
    // return single help button
}
else
{
    // do nothing
}



$parameters = array('chat_id' => $chatId, "text" => 'some message');

$keyboard = ['inline_keyboard' => [
                                      [
                                          ['text' =>  'myText', 'url' => "https://google.com"]
                                      ]
                                  ]
                              ];

$parameters["method"] = "sendMessage";

$parameters["reply_markup"] = json_encode($keyboard, true);

echo json_encode($parameters);