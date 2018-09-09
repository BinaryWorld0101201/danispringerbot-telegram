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

$links = array(
    'youtube' => array(
        'desc' => "YouTube",
        'url' => "https://www.youtube.com/watch?v=UEdtdy0o_7k"
    ),
    'spotify' => array(
        'desc' => "Spotify",
        'url' => "https://open.spotify.com/album/7r5clZHotdzDI0wPbR98rT"
    ),
    'play_store' => array(
        'desc' => "Play Store",
        'url' => "https://play.google.com/store/music/album/Dani_Springer_On_a_Dreaming_Star_2018?id=Biticlrjnzrgbsggzt3ddhs3eqy"
    ),
    'itunes' => array(
        'desc' => "iTunes",
        'url' => "https://itunes.apple.com/us/album/on-a-dreaming-star-2018/1411551332"
    ),
    'apple_music' => array(
        'desc' => "Apple Music",
        'url' => "https://itunes.apple.com/us/album/on-a-dreaming-star-2018/1411551332"
    ),
    'amazon' => array(
        'desc' => "Amazon",
        'url' => "https://www.amazon.com/Dreaming-Star-2018-Dani-Springer/dp/B07FK7BN3S/ref=sr_1_1?s=dmusic&ie=UTF8&qid=1534080071&sr=1-1-mp3-albums-bar-strip-0&keywords=Dani+Springer"
    ),
    'cd_baby' => array(
        'desc' => "CD Baby",
        'url' => "https://store.cdbaby.com/cd/danispringer13"
    ),
    'yandex' => array(
        'desc' => "Yandex",
        'url' => "https://music.yandex.ua/album/5558910"
    ),
    'tidal' => array(
        'desc' => "Tidal",
        'url' => "http://tidal.com/it/store/album/91936063"
    ),
    'deezer' => array(
        'desc' => "Deezer",
        'url' => "https://www.deezer.com/us/album/68272011"
    ),
    'shazam' => array(
        'desc' => "Shazam",
        'url' => "https://www.shazam.com/track/431272199/on-a-dreaming-star-2018"
    ),
    'slacker_radio' => array(
        'desc' => "Slacker",
        'url' => "http://www.slacker.com/artist/dani-springer"
    ),
    'kkbox' => array(
        'desc' => "KKBOX",
        'url' => "https://www.kkbox.com/jp/ja/album/OPFthAaDIKwKY0F2Di0w009H-index.html"
    ),
    'napster' => array(
        'desc' => "Napster",
        'url' => "https://us.napster.com/artist/dani-springer/album/good-morning"
    ),
    'iheart_radio' => array(
        'desc' => "iHeart",
        'url' => "https://www.iheart.com/artist/dani-springer-31186894/albums/good-morning-56807642/"
    ),
    'anghami' => array(
        'desc' => "Anghami",
        'url' => "https://play.anghami.com/song/38690686"
    ),
    'saavn' => array(
        'desc' => "Saavn",
        'url' => "https://www.saavn.com/s/artist/dani-springer-albums/M0XBl2X3Tqo_"
    ),
    'linkedin' => array(
        'desc' => "LinkedIn",
        'url' => "https://www.linkedin.com/in/danispringer/"
    ),
    'resume' => array(
        'desc' => "Resume",
        'url' => "https://danispringer.github.io/Dani-Springer-Resume.pdf"
    ),
    'github' => array(
        'desc' => "GitHub",
        'url' => "https://github.com/danispringer"
    ),
    'site' => array(
        'desc' => "Blog",
        'url' => "https://danispringer.github.io/"
    ),
    'google' => array(
        'desc' => "Google",
        'url' => "https://www.google.com/search?q=dani+springer"
    ),
    'ios' => array(
        'desc' => "iOS Degree",
        'url' => "https://danispringer.github.io/Dani-Springer-Udacity-iOSND.pdf"
    ),
    'app_store' => array(
        'desc' => "My Apps",
        'url' => "https://itunes.apple.com/us/developer/daniel-springer/id1402417666?mt=8"
    ),
    'logo' => array(
        'desc' => "Picture",
        'url' => "https://danispringer.github.io/i/z-telegram.jpg"
    )
);

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
        ['text' => $links["youtube"]["desc"], 'url' => $links["youtube"]["url"]],
        ['text' => $links["spotify"]["desc"], 'url' => $links["spotify"]["url"]]
    ],
    [
        ['text' => $links["itunes"]["desc"], 'url' => $links["itunes"]["url"]],
        ['text' => $links["apple_music"]["desc"], 'url' => $links["apple_music"]["url"]]
    ],
    [
        ['text' => $links["play_store"]["desc"], 'url' => $links["play_store"]["url"]]
    ],
    [
        ['text' => $links["amazon"]["desc"], 'url' => $links["amazon"]["url"]],
        ['text' => $links["cd_baby"]["desc"], 'url' => $links["cd_baby"]["url"]]
    ],
    [
        ['text' => $links["yandex"]["desc"], 'url' => $links["yandex"]["url"]]
    ],
    [
        ['text' => $links["tidal"]["desc"], 'url' => $links["tidal"]["url"]],
        ['text' => $links["deezer"]["desc"], 'url' => $links["deezer"]["url"]]
    ],
    [
        ['text' => $links["shazam"]["desc"], 'url' => $links["shazam"]["url"]],
        ['text' => $links["slacker_radio"]["desc"], 'url' => $links["slacker_radio"]["url"]]
    ],
    [
        ['text' => $links["kkbox"]["desc"], 'url' => $links["kkbox"]["url"]],
        ['text' => $links["napster"]["desc"], 'url' => $links["napster"]["url"]]
    ],
    [
        ['text' => $links["iheart_radio"]["desc"], 'url' => $links["iheart_radio"]["url"]],
        ['text' => $links["anghami"]["desc"], 'url' => $links["anghami"]["url"]]
    ],
    [
        ['text' => $links["saavn"]["desc"], 'url' => $links["saavn"]["url"]]
    ]
  ]
];

$keyboard_social = ['inline_keyboard' => [
    [
        ['text' => $links["linkedin"]["desc"], 'url' => $links["linkedin"]["url"]]
    ],
    [
        ['text' => $links["youtube"]["desc"], 'url' => $links["youtube"]["url"]]
    ]
  ]
];

$keyboard_about = ['inline_keyboard' => [
    [
        ['text' => $links["app_store"]["desc"], 'url' => $links["app_store"]["url"]]
    ],
    [
        ['text' => $links["linkedin"]["desc"], 'url' => $links["linkedin"]["url"]],
        ['text' => $links["resume"]["desc"], 'url' => $links["resume"]["url"]]
    ],
    [
        ['text' => $links["ios"]["desc"], 'url' => $links["ios"]["url"]],
        ['text' => $links["logo"]["desc"], 'url' => $links["logo"]["url"]]
    ],
    [
        ['text' => $links["github"]["desc"], 'url' => $links["github"]["url"]],
        ['text' => $links["site"]["desc"], 'url' => $links["site"]["url"]]
    ],
    [
        ['text' => $links["google"]["desc"], 'url' => $links["google"]["url"]]
    ]
  ]
];

$keyboard_full_list = ['inline_keyboard' => [
    [
        ['text' => $links["app_store"]["desc"], 'url' => $links["app_store"]["url"]]
    ],
    [
        ['text' => $links["ios"]["desc"], 'url' => $links["ios"]["url"]],
        ['text' => $links["logo"]["desc"], 'url' => $links["logo"]["url"]]
    ],
    [
        ['text' => $links["github"]["desc"], 'url' => $links["github"]["url"]]
    ],
    [
        ['text' => $links["linkedin"]["desc"], 'url' => $links["linkedin"]["url"]],
        ['text' => $links["resume"]["desc"], 'url' => $links["resume"]["url"]]
    ],
    [
        ['text' => $links["youtube"]["desc"], 'url' => $links["youtube"]["url"]]
    ],
    [
        ['text' => $links["play_store"]["desc"], 'url' => $links["play_store"]["url"]]
    ],
    [
        ['text' => $links["spotify"]["desc"], 'url' => $links["spotify"]["url"]],
        ['text' => $links["site"]["desc"], 'url' => $links["site"]["url"]]
    ],
    [
        ['text' => $links["itunes"]["desc"], 'url' => $links["itunes"]["url"]],
        ['text' => $links["apple_music"]["desc"], 'url' => $links["apple_music"]["url"]]
    ],
    [
        ['text' => $links["amazon"]["desc"], 'url' => $links["amazon"]["url"]],
        ['text' => $links["cd_baby"]["desc"], 'url' => $links["cd_baby"]["url"]]
    ],
    [
        ['text' => $links["yandex"]["desc"], 'url' => $links["yandex"]["url"]],
        ['text' => $links["tidal"]["desc"], 'url' => $links["tidal"]["url"]]
    ],
    [
        ['text' => $links["deezer"]["desc"], 'url' => $links["deezer"]["url"]],
        ['text' => $links["shazam"]["desc"], 'url' => $links["shazam"]["url"]]
    ],
    [
        ['text' => $links["slacker_radio"]["desc"], 'url' => $links["slacker_radio"]["url"]],
        ['text' => $links["kkbox"]["desc"], 'url' => $links["kkbox"]["url"]]
    ],
    [
        ['text' => $links["napster"]["desc"], 'url' => $links["napster"]["url"]],
        ['text' => $links["iheart_radio"]["desc"], 'url' => $links["iheart_radio"]["url"]]
    ],
    [
        ['text' => $links["anghami"]["desc"], 'url' => $links["anghami"]["url"]],
        ['text' => $links["saavn"]["desc"], 'url' => $links["saavn"]["url"]]
    ],
    [
        ['text' => $links["google"]["desc"], 'url' => $links["google"]["url"]]
    ]
  ]
];

$keyboard = "";
$reply = "Hello!";
$help_message = "Type any of the commands below. ↙️\n\nmusic\nsocial\nabout\nall\n\nNeed help? Chat directly with @DaniSpringer!";

$ok_messages = array(
    0 => "OK",
    1 => "Alright",
    2 => "Sure",
    3 => "Alrighty",
    4 => "Okay",
    5 => "I got you"
);
$rand_ok = $ok_messages[array_rand($ok_messages)];

$hi_messages = array(
    0 => "Hi",
    1 => "Hello",
    2 => "Ahoy",
    3 => "Hey",
    4 => "What's up",
    5 => "Greetings"
);
$rand_hi = $hi_messages[array_rand($hi_messages)];

$sorry_messages = array(
    0 => "🤔 Sorry $firstname, I'm not sure what '$text' means, but you can ask @DaniSpringer to teach me that! 😏",
    1 => "I don't know what '$text' means. Sorry about that, $firstname. You can ask @DaniSpringer to teach me that. 😅",
    2 => "😕 What does '$text' mean, $firstname? I might need @DaniSpringer to translate that for me. 😆",
    3 => "😔 Hey, I'm just a bot $firstname. I don't know what '$text' means. But if you think I should, please ask @DaniSpringer to help me out. 🙏",
    4 => "🤖 Bzzz.... Me no comprendo... Please leave a message after the Bzzz... (or ask @DaniSpringer to teach me what '$text' means). 🙃",
    5 => "🤔 Huh? I didn't get that, $firstname. Please ask @DaniSpringer to explain to me what '$text' means. 👍"
);
$rand_sorry = $sorry_messages[array_rand($sorry_messages)];

if(strpos($text, "/start") === 0 || (strpos($text, 'start') !== false) || (strpos($text, 'hi') !== false) || (strpos($text, 'hey') !== false) || (strpos($text, 'hello') !== false) || (strpos($text, '👋') !== false)  || (strpos($text, "what's up") !== false))
{
    //$keyboard = $keyboard_full_list;
    $reply = "👋😊 $rand_hi $firstname!\n\n$help_message";
    $parameters = array('chat_id' => $chatId, 'text' => "$reply");
    $parameters["method"] = "sendMessage";
    $parameters["parse_mode"] = "markdown";
    echo json_encode($parameters);
}
elseif(!isset($message['text']))
{
    // received something other than text
    $reply = "😕 Sorry $firstname, I only understand *text* messages for now.\n\n$help_message";
    $parameters = array('chat_id' => $chatId, 'text' => "$reply");
    $parameters["method"] = "sendMessage";
    $parameters["parse_mode"] = "markdown";
    echo json_encode($parameters);
}
elseif((strpos($text, 'music') !== false))
{
    $keyboard = $keyboard_music;
    $reply = "🎵 $rand_ok, $firstname: Here are Dani's *music* links!\n\n$help_message";
}
elseif ((strpos($text, 'social') !== false))
{
    $keyboard = $keyboard_social;
    $reply = "📸 $rand_ok, $firstname: Here are Dani's *social* media links!\n\n$help_message";
}
elseif ((strpos($text, 'about') !== false))
{
    $keyboard = $keyboard_about;
    $reply = "🔍 $rand_ok, $firstname: Here is more info *about* Dani Springer!\n\n$help_message";
}
elseif ((strpos($text, 'all') !== false))
{
    $keyboard = $keyboard_full_list;
    $reply = "📄 $rand_ok, $firstname: Here are *all* of Dani's links!\n\n$help_message";
}
else
{
    //$keyboard = $keyboard_full_list;
    $reply = "$rand_sorry\n\n$help_message";
    $parameters = array('chat_id' => $chatId, 'text' => "$reply");
    $parameters["method"] = "sendMessage";
    $parameters["parse_mode"] = "markdown";
    echo json_encode($parameters);
}



$parameters = array('chat_id' => $chatId, 'text' => "$reply");

$parameters["method"] = "sendMessage";
$parameters["parse_mode"] = "markdown";

$parameters["reply_markup"] = json_encode($keyboard, true);

echo json_encode($parameters);