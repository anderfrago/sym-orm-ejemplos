<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230127085653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Create product <-- los insert
        $this->addSql("insert into category (id, name) values (1, 'miscellaneous');");
      
        $this->addSql("insert into product (id, name, price, description, category_id) values (1, 'Wine - Touraine Azay - Le - Rideau', '€78630,26', 'Displaced avulsion fracture of left ischium, init', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (2, 'Flavouring Vanilla Artificial', '€89723,85', 'Insect bite (nonvenomous) of left shoulder, init encntr', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (3, 'Liquid Aminios Acid - Braggs', '€37061,00', 'Breakdown (mechanical) of infusion catheter', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (4, 'Bread - Granary Small Pull', '€30028,25', 'Jump from burning bldg in uncontrolled fire, init', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (5, 'Kaffir Lime Leaves', '€7177,30', 'Erythrasma', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (6, 'Sage Derby', '€52804,81', 'Mech compl of internal fixation device of vertebrae, init', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (7, 'Soup - French Onion', '€24669,77', 'Corros first deg mult sites of head, face, and neck, sequela', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (8, 'Soup - Canadian Pea, Dry Mix', '€67189,70', 'Other disorders of bone development and growth, humerus', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (9, 'Pea - Snow', '€94421,12', 'Malignant neoplasm of overlapping sites of lip', 1);");
        $this->addSql("insert into product (id, name, price, description, category_id) values (10, 'Pepper - Cayenne', '€59286,27', 'Age-rel osteopor w crnt path fx, r ank/ft, 7thD', 1);");

        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product DROP category_id');
    }
}
