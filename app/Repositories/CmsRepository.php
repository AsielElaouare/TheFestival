<?php
namespace App\Repositories;

Use Pdo;
use Exception;
use App\Models\Page;
use App\Models\ContentBlock;
use PDOException;

class CmsRepository extends Repository{
    function getPageWithSectionsById($page_id) {
        $results = null;
        try{
            $stmt = $this->connection->prepare("SELECT 
                cb.contentblock_id,
                cb.title AS contentblock_title,
                cb.content,
                cb.created_at AS contentblock_created_at,
                cb.updated_at AS contentblock_updated_at,
                s.name AS section_name,
                s.description AS section_description,
                p.title AS page_title,
                p.slug AS page_slug,
                m.url AS media_url
            FROM 
                CONTENTBLOCK cb
            JOIN 
                SECTION s ON cb.section_id = s.section_id
            JOIN 
                PAGE p ON s.page_id = p.page_id
            WHERE p.page_id = :page_id
            ORDER BY 
                cb.created_at DESC");

        $stmt->execute(['page_id' => $page_id]);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\ContentBlock');
        
        }
        catch(Exception $e){
            error_log($e->getMessage());  
        }
        return $results;
    }
   
        public function updateContentBatch(array $updates, $pageIdentifier) {
            try {
                $this->connection->beginTransaction();
                $sql = "UPDATE WebsiteCMS.CONTENTBLOCK cb
                        JOIN SECTION s ON cb.section_id = s.section_id
                        JOIN PAGE p ON s.page_id = p.page_id
                        SET cb.content = :content
                        WHERE ";
        
                if (filter_var($pageIdentifier, FILTER_VALIDATE_INT)) {
                    $sql .= "p.page_id = :pageId AND ";
                    $stmtParams = ['pageId' => $pageIdentifier];
                } else {
                    $sql .= "p.slug = :pageSlug AND ";
                    $stmtParams = ['pageSlug' => $pageIdentifier];
                }
        
                $sql .= "cb.title = :contentTitle";
                $stmt = $this->connection->prepare($sql);
        
                foreach ($updates as $contentTitle => $content) {
                    $stmtParams['content'] = $content;
                    $stmtParams['contentTitle'] = $contentTitle;
        
                    $stmt->execute($stmtParams);
                }
                $this->connection->commit();
                return true; 
            } catch (PDOException $e) {
                $this->connection->rollBack();
                error_log($e->getMessage());  
                return false; 
            }
        }
}
