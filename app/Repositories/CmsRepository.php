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
            LEFT JOIN 
                MEDIA_CONTENTBLOCK mcb ON cb.contentblock_id = mcb.contentblock_id
            LEFT JOIN 
                MEDIA m ON mcb.media_id = m.media_id
            WHERE p.page_id = :page_id
            ORDER BY 
                cb.created_at DESC");

        $stmt->execute(['page_id' => $page_id]);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\ContentBlock');
        
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $results;
    }


    public function updateContentBatch(array $updates, $pageSlug) {
        try {
            $this->connection->beginTransaction();
    
            $stmt = $this->connection->prepare(" UPDATE `CONTENTBLOCK` cb
                JOIN `SECTION` s ON cb.section_id = s.section_id
                JOIN `PAGE` p ON s.page_id = p.page_id
                SET cb.content = :content
                WHERE p.slug = :pageSlug AND cb.title = :contentTitle
            ");
    
            foreach ($updates as $contentTitle => $content) {
                $stmt->execute([
                    'content' => $content,
                    'pageSlug' => $pageSlug,
                    'contentTitle' => $contentTitle
                ]);
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