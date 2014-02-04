ALTER TABLE `fyp_imf`.`jobapplicant_t`
ADD COLUMN `CheckIn` DATETIME NULL AFTER `CancelReason`,
ADD COLUMN `CheckOut` DATETIME NULL AFTER `CheckIn`;
