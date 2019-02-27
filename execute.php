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
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $chatId, Salve!";
}
elseif($text=="buongiorno")
{
	$response = "Buongiorno a te $username!";
}
elseif($text=="buonanotte")
{
	$response = "Buonanotte χ";
}
elseif($text=="battaglia alleanza")
{
	$response = "Un milione a settimana, un solo milione! 
Lo hai nel tuo sangue o hai dimenticato di essere un mutante? La forza di un' Alleanza sta nell'impegno reciproco di ogni singolo membro a rendersi migliori ogni giorno che passa.";
}
elseif($text=="apertura raid")
{
	$response = "Valorosi χ, accorrete! 
Cerebro mi ha mostrato una minaccia spaventosa. 
Un potere senza eguali si sta per abbattere su di noi e ancora una volta avremo bisogno di tutti per sconfiggerlo. 
È un nostro dovere per la umanità: It' time to RAID!
Punteggio minimo settimanale 48000 punti";
}
elseif($text=="minimo raid")
{
	$response = "È giusto ultimare il RAID?
48.000 punti non sono poi tanti.
Una catena è forte quando ogni singolo anello assolve al suo compito: sorreggere l'anello successivo.
Le tue gravi mancanze mi rattristano e rendono cupo il mio animo.";
}
elseif($text=="inizio conquista")
{
	$response = "La CONQUISTA è iniziata! Tante battaglie affrontate negli anni, eppure nessuna di esse è stata come questa. Siamo destinati a distruggerci l’un l’altro o possiamo cambiare ciò che siamo ed unirci.... il futuro è davvero già scritto?";
}
elseif($text=="aiuto conquista")
{
	$response = "Il vero nemico è l’indifferenza non lasciare che il potere ti sovrasti riprendi il controllo di te stesso e vieni a combattere.
Le forze attuali impegnate nel conflitto non sono sufficienti a sovrastare la ferocia nemica!
Ogni aiuto è prezioso per respingere gli avversari!";
}
elseif($text=="partecipazione conquista")
{
	$response = "Dobbiamo delineare un piano per attaccare e sorprendere la fazione nemica! Siete pronti miei studenti?";
}
elseif($text=="donazioni")
{
	$response = "La nostra Scuola ha bisogno di un TUO aiuto: 
DONA quello che puoi, ogni aiuto è ben accetto! 
Ognuno é parte integrante del tutto, come le cellule di un unico organismo.";
}
elseif($text=="telegram")
{
	$response = "Anche ai più giovani serve essere inseriti nel gruppo fra i membri più anziani, per essere poi da loro guidati

[Ricorda ai nuovi iscritti di entrare nel gruppo Telegram dell' Alleanza]";
}
elseif($text=="link x")
{
	$response = "qui è dove tutti noi ci riuniamo -> https://t.me/joinchat/FLqE8A7GfTFrrbQTwReVrQ <-";
}
elseif($text=="link accademia")
{
	$response = "qui è dove le nuove reclute si riuniscono -> https://t.me/joinchat/FLqE8AzwPxV8fQfsAPOvew <- ";
}
elseif($text=="reclutamento")
{
	$response = "Con l'aiuto di Cerebro ho trovato decide di mutanti sparsi per il Mondo, evitiamo che prendano la strada sbagliata! Troviamoli e diamo loro una casa, dove crescere, imparare a controllare i loro poteri e infine dominarli!";
}
elseif($text=="canale")
{
	$response = "aprite il libro di storia dei mutanti a pagina -> https://t.me/joinchat/AAAAAE3PIBrdC8wxue2iCQ <-";
}
elseif($text=="offline")
{
	$response = "ti ho visto assente a lezione ultimamente! penso che sia giunto il momento che ritorni più attivo, la χ ha bisogno anche di te";
}
elseif($text=="chat")
{
	$response = "ognuno deve dire la sua in modo che si possa lavorare in maniera costruttiva";
}
elseif($text=="promozione")
{
	$response = "Salve studente, ho notato i tuoi sforzi ed il tuo impegno. Sei ancora una pietra grezza, ma sicuamente in  The Hatefull χ riuscirai a brillare come una gemma rara! Raggiungici, Ti aspettiamo!";
}
elseif($text=="declassamento")
{
	$response = "Devo darti una brutta notizia:  purtroppo é la TERZA volta che vieni richiamato.
Hai ancora bisogno di un po' di disciplina e chi meglio Hank McCoy può aiutarti a ritrovarla; con lui in accademia (Inglourious χ) sono sicuro migliorerai e come una Fenice rinascerai dalle ceneri.
I tuoi poteri sono illimitati, ma se non vengono messi a disposizione di tutti non faranno crescere il gruppo anzi lo danneggiano.";
}
elseif($text=="regolamento")
{
	$response = "Ogni Scuola ha le sue regole, queste ci proteggono dal caos ed evitano che noi mutanti diventiamo vittime inconsapevoli della crudeltà umana. 
Un piccolo sforzo per una convivenza migliore:
 -> 3 giorni INATTIVITA' (senza avvisare) = ESPULSIONE
 -> BATTAGLIA dell'ALLEANZA: punteggio minimo 1 kk a settimana
 -> CONQUISTA: richiesta la presenza e la compilazione del sondaggio del giovedì. 
 -> RAID:  punteggio settimanale minimo 48.000 (anche se venisse chiuso in anticipo)
 -> presenza in chat richiesta
La mancanza di uno di questi requisiti comporterà un RICHIAMO.
 -> 3 RICHIAMI ===> ACCADEMIA";
}
elseif($text=="minimo battaglia alleanza")
{
	$response = "arriverà il momento in cui noi tutti dovremmo scendere in battaglia, quando sarà dovremo essere pronti! proprio per questo abbiamo bisogno di allenamento, migliorare noi stessi ed oltrepassare i nostri limiti! ogni membro della χ ha un ruolo importante ed ognuno di essi deve saper adempire al proprio dovere! senza allenamento non si oltrepassano i propri limiti, senza raggiungere il punteggio minimo battaglia alleanza stabilito come potrai poi pensare di aiutare i tuoi compagni nella battaglia?";
}
elseif($text=="team conquista")
{
	$response = "Figliolo,la conquista è una cosa importante.
Noi siamo la χ ed il futuro dell’umanità è nelle nostre mani,non possiamo lasciare nulla al caso.
Trova la forza dentro di te e schiera team più competitivi!";
}
elseif($text=="presentati")
{
	$response = "piacere sono charles";

}
elseif($text=="nel gruppo telegram della the hateful")
{
	$response = "Benvenuto, questa è la nostra scuola per giovani dotati! 
il primo passo per capire il proprio potere è sperimentarne L’entità, poi si da iniziò al processo di insegnamento su come controllarlo. Se decidi di restare, ti posso promettere che quando avrai finito qui, sarai in grado di reinserirti nel mondo e sfolgervi un ruolo stabile e produttivo";
}
elseif($text=="lista comandi")
{
	$response = "ciao
	buongiorno
	buonanotte
	battaglia alleanza
	apertura raid
	minimo raid
	inizio conquista
	aiuto conquista
	partecipazione conquista
	donazioni
	telegram
	link x
	link accademia
	reclutamento
	canale
	offline
	chat
	promozione
	declassamento
	regolamento
	minimo battaglia alleanza
	team conquista
	presentati
	lista comandi";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
