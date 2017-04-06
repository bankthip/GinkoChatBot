Skip to content
This repository
Search
Pull requests
Issues
Gist
 @bankthip
 Sign out
 Watch 0
  Star 0
  Fork 0 bankthip/GinkoChatBot
 Code  Issues 0  Pull requests 0  Projects 0  Wiki  Pulse  Graphs  Settings
Tree: c2d856ea03 Find file Copy pathGinkoChatBot/bot.php
c2d856e  22 hours ago
@bankthip bankthip Add files via upload
1 contributor
RawBlameHistory     
61 lines (52 sloc)  1.8 KB
<?php
$access_token = 'W6KJ9hOZxmYxq166VcKrIH13UEGwuKQzWpU21N8uKqXXXRf3Ot6ukCA/ofBVZ9pp3iek8k+dFc7PF2xdV8Mq7Eo8wh0pO4JWI+focx4yF2Uo1vQ8yVW9l3nNGStGWluAGO7GL/LxWHhTpu3B6feCfQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			if ($text == "bank"){
				$messages = [
				'type' => 'text',
				'text' => 'thank'
				];	
				
			}else{
				$messages = [
				'type' => 'text',
				'text' => $text
				];	
			}
			
				
    		//'type'=> 'image',
//    		'originalContentUrl'=> 'http://www.sepeb.com/d/image_20170130_062749_35673.jpg',
//    		'previewImageUrl'=> 'http://www.sepeb.com/d/image_20170130_062749_35673.jpg'			
				
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Security Status Help
