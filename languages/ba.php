<?php

require_once './config/config.php';
$translate = new Translation();
$content = array();

$lang_id = 3;

$get_bosnian = $translate->getLang($lang_id);

while($row = $get_bosnian->fetch_assoc()){
	$content[$row['array_key']] = $row['array_value'];
}


/*
//translation
$content["en_translation"] = 'Engleski';
$content["de_translation"] = 'Njemački';
$content["ba_translation"] = 'Bosanski';
//1. banner
$content["heading1"] = 'Da li bi voljeli živjeti i raditi u Njemačkoj ?';
$content["heading2"] = 'Mi to možemo učiniti za Vas bez ikakvih troškova!';
$content["four"] = 'Kontaktiraj nas';
$content["info"] = 'Saznajte više';
$content["employers"] = 'Za poslodavce';
//2. banner
$content["welcome"] = 'Dobro došli';
$content["subtitle"] = 'Profesionalan i siguran način da postanete doktor ili dio medicinskog osoblja u Njemačkoj';
$content["b2_title1"] = 'Kontaktiraj nas!';
$content["b2_title2"] = 'Usluga je besplatna!';
$content["b2_title3"] = 'Posao iz snova nije nedostižan!';
$content["b2_body1"] = 'Želite živjeti i raditi u Njemačkoj? Kontaktirajte nas i ispunite obrazac u nastavku. Pošaljite nam svoj CV i motivacijsko pismo.';
$content["b2_body2"] = 'Usluga je besplatna: Naša usluga je bez dodatnih troškova. Nudimo mogućnost pronalaska radnog mjesta, doškolovavanja (kurs njemačkog jezika), te olakšavamo proces pronalaska smještaja u Njemačkoj';
$content["b2_body3"] = ' Njemačka više nije nedostižna: Bumare Vam otvara put ka boljoj budućnosti. Iskoristite priliku, odluka je na Vama! U nama imate prijatelja - Bumare Team';
//3. banner
$content["form-header"] = 'Kontaktirajte nas';
$content["formp"] = 'Popunite obrazac! Radujemo se Vašem javljanju i saradnji. ';
$content["name"] = 'Ime i Prezime';
$content["email"] = 'E-mail';
$content["jobTitle"] = 'Zanimanje';
$content["phoneNumber"] = 'Broj Telefona';
$content["message"] = 'Poruka';
$content["submit"] = 'Pošalji/Potvrdi';

//Placeholder field
$content["placeholder_form"] = 'Opciono polje...';

//4. banner
$content["info-title"] = 'Izaberite nas';
$content["info-subtitle"] = 'Zašto smo mi pravi partner za vas';
$content["b4_title1"] = 'CV pregled: Dopuna/dorada CV-a i ostale dokumentacije po potrebi';
$content["b4_title2"] = 'Brza usluga';
$content["b4_title3"] = 'Najbolja ponuda za posao: Prilagođavanje Vašeg zanimanja ponuđenom radnom mjestu ';
$content["b4_title4"] = 'Atraktivni partneri: Povežite se sa najboljim poslodavcima u oblasti zdravstva ';
$content["b4_title5"] = 'Transport: Podrška za prevoz i smještaj';
$content["b4_title6"] = 'Priprema intervjua: Priprema za intervju na osnovu vježbe i treninga ';
$content["b4_body1"] = 'Ažuriramo Vaš CV zajedno sa svim potrebnim dokumentima za prijavu';
$content["b4_body2"] = 'Budite informisani o najnovijim i najinteresantnijim prilikama';
$content["b4_body3"] = 'Optimizirali smo ponude za posao kako bi ispunili Vaše zahtjeve';
//$content["b4_body4"] = 'Povežite se sa najboljim poslodavcima u zdravstvu';
//$content["b4_body5"] = 'Sa nama dobijate podršku za prevoz i smještaj';
//$content["b4_body6"] = 'Biti ćete pripremljeni za intevju uz pomoć personaliziranog treninga';


//more_info
//$content["more_info_heading1"] = 'Vrhunska medicinska oprema';
//$content["more_info_heading2"] = 'Rad sa profesionalcima';
//$content["more_info_content1"] = 'Mi smo izvor najvjerodostojnijih imena u hirurškom, doktorskom i medicinskom priboru. Bilo da ste u potrazi za kupovinu ili zakupu, Midmed pruža sektoru javne bolnice i Australazijske tvrtke široku paletu opreme, potrošnog materijala i drugih rješenja za tretman. Od najmanjih medicinskih centara do najvećih gradskih bolnica, pomagala uz dokazane kliničke performanse, velika jamstva i visoka razina isplativosti.';
//$content["more_info_content2"] = 'Odjel za veteranske poslove regrutira se za dnevnicu, sestara 2. radne sesije za rad u ovom zdravstvenom centru u Rocky Hillu, CT. Ta će pozicija prosječno iznositi 24 sata tjedno. Svi prijavitelji moraju uključiti životopis unutar "Nastavi kartica" svoje aplikacije, kao i prenijeti pismo pokrivanja s njihovim podnescima. Podnositelji zahtjeva pozvani na intervju mogu se zahtijevati da dostave dodatnu dokumentaciju koja podupire njihovu kvalifikaciju za to mjesto.';
//$content["back"]="Nazad";
//employers
$content["employers_heading"] = 'Za poslodavce';
$content["employers_subtitle"] = 'Prijavite se!';
$content["employers_title1"] = ' Poslodavac ste, trebate radnike?';
$content["employers_title2"] = 'Besplatno se učlanite';
$content["employers_title3"]= 'Rad u Njemačkoj';
$content["employers_body1"] = 'Ukoliko imate posao ali Vam nedostaje radnika, te nemate mogućnosti doći do istih. Bumare će Vam pomoći i spojiti Vas sa najboljim radnicima iz Bosne i Hercegovine, Hrvatske i Srbije.';
$content["employers_body2"] = 'Naša stranica i oglašavanje na istoj je u potpunosti besplatno. Spojite se sa radnicima i možda već sutra među njima pronađete kadar koji je Vama potreban.';
$content["employers_body3"] ='Liječnici i medicinske sestre čekaju na Vašu zdravstvenu ustanovu. Javite nam se, i mi ćemo Vam pomoći u pronalasku radnika. Na Vama je samo da ispunite dole navedeni obrazac.';
$content["employers_more_info"]='-';
$content["employers_form-header"] = 'Kontaktirajte nas';
$content["employers_formp"] = 'Popunite obrazac ukoliko ste zainteresovani. Radujemo se upoznavanju.';
$content["employers_name"]= 'Ime';
$content["employers_email"] = 'E-mail';
$content["employers_message"] ='Poruka';
$content["employers_submit"]='Pošalji/Potvrdi';
$content["job-doctor"] ='Doktor';
$content["job-nurse"]='Med. sestra';
*/
