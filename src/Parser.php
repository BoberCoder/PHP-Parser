<?php

namespace Parser;

class Parser
{
    public function parse($url)
    {
        $content = file_get_contents($url);
        preg_match_all('/<img .+? src=.+?(?:jpg|gif|png|jpeg|svg)/', $content, $matches);

        $images = [];
        foreach ($matches[0] as $key => $image)
        {
            $images[] = substr($image, strpos($image, 'src=') + 5);
        }
        print_r($images);
    }
}