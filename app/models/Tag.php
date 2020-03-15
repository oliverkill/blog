<?php


class Tag
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTags(){
        $this->db->query('SELECT * FROM tags GROUP BY name');
        $result =  $this->db->getAll();
        return $result;
    }

    public function getTagById($id){
        $this->db->query('SELECT * FROM tags WHERE id=:id');
        $this->db->bind(':id', $id);
        $tag = $this->db->getOne();
        return $tag;
    }

    public function addTag($data){
        $this->db->query('INSERT INTO tags (name, post_id) VALUES(:name, :post_id)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':post_id', $data['post_id']);
        $result = $this->db->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function getPostsByTags($tagName){
        $this->db->query('SELECT *,
                            posts.id as postId,
                            users.id as userId,
                            users.name as userName,
                            group_concat(tags.name) as postTags,
                            posts.created_at as postCreated
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id = users.id
                            LEFT JOIN tags
                            ON posts.id = tags.post_id
                            WHERE lower(tags.name) = lower(:tagName)
                            GROUP BY title
                            ORDER BY posts.created_at DESC');
        $this->db->bind(':tagName', $tagName);
        $result = $this->db->getAll();
        return $result;
    }
}
