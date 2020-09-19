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
$senderId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
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
	$response = "..........!";
}
elseif (strpos($text, " nome") !== false)
{
	$response = "L'avevo dimenticato da molto tempo ... il dolore di non avere un nome. Quegli altri ragazzi avevano nomi che altri li chiamavano, ma io no.!";
}
elseif (strpos($text, "forte") !== false)
{
	$response = "Voglio diventare più forte. Ho finalmente trovato un degno avversario. POSSO diventare più forte. Voglio combattere. VOGLIO diventare più forte. Di certo è passato un po 'di tempo dall'ultima volta che ho avuto questo desiderio. Voglio diventare più forte .";
}
elseif (strpos($text, "spammando") !== false)
{
	$response = "Blah blah blah! Sei rumoroso! Vieni e combatti. Anzi, è meglio se venite tutti quanti insieme. Se mi circondate ed attaccate contemporaneamente, forse uno di voi mi ferirà davvero..";
}
elseif (strpos($text, " pazzo") !== false)
{
	$response = "Sanità mentale? Spiacente, ma non ricordo di aver mai avuto un simile fastidio. ";
}
if (strpos($text, 'perso ') !== false) 
{
	$response = "Non ammettere mai la sconfitta e chiedere una morte rapida! Muori prima, poi ammetti la sconfitta! Se sei sconfitto ma non sei morto, significa solo che sei stato fortunato! A quel punto, pensa solo alla sopravvivenza! Sopravvivi e pensa solo a uccidere colui che non è riuscito a ucciderti!";
}
elseif (strpos($text, "stanco") !== false)
{
	$response = "Mi dispiace ma non mi interessano i deboli che non possono più combattere. Inoltre, non ho alcun obbligo di finirti.";

}
// elseif (strpos($text, "comandi Zaraki Kenpachi")
// {
//	$response = "ciao
//	nome
//  forte
//  spammando
//  pazzo
//  perso
//  stanco
//	lista comandi";
// }
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);

