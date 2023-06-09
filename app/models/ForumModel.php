<?php

class ForumModel extends Model
{
    private $_table = 'posts';
    function tableFill()
    {
        return $this->_table;
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'post_id';
    }
    /**
     * Lấy ra toàn bộ danh mục
     * @access    public
     * @param   
     * @return    array
     */
    public function getCategories($limit = 0)
    {
        $data = $this->db->table('categories')->get();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['post'] = $this->getFullPosts($data[$i]['category_id'], $limit);
        }
        return $data;
    }
    /**
     * Lấy ra toàn bộ danh mục
     * @access    public
     * @param   
     * @return    array
     */
    public function getCategoryById($category_id)
    {
        $data = $this->db->table('categories')->where('category_id', '=', $category_id)->first();
        $data['post'] = $this->getFullPosts($category_id);
        return $data;
    }
    /**
     * Lấy ra danh sách bài viết thuộc danh mục được truyền vào
     * @access    public
     * @param  int 
     * @return    array
     */
    public function getPosts($category_id)
    {
        $id = filter_var($category_id, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = $this->db->table('posts')->where('category_id', '=', $category_id)->get();
        return $data;
    }
    /**
     * Lấy ra danh sách bài viết với tất cả thông tin về người đăng và bình luận
     * @access    public
     * @param  int 
     * @return    array
     */
    public function getFullPosts($category_id, $limit = 0)
    {
        if ($limit == 0) {
            $id = filter_var($category_id, FILTER_SANITIZE_SPECIAL_CHARS);
            $data = $this->db->table('posts')->where('category_id', '=', $category_id)->get();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['user'] = $this->getUsers($data[$i]['user_id']);
                $data[$i]['comment'] = $this->getComment($data[$i]['post_id']);
            }
        } else {
            $id = filter_var($category_id, FILTER_SANITIZE_SPECIAL_CHARS);
            $data = $this->db->table('posts')->where('category_id', '=', $category_id)->limit($limit)->get();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['user'] = $this->getUsers($data[$i]['user_id']);
                $data[$i]['comment'] = $this->getComment($data[$i]['post_id']);
            }
        }

        return $data;
    }

    public function getPostsSameCategory($post_id, $limit = 0)
    {
        $post_id = filter_var($post_id, FILTER_SANITIZE_SPECIAL_CHARS);
        $post = $this->db->table('posts')->where('post_id', '=', $post_id)->first();
        if ($limit == 0) {
            $data = $this->db->table('posts')->where('category_id', '=', $post['category_id'])->where('post_id', '!=', $post_id)->get();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['user'] = $this->getUsers($data[$i]['user_id']);
                $data[$i]['comment'] = $this->getComment($data[$i]['post_id']);
            }
        } else {
            $data = $this->db->table('posts')->where('category_id', '=', $post['category_id'])->where('post_id', '!=', $post_id)->limit($limit)->get();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['user'] = $this->getUsers($data[$i]['user_id']);
                $data[$i]['comment'] = $this->getComment($data[$i]['post_id']);
            }
        }

        return $data;
    }

    public function getLastestPosts()
    {
        $data = $this->db->table('posts')->orderBy('updated_at', 'DESC')->limit(5)->get();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['user'] = $this->getUsers($data[$i]['user_id']);
            $data[$i]['comment'] = $this->getComment($data[$i]['post_id']);
        }

        return $data;
    }

    public function getMostCommentPosts()
    {
        $data = $this->db->table('posts')->orderBy('updated_at', 'DESC')->get();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['user'] = $this->getUsers($data[$i]['user_id']);
            $data[$i]['comment'] = $this->getComment($data[$i]['post_id']);
        }

        return $data;
    }

    /**
     * Lấy ra danh sách bài viết với tất cả thông tin về người đăng và bình luận
     * @access    public
     * @param  int 
     * @return    array
     */
    public function getFullPostById($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = $this->db->table('posts')->where('post_id', '=', $id)->first();
        if ($data != null) {
            $data['user'] = $this->getUsers($data['user_id']);
            $data['comment'] = $this->getComment($data['post_id']);
        }

        return $data;
    }
    /**
     * Lấy ra thông tin người dùng
     * @access    public
     * @param  string 
     * @return    string
     */
    public function getUsers($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);
        $users = $this->db->table('users')->where('user_id', '=', $id)->first();
        return $users;
    }
    /**
     * Lấy ra tất cả bình luận của một bài viết
     * @access    public
     * @param  string 
     * @return    string
     */
    public function getComment($post_id)
    {
        $id = filter_var($post_id, FILTER_SANITIZE_SPECIAL_CHARS);
        $comment = $this->db->table('comments')->where('post_id', '=', $id)->get();
        return $comment;
    }
    public function getCommentById($comment_id)
    {
        $id = filter_var($comment_id, FILTER_SANITIZE_SPECIAL_CHARS);
        $comment = $this->db->table('comments')->where('comment_id', '=', $id)->first();
        return $comment;
    }
    /**
     * Lấy ra tất cả bình luận của một bài viết
     * @access    public
     * @param  string 
     * @return    string
     */
    public function getStats()
    {
        $data['post'] = count($this->db->table('posts')->get());
        $data['comment'] = count($this->db->table('comments')->get());
        $data['like'] = count($this->db->table('likes')->get());
        $data['user'] = count($this->db->table('users')->get());
        return $data;
    }
    public function Create($user_id, $category_id, $title, $content)
    {
        $title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = array([
            'user_id' => $user_id,
            'category_id' => $category_id,
            'title' => $title,
            'content' => $content
        ]);
        $result = $this->db->table('posts')->insert($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function createCategory($name) {
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = [
            'category_name' => $name
        ];
        $result = $this->db->table('categories')->insert($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function updateCategory($category_id, $category_name) {
        $category_id = filter_var($category_id, FILTER_SANITIZE_NUMBER_INT);
        $category_name = filter_var($category_name, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = [
            'category_name' => $category_name
        ];
        $result = $this->db->table('categories')->where('category_id', '=', $category_id)->update($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteCategory($category_id) {
        $category_id = filter_var($category_id, FILTER_SANITIZE_NUMBER_INT);
        $result = $this->db->table('posts')->where('category_id', '=', $category_id)->delete();
        $result = $this->db->table('categories')->where('category_id', '=', $category_id)->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
