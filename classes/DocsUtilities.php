<?php

class DocsUtilities
{
    /**
     * Class that supports fetching documentation and tooltips for Symbiota pages and tools.
     * Methods depend on external documentation API.
     */

    public function getFilePath($magicFilePath, $SERVER_ROOTPath)
    {
        /**
         * $magicFilePath String __FILE__ (in file where it's being called, or full file url)
         * $SERVER_ROOTPath String equivalent to server root url ($SERVER_ROOT in most pages)
         */

        $filePath = str_replace("\\", "/", $magicFilePath);
        $filePathStart = strpos($filePath, $SERVER_ROOTPath);
        $filePathEnd = strlen($SERVER_ROOTPath);
        $relFilePath = substr($filePath, $filePathEnd);
        return $relFilePath;
    }
    
    public function getTooltip($term)
    {
        /**
         * $term String to be searched in documentation API:
         * - in the case of a page it's the file path (without client path) file name with extension (for instance: '/collections/index.php');
         * - in the case of a term, the term itself (for instance: 'Darwin Core Standard').
         */
        $url = 'https://biokic.github.io/symbiota-tooltips/api/'.$term.'.json';
        $data = file_get_contents($url);
        $tooltip = json_decode($data);
        return $tooltip[0]->tooltip;
    }
}    
    
    