<?php
namespace Recuperation;

class sitemap {

    private $xml;

    public function __construct($type,$db){

        $this->type = $type;
        $this->db = $db;
        $this->xml = new \DOMDocument('1.0','UTF-8');

    }

    public function getSitemap(){

        switch($this->type){

            case 'article':

                $this->sitemapCore($this->sitemapArticles());

            break;

            case 'page':

                $this->sitemapCore($this->sitemapPages());

            break;

            case 'categorie':

                $this->sitemapCore($this->sitemapCategories());

            break;

            case 'tag':

                $this->sitemapCore($this->sitemapTags());

            break;

        }

    }

    private function sitemapCore($aa){

        $urlset = $this->xml->createElement("urlset");
        $urlset->setAttribute("xmlns:xsi","http://www.w3.org/2001/XMLSchema-instance");
        $urlset->setAttribute("xmlns","http://www.sitemaps.org/schemas/sitemap/0.9");

        $this->xml->appendChild($urlset);

        $this->xml->formatOutput = true;

        $link = ($this->type !== 'article') ? "$this->type/" : "";

        foreach ($aa as $a){

            $url = $this->xml->createElement("url");
            $urlset->appendChild($url);

            $loc = $this->xml->createElement("loc",WEBROOT.$link.$a->url);
            $url->appendChild($loc);

            $lastmod = $this->xml->createElement("lastmod",date("Y-m-d",$a->date));
            $url->appendChild($lastmod);

            $changefreq = $this->xml->createElement("changefreq","weekly");
            $url->appendChild($changefreq);

            $priority = $this->xml->createElement("priority","0.9");
            $url->appendChild($priority);
        }

        echo "<xmp>".$this->xml->saveXML()."</xmp>";
        $this->xml->save("$this->type.xml");

    }

    private function sitemapArticles(){

        return $this->db->query("SELECT idA AS id,url AS url,date FROM articles ORDER BY idA DESC LIMIT 49000")->fetchAll();

    }

    private function sitemapPages(){

        return $this->db->query("SELECT idP AS id,url AS url,date FROM pages ORDER BY idP DESC LIMIT 49000")->fetchAll();

    }

    private function sitemapCategories(){

        return $this->db->query("SELECT idC AS id,url AS url,date FROM categories ORDER BY idC DESC LIMIT 49000")->fetchAll();

    }

    private function sitemapTags(){

        return $this->db->query("SELECT idT AS id,u AS url,date FROM tags ORDER BY idT DESC LIMIT 49000")->fetchAll();

    }

} 