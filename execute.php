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

$inline_keyboard_example = ['inline_keyboard' => [
                                      [
                                          ['text' =>  'myText', 'url' => "https://www.google.com"],
                                          ['text' =>  'myText', 'url' => "https://www.google.com"]
                                      ],
                                      [
                                          ['text' => 'myText', 'url' => "https://www.google.com"]
                                      ]
                                  ]
                            ];

$keyboard_list = ['inline_keyboard' => [
                                      [
                                          ['text' => 'Help', 'url' => "https://google.com/search?q=help+me"]
                                      ],
                                      [
                                          ['text' => 'YouTube', 'url' => "https://youtube.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Twitter', 'url' => "https://twitter.com/imDaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Facebook', 'url' => "https://www.facebook.com/imDaniSpringer/"]
                                      ],
                                      [
                                          ['text' => 'LinkedIn', 'url' => "https://www.linkedin.com/in/danispringer/"]
                                      ],
                                      [
                                          ['text' => 'GitHub', 'url' => "https://github.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'SoundCloud', 'url' => "https://soundcloud.com/danispringer"]
                                      ],
                                      [
                                          ['text' => 'Official Site', 'url' => "https://danispringer.github.io/"]
                                      ],
                                      [
                                          ['text' => 'Play Store', 'url' => "https://play.google.com/store/music/artist/Dani_Springer?id=Azs4pemwjhdjeg3czesvzojv4au"]
                                      ],
                                      [
                                          ['text' => 'iTunes', 'url' => "https://itunes.apple.com/us/artist/dani-springer/id1101532290"]
                                      ],
                                      [
                                          ['text' => 'Amazon', 'url' => "https://www.amazon.com/s/ref=ntt_srch_drd_B01EE9QVCS?ie=UTF8&field-keywords=Dani%20Springer&index=digital-music&search-type=ss"]
                                      ],
                                      [
                                          ['text' => 'CD Baby', 'url' => "https://store.cdbaby.com/Artist/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Stack Overflow', 'url' => "https://stackoverflow.com/users/5306470/user770?tab=profile"]
                                      ],
                                      [
                                          ['text' => 'Spotify', 'url' => "https://play.spotify.com/artist/6wp28GMW9iypStW4pCsCN9"]
                                      ],
                                      [
                                          ['text' => 'Yandex', 'url' => "https://music.yandex.ua/artist/4345578"]
                                      ],
                                      [
                                          ['text' => 'Tidal', 'url' => "http://tidal.com/us/store/artist/7732967"]
                                      ],
                                      [
                                          ['text' => 'Shazam', 'url' => "https://www.shazam.com/gb/artist/202646271/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Slacker Radio', 'url' => "http://www.slacker.com/artist/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'KKBOX', 'url' => "https://www.kkbox.com/jp/ja/artist/kMofOQIp1IH1JO0F0V7.m08K-index-1.html"]
                                      ],
                                      [
                                          ['text' => 'Napster', 'url' => "https://us.napster.com/artist/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'iHeart Radio', 'url' => "https://www.iheart.com/artist/dani-springer-31186894/"]
                                      ],
                                      [
                                          ['text' => 'Anghami', 'url' => "https://www.anghami.com/artist/2541446"]
                                      ],
                                      [
                                          ['text' => 'Google', 'url' => "https://www.google.com/search?q=dani+springer"]
                                      ],
                                      [
                                          ['text' => 'Google Images', 'url' => "http://www.google.com/images?q=dani+springer"]
                                      ],
                                      [
                                          ['text' => 'Logo', 'url' => "https://danispringer.github.io/i/dani-springer-tiny.jpg"]
                                      ],
                                      [
                                          ['text' => 'Donate', 'url' => "https://www.gofundme.com/help-me-bring-you-more-great-music"]
                                      ]
                                  ]
                              ];

$keyboard = "";

if(strpos($text, "/start") === 0 || $text=="ciao")
{
    $keyboard = $keyboard_list;
}
else
{
    // do nothing
}



$parameters = array('chat_id' => $chatId, 'text' => 'text...to be hidden eventually');

$parameters["method"] = "sendMessage";

$parameters["reply_markup"] = json_encode($keyboard, true);

echo json_encode($parameters);