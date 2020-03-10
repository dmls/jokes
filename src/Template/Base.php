<?php

namespace Template;

class Base 
{
    protected $template;

    public function run()
    {
        $this->output();
    }

    public function output() 
    {
        $templateRoot = $_SERVER['DOCUMENT_ROOT'] . '/../templates/';

        // Check if template exists
        $template = !empty($this->template) ? $this->template : null;
        $filePath = $templateRoot . $template . '.php';
        $fileExists = file_exists($filePath) ? true : false;
        if (!$fileExists) {
            // Set template to 404 if template file doesn't exist
            $filePath = $templateRoot . 'notfound.php';
        }

        // Output template
        ob_start();
        include($templateRoot . 'widget/head.php');
        include($filePath);
        include($templateRoot . 'widget/footer.php');
        echo ob_get_clean();
    }
}