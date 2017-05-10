<?php

require_once __DIR__ . '/TagBuilder.php';
require_once __DIR__ . '/AttributeBuilder.php';


// Форма в виде yaml-файла
$config_file_name = __DIR__ . "/../resources/config.yaml";


$yaml_parsed = yaml_parse_file($config_file_name);

//var_dump($yaml_parsed);

// Итоговая форма в виде строки
$builtForm = '';
// Достаем каждую форму в виде словаря
foreach ($yaml_parsed as $form_name => $form) {
    // Билдер для самой формы
    $formBuilder = new TagBuilder('form');

    // Достаем аттрибуты, их значения, а также элементы формы в виде словаря
    foreach ($form as $form_attr_name => $form_attr_value) {
        // Создать аттрибут, если он не служебный, то есть если не начинается с  _
        if (substr($form_attr_name, 0, 1) != '_') {
            $form_attribute = new AttributeBuilder($form_attr_name, $form_attr_value);
            // Добавить аттрибуты к имеющимся в форме
            $formBuilder->addAttribute($form_attribute->build());
        } else {
            // Переходим к формированию тегов внутри формы
            foreach ($form['_elements'] as $element_tag => $element_tag_attrs_values) {
                // Билдер для тегов внутри формы. Обрезается название тега до "-"
                $tagBuilder = new TagBuilder(strtok($element_tag, '-'));
                // Формирование аттрибутов, текста и префика для тегов внутри формы
                foreach ($element_tag_attrs_values as $tag_attr_name => $tag_attr_value) {
                    // Если название аттрибута совпадает со служебным названием
                    if (substr($tag_attr_name, 0, 1) == '_') {
                        switch ($tag_attr_name) {
                            case '_text': {
                                // Сеттинг того, что находится внутри тега
                                $tagBuilder->setText($tag_attr_value);
                                break;
                            }
                            case '_prefix': {
                                // Сеттинг префика перед тегом (для input'а иногда нужно)
                                $tagBuilder->setPrefix($tag_attr_value);
                                break;
                            }
                        }
                    }
                    // Если название аттрибута НЕ совпадает со служебным названием
                    else {
                        $attr_builder = new AttributeBuilder($tag_attr_name, $tag_attr_value);
                        $tagBuilder->addAttribute($attr_builder->build());
                    }

                }
                // Формируется тег и добавляется к имеющимся в форме
                $formBuilder->addInnerTag($tagBuilder->build());
            }
        }
    }
    // Формируется вся форма и добавляется к имеющимся формам
    $builtForm = $builtForm . $formBuilder->build();
}

// Форма записывается в HTML-файл
file_put_contents('output_form.html', '<html><header><meta charset="UTF-8"/></header><body>' . $builtForm . '</body></html>');
