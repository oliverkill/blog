<?php


class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts(){
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
                            GROUP BY title
                            ORDER BY posts.created_at DESC');
        $result = $this->db->getAll();
        return $result;
    }

    public function getPostById($id){
        $this->db->query('SELECT *,
          posts.id as postId,
          group_concat(tags.name) as postTags
          FROM posts
          LEFT JOIN tags
          ON posts.id = tags.post_id
          WHERE posts.id=:id
          GROUP BY title');
        $this->db->bind(':id', $id);
        $post = $this->db->getOne();
        return $post;
    }

    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id=:id');
        $this->db->bind(':id', $id);
        $result = $this->db->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function editPost($data){
        $this->db->query('UPDATE posts SET title=:title, content=:content WHERE id=:id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $result = $this->db->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function addPost($data){
        $this->db->query('INSERT INTO posts (title, user_id, content) VALUES(:title, :user_id, :content)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':content', $data['content']);
        $result = $this->db->execute();
        if($result){
            $sql = 'INSERT INTO tags (post_id, name) VALUES '
                .implode(', ', array_map(function($tag) { return "(LAST_INSERT_ID(), '$tag')"; }, $data['tags']));
            $this->db->query($sql);
            if($this->db->execute()) return true;
            else return false;
        } else {
            return false;
        }
    }
}
