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
		if (
			== 'message' && $event['message']['type'] == 'text') {
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
//				    		'type'=> 'image',
//   		'originalContentUrl'=> 'http://ginkotown.com/line_text/1024.jpg',
//  		'previewImageUrl'=> 'http://ginkotown.com/line_text/240.jpg'
				];	
			}
			
				
			
				
			

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