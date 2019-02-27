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
	$response = "Ciao $username, Salve!";
}
elseif($message=="buongiorno")
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
	$response = "Miei valorosi χ! Cerebro mi ha mostrato una minaccia spaventosa.Un potere senza eguali si sta per abbattere su di noi e ancora una volta avremo bisogno di tutte le nostre forze per debellarlo. È un nostro dovere, il raid è appena iniziato.";
}
elseif($text=="minimo raid")
{
	$response = "È giusto ultimare il raid?
La risposta è dentro di te!
Una catena è forte quando ogni singolo anello assolve al suo compito: sorreggere l'anello successivo.
Le tue gravi mancanze mi rattristano e rendono cupo il mio animo.";
}
elseif($text=="inizio conquista")
{
	$response = "La conquista è iniziata! Tante battaglie affrontate negli anni, eppure nessuna di esse è stata come questa. Siamo destinati a distruggerci l’un l’altro o possiamo cambiare ciò che siamo ed unirci.... il futuro è davvero già scritto?";
}
elseif($text=="aiuto conquista")
{
	$response = "Il vero nemico è l’indifferenza non lasciare che il potere ti sovrasti riprendi il controllo di te stesso e vieni a combattere.
Le forze attuali impegnate nel conflitto non sono sufficienti a sovrastare la ferocia nemica!
Ogni aiuto è prezioso per respingere gli avversari!";
}
elseif($text=="partecipazione conquista")
{
	$response = "Dobbiamo delineare un piano per attaccare e sorprendere la fazione nemica! Siete pronti ragazzi miei?";
}
elseif($text=="donazioni")
{
	$response = "per la nostra scuola ogni aiuto è ben accetto! Ognuno deve fare la sua parte ed agire come fossimo un unico organismo!";
}
elseif($text=="telegram")
{
	$response = "anche ai più giovani serve essere inseriti nel gruppo fra i membri più anziani per essere poi da loro guidati";
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
	$response = "dobbiamo evitare che gli altri mutanti ancora sparsi per il mondo prendano la strada sbagliata! Troviamoli e diamo loro un luogo dove imparare a dominare il loro potere! È dove possano crescere e avere una visione ottimistica del genere umano, priva di odio e rancore!";
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
	$response = "salve studente, ho notato i tuoi sforzi ed il tuo impegno, hai un grande potere e potrai compiere delle grandi gesta; ma non qui, sei stato ammesso alla The Hatefull χ! raggiungi i tuoi nuovi compagni ed aiutaci a salvaguardare la specie mutante!";
}
elseif($text=="declassamento")
{
	$response = "Devo darti una brutta notizia,purtroppo eri stato giá avvertito altre volte.
Questa é la terza volta che vieni richiamato,e siamo costretti a declassarti da allievo χ e mandarti in accademia.
Lì troverai Hank McCoy che ti aiuterà a ritrovare la giusta via,non buttarti giù,ritrova la fede e torna con noi il prima possibile...
Serve gente con i tuoi poteri,ma anche con lo giusto spirito di sacrificio,ricordalo sempre!";
}
elseif($text=="regolamento")
{
	$response = "le regole sono la base per una coesistenza pacifica, questo è appunto il nostro regolamento, creato per poter dare una dimora stabile e sicura a tutti i mutanti:
	-3 giorni inattività = espulsione
	-battaglia alleanza: punteggio minimo 1 kk a settimana
	-conquista: presenza richiesta
	-raid: punteggio settimanale minimo 48.000
	-presenza in chat richiesta
	-3 richiami = accademia";
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
