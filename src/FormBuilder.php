<?php


class FormBuilder
{

    private $attrForm;
    private $entryForm;
    private $tagForm;

    public function buildTagForm(): String
    {
        return '<form' . $this->getAttrForm() . ' >' . $this->getEntryForm() . '\n</form>';

    }


    private $attrInput;
    private $tagInput;
    private $prefixInput;

    public function buildTagInput(): string
    {
        return $this->getPrefixInput(). '<input ' . $this->getAttrInput() . '>';
    }


    private $attrTextarea;
    private $textTextarea;
    private $tagTextarea;

    public function buildTagTextarea(): String
    {
        return '<textarea' . $this->getAttrTextarea() . ' >' . $this->gettextTextarea() . '\n</textarea>';

    }

    private $attrButton;
    private $textButton;
    private $tagButton;

    public function buildTagButton(): String
    {
        return '<button' . $this->getAttrButton() . ' >' . $this->getTextButton() . '\n</button>';

    }

    private $attrSelect;
    private $textSelect;
    private $tagSelect;

    public function buildTagSelect(): String
    {
        return '<select' . $this->getAttrSelect() . ' >' . $this->getTextSelect() . '\n</select>';

    }

    private $attrOption;
    private $textOption;
    private $tagOption;

    public function buildTagOption(): String
    {
        return '<option' . $this->getAttrOption() . ' >' . $this->getTextOption() . '\n</option>';

    }

    private $attrOptgroup;
    private $textOptgroup;
    private $tagOptgroup;

    public function buildTagOptgroup(): String
    {
        return '<optgroup' . $this->getAttrOptgroup() . ' >' . $this->getTextOptgroup() . '\n</optgroup>';

    }

    private $attrFieldset;
    private $textFieldset;
    private $tagFieldset;

    public function buildTagFieldset(): String
    {
        return '<fieldset' . $this->getAttrFieldset() . ' >' . $this->getTextFieldset() . '\n</fieldset>';

    }

    private $attrLabel;
    private $textLabel;
    private $tagLabel;

    public function buildTagLabel(): String
    {
        return '<label' . $this->getAttrLabel() . ' >' . $this->getTextLabel() . '\n</label>';

    }

    /**
     * @return mixed
     */
    public function getAttrInput()
    {
        return $this->attrInput;
    }

    /**
     * @param mixed $attrInput
     */
    public function setATTRINPUT($attrInput)
    {
        $this->attrInput = $attrInput;
    }

    /**
     * @return mixed
     */
    public function getTagInput()
    {
        return $this->tagInput;
    }

    /**
     * @param mixed $tagInput
     */
    public function setTAGINPUT($tagInput)
    {
        $this->tagInput = $tagInput;
    }

    /**
     * @return mixed
     */
    public function getAttrTextarea()
    {
        return $this->attrTextarea;
    }

    /**
     * @param mixed $attrTextarea
     */
    public function setATTRTEXTAREA($attrTextarea)
    {
        $this->attrTextarea = $attrTextarea;
    }

    /**
     * @return mixed
     */
    public function gettextTextarea()
    {
        return $this->textTextarea;
    }

    /**
     * @param mixed $textTextarea
     */
    public function setTEXTTEXTAREA($textTextarea)
    {
        $this->textTextarea = $textTextarea;
    }

    /**
     * @return mixed
     */
    public function getTagTextarea()
    {
        return $this->tagTextarea;
    }

    /**
     * @param mixed $tagTextarea
     */
    public function setTAGTEXTAREA($tagTextarea)
    {
        $this->tagTextarea = $tagTextarea;
    }

    /**
     * @return mixed
     */
    public function getAttrButton()
    {
        return $this->attrButton;
    }

    /**
     * @param mixed $attrButton
     */
    public function setATTRBUTTON($attrButton)
    {
        $this->attrButton = $attrButton;
    }

    /**
     * @return mixed
     */
    public function getTextButton()
    {
        return $this->textButton;
    }

    /**
     * @param mixed $textButton
     */
    public function setTEXTBUTTON($textButton)
    {
        $this->textButton = $textButton;
    }

    /**
     * @return mixed
     */
    public function getTagButton()
    {
        return $this->tagButton;
    }

    /**
     * @param mixed $tagButton
     */
    public function setTAGBUTTON($tagButton)
    {
        $this->tagButton = $tagButton;
    }

    /**
     * @return mixed
     */
    public function getAttrSelect()
    {
        return $this->attrSelect;
    }

    /**
     * @param mixed $attrSelect
     */
    public function setATTRSELECT($attrSelect)
    {
        $this->attrSelect = $attrSelect;
    }

    /**
     * @return mixed
     */
    public function getTextSelect()
    {
        return $this->textSelect;
    }

    /**
     * @param mixed $textSelect
     */
    public function setTEXTSELECT($textSelect)
    {
        $this->textSelect = $textSelect;
    }

    /**
     * @return mixed
     */
    public function getTAG_SELECT()
    {
        return $this->TAG_SELECT;
    }

    /**
     * @param mixed $TAG_SELECT
     */
    public function setTAGSELECT($TAG_SELECT)
    {
        $this->TAG_SELECT = $TAG_SELECT;
    }

    /**
     * @return mixed
     */
    public function getAttrOption()
    {
        return $this->attrOption;
    }

    /**
     * @param mixed $attrOption
     */
    public function setATTROPTION($attrOption)
    {
        $this->attrOption = $attrOption;
    }

    /**
     * @return mixed
     */
    public function getTextOption()
    {
        return $this->textOption;
    }

    /**
     * @param mixed $textOption
     */
    public function setTEXTOPTION($textOption)
    {
        $this->textOption = $textOption;
    }

    /**
     * @return mixed
     */
    public function getTagOption()
    {
        return $this->tagOption;
    }

    /**
     * @param mixed $tagOption
     */
    public function setTAGOPTION($tagOption)
    {
        $this->tagOption = $tagOption;
    }

    /**
     * @return mixed
     */
    public function getAttrOptgroup()
    {
        return $this->attrOptgroup;
    }

    /**
     * @param mixed $attrOptgroup
     */
    public function setATTROPTGROUP($attrOptgroup)
    {
        $this->attrOptgroup = $attrOptgroup;
    }

    /**
     * @return mixed
     */
    public function getTextOptgroup()
    {
        return $this->textOptgroup;
    }

    /**
     * @param mixed $textOptgroup
     */
    public function setTEXTOPTGROUP($textOptgroup)
    {
        $this->textOptgroup = $textOptgroup;
    }

    /**
     * @return mixed
     */
    public function getTagOptgroup()
    {
        return $this->tagOptgroup;
    }

    /**
     * @param mixed $tagOptgroup
     */
    public function setTAGOPTGROUP($tagOptgroup)
    {
        $this->tagOptgroup = $tagOptgroup;
    }

    /**
     * @return mixed
     */
    public function getAttrFieldset()
    {
        return $this->attrFieldset;
    }

    /**
     * @param mixed $attrFieldset
     */
    public function setATTRFIELDSET($attrFieldset)
    {
        $this->attrFieldset = $attrFieldset;
    }

    /**
     * @return mixed
     */
    public function getTextFieldset()
    {
        return $this->textFieldset;
    }

    /**
     * @param mixed $textFieldset
     */
    public function setTEXTFIELDSET($textFieldset)
    {
        $this->textFieldset = $textFieldset;
    }

    /**
     * @return mixed
     */
    public function getTagFieldset()
    {
        return $this->tagFieldset;
    }

    /**
     * @param mixed $tagFieldset
     */
    public function setTAGFIELDSET($tagFieldset)
    {
        $this->tagFieldset = $tagFieldset;
    }

    /**
     * @return mixed
     */
    public function getAttrLabel()
    {
        return $this->attrLabel;
    }

    /**
     * @param mixed $attrLabel
     */
    public function setATTRLABEL($attrLabel)
    {
        $this->attrLabel = $attrLabel;
    }

    /**
     * @return mixed
     */
    public function getTextLabel()
    {
        return $this->textLabel;
    }

    /**
     * @param mixed $textLabel
     */
    public function setTEXTLABEL($textLabel)
    {
        $this->textLabel = $textLabel;
    }

    /**
     * @return mixed
     */
    public function getTagLabel()
    {
        return $this->tagLabel;
    }

    /**
     * @param mixed $tagLabel
     */
    public function setTAGLABEL($tagLabel)
    {
        $this->tagLabel = $tagLabel;
    }

    /**
     * @return mixed
     */
    public function getAttrForm()
    {
        return $this->attrForm;
    }

    /**
     * @param mixed $attrForm
     */
    public function setAttrForm($attrForm)
    {
        $this->attrForm = $attrForm;
    }

    /**
     * @return mixed
     */
    public function getEntryForm()
    {
        return $this->entryForm;
    }

    /**
     * @param mixed $entryForm
     */
    public function setEntryForm($entryForm)
    {
        $this->entryForm = $entryForm;
    }

    /**
     * @return mixed
     */
    public function getTagForm()
    {
        return $this->tagForm;
    }

    /**
     * @param mixed $tagForm
     */
    public function setTagForm($tagForm)
    {
        $this->tagForm = $tagForm;
    }

    /**
     * @return mixed
     */
    public function getPrefixInput()
    {
        return $this->prefixInput;
    }

    /**
     * @param mixed $prefixInput
     */
    public function setPrefixInput($prefixInput)
    {
        $this->prefixInput = $prefixInput;
    }


}