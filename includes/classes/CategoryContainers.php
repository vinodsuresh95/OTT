<?php
class CategoryContainer {

    private $con, $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }



//Show all categories in index page 

    public function showAllCategories() {
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='previewCatgories'>";

        while($row =  $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row, null , true, true);
        }

        return  $html . "</div>";
    }

// Show only Tv shows


public function showTVShowCategories() {
    $query = $this->con->prepare("SELECT * FROM categories");
    $query->execute();

    $html = "<div class='previewCatgories'>
                <h1>TV Shows</h1>";

    while($row =  $query->fetch(PDO::FETCH_ASSOC)) {
        $html .= $this->getCategoryHtml($row, null , true, false);
    }

    return  $html . "</div>";
}

public function showMoviesCategories() {
    $query = $this->con->prepare("SELECT * FROM categories");
    $query->execute();

    $html = "<div class='previewCatgories'>
                <h1>Movies</h1>";
    while($row =  $query->fetch(PDO::FETCH_ASSOC)) {
        $html .= $this->getCategoryHtml($row, null , false, true);
    }

    return  $html . "</div>";
}

// Show's suggestions 
    public function showCategory($categoryId, $title = null) {
        $query = $this->con->prepare("SELECT * FROM categories WHERE id=:id");
        $query->bindValue(":id", $categoryId);
        $query->execute();

        $html = "<div class='previewCatgories noScroll'>";

        while($row =  $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row, $title , true, true);
        }

        return  $html . "</div>";

    }

//On click any Category show all list
    private function getCategoryHtml($sqlData, $title, $tvshows, $movies){
            $categoryId = $sqlData["id"];
            $title = $title == null ? $sqlData["name"] : $title;

            if($tvshows && $movies){
                $entities = EntityProvider::getEntities($this->con, $categoryId , 10);
            }
            elseif($tvshows) {
                //Get tv shows entities
                $entities = EntityProvider::getTVShowsEntities($this->con, $categoryId , 10);

            }
            else{
                //Get movies entities
                $entities = EntityProvider::getMoviesEntities($this->con, $categoryId , 10);

            }

            if (sizeof($entities) == 0){
                return;
            }

            $entitiesHtml = "";
            $previewProvider = new PreviewProvider($this->con, $this->username);
            foreach($entities as $entity) {
                $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
            }

            
        return "<div class='category'>
                    <a href='category.php?id=$categoryId'>
                        <h3>$title</h3>
                    </a>

                    <div class='entities'>
                        $entitiesHtml
                    </div>
                
              </div>";
    }

}

?>