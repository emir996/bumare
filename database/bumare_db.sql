-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 03:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `status`) VALUES
(1, 'bumare', '0d51b8747d1ef0ac3d30edf5bb355378', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `filedoc_name` varchar(256) NOT NULL,
  `filedoc_size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `jobs_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories_lang`
--

CREATE TABLE `categories_lang` (
  `id` int(11) NOT NULL,
  `language` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_lang`
--

INSERT INTO `categories_lang` (`id`, `language`) VALUES
(1, 'English'),
(2, 'German'),
(3, 'Bosnian');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `profession` varchar(256) NOT NULL,
  `interest` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages_id`
--

CREATE TABLE `languages_id` (
  `id` int(11) NOT NULL,
  `array_key` varchar(256) NOT NULL,
  `array_value` varchar(256) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_id`
--

INSERT INTO `languages_id` (`id`, `array_key`, `array_value`, `lang_id`) VALUES
(1, 'en_translation', 'English', 1),
(2, 'de_translation', 'German', 1),
(3, 'ba_translation', 'Bosnian', 1),
(4, 'heading1', 'Do you wish to live and work in Germany?', 1),
(5, 'heading2', 'We can make it happen for you without any costs!', 1),
(6, 'four', 'Contact us', 1),
(7, 'info', 'Learn more', 1),
(8, 'employers', 'For employers', 1),
(9, 'welcome', 'Welcome', 1),
(10, 'subtitle', 'A professional and secure way to work as a doctor or nurse in Germany', 1),
(11, 'b2_title1', 'First fill the contact form bellow', 1),
(12, 'b2_title2', 'Our service is completely without charge', 1),
(13, 'b2_title3', 'Your dream job is reacheable now', 1),
(14, 'b2_body1', 'Contact us and complete the form below. Write to us, and we will get in touch with you!', 1),
(15, 'b2_body2', 'Our service is completely free and you do not have additional costs. We will take care of accommodation, workplace and education (German language course)', 1),
(16, 'b2_body3', 'We from Bumare will help you in every way. You do not have to worry about being left alone upon your arrival. The Bumare team will make your move seemless.', 1),
(17, 'more_info', 'Work with professionals and Top quality medical equipment (read more)', 1),
(18, 'form-header', 'Contact Us', 1),
(19, 'formp', 'Fill out this form if you are interested. We are looking forward to meet you.', 1),
(20, 'name', 'Name', 1),
(21, 'email', 'Email', 1),
(22, 'jobTitle', 'Job title', 1),
(23, 'message', 'Message', 1),
(24, 'submit', 'Submit', 1),
(25, 'placeholder_form', 'Optional Field...', 1),
(26, 'info-title', 'Choose us', 1),
(27, 'info-subtitle', 'Why we are the right partner for you:', 1),
(28, 'b4_title1', 'CV review', 1),
(29, 'b4_title2', 'Fast service', 1),
(30, 'b4_title3', 'Optimized job offers', 1),
(31, 'b4_title4', 'Attractive partners', 1),
(32, 'b4_title5', 'Transport', 1),
(33, 'b4_title6', 'Interview preparation', 1),
(34, 'b4_body1', 'We update your CV along with all required application documents', 1),
(35, 'b4_body2', 'You stay informed about latest and the most interesting opportunities', 1),
(36, 'b4_body3', 'We have optimized job offers to meet your requirements and needs', 1),
(37, 'b4_body4', 'Get connected with the best healthcare employers', 1),
(38, 'b4_body5', 'With us you get support for transport and accomodation', 1),
(39, 'b4_body6', 'You will get prepared for the interview through personalized cocahing', 1),
(40, 'more_info_heading1', 'Top quality medical equipment', 1),
(41, 'more_info_heading2', 'Work with professionals', 1),
(42, 'more_info_content1', 'We source the most trusted names in surgical, treatment and medical supplies. Whether you', 1),
(43, 'more_info_content2', 'The Department of Veterans Affairs is recruiting for a per diem, 2nd shift Registered Nurse to work at this Healthcare Center in Rocky Hill, CT. This position will average 24 hours per week. All applicants must include a resume within the \"Resume Tab\" of t', 1),
(44, 'back', 'Back', 1),
(45, 'employers_heading', 'For Employers', 1),
(46, 'employers_subtitle', 'Sign up now!', 1),
(47, 'employers_title1', 'Are you an employer in need of medical staff?', 1),
(48, 'employers_title2', 'A time saving service', 1),
(49, 'employers_title3', 'Working closely with both parties.', 1),
(50, 'employers_body1', 'If you are an employer in need of competent workforce, Bumare will help you connect you with the the right prospects from Bosnia-Herzegovina, Croatia and Serbia.', 1),
(51, 'employers_body2', 'Partner up with us and let us take care of your recruitment needs. You will save time and money.', 1),
(52, 'employers_body3', 'We work closely with our employers, as well as your potential future employees. We prepare the employees so that they come prepared and ready for their new job.', 1),
(53, 'employers_more_info', '-', 1),
(54, 'employers_form-header', 'Contact us', 1),
(55, 'employers_formp', 'Fill out this form to get in touch with us. We are looking forward hear from you.', 1),
(56, 'employers_name', 'Name', 1),
(57, 'employers_email', 'Email', 1),
(58, 'employers_message', 'Message', 1),
(59, 'employers_submit', 'Submit', 1),
(60, 'job-doctor', 'Doctor', 1),
(61, 'job-nurse', 'Nurse', 1),
(62, 'en_translation', 'Englisch', 2),
(63, 'de_translation', 'Deutsch', 2),
(64, 'ba_translation', 'Bosnisch', 2),
(65, 'heading1', 'Möchten Sie in Deutschland arbeiten ?', 2),
(66, 'heading2', 'Wir können es für sie ohne jede Kosten realisieren!', 2),
(67, 'four', 'Kontaktieren sie uns', 2),
(68, 'info', 'Über uns', 2),
(69, 'employers', 'Für Arbeitgeber', 2),
(70, 'welcome', 'Willkommen', 2),
(71, 'subtitle', 'Professioneller und sicherer Weg, Krankenschwester oder Arzt in Deutschland zu werden.', 2),
(72, 'b2_title1', 'Füllen Sie zuerst das unten angegebene Kontaktformular aus', 2),
(73, 'b2_title2', 'Unsere Dienstleistungen sind völlig kostenlos', 2),
(74, 'b2_title3', 'Ihr Traumjob ist jetzt erreichbar', 2),
(75, 'b2_body1', 'Kontaktieren Sie uns! Senden Sie Ihren Lebenslauf sowie das Bewerbungsschreiben zu', 2),
(76, 'b2_body2', 'Es fallen keine zusätzlichen gebühren an! Wir bieten Unterstützung bei der weiterbildung sowie bei der wohnungssuche in Deutschland', 2),
(77, 'b2_body3', 'Bumare bietet neue möglichkeiten. Nutze deine chance! Mit uns haben sie einen freund - Bumare Team!', 2),
(78, 'more_info', 'Arbeiten sie mit fachleuten und hochwertigen medizinischen geräten (mehr über)', 2),
(79, 'form-header', 'Kontaktieren sie uns', 2),
(80, 'formp', 'Füllen Sie dieses Formular aus, wenn Sie interessiert sind, wir freuen uns auf ihre Anmeldung', 2),
(81, 'name', 'Name', 2),
(82, 'email', 'E-mail', 2),
(83, 'jobTitle', 'Berufsbezeichnung', 2),
(84, 'phone', 'Telefonnummer', 2),
(85, 'message', 'Nachricht', 2),
(86, 'submit', 'Senden', 2),
(87, 'info-title', 'Wählen sie uns aus', 2),
(88, 'info-subtitle', 'Warum sollten Sie uns wählen?', 2),
(89, 'b4_title1', 'Bewerbungsunterlagen', 2),
(90, 'b4_title2', 'Schneller Service ', 2),
(91, 'b4_title3', 'Beste Stellenangebote', 2),
(92, 'b4_title4', 'Attraktive Partner', 2),
(93, 'b4_title5', 'Transport', 2),
(94, 'b4_title6', 'Personal Coaching', 2),
(95, 'b4_body1', 'Verbesserung und Aktualisierung des Lebenslaufs ', 2),
(96, 'b4_body2', 'Die neuesten Stellenangebote für Sie', 2),
(97, 'b4_body3', 'Wir haben die Stellenangebote für Ihre Anforderungen optimiert', 2),
(98, 'b4_body4', 'Die besten Arbeitgeber im Gesundheitswesen', 2),
(99, 'b4_body5', 'Unterstützung für Transport und Unterkunft', 2),
(100, 'b4_body6', 'Vorbereitung auf das Interview', 2),
(101, 'more_info_heading1', 'Die neueste medizinische AUSSTELLUNG', 2),
(102, 'more_info_heading2', 'Arbeite mit profis', 2),
(103, 'employers_body2', 'Naša stranica i oglašavanje na istoj je u potpunosti besplatno. Spojite se sa radnicima i možda ve? sutra me?u njima prona?ete kadar koji je Vama potreban.', 3),
(104, 'employers_body3', 'Lije?nici i medicinske sestre ?ekaju na Vašu zdravstvenu ustanovu. Javite nam se, i mi Ä‡emo Vam pomoÄ‡i u pronalasku radnika. Na Vama je samo da ispunite dole navedeni obrazac.', 3),
(105, 'more_info_content2', 'Das department of veterans affairs hat eine zweite stelle als krankenschwester / -pfleger angestellt, die in diesem gesundheitszentrum in Rocky Hill, CT, arbeitet. diese Position wird durchschnittlich 24 stunden pro woche. Alle bewerber müssen einen LE hab', 2),
(106, 'employers_heading', 'Für Arbeitgeber', 2),
(107, 'employers_subtitle', 'Jetzt Anmelden!', 2),
(108, 'employers_title1', 'Sie benötigen zusätzliches fachpersonal?', 2),
(109, 'employers_title2', 'Kostenlose Mitgliedschaft', 2),
(110, 'employers_title3', 'Bumare verbindet miteinander', 2),
(111, 'employers_body1', 'Bumare hilft Ihnen dabei und verbindet sie mit den besten fachkräften', 2),
(112, 'employers_body2', 'Ihre registrierung ist völlig kostenlos. Kontaktiere uns! Wir kümmern uns um die gewünschte verstärkung für Ihr team', 2),
(113, 'employers_body3', 'Einfach und schnell zum erfahrenen und qualifizierten Personal', 2),
(114, 'employers_more_info', '-', 2),
(115, 'employers_form-header', 'Kontaktieren sie uns', 2),
(116, 'employers_formp', 'Füllen Sie das Formular aus. Wir freuen uns auf Ihre Anmeldung', 2),
(117, 'employers_name', 'Name', 2),
(118, 'employers_email', 'E-mail', 2),
(119, 'employers_message', 'Nachricht', 2),
(120, 'employers_submit', 'Senden', 2),
(121, 'job-doctor', 'Arzt', 2),
(122, 'job-nurse', 'Krankenschwester', 2),
(123, 'employers_body1', 'Ukoliko imate posao ali Vam nedostaje radnika, te nemate mogućnosti doći do istih. Bumare će Vam pomoći i spojiti Vas sa najboljim radnicima iz Bosne i Hercegovine, Hrvatske i Srbije.', 3),
(124, 'employers_title3', 'Rad u Njemačkoj', 3),
(125, 'employers_title2', 'Besplatno se učlanite', 3),
(126, 'employers_heading', 'Za poslodavce', 3),
(127, 'employers_subtitle', 'Prijavite se!', 3),
(128, 'employers_title1', 'Poslodavac ste, trebate radnike?', 3),
(129, 'b4_body2', 'Budite informisani o najnovijim i najinteresantnijim prilikama', 3),
(130, 'b4_body3', 'Optimizirali smo ponude za posao kako bi ispunili Vaše zahtjeve', 3),
(131, 'b4_body1', 'Ažuriramo Vaš CV zajedno sa svim potrebnim dokumentima za prijavu', 3),
(132, 'b4_title6', 'Priprema intervjua', 3),
(133, 'b4_title5', 'Transport', 3),
(134, 'b4_title4', 'Atraktivni partneri', 3),
(135, 'b4_title3', 'Najbolja ponuda za posao', 3),
(136, 'b4_title2', 'Brza usluga', 3),
(137, 'b4_title1', 'CV pregled', 3),
(138, 'info-subtitle', 'Zašto smo mi pravi partner za vas', 3),
(139, 'info-title', 'Izaberite nas', 3),
(140, 'submit', 'Pošalji/Potvrdi', 3),
(141, 'placeholder_form', 'Opciono polje...', 3),
(142, 'phoneNumber', 'Broj Telefona', 3),
(143, 'message', 'Poruka', 3),
(144, 'email', 'E-mail', 3),
(145, 'jobTitle', 'Zanimanje', 3),
(146, 'name', 'Ime i Prezime', 3),
(147, 'formp', 'Popunite obrazac! Radujemo se Vašem javljanju i saradnji.', 3),
(148, 'form-header', 'Kontaktirajte nas', 3),
(149, 'b2_body3', 'Njemačka više nije nedostižna: Bumare Vam otvara put ka boljoj budućnosti. Iskoristite priliku, odluka je na Vama! U nama imate prijatelja - Bumare Team', 3),
(150, 'b2_body2', 'Usluga je besplatna: Naša usluga je bez dodatnih troškova. Nudimo mogućnost pronalaska radnog mjesta, doškolovavanja (kurs njemačkog jezika), te olakšavamo proces pronalaska smještaja u Njemačkoj', 3),
(151, 'b2_body1', 'Želite Živjeti i raditi u Njemačkoj? Kontaktirajte nas i ispunite obrazac u nastavku. Pošaljite nam svoj CV i motivacijsko pismo.', 3),
(152, 'b2_title1', 'Kontaktiraj nas!', 3),
(153, 'b2_title2', 'Usluga je besplatna!', 3),
(154, 'b2_title3', 'Posao iz snova nije nedostižan!', 3),
(155, 'subtitle', 'Profesionalan i siguran način da postanete doktor ili dio medicinskog osoblja u Njemačkoj', 3),
(156, 'employers', 'Za poslodavce', 3),
(157, 'welcome', 'Dobro došli', 3),
(158, 'info', 'Saznajte više', 3),
(159, 'four', 'Kontaktiraj nas', 3),
(160, 'heading2', 'Mi to možemo uÄčiniti za Vas bez ikakvih troškova!', 3),
(161, 'heading1', 'Da li bi voljeli živjeti i raditi u Njemačkoj ?', 3),
(162, 'ba_translation', 'Bosanski', 3),
(163, 'phoneNumber', 'Telefonnummer', 2),
(164, 'de_translation', 'NjemaÄki', 3),
(165, 'phoneNumber', 'Phone Number', 1),
(167, 'placeholder_form', 'Optionales Feld...', 2),
(168, 'employers_more_info', '-', 3),
(169, 'employers_form-header', 'Kontaktirajte nas', 3),
(170, 'employers_formp', 'Popunite obrazac ukoliko ste zainteresovani. Radujemo se upoznavanju.', 3),
(171, 'employers_name', 'Ime', 3),
(172, 'employers_email', 'E-mail', 3),
(173, 'employers_message', 'Poruka', 3),
(174, 'employers_submit', 'Pošalji/Potvrdi', 3),
(180, 'job-doctor', 'Doktor', 3),
(183, 'job-nurse', 'Med. Sestra', 3),
(184, 'en_translation', 'Engleski', 3),
(199, 'b4_body4', 'Povežite se sa najboljim poslodavcima u zdravstvu', 3),
(200, 'b4_body5', 'Sa nama dobijate podršku za prevoz i smještaj', 3),
(203, 'b4_body6', 'Biti ćete pripremljeni za intevju uz pomoć personaliziranog treninga', 3),
(273, 'form_success', 'Your email has been sent. We will get back to you as soon as possible!', 1),
(274, 'form_success', 'Ihre E-Mail wurde gesendet. Wir werden uns so schnell wie möglich bei ihnen melden!', 2),
(275, 'form_success', 'Vaš e-mail je poslat. Kontaktiraćemo vas u najkraćem mogućem roku!', 3),
(276, 'form_error', 'Vaš e-mail nije uspešno poslat, verovatno niste samo Štiklirali pregled koji se nalazi ispod forme, molimo pokušajte ponovo.', 3),
(277, 'form_error', 'Entschuldigung, beim senden Ihrer E-Mail ist ein fehler aufgetreten. Möglicherweise haben sie die umfrage unten nicht abgeschlossen. Versuchen sie es erneut.', 2),
(278, 'form_error', 'Sorry there was an error sending your email, maybe you just not completed survey below, try again.', 1),
(279, 'form2_success', 'Posted your message successfully!', 1),
(280, 'form2_success', 'Ihre Nachricht wurde erfolgreich gesendet.', 2),
(281, 'form2_success', 'Poruka je uspešno poslata!', 3),
(282, 'form2_error', 'Poruka nije uspešno poslata, možda niste samo štiklirali pregled ispod forme. Molimo pokušajte ponovo!', 3),
(283, 'form2_error', 'Sorry, you didn\'t post message successfully, maybe you just not completed this survey below. Try again!', 1),
(284, 'form2_error', 'Entschuldigung, Sie haben die Nachricht nicht erfolgreich verfasst. Vielleicht haben Sie diese Umfrage unten nicht abgeschlossen. Versuchen Sie es nochmal!', 2),
(296, 'job-engineer', 'Engineer', 1),
(297, 'job-engineer', 'Inženjer', 3),
(298, 'job-engineer', 'Ingenieur', 2),
(299, 'job-architect', 'Arhitekta', 3),
(300, 'job-architect', 'Architect', 1),
(301, 'job-architect', 'Architekt', 2),
(347, 'actually', 'Actually', 1),
(348, 'actually', 'Eigentlich', 2),
(349, 'actually', 'Aktuelno', 3),
(354, 'application_modal-header', 'Open positions', 1),
(355, 'application_modal-header', 'Otvorene Pozicije', 3),
(356, 'application_modal-header', 'Offene Positionen', 2),
(357, 'application_modal-subtitle', 'Join the Bumare team, apply now', 1),
(358, 'application_modal-subtitle', 'Pridružite se bumare timu, apliciraj sada', 3),
(359, 'application_modal-subtitle', 'Treten Sie dem Bumare-Team bei und bewerben Sie sich jetzt', 2),
(365, 'btn_back', 'Back', 1),
(367, 'btn_back', 'Zurück', 2),
(368, 'btn_back', 'Nazad', 3),
(369, 'empty_profile_message', 'Sorry, but we do not have any profile to offer for employers at this moment. Try later!', 1),
(370, 'empty_profile_message', 'Leider haben wir derzeit kein profil, um arbeitgebern anzubieten. Versuche es später!', 2),
(371, 'empty_profile_message', 'Izvinjavamo se, trenutno nemamo ponuda za poslodavce. Pokušajte kasnije!', 3),
(372, 'empty_job_message', 'Sorry, but we do not have any job offer for you at this moment, try later!', 1),
(373, 'empty_job_message', 'Entschuldigung, aber wir haben derzeit kein stellenangebot für sie. Versuchen sie es später noch einmal!', 2),
(374, 'empty_job_message', 'Žao nam je, trenutno nemamo poslovnih ponuda za vas, pokušajte kasnije.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `cv_file_name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `is_public` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `message`, `jobTitle`, `phone`, `sent_at`) VALUES
(39, 'senos64@gmail.com', 'Senad Santic', 'Trying to send something through email. We\'ll see how this goes.', 'Nurse', '', '2019-01-02 14:10:55'),
(40, 'elma.dz.b@gmail.com', 'Elma Dzaferbegovic', 'Ocekujem Vas odgobor', 'Doctor', '', '2019-01-23 21:00:01'),
(45, 'allisonosavrgonzalez@aol.com', 'Allison', 'Hey, love your site.  I have a site kind of like yours and until recently I was struggling to get visitors, maybe you are to.  \r\n\r\nI stumbled upon this new option and it made the difference in the world for me.  Perhaps it will help you to.  \r\n\r\nhttps://besttraffic.icu/up?=bumare.de\r\n\r\nAllison\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n361 Southwest Drive Suite #731 Jonesboro, AR 72401\r\n\r\nNot the right commercial message for you?  All good, we donâ€™t\' want to bother you, please opt out here:  https:/besttraffic.icu/unsubscribe.php?site=bumare.de \r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Doctor', '573-738-8918', '2019-02-19 23:51:51'),
(46, 'rosamann@mail.com', 'Rosa', 'Hallo, ich mochte in Ihrer Firma als freiwilliger arbeiten, konnen Sie mir etwas anbieten? \r\nein bisschen uber mich:https://about.me/rosa.mann/', 'Doctor', '89393759993', '2019-03-08 03:09:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_lang`
--
ALTER TABLE `categories_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_id`
--
ALTER TABLE `languages_id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories_lang`
--
ALTER TABLE `categories_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `languages_id`
--
ALTER TABLE `languages_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `languages_id`
--
ALTER TABLE `languages_id`
  ADD CONSTRAINT `languages_id_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `categories_lang` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
