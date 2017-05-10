<?php


class TagBuilder
{
    private $attributes;
    private $prefix;
    private $text;
    private $tagName;

    /**
     * TagBuilder constructor.
     * @param $tagName
     */
    public function __construct($tagName)
    {
        $this->tagName = $tagName;
    }

    public function build(): String
    {
        $buffer = '';
        if (!empty($this->prefix)) $buffer = $buffer . $this->prefix . ' ';
        $buffer = $buffer . '<' . $this->tagName;
        if (!empty($this->attributes)) $buffer = $buffer . $this->attributes;
        if (!empty($this->text)) {
            $buffer = $buffer . '>';
            if ($this->tagName != 'textarea')
                $buffer = $buffer . '</br>';
            $buffer = $buffer . $this->text;
            $buffer = $buffer . '</' . $this->tagName . '>';
        } else {
            $buffer = $buffer . '/>';
        }

        return $buffer;

    }

    public function addInnerTag(String $tag)
    {
        if (empty($this->text))
            $this->text = '';
        $this->text = $this->text . $tag . '</br>';
    }

    public function addAttribute(String $attribute)
    {
        if (empty($this->attributes))
            $this->attributes = '';
        $this->attributes = $this->attributes . ' ' . $attribute;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * @param mixed $tagName
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
    }

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param mixed $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


}