<?php

namespace Parser;

class Parser
{
    public function getContent($url)
    {
        return file_get_contents($url);
    }

    public function getImages($url,$content)
    {
        preg_match_all('/<img .+? src=.+?(?:jpg|gif|png|jpeg|svg)/', $content, $matches);


        $images = [];
        foreach ($matches[0] as $key => $image)
        {
            $images[] = ['image'=>substr($image, strpos($image, 'src=') + 5),'source'=>$url];
        }


        return $images;

    }


    public function getLinks($content)
    {
        $links = [];

        if (preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)/", $content, $matches_links))
        {
            foreach ($matches_links[0] as $key => $link)
            {
                if (!preg_match('/(?:http|https)/', $link))
                {
                    $links[] = substr($link, strpos($link, 'href=') + 6);
                }
            }

        }

        return $links;
    }
}