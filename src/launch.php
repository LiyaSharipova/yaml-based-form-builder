<?php

require_once __DIR__ . '/TagBuilder.php';
require_once __DIR__ . '/AttributeBuilder.php';
$config_file_name = __DIR__ . "/../resources/config.yaml";
$config_file_entity = file_get_contents($config_file_name);


$yaml_parsed = yaml_parse_file($config_file_name);

var_dump($yaml_parsed);

$builtForm = '';
foreach ($yaml_parsed as $form) {
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
                $tagBuilder = new TagBuilder($element_tag);

                switch ($element_tag) {
                    case ('select'): {
//                            $selectBuilder = new TagBuilder('select');
//
//                            foreach ($tag_attr_value as $option => $options_attrs) {
//                                $optionBuilder = new TagBuilder('option');
//                                foreach ($options_attrs as $option_attr_name => $options_attr_value) {
//                                    $option_built_attr = new AttributeBuilder($option_attr_name, $options_attr_value);
//                                    $optionBuilder->addAttribute($option_built_attr);
//                                }
//                                $selectBuilder->addInnerTag($selectBuilder->build());
//                            }

                        break;
                    }
                    default: {
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
                                $option_attr_builder = new AttributeBuilder($tag_attr_name, $tag_attr_value);
                                $tagBuilder->addAttribute($option_attr_builder->build());
                            }
                        }
                        break;
                    }
                }

                $formBuilder->addInnerTag($tagBuilder->build());
            }
        }
    }
//    $formBuilder->setEntryForm($form_entries);
    $builtForm = $builtForm . $formBuilder->build();
}

echo $builtForm;
