-- Вопрос 1. Выбрать всех людей, которые хоть раз путешествовали и отобразить около каждого список мест, где он бывал через запятую. Колонки: name, distinations
SELECT `h`.`name` AS `name`, GROUP_CONCAT(`vd`.`name`) AS `distinations`
  FROM `human` AS `h`
  JOIN `human_vacation_dist` AS `hvd` ON `hvd`.`human_id` = `h`.`id`
  JOIN `vacation_dist` AS `vd` ON `vd`.`id` = `hvd`.`distination_id`
GROUP BY `h`.`id`;

-- Вопрос 2. Выбрать всех людей, которые были и на Кубе и в Сочи. Колонки: name
SELECT `name` FROM `human`
 WHERE `id` IN (SELECT `human_id` FROM `human_vacation_dist`
                 WHERE `distination_id` IN (SELECT `id` FROM `vacation_dist`
                                             WHERE `name` IN('Cuba', 'Sochi'))
              GROUP BY `human_id`
                HAVING COUNT(*) = 2
);

-- Вопрос 3. Выбрать всех людей, которые были только и на Кубе и в Сочи. Колонки: name
SELECT `name` FROM `human`
 WHERE `id` IN (SELECT `human_id` FROM `human_vacation_dist`
                 WHERE `distination_id` IN (SELECT `id` FROM `vacation_dist`
                                             WHERE `name` IN('Cuba', 'Sochi'))
              GROUP BY `human_id`
                HAVING COUNT(*) = 2
)
AND `id` NOT IN(SELECT `human_id` FROM `human_vacation_dist`
                 WHERE `distination_id` IN (SELECT `id` FROM `vacation_dist`
                                             WHERE `name` NOT IN('Sochi', 'Cuba')));
