<?php
/*
Для вас старались - BY-13327.RU
*/

// Какбэ ООП юзаем, делаем вид, что его знаем и вообще мы гуру
	
	include "simple_html_dom.php"; 
	include "class.php";
	require "Wallhaven.php"; 
	require "ask.php"; 
	define ("version", "5.27");
	define ("wersion", "4.0");
	define ("access_token", "5a370ef4596e910d52f7d98e7ba680fe9788631bcc49810d4dd0158d4bb355458e726c630167a9300372d");
	
	$mysqli = new mysqli("localhost", "h88776_bigvk", "wasabi86", "h88776_bigvk") or die("Error"); 
	$mysqli->query("SET NAMES 'utf8'");
	$post = array();
	$tokens = array();
	$result_set = $mysqli->query("SELECT * FROM `users`");
	while (($row = $result_set->fetch_assoc()) != false) {
		$tokens[] = $row ["token"];
		$posts[] = $row ["post"];
	}
	
				
				$message = "";
				$attachment = "";

				$post = explode("_", "229202190_2978");
							
				$wallgetComments = api("wall.getComments", "v=" . version . "&owner_id=" . $post [0] . "&post_id=" . $post [1] . "&count=1&sort=desc&access_token=" . access_token);
				$from_id = $wallgetComments ["response"] ["items"] [0] ["from_id"];
				
				$str = strtolower($wallgetComments ["response"] ["items"] [0] ["text"]);
				$str = trim($str);
				$str = strtr($str, array("!" => "", "&" => "", "?" => "", "." => "", "&#46;" => "", "/" => ""));
				
				$comment = str_replace("[id263930472|Феликс], ", "", $str); 
				
				$comment = mb_strtolower($str, "UTF-8");
				$ecomment = explode(" ", $comment);
				
				$comment_id = $wallgetComments ["response"] ["items"] [0] ["id"];
				$bot_info = api("users.get", "&access_token=" . access_token);
				$offset = mt_rand(1, 200);
				
				$comment1 = preg_replace("/^(\S+)\s+/","", $comment);
				
				if ($bot_info["response"][0]["uid"] != $from_id) {
				
					$result_set = $mysqli->query("SELECT * FROM `instruction`");
					while (($row = $result_set->fetch_assoc()) != false) {
						if ($row ["uid"] == $from_id) {
							$status = true;
							break;
						}
					}
					if (!$status) {
						$mysqli->query("INSERT INTO `instruction` (`uid`) VALUES ('" . $from_id . "')");
					}
				
					$result_set = $mysqli->query("SELECT * FROM `balance`");
					while (($row = $result_set->fetch_assoc()) != false) {
						if ($row ["uid"] == $from_id) {
							
							$status = true;
							$balance = $row ["balance"];
							$count = $row ["count"];
							break;
						}
					}
					if (!$status) {
						$mysqli->query("INSERT INTO  `balance` (  `uid` ,  `balance` ,  `count` ) VALUES ( '" . $from_id . "', 100, 0 )");
					}
					
					if (preg_match("/полный список команд/", $comment)) {
						$message = "➖➖Удовольствие➖➖ 
									🌁Анимация
									✉Анонимно [ID] [сообщение]
									💥Башорг
									📺Видео
									💳Визитка 
									🌄Глитч
									⏰Датаметр
									👩Девушка
									🗾Демотиватор
									❔Задай вопрос [аск]
									🎱Инфа [фраза] 
									📓История
									😸Котик
									🔞Мат
									🌊Обои
									🐔Омич 
									🌃Пикча
									🎵Плейлист
									💬Повтори [фраза]
									🎴Портрет
									🎮Рандомная игра 
									💬Совет 
									🎹Трек
									📟Фильм 
									🏯Фотоколлаж
									📜Цитата 
									😂Юмор 

									➖➖Справка➖➖ 
									🔄Аптайм
									💵Баланс
									❓Бот тут?
									⌚Время
									❓Как дела?
									📑Полный список команд";
						api("wall.addComment", "owner_id=" . $post [0] . "&post_id=" . $post [1] . "&text=" . urlencode($message) . "&reply_to_comment=" . $comment_id . "&access_token=" . access_token);
						$message = "Поиск
									📺Видео [искомое слово]
									📙Википедия [искомое слово]
									🌄Пикча [искомое слово]

									➖➖Потребность➖➖ 
									✏Генератор ника/пароля количество символов
									⛎Гороскоп [зодиак]
									📆Дата регистрации
									➗Калькулятор [пример]
									💴Курс валют
									📚Мудрое высказывание
									📑Новости
									🎅Отсчеты
									🇰Переведи [фраза]
									🔆Погода [Х]
									🔅Погода мне
									🎂Праздники
									📈Cтатистика [группа]
									📋Факт
									
									➖➖Потеха➖➖
									🎰Билет
									🌇Города
									❓Загадка
									👦Чья ава";
					}
					
					elseif (preg_match("/глитч/", $comment)) {
						$user_id = $friendsget ["response"] ["items"] [rand(0, $count)];
						$usersget = api("users.get", "fields=photo_max_orig&user_ids=" . $from_id . "&access_token=" . access_token);
						$photo_max_orig = $usersget ["response"] [0] ["photo_max_orig"];
						download($photo_max_orig, false, false);
						for ($i = 0; $i < 6; $i++) {
							$url = "image.png";
							$img_size = getimagesize($url); 
							$img = imagecreatefromjpeg($url);
							$x_y = imagesx($img);
							
							$new_img = @imagecreatetruecolor($x_y, $x_y);
							$end = rand(3, 6);
							for ($i = 0; $i < $end; $i++) {
								imagecopy($new_img, $img, 0, 0, 0, 0, $x_y, $x_y);
								$k = rand(0, 2);
								switch ($k) {
									case 0:
										imagefilter($new_img, IMG_FILTER_COLORIZE, rand(1, 5), rand(50, 160), rand(50, 160));
										break;
								case 1:
										imagefilter($new_img, IMG_FILTER_NEGATE);
										break;
								}
								$x = 0;
								$y = rand(0, imagesy($img));
								$height = rand(10, min(imagesy($img) - $y + 10, imagesy($img)/4)); 
								imagecopy($img, $new_img, $x + rand(0, 1) ? 0 : rand(-10, 10), $y, $x + rand(0, 1) ? 0 : rand(-5, 5), $y, $x_y, $height); 
							}
							$name = "image.png"; 
							imagejpeg($img, $name);
							imagedestroy($img); 
							imagedestroy($new_img);
						}
						$attachment = download(false, true, 208012521);
					}
					
					elseif (preg_match("/чья ава/", $comment)) {
						$result_set = $mysqli->query("SELECT * FROM `instruction`");
						while (($row = $result_set->fetch_assoc()) != false) {
							if ($row ["uid"] == $from_id) {
								$ava = $row ["ava"];
								break;
							}
						}
						if (!$ava) {
							$message = "Правила и смысл игры в том, что бот рандомно выбирает аватарка пользователя из вашего списка друзей и Вам остаётся лишь найти его в своём списке друзей и написать:  Ответ ава [идентификатор игры] [идентификатор пользователя]. 
							Пример: Ответ ава 3 76437494. Если Вы указали идентификатор пользователя верно, то на Ваш виртуальный счёт будет начислено 20 баллов. Для начала игры напиши ещё раз <<Чья ава>>";
							$mysqli->query("UPDATE `instruction` SET `ava` = 1 WHERE `uid` = '" . $from_id . "'");
						}
						else {
							$friendsget = api("friends.get", "user_id=" . $from_id . "&v=" . version . "&access_token=" . access_token);
							$count = $friendsget ["response"] ["count"];
							if (!$count) {
								$message = "У Вас отсутствуют друзья. Проверьте параметры приватности или найдите себе друзей.";
							}
							elseif ($count < 5) {
								$message = "У Вас менее 5-ти друзей. Найдите себе больше друзей, лол.";
							}
							else {
								$user_id = $friendsget ["response"] ["items"] [rand(0, $count)];
								$usersget = api("users.get", "fields=photo_max_orig&user_ids=" . $user_id . "&access_token=" . access_token);
								$photo_max_orig = $usersget ["response"] [0] ["photo_max_orig"];
								if ($photo_max_orig) {
									$mysqli->query("INSERT INTO `ava` (`uid`) VALUES ('" . $user_id . "')");
									$result_set = $mysqli->query("SELECT * FROM `ava` WHERE `uid` = " . $user_id . "");
									$row = $result_set->fetch_assoc();
									$message = "Идентификатор игры: " . $row ["id"];
									$attachment = download($photo_max_orig, true, 208728988);
								}
								else {
									$message = "Во время получения аватарки произошла ошибка.";
								}
							}
						}
					}
					
					elseif (preg_match("/праздники/", $comment)) {
						$message = "➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
								📅" . date("m.d.y") . " " . file_get_html("http://kakoysegodnyaprazdnik.ru/")->find("span", 2)->plaintext . "
								📅" . date("m.d.y") . " " . file_get_html("http://kakoysegodnyaprazdnik.ru/")->find("span", 4)->plaintext . "
								📅" . date("m.d.y") . " " . file_get_html("http://kakoysegodnyaprazdnik.ru/")->find("span", 6)->plaintext . "
								📅" . date("m.d.y") . " " . file_get_html("http://kakoysegodnyaprazdnik.ru/")->find("span", 8)->plaintext . "
								➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖";
					}
					
					elseif (preg_match("/переведи/", $comment)) {
						if (!$comment1) {
							$message = "⚠Для перевода текста необходимо указать фразу. \n ℹНапример: <<переведи привет>> или <<переведи hello>>";
						}
						else {
							$ya = curl("https://translate.yandex.net/api/v1.5/tr.json/detect?key=trnsl.1.1.20140907T175159Z.beaccc6c434f23cd.f3831615afdf639fdfa4c1d5b84ca2bc7834b328&text=" . urlencode($comment1));
							$json = json_decode($ya, true);
							$ru = $json ["lang"];
							if ($ru == "ru") {
								$lang = "en";
							}
							else {
								$lang = "ru";
							}
							$ya = curl("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20140907T175159Z.beaccc6c434f23cd.f3831615afdf639fdfa4c1d5b84ca2bc7834b328&text=" . urlencode($comment1) . "&lang=" . $ru . "-" . $lang);
							$json = json_decode($ya, 1);
							$text = $json ["text"] [0];
							if ($comment1 == $text) {
								$message = "⛔При переводе текста произошла ошибка";
							}
							else {
								$message = "🇷🇺Перевод: <<" . $text . ">>🇷🇺";
							}
						} 
					}
					
					elseif (preg_match("/совет/", $comment)) {
						$json = json_decode(curl("http://fucking-great-advice.ru/api/random"), true);
						$message = htmlspecialchars_decode($json ["text"]);
					} 
					
					elseif (preg_match("/калькулятор/", $comment)) {
						if (!$comment1 || !preg_match("#^[0-9+*/-]+$#i", $comment1)) {
							$message = "Мсье, вы забыли написать пример для решения";
						}
						else {
							$message = eval("return ($comment1);");
						}
					} 
					
					elseif (preg_match("/дата регистрации/", $comment)) {
						if (preg_match('/<ya:created dc:date="([\\d]{4}-[\\d]{2}-[\\d]{2}T[\\d]{2}:[\\d]{2}:[\\d]{2}\\+[\\d]{2}:[\\d]{2})"/i', file_get_contents('http://vk.com/foaf.php?id=' . $from_id), $хуйня)) { 
						}
						$str = explode("T", $хуйня[1]);
						$cast = explode("-", $str[0]);
						$message =  "➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
						📅Дата: " . $cast[2] . " " . str_replace(array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'), array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'), $cast[1]) . " " . $cast[0] . "
						⌚Время: " . preg_replace('/\s+/', ' ', str_replace(array('+03:00'), ' ', trim(trim($str[1])))) . "
						⏳На сайте уже: " . ((int)((mktime (0,0,0,$cast[1],$cast[2],$cast[0]) - time(void))/86400) * -1 ) . " дней\n➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖";
					} 
					
					elseif (preg_match("/гороскоп/", $comment)) {
						$get = simplexml_load_string(file_get_contents('http://img.ignio.com/r/daily/index.xml'));
						if (!$comment1) {
							$message = "⚠Для получения гороскопа укажите знак зодиака \n ℹНапример: <<Гороскоп рыбы>>";
						}
						else {
							switch ($comment1) {
								case "овен":
									$sym = 'aries';
									break;
								case "лев":
									$sym = 'leo';
									break;
								case "стрелец":
								   $sym = 'sagittarius';
								   break;
								case "козерог":
									$sym = 'capricorn';
									break;
								case "близнецы":
									$sym = 'gemini';
									break;
								case "весы":
									$sym = 'libra';
									break;
								case "водолей":
									$sym = 'aquarius';
									break;
								case "рак":
									$sym = 'cancer';
									break;
								case "скорпион":
									$sym = 'scorpio';
									break;
								case "рыбы":
									$sym = 'pisces';
									break;
								case "телец":
									$sym = 'taurus';
									break;
								case "дева":
									$sym = 'virgo';
									break;
							}
							if ($sym) {
								$message = $get->$sym->today;
							}
							else {
								$message = "Чот хуевый гороскоп у тебя";
							}
						}
					} 
					
					elseif (preg_match("/генератор/", $comment)) {
						$length = $комментарий[2];
						if (is_numeric($length) == true) {
							if ($length > 32) {
								$length = 32;
							}
						} 
						else {
							$length = rand(6, 32);
						}
						if (preg_match("/пароля/", $comment)) {
							$return = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","V","X","Y","Z","1","2","3","4","5","6","7","8","9","0",".",",","(",")","[","]","!","?","&","^","%","@","*","$","<",">","/","|","+","-","{","}","`","~");
							for ($i = 0; $i < $length; $i++) {
								$index = rand(0, count($return) - 1);
								$password .= $return [$index];
							}
							$message = "✒Ваш пароль: " . $password . "✒";
						}
						if (preg_match("/ника/", $comment)) {
							$char = array('aeiouy', 'bcdfghjklmnpqrstvwxz');
							$return = array();
							foreach ($char as $k => $v)
							$char[$k] = str_split($v);
							for ($i = 0; $i < $length; $i++) {
								while (true) {
									$symbol_x = mt_rand(0, sizeof($char) - 1);
									$symbol_y = mt_rand(0, sizeof($char [$symbol_x]) - 1);
									if ($i > 0 && in_array($return[$i - 1], $char [$symbol_x])) {
										continue;
									}
									$return[] = $char [$symbol_x] [$symbol_y];
									break;
								}
							}
							$message = "✏Ваш ник: " . ucfirst(implode('', $return)) . "✏";
						}
					}
					
					elseif (preg_match("/информация/", $comment)) {
						$message = "💽Версия скрипта: " . wersion . "
						📄Версия разговорных слов: 3.2
						🔧Вся информация об изменениях @updbot (здесь)
						📃Для просмотра списка команд: <<Полный список команд>> 
						❔Хочешь бот? Заходи на валбот.рф!
						&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;Wallbot © 2015
						&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;@id224396964 (Валентин Третьяков)";
					}
					
					elseif (preg_match("/юмор/", $comment)) {
						$message = strip_tags(file_get_contents("http://bohdash.com/random/joke/random.php"));
					}	
					
					elseif (preg_match("/бот тут/", $comment)) {
						$mesage = random(array("Безусловно", "Естественно", "Без всякого сомнения", "Вне всякого сомнения", "Понятная вещь", "Да", "Не иначе", "А как же", "Что за вопрос", "Ясное дело", "Таки да", "Несомненно", "Разумеется", "Ага", "Не подлежит сомнению", "Иначе и быть не может", "Еще бы", "Спрашиваешь", "О чем парле!", "В натуре", "Еще бы нет")); 
					}
					
					elseif (preg_match("/рандомная игра/", $comment)) {
						$message = "Советую поиграть в " . random(array('Survarium', 'Metro Redux', 'Far Cry 3', 'BioShock Infinite', 'Black Mesa', 'Wolfenstein: The New Order', 'Dishonored', 'Mass Effect 3', 'BioShock Infinite: Burial at Sea', 'PayDay 2', 'Brothers: A Tale of Two Sons', 'MechWarrior Online', 'Metro: Last Light', 'Mass Effect 3', 'Max Payne 3', 'Assassins Creed IV: Black Flag', 'Haunted Memories', 'Dynasty Warriors 8: Xtreme Legends', 'Metal Gear Rising: Revengeance', 'Borderlands 2', 'Dishonored', 'Tomb Raider 2013', 'Prototype 2', 'Tom Clancys Splinter Cell: Blacklist', 'Space Engineers', 'Cry Of Fear', 'Darksiders 2', 'Age of Pirates: Captain Blood', 'Transistor', 'Spec Ops: The Line', 'Battlefield 3', 'Slender: The Arrival', 'Binary Domain', 'Hitman: Absolution', 'Resident Evil 4 Ultimate HD Edition', 'Sleeping Dogs', 'Castlevania: Lords of Shadow 2', 'Nexuiz', 'Resident Evil: Revelations', 'DayZ', 'DayZ Standalone', 'Resident Evil 6', 'Ravens Cry', 'Goat Simulator', 'Saints Row IV', 'Dont Starve', 'DmC: Devil May Cry', 'Natural Selection 2', 'Far Cry 3: Blood Dragon', 'Robocraft', 'Chivalry: Medieval Warfare', 'Titanfall', 'Arma III', 'LEGO Marvel Super Heroes', 'Outlast: Whistleblower', 'Outlast', 'Lone Survivor', 'Shadow Warrior', 'Thief', 'Bedlam', 'Call of Juarez: Gunslinger', 'State of Decay', 'Assassins Creed 3', 'War of the Vikings', 'PlanetSide 2', 'Tribes: Ascend', 'Blades of Time', 'Dead Space 3', 'Grey', 'Warframe', 'I Am Alive', 'Overgrowth', 'Sacrilegium', 'Batman: Arkham Origins', 'Among the Sleep', 'Divinity: Dragon Commander', 'Inversion', 'Iron Front: Liberation 1944', 'DreadOut', 'Dont Starve: Reign of Giants', 'Shelter', 'Afterfall: InSanity Extended Edition', 'Signal Ops', 'Rising Storm', 'Primal Carnage', 'Deadpool', 'Sniper Elite V2', 'Murdered: Soul Suspect', 'Crysis 3', 'Assassins Creed IV: Black Flag', 'Plants vs. Zombies: Garden Warfare', 'Far Cry 3: Deluxe Bundle DLC', 'Skylanders Giants', 'Call of Duty: Black Ops 2', 'Killer Is Dead: Nightmare Edition', 'War of the Roses', 'Alan Wake American Nightmare', 'Sniper: Ghost Warrior 2', 'Sanctum 2', 'Chivalry: Deadliest Warrior', 'Sleeping Dogs', 'CS: Global Offensive', 'Cloudbuilt', 'Remember Me', 'Guns of Icarus Online', 'Battlefield 4', 'Marlow Briggs and The Mask of Death', 'Sir You Are Being Hunted', 'Blacklight: Retribution', 'Strider 2014', 'Planet Explorers', 'ShootMania Storm', 'Magrunner: Dark Pulse', 'Betrayer', 'Sniper Elite: Nazi Zombie Army', 'Hawken', 'Shadow Warrior Classic Redux', 'Ace of Spades', 'Insurgency', 'Dead Island: Riptide', 'Brotherhood of Violence', '7 Days To Die', 'Sniper Elite III', 'Strike Suit Zero', 'Shadow Company: The Mercenary War', 'Black Fire', 'Lost Planet 3', 'Rise of the Triad 2013', 'Loadout', 'Watch Dogs', 'Nether', 'Smite', 'Assassins Creed: Liberation HD', 'Call of Duty: Modern Warfare 2', 'Call of Duty: Modern Warfare 3', 'Gettysburg: Armored Warfare', 'Special Forces: Team X', 'Line of Defense', 'Contagion', 'Eldritch', 'FarSky', 'Gotham City Impostors', 'Deadfall Adventures', 'Medal of Honor: Warfighter', 'Black Death', 'Forge', 'Enemy Front', 'Tactical Intervention', 'Refusion', 'Offensive Combat', 'Firefall', 'Rooks Keep', 'Call of Duty: Ghosts', 'AntiSquad', 'Alien Rage', 'God Mode', 'MIND: Path to Thalamus', 'Deep Black', 'Infestation: Survivor Stories', 'Infinity Runner', 'Disney Infinity', 'Ravensdale', 'State of Decay: Lifeline', 'Syndicate 2012', 'Haunted Memories Ep02: Welcome Home', 'Defiance 2013', 'Unturned', 'Titanfall: Expedition', 'Ravaged', 'Strike Vector', 'Blade Symphony', 'Scourge: Outbreak', 'Dungeonland', 'Doorways', 'World of Battleships', 'Archeblade', 'Retrovirus', 'Star Trek 2013', 'Zeno Clash 2', 'Grimlands', 'BloodBath', 'Epigenesis', 'Sniper Elite: Nazi Zombie Army 2', 'Battle for Freedom', 'Depth', 'Tribulation Knights', 'Heroes & Generals', 'Teenage Mutant Ninja Turtles: Out of the Shadows', 'Kingdoms Rise', 'Conquest: Hadrians Divide', 'Tribes Universe', 'Warsoup', 'Trinity Revolution', 'Adventurer', 'Tomes of Mephistopheles', 'Dark Meridian', 'Eternal Fate', 'StarForge', 'Deadly Walkers', 'Stone Wardens', 'Heavy Fire: Shattered Spear', 'Kromaia', 'Arcane Worlds', 'Skara: The Blade Remains', 'Recruits', 'Sanctum 2: The Last Stand', 'Windborne', 'Cosmochoria', 'Eldritch: Mountains of Madness', 'Ku: Shroud of the Morrigan', 'Iron Sea Defenders', 'Project Temporality', 'Iron Soul', 'Americas Army: Proving Grounds', 'Astebreed', 'Cloud Chamber', 'Dota 2', 'Grand Theft Auto 4', 'CS: Soruce', 'GTA: San Andreas SAMP', 'GTA: San Andreas MTA', 'The Walking Dead', 'Raven: Legacy of a Master Thief', 'Papers Please', 'Papo & Yo', 'The Crew', 'Need For Speed: Rivals', 'Lucius', 'Game of Thrones', 'Planets3', 'Miasmata', 'Grid 2', 'DiRT Showdown', 'Track Mania 2: Canyon', 'Test Drive', 'Test Drive 2', 'Rascal Rider', 'Next Car Game', 'Spintires', 'War Thunder', 'World of Tanks', 'World of Diving', 'ArcheAge', 'Gotham City Impostors')); 
					}
					
					elseif (preg_match("/билет/", $comment)) {
						$result_set = $mysqli->query("SELECT * FROM `instruction`");
						while (($row = $result_set->fetch_assoc()) != false) {
							if ($row ["uid"] == $from_id) {
								$ticket = $row ["ticket"];
								break;
							}
						}
						if (!$ticket) {
							$message = "🎮Приветствую тебя в игре <<Билет>>🎮  \n ℹКраткое описание: \n Мама дала тебе 100 рублей, один билет стоит 25 баллов, в случае выигрыша обратно получаешь 50 баллов, иначе -- ничего. В дальнейшем эти баллы можно будет обменять на всякие плюшки. Для начала игры еще раз напиши <<Билет>>";
							$mysqli->query("UPDATE `instruction` SET `ticket` = 1 WHERE `uid` = '" . $from_id . "'");
						}
						else {
							$ticket = rand(100000, 999999);
							$first = substr($ticket, 0, 3);
							$two = substr($ticket, 3, 6);
							$first = $first[0]+$first[1]+$first[2];
							$two = $two[0]+$two[1]+$two[2];
							if ($first == $two) {
								$balance += 25;
								$picture = "good.png";
							}
							else {
								$balance -= 25;
								$picture = "bad.png";
							}
							$dirname  = dirname(__FILE__); 
							$top   = imagecreatefrompng($dirname . "/" . $picture);
							$img   = $dirname . "/" . $picture;
							$size  = getimagesize($img);
							$image = imagecreatefrompng($img);
							if ($picture == "bad.png") {
								$color = imagecolorallocate($image, 255, 0, 0);
							} 
							else {
								$color = imagecolorallocate($image, 100, 255, 150);
							}
							imagecopyresampled($image, $top, 0, 0, 0, 0, $size[0], $size[1], $size[0], $size[1]);
							imagettftext($image, 50, 0, 115, 175, $color, "fonts/tahoma.ttf", $ticket);
							imagepng($image, "image.png"); 
							imagedestroy($image);
							$message = "💰Баланс: " . $balance;
							$attachment = download(false, true, 206594623);
							$mysqli->query("UPDATE `balance` SET `balance` = " . $balance . ", `count` = " . ($count+1) . " WHERE `uid` = '" . $from_id . "'");
						}
					}
					
					elseif (preg_match("/время1/", $comment)) {
						function data($timezone) {
							date_default_timezone_set($timezone);
							return explode(':', date("H:i:s"));
						}
						$Moscow = data('Europe/Moscow');
						$Kiev = data('Europe/Kiev');
						$Berlin = data('Europe/Berlin');
						$Paris = data('Europe/Paris');
						$London = data('Europe/London');
						$Tokyo = data('Asia/Tokyo');
						$Madrid = data('Europe/Madrid');
						$Rome = data('Europe/Rome');
						$New_York = data('America/New_York');
						$emojiTime = array('&#127358;', '1⃣', '2⃣', '3⃣', '4⃣', '5⃣', '6⃣', '7⃣', '8⃣', '9⃣',  '🔟');
						$message = '🇺🇸 '.$emojiTime[$New_York[0][0]].$emojiTime[$New_York[0][1]].':'.$emojiTime[$New_York[1][0]].$emojiTime[$New_York[1][1]].':'.$emojiTime[$New_York[2][0]].$emojiTime[$New_York[2][1]].'
						🇬🇧 '.$emojiTime[$London[0][0]].$emojiTime[$London[0][1]] . ':' . $emojiTime[$London[1][0]] . $emojiTime[$London[1][1]].':' . $emojiTime[$London[2][0]] . $emojiTime[$London[2][1]].'
						🇪🇸 '.$emojiTime[$Madrid[0][0]].$emojiTime[$Madrid[0][1]] . ':' . $emojiTime[$Madrid[1][0]] . $emojiTime[$Madrid[1][1]].':' . $emojiTime[$Madrid[2][0]] . $emojiTime[$Madrid[2][1]].'
						🇮🇹 '.$emojiTime[$Rome[0][0]].$emojiTime[$Rome[0][1]] . ':' . $emojiTime[$Rome[1][0]] . $emojiTime[$Rome[1][1]].':' . $emojiTime[$Rome[2][0]] . $emojiTime[$Rome[2][1]].'
						🇫🇷 '.$emojiTime[$Paris[0][0]].$emojiTime[$Paris[0][1]] . ':' . $emojiTime[$Paris[1][0]] . $emojiTime[$Paris[1][1]].':' . $emojiTime[$Paris[2][0]] . $emojiTime[$Paris[2][1]].'
						🇩🇪 '.$emojiTime[$Berlin[0][0]].$emojiTime[$Berlin[0][1]] . ':' . $emojiTime[$Berlin[1][0]] . $emojiTime[$Berlin[1][1]].':' . $emojiTime[$Berlin[2][0]] . $emojiTime[$Berlin[2][1]].'
						🔰 '.$emojiTime[$Kiev[0][0]].$emojiTime[$Kiev[0][1]] . ':' . $emojiTime[$Kiev[1][0]] . $emojiTime[$Kiev[1][1]].':' . $emojiTime[$Kiev[2][0]] . $emojiTime[$Kiev[2][1]].'
						🇷🇺 '.$emojiTime[$Moscow[0][0]].$emojiTime[$Moscow[0][1]] . ':' . $emojiTime[$Moscow[1][0]] . $emojiTime[$Moscow[1][1]].':' . $emojiTime[$Moscow[2][0]] . $emojiTime[$Moscow[2][1]].'
						🇯🇵 '.$emojiTime[$Tokyo[0][0]].$emojiTime[$Tokyo[0][1]] . ':' . $emojiTime[$Tokyo[1][0]] . $emojiTime[$Tokyo[1][1]]. ':' . $emojiTime[$Tokyo[2][0]] . $emojiTime[$Tokyo[2][1]];
					}
					
					elseif (preg_match("/отсчеты/", $comment)) {
						date_default_timezone_set ("Europe/Moscow");
						function rdate($param, $time=0) {
							if (intval($time)==0) 
							$time=time();
							$месяца = array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
							if (strpos($param, 'M')===false) {
								return date($param, $time);
							}
							else {
								return date(str_replace('M', $месяца[date('n',$time)-1],$param), $time);
							}
						}
						$date1 = rdate("d M");
						$date2 = strtotime("1 January 2015");
						$enddate = strtotime("1 January 2016");
						$diff = $enddate - $date2;
						$now = time() - $date2;
						$message = "➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
						" . str_replace($original, $custom, "⏳2015 год прошёл на " . round((100 * $now) / $diff, 3)."%") . "
						" . str_replace($original, $custom, "❄До 14 февраля ".ceil((mktime(0,0,0, 2, 14, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "✈До 23 февраля " . ceil((mktime(0, 0, 0, 2, 23, 2015) - time()) / 86400) . " дней")."
						" . str_replace($original, $custom, "🌱До весны " . ceil((mktime(0, 0, 0, 3, 1, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "👩До 8 марта " . ceil((mktime(0, 0, 0, 3, 8, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "👲До 1 апреля " . ceil((mktime(0, 0, 0, 4, 1, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "☀До лета " . ceil((mktime(0, 0, 0, 6, 1, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "🍂До осени " . ceil((mktime(0, 0, 0, 9, 1, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "❄До зимы " . ceil((mktime(0, 0, 0, 12, 1, 2015) - time()) / 86400) . " дней") . "
						" . str_replace($original, $custom, "🎄До нового года " . ceil((mktime(0, 0, 0, 1, 1, 2016) - time())/86400)." дней") . "
						➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖";

					}

					elseif (preg_match("/омич/", $comment)) {
						$photo = photosGet(27882947, random(array(183788443, 155686459, 165642259)));
						$attachment = download($photo, true, 206594670);
					}
					
					elseif (preg_match("/пикча/", $comment)) {
						if (!$ecomment[1]) {
							$photo = photosGet(10639516, "wall");
							$attachment = download($photo, true, 206594729);
						} 
						else {
							$jsonurl = file_get_contents("https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=" . urlencode($comment1));
							$result = json_decode($jsonurl, true);
							$photo = $result ["responseData"] ["results"] [0] ["unescapedUrl"];		
							$attachment = download($photo, true, 206594729);
						}
					}
					
					elseif (preg_match("/котик/", $comment)) {
						$photo = photosGet(32015300, 205712962);
						$attachment = download($photo, true, 208567685);
					}
					
					elseif (preg_match("/история/", $comment)) {
						$message = strip_tags(file_get_contents("http://bohdash.com/random/sram/random.php"));
					} 
					
					elseif (preg_match("/демотиватор/", $comment)) {
						$image = file_get_contents("http://bohdash.com/random/demotivator/random.php");
						$attachment = download($image, true, 206594979);
					} 
					
					elseif (preg_match("/девушка/", $comment)) {
						$image = file_get_contents("http://bohdash.com/random/girl/random.php");
						$attachment = download($image, true, 206594633);
					}
					
					elseif (preg_match("/датаметр/", $comment)) {
						if (preg_match("/когда/", $comment)) {
							$message = '⛔Предложение должно начинаться с <<Когда>>';
						}
						else {
							$message = mt_rand(1, 31) . ' ' . random(array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря")) . " " . mt_rand(2015,3000);
						}
					}
					
					elseif (preg_match("/баланс/", $comment)) {
							$result_set = $mysqli->query("SELECT * FROM `balance` WHERE `uid` = " . $from_id . "");
							$row = $result_set->fetch_assoc();
							$message = "💵Баланс: " . $row ["balance"] . " баллов\n💯Сыграно игр: " . $row ["count"];
					}
					
					elseif (preg_match("/ответ/", $comment)) {
						$number = preg_replace("|[^0-9]*|", "", $comment); 
						if (preg_match("/загадка/", $comment)) {
							$reply = str_replace("ответ загадка " . $number . " ", "", $comment);
							if (!$number || !$reply) {
								$message = "⛔Ошибка в запросе. Пример: Ответ загадка 1 троллейбус, где <<1>> -- идентификатор загадки, а <<троллейбус>> -- ответ к загадке.";
							}
							else {
								$result_set = $mysqli->query("SELECT * FROM `puzzles` WHERE `id` = " . $number);
								$row = $result_set->fetch_assoc();
								$reply1 = $row ["reply"];
								$puzzles = $row ["puzzles"];
								
								$result_set = $mysqli->query("SELECT * FROM `balance` WHERE `uid` = " . $from_id . "");
								$row = $result_set->fetch_assoc();				
								$count = $row ["count"] + 1;
								$balance = $row ["balance"];
								if ($reply == $reply1) {
									$balance += 50;
									$message = "✅Поздравляю! Ты ответил правильно!\n💷Баланс: " . $balance . "\n💯Сыграно игр: " . $count;
								}
								else {
									$message = "⛔Ответ не правильный :с\n✅Правильный ответ: " . $reply1 . "\n💵Баланс: " . $balance . "\n💯Сыграно игр: " . $count;
								}
								$mysqli->query("UPDATE `balance` SET `balance` = " . $balance . ", `count` = " . $count . " WHERE `uid` = '" . $from_id . "'");
							
								$mysqli->query("DELETE FROM `wallbot`.`puzzles` WHERE `puzzles`.`id` = '" . $number . "'");
							}
						}
						if (preg_match("/ава/", $comment)) {
							$ava = str_replace("ответ ава", "", $comment);
							$explode = explode(" ", $ava);
							if ($explode [1] == "" || $explode [2] == "") {
								$message = "Ошибка в запросе. Пример: Ответ ава 1 224396964, где <<1>> -- идентификатор игры, а <<224396964>> -- идентификатор пользователя, чья аватарка была задействована в игре.";
							}
							else {
								$result_set = $mysqli->query("SELECT * FROM `ava` WHERE `id` = " . $explode [1]);
								if (($row = $result_set->fetch_assoc()) != false) {
									$uid = $row ["uid"];
									if (is_numeric($explode [2]) == true) {
										if ($uid == $explode [2]) {
											$result_set = $mysqli->query("SELECT * FROM `balance` WHERE `uid` = " . $from_id . "");
											$row = $result_set->fetch_assoc();				
											$count = $row ["count"] + 1;
											$balance = $row ["balance"] + 20;
											$message = "Поздравляю! Ты таки нашёл его! К твоему балансу добавлено 20 баллов. Для просмотра баланса пиши <<Баланс>>";
											$mysqli->query("UPDATE `balance` SET `balance` = " . $balance . ", `count` = " . $count . " WHERE `uid` = '" . $from_id . "'");
										}
										else {
											$message = "Нет, это не он.";
										}
										//$mysqli->query("DELETE FROM `wallbot`.`ava` WHERE `ava`.`id` = " . $explode [1] . "");
									}
									else {
										$message = "Идентификатор пользователя необходимо указывать в числовом эквиваленте.";
									}
								}
								else {
									$message = "Ошибка. Проверьте правильность ввода идентификатора игры.";
								}
							}
						}
					}
					
					elseif (preg_match("/загадка/", $comment)) {
						$result_set = $mysqli->query("SELECT * FROM `instruction`");
						while (($row = $result_set->fetch_assoc()) != false) {
							if ($row ["uid"] == $from_id) {
								$status = true;
								$puzzles = $row ["puzzles"];
								break;
							}
						}
						if (!$puzzles) {
							$message = "Привет, товарищ!✋\nВ этой игре тебе необходимо отгадать загадку, которую выберет бот. Время на ответ не ограничивается какими-то часами, минутами, секундами. Сегодня получил загадку -- через месяц ответил. Отвечать можно любым регистром в таком формате: ответ загадка 1 ответикус, где <<1>> -- идентификатор загадки, а <<ответикус>> -- ответ к загадке. За разгаданную загадку ты получаешь 50 баллов, которые в дальнейшем можно обменять на подарок или стикеры. \nВ общем, небольшой инструктаж прошли. Напиши-ка ещё разок <<Загадка>>";
							if ($status) {
								$mysqli->query("UPDATE `instruction` SET `puzzles` = 1 WHERE `uid` = '" . $from_id . "'");
							}
							else {
								$mysqli->query("INSERT INTO `instruction` (`uid`, `puzzles`) VALUES ('" . $from_id . "', 1)");
							}
						}
						else {
							$result_set = $mysqli->query("SELECT * FROM `puzzles`");
							if (($row = $result_set->fetch_assoc()) != false) {
								$message = $row ["puzzles"] . "\nИдентификатор: " . $row ["id"];
							}
							else {
								$message = "К сожалению, загадок больше нету 0_о";
							}
						}
					}
					
					elseif (preg_match("/визитка/", $comment)) {
						$usersget = api("users.get", "access_token=" . access_token . "&user_ids=" . $from_id . "&fields=uid,first_name,last_name,nickname,screen_name,sex,bdate,city,country,timezone,photo,photo_medium,photo_big,has_mobile,rate,contacts,education,online,counters");
						$first_name = $usersget ["response"] [0] ["first_name"] . " " . $usersget ["response"] [0] ["last_name"];
						$city = api("places.getCityById", "access_token=" . access_token . "&cids=" . $usersget ["response"] [0] ["city"]);
						$city = $city ["response"] [0] ["name"]; 
						if (!$city) {
							$city = "null";
						}
						$followers = $usersget ["response"] [0] ["counters"] ["followers"];
						$friends = $usersget ["response"] [0] ["counters"] ["friends"]; 
						$photos = $usersget ["response"] [0] ["counters"] ["photos"];
						$avatar = $usersget ["response"] [0] ["photo"];
						
						$usersget = api("users.get", "user_ids=" . $from_id . "&fields=uid,first_name,last_name,nickname,screen_name,sex,bdate,city,country,timezone,photo,photo_medium,photo_big,has_mobile,rate,contacts,education,online,counters");
						$audios = $usersget ["response"] [0] ["counters"] ["audios"]; 

						$ttfImg = new ttfTextOnImage("blue.jpg");
						$ttfImg->setFont("fonts/tahomabd.ttf", 10, "#f8f8f8");      
						$ttfImg->writeText(75, 10, $first_name);
						$ttfImg->writeText(90, 34, $city);      
						$ttfImg->setFont("fonts/tahoma.ttf", 9, "#000000");      
						$ttfImg->setFont("fonts/tahomabd.ttf", 10, "#f8f8f8");      
						$ttfImg->writeText(35, 85, $followers);
						$ttfImg->writeText(110, 85, $friends);
						$ttfImg->writeText(178, 85, $audios);
						$ttfImg->writeText(257, 85, $photos);
						$ttfImg->writeImg(10, 15, $avatar);
						$ttfImg->output("image.png");
						$attachment = download(false, true, 206594705);
					}
					
					elseif (preg_match("/видео/", $comment)) {
						if (!$ecomment[1]) {
							for (; ;) {
								$videosearch = api("video.search", "q=" . random(array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ы','э','ю','я')) . "&v=" . version . "&offset=" . $offset . "&count=1&access_token=" . access_token);
								if ($videosearch["response"]["items"][0]["owner_id"]) 
									break;
							}
							$attachment = "video" . $videosearch["response"]["items"][0]["owner_id"] . "_" . $videosearch["response"]["items"][0]["id"];
						} 
						else {
							$videosearch = api("video.search", "q=" . urlencode($comment1) . "&adult=1&v=" . version . "&count=1&access_token=" . access_token);
							$count = $videosearch["response"]["count"];
							if ($count == 0) 
								$message = "По запросу " . $comment1 . " не найдено ни одной видеозаписи";
							else {
								if ($count < 150) {
									$videosearch = api("video.search", "q=" . urlencode($comment1) . "&adult=1&v=" . version . "&count=" . $count . "&access_token=" . access_token);
									$random = rand(1, $count);
									$random1 = rand(1, $count);
								} 
								else {
									$videosearch = api("video.search", "q=" . urlencode($comment1) . "&adult=1&v=" . version . "&count=200&access_token=" . access_token);
									$random = rand(1, 150);
									$random1 = rand(1, 150);
								}
								$message = "Приятного просмотра! 😸";
								$attachment = "video" . $videosearch["response"]["items"][$random]["owner_id"] . "_" . $videosearch["response"]["items"][$random]["id"] . ",video" . $videosearch["response"]["items"][$random1]["owner_id"] . "_" . $videosearch["response"]["items"][$random1]["id"];
							}
						}
					}
					
					elseif (preg_match("/башорг/", $comment)) {
						$url = "http://bash.im/rss/";
						$xml = xml_parser_create();
						xml_parser_set_option($xml, XML_OPTION_SKIP_WHITE,1);
						xml_parse_into_struct($xml, file_get_contents($url), $el, $fe);
						xml_parser_free($xml);
						$return = array(12, 26, 40, 54, 68, 82, 96);
						$column = random($return);
						$message = $el[$column]["value"];
					}
					
					elseif (preg_match("/анонимно/", $comment)) {
						$s = (string)$ecomment[1];
						if (!$ecomment[1] || !$ecomment[2] || 333 == $ecomment[1] || $s[1] == 0 && $s[2] == 0 && $s[3] == 0) {
							$message = "⛔Параметры указаны некорректно \n ℹВот вам наглядный пример использования функции: \n Анонимно 224396964 Привет!";
						}
						else {
							if (is_numeric($ecomment[1]) == true) {
								$ecomment[1] = "id" . $ecomment[1];
							}
							$usersget = api("users.get", "user_ids=" . $ecomment[1] . "&fields=can_write_private_message&access_token=" . access_token);
							if ($usersget["response"][0]["can_write_private_message"] == 0) {
								$wallpost = api("wall.post", "owner_id=-80714684&message=@" . $ecomment[1] . " (" . preg_replace("/^(\S+)\s+/","", $comment1) . ")&access_token=" . access_token);
								$message = "К сожалению, пользователь ограничивает круг лиц, которые могут присылать ему сообщения. Я решил просто послать ему уведомление.";
							} 
							else 
							{
								$title = "Анонимное сообщение";
								$отправка = api("messages.send", "domain=" . $ecomment[1] . "&title=" . urlencode($title) . "&message=" . urlencode($message) . "&access_token=" . access_token);
								if ($отправка["response"] > 0) {
									$message = "Ваше сообщение доставлено! " . random(array("&#128518;", "&#128540;", "&#128527;", "&#128524;", "&#128516;", "&#128563;", "&#128514;", "&#128559;", "&#128541;"));
								}
								else {
									$message = "К сожалению, ваше сообщение не было доставлено адресату.";
								}
							}
						}
					} 
					
					elseif (preg_match("/анимация/", $comment)) {
						$wallget = api("wall.get", "domain=gifochka&count=1&offset=" . $offset . "&extended=1&access_token=" . access_token);
						$attachment = "doc" . $wallget["response"]["wall"][1]["attachments"][0]["doc"]["owner_id"] . "_" . $wallget["response"]["wall"][1]["attachments"][0]["doc"]["did"];
					} 
					
					elseif (preg_match("/аптайм/", $comment)) {
						function format_uptime($seconds) {
							$secs = intval($seconds % 60);
							$mins = intval($seconds / 60 % 60);
							$hours = intval($seconds / 3600 % 24);
							$days = intval($seconds / 86400);
							if ($days > 0) {
								$uptimeString .= $days;
								$uptimeString .= (($days == 1) ? " day" : " days");
							}
							if ($hours > 0) {
								$uptimeString .= (($days > 0) ? ", " : "") . $hours;
								$uptimeString .= (($hours == 1) ? " hour" : " hours");
							}
							if ($mins > 0) {
								$uptimeString .= (($days > 0 || $hours > 0) ? ", " : "") . $mins;
								$uptimeString .= (($mins == 1) ? " minute" : " minutes");
							}
							if ($secs > 0) {
								$uptimeString .= (($days > 0 || $hours > 0 || $mins > 0) ? ", " : "") . $secs;
								$uptimeString .= (($secs == 1) ? " second" : " seconds");
							}
							return $uptimeString;
						}
						preg_match("(\d{1,2}/\d{1,2}/\d{4}\s+\d{1,2}\:\d{2}\s+\w{2})", $winstats, $matches);
						$uptimeSecs = time() - strtotime($matches[0]);
						$message = "Server Uptime: " . format_uptime($uptimeSecs);
					}
					
					elseif (preg_match("/комикс/", $comment)) {
						$pars = file_get_contents('http://comicsia.ru/random/');
						preg_match('/"><img src="(.*?)" alt="/', $pars, $link);
						$attachment = download($link[1], true, 206594756);
					}
					
					elseif (preg_match("/девушка/", $comment)) {
						$image = file_get_contents("http://bohdash.com/random/girl/random.php");
						$attachment = download($image, true, 206594633);
					}
					
					elseif (preg_match("/мудрое высказывание/", $comment)) {
						$message = file_get_html("http://randstuff.ru/saying/")->find("div", 4)->plaintext;
					} 
					
					elseif (preg_match("/плейлист/", $comment)) {
						$audioget = api("audio.get", "v=" . version . "&owner_id=" . $from_id . "&access_token=" . access_token);
						$count = $audioget ["response"] ["count"];
						$message = "Вот тебе миу подобрал плейлист 😼";
						if ($count) {
							for ($i = 0; $i < 2; $i++) {
								$offset = rand(1,100);
								$audiogetRecommendations = api("audio.getRecommendations", "user_id=" . $from_id . "&count=1&offset=" . $offset . "&access_token=" . access_token);
								$attachment .= "audio" . $audiogetRecommendations ["response"] [0] ["owner_id"] . "_" . $audiogetRecommendations["response"][0]["aid"] . ",";	
							}
						}
						else {
							for ($i = 0; $i < 2; $i++) {
								$offset = rand(1,100);
								$audiogetPopular = api("audio.getPopular", "genre_id=" . mt_rand(1, 10) . "&count=1&offset=" . $offset . "&access_token=" . access_token);
								$attachment .= "audio" . $audiogetRecommendations ["response"] [0] ["owner_id"] . "_" . $audiogetRecommendations["response"][0]["aid"] . ",";	
							}
						}
					}
					
					elseif (preg_match("/выучи/", $comment)) {
						$delete = str_replace("выучи ", "", $comment);
						$explode = explode(":", $delete);
						$quest = $explode [0];
						$reply = $explode [1];
						$len = strlen($reply);
						$count = 0;
						for ($i = 0; $i < $len; $i++) {
								if ($reply [$i] == '|') {
									$count++;
								}
						}
						if ($count >= 1) {
							$status = "multi";
						}
						else {
							$status = "single";
						}
						$result = $mysqli->query("INSERT INTO `brain` (`quest`, `reply`, `status`) VALUES ('" . $quest . "', '" . $reply . "', '" . $status . "')");
						if ($result) {
							$message = "Выучил, запомнил.";
						}
						else {
							$message = "Чот хуйня какая-то при записи случилась";
						}
					}
					
					elseif (preg_match("/цитата/", $comment)) {
						$message= file_get_html("http://citaty.info/random")->find("div", 32)->plaintext;
					} 
					
					elseif (preg_match("/фильм/", $comment)) {
							$name = array(12, 16, 20, 24, 28, 32, 36, 40, 44, 48, 52, 56, 60, 64, 68, 72, 76, 80, 84, 88, 92, 96, 100, 104, 108, 112, 116, 120, 124, 128, 132, 136, 140, 144, 148, 152, 156, 160, 164, 168, 172, 176, 180, 184, 188, 192, 196, 200, 204, 208, 212, 216, 220, 224, 228, 232, 236, 240, 244, 248, 252, 256, 260, 264, 268, 272, 276, 280, 284, 288, 292, 296, 300, 304, 308, 312, 316, 320, 324, 328, 332, 336, 340, 344, 348, 352, 356, 360, 364, 368, 372, 376, 380, 384, 388, 392, 396, 400, 404, 408, 412, 416, 420, 424, 428, 432, 436, 440, 444, 448, 452, 456, 460, 464, 468, 472, 476, 480, 484, 488, 492, 496, 500, 504, 508, 512, 516, 520, 524, 528, 532, 536, 540, 544, 548, 552, 556, 560, 564, 568, 572, 576, 580, 584, 588, 592, 596, 600, 604, 608, 612, 616, 620, 624, 628, 632, 636, 640, 644, 648, 652, 656, 660, 664, 668, 672, 676, 680, 684, 688, 692, 696, 700, 704, 708, 712, 716, 720, 724, 728, 732, 736, 740, 744, 748, 752, 756, 760, 764, 768, 772, 776, 780, 784, 788, 792, 796, 800, 804, 808, 812, 816, 820, 824, 828, 832, 836, 840, 844, 848, 852, 856, 860, 864, 868, 872, 876, 880, 884, 888, 892, 896, 900, 904, 908, 912, 916, 920, 924, 928, 932, 936, 940, 944, 948, 952, 956, 960, 964, 968, 972, 976, 980, 984, 988, 992, 996, 1000, 1004, 1008);
							$link = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251);
							$num = rand(0, 250);
							$film = file_get_html("http://www.kinopoisk.ru/level/20/")->find("td", $name [$num])->plaintext;
							$film = iconv("windows-1251", "utf-8", $film);
							preg_match('/\((.+)\)/', $film, $год);
							$film = explode("(", $film);
							preg_match_all('/<a href="(.*?)" class="all"/', file_get_contents("http://www.kinopoisk.ru/level/20/"), $url, PREG_SET_ORDER);		
							$message = "ⓂНазвание: " . $film[0] . " \n⌚" . $год[1] . " год. \n📤Ссылка: http://www.kinopoisk.ru" . $url [$link [$num]] [1];
					} 
					
					elseif (preg_match("/факт/", $comment)) {
						preg_match('/<title>	(.*?) #factroom/', file_get_contents('http://www.factroom.ru/random/'), $a);
						$message = $a[1];
					} 		
					
					elseif (preg_match("/курс валют/", $comment)) {
						$file = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");
						preg_match("/\<Valute ID=\"R01235\".*?\>(.*?)\<\/Valute\>/is", $file, $m);
						preg_match("/<Value>(.*?)<\/Value>/is", $m[1], $r);
						preg_match("/\<Valute ID=\"R01239\".*?\>(.*?)\<\/Valute\>/is", $file, $eu);
						preg_match("/<Value>(.*?)<\/Value>/is", $eu[1], $eur);
						preg_match("/\<Valute ID=\"R01720\".*?\>(.*?)\<\/Valute\>/is", $file, $uk);
						preg_match("/<Value>(.*?)<\/Value>/is", $uk[1], $ukr);
						$message = "💰Курс валют💰
						💵 Доллар $ - " . str_replace(",", ".", $r[1]) . " 💵
						💶 Евро € - " . str_replace(",", ".", $eur[1]) . " 💶
						🔰 Гривна - " . str_replace(",", ".", $ukr[1]) . " 🔰";
					} 
					
					elseif (preg_match("/википедия/", $comment)) {
						$wiki = str_replace("википедия ", "", $comment);
						if (!$wiki) {
							$message = "В вики нихуя нету по этому поводу";
						} 
						else {
							$get = file_get_contents("http://ru.wikipedia.org/w/api.php?action=opensearch&search=" . urlencode($wiki) . "&prop=info&format=xml&inprop=url");
							$wiki2 = xml_parser_create();
							$wiki4 = array();
							$wiki3 = array();
							xml_parse_into_struct($wiki2, $get, $wiki3, $wiki4);
							xml_parser_free($wiki2);
							if (!$wiki3 [9] ["value"]) {
								$message = "В вики нихуя нету по этому поводу";
							} 
							else {
								$message = "📙" . str_replace(",", "&#44;", $wiki3 [9] ["value"]);
							}
						}
					}
					
					elseif (preg_match("/инфа/", $comment)) {
						$message = "ВАШ ВОПРОС ТРУЪ НА " . rand(0,100) .  "%";
					} 
					
					elseif (preg_match("/повтори/", $comment)) {
						$message = str_replace("повтори", "", $comment); 
					}
					
					elseif (preg_match("/задай вопрос/", $comment)) {
						$ask = new askFm();
						$ask->login('askquery', '1337leet');
						$nickname = strtr($comment, array("задай вопрос" => ""));
						$answer = random(array("Отсосёшь за миллион?", "Шлюха :3", "Мамку шатал хд", "олололо", "йоу битч пасасируй май кирпич"));
						$ask->ask($nickname, $answer);
						$ask->logout();
						$message = "Написал :/";
					}
					
					elseif (preg_match("/статистика/", $comment)) {
						$group = strtr($comment, array("http:vkcom" => "", "https:vkcom" => "", "статистика " => "")); 
						if (is_numeric($group)) {
							$group = "-" . $group;
						}
						$wallget = api("wall.get", "domain=" . $group . "&access_token=" . access_token);
						$count = $wallget ["response"] [0];
						if ($count < 50) {
							$message = "В группе менее 50-ти записей. Сканирование не проивзодилось.";
						}
						$date = date("d-m");
						$posts = 0;
						$likes = 0;
						$wallget = api("wall.get", "domain=" . $group . "&count=50&access_token=" . access_token);
						for ($a = 0; $a < 50; $a++) {
							$date_post = $wallget ["response"] [$a] ["date"];
							if (date("d-m", $date_post) == $date) {
								$like = $wallget ["response"] [$a] ["likes"] ["count"];
								$likes += $like;
								$posts++;
							}
						}
						$statsget = api("stats.get", "date_from=20" . date("y-m-d") . "&group_id=" . $group . "&access_token=" . access_token);
						$subscribed = $statsget ["response"] [0] ["subscribed"];
						if (!$subscribed) {
							$subscribed = "NULL";
						}
						$message = "❤Лайков: " . $likes . "
						✏Постов: " . $posts . "
						👬Новых подписчиков: " . $subscribed;
					}
					
					elseif (preg_match("/привет/", $comment)) {
						$time = date("H");
						if ($time > 6 && $time < 10) {
							$message = "С добрым утром!";
						} elseif ($time > 10 && $time < 14) {
							$message = "Добрый день!";
						} elseif ($time > 14 && $time < 16) {
							$message = "Приветствую";
						} elseif ($time > 16 && $time < 22) {
							$message = "Добрый вечер!";
						} else {
							$message = "Привет!";
						}
					}
					
					elseif (preg_match("/новости/", $comment)) {
						$news = simplexml_load_file('https://news.google.com/news?pz=1&cf=all&ned=ru&hl=ru&topic=n&output=rss');
						$i = 0;
						foreach ($news->channel->item as $item) {
							preg_match('@src="([^"]+)"@', $item->description, $match);
							$parts = explode('<font size="-1">', $item->description);
							$feed .= "✏" . (string) $item->title . "\n📤". shortUrl((string) $item->link) . "\n\n";
							if ($i == 4) {
								break;
							}
							$i++;
						}
						$message = $feed;
					}

					elseif (preg_match("/погода/", $comment)) {
						$weather = str_replace("погода ", "", $comment);
						if (!$weather) {
							$message = "⚠Не указан дополнительный параметр. \n ℹПример: Погода Черновцы";
						}
						else {
							if (preg_match("/мне/", $comment)) {
								$usersget = api("users.get", "user_ids=" . $from_id . "&fields=city&access_token=" . access_token);
								$city = $usersget ["response"] [0] ["city"];
								$databasegetCitiesById = api("database.getCitiesById", "city_ids=" . $city . "&access_token=" . access_token);
								$name = $databasegetCitiesById ["response"] [0] ["name"];
							} 
							else {
								$name = mb_convert_case($weather, MB_CASE_TITLE, "UTF-8");
							}
							$id = id($name);
							
							if (!$id) {
								$message = "Ты что, реально живешь в такой жопе, что её даже нету на карте?";
							}
							else {
								screen("http://gismeteo.ru/city/legacy/?city=" . $id);
								crop("image.png", 380, 215, 705, 295);
								$attachment = download(false, true, 206594788);
							}
								
						}
					}
					
					elseif (preg_match("/обои/", $comment)) {
						try {
							$wh = new Wallhaven();

							$whLogin = new Wallhaven("xardch", "81BVBQPmIX");

							$macro = $wh->search(
								"macro",
								WH_CATEGORY_GENERAL,
								WH_PURITY_SAFE,
								"random",
								"desc",
								array("1920x1080")
							);
						} catch (Exception $e) {
							die("Caught exception: " . $e->getMessage());
						}
						$imgUrl = $macro[0]["imgUrl"];
						$attachment = download($imgUrl, true, 206594748);
					}

					elseif (preg_match("/мат/", $comment)) {
						$message = random(array("ты - потомственная шлюха. 
											Тебе нужно срочно вырезать пизду", 
											"смой сперму с пушка над губой, прежде чем в интернет заходить",
											"пизди пизди... пока в сознании",
											"не показывай пизду",
											"иди на хуй!",
											"трипероногий блядоящер охуевающий от своей нивъебенной злоебучести",
											"лучше бы ты у папы на трусах засох!",
											"задрот пиздарожий",
											"пиздобратия мандопроушечная",
											"уебище залупоглазое",
											"дрочепиздище хуеголовое",
											"пробиздоблядская мандопроушина",
											"гнидопаскудная хуемандовина",
											"блядь семитаборная, чтоб тебя всем столыпином харили",
											"охуевшее блядепиздопроёбище",
											"чтоб ты хуем поперхнулся",
											"долбоебическая пиздорвань",
											"хуй тебе в глотку через анальный проход",
											"распизди тебя тройным перебором через вторичный переёб",
											"пиздоблятское хуепиздрическое мудовафлоебище сосущее километры трипперных членов",
											"трихломидозопиздоеблохуеблядеперепиздическая спермоблевотина",
											"гондон с гонореей",
											"такой молодой, а уже подонок! ",
											"жто что это то за разъебай-подпизденыш мне такие слова говорит?",
											"хуепучело невманденное, ты не охуел ли?",
											"ну пиздец! Еще у осла не нюхал, а уже такие слова говорит! Хоть проветрился бы, а то мухи дохнут. Кстати отковырни - у тебя одна между ног засохла",
											"пидрючело",
											"пизда ушастая",
											"трех-член бля обрезанный",
											"пиздрон ушастый",
											"ёбань косоголовая",
											"гондопляс хуекрылый",
											"голубоглазый опиздень",
											"полуразложившийся абортный выскребышь",
											"слыш ты, зачатый в радиоктивной пещере двумя укуренными выхухолями, подними свою вафлетрахальную задницу и петляй улиткой в сторону леса, а то щас как выебу, ноздрями понос жрать будешь, пидрастический склипиздень",
											"я конечно понимаю, что ты уебан рыжеголовый, но нельзя же до такой степени распиздяйничать, чтобы своё долбоёбское триебучее, провернутое через нехуёвую мясорубку мужское, извиняюсь за выражение, достоинство, так по-злоебучему нахально давать пососать каждому вафлетраханому соплежую!",
											"блядь подзаборная",
											"в жопу пяленный",
											"гондоны штопаный",
											"недоебище недотраханное",
											"мудозвон сосущий",
											"пиздюк отхуяренный",
											"херохуй пиздючий",
											"ебун кастратический",
											"амеба маразматическая",
											"даун эпилептический",
											"ебись-разъебись троебучим проебом промудохуеблядская пиздопроебина невъебенной пропиздью охуевающая от своей злоебучести и в пиздопротивности своей подобна ебущемуся в жопу еноту сортирующему яйца в пизде кастрированной кобылы.",
											"хуесоос рваный",
											"ты кусочек дерьма засохшее на заднице выебаного тракториста!",
											"ебонтяй опидоревший",
											"целковидный пиздобраз!",
											"иди в пизду злоебучая сука",
											"ебаная в жопу чмо и кончаная в рот уродка",
											"на хую я бля тут всех видал нахуй бля",
											"чтоб ты сдохла на выходных проклятая падла",
											"иди бля в пиздень",
											"иди в хуй, выперженная шалава и менетчица",
											"да ебать вас всех в рот нахуй блядь",
											"чтоб вас вонючими пиздами загродило и пошли все нахуй.",
											"ты желтое пятно на бабских трусах!",
											"поносоротый жопосос.",
											"да ты мне в хуй не улыбался",
											"хуй квадратний.",
											"пиздаклок ебучий",
											"да ебать мой хуй ментовской жопой",
											"щлангоносый гомоеб",
											"ты похож на в жопу выебанного енота, сортирующий яйца в пизде отъебаной кобылы.",
											"мухосранский соплятрах.",
											"ты блядь пиздокрыл уебщный, распизделку свою заштопай говном яйцеглаз гибридный",
											"облямуденный злоебучий страхопизднутый трихуемандаблядский ебаквакнутый распиздаеб",
											"ты поебанец",
											"дракон тряпочный",
											"лоходром галимый",
											"уёбок пиздлявый",
											"кончина ебаная",
											"уёбище лесное",
											"отсоси не нагибаясь и подмыться не забудь",
											"выебем да отпустим.",
											"сука, блядь пизда дешовка",
											"разпиздяйка шелошевка",
											"хуйный выпердок гондон",
											"выходи из жопы вон.",
											"уёбище унитазное.",
											"облямудевшая страпиздихуюлина.",
											"хуй ты у мухи нюхал?",
											"щас как вьебу легче будет закрасить чем отшкрябать.",
											"ах ты пизда в обмотках!",
											"ты недостоин жевать(даже видеть)мой использованный гандон!",
											"чешуйчатый пиздакрыл",
											"подпёздыш туалетный.",
											"кровавий випердишь трущебного индейца,гомодрила недодроченний, жертва кривих щипцов и пьяной акушерки!",
											"мандаблядская страхопиздина!!",
											"пиздаёбаный гавножруй!",
											"ах ты пидарас шерстяной!",
											"слышь ты улитка... петляй в сторону леса .",
											"свинячеослиннозалупный пидрожопный хуесос.",
											"драчувальная машина с засоренным спермосливом.",
											"не поймешь, пока не отсосешь.",
											"семикрылое пиздоуебище",
											"иди на хуй, пока не послал!",
											"закрой своё ебало, пока не въёб по сосало!",
											"хуй соси Губой Треси! Хуй сосал Селёдкой Пахло ? Хуй кушай Маму слушай !",
											"прохуятина ябливая.",
											"не путай хуй с трамвайной ручкой",
											"пиздонюх трёхзалупный.",
											"да ебись ты в жопу пиздокрылая лошадка.",
											"попал как хуем в рукомойник",
											"что сидишь, как лунь пизду склевавший.",
											"ебись-разъебись троебучим проебом промудохуеблядская пиздопроебина невъебенной пропиздью охуевающая от своей злоебучести и в пиздопротивности своей подобна ебущемуся в жопу еноту сортирующему яйца в пизде кастрированной кобылы. Лучшеб ты у папы на трусах засох! Промонздаблядская скотопоёбина! Трехмондоблядское пиздопроебище с двойным охуеванием мозговых извилин, охуевшее до невзьеьенного троепиздия. Голубоглазый опиздень, охуевающий на собственном заебучестве. Ты кусочек дерьма засохшее на заднице выебаного тракториста! Внутреблядскоесперматоёбище. Пиздонюх трёхзалупный. Закрой своё ебало, пока не въёб по сосало! Астрапедическое хуепроёбище ахуевающие от своей воебучести. Мягким хуем сделан. Гондопляс хуекрылый. Волосатая мозгопроебина охуевающая от своей уебучести. Так и ток так!.). Ты желтое пятно на бабских трусах! Иди в пизду злоебучая сука, ебаная в жопу чмо и кончаная в рот уродка, на хую я бля тут всех видал нахуй бля, чтоб тебе гнида не ладно бало нахуй бля, чтоб ты сдохла на выходных проклятая падла, настоебавшая всему миру нахуй, иди бля в пиздень, иди в хуй, выперженная шалава и менетчица, бля в пизду ДОШИРАЧНИЦА в конце бля концов нахуй бля, да ебать вас всех в рот нахуй блядь, чтоб вас вонючими пиздами загродило и пошли все нахуй.",
											"промонздаблядская скотопоёбина!",
											"зевак свой закрой! Ща уебу! Педали быстро спустишь!",
											"ты чо такой ушастый,петух лобастый!",
											"пососи мой детородный орган !",
											"решил шевельнуть извилиной? И что? Мозги перемешались?",
											"а может поговорим об этом когда к вам вернется рассудок?",
											"а вы сейчас схватились за голову, типа за ум взялись?",
											"я даже не буду делать из вас дурака, вы и сами не плохо справляетесь.",
											"все и так думают, что вы идиот, поэтому лучше помолчите, не стоит развеивать последние сомнения.",
											"что, умная идея пришла в голову и теперь упорно ищет мозг?",
											"в вашу голову если и приходят умные мысли, то только умирать.",
											"да ничего, ничего, я на Вас не обижаюсь. У меня еще и сосед дебил…",
											"понимаю, человечеству с вами нелегко!",
											"я человек не конфликтный и с таким мyдaчьем как вы — не связываюсь…",
											"ваше право на собственное мнение еще не обязывает меня слушать бред.",
											"вот смотрю я на вас и начинаю понимать: дураки и дороги — это не беда…",
											"кончил тявкать? Теперь быстро в будку!",
											"а че так завоняло? Сдох кто-то? А, это ты рот открыл…",
											"прежде чем меня учить, читать научись!",
											"да, ты себе цены не знаешь! Заведи сутенера, будешь знать…",
											"еще пару слов и по пути домой дорогу себе фонарем освещать будешь!",
											"вот только не надо со мной спорить, и твои зубы тебе еще не один год послужат…",
											"конечно, ты ведь уже взрослая! Прокладками наверное пользуешься… Не на те губы их лепишь!",
											"а у вашей матери кроме вас еще были выкидыши?",
											"да и родились-то вы, видать назло презервативу.",
											"интересно, а ваша мать тоже сильно испугалась, когда первый раз вас в роддоме увидела?",
											"у Вас, наверное, с самого рождения на голове целлофановый пакет. С клеем…",
											"небось глотнув сперму сказал?"));
					}
					
					elseif (preg_match("/портрет/", $comment)) {
						$usersget = api("users.get", "user_ids=" . $from_id . "&fields=bdate,sex&access_token=" . access_token);
						$sex = $usersget ["response"] [0] ["sex"];
						$weather = array("☀", "🌙", "⛅", "☁");
						$animals = array("🐍", "🐢", "🐛", "🐜", "🐌", "🐇", "🐒");
						$hat = array("🎩", "&#8194;&#8194;&#8194;", "&#8194;&#8194;&#8194;","&#8194;&#8194;&#8194;", "&#8194;&#8194;&#8194;", "&#8194;&#8194;&#8194;");
						$head = array("👦", "👱", "😄", "😏", "😐");
						$blouse = array("👕", "👔", "👘");
						$pants = array("&#8194;&#8194;&#8194;&#8194;&#8194;&#8194;👖"); 
						$shoes = array("👟", "👞");

						$things = array("🌽", "🍅", "🍆", "🍠", "🍍", "🍐", "🍌", "🍈", "🍑", "🍓", "🍉", "🍇", "🍒", "🍋", "🍊", "🍏", "🍎", "🍭", "🍬", "🍫", "🍪", "🍰", "🎂", "🍧", "🍨", "🍦", "🍮", "🍩", "🍞", "🍳", "☕", "🍵", "🍶", "🍼", "🍕", "🍔", "🍟", "🍗", "🍖", "🍝", "🍛", "🍡", "🍢", "🏉", "🎾", "⚾", "⚽", "🏀", "🏈", "🎸", "🎷", "📚", "🎨", "🎤", "🎻", "🎺", "💰", "🔦", "💐", "🍺", "🍸", "🍹", "🍷", "🔪", "🚬");

						if ($sex == 1) 
						{
							$hat = array("👑", "&#8194;&#8194;&#8194;", "&#8194;&#8194;&#8194;", "👒", "&#8194;&#8194;&#8194;", "&#8194;&#8194;&#8194;");
							$head = array("👧", "🙎", "🙍", "☺", "😊");
							$blouse = array("👗", "👙", "🎽");
							$pants = array("");
							$shoes = array("👠", "👢");
						}

						$shoes = random($shoes);
						$message = "&#8194;&#8194;&#8194;&#8194;&#8194;&#8194;" . random($hat) . "&#8194;&#8194;&#8194;&#8194;" . random($weather) . "
						&#8194;&#8194;&#8194;&#8194;&#8194;&#8194;" . random($head) . "
						&#8194;&#8194;&#8194;" . random($things) . random($blouse) . random($things) . "
						" . random($pants) . "
						&#8194;&#8194;&#8194;&#8194;&#8194;" . $shoes . $shoes . "&#8194;&#8194;&#8194;&#8194;" . random($animals);
					}
					
					elseif (preg_match("/фотоколлаж/", $comment)) {
						$friendsget = api("friends.get", "user_id=" . $from_id . "&order=hints&fields=photo_200&v=" . version . "&access_token=" . access_token);
						$friendsCount = $friendsget ["response"] ["count"]; 
						$count = 0;
						while ($count < $friendsCount) {
							if ($friendsget ["response"] ["items"] [$count] ["photo_200"] != null) {
								$links [$count] = $friendsget ["response"] ["items"] [$count] ["photo_200"];
							}
							else {
								$links [$count] = "none.jpg"; 
							}
							$count++;
						}
						$count = 0;
						while ($count < $friendsCount) {
							$im = imagecreatefromjpeg ($links [$count]);
							imagejpeg($im, "photo.txt");
							$im_string = file_get_contents("photo.txt");
							$arr = str_split($im_string, 3);
							$string = implode($arr);
							$image[$count] = imagecreatefromstring($string);
							$count++;
						}
						$heigh = 1060;
						if ($friendsCount < 21) {	
							$heigh = 850;	
						}
						if ($friendsCount < 16) {	
							$heigh = 640;	
						}
						if ($friendsCount < 11) {	
							$heigh = 430;	
						}
						if ($friendsCount < 6) {	
							$heigh = 220;	
						}
						$final = imagecreatetruecolor(1060, $heigh);
						imagefill($final, 0, 0, 0xd0d0d0);
						$count = 0;
						$x = 10;
						$y = 10;
						$row = 0;
						
						while ($count < $friendsCount) {
							$im = $image [$count];
							if ($row < 5) {
								imagecopy ($final, $im, $x, $y, 0, 0, 200, 200);
								$x = $x + 210;
							}
							else {
								$y = $y + 210;
								$x = 10;
								imagecopy ($final, $im, $x, $y, 0, 0, 200, 200);
								$row = 0;
								$x = 220;
							}
							$row++;
							$count++;
						}
				
						$filename = "image.png";
						imagejpeg($final, $filename); 
					
						unlink("photo.txt");
					
						$message = "Ваш фотоколлаж готов!";
						$attachment = download(false, true, 207970496);
					}
					
					else {
						$result_set = $mysqli->query("SELECT * FROM `brain`");
						while (($row = $result_set->fetch_assoc()) != false) {
							if (preg_match("/" . $row ["quest"] . "/", $comment)) {
								$message = $row ["reply"];
								break;
							}
						}
					}
					
					if ($message || $attachment) {
						api("account.setOnline", "access_token=" . access_token);
						api("wall.addComment", "owner_id=" . $post [0] . "&post_id=" . $post [1] . "&text=" . urlencode($message) . "&attachment=" . $attachment . "&reply_to_comment=" . $comment_id . "&access_token=" . access_token);
					}
				}

	$mysqli->close();
	
	function photosGet($owner, $album) {
		$photosget = api("photos.get", "owner_id=-" . $owner . "&album_id=" . $album . "&count=1&offset=" . rand(0, 1000) . "&access_token=" . access_token . "&v=5.27" . version);
		$return = array("photo_2560", "photo_1280", "photo_807", "photo_604", "photo_130");
		for ($i = 0; $i < count($return); $i++) {
			$photo = $photosget ["response"] ["items"] [0] [$return [$i]];
			if ($photo) {
				break;
			}
		}
		return $photo;
	}

	function id($name) {
		$page = file_get_contents("http://www.gismeteo.ru/ajax/suggest/?callback=&lang=ru&startsWith=" . urlencode($name) . "&sort=typ&_=1339681505875");
		$info = json_decode($page, true);
		return $info ["items"] [0] ["id"];
	}
	
	function crop($image, $x_o, $y_o, $w_o, $h_o) {
		list($w_i, $h_i, $type) = getimagesize($image);
		$types = array("", "gif", "jpeg", "png"); 
		$ext = $types[$type];
		if ($ext) {
			$func = "imagecreatefrom" . $ext; 
			$img_i = $func($image); 
		} 
		else {
			echo "Некорректное изображение"; 
			return false;
		}
		if ($x_o + $w_o > $w_i) 
			$w_o = $w_i - $x_o; 
		if ($y_o + $h_o > $h_i) 
			$h_o = $h_i - $y_o;
		$img_o = imagecreatetruecolor($w_o, $h_o); 
		imagecopy($img_o, $img_i, 0, 0, $x_o, $y_o, $w_o, $h_o);
		$func = 'image'.$ext;
		return $func($img_o, $image); 
	}
	
	function screen($url) {
		$toapi = "http://mini.s-shot.ru/1920x1080/1920/png/?" . $url;
		$scim = file_get_contents($toapi);
		file_put_contents("image.png", $scim); 
	}
	
	function download($picture = null, $vk = null, $album = null) {
		if ($picture) {
			$pic = curl_init($picture);
			$file = fopen("image.png", 'wb');
			curl_setopt($pic, CURLOPT_FILE, $file);
			curl_setopt($pic, CURLOPT_HEADER, 0);
			curl_exec($pic);
			curl_close($pic);
			fclose($file);
		}

		if ($vk) {
			$photosgetUploadServer = api("photos.getUploadServer", "group_id=76437494&album_id=" . $album . "&access_token=" . access_token);
			$upload = curl($photosgetUploadServer["response"]["upload_url"], array("file1" => "@" . dirname(__FILE__) . "/image.png"));
			$json = json_decode($upload, true);
			$photossave = api("photos.save", "group_id=76437494&album_id=" . $album . "&hash=" . $json["hash"] . "&server=" . $json["server"] . "&photos_list=" . $json["photos_list"] . "&access_token=" . access_token);
			return "photo-76437494_" . $photossave["response"][0]["pid"];
		}
	}
	
	function api($method, $parameter) { 
		$return = curl("https://api.vk.com/method/" . $method . "?" . $parameter);
		return json_decode($return, true); 
	}
	
	function random($array) { 
		$num = rand(0, count($array)-1);
		return $array[$num]; 
	}
	
	function shortUrl($longUrl) {
			$apiKey = 'AIzaSyCm-ESpgo5TtmocTsJ_U8KM7viof91aKhI';

			$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
			$jsonData = json_encode($postData);

			$curlObj = curl_init();

			curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
			curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlObj, CURLOPT_HEADER, 0);
			curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
			curl_setopt($curlObj, CURLOPT_POST, 1);
			curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

			$response = curl_exec($curlObj);

			$json = json_decode($response);

			curl_close($curlObj);

			return $json->id;
	}
		
	function curl($url, $post = null) {
		$ch = curl_init( $url );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.3) Gecko/2008092417
		Firefox/3.0.3');
		if	($post) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		$response = curl_exec( $ch );
		curl_close( $ch );
		return $response;
	}
?>