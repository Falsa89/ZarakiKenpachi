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
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $firstname, Salve!";
}
elseif($text=="buongiorno")
{
	$response = "Buongiorno a te!";
}
elseif($text=="buonanotte")
{
	$response = "Buonanotte X";
}
elseif($text=="battaglia alleanza")
{
	$response = "Un milione! Un solo milione! Lo hai nel tuo sangue o hai dimenticato di essere un mutante? La forza di un'alleanza sta nell'impegno reciproco di ogni singolo membro a rendersi migliori ogni giorno che passa.";
}
elseif($text=="apertura raid")
{
	$response = "Miei valorosi "χ"!
Cerebro mi ha mostrato una minaccia spaventosa.Un potere senza eguali si sta per abbattere su di noi e ancora una volta avremo bisogno di tutte le nostre forze per debellarlo. È un nostro dovere, il raid è appena iniziato.";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
