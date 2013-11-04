SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `modernmenu_ci` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `modernmenu_ci` ;

-- -----------------------------------------------------
-- Table `modernmenu_ci`.`RecipeAssociative`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`RecipeAssociative` (
  `idRecipeAssociative` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `IngredientID` INT NULL ,
  `RecipeID` INT NULL ,
  `UnitID` INT NULL ,
  `Amount` INT NULL ,
  PRIMARY KEY (`idRecipeAssociative`) ,
  UNIQUE INDEX `idRecipeAssociative_UNIQUE` (`idRecipeAssociative` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`Tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`Tags` (
  `idTags` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `TagName` VARCHAR(45) NULL ,
  PRIMARY KEY (`idTags`) ,
  UNIQUE INDEX `idTags_UNIQUE` (`idTags` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`TagsAssociative`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`TagsAssociative` (
  `idTags` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `RecipeID` INT NULL ,
  PRIMARY KEY (`idTags`) ,
  UNIQUE INDEX `idTags_UNIQUE` (`idTags` ASC) ,
  CONSTRAINT `fk_TagsAssociative__Tags1`
    FOREIGN KEY (`idTags` )
    REFERENCES `modernmenu_ci`.`Tags` (`idTags` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`recipe`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`recipe` (
  `idRecipe` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `Title` VARCHAR(45) NOT NULL ,
  `Description` TEXT NULL ,
  `SubmitterID` INT NULL ,
  `SubmitDateTime` DATETIME NULL ,
  PRIMARY KEY (`idRecipe`) ,
  UNIQUE INDEX `idRecipe_UNIQUE` (`idRecipe` ASC) ,
  CONSTRAINT `fk_recipe_IngredientAssociative1`
    FOREIGN KEY (`idRecipe` )
    REFERENCES `modernmenu_ci`.`RecipeAssociative` (`RecipeID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_Tags1`
    FOREIGN KEY (`idRecipe` )
    REFERENCES `modernmenu_ci`.`TagsAssociative` (`RecipeID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`UserDiets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`UserDiets` (
  `idUserDiets` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `UserID` INT NULL ,
  `DietaryConsiderationID` INT NULL ,
  PRIMARY KEY (`idUserDiets`) ,
  UNIQUE INDEX `idUserDiets_UNIQUE` (`idUserDiets` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`Ratings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`Ratings` (
  `idRatings` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `RecipeID` INT NULL ,
  `UserID` INT NULL ,
  `Rating` TINYINT NULL ,
  PRIMARY KEY (`idRatings`) ,
  INDEX `fk_Ratings_recipe1` (`RecipeID` ASC) ,
  UNIQUE INDEX `idRatings_UNIQUE` (`idRatings` ASC) ,
  CONSTRAINT `fk_Ratings_recipe1`
    FOREIGN KEY (`RecipeID` )
    REFERENCES `modernmenu_ci`.`recipe` (`idRecipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`User`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`User` (
  `idUser` INT ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT ,
  `First` VARCHAR(45) NULL ,
  `Last` VARCHAR(45) NULL ,
  `Password` VARCHAR(45) NULL ,
  `Username` VARCHAR(45) NULL ,
  PRIMARY KEY (`idUser`) ,
  UNIQUE INDEX `idUser_UNIQUE` (`idUser` ASC) ,
  CONSTRAINT `fk_User_UserDiets1`
    FOREIGN KEY (`idUser` )
    REFERENCES `modernmenu_ci`.`UserDiets` (`UserID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_Ratings1`
    FOREIGN KEY (`idUser` )
    REFERENCES `modernmenu_ci`.`Ratings` (`UserID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_recipe1`
    FOREIGN KEY (`idUser` )
    REFERENCES `modernmenu_ci`.`recipe` (`SubmitterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`DietaryConsiderations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`DietaryConsiderations` (
  `idDietaryConsiderations` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Associates \'DietaryConsideration\' table elements with \'User\' table elements.' ,
  `ConsiderationName` VARCHAR(45) NULL ,
  PRIMARY KEY (`idDietaryConsiderations`) ,
  UNIQUE INDEX `idDietaryConsiderations_UNIQUE` (`idDietaryConsiderations` ASC) ,
  CONSTRAINT `fk_DietaryConsiderations_UserDiets1`
    FOREIGN KEY (`idDietaryConsiderations` )
    REFERENCES `modernmenu_ci`.`UserDiets` (`DietaryConsiderationID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`IngredientsConfirmed`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`IngredientsConfirmed` (
  `idIngredientsConfirmed` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `IngredientName` VARCHAR(45) NULL ,
  `SubmitterID` INT NULL ,
  PRIMARY KEY (`idIngredientsConfirmed`) ,
  CONSTRAINT `fk_IngredientsConfirmed_IngredientAssociative1`
    FOREIGN KEY (`idIngredientsConfirmed` )
    REFERENCES `modernmenu_ci`.`RecipeAssociative` (`IngredientID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`IngredientsUnconfirmed`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`IngredientsUnconfirmed` (
  `idIngredientsUnconfirmed` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `IngredientName` VARCHAR(45) NULL ,
  `SubmitterID` INT NULL ,
  PRIMARY KEY (`idIngredientsUnconfirmed`) ,
  UNIQUE INDEX `idIngredientsUnconfirmed_UNIQUE` (`idIngredientsUnconfirmed` ASC) ,
  CONSTRAINT `fk_IngredientsUnconfirmed_IngredientsConfirmed1`
    FOREIGN KEY (`idIngredientsUnconfirmed` )
    REFERENCES `modernmenu_ci`.`IngredientsConfirmed` (`idIngredientsConfirmed` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modernmenu_ci`.`Units`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modernmenu_ci`.`Units` (
  `idUnits` INT ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT ,
  `UnitName` VARCHAR(45) NULL ,
  PRIMARY KEY (`idUnits`) ,
  UNIQUE INDEX `idUnits_UNIQUE` (`idUnits` ASC) ,
  CONSTRAINT `fk_Units_IngredientAssociative1`
    FOREIGN KEY (`idUnits` )
    REFERENCES `modernmenu_ci`.`RecipeAssociative` (`UnitID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
