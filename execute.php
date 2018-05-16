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

$keyboard_music = ['inline_keyboard' => [
                                      [
                                          ['text' => 'Listen on YouTube', 'url' => "https://youtube.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Follow on Spotify', 'url' => "https://play.spotify.com/artist/6wp28GMW9iypStW4pCsCN9"]
                                      ],
                                      [
                                          ['text' => 'Buy on Play Store', 'url' => "https://play.google.com/store/music/artist/Dani_Springer?id=Azs4pemwjhdjeg3czesvzojv4au"]
                                      ],
                                      [
                                          ['text' => 'Buy on iTunes', 'url' => "https://itunes.apple.com/us/artist/dani-springer/id1101532290"]
                                      ],
                                      [
                                          ['text' => 'Follow on Apple Music', 'url' => "https://itunes.apple.com/us/artist/dani-springer/1101532290"]
                                      ],
                                      [
                                          ['text' => 'Preview on MostlyMusic', 'url' => "https://mostlymusic.com/collections/vendors?q=Dani%20Springer"]
                                      ],
                                      [
                                          ['text' => 'Buy on Amazon', 'url' => "https://www.amazon.com/s/ref=ntt_srch_drd_B01EE9QVCS?ie=UTF8&field-keywords=Dani%20Springer&index=digital-music&search-type=ss"]
                                      ],
                                      [
                                          ['text' => 'Buy on CD Baby', 'url' => "https://store.cdbaby.com/Artist/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Preview on SoundCloud', 'url' => "https://soundcloud.com/danispringer"]
                                      ],
                                      [
                                          ['text' => 'Buy on Yandex', 'url' => "https://music.yandex.ua/artist/4345578"]
                                      ],
                                      [
                                          ['text' => 'Buy on Tidal', 'url' => "http://tidal.com/us/store/artist/7732967"]
                                      ],
                                      [
                                          ['text' => 'Listen on Shazam', 'url' => "https://www.shazam.com/gb/artist/202646271/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Listen on Slacker Radio', 'url' => "http://www.slacker.com/artist/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Listen on KKBOX', 'url' => "https://www.kkbox.com/jp/ja/artist/kMofOQIp1IH1JO0F0V7.m08K-index-1.html"]
                                      ],
                                      [
                                          ['text' => 'Listen on Napster', 'url' => "https://us.napster.com/artist/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Listen on iHeart Radio', 'url' => "https://www.iheart.com/artist/dani-springer-31186894/"]
                                      ],
                                      [
                                          ['text' => 'Listen on Anghami', 'url' => "https://www.anghami.com/artist/2541446"]
                                      ]
                                  ]
                              ];

$keyboard_social = ['inline_keyboard' => [
                                      [
                                          ['text' => "Subscribe to Dani's YouTube", 'url' => "https://youtube.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Follow Dani on Twitter', 'url' => "https://twitter.com/imDaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Like Dani on Facebook', 'url' => "https://www.facebook.com/imDaniSpringer/"]
                                      ],
                                      [
                                          ['text' => 'Follow Dani on Instagram', 'url' => "https://www.instagram.com/imdanispringer/"]
                                      ],
                                      [
                                          ['text' => 'Connect with Dani on LinkedIn', 'url' => "https://www.linkedin.com/in/danispringer/"]
                                      ]
                                  ]
                              ];

$keyboard_about = ['inline_keyboard' => [
                                      [
                                          ['text' => 'Connect on LinkedIn', 'url' => "https://www.linkedin.com/in/danispringer/"]
                                      ],
                                      [
                                          ['text' => "See Dani's Resume", 'url' => "https://danispringer.github.io/Dani-Springer-Resume.pdf"]
                                      ],
                                      [
                                          ['text' => 'Follow on GitHub', 'url' => "https://github.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => "Visit official site", 'url' => "https://danispringer.github.io/"]
                                      ],
                                      [
                                          ['text' => 'Search for Dani on Google', 'url' => "https://www.google.com/search?q=dani+springer"]
                                      ],
                                      [
                                          ['text' => 'Search for Dani on Google Images', 'url' => "http://www.google.com/images?q=dani+springer"]
                                      ],
                                      [
                                          ['text' => "Dani's Profile picture", 'url' => "https://danispringer.github.io/i/dani-springer-tiny.jpg"]
                                      ],
                                      [
                                          ['text' => 'Donate', 'url' => "https://www.gofundme.com/help-me-bring-you-more-great-music"]
                                      ]
                                  ]
                              ];

$keyboard_full_list = ['inline_keyboard' => [
                                      [
                                          ['text' => 'Listen on YouTube', 'url' => "https://youtube.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Follow on Twitter', 'url' => "https://twitter.com/imDaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Follow on Facebook', 'url' => "https://www.facebook.com/imDaniSpringer/"]
                                      ],
                                      [
                                          ['text' => 'Follow Dani on Instagram', 'url' => "https://www.instagram.com/imdanispringer/"]
                                      ],
                                      [
                                          ['text' => 'Connect on LinkedIn', 'url' => "https://www.linkedin.com/in/danispringer/"]
                                      ],
                                      [
                                          ['text' => "See Dani's Resume", 'url' => "https://danispringer.github.io/Dani-Springer-Resume.pdf"]
                                      ],
                                      [
                                          ['text' => 'Follow on GitHub', 'url' => "https://github.com/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Preview on MostlyMusic', 'url' => "https://mostlymusic.com/collections/vendors?q=Dani%20Springer"]
                                      ],
                                      [
                                          ['text' => 'Preview on SoundCloud', 'url' => "https://soundcloud.com/danispringer"]
                                      ],
                                      [
                                          ['text' => "Visit official site", 'url' => "https://danispringer.github.io/"]
                                      ],
                                      [
                                          ['text' => 'Buy on Play Store', 'url' => "https://play.google.com/store/music/artist/Dani_Springer?id=Azs4pemwjhdjeg3czesvzojv4au"]
                                      ],
                                      [
                                          ['text' => 'Buy on iTunes', 'url' => "https://itunes.apple.com/us/artist/dani-springer/id1101532290"]
                                      ],
                                      [
                                          ['text' => 'Follow on Apple Music', 'url' => "https://itunes.apple.com/us/artist/dani-springer/1101532290"]
                                      ],
                                      [
                                          ['text' => 'Buy on Amazon', 'url' => "https://www.amazon.com/s/ref=ntt_srch_drd_B01EE9QVCS?ie=UTF8&field-keywords=Dani%20Springer&index=digital-music&search-type=ss"]
                                      ],
                                      [
                                          ['text' => 'Buy on CD Baby', 'url' => "https://store.cdbaby.com/Artist/DaniSpringer"]
                                      ],
                                      [
                                          ['text' => 'Follow on Spotify', 'url' => "https://play.spotify.com/artist/6wp28GMW9iypStW4pCsCN9"]
                                      ],
                                      [
                                          ['text' => 'Buy on Yandex', 'url' => "https://music.yandex.ua/artist/4345578"]
                                      ],
                                      [
                                          ['text' => 'Buy on Tidal', 'url' => "http://tidal.com/us/store/artist/7732967"]
                                      ],
                                      [
                                          ['text' => 'Listen on Shazam', 'url' => "https://www.shazam.com/gb/artist/202646271/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Listen on Slacker Radio', 'url' => "http://www.slacker.com/artist/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Listen on KKBOX', 'url' => "https://www.kkbox.com/jp/ja/artist/kMofOQIp1IH1JO0F0V7.m08K-index-1.html"]
                                      ],
                                      [
                                          ['text' => 'Listen on Napster', 'url' => "https://us.napster.com/artist/dani-springer"]
                                      ],
                                      [
                                          ['text' => 'Listen on iHeart Radio', 'url' => "https://www.iheart.com/artist/dani-springer-31186894/"]
                                      ],
                                      [
                                          ['text' => 'Listen on Anghami', 'url' => "https://www.anghami.com/artist/2541446"]
                                      ],
                                      [
                                          ['text' => 'Search for Dani on Google', 'url' => "https://www.google.com/search?q=dani+springer"]
                                      ],
                                      [
                                          ['text' => 'Search for Dani on Google Images', 'url' => "http://www.google.com/images?q=dani+springer"]
                                      ],
                                      [
                                          ['text' => "Dani's Profile picture", 'url' => "https://danispringer.github.io/i/dani-springer-tiny.jpg"]
                                      ],
                                      [
                                          ['text' => 'Donate', 'url' => "https://www.gofundme.com/help-me-bring-you-more-great-music"]
                                      ]
                                  ]
                              ];

$keyboard = "";
$message = "Hello!";
$help_message = "Type any of these to get a specific list:\nmusic\nsocial\nabout\nall\n\nNeed help? Chat directly with @DaniSpringer!";

if(strpos($text, "/start") === 0 || $text=="/list" || $text=="list")
{
    $keyboard = $keyboard_full_list;
    $message = "Hey $firstname! Here are all of Dani's links!\n\n$help_message";
}
elseif($text=="/music" || $text=="music")
{
    $keyboard = $keyboard_music;
    $message = "OK, $firstname: Here are Dani's music links!\n\n$help_message";
}
elseif ($text=="/social" || $text=="social")
{
    $keyboard = $keyboard_social;
    $message = "OK, $firstname: Here are Dani's social media links!\n\n$help_message";
}
elseif ($text=="/about" || $text=="about")
{
    $keyboard = $keyboard_about;
    $message = "OK, $firstname: Here is more info for Dani Springer!\n\n$help_message";
}
elseif ($text=="/all" || $text=="all")
{
    $keyboard = $keyboard_full_list;
    $message = "OK, $firstname: Here are all of Dani's links!\n\n$help_message";
}
else
{
    $keyboard = $keyboard_full_list;
    $message = "Sorry $firstname, I'm not sure what '$text' means, but you can ask @DaniSpringer to teach me that!\n\n$help_message";
}



$parameters = array('chat_id' => $chatId, 'text' => "$message");

$parameters["method"] = "sendMessage";

$parameters["reply_markup"] = json_encode($keyboard, true);

echo json_encode($parameters);