<?php
namespace Root;


class GLAsite {

    public $url;
    private $page;
    public $article_by_page;
    public $date;

    private $single;
    public $site;

    public $langue;

    public function __construct($db){

        $this->url = $_GET['u'];
        $this->page = GLA::exp($this->url);
        $this->db = $db;
        $this->article_by_page = 8;

        $this->langue = GLA::$langue;

        $this->single = null;
        $this->site = $this->siteInformation();

    }

    public function informations(){

        $p = $this->page[0];

        $url = trim($this->url, 'ar/');

        if(empty($url)){

            return [
                "title" => $this->site->title ." - ". $this->site->name,
                "meta-description" => $this->site->description
            ];

        }else{

            if(isset($p) && in_array($p ,['page','categorie','search','tag']) && isset($this->page[1])){

                switch($p){

                    case 'page':
                        return [
                            "title" => $this->pageTitle()." - ".$this->site->name,
                            "meta-description" => substr($this->pageContent(),0,230)
                        ];
                    break;

                    case 'categorie':
                        return [
                            "title" => $this->catTitle()." - ".$this->site->name,
                            "meta-description" => substr($this->catDesc(),0,230)
                        ];
                    break;

                    case 'search':

                        if(empty($_GET['s'])) $_GET['s'] = '';

                        return [
                            "title" => $_GET['s']." - ".$this->site->name,
                            "meta-description" => $this->site->name. " recherche de produits ".$_GET['s']
                        ];
                    break;

                    case 'tag':
                        return [
                            "title" => $this->tagTitle()." - ".$this->site->name,
                            "meta-description" => substr($this->tagDesc(),0,180)
                        ];
                    break;

                }

            }else{

                if($p == '404'){

                    return [
                        "title" => "Page introuvable - Erreur 404 - ".$this->site->name,
                        "meta-description" => "Cette page est introuvable, elle à peut être été supprimé ou son url à été changé."
                    ];

                }else{

                    $this->single();

                    return [
                        "title" => $this->articleTitle()." - ".$this->site->name,
                        "meta-description" => substr($this->articleContent(),0,230),
                        "meta-opengraph" => "
    <meta property='og:title' content=\"".$this->articleTitle()."\"/>
    <meta property='og:type' content='article'/>
    <meta property='og:url' content='".WEBROOT.L.$this->articleUrl()."/'/>
    <meta property='og:image' content='".$this->articleImageFull()."'/>\n"
                    ];

                }

            }

        }

    }

    public function getMeta(){

        echo $this->metaDescription();
        echo "    <title>".$this->title()."</title>\n";
        echo "    ". $this->siteMetaTags()."\n";

        echo $this->metaOpenGraph();

    }

    public function siteInformation(){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "*" : "name, titlear AS title, descriptionar AS description, tele, email, adresse, pagefacebook, pagetwitter, pageinstagram, pagekiuper, pageyoutube, integercode, metatags, analytics";

        return $this->db->query("SELECT $select FROM site")->fetch();

    }

    private function title(){return $this->informations()['title'];}
    private function metaDescription(){return "<meta name='description' content=\"".strip_tags($this->informations()['meta-description'])."\">\n";}
    private function metaOpenGraph(){

        if(!empty($this->informations()['meta-opengraph'])) return $this->informations()['meta-opengraph'];

    }

    public function exp(){
        $e = trim($this->url,'/');
        return explode('/',$e);
    }

    private function page(){

        $page = $this->page;

        if(isset($page['1'])){

            $p = $this->db->query('SELECT * FROM pages WHERE url = ?',[$page['1']])->fetch();
            if(!empty($p)){

                return $p;

            }else {

                \Func::_404();

            }

        }

    }

    private function categorie(){

        $page = $this->page;

        if(isset($page['2'])){

            $p = $this->db->query('SELECT * FROM categories WHERE url = ?',[$page['2']])->fetch();
            if(!empty($p)){

                return $p;

            }else {

                \Func::_404();

            }

        }else{

            if(isset($page['1'])){

                $p = $this->db->query('SELECT * FROM categories WHERE url = ?',[$page['1']])->fetch();
                if(!empty($p)){

                    return $p;

                }else {

                    \Func::_404();

                }

            }

        }

    }

    private function single(){

        $page = $this->page;

        if(isset($page['0'])){

            $p = $this->db->query('SELECT * FROM articles WHERE url = ?',[$page['0']])->fetch();

            if(!empty($p)){

                $this->single = $p;

            }else {

                \Func::_404();

            }

        }

    }

    private function tagsRoot(){

        $page = $this->page;

        if(isset($page['1'])){

            $p = $this->db->query('SELECT * FROM tags WHERE u = ?',[$page['1']])->fetch();
            if(!empty($p)){

                return $p;

            }else {

                \Func::_404();

            }

        }

    }

    public function getMenu(){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "idM,name,url,parent" : "idM,namear AS name,url,parent";

        $menu = $this->db->query("SELECT $select FROM menu ORDER BY place ASC")->fetchAll();

        foreach($menu AS $m){

            if($m->parent == 0){

                $tab[$m->idM] = $m;

            }

        }

        foreach($menu AS $key => $m){

            if($m->parent !== 0){

                $tab[$m->parent]->sous[$m->idM] = $m;

            }

        }

        unset($tab[0]);

        echo "<ul>";

        foreach($tab AS $key => $m){

            if(empty($m->sous)){

                echo "<li><a href='".WEBROOT.L."$m->url'>$m->name</a></li>";

            }else{

                echo "<li><a href='".WEBROOT.L."$m->url'>$m->name<span class='icon cl1 ml5'>=</span></a>";

                echo "<ul>";

                foreach($m->sous AS $sm){

                    echo "<li><a href='".WEBROOT.L."$sm->url'>$sm->name</a></li>";

                }

                echo "</ul>";

                echo"</li>";

            }

        }

        echo "</ul>";

    }

    /* PAGINATION */

    public function article_by_page(){

        $this->article_by_page = 12;

    }

    public function date_format(){

        return "d/m/Y H:i";

    }

    public function paginationNbrArticles(){

        $c = $this->db->query("SELECT COUNT(idA) AS nbr FROM articles WHERE (categorie = :catID OR categorie IN (SELECT idC FROM categories WHERE parent = :catID))",[':catID' => $this->catID()])->fetch();

        return $c->nbr;

    }

    public function getPagination(){

        $nbr_article = $this->paginationNbrArticles();

        if(empty($nbr_article)) return false;

        $nbr_page = ceil($nbr_article / $this->article_by_page);

        if($nbr_page == 1) return false;

        $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;

        $next = ($page < $nbr_page) ? ($page + 1) : $page;

        $prev = ($page > 1) ? ($page - 1) : $page;

        echo "<a href='?page=$prev' class='btn brc2 cl2 hover-bg2 hover-cl1'><</a>";

        for($i = 1; $i <= $nbr_page ; $i++){

            if($page == $i){
                $a = "class='btn bg2 brc2 cl1'";
            }else{
                $a = "class='btn brc2 cl2 hover-bg2 hover-cl1'";
            }

            echo "<a href='?page=$i' $a>$i</a>";

        }

        echo "<a href='?page=$next' class='btn brc2 cl2 hover-bg2 hover-cl1'>></a>";

    }

    public function articleByCategoriePagination(){

        $this->article_by_page();

        $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;

        if($page > $this->paginationNbrArticles() || $page <= 1) $page = 1;

        $page = ($page - 1) * $this->article_by_page;

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "*" : "idA,titlear AS title,url,categorie,parent,image,contentar AS content,price_min,price_max,date,idB,n_see,showc";

        return $this->db->query("SELECT $select FROM articles WHERE (categorie = :catID OR categorie IN (SELECT idC FROM categories WHERE parent = :catID)) ORDER BY idA DESC LIMIT $page,$this->article_by_page",['catID' => $this->catID()])->fetchAll();

    }

    public function articleByParent($parent){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "*" : "idA,titlear AS title,url,categorie,parent,image,contentar AS content,price_min,price_max,date,idB,n_see,showc";

        return $this->db->query("SELECT $select FROM articles WHERE parent = ? ORDER BY idA DESC", [$parent])->fetchAll();
    
    }


    /* ARTICLES RECUPERATION */

    public function articleByID($id){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "*" : "idA,titlear AS title,url,categorie,parent,image,contentar AS content,price_min,price_max,date,idB,n_see,showc";

        return $this->db->query("SELECT $select FROM articles WHERE idA = ?",[$id])->fetch();

    }

    public function articleMostSeen($limit = 40){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "*" : "idA,titlear AS title,url,categorie,parent,image,contentar AS content,price_min,price_max,date,idB,n_see,showc";

        return $this->db->query("SELECT $select FROM articles ORDER BY n_see DESC LIMIT $limit")->fetchAll();

    }

    public function articleByCategorie($idCat,$limit = 40){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "*" : "idA,titlear AS title,url,categorie,parent,image,contentar AS content,price_min,price_max,date,idB,n_see,showc";

        return $this->db->query("SELECT $select FROM articles WHERE (categorie = ? OR categorie IN (SELECT idC FROM categories WHERE parent = ?)) ORDER BY idA DESC LIMIT $limit",[$idCat,$idCat])->fetchAll();

    }

    public function lastArticlesByCategorie($idCat,$idA,$limit = 40){

        return $this->db->query("SELECT * FROM articles WHERE ((categorie = ? OR categorie IN (SELECT idC FROM categories WHERE parent = ?)) AND idA != ?) ORDER BY idA DESC LIMIT $limit",[$idCat,$idCat,$idA])->fetchAll();

    }

    public function lastArticles($limit = 40){

        return $this->db->query("SELECT * FROM articles ORDER BY idA DESC LIMIT $limit")->fetchAll();

    }

    public function favoritesArticles($limit = 40){

        return $this->db->query("SELECT * FROM articles INNER JOIN favorite ON prod = idA WHERE user = ? ORDER BY idA DESC LIMIT $limit",[$_SESSION['id']])->fetchAll();

    }

    public function articleMoreImage($id){
        return $this->db->query("SELECT nameI FROM image WHERE prI = ?",[$id])->fetchAll();
    }

    public function articlesPromo($limit = 40){

        return $this->db->query("SELECT * FROM articles WHERE (remise != ?) ORDER BY idA DESC LIMIT $limit",[0])->fetchAll();

    }

    /* CATEGORIE RECUPERATION */

    public function categorieNoParent($limit = 40){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "idC,name,url,parent,image,description,content,date" : "idC,namear AS name,url,parent,image,descriptionar AS description,contentar AS content,date";

        return $this->db->query("SELECT $select FROM categories WHERE parent = '' ORDER BY date ASC LIMIT $limit")->fetchAll();

    }

    public function categorieByParent($idParent,$limit = 40){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "idC,name,url,parent,image,description,content,date" : "idC,namear AS name,url,parent,image,descriptionar AS description,contentar AS content,date";

        return $this->db->query("SELECT $select FROM categories WHERE parent = ? LIMIT $limit",[$idParent])->fetchAll();

    }

    public function categorieNameById($id){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "name" : "namear AS name";

        $cat =  $this->db->query("SELECT $select FROM categories WHERE idC = ?",[$id])->fetch();
        
        return $cat->name;

    }

    public function categorieImgById($id){
        
        $cat =  $this->db->query("SELECT image FROM categories WHERE idC = ?",[$id])->fetch();
        return $cat->image;

    }

    public function categorieIdByName($name){

        $cat =  $this->db->query("SELECT idC FROM categories WHERE name = ?",[$name])->fetch();
        return $cat->idC;

    }

    public function categorieUrlById($id){

        $cat =  $this->db->query("SELECT url,parent FROM categories WHERE idC = ?",[$id])->fetch();

        if(empty($cat->parent)){

            return "categorie/$cat->url";

        }else{

            return $this->categorieUrlById($cat->parent)."$cat->url";

        }

    }

    /* PAGES */

    public function pages($limit = 40){

        $select = ($this->langue == '' || $this->langue == 'fr/') ? "name,url" : "namear AS name,url";

        return $this->db->query("SELECT $select FROM pages LIMIT $limit")->fetchAll();

    }

    /* Tags */

    public function tags($limit = 10){

        return $this->db->query("SELECT tag,u FROM tags ORDER BY see DESC LIMIT $limit")->fetchAll();

    }

    public function articleTags($idA){

        $tags = $this->db->query("SELECT tag,u FROM tags INNER JOIN tag ON t = idT WHERE a = ?",[$idA])->fetchAll();

        foreach($tags AS $tag){

            echo "<a href='".WEBROOT.L."tag/$tag->u' class='tag cl3 hover-cl2 mr10'>#$tag->tag</a> ";

        }

    }

    /* MODELES TAGS RECUPERATION */

    public function articlesByTagPagination($page){

        $this->article_by_page();

        $page = ($page < 1) ? 1 : $page;

        $limit = ($page - 1) * 9 .','. $this->article_by_page;

        return $this->db->query("SELECT * FROM articles INNER JOIN tag ON a = idA WHERE t = ? ORDER BY idA DESC LIMIT $limit",[$this->tagId()])->fetchAll();

    }

    public function articlePaginationBtn($page){

        $nombre = $this->db->query("SELECT COUNT(idA) AS nbr FROM articles INNER JOIN tag ON a = idA WHERE t = ?",[$this->tagId()])->fetch();

        $n = ceil($nombre->nbr / 9);

        if($n == 1) return false;

        if($page > 1) echo "<a href='?page=".($page - 1)."'><</a>";

        for($i = 1; $i <= $n ; $i++){

            if($i == $page){
                echo "<a href='?page=$i' class='btn'>$i</a>";
            }else{
                echo "<a href='?page=$i'>$i</a>";
            }

        }

        if($page < $n) echo "<a href='?page=".($page + 1)."'>></a>";

    }

    /* IMAGES RECUPERATION */

    public function imageUrl($img,$size = 'small'){

        return WEBROOT."gla-adminer/uploads/article/$size/$img";

    }

    public function imageMoreUrl($img){

        return WEBROOT."gla-adminer/uploads/image/$img";

    }

    /* SLIDER */

    public function sliderImages(){

        return $this->db->query("SELECT nameI FROM image WHERE typeI = ? ORDER BY idI DESC",['slider'])->fetchAll();

    }

    public function sliderSpeed(){

        $sl = $this->db->query("SELECT sl_sp FROM theme")->fetch();

        return $sl->sl_sp;

    }

    /* PARTENAIRE */

    public function getPartenaires($limit){

        $part = $this->db->query("SELECT name,image FROM partenaires ORDER BY idP DESC LIMIT $limit")->fetchAll();

        foreach($part AS $a){

            echo "<div><img src='". WEBROOT ."gla-adminer/uploads/article/small/$a->image' alt=\"$a->name\"/></div>";

        }

    }

    /* SITE ------------------------------------------------------------------------ */
    public function siteName(){return $this->site->name;}
    public function siteTitle(){return $this->site->title;}
    public function siteDesc(){return $this->site->description;}
    public function siteTele(){return $this->site->tele;}
    public function siteEmail(){return $this->site->email;}
    public function siteAdresse(){return $this->site->adresse;}
    public function sitePageFacebook(){return $this->site->pagefacebook;}
    public function sitePageTwitter(){return $this->site->pagetwitter;}
    public function sitePageKiuper(){return $this->site->pagekiuper;}
    public function sitePageInstagram(){return $this->site->pageinstagram;}
    public function sitePageYoutube(){return $this->site->pageyoutube;}
    public function siteCodeIntegration(){return $this->site->integercode;}
    public function siteMetaTags(){return $this->site->metatags;}
    public function siteAnalytics(){return $this->site->analytics;}

    /* SINGLE ------------------------------------------------------------------------ */
    public function articleSee(){$this->db->query("UPDATE articles SET n_see = (n_see + 1) WHERE idA = ?",[$this->single->idA]);}
    public function articleID(){return $this->single->idA;}
    public function articleTitle(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->single->title : $this->single->titlear;
    }
    public function articleUrl(){return $this->single->url;}
    public function articleContent(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->single->content : $this->single->contentar;
    }
    public function articleImage(){return $this->single->image;}
    public function articleImageSmall(){return WEBROOT."gla-adminer/uploads/article/small/".$this->single->image;}
    public function articleImageFull(){return WEBROOT."gla-adminer/uploads/article/full/".$this->single->image;}
    public function articleDate(){return $this->single->date;}
    public function articleCategorieID(){return $this->single->categorie;}
    public function articleCategorieName(){

        if ($this->single->categorie !== 0) {

            return $this->categorieNameById($this->single->categorie);

        } else {

            return false;
        }
    
    }
    public function articleCategorieUrl(){
        
        if($this->single->categorie !== 0){

            return $this->categorieUrlById($this->single->categorie);

        }else{

            return false;

        }

    }
    public function articleParents(){

        if($this->single->parent == '0'){

            $parent = $this->categorieUrlById($this->single->categorie);

            echo "<a href='$parent' class='btn bg3 cl4 brc3'> < Etape précédente</a>";

        }else{

            $parent = $this->articleByID($this->single->parent);

            echo "<a href='$parent->url' class='btn bg3 cl4 brc3'> < Etape précédente</a>";

        }

        //echo "<a href='".  $this->articleCategorieUrl() ."' class='cl4 hover-cl3'> ". $this->articleCategorieName() ."</a>";
    }
    public function articleComments(){return $this->single->showc;}
    public function articlePriceMin(){return $this->single->price_min;}
    public function articlePriceMax(){return $this->single->price_max;}

    /* CATEGORIES ------------------------------------------------------------------------ */
    public function catID(){return $this->categorie()->idC;}
    public function catTitle(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->categorie()->name : $this->categorie()->namear;
    }
    public function catUrl(){return $this->categorie()->url;}
    public function catParent(){return $this->categorie()->parent;}
    public function catDesc(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->categorie()->description : $this->categorie()->descriptionar;
    }
    public function catContent(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->categorie()->content : $this->categorie()->contentar;
    }
    public function catImg(){return $this->categorie()->image;}

    /* PAGES ------------------------------------------------------------------------ */
    public function pageID(){return $this->page()->idP;}
    public function pageTitle(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->page()->name : $this->page()->namear;
    }
    public function pageUrl(){return $this->page()->url;}
    public function pageContent(){
        return ($this->langue == '' || $this->langue == 'fr/') ? $this->page()->content : $this->page()->contentar;
    }

    /* Tags ------------------------------------------------------------------------ */
    public function tagSee(){$this->db->query("UPDATE tags SET see = (see + 1) WHERE idT = ?",[$this->tagsRoot()->idT]);}
    public function tagId(){return $this->tagsRoot()->idT;}
    public function tagTitle(){return $this->tagsRoot()->tag;}
    public function tagDesc(){return $this->tagsRoot()->description;}
    public function tagDate(){return $this->tagsRoot()->date;}

}
