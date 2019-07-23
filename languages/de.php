<?php

require_once './config/config.php';
$translate = new Translation();
$content = array();

$lang_id = 2;

$get_deutchland = $translate->getLang($lang_id);

while($row = $get_deutchland->fetch_assoc()){
	$content[$row['array_key']] = $row['array_value'];
}



/*
//translation
$content["en_translation"] = 'Englisch';
$content["de_translation"] = 'Deutsche';
$content["ba_translation"] = 'Bosnisch';
//1. banner
$content["heading1"] = 'Möchten Sie in Deutschland arbeiten ?';
$content["heading2"] = 'Wir können es für sie ohne jede Kosten realisieren!';
$content["four"] = 'Kontaktieren sie uns';
$content["info"] = 'Über uns';
$content["employers"] = 'Für Arbeitgeber';
//2. banner
$content["welcome"] = 'Willkommen';
$content["subtitle"] = 'Professioneller und sicherer Weg, Krankenschwester oder Arzt in Deutschland zu werden.';
$content["b2_title1"] = 'Füllen Sie zuerst das unten angegebene Kontaktformular aus';
$content["b2_title2"] = 'Unsere Dienstleistungen sind völlig kostenlos';
$content["b2_title3"] = 'Ihr Traumjob ist jetzt erreichbar';
$content["b2_body1"] = 'Willst du in Deutschland leben und arbeiten? Kontaktiere uns und fülle das untenstehende Formular aus. Sende uns deinen Lebenslauf und dein Motivationsschreiben.';
$content["b2_body2"] = 'Unsere Dienstleistung ist völlig kostenlos und Sie haben keine zusätzlichen Gebühren. Wir kümmern uns um ihre Unterkunft, ihren Arbeitsplatz und einen Deutschkurs, wenn nötig.';
$content["b2_body3"] = 'Wir von Bumare werden Ihnen in jeder Hinsicht helfen. Wir bringen Sie nach Deutschland und vergewissern uns, dass sie eine Unterkunft haben. Mit uns hast du einen Freund! -Bumare Team';
$content["more_info"] = 'Arbeiten Sie mit Fachleuten und hochwertigen medizinischen Geräten(mehr darüber)';
//3. banner
$content["form-header"] = 'Kontaktieren sie uns';
$content["formp"] = ' Füllen Sie dieses Formular aus, wenn Sie interessiert sind, wir freuen uns auf ihre Anmeldung';
$content["name"] = 'Name';
$content["email"] = 'E-mail';
$content["jobTitle"] = 'Berufsbezeichnung';
$content["phoneNumber"] = 'Telefonnumer';
$content["message"] = 'Nachricht';
$content["submit"] = 'Einreichen';

//Placeholder field
$content["placeholder_form"] = 'Optionales Feld...';

//4. banner
$content["info-title"] = 'Wählen sie uns aus';
$content["info-subtitle"] = 'Warum sollten Sie uns wählen?';
$content["b4_title1"] = 'CV ansehen';
$content["b4_title2"] = 'Schneller Service ';
$content["b4_title3"] = 'Optimierte Stellenangebote';
$content["b4_title4"] = 'Atraktive Partner';
$content["b4_title5"] = 'Transport';
$content["b4_title6"] = 'Bewerbungsgespräch vorbereiten';
$content["b4_body1"] = 'Wir aktualisieren Ihren Lebenslauf(CV) mit allen erforderlichen Bewerbungsunterlagen';
$content["b4_body2"] = 'Seien Sie über die neuesten und interessantesten Stellenangebote informiert';
$content["b4_body3"] = 'Wir haben die Stellenangebote für Ihre Anforderungen optimiert';
$content["b4_body4"] = 'Setzen Sie sich mit den besten Arbeitgebern im Gesundheitswesen in Verbindung.';
$content["b4_body5"] = 'Bei uns erhalten Sie Unterstützung beim Transport und bei der Unterkunft.';
$content["b4_body6"] = 'Sie werden durch ein personalisiertes Coaching auf das Interview vorbereitet.';
//more_info
$content["more_info_heading1"] = 'Die neueste medizinische AUSRÜSTUNG';
$content["more_info_heading2"] = 'Arbeite mit profis';
$content["more_info_content1"] = 'Wir beziehen uns auf die zuverlässigsten Namen in den Bereichen Chirurgie, Behandlung und medizinische Versorgung. Unabhängig davon, ob Sie etwas kaufen oder leasen möchten, Mid Med bietet sowohl dem Sektor öffentlicher Krankenhäuser als auch Australia-Asia Unternehmen eine Vielzahl von Ausrüstungen, Verbrauchsmaterialien und anderen Behandlungs Lösungen an. Von den kleinsten medizinischen Zentren bis zu den größten städtischen Krankenhäusern, deren klinische Leistungsfähigkeit, große Garantien und ein hohes Maß an Kosteneffizienz mit einhergehen.';
$content["more_info_content2"] = 'Das “Department of Veterans Affairs” rekrutiert für eine Position, 2. Krankenschwester/Krankenpfleger, die in diesem Gesundheitszentrum in Rocky Hill, CT. Diese Position wird durchschnittlich 24 Stunden pro Woche betragen. Alle Bewerber müssen einen Lebenslauf auf der Registerkarte "Lebenslauf" ihres Antrags hinzufügen und zusammen mit ihrer Einreichung ein Begleitschreiben hochladen. Bewerber, die zu einem Vorstellungsgespräch eingeladen werden, müssen möglicherweise zusätzliche Unterlagen vorlegen, die ihre Qualifikation(en) für diese Stelle unterstützen.';
$content["back"]="Zurück";

//employers
$content["employers_heading"] = 'für Arbeitgeber';
$content["employers_subtitle"] = 'Jetzt Anmelden!';
$content["employers_title1"] = 'Du bist ein Arbeitgeber und brauchst zusätzliches Personal?';
$content["employers_title2"] = 'Freie Mitgliedschaft';
$content["employers_title3"]= 'In Deutschland arbeiten';
$content["employers_body1"] = 'Wenn Sie ein Arbeitgeber sind, aber keine Arbeitskräfte haben und wissen nicht, wie Sie welche bekommen können. Bumare hilft Ihnen dabei und verbindet Sie mit den besten Arbeitern aus Bosnien-Herzegowina, Kroatien und Serbien.';
$content["employers_body2"] = 'Unsere Website und eine Anmeldung auf ihr ist völlig kostenlos. Schließen Sie sich unserer Seite an und vielleicht ist bereits morgen ihr zukünftiger Arbeiter dabei.';
$content["employers_body3"] ='Ärzte und Krankenschwestern warten auf Sie. Wir helfen Ihnen, einen Arbeiter zu finden. Sie müssen nur das untenstehende Formular ausfüllen.';
$content["employers_more_info"]='-';

$content["employers_form-header"] = 'Kontaktieren sie uns';
$content["employers_formp"] = 'Füllen Sie dieses Formular aus, wenn Sie interessiert sind, wir freuen uns auf ihre Anmeldung';
$content["employers_name"]= 'Name';
$content["employers_email"] = 'E-mail';
$content["employers_message"] ='Nachricht';
$content["employers_submit"]='Einreichen';

$content["job-doctor"] ='Arzt';
$content["job-nurse"]='Krankenschwester';
*/
