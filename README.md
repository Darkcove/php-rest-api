# php-rest-api
# Still needs update / delete methods etc and for single posts
# $query = 'SELECT 
            c.name as category_name, 
            p.id, 
            p.category_id,
            p.title, 
            p.body, 
            p.author, 
            p.created_at 
          FROM
             ' . $this->table . '  p
            LEFT JOIN
              categories c ON p.category_id = c.id
            ORDER BY
              p.created_at DESC';
