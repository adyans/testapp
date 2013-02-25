<?php

class RssParser
{
    var $title;
    var $text;
    var $link;
    var $ts;
    var $summary;

    function RssParser()
    {
        $dt = date("Y-m-d H:i:s");
    }
}

class RssFeed
{
    var $items = array();

    function RssFeed($file_or_url)
    {
        //if(!eregi('^http:', $file_or_url))
        if (!preg_match('/^http:/i', $file_or_url))
            $feed_uri = $_SERVER['DOCUMENT_ROOT'] .'/shared/xml/'. $file_or_url;
        else
            $feed_uri = $file_or_url;

        $xml_source = file_get_contents($feed_uri);
        $x = simplexml_load_string($xml_source);

        if(count($x) == 0)
            return;

        foreach($x->channel->item as $item)
        {
            $feed = new RssParser();
            $feed->date = (string) $item->pubDate;
            $feed->ts = strtotime($item->pubDate);
            $feed->link = (string) $this->cleantext($item->link);
            $feed->title = (string) $this->cleantext($item->title);
            $feed->text = (string) $this->cleantext($item->description);

            // Create summary as a shortened body and remove images, extraneous line breaks, etc.
            $summary = $feed->text;
            //$summary = preg_replace("<img[^>]*>", "", $summary);
            //$summary = preg_replace("^(<br[ ]?/>)*", "", $summary);
            //$summary = preg_replace("(<br[ ]?/>)*$", "", $summary);

            // Truncate summary line to 100 characters
            /*
            $max_len = 100;
            if(strlen($summary) > $max_len)
                $summary = substr($summary, 0, $max_len) . '...';

            //$feed->summary = $summary;
            */
            $this->items[] = $feed;
        }
    }

    function cleantext($string)
    {
        $newstring = str_replace('\n', "", $string);
        $newstring = str_replace("\n", '', $newstring);
        $newstring = str_replace("<\/span>", "</span>", $newstring);
        $newstring = str_replace("<\/td>", "</td>", $newstring);
        $newstring = str_replace("<\/tr>", "</tr>", $newstring);
        $newstring = str_replace("<\/table>", "</table>", $newstring);
        $newstring = str_replace("<\/a>", "</a>", $newstring);
        $newstring = str_replace("\ufeff", '', $newstring);
        $newstring = str_replace("\/", "/", $newstring);

        return $newstring;
    }

    function normalize()
    {
        $esrss = $this->items;

        foreach ($esrss as $es)
        {
           // foreach ($es1 as $es)
            {
                $title = str_replace("\n", '', $es->title);
                $text = str_replace("\n", '', $es->text);
                $link = $es->link;
                $ts = $es->ts;
                $date = $es->date;

                $jsones = str_replace('\n', "", json_encode($es));
                $jsones = str_replace("<\/span>", "</span>", $jsones);
                $jsones = str_replace("\/", "/", $jsones);
                $jsones = str_replace("<\/td>", "</td>", $jsones);
                $jsones = str_replace("<\/tr>", "</tr>", $jsones);
                $jsones = str_replace("<\/table>", "</table>", $jsones);
                $jsones = str_replace("<\/a>", "</a>", $jsones);
                $jsones = str_replace("\ufeff", '', $jsones);

                echo "jsones = $jsones<hr>";
                /*echo "<h3><a href='$link'>$title</a></h3>";
                echo "$text<br/>";
                echo "<hr>";*/
                echo "<div style='clear:both;'>&nbsp;</div>";
            }
        }        
    }
}

?>