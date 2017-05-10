<?php

require_once __DIR__ . '/TagBuilder.php';
require_once __DIR__ . '/AttributeBuilder.php';


// Форма в виде yaml-файла
$config_file_name = __DIR__ . "/../resources/config.yaml";


$yaml_parsed = yaml_parse_file($config_file_name);

//var_dump($yaml_parsed);

// Итоговая форма в виде строки
$builtForm = '';
foreach ($yaml_parsed as $form_name => $form) {
    $formBuilder = new TagBuilder('form');

    foreach ($form as $form_attr_name => $form_attr_value) {
        // Создать аттрибут, если он не служебный == не начинается с  _
        if (substr($form_attr_name, 0, 1) != '_') {
            $form_attribute = new AttributeBuilder($form_attr_name, $form_attr_value);
            // Добавить аттрибуты к имеющимся
            $formBuilder->addAttribute($form_attribute->build());
        } else {
            // input => id : value, type : text ...
            foreach ($form['_elements'] as $element_tag => $element_tag_attrs_values) {
                $tagBuilder = new TagBuilder(strtok($element_tag, '-'));


                foreach ($element_tag_attrs_values as $tag_attr_name => $tag_attr_value) {
                    if (substr($tag_attr_name, 0, 1) == '_') {
                        switch ($tag_attr_name) {
                            case '_text': {
                                $tagBuilder->setText($tag_attr_value);
                                break;
                            }
                            case '_prefix': {
                                $tagBuilder->setPrefix($tag_attr_value);
                                break;
                            }
                        }
                    } else {
                        $attr_builder = new AttributeBuilder($tag_attr_name, $tag_attr_value);
                        $tagBuilder->addAttribute($attr_builder->build());
                    }

                }

                $formBuilder->addInnerTag($tagBuilder->build());
            }
        }
    }
    $builtForm = $builtForm . $formBuilder->build();
}

echo '<html><body>' . $builtForm . '</body></html>';
