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
            'title_en' => 'You pay a little but it is a lot for us helped us build a developed society by building a safe school',
            'title_de' => 'Sie zahlen ein wenig, aber es ist viel für uns, was uns beim Aufbau einer entwickelten Gesellschaft durch den Bau einer sicheren Schule geholfen hat',
            'title_fr' => "Vous payez un peu mais c’est beaucoup pour nous nous a aidés à construire une société développée en construisant une école sûre",
            'title_it' => "Paghi un po ', ma è molto per noi, ci ha aiutato a costruire una società sviluppata costruendo una scuola sicura",
            'title_ar' => 'أنت تدفع القليل لكنه الكثير بالنسبة لنا ساعدنا في بناء مجتمع متطور عن طريق بناء مدرسة آمنة',

            'description_en' => '<p>We are a voluntary non-profit organization that aims to develop a conscious society. &nbsp;Our goal is to foster the essential element of community development, which is education.<br />
            &nbsp;Our mission is to provide students with the latest curricula in accordance with international standards, in addition to providing programs to instill values ​​and establish a sense of belonging to their communities through community service activities, which are applied in the student&#39;s life and future. &nbsp;It encourages its children to learn continuously through various activities using modern techniques and competitions to motivate students to practice critical thinking and scientific research. &nbsp;Enable students to accept leadership and proactive roles for positive change in human life by interacting with the environment. &nbsp;The school is divided into several floors including a sports floor and contains several games suitable for children and youth, the administration floor and contains the offices of the principal and his staff. &nbsp;Safe yard and canteen</p>',

            'description_de' => '<p>Wir sind eine freiwillige gemeinn&uuml;tzige Organisation, die sich zum Ziel gesetzt hat, eine bewusste Gesellschaft zu entwickeln. Unser Ziel ist es, das wesentliche Element der Gemeindeentwicklung zu f&ouml;rdern, n&auml;mlich die Bildung.<br />
&nbsp;Unsere Mission ist es, den Sch&uuml;lern die neuesten Lehrpl&auml;ne gem&auml;&szlig; internationalen Standards zur Verf&uuml;gung zu stellen und Programme bereitzustellen, um Werte zu vermitteln und ein Gef&uuml;hl der Zugeh&ouml;rigkeit zu ihren Gemeinschaften durch gemeinn&uuml;tzige Aktivit&auml;ten zu schaffen, die im Leben und in der Zukunft der Sch&uuml;ler angewendet werden. Es ermutigt seine Kinder, durch verschiedene Aktivit&auml;ten mit modernen Techniken und Wettbewerben kontinuierlich zu lernen, um die Sch&uuml;ler zu motivieren, kritisches Denken und wissenschaftliche Forschung zu betreiben. Erm&ouml;glichen Sie den Sch&uuml;lern, durch Interaktion mit der Umwelt F&uuml;hrungsaufgaben und proaktive Rollen f&uuml;r eine positive Ver&auml;nderung im menschlichen Leben zu &uuml;bernehmen. Die Schule ist in mehrere Stockwerke unterteilt, einschlie&szlig;lich eines Sportbodens, und enth&auml;lt mehrere f&uuml;r Kinder und Jugendliche geeignete Spiele, den Verwaltungsbereich und die B&uuml;ros des Direktors und seiner Mitarbeiter. Sicherer Hof und Kantine</p>',
                            'description_fr' => '<p>Nous sommes une organisation &agrave; but non lucratif volontaire qui vise &agrave; d&eacute;velopper une soci&eacute;t&eacute; consciente. Notre objectif est de promouvoir l&rsquo;&eacute;l&eacute;ment essentiel du d&eacute;veloppement communautaire, &agrave; savoir l&rsquo;&eacute;ducation.<br />
                            &nbsp;Notre mission est de fournir aux &eacute;tudiants les programmes les plus r&eacute;cents conform&eacute;ment aux normes internationales, en plus de proposer des programmes visant &agrave; inculquer des valeurs et &agrave; &eacute;tablir un sentiment d&#39;appartenance &agrave; leur communaut&eacute; par le biais d&#39;activit&eacute;s de service communautaire, qui sont appliqu&eacute;es dans la vie et l&#39;avenir de l&#39;&eacute;tudiant. Il encourage ses enfants &agrave; apprendre continuellement &agrave; travers diverses activit&eacute;s utilisant des techniques modernes et des comp&eacute;titions pour motiver les &eacute;tudiants &agrave; pratiquer la pens&eacute;e critique et la recherche scientifique. Permettez aux &eacute;tudiants d&#39;accepter le leadership et les r&ocirc;les proactifs pour un changement positif dans la vie humaine en interagissant avec l&#39;environnement. L&#39;&eacute;cole est divis&eacute;e en plusieurs &eacute;tages, y compris un sol sportif et contient plusieurs jeux adapt&eacute;s aux enfants et aux jeunes, un &eacute;tage administratif et contient les bureaux du directeur et de son personnel. Coffre et cantine</p>',
                            'description_it' => '<p>Siamo un&#39;organizzazione volontaria senza scopo di lucro che mira a sviluppare una societ&agrave; consapevole. Il nostro obiettivo &egrave; promuovere l&#39;elemento essenziale dello sviluppo della comunit&agrave;, che &egrave; l&#39;educazione.<br />
                            &nbsp;La nostra missione &egrave; fornire agli studenti i curricula pi&ugrave; recenti in conformit&agrave; con gli standard internazionali, oltre a fornire programmi per instillare valori e stabilire un senso di appartenenza alle loro comunit&agrave; attraverso attivit&agrave; di servizio alla comunit&agrave;, che vengono applicate nella vita e nel futuro dello studente. Incoraggia i suoi figli a imparare continuamente attraverso varie attivit&agrave; usando tecniche e competizioni moderne per motivare gli studenti a praticare il pensiero critico e la ricerca scientifica. Consentire agli studenti di accettare la leadership e ruoli proattivi per un cambiamento positivo nella vita umana interagendo con l&#39;ambiente. La scuola &egrave; divisa in diversi piani, incluso un campo sportivo e contiene diversi giochi adatti a bambini e ragazzi, il piano amministrativo e contiene gli uffici del preside e del suo staff. Cortile e mensa sicuri</p>',
                            'description_ar' => '<p>نحن منظمة تطوعية غير ربحية تهدف إلى تطوير مجتمع واعي. هدفنا هو تعزيز العنصر الأساسي للتنمية المجتمعية وهو التعليم ، &nbsp;نحاول القيام بذلك عن طريق إنشاء مؤسسة تعليمية لإعداد جيل مُخلص، &nbsp;دائم التعلُّم، مُتأملٌ مُبدِع، مُفكر نَشطْ، قائدٌ فعَّال، مُؤثر، وقادر على ترك أثر إيجابيّ لدى الآخرين<br />
                            رسالتنا أنْ نوفّر للطُلاب أحدث المناهج الدراسيّة وفقاً للمعايير العالميّة، بالإضافة إلى توفير برامج لغرس القيم وترسيخ حِسْ الانتماء لمجتمعاتهم وذلك من خلال أنشطة لخدمة المجتمع، والتي يتم تطبيقها في حياة الطالب ومستقبله. &nbsp;وتشجع أبناءها على التعلُّم المستمر عن طريق أنشِطة متنوعة تستخدم تقنيات حديثة ومسابقات لتحفيز الطلبة على ممارسة التفكير الناقد والبحث العلميّ. تمكين الطلبة أيضا من قبول أدوار قيادية ومُبادِرة لإحداث تغيير إيجابي في الحياة البشريّة بواسطة التفاعل مع المحيط. تقسم المدرسه الى عدة طوابق منها طابق الرياضة وتحتوي على عدة العاب تناسب الاطفال والشباب ،طابق الآدارة ويحتوي على مكاتب المدير وموظفيه طابق &nbsp;يحتوي على &nbsp;مكتبه ومختبر الحاسوب والعلوم ومشغل للتربية الفنية والمهنية ، طابق للصفوف الإبتدائية وطابق للصفوف الإعدادية والأخير للصفوف الثانوية اما المساحة الخارجية للمدرسة &nbsp;تحتوي على ساحة آمنة ومقصف</p>
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
