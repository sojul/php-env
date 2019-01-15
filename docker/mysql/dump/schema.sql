SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `poe` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `poe` ;

-- -----------------------------------------------------
-- Table `poe`.`training_course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`training_course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NULL,
  `description` TEXT NULL,
  `duration` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `poe`.`trainer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`trainer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `poe`.`class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`class` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NULL,
  `description` TEXT NULL,
  `start_at` DATE NULL,
  `end_at` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `poe`.`training_session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`training_session` (
  `id` INT NOT NULL,
  `class_id` INT NOT NULL,
  `training_course_id` INT NOT NULL,
  `trainer_id` INT NULL,
  `start_at` DATETIME NULL,
  `end_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_training_session_class`
    FOREIGN KEY (`class_id`)
    REFERENCES `poe`.`class` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_training_session_training_course1`
    FOREIGN KEY (`training_course_id`)
    REFERENCES `poe`.`training_course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_training_session_trainer1`
    FOREIGN KEY (`trainer_id`)
    REFERENCES `poe`.`trainer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_training_session_class_idx` ON `poe`.`training_session` (`class_id` ASC);

CREATE INDEX `fk_training_session_training_course1_idx` ON `poe`.`training_session` (`training_course_id` ASC);

CREATE INDEX `fk_training_session_trainer1_idx` ON `poe`.`training_session` (`trainer_id` ASC);


-- -----------------------------------------------------
-- Table `poe`.`trainee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`trainee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `age` INT NULL,
  `date_of_birth` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `poe`.`trainee_classes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`trainee_classes` (
  `trainee_id` INT NOT NULL,
  `class_id` INT NOT NULL,
  PRIMARY KEY (`trainee_id`, `class_id`),
  CONSTRAINT `fk_trainee_has_class_trainee1`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `poe`.`trainee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trainee_has_class_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `poe`.`class` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_trainee_has_class_class1_idx` ON `poe`.`trainee_classes` (`class_id` ASC);

CREATE INDEX `fk_trainee_has_class_trainee1_idx` ON `poe`.`trainee_classes` (`trainee_id` ASC);


-- -----------------------------------------------------
-- Table `poe`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poe`.`attendance` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `training_session_id` INT NOT NULL,
  `trainee_id` INT NOT NULL,
  `date` DATE NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_attendance_training_session1`
    FOREIGN KEY (`training_session_id`)
    REFERENCES `poe`.`training_session` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_attendance_trainee1`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `poe`.`trainee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_attendance_training_session1_idx` ON `poe`.`attendance` (`training_session_id` ASC);

CREATE INDEX `fk_attendance_trainee1_idx` ON `poe`.`attendance` (`trainee_id` ASC);


CREATE TABLE IF NOT EXISTS `poe`.`logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `severity` tinyint(4) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO trainee (id, first_name, last_name, age, date_of_birth)
  VALUES
    (1, 'Jonathan', 'CLANCY', null, null),
    (2, 'Valentin', 'DERACHE', null, null),
    (3, 'Romain', 'DUCREUX', null, null),
    (4, 'Thomas', 'FORESTI', null, null),
    (5, 'Faycal', 'HAMMICHE', null, null),
    (6, 'Ibrahim', 'KOUOH-SEIDOU', null, null),
    (7, 'Belal', 'MESLEM', null, null),
    (8, 'Mohamed Amine', 'MIH', null, null),
    (9, 'Gregory', 'MORET', null, null),
    (10, 'Ludovic', 'PERA', null, null),
    (11, 'Jean-CLaude', 'Van Dam', 25, '1991-01-01'),
    (12, 'Jean-Philipe', 'Maurice', 26, '1990-02-02'),
    (13, 'Jean-Pascale', 'Ricard', 25, '1991-01-30'),
    (14, 'Jean-Stéphane', 'Du four', 26, '1990-01-05'),
    (15, 'Jean-Louis', 'David', 27, '1992-04-04'),
    (16, 'Jean-Christophe', 'Brassard', 22, '1994-06-06'),
    (17, 'Jean-Charles', 'Dupond', 30, '1986-07-07'),
    (18, 'Jean-Baptiste', 'Guy', '20', null),
    (19, 'Jean-David', 'Channel', '21', null),
    (20, 'Jean-Jacques', 'Rousseau', null, '1990-06-06'),
    (21, 'Jean-Luc', 'Mélenchon', null, '1993-04-20'),
    (22, 'Jean-Marie', 'Bigard', null, '1998-09-09'),
    (23, 'Jean-René', 'La taupe', null, null),
    (24, 'Jean-Sébastien', 'Tartoraisin', null, null),
    (25, 'Jean-Yves', 'Gilbert', null, null),
    (26, 'Jean-Pierre', 'Foucault', null, null),
    (27, 'Jean', 'Dujardin', null, null)
    ON DUPLICATE KEY UPDATE id=id;

INSERT INTO class (id, name, start_at, end_at)
values
	(1, 'POE 2014', '2014-06-01', '2014-10-01'),
	(2, 'POE 2015', '2015-06-01', '2015-10-01'),
	(3, 'POE 2016', '2016-06-01', '2016-10-01'),
	(4, 'POE 2015', '2014-10-01', '2015-02-01')
	ON DUPLICATE KEY UPDATE id=id;

INSERT INTO trainee_classes VALUES
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 2),
	(19, 2),
	(26, 1),
	(19, 1),
	(1, 3),
	(2, 3),
	(3, 3),
	(4, 3),
	(5, 3),
	(6, 3),
	(7, 3),
	(8, 3),
	(9, 3),
	(10, 3),
	(22, 4),
	(23, 4),
	(26, 4),
	(27, 4)
	ON DUPLICATE KEY UPDATE trainee_id=trainee_id and class_id=class_id;


INSERT INTO training_course (id, name, duration)
  VALUES
    (1, 'Introduction Cursus', null),
    (2, 'Communication et savoir-être en entreprise', null),
    (3, 'Gestion de versions avec Git ', null),
    (4, 'Outillage du développeur Front-End', null),
    (5, 'Technologies Web : HTML /CSS', null),
    (6, 'Accessibilité et Bonnes Pratiques', null),
    (7, 'Responsive Web Design', null),
    (8, 'Javascript', null),
    (9, 'Tests Unitaires Front-End', null),
    (10, 'Langage SQL avec MySQL', 8),
    (11, 'POO et développement PHP', null),
    (12, 'Les principaux Design Patterns PHP', null),
    (13, 'Symfony : fondamentaux et techniques avancées', null),
    (14, 'Développement avec Drupal 7/8', null),
    (15, 'Développement avec PIM PHP', null),
    (16, 'Tests Automatisés et Intégration Continue PHP', null),
    (19, 'Cycle de vie et méthodologie projet', null),
    (20, 'Réalisation d\'un projet', null)
    ON DUPLICATE KEY UPDATE id=id;

INSERT INTO trainer (id, first_name, last_name)
values
	(1, 'Fabien', 'Salles'),
	(2, 'Paul', null),
	(3, 'Jean-Pierre', null)
	ON DUPLICATE KEY UPDATE id=id;

INSERT INTO training_session VALUES
	(1, 2, 1, 2, null, null),
	(2, 3, 1, 2, null, null),
	(3, 3, 2, 2, null, null),
	(4, 3, 4, null, null, null),
	(5, 3, 5, null, null, null),
	(6, 3, 5, null, null, null),
	(7, 3, 10, 1, null, null);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
