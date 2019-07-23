-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2019 at 10:03 AM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.2.7

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
(2, 'Deutchland'),
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
(65, 'heading1', 'MÃ¶chten Sie in Deutschland arbeiten ?', 2),
(66, 'heading2', 'Wir kÃ¶nnen es fÃ¼r sie ohne jede Kosten realisieren!', 2),
(67, 'four', 'Kontaktieren sie uns', 2),
(68, 'info', 'Ãœber uns', 2),
(69, 'employers', 'FÃ¼r Arbeitgeber', 2),
(70, 'welcome', 'Willkommen', 2),
(71, 'subtitle', 'Professioneller und sicherer Weg, Krankenschwester oder Arzt in Deutschland zu werden.', 2),
(72, 'b2_title1', 'FÃ¼llen Sie zuerst das unten angegebene Kontaktformular aus', 2),
(73, 'b2_title2', 'Unsere Dienstleistungen sind vÃ¶llig kostenlos', 2),
(74, 'b2_title3', 'Ihr Traumjob ist jetzt erreichbar', 2),
(75, 'b2_body1', 'Kontaktieren Sie uns! Senden Sie Ihren Lebenslauf sowie das Bewerbungsschreiben zu', 2),
(76, 'b2_body2', 'Es fallen keine zusÃƒÂ¤tzlichen GebÃƒÂ¼hren an! Wir bieten UnterstÃƒÂ¼tzung bei der Weiterbildung, sowie Suche der Unterkunft in Deutschland an', 2),
(77, 'b2_body3', 'Bumare bietet neue MÃƒÂ¶glichkeiten. Nutzen Sie Ihre Chance! Mit uns haben Sie einen Freund - Bumare Team!', 2),
(78, 'more_info', 'Arbeiten Sie mit Fachleuten und hochwertigen medizinischen GerÃƒÂ¤ten(mehr darÃƒÂ¼ber)', 2),
(79, 'form-header', 'Kontaktieren sie uns', 2),
(80, 'formp', 'FÃ¼llen Sie dieses Formular aus, wenn Sie interessiert sind, wir freuen uns auf ihre Anmeldung', 2),
(81, 'name', 'Name', 2),
(82, 'email', 'E-mail', 2),
(83, 'jobTitle', 'Berufsbezeichnung', 2),
(84, 'phone', 'Telefonnummer', 2),
(85, 'message', 'Nachricht', 2),
(86, 'submit', 'Senden', 2),
(87, 'info-title', 'WÃ¤hlen sie uns aus', 2),
(88, 'info-subtitle', 'Warum sollten Sie uns wÃ¤hlen?', 2),
(89, 'b4_title1', 'Bewerbungsunterlagen', 2),
(90, 'b4_title2', 'Schneller Service ', 2),
(91, 'b4_title3', 'Beste Stellenangebote', 2),
(92, 'b4_title4', 'Attraktive Partner', 2),
(93, 'b4_title5', 'Transport', 2),
(94, 'b4_title6', 'Personal Coaching', 2),
(95, 'b4_body1', 'Verbesserung und Aktualisierung des Lebenslaufs ', 2),
(96, 'b4_body2', 'Die neuesten Stellenangebote fÃƒÂ¼r Sie', 2),
(97, 'b4_body3', 'Wir haben die Stellenangebote fÃƒÂ¼r Ihre Anforderungen optimiert', 2),
(98, 'b4_body4', 'Die besten Arbeitgeber im Gesundheitswesen', 2),
(99, 'b4_body5', 'UnterstÃƒÂ¼tzung bei Transport und Unterkunft', 2),
(100, 'b4_body6', 'Vorbereitung fÃƒÂ¼r das BewerbungsgesprÃƒÂ¤ch', 2),
(101, 'more_info_heading1', 'Die neueste medizinische AUSRÃƒÅ“STUNG', 2),
(102, 'more_info_heading2', 'Arbeite mit profis', 2),
(103, 'employers_body2', 'NaÅ¡a stranica i oglaÅ¡avanje na istoj je u potpunosti besplatno. Spojite se sa radnicima i moÅ¾da veÄ‡ sutra meÄ‘u njima pronaÄ‘ete kadar koji je Vama potreban.', 3),
(104, 'employers_body3', 'LijeÄnici i medicinske sestre Äekaju na VaÅ¡u zdravstvenu ustanovu. Javite nam se, i mi Ä‡emo Vam pomoÄ‡i u pronalasku radnika. Na Vama je samo da ispunite dole navedeni obrazac.', 3),
(105, 'more_info_content2', 'Das Department of Veterans Affairs rekrutiert fÃƒÂ¼r eine Position, 2. Krankenschwester/Krankenpfleger, die in diesem Gesundheitszentrum in Rocky Hill, CT. Diese Position wird durchschnittlich 24 Stunden pro Woche betragen. Alle Bewerber mÃƒÂ¼ssen einen Le', 2),
(106, 'employers_heading', 'FÃ¼r Arbeitgeber', 2),
(107, 'employers_subtitle', 'Jetzt Anmelden!', 2),
(108, 'employers_title1', 'Sie benÃƒÂ¶tigen zusÃƒÂ¤tzliches Fachpersonal?', 2),
(109, 'employers_title2', 'Kostenlose Mitgliedschaft', 2),
(110, 'employers_title3', 'Bumare verbindet miteinander', 2),
(111, 'employers_body1', 'Bumare hilft Ihnen dabei und verbindet Sie mit den besten FachkrÃƒÂ¤ften', 2),
(112, 'employers_body2', 'Ihre Anmeldung ist vÃƒÂ¶llig kostenlos. Kontaktieren Sie uns! Wir kÃƒÂ¼mmern uns um die gewÃƒÂ¼nschte VerstÃƒÂ¤rkung fÃƒÂ¼r Ihr Team', 2),
(113, 'employers_body3', 'Einfach und schnell zum erfahrenen und qualifizierten Personal', 2),
(114, 'employers_more_info', '-', 2),
(115, 'employers_form-header', 'Kontaktieren sie uns', 2),
(116, 'employers_formp', 'FÃƒÂ¼llen Sie das Formular aus. Wir freuen uns auf Ihre Anmeldung', 2),
(117, 'employers_name', 'Name', 2),
(118, 'employers_email', 'E-mail', 2),
(119, 'employers_message', 'Nachricht', 2),
(120, 'employers_submit', 'Senden', 2),
(121, 'job-doctor', 'Arzt', 2),
(122, 'job-nurse', 'Krankenschwester', 2),
(123, 'employers_body1', 'Ukoliko imate posao ali Vam nedostaje radnika, te nemate moguÄ‡nosti doÄ‡i do istih. Bumare Ä‡e Vam pomoÄ‡i i spojiti Vas sa najboljim radnicima iz Bosne i Hercegovine, Hrvatske i Srbije.', 3),
(124, 'employers_title3', 'Rad u NjemaÄkoj', 3),
(125, 'employers_title2', 'Besplatno se uÄlanite', 3),
(126, 'employers_heading', 'Za poslodavce', 3),
(127, 'employers_subtitle', 'Prijavite se!', 3),
(128, 'employers_title1', 'Poslodavac ste, trebate radnike?', 3),
(129, 'b4_body2', 'Budite informisani o najnovijim i najinteresantnijim prilikama', 3),
(130, 'b4_body3', 'Optimizirali smo ponude za posao kako bi ispunili VaÅ¡e zahtjeve', 3),
(131, 'b4_body1', 'AÅ¾uriramo VaÅ¡ CV zajedno sa svim potrebnim dokumentima za prijavu', 3),
(132, 'b4_title6', 'Priprema intervjua', 3),
(133, 'b4_title5', 'Transport', 3),
(134, 'b4_title4', 'Atraktivni partneri', 3),
(135, 'b4_title3', 'Najbolja ponuda za posao', 3),
(136, 'b4_title2', 'Brza usluga', 3),
(137, 'b4_title1', 'CV pregled', 3),
(138, 'info-subtitle', 'ZaÅ¡to smo mi pravi partner za vas', 3),
(139, 'info-title', 'Izaberite nas', 3),
(140, 'submit', 'PoÅ¡alji/Potvrdi', 3),
(141, 'placeholder_form', 'Opciono polje...', 3),
(142, 'phoneNumber', 'Broj Telefona', 3),
(143, 'message', 'Poruka', 3),
(144, 'email', 'E-mail', 3),
(145, 'jobTitle', 'Zanimanje', 3),
(146, 'name', 'Ime i Prezime', 3),
(147, 'formp', 'Popunite obrazac! Radujemo se VaÅ¡em javljanju i saradnji.', 3),
(148, 'form-header', 'Kontaktirajte nas', 3),
(149, 'b2_body3', 'NjemaÄka viÅ¡e nije nedostÅ¾na: Bumare Vam otvara put ka boljoj buduÄ‡nosti. Iskoristite priliku, odluka je na Vama! U nama imate prijatelja - Bumare Team', 3),
(150, 'b2_body2', 'Usluga je besplatna: NaÅ¡a usluga je bez dodatnih troÅ¡kova. Nudimo moguÄ‡nost pronalaska radnog mjesta, doÅ¡kolovavanja (kurs njemaÄkog jezika), te olakÅ¡avamo proces pronalaska smjeÅ¡taja u NjemaÄkoj', 3),
(151, 'b2_body1', 'Å½elite Å½ivjeti i raditi u NjemaÄkoj? Kontaktirajte nas i ispunite obrazac u nastavku. PoÅ¡aljite nam svoj CV i motivacijsko pismo.', 3),
(152, 'b2_title1', 'Kontaktiraj nas!', 3),
(153, 'b2_title2', 'Usluga je besplatna!', 3),
(154, 'b2_title3', 'Posao iz snova nije nedostiÅ¾an!', 3),
(155, 'subtitle', 'Profesionalan i siguran naÄin da postanete doktor ili dio medicinskog osoblja u NjemaÄkoj', 3),
(156, 'employers', 'Za poslodavce', 3),
(157, 'welcome', 'Dobro doÅ¡li', 3),
(158, 'info', 'Saznajte viÅ¡e', 3),
(159, 'four', 'Kontaktiraj nas', 3),
(160, 'heading2', 'Mi to moÅ¾emo uÄiniti za Vas bez ikakvih troÅ¡kova!', 3),
(161, 'heading1', 'Da li bi voljeli Å½ivjeti i raditi u NjemaÄkoj ?', 3),
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
(174, 'employers_submit', 'PoÅ¡alji/Potvrdi', 3),
(180, 'job-doctor', 'Doktor', 3),
(183, 'job-nurse', 'Med. Sestra', 3),
(184, 'en_translation', 'Engleski', 3),
(199, 'b4_body4', 'PoveÅ¾ite se sa najboljim poslodavcima u zdravstvu', 3),
(200, 'b4_body5', 'Sa nama dobijate podrÅ¡ku za prevoz i smjeÅ¡taj', 3),
(203, 'b4_body6', 'Biti Ä‡ete pripremljeni za intevju uz pomoÄ‡ personaliziranog treninga', 3),
(273, 'form_success', 'Your email has been sent. We will get back to you as soon as possible!', 1),
(274, 'form_success', 'Ihre E-Mail wurde gesendet. Wir werden uns so schnell wie mÃ¶glich bei Ihnen melden!', 2),
(275, 'form_success', 'VaÅ¡ e-mail je poslat. KontaktiraÄ‡emo vas u najkraÄ‡em moguÄ‡em roku!', 3),
(276, 'form_error', 'VaÅ¡ e-mail nije uspeÅ¡no poslat, verovatno niste samo Å¡tiklirali pregled koji se nalazi ispod forme, molimo pokuÅ¡ajte ponovo.', 3),
(277, 'form_error', 'Entschuldigung, beim Senden Ihrer E-Mail ist ein Fehler aufgetreten. MÃ¶glicherweise haben Sie die Umfrage unten nicht abgeschlossen. Versuchen Sie es erneut.', 2),
(278, 'form_error', 'Sorry there was an error sending your email, maybe you just not completed survey below, try again.', 1),
(279, 'form2_success', 'Posted your message successfully!', 1),
(280, 'form2_success', 'Ihre Nachricht wurde erfolgreich gesendet.', 2),
(281, 'form2_success', 'Poruka je uspeÅ¡no poslata!', 3),
(282, 'form2_error', 'Poruka nije uspeÅ¡no poslata, moÅ¾da niste samo Å¡tiklirali pregled ispod forme. Molimo pokuÅ¡ajte ponovo!', 3),
(283, 'form2_error', 'Sorry, you didn\'t post message successfully, maybe you just not completed this survey below. Try again!', 1),
(284, 'form2_error', 'Entschuldigung, Sie haben die Nachricht nicht erfolgreich verfasst. Vielleicht haben Sie diese Umfrage unten nicht abgeschlossen. Versuchen Sie es nochmal!', 2),
(296, 'job-engineer', 'Engineer', 1),
(297, 'job-engineer', 'InÅ¾enjer', 3),
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
(358, 'application_modal-subtitle', 'PridruÅ¾ite se bumare timu, apliciraj sada', 3),
(359, 'application_modal-subtitle', 'Treten Sie dem Bumare-Team bei und bewerben Sie sich jetzt', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `languages_id`
--
ALTER TABLE `languages_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

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
