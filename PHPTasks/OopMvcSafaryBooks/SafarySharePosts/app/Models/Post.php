<?php


class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts(): array
    {
        $qry = 'SELECT
                    p.id as postId, 
                    p.title as postTitle,
                    p.body as postBody,
                    p.created_at as postCreatedAt,
                    u.name as author
                FROM posts as p
                JOIN users as u ON p.user_id=u.id
                ORDER BY p.created_at DESC ';
        $this->db->query($qry);
        return $this->db->resultSet();
    }

    public function getPostById($id)
    {
        $qry = 'SELECT
                    p.id as post_id, 
                    p.title as postTitle,
                    p.body as postBody,
                    p.created_at as postCreatedAt,
                    u.name as author,
                    u.id as user_id
                FROM posts as p
                JOIN users as u ON p.user_id=u.id
                WHERE p.id=:postId';
        $this->db->query($qry);
        $this->db->bind(
            ':postId', $id
        );

        return $this->db->single();

    }

    public function addPost($data)
    {
        $qry = 'INSERT INTO posts (title, body, user_id) VALUES (:title,:body,:user_id)';
        $this->db->query($qry);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);

        return $this->db->execute();
    }

    public function updatePost($data)
    {
        $qry = 'UPDATE posts 
                SET title=:title, body=:body 
                WHERE id = :id';
        $this->db->query($qry);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();

    }

    public function deletePost($id)
    {
        $qry = 'DELETE FROM posts 
                WHERE id = :id';
        $this->db->query($qry);
        $this->db->bind(':id', $id);
        return $this->db->execute();

    }

}