<?php



namespace App\Repositories;
use App\Models\Page;
use App\Models\Section;
use Exception;
use PDO;


class PageRepository extends Repository{

    function getPageWithSections($page_id) {
        try{
            $stmt = $this->connection->prepare("SELECT p.page_id, p.title AS page_title, p.slug, 
                        s.section_id, s.name AS section_name, s.description
                        FROM `PAGE` p
                        JOIN SECTION s ON p.page_id = s.page_id
                        WHERE p.page_id = :page_id");

        $stmt->execute(['page_id' => $page_id]);
        $page = null;
        $sections = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (!$page) {
                $page = new Page();
                $page->page_id = $row['page_id'];
                $page->title = $row['page_title'];
                $page->slug = $row['slug'];
            }
            $section = new Section();
            $section->section_id = $row['section_id'];
            $section->name = $row['section_name'];
            $section->description = $row['description'];
            $sections[] = $section;
        }
         return ['page' => $page, 'sections' => $sections];
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
   
    public function updatePageWithSections($page_id, Page $page) {
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare("UPDATE `PAGE` 
                                                SET title = :title, slug = :slug, updated_at = NOW() 
                                                WHERE page_id = :page_id");
            $stmt->execute([
                'title' => $page->title,
                'slug' => $page->slug,
                'page_id' => $page_id
            ]);
    
            $existing_section_ids = [];
    
            foreach ($page->sections as $section) {
                if (isset($section->section_id) && $section->section_id > 0) {
                    $stmt = $this->connection->prepare("UPDATE SECTION 
                                                        SET name = :name, description = :description, updated_at = NOW() 
                                                        WHERE section_id = :section_id AND page_id = :page_id");
                    $stmt->execute([
                        'name' => $section->name,
                        'description' => $section->description,
                        'section_id' => $section->section_id,
                        'page_id' => $page_id
                    ]);
                    $existing_section_ids[] = $section->section_id;
                } else {
                    $stmt = $this->connection->prepare("INSERT INTO SECTION 
                                                        (name, description, page_id, created_at, updated_at) 
                                                        VALUES (:name, :description, :page_id, NOW(), NOW())");
                    $stmt->execute([
                        'name' => $section->name,
                        'description' => $section->description,
                        'page_id' => $page_id
                    ]);
                    $existing_section_ids[] = $this->connection->lastInsertId();
                }
            }
    
            if (!empty($existing_section_ids)) {
                $stmt = $this->connection->prepare("DELETE FROM SECTION 
                                                    WHERE page_id = :page_id AND section_id NOT IN (" . implode(",", $existing_section_ids) . ")");
                $stmt->execute(['page_id' => $page_id]);
            }
    
            $this->connection->commit();
            return true;
        } catch (Exception $e) {
            $this->connection->rollBack();
            echo $e->getMessage();
            return false;
        }
    }

}