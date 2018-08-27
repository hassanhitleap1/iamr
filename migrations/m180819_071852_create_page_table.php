<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m180819_071852_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title_en' => $this->string(300),
            'title_de' => $this->string(300),
            'title_fr' => $this->string(300),
            'title_it' => $this->string(300),
            'title_ar' => $this->string(300),
            'description_en' => $this->text(),
            'description_de' => $this->text(),
            'description_fr' => $this->text(),
            'description_it' => $this->text(),
            'description_ar' => $this->text(),
            'key_page' => $this->string(300),
        ], $tableOptions);

        $this->insert('page', array(
            'title_en' => 'You pay a little put it means a lot to us Help us to build a developed society by building a secure school',
            'title_de' => 'Wir sammeln das Geld für den Schulbau',
            'title_fr' => "nous recueillons l'argent pour la construction de l'école",
            'title_it' => 'stiamo raccogliendo i soldi per costruire la scuola',
            'title_ar' => 'أنت تدفع القليل يعني أنه الكثير بالنسبة لنا ساعدنا في بناء مجتمع متطور عن طريق بناء مدرسة آمنة',
            'description_en' => '<p>We are a voluntary, non-profit organization that aims to develop a conscious society. Our goal is to strength the basic element of community development which is education,and we are trying to do that by building a sophisticated, professional and effective school that graduate a clever and secure generation. This school consist of many floors; The basement which is sports floor.Individual and collective, physical and mental, amusing and strong sports.And also there is a room for the kids games. Sport is the kind of activity that helps students release their energy, decrease the violence phenomena, enteract with each other and to help them develop their mental and physical abilities. The first floor which include the reception,the manegment offices to easiest enteract with students and there loco parentis. The library which play a very important rool in education and self learning. and it contains the garden too. The second floor for the elementary school classes. The third floor for the secondary school classes. The forth floor for high school classes. And finaly the fifth floor : it includes two laboratories one for science and the other for computer class, And of course the laboratories are very important due to the fact that they play a very good part of helping kids understand the scientific words, and activate the applied side</p>
                ',
            'description_de' => '<p>Wir sind eine freiwillige, gemeinn&uuml;tzige Organisation, deren Ziel es ist, eine bewusste Gesellschaft zu entwickeln, die eine Schule f&uuml;r eine sichere Generation aufbauen will und unser Ziel ist die Entwicklung. Das Lehrerprojekt ist das Basisprojekt, das auf dieser Anwendung basiert und eine effektive Schule f&uuml;r effektive Gemeindeentwicklung bildet</p>
            <p>Eine Schule besteht aus vielen Stockwerken; ein Keller und seine f&uuml;r Sport (Fu&szlig;ball und Basketball Ball Felder) und ein Raum f&uuml;r eine der Kinder Spiele.</p>
            <p>Der Sport ist die Art von Aktivit&auml;t, die die Schule dem Sch&uuml;ler gibt, um ihnen dabei zu helfen, ihre Energie freizusetzen und die Gewaltph&auml;nomene zu verringern und miteinander in Einklang zu treten.</p><p>Und um ihnen zu helfen, ihre geistigen und k&ouml;rperlichen F&auml;higkeiten zu entwickeln. Das erste Stockwerk: Es beinhaltet die Rezeption und die Verwaltungsb&uuml;ros, um es jedem, der eine Frage zur Schule hat, leicht zu beantworten. Dazu geh&ouml;rt auch die Bibliothek, die eine sehr wichtige Rolle spielt in der Schule und im Garten.</p>

                <p>Der zweite Stock: f&uuml;r Grundschulklassen Der dritte Stock: f&uuml;r Sekundarschulklassen Der vierte Stock f&uuml;r High-School-Klassen Und fein der f&uuml;nfte Stock: Es umfasst Schlepplabors eins f&uuml;r die Wissenschaft und das andere f&uuml;r Computer-Klasse Und fein die f&uuml;nfte Etage: es umfasst Schlepplabors eins f&uuml;r die Wissenschaft und das andere f&uuml;r die Computerklasse Und nat&uuml;rlich sind die Labors sehr wichtig, weil sie sehr gut dazu beitragen, dass Kinder die wissenschaftlichen W&ouml;rter verstehen und die angewandte Seite aktivieren.</p>
                ',
                            'description_fr' => '<p>Nous sommes une organisation b&eacute;n&eacute;vole &agrave; but non lucratif qui vise &agrave; d&eacute;velopper une soci&eacute;t&eacute; consciente qui vise &agrave; construire une &eacute;cole pour une g&eacute;n&eacute;ration s&eacute;curis&eacute;e et notre objectif est le d&eacute;veloppement. Le Projet des enseignants est le projet de base bas&eacute; sur cette application de construction d&#39;une &eacute;cole efficace pour le d&eacute;veloppement communautaire efficace</p>

                <p>Une &eacute;cole se compose de plusieurs &eacute;tages; un sous-sol et son pour les sports (terrains de football et de basket-ball) et une salle pour les jeux d&#39;enfants.</p>

                <p>Le sport est le genre d&#39;activit&eacute; que l&#39;&eacute;cole donne aux &eacute;l&egrave;ves pour les aider &agrave; lib&eacute;rer leur &eacute;nergie et &agrave; diminuer les ph&eacute;nom&egrave;nes de violence et &agrave; entrer en action les uns avec les autres.</p>

                <p>Et pour les aider &agrave; d&eacute;velopper leurs capacit&eacute;s mentales et physiques Le premier &eacute;tage: il comprend les bureaux d&#39;accueil et de gestion pour permettre &agrave; quiconque a une question sur l&#39;&eacute;cole d&#39;obtenir une r&eacute;ponse. Il comprend &eacute;galement la biblioth&egrave;que qui joue un r&ocirc;le tr&egrave;s important &agrave; l&#39;&eacute;cole et au jardin.</p>

                <p>Le deuxi&egrave;me &eacute;tage: pour les classes de l&#39;&eacute;cole primaire Le troisi&egrave;me &eacute;tage: pour les classes de lyc&eacute;e Le quatri&egrave;me &eacute;tage pour les classes de lyc&eacute;e Et finement le cinqui&egrave;me &eacute;tage: il comprend deux remorqueurs un pour la science et l&#39;autre pour la classe d&#39;informatique Et finement le cinqui&egrave;me &eacute;tage: Les laboratoires de remorquage un pour la science et l&#39;autre pour la classe d&#39;informatique Et bien s&ucirc;r, les laboratoires sont tr&egrave;s importants en raison du fait qu&#39;ils jouent un r&ocirc;le tr&egrave;s important d&#39;aider les enfants &agrave; comprendre les mots scientifiques, et activer le c&ocirc;t&eacute; appliqu&eacute;.</p>
                ',
                            'description_it' => '<p>Siamo un&#39;organizzazione volontaria e senza scopo di lucro che mira a sviluppare una societ&agrave; consapevole che mira a costruire una scuola per una generazione sicura e il nostro obiettivo &egrave; lo sviluppo. The Teacher Project &egrave; il progetto di base basato su questa applicazione che costruisce una scuola efficace per uno sviluppo efficace della comunit&agrave;</p>

                <p>Una scuola consiste di molti piani; un seminterrato e il suo per lo sport (campi da calcio e pallacanestro) e una sala per i giochi per bambini.</p>

                <p>Lo sport &egrave; il tipo di attivit&agrave; che la scuola impartisce agli studenti per aiutarli a liberare la loro energia e per diminuire i fenomeni di violenza e per entrare in azione tra loro.</p>

                <p>E per aiutarli a sviluppare le loro capacit&agrave; mentali e fisiche. Il primo piano: include gli uffici di accoglienza e gestione per rendere pi&ugrave; facile a chiunque abbia una domanda sulla scuola di ottenere una risposta. Include anche la biblioteca che svolge un ruolo molto importante a scuola e in giardino.</p>

                <p>Il secondo piano: per le classi di scuola elementare Il terzo piano: per le classi di scuola secondaria Il quarto piano per le classi di scuola superiore e finemente il quinto piano: comprende laboratori di rimorchio uno per la scienza e l&#39;altro per computer class E finemente il quinto piano: include laboratori di rimorchio uno per la scienza e l&#39;altro per la classe di computer E naturalmente i laboratori sono molto importanti perch&eacute; fanno molto del aiutare i bambini a capire le parole scientifiche e attivano il lato applicato.</p>
                ',
                            'description_ar' => '<p>نحن منظمة تطوعية غير ربحية تهدف إلى تطوير مجتمع واعٍ. هدفنا هو تعزيز العنصر الأساسي للتنمية المجتمعية وهو التعليم ، ونحن نحاول القيام بذلك عن طريق بناء مدرسة متطورة ومهنية وفعالة تخرج جيل ذكي وآمن. هذه المدرسة تتكون من عدة طوابق. الطابق السفلي الذي هو طابق الرياضة. رياضات فردية وجماعية ،الجسدية والعقلية، مسلية وقوية.وهناك أيضا غرفة ألعاب للأطفال. الرياضة هي نوع النشاط الذي يساعد الطلاب على الإفراج عن طاقتهم ، وتقليل ظاهرة العنف ، والتفاعل مع بعضهم البعض ، ومساعدتهم على تطوير قدراتهم العقلية والبدنية. الطابق الأول الذي يشمل الاستقبال ومكاتب الإدارة لتسهيل التفاعل مع الطلاب واولياء الامور. المكتبة التي تلعب دورا مهما جدا في التعليم والتعلم الذاتي. ويحتوي هذا الطابق على الحديقة أيضًا. الطابق الثاني لفصول التدريس الابتدائية. الطابق الثالث لفصول التدريس الثانوية. الطابق الرابع لفصول التدريس الثانوية. وأخيرًا الطابق الخامس: يضم مختبرين أحدهما للعلوم والآخرمختبر الكمبيوتر ، وبالطبع فإن المختبرات مهمة جدًا نظرًا لأنها تلعب دورًا جيدًا جدًا في مساعدة الأطفال على فهم الكلمات العلمية وتفعيل الجانب التطبيقي.</p>
                ',
            'key_page' => 'page_why',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');
    }
}
