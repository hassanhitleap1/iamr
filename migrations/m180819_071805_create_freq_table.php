<?php

use yii\db\Migration;

/**
 * Handles the creation of table `freq`.
 */
class m180819_071805_create_freq_table extends Migration
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
        $this->createTable('freq', [
            'id' => $this->primaryKey(),
            'id_html' => $this->string(60),
            'prg_en' => $this->string(300),
            'prg_de' => $this->string(300),
            'prg_it' => $this->string(300),
            'prg_ar' => $this->string(300),
            'prg_fr' => $this->string(300),
            'collapse_en' => $this->text(),
            'collapse_it' => $this->text(),
            'collapse_de' => $this->text(),
            'collapse_fr' => $this->text(),
            'collapse_ar' => $this->text(),

        ],$tableOptions);
        $this->insert('freq', array(
            'id' => 'make-maony',
            'id_html' => 'how-to-make-money',
            'prg_en' => 'wie man Geld verdient',
            'prg_de' => 'come fare soldi attraverso',
            'prg_it' => 'come fare soldi attraverso',
            'prg_ar' => ' youarearich كيفية كسب المال من خلال',
            'prg_fr' => "comment gagner de l' argent grâce à ",
            'collapse_en' => 'You can register at the "youarearich" site and pay the donation amount and get a referral link and publish it among your friends, blogs and social networking sites so that you get each referral link $ 20 donated',
            'collapse_it' => "Puoi registrarti al sito ' youarearich'e pagare l'importo della donazione e ottenere un link di riferimento e pubblicarlo tra i tuoi amici, blog e siti di social network in modo che tu possa ricevere ogni link di riferimento $ 20 donati",
            'collapse_de' => 'Sie können sich auf der "youarearich" -Seite registrieren und den Spendenbetrag zahlen und einen Empfehlungslink erhalten und ihn unter Ihren Freunden, Blogs und Social-Networking-Sites veröffentlichen, so dass Sie jedem Empfehlungslink 20 $ gespendet bekommen',
            'collapse_fr' => 'Vous pouvez vous enregistrer sur le site "youarearich" et payer le montant du don et obtenir un lien de référence et le publier parmi vos amis, blogs et sites de réseautage social afin que vous obtenez chaque lien de parrainage 20 $ donnés',
            'collapse_ar' => 'يمكن تسجيل في موقع "youarearich" ودفع مبلغ التبرع والحصول على رابط الأحالة  ونشره بين اصدقاءك والمدونات ومواقع التواصل الاجتمعية بحيث تحصل على كل رابط احالة ٢٠ دولار تم التبرع له ',

        ));
        $this->insert('freq', array(
            'id_html' => 'referral-link',
            'prg_en' => 'How can I get a referral link',
            'prg_de' => 'Wie kann ich einen Empfehlungslink erhalten?',
            'prg_it' => 'Come posso ottenere un link di riferimento',
            'prg_ar' => 'كيف يمكنني الحصول ع رابط الأحالة ',
            'prg_fr' => 'Comment puis-je obtenir un lien de parrainage',
            'collapse_en' => 'Register on the site and donate the amount and then go to my account and then to the referral',
            'collapse_it' => "Registrati sul sito e donare l'importo e poi vai al mio account e poi al referral",
            'collapse_de' => 'Registrieren Sie sich auf der Website und spenden Sie den Betrag und gehen Sie dann zu meinem Konto und dann zur Überweisung',
            'collapse_fr' => 'Inscrivez-vous sur le site et donnez le montant puis rendez-vous sur mon compte puis sur la référence',
            'collapse_ar' => 'سجل في الموقع و تبرع بالمبلغ ومن ثم اذهب الى  حسابي ومن ثم الى الأحاله ',
        ));
 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('freq');
    }
}
